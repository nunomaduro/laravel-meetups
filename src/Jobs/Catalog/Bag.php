<?php

namespace LaravelMeetups\Jobs\Catalog;

use \LaravelMeetups\Contracts\Jobs\Catalog\Bag as Contract;
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
    private $values;

    /**
     * {@inheritdoc}
     */
    public function __construct(Dom $dom, array $values)
    {
        $this->dom = $dom;
        $this->values = $values;
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
    public function getValues()
    {
        return $this->values;
    }
}