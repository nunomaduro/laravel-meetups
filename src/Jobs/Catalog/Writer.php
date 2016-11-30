<?php

namespace LaravelMeetups\Jobs\Catalog;

use LaravelMeetups\Contracts\Jobs\Writer as Contract;
use Symfony\Component\Console\Style\StyleInterface;
use LaravelMeetups\Contracts\Config;

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
     * Holds the values.
     *
     * @var Config
     */
    private $values;

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
        $this->io->table($this->headers, $this->values);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValues(array $values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Configures the table instance with
     * the headers provided by the config list elements.
     *
     * @return $this
     */
    private function setHeaders()
    {
        $this->headers = array_map(function($elem) {
            return (new $elem)->getName();
        }, $this->config->getCatalogProviders());

        return $this;
    }
}