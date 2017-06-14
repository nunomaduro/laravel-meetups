<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Jobs\Detail;

use LaravelMeetups\Contracts\Jobs\Search as Contract;
use LaravelMeetups\Http\Client\Detail\Strategy;
use LaravelMeetups\Http\Client\Query;
use LaravelMeetups\Http\Client\Transporter;
use LaravelMeetups\Jobs\AbstractSearch;

/**
 * Class Search
 *
 * @package LaravelMeetups\Jobs\Detail
 */
class Search extends AbstractSearch implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $link = $this->dom->getElementsByClass('.event')->getAttribute('href');

        $this->config->setUrl($link);

        $body = (new Transporter())->execute(
            new Query(new Strategy($this->config))
        );

        $dom = $this->dom->load($body);

        return array_map(function ($elem) use ($dom) {
            return (new $elem())->find($dom);
        }, $this->config->getDetailProviders());
    }
}
