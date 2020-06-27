<?php

namespace Digikraaft\Watupay;

use Digikraaft\Watupay\Exceptions\InvalidArgumentException;

class Watupay
{
    /** @var string The Watupay API key to be used for requests. */
    public static string $apiKey;

    /** @var string The base URL for the Watupay API. */
    public static $apiBase = 'https://api.watu.global/v1';

    /**
     * @return string the API key used for requests
     */
    public static function getApiKey(): string
    {
        return self::$apiKey;
    }

    /**
     * Sets the API key to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey): void
    {
        self::validateApiKey($apiKey);
        self::$apiKey = $apiKey;
    }

    private static function validateApiKey($apiKey): bool
    {
        if ($apiKey == '' || ! is_string($apiKey)) {
            throw new InvalidArgumentException('Api key must be a string and cannot be empty');
        }

        return true;
    }
}
