<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dekiru
 */


$posts_page = get_option( 'page_for_posts' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<p class="subtitle">Latest news</p>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<p class="posted-on"><?php the_time('d/m/Y'); ?></p>

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
				
			</div>
		<?php endif; ?>
	</header>

	<?php // dekiru_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dekiru' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dekiru' ),
			'after'  => '</div>',
		) );
		?>
	</div>
</article>
