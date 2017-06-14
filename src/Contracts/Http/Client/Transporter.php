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
 * Interface Transporter.
 */
interface Transporter
{
    /**
     * Executes the query.
     *
     * Should retrieve information from an provider.
     *
     * @param Query $query
     *
     * @return string
     */
    public function execute(Query $query);
}
