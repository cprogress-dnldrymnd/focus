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
require_once('includes/post-types.php');

function action_wp_footer()
{
?>
	<script>
		jQuery(document).ready(function() {
			header_height();
			fixed_header_bg_mobile();
			mobile_header();
		});

		jQuery(document).scroll(function() {
			header_background();
		});

		function header_background() {
			$scrolltop = jQuery(document).scrollTop();
			if ($scrolltop > 0) {
				jQuery('body').addClass('mobile-header-bg');
			} else {
				jQuery('body').removeClass('mobile-header-bg');
			}
		}

		function mobile_header() {

			jQuery(document).on("click", '.elementor-item.has-submenu', function(event) {
				jQuery('.elementor-item.has-submenu').not(this).each(function() {
					jQuery(this).removeClass('highlighted').attr('aria-expanded', 'false');
					jQuery(this).next().hide();

					console.log('xxxxx');
				});
			});
		}


		function header_height() {
			$header_height = jQuery('div[data-elementor-type="header"]').outerHeight();
			jQuery('body').css('--header-height', $header_height + 'px');
			jQuery('body').css('--header-height-negative', '-' + $header_height + 'px');
		}


		function fixed_header_bg_mobile() {
			setTimeout(function() {
				$header_height = jQuery('div[data-elementor-type="header"]').outerHeight();
				$section_height = jQuery('#main > div > .elementor-section:first-child').outerHeight();

				$height = $header_height + $section_height;

				if (window.innerWidth > 992) {
					$compare = 1000;
				} else if (window.innerWidth > 767 && window.innerWidth < 991) {
					$compare = 850
				} else if (window.innerWidth > 576 && window.innerWidth < 768) {
					$compare = 850;
				} else {
					$compare = 500;
				}

				if ($height > $compare) {
					jQuery("#top-bg").css('height', $height + 100 + "px");
				}
			}, 300);

		}
	</script>
<?php
}

add_action('wp_footer', 'action_wp_footer');


add_filter('body_class', 'custom_class');
function custom_class($classes)
{

	$disable_top_padding = carbon_get_the_post_meta('disable_top_padding');
	$hide_top_bg_on_mobile = carbon_get_the_post_meta('hide_top_bg_on_mobile');


	if ($disable_top_padding) {
		$classes[] = 'disable-padding-top';
	}

	if ($hide_top_bg_on_mobile) {
		$classes[] = 'hide-top-bg-mobile';
	}
	return $classes;
}


function action_admin_head()
{
?>
	<?php
	if (get_current_user_id() != 1) {
	?>
		<style>
			#toplevel_page_vamtam_theme_setup {
				display: none !important;
			}
		</style>
<?php
	}
}

add_action('admin_head', 'action_admin_head');


add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
function translate_text($translated)
{
	$words = array(
		// 'word to translate' => 'translation'
		'VamTam' => 'F0CUS',
	);
	$translated = str_ireplace(array_keys($words), $words, $translated);
	return $translated;
}



//download product brochure
add_filter('gform_confirmation_1', 'custom_confirmation', 10, 4);
function custom_confirmation($confirmation, $form, $entry, $ajax)
{
	if ($form['id'] == '101') {
		$confirmation = array('redirect' => 'http://www.google.com');
	} elseif ($form['id'] == '102') {
		$confirmation = "Thanks for contacting us. We will get in touch with you soon";
	}
	return $confirmation;
}
