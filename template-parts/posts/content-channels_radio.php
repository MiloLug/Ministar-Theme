<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ministar
 */

?>

<?php
	the_content();
?>
<div class="first-block-content-wrapper second-page">
		<div class="first-block-content">
			<h1><?=the_field("header-title")?></h1>
			<p><?=the_field("header-text")?></p>
			<div class="line"></div>
			<p>Стоимость 20 секунд эфира на радиостанции</p>
			<p class="p_price">от <?=number_format_i18n(get_field('channel-main-price'))?> рублей <a href="" class="special-offets">Снизить цену</a></p>
		</div>
		<div class="first-block-content-second">
			<img class="channel-logo-img" src="<?=get_field("channel-image")?>">
			<div class="channel-logo-bg radio"></div>
			<a href="#" class="special-offets">СДЕЛАТЬ ЗАПРОС</a>
			<a href="#" class="uslovia">Выгодные условия</a>
			<script>
				jQuery(function($){
					var minRatio = 0.9264705882352942;
					var minStableRatio = 1.1980280748663101;
					var maxRatio = 1.5517241379310345;
					var normal = maxRatio - minRatio;
					var tmpRatio;

					var $logo = $(".first-block-content-second .channel-logo-img");
					var $tv = $(".first-block-content-second .channel-logo-bg");
					var repeat = function(){
						tmpRatio = $tv.width() / $tv.height();
						$logo.css("top", (
							$tv.offset().top - $tv.parent().offset().top - $logo.height()/2
							+ (tmpRatio < minStableRatio || tmpRatio > maxRatio) * (1 - (tmpRatio - minRatio) / normal) * (
								$tv.width() < 292.5 
									? $tv.width() > 257 
										? 17 
										: 20 
									: 37)
						) + "px");
						setTimeout(repeat, 1000);
					};
					repeat();
				});
			</script>
		</div>
	</div>
	<div class="ocenka-raschet">
		<?php
			$files_opt = get_field("files__", "options");
			$terms = get_the_terms( get_the_ID(), 'channel_types' );
			$isLive = false;
			if($terms){
				foreach($terms as $term){
					if($term->slug == "live"){
						$isLive = true;
						break;
					}
				}
			}
		?>
	</div>
	<?php
		$rows = get_field('sponsors-radio', 'option');
		if($rows && count($rows)){?>
			<div class="spnsr-block">
				<h2>Спонсорство на Радио</h2>
				<div class="spnsr-items">
					<?php
						$row;
						while($row = array_pop($rows)) {?>
							<div class="spnsr-item">
								<img src="<?=$row["image"]?>" alt="">
								<p class="spnsr-item-title"><?=$row["title"]?></p>
								<?=$row["description"] ? '<p class="spnsr-item-discription">' . $row["description"] . '</p>' : ''?>
							</div>
					<?php
						}
					?>
				</div>
				<a href="#" class="ask-price">Узнать порядок цен</a>
			</div>
	<?php
		}
	?>
	<div class="five-block-content-wrapper second-page">
		<div class="five-block-text">
			<h2><?=get_field('channel-text-direct-advertising-h2')?></h2>
			<p>Условия размещения рекламы на данной радиостанции<span>Размещение рекламны по РФ и в г. Москва</span></p>
		</div>
		<div class="formatted left">
			<?=get_field('channel-text-direct-advertising')?>
		</div>
		<a href="" class="special-offets">Смотреть полные условия</a>
	</div>
	<div class="four-block-content-wrapper second-page">
		<h2>Подберем выгодный сплит радиостанций</h2>
			<?php
				get_template_part( 'template-parts/common/slider', 'channels-split-radio' );
			?>
		<div class="special-offets-div">
			<a href="" class="special-offets">Создать запрос</a>
			<img src="<?=get_template_directory_uri()?>/img/onelpusone.png" alt="" class="onelpus">
		</div>
	</div>
	<div class="pr-block">
		<h2><?=get_field('channel-text-sponsorship-h2')?></h2>
		<div class="formatted left">
			<?=get_field('channel-text-sponsorship')?>
		</div>
	</div>
	<div class="four-block-content-wrapper">
		<?php
			get_template_part( 'template-parts/common/slider', 'from-1998' );
		?>
		<p>Работаем с 1998 года</p>
	</div>

	<div class="six-block-content-wrapper">
		<h2>Получите консультацию 
			специалиста
		</h2>
		<div class="six-block--content">
			<?=do_shortcode('[contact-form-7 id="738" title="Обратная связь" html_class="cf-form pre-footer-form"]')?>
			
			<div class="pre-footer-form-sicription">
				<p>Дополнительную информацию об эфире радиостанции <?=get_the_title()?>, об условиях размещения прямой, спонсорской и PR-рекламы,  а также их стоимости, Вы сможете получить по телефонам</p>
				<a href="tel:<?=$contacts['main-phone-number']?>"><?=$contacts['main-phone-number']?></a>
				<?php
					$phone = $contacts['add-phone-number'];
					if($phone){
						echo '<a href="tel:' . $phone . '">' . $phone . '</a>';
					}
				?>
			</div>
			<img src="<?=get_template_directory_uri()?>/img/man.png" alt="" class="man-pre-footer">
		</div>
	</div>