<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Http\Client;

use LaravelMeetups\Contracts\Config;

/**
 * Class AbstractStrategy
 *
 * @package LaravelMeetups\Http\Client
 */
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
