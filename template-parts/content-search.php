<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dekiru
 */

 $posts_page = get_option( 'page_for_posts' );

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
