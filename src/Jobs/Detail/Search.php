<?php

namespace LaravelMeetups\Jobs\Detail;

use LaravelMeetups\Contracts\Jobs\Search as Contract;
use LaravelMeetups\Http\Client\Detail\Strategy;
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
        $link = $this->dom->getElementsByClass('.event')->getAttribute('href');

        $this->config->setUrl($link);

        $body = (new Transporter)->execute(
            new Query(new Strategy($this->config))
        );

        $dom = $this->dom->load($body);

        return array_map(function ($elem) use ($dom) {
            return (new $elem)->find($dom);
        }, $this->config->getDetailProviders());
    }
}