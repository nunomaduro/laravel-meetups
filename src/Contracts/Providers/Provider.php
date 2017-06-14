<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Contracts\Providers;

use PHPHtmlParser\Dom;

/**
 * Interface Provider.
 */
interface Provider
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param Dom $dom
     *
     * @return string
     */
    public function find(Dom $dom);
}
