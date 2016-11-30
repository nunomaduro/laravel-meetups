<?php

namespace LaravelMeetups;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Question\Question;


class Command extends BaseCommand
{
    /**
     * Configure the command options.
     *a
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('laravel-meetups')->setDescription('Create a new Laravel meetup application');
    }

    /**
     * Execute the command.
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->getHelper('formatter')->formatSection('Laravel Meetups', 'Bootstraping..'));

        $interaction = new Interactions\Catalog(new Config, $input, $output);

        $key = null;
        while (true) {
            $interaction->displayTable()->displayDetail($key);
            $output->writeln('<comment>Follow the author on twitter:<comment> <info>@enunomaduro</info> <info>✔</info>');
            $key = $this->getHelper('question')->ask($input, $output, new Question('Select a meetup:'));
        }
    }
}