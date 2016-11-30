<?php

namespace LaravelMeetups\Jobs\Detail;

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
     * Holds a instance of StyleInterface.
     *
     * @var StyleInterface
     */
    private $io;

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
    }

    /**
     * {@inheritdoc}
     */
    public function write()
    {
        $this->io->title(current($this->values));
        $this->io->listing($this->values);

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
}