<?php

namespace LaravelMeetups\Contracts\Jobs;

use Symfony\Component\Console\Helper\Table;
use LaravelMeetups\Contracts\Config;

interface Writer
{
    /**
     * Creates a new instance of the class.
     *
     * @param Config $config
     * @param Table  $table
     */
    public function __construct(Config $config, Table $table);

    /**
     * Writes the values on the table.
     *
     * @param array $values
     */
    public function setValues(array $values);

    /**
     * Returns the class table.
     *
     * @return Table
     */
    public function getTable();
}