<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dekiru
 */

get_header();

$bg_image = get_field('default_page_background_image', 'option');
?>
	<section id="primary" class="content-area">
		<div class="background-image">
			<img src="<?php echo $bg_image['sizes']['hd']; ?>"
				alt="" width="1920" height="1080"
				loading="lazy"
			>
		</div>

		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'dekiru' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header>
				
				<div class="search-form">
					<?php get_search_form(); ?>
				</div>

				<div class="news-blocks">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile; ?>


			</div>

			<?php the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main>
	</section>

<?php
get_footer();
