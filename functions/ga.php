<?php
function tab_ga()
{
    $server_name = $_SERVER["SERVER_NAME"];
    $script = "<!-- GOOGLE ANALYTICS -->\n";
    $script .= "<script>\n";
    $script .= "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');\n";
    $script .= "ga('create', 'UA-141196648-1', '$server_name');\n";
    $script .= "</script>\n";
    $script .= "<!-- END GOOGLE ANALYTICS -->\n";
    echo $script;
    ?>
<?php }

add_action('wp_head', 'tab_ga');
