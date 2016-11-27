<?php

namespace LaravelMeetups;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Helper\Table;
use PHPHtmlParser\Dom as DomAnalyser;
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
        $this->setName('laravel-meetups')
            ->setDescription('Create a new Laravel meetup application');
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
        $output->writeln($this->getHelper('formatter')->formatSection(
            'Laravel Meetups',
            'Bootstraping..'
        ));

        $config = new Config;

        $values = (new Jobs\Search($config, $input))
            ->execute();

        while (true) {

            (new Jobs\Write($config, new Table($output)))
                ->setValues($values)
                ->getTable()
                ->render();

            $output->writeln('Search completed: <info>✔</info>');

            $output->writeln('<comment>Follow the author on twitter:<comment> <info>@enunomaduro</info>');

            $question = new Question('Enter the number of the Meetup that you want more information:');

            $bundle = $this->getHelper('question')->ask($input, $output, $question);

            $output->writeln('<error>Feature not implemented yet.</error>');
        }
    }
}