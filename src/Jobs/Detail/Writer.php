<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Jobs\Detail;

use LaravelMeetups\Contracts\Config;
use LaravelMeetups\Contracts\Jobs\Writer as Contract;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Class Writer.
 */
class Writer implements Contract
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    private $config;

    /**
     * Holds a instance of StyleInterface.
     *
     * @var StyleInterface
     */
    private $io;

    /**
     * Holds the rows.
     *
     * @var Config
     */
    private $rows;

    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config, StyleInterface $io)
    {
        $this->config = $config;
        $this->io = $io;
    }

    /**
     * {@inheritdoc}
     */
    public function write()
    {
        $this->io->title(current($this->rows));
        $this->io->listing($this->rows);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRows(array $rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRows()
    {
        return $this->rows;
    }
}
