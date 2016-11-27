<?php

namespace LaravelMeetups\Http\Client;

use LaravelMeetups\Contracts\Http\Client\Query as Contract;
use LaravelMeetups\Contracts\Http\Client\Strategy;

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
        return $this->strategy->getUrl()
            . '/' . http_build_query($this->strategy->getParams());
    }
}