<?php 
function amazing_script() {
	wp_enqueue_style('amazing-style', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'amazing_script');
?>

