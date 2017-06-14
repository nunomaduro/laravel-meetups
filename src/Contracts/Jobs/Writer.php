<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Contracts\Jobs;

use LaravelMeetups\Contracts\Config;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Interface Writer.
 */
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
     * Writes on console.
     *
     * @return $this
     */
    public function write();
}
