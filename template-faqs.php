<?php
/**
 * Template Name: FAQs
 *
 * @package dekiru
 */

get_header();

?>

	<div class="content-area">
		<div class="background-image">
			<?php the_post_thumbnail('hd'); ?>
		</div>

		<main id="main" class="site-main">
			<h1 class="page-title">
				<span class="subtitle">Getting help</span><br>
				<?php the_title(); ?>
			</h1>

			<?php the_content(); ?>
		</main>
	</div>

<?php
get_footer();