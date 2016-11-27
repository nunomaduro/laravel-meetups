<?php

namespace LaravelMeetups\Contracts\Fields;

use PHPHtmlParser\Dom;

interface Field
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