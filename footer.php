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
		<div class="footer-content">
			<div class="logo">
				
			</div>

			<div class="copy">
				<?php echo get_field('footer_copy','options'); ?>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>