<?php

namespace LaravelMeetups\Jobs\Catalog;

use Symfony\Component\Console\Style\SymfonyStyle;
use LaravelMeetups\Contracts\Jobs\Write as Contract;
use LaravelMeetups\Contracts\Config;

class Write implements Contract
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
    public function __construct(Config $config, SymfonyStyle $io)
    {
        $this->config = $config;
        $this->io = $io;
        $this->setHeaders();
    }

    public function write()
    {
        $this->io->table(
            $this->headers,
            $this->values
        );

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
        $this->headers = array_map(function ($elem) {
            return (new $elem)->getName();
        }, $this->config->getCatalogProviders());

        return $this;
    }
}