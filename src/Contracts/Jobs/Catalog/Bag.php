<?php

namespace LaravelMeetups\Contracts\Jobs\Catalog;

use PHPHtmlParser\Dom;

interface Bag
{
    /**
     * Bag constructor.
     *
     * @param Dom   $dom
     * @param array $values
     */
    public function __construct(Dom $dom, array $values);

    /**
     * Returns the dom
     *
     * @return Dom
     */
    public function getDom();

    /**
     * Returns the values.
     *
     * @return array
     */
    public function getValues();
}