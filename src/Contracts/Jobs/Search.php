<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Contracts\Jobs;

use LaravelMeetups\Contracts\Config;
use PHPHtmlParser\Dom;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Interface Search.
 */
interface Search
{
    /**
     * Creates an new instance of the class.
     *
     * @param Config         $config
     * @param InputInterface $input
     * @param Dom|null       $dom
     */
    public function __construct(Config $config, InputInterface $input, Dom $dom = null);

    /**
     * Try's to find information using the provided config and analyser.
     *
     * @return array
     */
    public function execute();
}
