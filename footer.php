<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ministar
 */

?>
	<?php
		$contacts = get_field('contacts__', 'option');
	?>
	<footer id="colophon" class="site-footer footer">
		<div class="footer-content">
			
			<?php if ( is_active_sidebar( 'footer_w1' ) ) { ?>
				<?php dynamic_sidebar( 'footer_w1' ); ?>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer_w2' ) ) { ?>
				<?php dynamic_sidebar( 'footer_w2' ); ?>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer_w3' ) ) { ?>
				<?php dynamic_sidebar( 'footer_w3' ); ?>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer_w4' ) ) { ?>
				<?php dynamic_sidebar( 'footer_w4' ); ?>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer_w5' ) ) { ?>
				<?php dynamic_sidebar( 'footer_w5' ); ?>
			<?php } ?>
		</div>
		<a href="#" class="copy-footer">2007-2020 РА  Министар, г. Москва</a>
	</footer><!-- #colophon -->
</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>
