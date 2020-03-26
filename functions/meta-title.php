<?php
if (!function_exists('the_meta_title')) {
    function the_meta_title()
    {
        echo '<title>';
        wp_title('-', true, 'right');
        // Add the blog name.
        bloginfo('name');
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " - $site_description";
        echo '</title>' . PHP_EOL;
    }
}