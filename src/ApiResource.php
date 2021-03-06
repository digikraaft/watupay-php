<?php

namespace Digikraaft\Watupay;

use Digikraaft\Watupay\Exceptions\InvalidArgumentException;

class ApiResource
{
    const OBJECT_NAME = 'apiresource';

    use ApiOperations\Request;

    /**
     * @return string the base URL for the given class
     */
    public static function baseUrl()
    {
        return Watupay::$apiBase;
    }

    /**
     * @return string the endpoint URL for the given class
     */
    public static function classUrl()
    {
        $base = static::OBJECT_NAME;

        return "{$base}";
    }

    /**
     * @param null|string $id the ID of the resource
     *
     * @throws InvalidArgumentException if $id is null
     *
     * @return string the endpoint URL for the given class
     */
    public static function resourceUrl($id)
    {
        if (null === $id) {
            $message = 'Invalid ID supplied. ID cannot be null';

            throw new InvalidArgumentException($message);
        }
        $id = Util\Util::utf8($id);
        $base = static::classUrl();
        $extn = urlencode($id);

        return "{$base}/{$extn}";
    }

    /**
     * @param string $slug
     *
     * @return string the endpoint URL for the given class
     */
    public static function endPointUrl($slug)
    {
        $slug = Util\Util::utf8($slug);
        $base = static::classUrl();

        return "{$base}/{$slug}";
    }

    /**
     * @param string $slug
     * @param $params array of query parameters
     *
     * @return string the endpoint URL for the given class
     */
    public static function buildQueryString($slug, $params = null)
    {
        $url = self::endPointUrl($slug);
        if (! empty($params)) {
            $url .= '?'.http_build_query($params);
        }

        return $url;
    }
}
