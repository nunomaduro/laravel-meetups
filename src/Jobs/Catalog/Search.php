<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Jobs\Catalog;

use LaravelMeetups\Contracts\Jobs\Search as Contract;
use LaravelMeetups\Http\Client\Catalog\Strategy;
use LaravelMeetups\Http\Client\Query;
use LaravelMeetups\Http\Client\Transporter;
use LaravelMeetups\Jobs\AbstractSearch;

/**
 * Class Search.
 */
class Search extends AbstractSearch implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        if ($maxRadius = $this->input->getArgument('max_radius')) {
            $this->config->setMaxRadius($maxRadius);
        }

        return array_map(function ($event) {
            $dom = $this->dom->load($event->innerHtml);

            return new Bag(clone $dom, array_map(function ($elem) use ($dom) {
                return (new $elem())->find($dom);
            }, $this->config->getCatalogProviders()));
        }, $this->getRows());
    }

    /**
     * Returns the catalog in rows.
     *
     * @return array
     */
    private function getRows()
    {
        $radius = $this->config->getRadiusInterval();
        $rows = [];

        while ($radius < $this->config->getMaxRadius()) {
            $this->config->setRadius($radius);
            $body = (new Transporter())->execute(new Query(new Strategy($this->config)));
            $rows = $this->dom->load($body)->getElementsByClass('event-listing-container-li') ?: [];
            $radius += $this->config->getRadiusInterval();
        }

        return is_array($rows) ? $rows : $rows->toArray();
    }
}
