<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ministar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<script>
	window.yamap_settings = <?=json_encode(get_field("map__", 'option'))?>;
</script>
<div id="page" class="wrapper site">
	<header id="masthead" class="site-header header">
		<?php
			$contacts = get_field('contacts__', 'option');
		?>
		<div class="header-content">
			<ul class="header-content-first header-content-item">
				<li class="logo">
					<a href="#" class="mob-hidden"><img src="<?=get_template_directory_uri()?>/img/logo.png" alt=""></a>
					<a href="#"  class="mob-show"><img src="<?=get_template_directory_uri()?>/img/logo-m.png" alt=""></a>

				</li>
				<li class="mob-hidden"><a href="tel:<?=$contacts['main-phone-number']?>"><i class="fas fa-phone"></i><?=$contacts['main-phone-number']?></a></li>
				<li class="mob-hidden"><a href="mailto:<?=$contacts['main-email']?>"><i class="fas fa-envelope"></i><?=$contacts['main-email']?></a></li>
				<li class="mob-hidden">
					<a class="yandex-geo-link" target="_blank">
						<i class="fas fa-map-marker-alt"></i>Построить маршрут
					</a>
				</li>

				<li class="mob-hidden"><a href="#" id="button-call-me"><i class="far fa-question-circle"></i>Оставить заявку</a></li>
				<li class="mob-show"><a href="tel:<?=$contacts['main-phone-number']?>"><i class="fas fa-phone"></i></a></li>
				<li class="mob-show"><a href="mailto:<?=$contacts['main-email']?>"><i class="fas fa-envelope"></i></a></li>
				<li class="mob-show"><a href="https://goo.gl/maps/aqmNCiot2HNbq5RL9" target="_blank"><i class="fas fa-map-marker-alt"></i></a></li>

				<li class="mob-show" id="mobmenu"><i class="fas fa-bars"></i></li>
			</ul>
			<?=wp_nav_menu(array(
				'container_class' => 'header-content-second header-content-item desktop-hidden',
				'container' => 'nav',
				'items_wrap' => '<li class="overlay" id="mob-overlay"></li>%3$s',
				'theme_location' => 'header-menu',
				'filter_classes' => 'menu-dropdown'
			))?>
			<div id="mob-desktop">
				<?=wp_nav_menu(array(
					'container_class' => '',
					'container' => 'nav',
					'items_wrap' => '%3$s',
					'theme_location' => 'header-menu',
					'filter_classes' => 'menu-dropdown'
				))?>
			</div>
		</div>
	</header>

<script>
	$(document).ready(function(){
		function eGetElem(e){
			return  e.target || e.relatedTarget || e.srcElement || e.toElement || e.fromElement || undefined;
		}


		$(".menu-dropdown").click(function(e){
			var target = $(eGetElem(e));
			var $this = $(this);
			if(!(target[0] && (target.hasClass("sub-menu") || target.parents(".sub-menu").length))){
				e.preventDefault();
				$this.toggleClass("shown");
				$(".menu-dropdown").not($this).removeClass("shown");
			}
		});
		$(window).click(function(e){
			var target = $(eGetElem(e));
			if(!(target[0] && (target.hasClass("menu-dropdown") || target.parents(".menu-dropdown").length))){
				$(".menu-dropdown").removeClass("shown");
			}
		});


		var linkElem = $(".yandex-geo-link");
		var linkHref = "https://yandex.ru/maps/?";

		var linkParams = [
			"ll=" +yamap_settings["center-y"]+","+yamap_settings["center-x"],
			"z=" +yamap_settings["zoom"],
			"l=map",
			"rtt=auto",
			"mode=routes"
		];
		if(typeof(ymaps) != "undefined"){
			ymaps.ready(init);
			function init(){
				ymaps.geolocation.get().then(function(result) {
					linkParams.push(
						"rtext="
						+ result.geoObjects.position.join(",")
						+ "~"
						+ yamap_settings["pointer-x"]+","+yamap_settings["center-y"]
					);

					linkElem.attr("href", linkHref + linkParams.join("&"));
				},function(err) {
					console.log('Ошибка: ' + err);
					linkParams.push(
						"rtext="
						+ "~"
						+ yamap_settings["pointer-x"]+","+yamap_settings["center-y"]
					);

					linkElem.attr("href", linkHref + linkParams.join("&"));
				});
			}
		}
	});
</script>
		
