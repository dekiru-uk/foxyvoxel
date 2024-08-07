<?php
/**
 * Template Name: Career (Single)
 *
 * @package dekiru
 */

get_header();

$location = get_field('location');
$type = get_field('type');
$working_location = get_field('working_location');

$about_the_role = get_field('about_the_role');

?>

	<div class="content-area">
		<main id="main" class="site-main career-single">
			<div class="role">
				<p class="subtitle">Role</p>
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="quick-details">
					<dl>
						<dt>Location</dt>
						<dd><?php echo $location; ?></dd>
						<dt>Type</dt>
						<dd><?php echo $type; ?></dd>
						<dt>Working Location</dt>
						<dd><?php echo $working_location; ?></dd>
					</dl>
				</div>

				<div class="job-description">
					<?php echo $about_the_role; ?>
				</div>

				<div class="application-form">
					<h2 class="title">Application Form</h2>
					<?php echo do_shortcode( '[forminator_form id="230"]' ); ?>
				</div>

				<div class="apply">
					<a href="#" class="fv-button">Apply</a>
				</div>
			</div>

			<?php get_template_part( 'template-parts/partial', 'newsletter' ); ?>
		</main>
	</div>

<?php
get_footer();