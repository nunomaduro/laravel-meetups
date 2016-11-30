<?php

namespace LaravelMeetups\Providers\Detail;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

class Title implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Title';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        return trim($dom->getElementById('event-title')->text(true));
    }
}