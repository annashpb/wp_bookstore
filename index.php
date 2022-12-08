<?php get_header();

ob_start();
the_content();
$content_output = ob_get_clean();
echo $content_output;

get_footer();
