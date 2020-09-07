<?php
/**
 *Template Name: Ministar Реклама на Радио
 *Template Post Type: page
 *
 * @package ministar
 */

get_header();
?>

	<div class="first-block-content-wrapper">
		<div id="scene">
			<div data-depth="0.2" class="case-parallax">
				<ul class="logos-band logos-bands">
					<?php
						$rows = get_field('bg-logotypes');
						$row;
						$i = 0;
						while(($row = array_pop($rows)) && $i < 25) {
							$i++;
							?>
							<li class="logotype logotype<?=$i?>">
								<a href="<?=$row['link']?$row['link']:'#'?>">
									<img src="<?=$row['image']?>" alt="" class="LogoFile<?=$i?> LogoFile">
								</a>
							</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
		<div class="first-block-content">
			<h1><?=get_field("header-title")?></h1>
			<p><?=get_field("header-description")?></p>
			<a href="" class="special-offets">Посмотреть Спецпредложения</a>
		</div>
	</div>
	<div class="second-block-content-wrapper">
		<ul class="advantages">
			<li>
				<img   class="img-advantages"  src="<?=get_template_directory_uri()?>/img/dv1.png" alt="">
				<img class="shadow-img-advantages" src="<?=get_template_directory_uri()?>/img/dv_sh.png" alt="">
				<p>Оптимальные варианты размещения с учетом Вашего бюджета и целевой аудитории</p>
			</li>
			<li>
				<img class="img-advantages"   src="<?=get_template_directory_uri()?>/img/dv2.png" alt="">
				<img class="shadow-img-advantages" src="<?=get_template_directory_uri()?>/img/dv_sh.png" alt="">
				<p>Оперативный расчет и запуск
					рекламной кампании
				</p>
			</li>
			<li>
				<img  class="img-advantages"  src="<?=get_template_directory_uri()?>/img/dv3.png" alt="">
				<img class="shadow-img-advantages" src="<?=get_template_directory_uri()?>/img/dv_sh.png" alt="">
				<p>Дополнительные скидки</p>
			</li>
			<li>
				<img  class="img-advantages"  src="<?=get_template_directory_uri()?>/img/dv4.png" alt="">
				<img class="shadow-img-advantages" src="<?=get_template_directory_uri()?>/img/dv_sh.png" alt="">
				<p>Бесплатная аналитика</p>
			</li>
		</ul>
	</div>
	<div class="three-block-content-wrapper">
		<?php
		
		$channels = get_posts( array(
			'numberposts' => -1,
			'post_type'   => 'channels_radio'
		) );
		
		?>
		<div class="tabs-wrapper">
			<div class="tabs">
				Доступные радиостанции
			</div>
			<div class="tab_content">
				<div class="tab_item">
					<div class="tab-item-content">
						<?php
							$c = count($channels);
							$k = $c/3;
							if(((int)$k) < $k)
								$k = (int)$k + 1;
							for($i = 0; $i < $c; $i+=$k){?>
								<ul><?php
									for($j = $i; $j < ($i+$k) && $j < $c; $j++){
										$channel = $channels[$j];
										?><li><a href="<?=get_post_permalink($channel->ID)?>"><?=$channel->post_title?></a></li><?php
									}?>
								</ul><?php
							}
						?>
					</div>
					<div class="overlay">
						<span class="show-all-tab-content">Смотреть полный список радиостанций<i class="fas fa-arrow-down"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="four-block-content-wrapper">
		<?php
			get_template_part( 'template-parts/common/slider', 'from-1998' );
		?>
		<p>Работаем с 1998 года</p>
	</div>
<?php
get_footer();
