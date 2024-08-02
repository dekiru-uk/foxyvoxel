<?php
/**
 * Template Name: Game (Single)
 *
 * @package dekiru
 */

get_header();

?>

	<div class="content-area">
		<main id="main" class="site-main game-single">
			<?php //acf 
				$header_area = get_field('header_area');
				$game_logo = $header_area['game_logo'];
				$background_image = $header_area['background_image'];
				$trailer = $header_area['trailer'];

				$presspack__file = $header_area['presspack__file'];

				if ($presspack__file == 'link') {
					$presspack_link = $header_area['url'];
				} elseif ($presspack__file == 'file') {
					$presspack_file = $header_area['file'];
					$presspack_link = $presspack_file['url'];
				}

				$store_links = $header_area['store_links'];

				$main_background_image = get_field('background_image');
				$accent_color = get_field('accent_color');
			?>

			<?php if ($accent_color) : ?>
				<style>
					:root {
						--accent-color: <?php echo $accent_color; ?>;
					}
				</style>
			<?php endif; ?>

			<div class="hero-slide">
				<div class="background-image">
					<img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>">
				</div>

				<div class="slide-content">
					<img src="<?php echo $game_logo['url']; ?>"
						alt="<?php echo $game_logo['alt']; ?>"
						class="game-logo"
					>

					<div class="actions">
						<?php if ($store_links) : ?>
							<div class="purchase">
								<span>Buy now:</span>
								<?php foreach ($store_links as $store) : ?>
									<a href="<?php echo $store['link']; ?>" class="store-link">
										<img src="<?php echo $store['icon']['url']; ?>"
											alt="<?php echo $store['icon']['alt']; ?>"
											width="200" height="200"
										>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<?php if ($presspack_link) : ?>
							<a href="<?php echo $presspack_link; ?>" class="presspack pp-<?php echo $presspack__file; ?>">
								Press pack
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php // acf
				$intro = get_field('intro');
				$text = $intro['text'];
				$subtitle = $text['subtitle'];
				$title = $text['title'];
				$copy = $text['copy'];

				$media = $intro['media'];
				$image_or_video = $media['image_or_video'];

			?>
			<div class="game-details">
				<div class="content-background-image background-image">
					<img src="<?php echo $main_background_image['url']; ?>" 
						width="1920" height="1080"
						alt="" loading="lazy"
					>
				</div>

				<div class="game-intro">
					<div class="section-content">
						<div class="intro-copy">
							<p class="subtitle"><?php echo $subtitle; ?></p>
							<h1 class="title"><?php echo $title; ?></h1>
							<div class="copy"><?php echo $copy; ?></div>
						</div>

						<div class="intro-media">
							<?php if ($image_or_video == 'image') : ?>
								<?php
									$image = $media['image'];
									$image_url = $image['url'];
								?>
								<img src="<?php echo $image_url; ?>" 
									alt="<?php echo $image['alt']; ?>"
									width="<?php echo $image['width']; ?>"
									height="<?php echo $image['height']; ?>"
								>
							<?php elseif ($image_or_video == 'video') : 

								//second false skip ACF pre-processcing
								// $url = get_sub_field('video', false, false);
								if(have_rows('intro')) : 
									while(have_rows('intro')) : the_row();
										if(have_rows('media')) : 
											while(have_rows('media')) : the_row();
												$url = get_sub_field('video', false, false);
											endwhile;
										endif;
									endwhile;
								endif;
								//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
								$oembed = _wp_oembed_get_object();
								//get provider
								$provider = $oembed->get_provider($url);
								//fetch oembed data as an object
								$oembed_data = $oembed->fetch( $provider, $url );
								$thumbnail = $oembed_data->thumbnail_url;
								$iframe = $oembed_data->html;
								// $id = $oembed_data->id;

								if ($url) {
									parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
								}
								$video_id = $my_array_of_vars['v'];
							?>
								<a href="https://youtube.com/watch?v=<?php echo $video_id; ?>" class="modal-video">
									<img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" width="320" height="240" class="video-thumbnail" loading="lazy">
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<?php while(have_rows('content')) : the_row(); 
					
					if( get_row_layout() == 'title_block'):
						get_template_part( 'template-parts/flexible', 'title-block' );

					elseif( get_row_layout() == 'text_and_image'):
						get_template_part( 'template-parts/flexible', 'text-and-image' );

					elseif( get_row_layout() == 'gallery'):
						get_template_part( 'template-parts/flexible', 'gallery' );

					elseif( get_row_layout() == 'large_video'):
						get_template_part( 'template-parts/flexible', 'large-video' );

					endif;

				endwhile;?>
			</div>

		</main>
	</div>

<?php
get_footer();