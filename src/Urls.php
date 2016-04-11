<?php

namespace yadjet\tenant\sdk;

/**
 * API URLs
 * @author hiscaler<hiscaler@gmail.com>
 * 
 * 注意：accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A 只是一个示例，实际环境请替换
 */
class Urls
{

    const SEGMENT_AD = 'ads';
    const SEGMENT_ALBUM = 'albums';
    const SEGMENT_ARTICLE = 'articles';
    const SEGMENT_BOOT_DATUM = 'boot-data';
    const SEGMENT_CLASSIC_CASE = 'cases';
    const SEGMENT_ELASTICSEARCH = 'elasticsearch';
    const SEGMENT_FAQ = 'faqs';
    const SEGMENT_FEEDBACK = 'feedbacks';
    const SEGMENT_FRIENDLY_LINK = 'friendly-links';
    const SEGMENT_LOOKUP = 'lookups';
    const SEGMENT_MEMBER = 'members';
    const SEGMENT_META = 'metas';
    const SEGMENT_NEWS = 'news';
    const SEGMENT_NODE = 'nodes';
    const SEGMENT_PRODUCT = 'products';
    const SEGMENT_RSS = 'rss';
    const SEGMENT_SEARCH_KEYWORD = 'search-keywords';
    const SEGMENT_SLIDE = 'slides';
    const SEGMENT_VIDEO = 'videos';
    const SEGMENT_VOTE = 'votes';

    /**
     * Ad
     */
    // GET api.example.com/ads/{alias}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlAdView = array(self::SEGMENT_AD, '{alias}');

    /**
     * Album
     */
    // GET api.example.com/albums?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlAlbums = self::SEGMENT_ALBUM;
    // GET api.example.com/albums/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlAlbumList = array(self::SEGMENT_ALBUM, 'list');
    // GET api.example.com/albums/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlAlbumView = array(self::SEGMENT_ALBUM, '{id}');

    /**
     * Article
     */
    // GET api.example.com/articles?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlArticles = self::SEGMENT_ARTICLE;
    // GET api.example.com/articles/list/?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlArticleList = array(self::SEGMENT_ARTICLE, 'list');
    // GET api.example.com/articles/{alias}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlArticleView = array(self::SEGMENT_ARTICLE, '{alias}');

    /**
     * BootDatum
     */
    // GET api.example.com/boot-data?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlBootData = self::SEGMENT_BOOT_DATUM;
    // GET api.example.com/boot-data/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlBootDatumList = array(self::SEGMENT_BOOT_DATUM, 'list');
    // GET api.example.com/boot-data/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlBootDatumView = array(self::SEGMENT_BOOT_DATUM, '{id}');

    /**
     * Classic case
     */
    // GET api.example.com/cases?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlClassicCases = self::SEGMENT_CLASSIC_CASE;
    // GET api.example.com/cases/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlClassicCaseList = array(self::SEGMENT_CLASSIC_CASE, 'list');
    // GET api.example.com/cases/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlClassicCaseView = array(self::SEGMENT_CLASSIC_CASE, '{id}');

    /**
     * Elasticsearch
     */
    // GET api.example.com/elasticsearch/album?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlElasticsearchAlbum = array(self::SEGMENT_ELASTICSEARCH, 'album');
    // GET api.example.com/elasticsearch/news?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlElasticsearchNews = array(self::SEGMENT_ELASTICSEARCH, 'news');
    // GET api.example.com/elasticsearch/video?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlElasticsearchVideo = array(self::SEGMENT_ELASTICSEARCH, 'video');

    /**
     * Faq
     */
    // GET api.example.com/faqs?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFaqs = self::SEGMENT_FAQ;
    // GET api.example.com/faqs/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFaqList = array(self::SEGMENT_FAQ, 'list');
    // GET api.example.com/faqs/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFaqView = array(self::SEGMENT_FAQ, '{id}');

    /**
     * Feedback
     */
    // GET api.example.com/feedbacks?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFeedbacks = self::SEGMENT_FEEDBACK;
    // GET api.example.com/feedbacks/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFeedbackList = array(self::SEGMENT_FEEDBACK, 'list');
    // GET api.example.com/feedbacks/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFeedbackView = array(self::SEGMENT_FEEDBACK, '{id}');
    // POST api.example.com/feedbacks?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFeedbackCreate = self::SEGMENT_FEEDBACK;

    /**
     * Friendly link
     */
    // GET api.example.com/friendly-links?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFriendlyLinks = self::SEGMENT_FRIENDLY_LINK;
    // GET api.example.com/friendly-links/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlFriendlyLinkList = array(self::SEGMENT_FRIENDLY_LINK, 'list');

    /**
     * Lookup
     */
    // GET api.example.com/lookup/{label}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlLookupValue = array(self::SEGMENT_LOOKUP, '{label}');

