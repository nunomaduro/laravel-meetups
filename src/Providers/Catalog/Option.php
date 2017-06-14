<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Providers\Catalog;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

/**
 * Class Option.
 */
class Option implements Contract
{
    /**
     * Holds the current option number.
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
        return '[<info>'.static::$number++.'</info>]';
    }
}
