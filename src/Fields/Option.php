<?php

namespace LaravelMeetups\Fields;

use LaravelMeetups\Contracts\Fields\Field;
use PHPHtmlParser\Dom;

class Option implements Field
{
    /**
     * Holds the current option number
     *
     * @var int
     */
    private static $number = 1;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return '#';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        return '[<info>' . static::$number++ . '</info>]';
    }
}