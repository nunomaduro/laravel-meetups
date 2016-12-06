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
     * Writes the rows on the table.
     *
     * @param array $rows
     */
    public function setRows(array $rows);

    /**
     * Returns the rows of the table.
     *
     * @return array
     */
    public function getRows();

    /**
     * Writes on console
     *
     * @return $this
     */
    public function write();
}