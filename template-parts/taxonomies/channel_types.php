<?php
/**
 * The template for displaying taxonomy 'channel types'
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
	$term = get_term_by('slug', get_query_var('term'), 'channel_types');
	$channels = get_posts( array(
		'numberposts' => -1,
		'post_type'   => 'channels_tv',
		'tax_query' => array(
			array(
				'taxonomy' => $term->taxonomy,
				'field' => 'term_id', 
				'terms' => $term->term_id
			)
		)
	) );
?>


<div class="common-content-block channels-block">
	<h1 class="block-title"><?=$term->name?></h1>
	<ul class="channels-list">
		<?php
			foreach($channels as $channel){
				?>
		<li>
			<div class="logo">
				<img src="<?=get_field("channel-image",$channel->ID)?>">
			</div>
			<text class="title"><?=$channel->post_title?></text>
			<text class="price"><?=number_format_i18n(get_field('channel-main-price', $channel->ID))?><i class="fa fa-rub" aria-hidden="true"></i></text>
			<a target="_blank" rel="noopener noreferrer" href="<?=get_post_permalink( $channel->ID)?>" class="open">Перейти</a>
		</li>
				<?php
			}
		?>
		
	</ul>
</div>
