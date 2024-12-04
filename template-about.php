<?php
/**
 * Template Name: About
 *
 * @package dekiru
 */

get_header();

?>

	<div class="content-area">
		<main id="main" class="site-main">
			<?php 
				$intro = get_field('intro'); 
				$subtitle = $intro['subtitle'];
				$title = $intro['title'];
				$copy = $intro['copy'];
				$background = $intro['background_image'];
			?>
			<section class="about-intro">
				<?php if ($background) : ?>
					<div class="background-image">
						<img src="<?php echo $background['sizes']['large']; ?>" alt="" width="1920" height="1080" loading="lazy">
					</div>
				<?php endif; ?>

				<div class="section-content">
					<p class="subtitle"><?php echo $subtitle; ?></p>
					<h1 class="title"><?php echo $title; ?></h1>
					<div class="copy">
						<?php echo $copy; ?>
					</div>
				</div>
			</section>

			<?php if (have_rows('the_team')) : ?>
				<section class="the-team">
					<div class="section-content">
						<?php while(have_rows('the_team')) : the_row(); 
							$photo = get_sub_field('photo');
							$details = get_sub_field('details');
							$name = $details['name'];
							$position = $details['position'];
							$bio = $details['bio'];
							// $social_link = $details['social_link'];
						?>
							<div class="team-member">
								<div class="photo">
									<?php if ($photo) : ?>
										<img src="<?php echo $photo['sizes']['large']; ?>" alt="<?php echo $name; ?> – <?php echo $position; ?>" width="330" height="330" loading="lazy">
									<?php else : ?>
										<div class="placeholder"></div>
									<?php endif; ?>

									<?php while (have_rows('details')) : the_row(); ?>
									
										<?php if (have_rows('social_links')) : ?>
											<div class="team-social-links">
												<?php while (have_rows('social_links')) : the_row(); 
													$social_link = get_sub_field('social_link');
													$social_icon = get_sub_field('social_icon');
												?>
												<a href="<?php echo $social_link; ?>" class="social-link">
													<img src="<?php echo $social_icon['url']; ?>" alt="<?php echo $name; ?>" width="24" height="24" loading="lazy">
												</a>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>

								</div>
								<h2 class="name"><?php echo $name; ?></h2>
								<p class="position"><?php echo $position; ?></p>
								<div class="bio">
									<?php echo $bio; ?>
								</div>
								
							</div>
						<?php endwhile; ?>
					</div>
				</section>
			<?php endif; ?>

			
			<?php 
				$careers_banner = get_field('careers_banner'); 
				$subtitle = $careers_banner['subtitle'];
				$title = $careers_banner['title'];
				$copy = $careers_banner['copy'];
				$button_text = $careers_banner['button_text'];
				$button_link = $careers_banner['button_link'];
			
				if ($title && $copy) :
			?>
				<section class="careers-banner">
					<div class="section-content">
						<p class="subtitle"><?php echo $subtitle; ?></p>
						<h2 class="title"><?php echo $title; ?></h2>
						<?php echo $copy; ?>
						<a href="<?php echo $button_link; ?>" class="fv-button fv-button-short">
							<?php echo $button_text; ?>
						</a>
					</div>
				</section>
			<?php endif; ?>
		</main>
	</div>

<?php
get_footer();