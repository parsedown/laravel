<?php

return [
    /**
     * Tells **Parsedown** if it should convert line breaks such as `\n` into `<br />` tags.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'breaks_enabled' => false,

    /**
     *  Tells the `parsedown()` helper and the `@parsedown` **Blade** directive if the user input should be inline parsed by default.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'inline' => false,

    /**
     * Tells **Parsedown** if it should escape **HTML** in trusted input. This method isn't safe from XSS!
     *
     * @see https://github.com/erusev/parsedown#escaping-html
     */
    'markup_escaped' => false,

    /**
     * Tells **Parsedown** if it needs to process untrusted user-input.
     *
     * @see https://github.com/erusev/parsedown#security
     */
    'safe_mode' => true,

    /**
     * Tells **Parsedown** if it should automatically convert urls into anchor tags.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'urls_linked' => true,

    /**
     * Tells **Parsedown** which block types to disable.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'disabled_block_types' => [],

    /**
     * Tells **Parsedown** which inline types to disable.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'disabled_inline_types' => [],
];
