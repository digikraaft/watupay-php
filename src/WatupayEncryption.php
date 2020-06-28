<?php

namespace Digikraaft\Watupay;

use Exception;

class WatupayEncryption
{
    protected static $key;
    protected static $data;
    protected static $method;
    protected static $iv;

    /**
     * Available OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING
     *
     * @var int
     */
    protected static $options = 0;

    /**
     *
     * @param mixed $data
     * @param string $key
     * @param string $iv
     * @param int $blockSize
     *  @param string $mode
     * @throws Exception
     */

    protected static function setProperties($data, $key, $iv, $blockSize, $mode)
    {
        static::$data = $data;
        static::$key = $key;
        static::$iv = $iv;
        static::setMethod($blockSize, $mode);
    }

    /**
     *CBC 128 192 256
    CBC-HMAC-SHA1 128 256
    CBC-HMAC-SHA256 128 256
    CFB 128 192 256
    CFB1 128 192 256
    CFB8 128 192 256
    CTR 128 192 256
    ECB 128 192 256
    OFB 128 192 256
    XTS 128 256
     * @param int $blockSize
     * @param string $mode
     */
    protected static function setMethod($blockSize, $mode = 'CBC')
    {
        if ($blockSize == 192 && in_array('', ['CBC-HMAC-SHA1','CBC-HMAC-SHA256','XTS'])) {
            static::$method = null;

            throw new Exception('Invalid block size and mode combination!');
        }
        static::$method = 'AES-' . $blockSize . '-' . $mode;
    }

    /**
     *
     * @return bool
     */
    public static function validateParams()
    {
        if (static::$data != null &&
            static::$method != null) {
            return true;
        } else {
            return false;
        }
    }

    protected static function getIV()
    {
        return static::$iv;
    }

    /**
     * @param $data
     * @param $key
     * @param $iv
     * @param $blockSize
     * @param string $mode
     * @return string
     * @throws Exception
     */
    public static function encrypt($data, $key, $iv, $blockSize = 256, $mode = 'CBC')
    {
        static::setProperties($data, $key, $iv, $blockSize, $mode);
        if (static::validateParams()) {
            return trim(openssl_encrypt(static::$data, static::$method, static::$key, static::$options, static::getIV()));
        } else {
            throw new Exception('Invalid params!');
        }
    }
}
