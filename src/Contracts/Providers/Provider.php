<?php

namespace LaravelMeetups\Contracts\Providers;

use PHPHtmlParser\Dom;

interface Provider
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param  Dom $dom
     *
     * @return string
     */
    public function find(Dom $dom);
}