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


?>

	<div id="primary" class="content-area news-content">

		<main id="main" class="site-main news">
			<div class="news-blocks">
		<?php
		if (is_home() && !is_paged()) : ?>

			<?php
				$args1 = array(
					'posts_per_page' => 1,        // Limit to one post
					'ignore_sticky_posts' => 1, // Ignore sticky posts
					'tag__not_in'    => array(get_term_by('slug', 'minor', 'post_tag')->term_id), // Exclude posts with 'minor' tag
				);

				$query1 = new WP_Query($args1);

				$first_post_id = null;  // Initialize a variable to store the ID of the first post

				if ($query1->have_posts()) :
					while ($query1->have_posts()) : $query1->the_post();
						$first_post_id = get_the_ID();  // Store the ID of the first post

						$classes = array(
							'news-item',
							'first-post'
						);
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
						<div class="post-thumbnail">
							<a href="<?php echo the_permalink(); ?>">
								<?php 
								the_post_thumbnail('news-card-large');
								
								if(get_the_post_thumbnail() == null) : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-md.jpg" alt="No thumbnail" 
									width="490" height="276"
									loading="lazy">
								<?php endif; 
								
								?>
							</a>
						</div>
						
						<div class="news-content">
							<header class="entry-header">
								<p class="subtitle">Latest news</p>
							
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
								<a href="<?php echo the_permalink(); ?>">
									<?php
									the_excerpt();

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dekiru' ),
										'after'  => '</div>',
									) );
									?>
								</a>
							</div>

							<footer class="entry-footer">
								<?php if (get_the_category()) : ?>
									<div class="cats">
										Category: <?php the_category(' '); ?>
									</div>
								<?php endif; ?>
								<?php if (get_the_tags()) : ?>
									<div class="tags">
										Tags: <?php the_tags('', ' '); ?>
									</div>
								<?php endif; ?>

								<div class="read-more">
									<a href="<?php echo the_permalink(); ?>" class="fv-button">Read more</a>
								</div>
							</footer>
						</div>
					</article>
					
					<?php
					endwhile;
				endif;

				// Reset post data
				wp_reset_postdata();

				?>
					<div class="title-and-search">
						<p class="subtitle">Other news</p>

						<div class="search-form">
							<?php get_search_form(); ?>
						</div>
					</div>
				
				<?php
				// Second Query: Get all posts excluding the post from the first loop
				$args2 = array(
					'post__not_in'        => array($first_post_id), // Exclude the first post ID
					'ignore_sticky_posts' => 1,        // Exclude sticky posts
					'posts_per_page'      => 11
				);

				$query2 = new WP_Query($args2);

				$post_counter = 0;  // Initialize a counter to track post order

				if ($query2->have_posts()) :
					while ($query2->have_posts()) : $query2->the_post();
						$post_counter++;  // Increment post counter
						$class = '';  // Initialize class variable

						// Add class based on the order of the post
						if ($post_counter == 1) {
							$class = 'second-post';
						} elseif ($post_counter == 2) {
							$class = 'third-post';
						}

						$classes = array(
							'news-item',
							$class
						);

						// Display the post with dynamic class
						// echo '<div class="' . esc_attr($class) . '">';
						// the_title('<h2>', '</h2>');
						// the_content();
						// echo '</div>';
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
							<div class="post-thumbnail">
								<a href="<?php echo the_permalink(); ?>">
									<?php 
									if ($class == "second-post" || $class == "third-post") {
										the_post_thumbnail('news-card-large');
									} else {
										the_post_thumbnail('news-card-small');
									} 
									
									if(get_the_post_thumbnail() == null) : ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-md.jpg" alt="No thumbnail" 
										width="490" height="276"
										loading="lazy">
									<?php endif; ?>
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
									<a href="<?php echo the_permalink(); ?>">
										<?php
										the_excerpt();

										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dekiru' ),
											'after'  => '</div>',
										) );
										?>
									</a>
								</div>

								<footer class="entry-footer">
									<?php if (get_the_category()) : ?>
										<div class="cats">
											Category: <?php the_category(' '); ?>
										</div>
									<?php endif; ?>
									<?php if (get_the_tags()) : ?>
										<div class="tags">
											Tags: <?php the_tags('', ' '); ?>
										</div>
									<?php endif; ?>
								</footer>
							</div>

						</article>
					
					<?php
					endwhile;
				endif;

				// Reset post data after second loop
				wp_reset_postdata();
				?>	

			<?php // the_posts_navigation();

			else :
				// Else condition for pages that aren't the home page or are paginated

				// Determine the offset based on the paged number
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$offset = ($paged - 1) * 12; // Offset by 12 posts per page

				// Standard Query: Get the standard posts for paginated pages, starting from the 12th post
				$args_standard = array(
					'posts_per_page'      => 12,       // Display 12 posts per page
					'ignore_sticky_posts' => 1,        // Exclude sticky posts
					'offset'              => $offset   // Offset to start at the correct post number
				);

				$query_standard = new WP_Query($args_standard);

				if ($query_standard->have_posts()) :
					while ($query_standard->have_posts()) : $query_standard->the_post();
						// Display standard post
						// echo '<div class="standard-post">';
						// the_title('<h2>', '</h2>');
						// the_content();
						// echo '</div>';

						$classes = array(
							'news-item'
						);
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
						<div class="post-thumbnail">
							<a href="<?php echo the_permalink(); ?>">
								<?php 
								the_post_thumbnail('news-card-small');
								
								if(get_the_post_thumbnail() == null) : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-md.jpg" alt="No thumbnail" 
									width="490" height="276"
									loading="lazy">
								<?php endif; ?>
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
								<a href="<?php echo the_permalink(); ?>">
									<?php
									the_excerpt();

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dekiru' ),
										'after'  => '</div>',
									) );
									?>
								</a>
							</div>

							<footer class="entry-footer">
								<?php if (get_the_category()) : ?>
									<div class="cats">
										Category: <?php the_category(' '); ?>
									</div>
								<?php endif; ?>
								<?php if (get_the_tags()) : ?>
									<div class="tags">
										Tags: <?php the_tags('', ' '); ?>
									</div>
								<?php endif; ?>
							</footer>
						</div>
					</article>
					<?php
					endwhile;
				endif;

				// Reset post data after the standard loop
				wp_reset_postdata();
			
			endif;
			?>

			<?php if(function_exists('wp_paginate')):
      	wp_paginate(); 
			endif; ?>
		</main>

		<?php get_template_part( 'template-parts/partial', 'newsletter' ); ?>
	</div>

<?php
get_footer();
