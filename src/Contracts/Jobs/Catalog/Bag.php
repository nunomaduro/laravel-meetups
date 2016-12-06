<?php

namespace LaravelMeetups\Contracts\Jobs\Catalog;

use PHPHtmlParser\Dom;

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
     * Returns the dom
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