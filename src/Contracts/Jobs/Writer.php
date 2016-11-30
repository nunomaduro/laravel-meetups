<?php

namespace LaravelMeetups\Contracts\Jobs;

use LaravelMeetups\Contracts\Config;
use Symfony\Component\Console\Style\StyleInterface;

interface Writer
{
    /**
     * Creates a new instance of the class.
     *
     * @param Config         $config
     * @param StyleInterface $io
     */
    public function __construct(Config $config, StyleInterface $io);

    /**
     * Writes the values on the table.
     *
     * @param array $values
     */
    public function setValues(array $values);

    /**
     * Writes on console
     *
     * @return $this
     */
    public function write();
}