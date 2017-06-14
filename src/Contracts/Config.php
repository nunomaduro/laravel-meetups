<?php

/**
 * This file is part of Laravel Meetups.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace LaravelMeetups\Contracts;

/**
 * Interface Config
 *
 * @package LaravelMeetups\Contracts
 */
interface Config
{
    /**
     * Sets the radius.
     *
     * @param int $radius
     *
     * @return $this
     */
    public function setRadius($radius);

    /**
     * Sets the max radius.
     *
     * @param int $maxRadius
     *
     * @return $this
     */
    public function setMaxRadius($maxRadius);

    /**
     * Sets the url.
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url);

    /**
     * Returns the url.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Returns the all meetups param.
     *
     * @return bool
     */
    public function getAllMeetups();

    /**
     * Returns the keywords param.
     *
     * @return string
     */
    public function getKeywords();

    /**
     * Returns the max radius param.
     *
     * @return int
     */
    public function getMaxRadius();

    /**
     * Returns the radius interval param.
     *
     * @return int
     */
    public function getRadiusInterval();

    /**
     * Returns the radius  param.
     *
     * @return int
     */
    public function getRadius();

    /**
     * Returns the catalog providers of an event.
     *
     * @return []Providers
     */
    public function getCatalogProviders();

    /**
     * Returns the detail providers of an event.
     *
     * @return []Providers
     */
    public function getDetailProviders();
}
