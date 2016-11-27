<?php

namespace LaravelMeetups\Contracts\Jobs;

use Symfony\Component\Console\Input\InputInterface;
use LaravelMeetups\Contracts\Config;
use PHPHtmlParser\Dom as Analyser;

interface Search
{
    /**
     * Creates an new instance of the class.
     *
     * @param  Config         $config
     * @param  InputInterface $input
     * @param  Analyser|null  $analyser
     */
    public function __construct(Config $config, InputInterface $input, Analyser $analyser = null);

    /**
     * Try's to find events using the provided config and analyser.
     *
     * @return string
     */
    public function execute();
}