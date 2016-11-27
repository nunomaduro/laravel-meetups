<?php

namespace LaravelMeetups\Jobs;

use Symfony\Component\Console\Helper\Table;
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
     * Holds a instance of table.
     *
     * @var Table
     */
    private $table;

    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config, Table $table)
    {
        $this->config = $config;
        $this->table = $table;
        $this->setHeaders();
    }

    /**
     * {@inheritdoc}
     */
    public function setValues(array $values)
    {
        $this->table->addRows($values);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Configures the table instance with
     * the headers provided by the config elements.
     *
     * @return $this
     */
    private function setHeaders()
    {
        $this->table->setHeaders(array_map(function ($elem) {
            return (new $elem)->getName();
        }, $this->config->getElements()));

        return $this;
    }
}