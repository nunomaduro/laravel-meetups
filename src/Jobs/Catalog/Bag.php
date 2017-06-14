<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Jobs\Catalog;

use LaravelMeetups\Contracts\Jobs\Catalog\Bag as Contract;
use PHPHtmlParser\Dom;

/**
 * Class Bag.
 */
class Bag implements Contract
{
    /**
     * @var Dom
     */
    private $dom;

    /**
     * @var array
     */
    private $rows;

    /**
     * {@inheritdoc}
     */
    public function __construct(Dom $dom, array $rows)
    {
        $this->dom = $dom;
        $this->rows = $rows;
    }

    /**
     * {@inheritdoc}
     */
    public function getDom()
    {
        return clone $this->dom;
    }

    /**
     * {@inheritdoc}
     */
    public function getRows()
    {
        return $this->rows;
    }
}
