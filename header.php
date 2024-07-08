<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dekiru
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dekiru' ); ?></a>

	<header id="masthead" class="site-header">

		<nav id="site-navigation" class="main-navigation">
			<a href="<?php echo home_url(); ?>" title="Return to the homepage" class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/foxyvoxel-logo-header.png"
					width="113" height="113" alt="<?php echo get_bloginfo('name'); ?>"
					class="logo-image"
				>

				<div class="logo-word-marquee">
					Foxy<br>Voxel
				</div>
			</a>

			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );

				get_template_part( 'template-parts/partial', 'social' );
			?>

			<button name="menu" class="hamburger menu-toggle hamburger--squeeze" type="button" aria-controls="primary-menu" aria-expanded="false" title="Menu">
				<span class="hamburger-box">
					<span class="hamburger-inner"><strong>Menu</strong></span>
				</span>
			</button>
		</nav>
	</header>

	<div id="content" class="site-content">
