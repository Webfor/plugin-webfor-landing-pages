<?php
/**
 * The template for displaying all Landing Page posts.
 *
 * @package webfor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Plugin Settings Fields
$site_logo = get_field('wflp_logo_image', 'option');
$header_scripts = get_field('wflp_header_scripts', 'option');
$footer_scripts = get_field('wflp_footer_scripts', 'option');
$custom_styles = get_field('wflp_custom_styles', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

		<link rel="stylesheet" id="wflp-css" href="<?php echo plugins_url('/includes/css/wflp-style.css',__FILE__ ); ?>" type="text/css" media="all">
		<link rel="stylesheet" id="wflp-fontawesome-css" href="<?php echo plugins_url('/includes/css/font-awesome.min.css',__FILE__ ); ?>" type="text/css" media="all">
		<link rel="stylesheet" id="swiperjs-css" href="<?php echo plugins_url('/includes/css/swiper.min.css',__FILE__ ); ?>" type="text/css" media="all">

		<?php if($header_scripts): ?>
			<?php echo $header_scripts; ?>
		<?php endif; ?>
		
		<?php include PLUGIN_PARTIALS_PATH . '/lp-style-vars.php'; ?>

		<?php if($custom_styles): ?>
		<style type="text/css">
			<?php echo $custom_styles; ?>
		</style>
		<?php endif; ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="wflp-wrapper">
		
			<?php 
				include PLUGIN_PARTIALS_PATH . '/lp-header.php'; 
				include PLUGIN_PARTIALS_PATH . '/lp-section-hero.php'; 
				include PLUGIN_PARTIALS_PATH . '/lp-section-flex.php'; 
				include PLUGIN_PARTIALS_PATH . '/lp-footer.php'; 
			?>

		</div><!-- #single-wrapper -->

		<?php if($footer_scripts): ?>
			<?php echo $footer_scripts; ?>
		<?php endif; ?>

		<script type="text/javascript" src="<?php echo plugins_url('/includes/js/swiper.min.js',__FILE__ ); ?>"></script>

		<?php wp_footer(); ?>
		
	</body>
	
</html>