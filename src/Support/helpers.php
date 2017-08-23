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
    $parser = resolve('parsedown');

    return $parser->text($text);
}
