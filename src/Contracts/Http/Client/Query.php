<?php

namespace LaravelMeetups\Contracts\Http\Client;

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
