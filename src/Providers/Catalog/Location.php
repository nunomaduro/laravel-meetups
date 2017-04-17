<?php

namespace LaravelMeetups\Providers\Catalog;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

class Location implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Location';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        return $dom->getElementsByClass('text--labelSecondary')->text(true);
    }
}
