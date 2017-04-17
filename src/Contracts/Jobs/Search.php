<?php

namespace LaravelMeetups\Contracts\Jobs;

use LaravelMeetups\Contracts\Config;
use PHPHtmlParser\Dom;
use Symfony\Component\Console\Input\InputInterface;

interface Search
{
    /**
     * Creates an new instance of the class.
     *
     * @param Config         $config
     * @param InputInterface $input
     * @param Dom|null       $dom
     */
    public function __construct(Config $config, InputInterface $input, Dom $dom = null);

    /**
     * Try's to find information using the provided config and analyser.
     *
     * @return array
     */
    public function execute();
}
