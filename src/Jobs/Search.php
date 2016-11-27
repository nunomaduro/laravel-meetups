<?php

namespace LaravelMeetups\Jobs;

use Symfony\Component\Console\Input\InputInterface;
use LaravelMeetups\Http\Client\Transporter;
use LaravelMeetups\Http\Client\Strategy;
use LaravelMeetups\Http\Client\Query;
use PHPHtmlParser\Dom as Analyser;
use LaravelMeetups\Config;

class Search
{
    /**
     * Holds a instance of config.
     *
     * @var Config
     */
    private $config;

    /**
     * Holds a instance of input.
     *
     * @var InputInterface
     */
    private $input;

    /**
     * Holds a instance of analyser.
     *
     * @var Analyser
     */
    private $analyser;

    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config, InputInterface $input, Analyser $analyser = null)
    {
        $this->config = $config;
        $this->input = $input;
        $this->analyser = $analyser ?: new Analyser;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return array_map(function ($event) {
            $this->analyser->load($event->innerHtml, [
                'cleanupInput' => True
            ]);

            $analyser = $this->analyser;

            return array_map(function ($elem) use ($analyser) {
                return (new $elem)->find($analyser);
            }, $this->config->getElements());

        }, $this->getEvents());
    }

    /**
     * Returns the events.
     *
     * @return array
     */
    private function getEvents()
    {
        for ($i = 1; $i < 10; $i++) {
            $this->config->setRadius($i * 100);
            $body = (new Transporter)->execute(
                new Query(new Strategy($this->config))
            );

            $this->analyser->load($body);
            $events = $this->analyser->getElementsByClass('event-listing-container-li');

            if (count($events) > 10) {
                return $events->toArray();
            }
        }

        return [];
    }
}