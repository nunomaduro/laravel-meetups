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

use LaravelMeetups\Contracts\Http\Client\Query as QueryContract;
use LaravelMeetups\Contracts\Http\Client\Transporter as Contract;

/**
 * Class Transporter.
 */
class Transporter implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function execute(QueryContract $query)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $query->toString());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
