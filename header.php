<?php

/**
 * Header template
 *
 * @package vamtam/numerique
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo sanitize_hex_color(vamtam_get_option('accent-color', 1)) ?>">

	<?php if (is_singular() && pings_open()) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php endif ?>

	<?php wp_head(); ?>
</head>
<?php
$top_background_style = carbon_get_the_post_meta('top_background_style');
?>

<body <?php body_class(); ?> <?= $top_background_style ?>>

	<div id="top"></div>
	<?php if ($top_background_style && $top_background_style != 'background-none') { ?>
		<div id="top-bg" class="background-style <?= $top_background_style ? $top_background_style : 'background-style-default' ?>"></div>
	<?php } ?>
	<?php
	wp_body_open();
	do_action('vamtam_body');
	?>

	<?php
	if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) {
		get_template_part('templates/header');
	}
	?>
	<div id="page" class="main-container">
		<div id="main-content">
			<?php get_template_part('templates/header/sub-header'); ?>

			<?php
			$classes = 'vamtam-main layout-' . VamtamTemplates::get_layout();
			if (is_singular('give_forms')) {
				$classes .= ' vamtam-give-container';
			}
			?>
			<div id="main" role="main" class="<?php echo esc_attr($classes); ?>">
				<?php do_action('vamtam_inside_main') ?>

				<?php if (VamtamTemplates::had_limit_wrapper()) : ?>
					<div class="limit-wrapper vamtam-box-outer-padding">
					<?php endif; ?>