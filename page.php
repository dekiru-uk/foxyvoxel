<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dekiru
 */

get_header();

$background_image = get_field('default_page_background_image','option');
?>

	<div id="primary" class="content-area">
		<div class="background-image">
			<img src="<?php echo $background_image['sizes']['hd']; ?>" alt="<?php echo $background_image['alt']; ?>">
		</div>
		
		<main id="main" class="site-main page">

			<h1 class="section-title"><?php the_title(); ?></h1>
			<?php echo the_content(); ?>

		</main>
	</div>

<?php
get_footer();
