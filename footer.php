<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dekiru
 */

?>

	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<div class="logo">
			Foxy Voxel
		</div>

		<?php get_template_part( 'template-parts/partial', 'social' ); ?>

		<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_id'        => 'footer-menu',
				'menu_class'	=> 	'menu'
			) );
		?>

		<div class="information">
			<p>&copy;<?php echo date('Y'); ?> Foxy Voxel</p>
			<p>Site design by <a href="https://www.fullyillustrated.com" title="Game UI. Game Art. Website Design. Illustration. Branding. Animation and much more… Fully Illustrated">Fully Illustrated</a> Build by <a href="https://dekiru.uk" title="Dekiru. Website design and build for indie games studios.">Dekiru</a></p>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>