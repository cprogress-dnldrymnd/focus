<?php

function child_styles()
{
	wp_enqueue_style('my-child-theme-style', get_stylesheet_directory_uri() . '/style.css', array('vamtam-front-all'), false, 'all');
}
add_action('wp_enqueue_scripts', 'child_styles', 11);

/*-----------------------------------------------------------------------------------*/
/* Register Carbofields
/*-----------------------------------------------------------------------------------*/
add_action('carbon_fields_register_fields', 'tissue_paper_register_custom_fields');
function tissue_paper_register_custom_fields()
{
	require_once('includes/post-meta.php');
}

require_once('includes/shortcodes.php');

function action_wp_footer()
{
?>
	<script>
		jQuery(document).ready(function() {
			$header_height = jQuery('div[data-elementor-type="header"]').outerHeight();
			jQuery('body').css('--header-height', $header_height + 'px');
			jQuery('body').css('--header-height-negative', '-' + $header_height + 'px');
		});
	</script>
<?php
}

add_action('wp_footer', 'action_wp_footer');


add_filter('body_class', 'custom_class');
function custom_class($classes)
{

	$disable_top_padding = carbon_get_the_post_meta('disable_top_padding');
	if ($disable_top_padding) {
		$classes[] = 'disable-padding-top';
	}
	return $classes;
}
