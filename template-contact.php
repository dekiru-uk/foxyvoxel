<?php
/**
 * Template Name: Contact
 *
 * @package dekiru
 */

get_header();

$intro = get_field('intro');
$form = get_field('form');
$form_id = $form->ID;

?>

	<div class="content-area">
		<main id="main" class="site-main contact-us">
			<div class="section-content">
				<div class="image-block">
				</div>

				<div class="form-block">
					<h1 class="section-title"><?php the_title(); ?></h1>
					<?php echo $intro; ?>
					<?php // [forminator_form id="196"] 
						echo do_shortcode( '[forminator_form id="' . $form_id . '"]' );
					?>
				</div>
			</div>

		</main>
	</div>

<?php
get_footer();