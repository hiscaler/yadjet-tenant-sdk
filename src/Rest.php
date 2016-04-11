<?php

namespace yadjet\tenant\sdk;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\FlysystemStorage;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;
use League\Flysystem\Adapter\Local;

/**
 * Rest
 * 
 * @author hiscaler <hiscaler@gmail.com>
 */
class Rest
{

    /**
     * @var Client
     */
    private static $_client;

    /**
     * Dynamic call static function and pass paramater values.
     * 
     * Rest::news => Rest::_list('news')
     * Rest::newsList => Rest::_list('news')
     * Rest::newsAll => Rest::_all('news')
     * Rest::friendlyLinksAll => Rest::_all('firendly-links')
     * Rest::friendlyLinksList => Rest::_list('firendly-links')
     * Rest::friendlyLinksOne => Rest::_one('firendly-links')
     * 
     * @param type $name
     * @param type $arguments
     * @return mixed
     * @throws \Exception
     */
    public static function __callStatic($name, $arguments)
    {
        $names = explode('_', strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $name)));
        $functionName = '_' . (isset($names[1]) ? end($names) : 'list');
        if (!in_array($functionName, ['_all', '_list', '_one'])) {
            throw new \Exception('get' . ucfirst($functionName) . ' function is undefined.');
        }

        return static::$functionName($names[0], $arguments[0]);
    }

    protected static function getInstance()
    {
        if (static::$_client === null) {
            $stack = HandlerStack::create();
            $stack->push(
                new CacheMiddleware(
                    new PrivateCacheStrategy(
                        new FlysystemStorage(new Local(__DIR__ . '/tmp/'))
                    )
                ), 'cache'
            );
            static::$_client = new Client(['handler' => $stack, 'base_uri' => self::_getRestConfigValue('API_PREFIX')]);
        }

        return static::$_client;
    }

    /**
     * Get constant setting value.
     * @param string $name
     * @param mixed $defaultValue
     * @return mixed
     */
    private static function _getRestConfigValue($name, $defaultValue = null)
    {
        $name = 'YADJET_TENANT_SDK_REST_' . strtoupper($name);

        return defined($name) ? constant($name) : $defaultValue;
    }

    private static function _parseParams($uri, $params = [])
    {
        $res = [];
        $params['accessToken'] = self::_getRestConfigValue('ACCESS_TOKEN');
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $res[] = "$key=$value";
            }
        } elseif (is_string($params)) {
            array_unshift($res, $params);
        }

        return $uri . '?' . implode('&', $res);
    }

    private static function _all($uri, $params = [])
    {
        $response = static::getInstance()->request('GET', static::_parseParams($uri, $params));
        switch ($response->getStatusCode()) {
            case 400:
            case 500:
                return [];

            default:
                return json_decode($response->getBody(), true);
        }
    }

    private static function _list($uri, $params)
    {
        $response = static::getInstance()->request('GET', static::_parseParams($uri . '/list', $params));
        switch ($response->getStatusCode()) {
            case 400:
            case 500:
                return [];

            default:
                return json_decode($response->getBody(), true);
        }
    }

    private static function _one()
    {
        
    }

    public static function batch($requests = [])
    {
        $batchResults = [];
        $promises = [];
        $client = static::getInstance();
        foreach ($requests as $key => $request) {
            $uri = $request[0];
            unset($request[0]);
            $promises[$key] = $client->getAsync(static::_parseParams($uri, $request));
        }
        $results = \GuzzleHttp\Promise\unwrap($promises);
        foreach ($results as $key => $result) {
            switch ($result->getStatusCode()) {
                case 400:
                case 500:
                    $body = [];
                    break;

                default:
                    $body = json_decode($result->getBody(), true);
                    $body = $body['data']['items'];
            }

            $batchResults[$key] = $body;
        }

        return $batchResults;
    }

}
