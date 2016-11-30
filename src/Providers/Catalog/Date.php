<?php

namespace LaravelMeetups\Providers\Catalog;

use PHPHtmlParser\Dom;
use LaravelMeetups\Contracts\Providers\Provider as Contract;

class Date implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Date';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        $elem = $dom->find('.event-listing');

        $date = (new \DateTime())->setDate(
            $elem->getAttribute('data-year'),
            $elem->getAttribute('data-month'),
            $elem->getAttribute('data-day')
        )->format('Y-m-d');

        return $date . ' ' . $dom->find('time')->text(true);
    }
}