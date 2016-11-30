<?php

namespace LaravelMeetups\Providers\Catalog;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

class Option implements Contract
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