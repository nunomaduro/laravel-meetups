<?php

namespace LaravelMeetups\Jobs\Catalog;

use LaravelMeetups\Contracts\Jobs\Catalog\Bag as Contract;
use PHPHtmlParser\Dom;

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
