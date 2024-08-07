<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dekiru
 */

get_header();

$news_count = "0";
	
$first_id = null;
$second_id = null;
$third_id = null;
?>

	<div id="primary" class="content-area news-content">

		<main id="main" class="site-main news">
		<?php
		if ( have_posts() ) : ?>

			<div class="news-blocks">
				<?php /* Start the Loop */
				while ( have_posts() ) : the_post();
					$news_count++;
				?>
					<?php 
						$post_position = '';
						$this_post = get_the_ID();
						$news_counter = 'news-' . $news_count;

						$next_post_id = get_next_post_id($this_post);

						if (is_sticky($this_post)) {
							$sticky = true;
							$post_position = 'first-post';
						}
						// echo 'post= ' . $next_post_id;

						if ($next_post_id == null) {
							$first_id = $this_post;
							if ($sticky == true) {
								$post_position = 'second-post';
							} else {
								$post_position = 'first-post';
							}
							// echo 'first';
						} elseif ($next_post_id == $first_id) {
							$second_id = $this_post;
							if ($sticky == true) {
								$post_position = 'third-post';
							} else {
								$post_position = 'second-post';
							}
							// echo 'second';
						} elseif ($next_post_id == $second_id) {
							$third_id = $this_post;
							$post_position = 'third-post';
							// echo 'third';
						} elseif ($next_post_id == $third_id) {
							$fourth_id = $this_post;
							$post_position = 'fourth-post';
							// echo 'fourth';
						}

						$classes = array(
							'news-item', 
							$post_position,
							$news_counter
						);

					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

						<div class="post-thumbnail">
							<a href="<?php echo the_permalink(); ?>">
								<?php 
								if ($news_count == "1") {
									the_post_thumbnail('news-card-large');
								} elseif ( ($news_count == "2") || ($news_count == "3") ) {
									the_post_thumbnail('news-card-medium');
								} else {
									the_post_thumbnail('news-card-small');
								} 
								
								if(get_the_post_thumbnail() == null) : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="">
								<?php endif; 
								
								?>
							</a>
						</div>
						
						<div class="news-content">
							<header class="entry-header">
								<h2 class="entry-title">
									<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="entry-meta">
									<?php $post_date = get_the_date('d/m/y'); 
										echo $post_date;
									?>
								</div>
							</header>

							<div class="entry-content">
								<?php
								the_excerpt();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dekiru' ),
									'after'  => '</div>',
								) );
								?>
							</div>

							<footer class="entry-footer">
								<div class="cats">
									Category: <?php the_category(' '); ?>
								</div>
								<div class="tags">
									Tags: <?php the_tags('', ' '); ?>
								</div>
							</footer>
						</div>
					</article>

					<?php if ($post_position == "first-post") : ?>
						<div class="title-and-search">
							<p class="subtitle">Other news</p>

							<div class="search-form">
								<?php get_search_form(); ?>
							</div>
						</div>
					<?php endif; ?>

				<?php endwhile; ?>
			</div>

			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main>
	</div>

<?php
get_footer();
