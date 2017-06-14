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

/**
 * Interface Query.
 */
interface Query
{
    /**
     * Creates an new instance of the class.
     *
     * @param Strategy $strategy
     */
    public function __construct(Strategy $strategy);

    /**
     * Creates the query string.
     *
     * @return string
     */
    public function toString();
}
