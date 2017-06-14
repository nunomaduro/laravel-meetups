<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Http\Client\Catalog;

use LaravelMeetups\Contracts\Http\Client\Strategy as Contract;
use LaravelMeetups\Http\Client\AbstractStrategy;

/**
 * Class Strategy
 *
 * @package LaravelMeetups\Http\Client\Catalog
 */
class Strategy extends AbstractStrategy implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return [
            'allMeetups' => $this->config->getAllMeetups() ? 'true' : 'false',
            'keywords' => $this->config->getKeywords(),
            'radius' => $this->config->getRadius(),
        ];
    }
}
