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

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class App.
 */
class App extends Application
{
    /**
     * The single app command.
     *
     * @var Command
     */
    private $command;

    /**
     * Gets the name of the command based on input.
     *
     * @param InputInterface $input The input interface
     *
     * @return string The command name
     */
    protected function getCommandName(InputInterface $input)
    {
        return $this->getCommand()->getName();
    }

    /**
     * Gets the default commands that should always be available.
     *
     * @return array An array of default Command instances
     */
    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();

        $defaultCommands[] = $this->getCommand();

        return $defaultCommands;
    }

    /**
     * Returns the single app command.
     *
     * @return Command
     */
    private function getCommand()
    {
        $this->command === null && $this->command = new Command();

        return $this->command;
    }

    /**
     * Overridden so that the application doesn't expect the command
     * name to be the first argument.
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();

        $inputDefinition->setArguments();

        return $inputDefinition;
    }
}
