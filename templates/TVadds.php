<?php
/**
 *Template Name: Ministar Реклама на ТВ
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
		<p class="advantages_p">У нас Вы можете ознакомиться с общей информацией о предлагаемых телеканалах, уточнить стоимость рекламы на телевидении, скачав оценочные расчеты на самых популярных телевизионных каналах по Москве и Российской Федерации, оставить заявку на размещение.</p>
	</div>
	<div class="three-block-content-wrapper">
		<img src="<?=get_template_directory_uri()?>/img/pult.png" alt="" class="background-pult">
		<h2>Просмотреть и скачать оценочные расчеты:</h2>
		<ul class="three-block-link-download">
			<?php
				$files_opt = get_field("files__", "options");
			?>
			<li>
				<img src="<?=get_template_directory_uri()?>/img/country1.png" alt="">
				<button class="pricing-live-moscow"><i class="far fa-file-excel"></i>Эфирные каналы - москва</button>
			</li>
			<li>
				<img src="<?=get_template_directory_uri()?>/img/country2.png" alt="">
				<button class="pricing-live-rf"><i class="far fa-file-excel"></i>Эфирные каналы - РФ</button>
			</li>
			<li>
				<img src="<?=get_template_directory_uri()?>/img/country3.png" alt="">
				<button class="pricing-thematic-rf"><i class="far fa-file-excel"></i>Тематические каналы - РФ</button>
			</li>
		</ul>
		<?php
		
		$channels_live = get_posts( array(
			'numberposts' => -1,
			'post_type'   => 'channels_tv',
			'tax_query' => array(
				array(
					'taxonomy' => 'channel_types',
					'field' => 'slug', 
					'terms' => 'live'
				)
			)
		) );
		$channels_nonlive = get_posts( array(
			'numberposts' => -1,
			'post_type'   => 'channels_tv',
			'tax_query' => array(
				array(
					'taxonomy' => 'channel_types',
					'field' => 'slug', 
					'terms' => 'non-live'
				)
			)
		) );
		
		?>
		<div class="tabs-wrapper">
			<div class="tabs">
				<span class="tab">Эфирное </span>
				<span class="tab">Неэфирное </span>
				телевидение
			</div>
			<div class="tab_content">
				<div class="tab_item">
					<div class="tab-item-content">
						<?php
							$c = count($channels_live);
							$k = $c/3;
							if(((int)$k) < $k)
								$k = (int)$k + 1;
							for($i = 0; $i < $c; $i+=$k){?>
								<ul><?php
									for($j = $i; $j < ($i+$k) && $j < $c; $j++){
										$channel = $channels_live[$j];
										?><li><a href="<?=get_post_permalink($channel->ID)?>"><?=$channel->post_title?></a></li><?php
									}?>
								</ul><?php
							}
						?>
					</div>
					<div class="overlay">
						<span class="show-all-tab-content">Смотреть полный список каналов<i class="fas fa-arrow-down"></i></span>
					</div>
				</div>
				<div class="tab_item">
					<div class="tab-item-content">
						<?php
							$c = count($channels_nonlive);
							$k = $c/3;
							if(((int)$k) < $k)
								$k = (int)$k + 1;
							for($i = 0; $i < $c; $i+=$k){?>
								<ul><?php
									for($j = $i; $j < ($i+$k) && $j < $c; $j++){
										$channel = $channels_nonlive[$j];
										?><li><a href="<?=get_post_permalink($channel->ID)?>"><?=$channel->post_title?></a></li><?php
									}?>
								</ul><?php
							}
						?>
					</div>
					<div class="overlay">
						<span class="show-all-tab-content">Смотреть полный список каналов<i class="fas fa-arrow-down"></i></span>
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
	<div class="five-block-content-wrapper">
		<h2>Спутниковое телевидение Триколор ТВ</h2>
		<div class="five-block-text">
			<img src="<?=get_template_directory_uri()?>/img/pricol.png" alt="">
			<p>Триколор ТВ обладает самой большой абонентской базой среди операторов спутникового телевидения в России. Более 32% населения России (~ 40 миллионов человек) - пользователи Триколор ТВ. Предлагаем размещение рекламы для абонентов Триколор ТВ на телеканалах Россия1, Первый канал, НТВ, ТНТ, Пятница, Матч ТВ, ТВ3 и Рен ТВ.</p>
		</div>
		<p>Размещение рекламы на телевидении - один популярных способов распространения информации, это удобный и очень действенный метод повышения популярности бренда и привлечения внимания покупателей.</p>
		<p>Реклама на телевидении бывает разной:</p>
		<ul>
			<li>Прямая - размещение ролика в рекламном блоке во время пауз между и внутри программы или фильма.</li>
			<li>Спонсорство - один из самых популярных видов рекламы на ТВ. Заказчик берет на себя все расходы по проведению программы или показу фильма. В таком виде подразумевает выход спонсорского ролика, объявление ведущего, аудио/видео интеграцию. Такой вариант очень эффективен и направлен на конкретную аудиторию.</li>
			<li>PR. Это может быть приглашение интересного гостя в студию или размещение на телевидении тематического сюжета. Просто и эффективно.</li>
		</ul>
		<a href="" class="special-offets">Посмотреть Спецпредложения</a>
	</div>

<?php
get_footer();
