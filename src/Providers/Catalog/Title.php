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
 * Class Title
 *
 * @package LaravelMeetups\Providers\Catalog
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
        return $this->truncate($dom->getElementsByClass('event')->text(true));
    }

    /**
     * Truncates the tile to 10 chars.
     *
     * @param $title
     *
     * @return string
     */
    private function truncate($title)
    {
        if (mb_strlen($title) > 22) {
            return substr($title, 0, 20) . '..';
        }

        return $title;
    }
}
