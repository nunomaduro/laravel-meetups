<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Providers\Detail;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

/**
 * Class Title.
 */
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
