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
 * Class Location
 *
 * @package LaravelMeetups\Providers\Catalog
 */
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
