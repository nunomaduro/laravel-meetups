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
     * Returns the fields of an event.
     *
     * @return []Fields\Field
     */
    public function getElements();
}