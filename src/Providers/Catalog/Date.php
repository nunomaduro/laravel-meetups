<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Providers\Catalog;

use LaravelMeetups\Contracts\Providers\Provider as Contract;
use PHPHtmlParser\Dom;

/**
 * Class Date
 *
 * @package LaravelMeetups\Providers\Catalog
 */
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
