<?php

namespace LaravelMeetups\Contracts\Interactions;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use LaravelMeetups\Contracts\Config;


interface Catalog
{
    /**
     * Catalog constructor.
     *
     * @param \LaravelMeetups\Contracts\Config                $config
     * @param \Symfony\Component\Console\Input\InputInterface $input
     */
    public function __construct(Config $config, InputInterface $input, OutputInterface $output);

    /**
     * Displays the table.
     *
     * @return $this
     */
    public function displayTable();

    /**
     * Displays the detail
     *
     * @param $rowKey
     *
     * @return $this
     */
    public function displayDetail($rowKey);
}