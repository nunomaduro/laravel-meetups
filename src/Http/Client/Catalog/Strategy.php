<?php

namespace LaravelMeetups\Http\Client\Catalog;

use LaravelMeetups\Contracts\Http\Client\Strategy as Contract;
use LaravelMeetups\Http\Client\AbstractStrategy;

class Strategy extends AbstractStrategy implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return [
            'allMeetups' => $this->config->getAllMeetups() ? 'true' : 'false',
            'keywords'   => $this->config->getKeywords(),
            'radius'     => $this->config->getRadius(),
        ];
    }
}
