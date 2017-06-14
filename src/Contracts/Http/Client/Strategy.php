<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Contracts\Http\Client;

use LaravelMeetups\Contracts\Config;

/**
 * Interface Strategy.
 */
interface Strategy
{
    /**
     * Creates a new instance of the class.
     *
     * @param Config $config
     */
    public function __construct(Config $config);

    /**
     * Returns the url.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Returns the params.
     *
     * @return array
     */
    public function getParams();
}
