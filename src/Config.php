<?php

namespace LaravelMeetups;

use LaravelMeetups\Contracts\Config as Contract;

class Config implements Contract
{
    /**
     * The provider base url.
     *
     * @var string
     */
    private $url = 'https://www.meetup.com/find/events';

    /**
     * The all meetups param.
     *
     * If true, all the meetups will be displayed by the
     * provided.
     *
     * @var bool
     */
    private $allMeetups = true;

    /**
     * The keywords param.
     *
     * @var string
     */
    private $keywords = 'Laravel';

    /**
     * The radius param.
     *
     * @var int
     */
    private $radius = 25;

    /**
     * All the elements to search by event.
     *
     * @var array
     */
    private $elements = [
        'LaravelMeetups\Fields\Option',
        'LaravelMeetups\Fields\Date',
        'LaravelMeetups\Fields\Title',
        'LaravelMeetups\Fields\Location',
        'LaravelMeetups\Fields\Members',
    ];

    /**
     * {@inheritdoc}
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function getAllMeetups()
    {
        return $this->allMeetups;
    }

    /**
     * {@inheritdoc}
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * {@inheritdoc}
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * {@inheritdoc}
     */
    public function getElements()
    {
        return $this->elements;
    }
}