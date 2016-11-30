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

    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->config->getUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return [];
    }
}