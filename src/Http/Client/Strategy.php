<?php

namespace LaravelMeetups\Http\Client;

use LaravelMeetups\Contracts\Http\Client\Strategy as Contract;
use LaravelMeetups\Contracts\Config;

class Strategy implements Contract
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    private $config;

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
        return [
            'allMeetups' => $this->config->getAllMeetups() ? 'true' : 'false',
            'keywords' => $this->config->getKeywords(),
            'radius' => $this->config->getRadius(),
        ];
    }
}