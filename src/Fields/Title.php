<?php

namespace LaravelMeetups\Fields;

use LaravelMeetups\Contracts\Fields\Field;
use PHPHtmlParser\Dom;

class Title implements Field
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Title';
    }

    /**
     * {@inheritdoc}
     */
    public function find(Dom $dom)
    {
        return $this->truncate($dom->getElementsByClass('event')->text(true));
    }

    /**
     * Truncates the tile to 10 chars.
     *
     * @param $title
     *
     * @return string
     */
    private function truncate($title)
    {
        if (mb_strlen($title) > 22) {
            return substr($title, 0, 20) . '..';
        }

        return $title;
    }
}