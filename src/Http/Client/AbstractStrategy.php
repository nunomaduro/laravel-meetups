<?php

namespace LaravelMeetups\Http\Client;

use LaravelMeetups\Contracts\Config;

abstract class AbstractStrategy
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getUrl()
    {
        return $this->config->getUrl();
    }

    public function getParams()
    {
        return [];
    }
}
