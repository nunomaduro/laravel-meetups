<?php

namespace LaravelMeetups\Contracts\Http\Client;

use LaravelMeetups\Contracts\Config;

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
