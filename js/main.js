(function($) {
	$(document).ready(function() {
		$("#mobmenu").click(function() {
			$("#mob-desktop").toggle(
				function() {
					if ($("#mob-desktop").is(":hidden")) {
						$('body').css("overflow", "visible");
						$("#mobmenu").html('<i class="fas fa-bars"></i>');

					}
				}
			);
			$('body').css("overflow", "hidden");
			$(this).html('<i class="fas fa-times"></i>');
		});
		var params = {
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 1124,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]

		};
		$(".autoplay").slick(params);
		$(".slider-channels-split").init
		
		// var scene = $('#scene').get(0);
		// var parallaxInstance = new Parallax(scene);
		

		setInterval(function(){
			$(".slick-next").html('<i class="fas fa-chevron-left"></i>');
			$(".slick-prev").html('<i class="fas fa-chevron-right"></i>');
		}, 500);

		$(".tab_item").not(":first").hide();
		$(".tabs-wrapper .tab").click(function() {
			$(".tabs-wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
			$(".tab_item").css("height", "400px");
			$(".tab_item").find(".overlay").show();

			$(".tab_item").hide().eq($(this).index()).fadeIn()
		}).eq(0).addClass("active");

		$(".show-all-tab-content").click(function() {
			$(this).parent(".overlay").parent(".tab_item").css("height", "100%");
			$(this).parent(".overlay").hide();
		});
	});

})(jQuery);