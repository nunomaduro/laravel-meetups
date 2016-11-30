<?php

namespace LaravelMeetups\Contracts;

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
     * @return boolean
     */
    public function getAllMeetups();

    /**
     * Returns the keywords param.
     *
     * @return string
     */
    public function getKeywords();

    /**
     * Returns the radius param.
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