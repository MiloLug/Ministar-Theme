<?php
/**
 * The page for displaying taxonomy
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ministar
 */

get_header();
?>
	<?php
		$term = get_query_var('term');
		$tax = get_query_var('taxonomy');

		get_template_part( 'template-parts/taxonomies/'.$tax,  $term);
	?>

<?php
get_footer();
?>