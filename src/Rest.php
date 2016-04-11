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
 * Const define
 * defined('YADJET_TENANT_REST_ACCESS_TOKEN') or define('YADJET_TENANT_SDK_REST_ACCESS_TOKEN', '1234567890');
 * defined('YADJET_TENANT_SDK_REST_LANGUAGE') or define('YADJET_TENANT_SDK_REST_LANGUAGE', 'zh-CN');
 * defined('YADJET_TENANT_SDK_REST_API_URL_PREFIX') or define('YADJET_TENANT_SDK_REST_API_URL_PREFIX', 'http://api.example.com');
 * defined('YADJET_TENANT_SDK_REST_CACHE_DIR') or define('YADJET_TENANT_SDK_REST_CACHE_DIR', __DIR__ . '/../tmp');
 * 
 * @author hiscaler <hiscaler@gmail.com>
 */
class Rest
{

    /**
     * Action type
     */
    const ACTION_ALL = 'all';
    const ACTION_LIST = 'list';
    const ACTION_ONE = 'one';

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
        $functionName = isset($names[1]) ? end($names) : 'list';
        if (!in_array($functionName, ['all', 'list', 'one'])) {
            throw new \Exception('get' . ucfirst($functionName) . ' function is undefined.');
        }
        $functionName = "_$functionName";

        return static::$functionName($names[0], isset($arguments[0]) ? $arguments[0] : []);
    }

    protected static function getInstance()
    {
        if (static::$_client === null) {
            $stack = HandlerStack::create();
            $stack->push(
                new CacheMiddleware(
                    new PrivateCacheStrategy(
                        new FlysystemStorage(new Local(static::_getRestConfigValue('CACHE_DIR')))
                    )
                ), 'cache'
            );
            static::$_client = new Client(['handler' => $stack, 'base_uri' => self::_getRestConfigValue('API_URL_PREFIX')]);
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

    /**
     * Parse api repsonse body
     * @param Client $response
     * @param string $action
     * @return array|boolean
     */
    private static function _parseResponse($response, $action = static::ACTION_LIST)
    {
        switch ($response->getStatusCode()) {
            case 200:
                $body = json_decode($response->getBody(), true);
                return $action == static::ACTION_LIST ? $body['data']['items'] : $body['data'];

            case 400:
            case 500:
                return false;

            default:
                return false;
        }
    }

    /**
     * Get all data with pagination meta, if fail will return false.
     * @param integer $uri
     * @param array $params
     * @return array|boolean
     */
    private static function _all($uri, $params = [])
    {
        $response = static::getInstance()->request('GET', static::_parseParams($uri, $params));
        return self::_parseResponse($response, self::ACTION_ALL);
    }

    /**
     * Get data list, if fail will return false.
     * @param integer $uri
     * @param array $params
     * @return array|boolean
     */
    private static function _list($uri, $params)
    {
        $response = static::getInstance()->request('GET', static::_parseParams($uri . '/list', $params));
        return self::_parseResponse($response, self::ACTION_LIST);
    }

    /**
     * Get One data, if fail will return false.
     * @param integer $uri
     * @param array $params
     * @return array|boolean
     */
    private static function _one($uri, $params)
    {
        $response = static::getInstance()->request('GET', static::_parseParams($uri, $params));
        return self::_parseResponse($response, self::ACTION_ONE);
    }

    /**
     * Batch execute requests
     * @param array $requests
     * @return array
     */
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
            $batchResults[$key] = static::_parseResponse($result);
        }

        return $batchResults;
    }

}
