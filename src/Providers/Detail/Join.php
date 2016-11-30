<?php

namespace LaravelMeetups\Providers\Detail;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

class Join implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Region';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        return trim($dom->getElementById('chapter-banner')->find('a')->getAttribute('href'));
    }
}