    /**
     * Member
     */
    // GET api.example.com/members?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMembers = self::SEGMENT_MEMBER;
    // GET api.example.com/members/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMemberList = array(self::SEGMENT_MEMBER, 'list');
    // POST api.example.com/members?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMemberCreate = self::SEGMENT_MEMBER;
    // GET api.example.com/members/{username}/login?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMemberLogin = array(self::SEGMENT_MEMBER, '{username}', 'login');
    // PUT api.example.com/members/{username}/change-password?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMemberChangePassword = array(self::SEGMENT_MEMBER, '{username}', 'change-password');
    // GET api.example.com/members/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMemberViewById = array(self::SEGMENT_MEMBER, '{id}');
    // GET api.example.com/members/{username}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMemberViewByUsername = array(self::SEGMENT_MEMBER, '{username}');

    /**
     * Meta
     */
    // GET api.example.com/metas/{modelName}/items?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlMetaItems = array(self::SEGMENT_META, 'items');

    /**
     * News
     */
    // GET api.example.com/news
    public static $urlNews = self::SEGMENT_NEWS;
    // GET api.example.com/news/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNewsList = array(self::SEGMENT_NEWS, 'list');
    // GET api.example.com/news/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNewsView = array(self::SEGMENT_NEWS, '{id}');
    // POST,PUT api.example.com/news/{id}/clicks?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNewsClicks = array(self::SEGMENT_NEWS, '{id}', 'clicks');
    // PUT api.example.com/news/{id}/up?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNewsUp = array(self::SEGMENT_NEWS, '{id}', 'up');
    // PUT api.example.com/news/{id}/down?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNewsDown = array(self::SEGMENT_NEWS, '{id}', 'down');

    /**
     * Node
     */
    // GET api.example.com/nodes?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodes = self::SEGMENT_NODE;
    // GET api.example.com/nodes/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeView = array(self::SEGMENT_NODE, '{id}');
    // GET api.example.com/nodes/url-rules?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeUrlRules = array(self::SEGMENT_NODE, 'url-rules');
    // GET api.example.com/nodes/{id}/{name}/template-name?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeTempateName = array(self::SEGMENT_NODE, '{id}', '{name}', 'template-name');
    // GET api.example.com/nodes/{id}/siblings?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeSiblings = array(self::SEGMENT_NODE, '{id}', 'siblings');
    // GET api.example.com/nodes/{parentId}/children-ids?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeChildrenIds = array(self::SEGMENT_NODE, '{parentId}', 'children-ids');
    // GET api.example.com/nodes/{parentId}/children?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeChildren = array(self::SEGMENT_NODE, '{parentId}', 'children');
    // GET api.example.com/node/tree?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeTree = array(self::SEGMENT_NODE, 'tree');
    // GET api.example.com/nodes/{id}/breadcrumbs?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlNodeBreadcrumbs = array(self::SEGMENT_NODE, '{id}', 'breadcrumbs');

    /**
     * Product
     */
    // GET api.example.com/products?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlProducts = self::SEGMENT_PRODUCT;
    // GET api.example.com/products/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlProductList = array(self::SEGMENT_PRODUCT, 'list');
    // GET api.example.com/products/123?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlProductView = array(self::SEGMENT_PRODUCT, '{id}');

    /**
     * RSS
     */
    // GET api.example.com/rss?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlRss = self::SEGMENT_RSS;

    /**
     * Search keyword
     */
    // GET api.example.com/search-keywords?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlSearchkeywords = self::SEGMENT_SEARCH_KEYWORD;
    // GET api.example.com/search-keywords/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlSearchkeywordList = array(self::SEGMENT_SEARCH_KEYWORD, 'list');

    /**
     * Slide
     */
    // GET api.example.com/slides/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlSlideList = array(self::SEGMENT_SLIDE, 'list');

    /**
     * Video
     */
    // GET api.example.com/videos?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlVideos = self::SEGMENT_VIDEO;
    // GET api.example.com/videos/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlVideoList = array(self::SEGMENT_VIDEO, 'list');
    // GET api.example.com/videos/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlVideoView = array(self::SEGMENT_VIDEO, '{id}');

    /**
     * Vote
     */
    // GET api.example.com/votes?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlVotes = self::SEGMENT_VOTE;
    // GET api.example.com/votes/list?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlVoteList = array(self::SEGMENT_VOTE, 'list');
    // GET api.example.com/votes/{id}?accessToken=DAC8838C-D7CB-98AC-2C76-D106EFB52E7A
    public static $urlVoteView = array(self::SEGMENT_VOTE, '{id}');

    /**
     * URL 拼接
     * @param string|array $segments
     * @param array $params
     * @return string
     */
    public static function createRelativeResourceUrl($segments, $params = array())
    {
        $pairs = array();
        if (is_array($segments)) {
            $url = implode('/', $segments);
            $replaceValues = array();
            if (is_array($params)) {
                foreach ($params as $key => $value) {
                    if (in_array("{{$key}}", $segments)) {
                        $replaceValues["{{$key}}"] = $value;
                    } else {
                        $pairs[$key] = $value;
                    }
                }
                $url = strtr($url, $replaceValues);
            }
        } else {
            $url = $segments;
            $pairs = $params;
        }
        if ($pairs) {
            $params = array();
            foreach ($pairs as $key => $value) {
                if (!empty($value)) {
                    $params[] = $key . '=' . urlencode($value);
                }
            }
            $url .= '?' . implode('&', $params);
        }

        return $url;
    }

}
