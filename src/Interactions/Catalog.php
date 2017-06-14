<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Interactions;

use LaravelMeetups\Contracts\Config;
use LaravelMeetups\Contracts\Interactions\Catalog as Contract;
use LaravelMeetups\Jobs;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class Catalog
 *
 * @package LaravelMeetups\Interactions
 */
class Catalog implements Contract
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    private $config;

    /**
     * Holds a instance of InputInterface.
     *
     * @var InputInterface
     */
    private $input;

    /**
     * Holds a instance of OutputInterface.
     *
     * @var OutputInterface
     */
    private $output;

    /**
     * Holds an array of instances of Bag.
     *
     * @var array
     */
    private $bags;

    /**
     * @var Jobs\Catalog\Writer
     */
    private $catalogWriter;

    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config, InputInterface $input, OutputInterface $output)
    {
        $this->config = $config;
        $this->input = $input;
        $this->output = $output;
        $this->bags = (new Jobs\Catalog\Search($config, $input))->execute();

        $rows = array_map(function ($bag) {
            return $bag->getRows();
        }, $this->bags);

        $this->catalogWriter = (new Jobs\Catalog\Writer($config, new SymfonyStyle($input, $output)))->setRows($rows);
    }

    /**
     * Checks if the catalog is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->catalogWriter->getRows());
    }

    /**
     * {@inheritdoc}
     */
    public function displayTable()
    {
        $this->catalogWriter->write();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function displayDetail($rowKey)
    {
        if (isset($this->bags[$rowKey - 1])) {
            $rows = (new Jobs\Detail\Search($this->config, $this->input, $this->bags[$rowKey - 1]
                ->getDom()))
                ->execute();
            (new Jobs\Detail\Writer($this->config, new SymfonyStyle($this->input, $this->output)))
                ->setRows($rows)
                ->write();
        }

        return $this;
    }
}
