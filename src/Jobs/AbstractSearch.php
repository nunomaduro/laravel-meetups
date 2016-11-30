<?php

namespace LaravelMeetups\Jobs;

use Symfony\Component\Console\Input\InputInterface;
use LaravelMeetups\Contracts\Config;
use PHPHtmlParser\Dom;

abstract class AbstractSearch
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    protected $config;

    /**
     * Holds a instance of input.
     *
     * @var InputInterface
     */
    protected $input;

    /**
     * Holds a instance of analyser.
     *
     * @var Dom
     */
    protected $dom;

    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config, InputInterface $input, Dom $dom = null)
    {
        $this->config = $config;
        $this->input = $input;
        $this->dom = $dom ?: new Dom;
    }
}