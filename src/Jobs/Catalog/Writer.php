<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Jobs\Catalog;

use LaravelMeetups\Contracts\Config;
use LaravelMeetups\Contracts\Jobs\Writer as Contract;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Class Writer
 *
 * @package LaravelMeetups\Jobs\Catalog
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
     * Holds a instance of SymfonyStyle.
     *
     * @var Config
     */
    private $io;

    /**
     * Holds the headers.
     *
     * @var Config
     */
    private $headers;

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
        $this->setHeaders();
    }

    /**
     * {@inheritdoc}
     */
    public function write()
    {
        $this->io->table($this->headers, $this->rows);

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

    /**
     * Configures the table instance with
     * the headers provided by the config list elements.
     *
     * @return $this
     */
    private function setHeaders()
    {
        $this->headers = array_map(function ($elem) {
            return (new $elem())->getName();
        }, $this->config->getCatalogProviders());

        return $this;
    }
}
