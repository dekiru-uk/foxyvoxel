<?php
/**
 * Template Name: Careers
 *
 * @package dekiru
 */

get_header();

$header = get_field('header');

$subtitle = $header['subtitle'];
$title = $header['title'];
$intro = $header['intro'];
$background_image = $header['background_image'];
$divider_title = $header['divider_title'];

?>

	<div class="content-area">
		<main id="main" class="site-main careers-main">

			<div class="hero-slide">
				<div class="background-image">
					<img src="<?php echo $background_image['sizes']['hd']; ?>" alt="<?php echo $background_image['alt']; ?>">
				</div>

				<div class="slide-content">
					<p class="subtitle"><?php echo $subtitle; ?></p>
					<h1 class="title"><?php echo $title; ?></h1>
					<div class="intro">
						<?php echo $intro; ?>
					</div>

				</div>
			</div>

			<div class="open-roles">
				<div class="section-content">
					<?php
						$args = array(
							'post_type'      => 'page',
							'posts_per_page' => -1,
							'post_parent'    => $post->ID,
							'order'          => 'ASC',
							'orderby'        => 'menu_order'
						);

						$parent = new WP_Query( $args );

						if ( $parent->have_posts() ) : ?>
							<h3 class="divider-title"><?php echo $divider_title; ?></h3>
							<div class="jobs-listings">
								<?php while ( $parent->have_posts() ) : $parent->the_post(); 
									// $job_title = get_field( 'job_title', $post->ID );
									$job_title = get_the_title( $post->ID );
									$job_slug = sanitize_title( $job_title );

									$overview = get_field( 'overview', $post->ID );
									$about_the_role = get_field( 'about_the_role', $post->ID );
									
								?>	
									<div class="position" id="<?php echo $job_slug; ?>" href="<?php echo get_the_permalink();?>">
										<p class="subtitle">Role</p>
										<h4 class="title"><?php echo $job_title; ?></h4>
										<div class="overview">
											<?php echo $overview; ?>
										</div>

										<a href="<?php echo get_the_permalink(); ?>" class="fv-button read-more">
											Read more &amp; apply
										</a>
									</div>
								<?php endwhile; ?>
							</div>

						<?php else : 
							$no_positions_open_text	= get_field('no_positions_open_text');
							$npo_subtitle = $no_positions_open_text['subtitle'];
							$npo_title = $no_positions_open_text['title'];
							$npo_copy = $no_positions_open_text['copy'];
						?>
							<div class="position none">
								<p class="subtitle"><?php echo $npo_subtitle; ?></p>
								<h4 class="title"><?php echo $npo_title; ?></h4>
								<div class="overview">
									<?php echo $npo_copy; ?>
								</div>
							</div>

						<?php endif;
						
					wp_reset_postdata(); ?>
				</div>
			</div>
			

		</main>
	</div>

<?php
get_footer();