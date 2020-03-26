<?php
if (!function_exists('the_meta_description')) {
    function the_meta_description()
    {
        $description = get_bloginfo('description');
        if (is_page() || is_single()) {
            $description = get_the_excerpt();
        }
        echo '<meta name="description" content="' . $description . '">' . PHP_EOL;
    }
}