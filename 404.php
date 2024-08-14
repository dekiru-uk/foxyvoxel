<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dekiru
 */

get_header();

$background_image = get_field('default_page_background_image','option');
?>

	<div id="primary" class="content-area">
		<div class="background-image">
			<img src="<?php echo $background_image['sizes']['hd']; ?>" alt="<?php echo $background_image['alt']; ?>">
		</div>

		<main id="main" class="site-main error-404">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dekiru' ); ?></h1>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dekiru' ); ?></p>

				<?php
				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );
				?>

				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'dekiru' ); ?></h2>
					<ul>
						<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
						?>
					</ul>
				</div>

				<?php
				/* translators: %1$s: smiley */
				$dekiru_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'dekiru' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$dekiru_archive_content" );

				the_widget( 'WP_Widget_Tag_Cloud' );
				?>
			</div>
		</main>
	</div>

<?php
get_footer();
