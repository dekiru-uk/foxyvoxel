<?php
/**
 * Template Name: Home
 *
 * @package dekiru
 */

get_header();

?>

	<div class="content-area">
		<main id="main" class="site-main">
			<?php get_template_part( 'template-parts/partial', 'home-hero' ); ?>
			<?php get_template_part( 'template-parts/partial', 'intro' ); ?>
			<?php get_template_part( 'template-parts/partial', 'newsletter' ); ?>
		</main>
	</div>

<?php
get_footer();