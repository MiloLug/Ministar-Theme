<?php
/**
 *Template Name: Ministar Каналы - список
 *Template Post Type: page
 *
 * @package ministar
 */

get_header();

$channels_tv = get_posts( array(
	'numberposts' => -1,
	'post_type'   => 'channels_tv',
	'suppress_filters' => true
) );

$channels_radio = get_posts( array(
	'numberposts' => -1,
	'post_type'   => 'channels_radio',
	'suppress_filters' => true
) );


?>

<script>
$( function() {
    $( "#tabs" ).tabs();
  } );
</script>
<div id="tabs" class="common-content-block channels-tabbed-block channels-block">
	<h1 class="block-title">Список всех каналов</h1>
	<ul>
		<li><a href="#tabs-tv">ТВ</a></li>
		<li><a href="#tabs-radio">Радио</a></li>
	</ul>
	<div id="tabs-tv">
		<ul class="channels-list">
			<?php
				foreach($channels_tv as $channel){
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
	<div id="tabs-radio">
		
	</div>
</div>

<?php

get_footer();