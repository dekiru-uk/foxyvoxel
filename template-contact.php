<?php
/**
 * Template Name: Contact
 *
 * @package dekiru
 */

get_header();

$image = get_field('image');
$connect_text = get_field('connect_text');

$intro = get_field('intro');
$form = get_field('form');
$form_id = $form->ID;

?>

	<div class="content-area">
		<main id="main" class="site-main contact-us">
			<div class="section-content">
				<div class="image-block">
					<img src="<?php echo $image['url']; ?>"
						alt="<?php echo $image['alt']; ?>"
						width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>"
						loading="lazy"
					>
				</div>

				<div class="connect">
					<div class="connect-title-box">
						<p class="connect-title"><?php echo $connect_text; ?></p>
					</div>
					<?php get_template_part( 'template-parts/partial', 'social' ); ?>
				</div>

				<div class="form-block">
					<h1 class="section-title"><?php the_title(); ?></h1>
					<div class="intro-copy">
						<?php echo $intro; ?>
					</div>
					<?php // [forminator_form id="196"] 
						echo do_shortcode( '[forminator_form id="' . $form_id . '"]' );
					?>
				</div>
			</div>

		</main>
	</div>

<?php
get_footer();