<?php

namespace LaravelMeetups\Fields;

use LaravelMeetups\Contracts\Fields\Field;
use PHPHtmlParser\Dom;

class Location implements Field
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