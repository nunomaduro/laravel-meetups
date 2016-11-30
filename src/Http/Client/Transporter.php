<?php

namespace LaravelMeetups\Http\Client;

use LaravelMeetups\Contracts\Http\Client\Transporter as Contract;
use LaravelMeetups\Contracts\Http\Client\Query as QueryContract;

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