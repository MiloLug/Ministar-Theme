<?php
/**
 *Template Name: Ministar Контакты
 *Template Post Type: page
 *
 * @package ministar
 */

get_header();
?>
<div class="common-content-block contacts-block">
	<?php
		$contacts = get_field('contacts__', 'option');
	?>
	<h1 class="block-title">Контакты</h1>
	<div class="block-content">
		<div class="contact-item">
			<span class="title">Адрес:</span>
			<div class="cont">
				<?=$contacts['address']?>
			</div>
		</div>
		<div class="contact-item">
			<span class="title">Телефоны:</span>
			<div class="cont">
				<a href="tel:<?=$contacts['main-phone-number']?>"><i class="fas fa-phone"></i><?=$contacts['main-phone-number']?></a>
				<?php
					$phone = $contacts['add-phone-number'];
					if($phone){?>
						<br><a href="tel:<?=$phone?>"><i class="fas fa-phone"></i><?=$phone?></a>
					<?php }?>
			</div>
		</div>
		<div class="contact-item">
			<span class="title">Расписание работы:</span>
			<div class="cont">
				<?=$contacts['schedule']?>
			</div>
		</div>
		<div class="contact-item">
			<span class="title">Контактный Email:</span>
			<div class="cont">
				<a href="mailto:<?=$contacts['main-email']?>"><i class="fas fa-envelope"></i><?=$contacts['main-email']?></a>
			</div>
		</div>
	</div>
	<div id="yamap"></div>
</div>
<script>
	$(document).ready(function(){
		var myMap;
		ymaps.ready(init);
		function init () {
			var myMap = new ymaps.Map('yamap', {
				center: [parseFloat(yamap_settings["center-x"]), parseFloat(yamap_settings["center-y"])],
				zoom: parseFloat(yamap_settings["zoom"])
			}, {
				searchControlProvider: 'yandex#search'
			});
			var myWayPlacemark = new ymaps.Placemark([
				parseFloat(yamap_settings["pointer-x"]), parseFloat(yamap_settings["pointer-y"])
			], {
				hintContent: yamap_settings["pointer-hit-content"],
				balloonContent: yamap_settings["pointer-ballon-content"]
			}, {
				preset: 'islands#redAutoIcon'
			});

			myMap.geoObjects.add(myWayPlacemark);
		}
	});
</script>

<?php
get_footer();
