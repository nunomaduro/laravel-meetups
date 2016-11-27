<?php

namespace LaravelMeetups\Fields;

use LaravelMeetups\Contracts\Fields\Field;
use PHPHtmlParser\Dom;

class Members implements Field
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