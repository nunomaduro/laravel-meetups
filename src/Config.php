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
    private $url = 'https://www.meetup.com/find/events/';

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
     * All catalog providers.
     *
     * @var array
     */
    private $catalogProviders = ['LaravelMeetups\Providers\Catalog\Option', 'LaravelMeetups\Providers\Catalog\Date', 'LaravelMeetups\Providers\Catalog\Title', 'LaravelMeetups\Providers\Catalog\Location', 'LaravelMeetups\Providers\Catalog\Members',];

    /**
     * All detail providers.
     *
     * @var array
     */
    private $detailProviders = ['LaravelMeetups\Providers\Detail\Title', 'LaravelMeetups\Providers\Detail\Join',];


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
    public function setUrl($url)
    {
        $this->url = $url;

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
    public function getCatalogProviders()
    {
        return $this->catalogProviders;
    }

    /**
     * {@inheritdoc}
     */
    public function getDetailProviders()
    {
        return $this->detailProviders;
    }
}