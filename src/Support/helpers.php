<?php

/**
 * @param string $text
 * @return string
 */
function parsedown($text)
{
    /**
     * @var Parsedown $parser
     */
    $parser = app('parsedown');

    return $parser->text($text);
}
