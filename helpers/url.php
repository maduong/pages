<?php

use Edutalk\Base\Pages\Models\Contracts\PageModelContract;
use Edutalk\Base\Pages\Models\Page;

if (!function_exists('get_page_link')) {
    /**
     * @param Page $page
     * @return string
     */
    function get_page_link($page)
    {
        return route('front.web.resolve-pages.get', ['slug' => $page->slug]);
    }
}