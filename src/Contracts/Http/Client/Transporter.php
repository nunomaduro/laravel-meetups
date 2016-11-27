<?php

namespace LaravelMeetups\Contracts\Http\Client;

interface Transporter
{
    /**
     * Executes the query.
     *
     * Should retrieve information from an provider.
     *
     * @param  Query $query
     *
     * @return string
     */
    public function execute(Query $query);
}