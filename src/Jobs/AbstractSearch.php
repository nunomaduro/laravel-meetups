<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Jobs;

use LaravelMeetups\Contracts\Config;
use PHPHtmlParser\Dom;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class AbstractSearch
 *
 * @package LaravelMeetups\Jobs
 */
abstract class AbstractSearch
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    protected $config;

    /**
     * Holds a instance of input.
     *
     * @var InputInterface
     */
    protected $input;

    /**
     * Holds a instance of analyser.
     *
     * @var Dom
     */
    protected $dom;

    public function __construct(Config $config, InputInterface $input, Dom $dom = null)
    {
        $this->config = $config;
        $this->input = $input;
        $this->dom = $dom ?: new Dom();
    }
}
