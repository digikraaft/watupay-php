<?php

namespace Digikraaft\Watupay;

class Verify extends ApiResource
{
    const OBJECT_NAME = 'verify';

    /**
     * @param string $bvn
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#3072d1d0-0f8a-417d-b01b-b9be92c33336
     */
    public static function bvn(string $bvn)
    {
        $url = "bvn/{$bvn}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bin
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#f514738d-7516-4216-be4f-fb37953ef17e
     */
    public static function bin(string $bin)
    {
        $url = "bin/{$bin}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#ee0d1ef9-b96f-4b85-920d-db6964b1e991
     */
    public static function accountNumber(array $params)
    {
        self::validateParams($params);
        $url = urlencode('financial-institution/verify');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#2ec28462-ddd0-4c51-8b7f-0e2da5d66b5e
     */
    public static function verify($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }
}
