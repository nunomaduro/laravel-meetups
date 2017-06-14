<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups;

use LaravelMeetups\Contracts\Config as ConfigContract;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class Command.
 */
class Command extends BaseCommand
{
    /**
     * Configure the command options.
     *a.
     *
     * @return void
     */
    protected function configure()
    {
        date_default_timezone_set('UTC');

        $this->setName('laravel-meetups')
            ->setDescription('Create a new Laravel meetup application')
            ->addArgument('max_radius', InputArgument::OPTIONAL, 'What should be the max radius?');
    }

    /**
     * Execute the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->getHelper('formatter')->formatSection(
            ' Laravel Meetups ',
            'Searching nearby meetups...'
        ));

        $interaction = new Interactions\Catalog(($config = new Config()), $input, $output);

        $key = null;
        while (!$interaction->isEmpty() && $key !== 'exit') {
            $interaction->displayTable()->displayDetail($key);
            $output->writeln('<comment>Follow the author on twitter:<comment> <info>@enunomaduro</info> <info>✔</info>');
            $key = $this->getHelper('question')->ask($input, $output, new Question('Select a meetup:'));
        }

        $interaction->isEmpty() and $this->noMeetupsNearYou($config, $output);
    }

    /**
     * Displays the no meetups near you message.
     *
     * @param \LaravelMeetups\Contracts\Config                  $config
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return $this
     */
    private function noMeetupsNearYou(ConfigContract $config, OutputInterface $output)
    {
        $radiusUsed = $config->getMaxRadius();

        $output->writeln($this->getHelper('formatter')->formatSection(
            " There is no nearby meetups within $radiusUsed miles ",
            '<comment>Try to use another max radius. Example LaravelMeetups 1000</comment>'
        ));

        return $this;
    }
}
