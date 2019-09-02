<?php

/**
 * @param string $value
 * @param bool $inline
 * @return Parsedown|string
 */
function parsedown(?string $value = null, bool $inline = null)
{
    /**
     * @var Parsedown $parser
     */
    $parser = app('parsedown');

    if (!func_num_args()) {
        return $parser;
    }

    if (is_null($inline)) {
        $inline = config('parsedown.inline');
    }

    if ($inline) {
        return $parser->line($value);
    }

    return $parser->text($value);
}
