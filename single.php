<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dekiru
 */

get_header();

$id = get_the_ID();


?>

	<div id="primary" class="content-area">
		<div class="background-image">
			<?php the_post_thumbnail('hd'); ?>
		</div>

		<main id="main" class="site-main single">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main>
	</div>

<?php
get_footer();
