<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Contracts\Jobs\Catalog;

use PHPHtmlParser\Dom;

/**
 * Interface Bag.
 */
interface Bag
{
    /**
     * Bag constructor.
     *
     * @param Dom   $dom
     * @param array $rows
     */
    public function __construct(Dom $dom, array $rows);

    /**
     * Returns the dom.
     *
     * @return Dom
     */
    public function getDom();

    /**
     * Returns the rows.
     *
     * @return array
     */
    public function getRows();
}
