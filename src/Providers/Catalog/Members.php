<?php

namespace LaravelMeetups\Providers\Catalog;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

class Members implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Members';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        return (int) $dom->getElementsByClass('attendee-count')->text(true);
    }
}