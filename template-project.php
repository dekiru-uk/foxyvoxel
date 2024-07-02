<?php
/**
 * Template Name: Project
 * The template for the long form homepage
 *
 * @package dekiru
 */

get_header();

?>

<?php get_template_part( 'template-parts/header-banner' ); ?>

	<div class="content-area">
		<main id="main" class="site-main">

        <?php if( have_rows('flexible_content') ): 
			while ( have_rows('flexible_content') ) : the_row();

				if( get_row_layout() == 'intro'):
                    get_template_part( 'template-parts/flexible', 'intro' );

				elseif( get_row_layout() == 'copy_block'):
					get_template_part( 'template-parts/flexible', 'copy_block' );

				elseif( get_row_layout() == 'wide_image'):
					get_template_part( 'template-parts/flexible', 'wide_image' );
                    
                elseif( get_row_layout() == 'two_up'):
                    get_template_part( 'template-parts/flexible', 'two_up' );

                elseif( get_row_layout() == 'three_up'):
                    get_template_part( 'template-parts/flexible', 'three_up' );

                elseif( get_row_layout() == 'device_scroller'):
                    get_template_part( 'template-parts/flexible', 'device_scroller' );

                elseif( get_row_layout() == 'tall_left_three_right'):
                    get_template_part( 'template-parts/flexible', 'tall_left_three_right' );

				endif;
			endwhile;
		endif; ?>

		</main>
	</div>

<?php
get_footer();