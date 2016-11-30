<?php

namespace LaravelMeetups\Jobs\Catalog;

use LaravelMeetups\Contracts\Jobs\Search as Contract;
use LaravelMeetups\Http\Client\Catalog\Strategy;
use LaravelMeetups\Http\Client\Transporter;
use LaravelMeetups\Jobs\AbstractSearch;
use LaravelMeetups\Http\Client\Query;

class Search extends AbstractSearch implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return array_map(function($event) {
            $dom = $this->dom->load($event->innerHtml);

            return new Bag(clone $dom, array_map(function($elem) use ($dom) {
                return (new $elem)->find($dom);
            }, $this->config->getCatalogProviders()));
        }, $this->getEvents());
    }

    /**
     * Returns the catalog of events.
     *
     * @todo   Rethink about this lazy implementation
     * @return array
     */
    private function getEvents()
    {
        for ($i = 1; $i < 10; $i++) {
            $this->config->setRadius($i * 100);

            $body = (new Transporter)->execute(new Query(new Strategy($this->config)));

            $events = $this->dom->load($body)->getElementsByClass('event-listing-container-li');

            if (count($events) > 10) {
                return $events->toArray();
            }
        }

        return [];
    }
}