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

use LaravelMeetups\Contracts\Http\Client\Query as Contract;
use LaravelMeetups\Contracts\Http\Client\Strategy;

/**
 * Class Query
 *
 * @package LaravelMeetups\Http\Client
 */
class Query implements Contract
{
    /**
     * Holds an instance of strategy.
     *
     * @var Strategy
     */
    private $strategy;

    /**
     * {@inheritdoc}
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        $stringQuery = $this->strategy->getUrl();

        if (!empty($params = $this->strategy->getParams())) {
            $stringQuery .= '?'.http_build_query($params);
        }

        return $stringQuery;
    }
}
