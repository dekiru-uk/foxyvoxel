<?php
/**
 * Template Name: Career (Single)
 *
 * @package dekiru
 */

get_header();

$parent_id = wp_get_post_parent_id();

$header = get_field('header', $parent_id);
$background_image = $header['background_image'];

$location = get_field('location');
$type = get_field('type');
$working_location = get_field('working_location');

$about_the_role = get_field('about_the_role');

?>

	<div class="content-area">
		<main id="main" class="site-main career-single">
			<div class="background-image">
				<img src="<?php echo $background_image['sizes']['hd']; ?>" alt="<?php echo $background_image['alt']; ?>">
			</div>

			<div class="role">
				<div class="role-header">
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
				</div>

				<div class="job-description">
					<?php echo $about_the_role; ?>

					<div class="application-form">
						<button id="close-form" class="fv-button fv-close-button"><span>Close</span></button>
						<?php echo do_shortcode( '[forminator_form id="230"]' ); ?>
					</div>

					<div class="apply">
						<a href="#main" id="apply" class="fv-button">Apply</a>
					</div>
				</div>

			</div>
		</main>
	</div>

<?php
get_footer();