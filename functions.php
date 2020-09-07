<?php
/**
 * ministar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ministar
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

if ( ! function_exists( 'ministar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ministar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ministar, use a find and replace
		 * to change 'ministar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ministar', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ministar_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ministar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ministar_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ministar_content_width', 640 );
}
add_action( 'after_setup_theme', 'ministar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ministar_widgets_init() {
	/**
	 * FOOTER
	 */
	register_sidebar(array(
		'name'          => 'Footer widget 1',
		'id'            => 'footer_w1',
		'before_widget' => '<div class="footer-content-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="footer-item-title">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Footer widget 2',
		'id'            => 'footer_w2',
		'before_widget' => '<div class="footer-content-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="footer-item-title">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Footer widget 3',
		'id'            => 'footer_w3',
		'before_widget' => '<div class="footer-content-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="footer-item-title">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Footer widget 4',
		'id'            => 'footer_w4',
		'before_widget' => '<div class="footer-content-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="footer-item-title">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Footer widget 5',
		'id'            => 'footer_w5',
		'before_widget' => '<div class="footer-content-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="footer-item-title">',
		'after_title'   => '</span>',
	));
}
add_action( 'widgets_init', 'ministar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ministar_scripts() {
	//wp_enqueue_style( 'ministar-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_register_style( 'jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
	wp_enqueue_style( 'jquery-ui-css' );
	wp_enqueue_style( 'ministar-style-main', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style( 'ministar-style-media', get_template_directory_uri() . '/css/media.css');
	wp_enqueue_style( 'ministar-style-fonts', get_template_directory_uri() . '/css/fonts.css');
	wp_register_style( 'font-awsome-css', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );
	wp_enqueue_style( 'font-awsome-css' );
	
	
	//wp_style_add_data( 'ministar-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ministar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
    wp_deregister_script( 'jquery-migrate' );
	wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.0.0.min.js", array(), '3.0.0' );
	
	wp_enqueue_script( 'jquery' );
	wp_register_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
	wp_enqueue_script( 'jquery-ui' );
	wp_register_script( 'parallax-js', 'https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js');
	wp_enqueue_script( 'parallax-js' );


	wp_register_script( 'yandex-map-js', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=23e323fb-d25f-42ad-abc7-a818d5034b42');
	wp_enqueue_script( 'yandex-map-js' );
	

	wp_register_style( 'slick-carousel-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), _S_VERSION);
	wp_enqueue_style( 'slick-carousel-css' );
	wp_register_script( 'slick-carousel-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'slick-carousel-js' );
	wp_enqueue_script( 'ministar-inputmask-js', get_template_directory_uri() . '/js/inputmask.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ministar-main-js', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ministar_scripts' );

/**
 * My menu functions
 */
function ministar_add_additional_class_on_li($classes, $item, $args) {
	$classes_new = [];
	if(isset($args->filter_classes)){
		$tests = trim($args->filter_classes);
		$tests = explode(" ", $tests);
		if(count($tests)){
			foreach($classes as $class)
				if(in_array($class, $tests))
					$classes_new[] = $class;
		}
	}
    if(isset($args->item_class)) {
		if($args->item_class === '')
			$classes_new = [];
		else
			$classes_new[] = $args->item_class;
    }
    return $classes_new;
}
add_filter('nav_menu_css_class', 'ministar_add_additional_class_on_li', 1, 3);

function ministar_init() {
	/**
	 * Post Type: ТВ каналы.
	 */

	$labels = [
		"name" => __( "ТВ каналы", "ministar" ),
		"singular_name" => __( "ТВ канал", "ministar" ),
		"menu_name" => __( "ТВ каналы", "ministar" ),
		"all_items" => __( "Все каналы", "ministar" ),
		"add_new" => __( "Добавить новый", "ministar" ),
		"add_new_item" => __( "Добавить новый канал", "ministar" ),
		"edit_item" => __( "Редактировать канал", "ministar" ),
		"new_item" => __( "Новый канал", "ministar" ),
		"view_item" => __( "Посмотреть", "ministar" ),
		"view_items" => __( "Посмотреть каналы", "ministar" ),
		"search_items" => __( "Найти канал", "ministar" ),
		"not_found" => __( "Канал не найден", "ministar" ),
		"not_found_in_trash" => __( "Канал не найден в корзине", "ministar" ),
		"parent" => __( "Родительский канал:", "ministar" ),
		"featured_image" => __( "Главное изображение", "ministar" ),
		"set_featured_image" => __( "Установить главное изображение", "ministar" ),
		"remove_featured_image" => __( "Удалить главное изображение", "ministar" ),
		"use_featured_image" => __( "Использовать главное изображение", "ministar" ),
		"archives" => __( "Архивы", "ministar" ),
		"insert_into_item" => __( "Вставить на страницу", "ministar" ),
		"uploaded_to_this_item" => __( "Загружено на страницу", "ministar" ),
		"filter_items_list" => __( "Фильтровать список каналов", "ministar" ),
		"items_list_navigation" => __( "Навигация по списку", "ministar" ),
		"items_list" => __( "Список каналов", "ministar" ),
		"attributes" => __( "Атрибуты канала", "ministar" ),
		"item_published" => __( "Канал опубликован", "ministar" ),
		"item_published_privately" => __( "Канал опубликован приватно", "ministar" ),
		"item_reverted_to_draft" => __( "Канал переведё в черновик", "ministar" ),
		"item_scheduled" => __( "Канал запланирован", "ministar" ),
		"item_updated" => __( "Канал обновлён", "ministar" ),
		"parent_item_colon" => __( "Родительский канал:", "ministar" ),
	];

	$args = [
		"label" => __( "ТВ каналы", "ministar" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "channels_tv", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-welcome-view-site",
		"supports" => [ "title", "custom-fields" ]
	];

	register_post_type( "channels_tv", $args );

	/**
	 * Post Type: Радио каналы.
	 */

	$labels["name"] = __( "Радио каналы", "ministar" );
	$labels["singular_name"] = __( "Радио канал", "ministar" );
	$labels["menu_name"] = __( "Радио каналы", "ministar" );

	$args = [
		"label" => __( "Радио каналы", "ministar" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "channels_radio", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-welcome-view-site",
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "channels_radio", $args );

	/**
	 * Taxonomy: Типы каналов.
	 */

	$labels = [
		"name" => __( "Типы каналов", "ministar" ),
		"singular_name" => __( "Тип канала", "ministar" ),
		"menu_name" => __( "Типы каналов", "ministar" ),
		"all_items" => __( "Все типы", "ministar" ),
		"edit_item" => __( "Редактировать", "ministar" ),
		"view_item" => __( "Посмотреть", "ministar" ),
		"update_item" => __( "Обновить", "ministar" ),
		"add_new_item" => __( "Добавить новый тип", "ministar" ),
		"new_item_name" => __( "Новое имя типа", "ministar" ),
		"parent_item" => __( "Родительский тип", "ministar" ),
		"parent_item_colon" => __( "Родительский тип:", "ministar" ),
		"search_items" => __( "Найти типы", "ministar" ),
		"popular_items" => __( "Популярные типы", "ministar" ),
		"separate_items_with_commas" => __( "Разделите типы запятой", "ministar" ),
		"add_or_remove_items" => __( "Добавить или удалить типы", "ministar" ),
		"choose_from_most_used" => __( "Выбрать самые используемые", "ministar" ),
		"not_found" => __( "Типы не найдены", "ministar" ),
		"no_terms" => __( "Нет типов каналов", "ministar" ),
		"items_list_navigation" => __( "Навигация по списку", "ministar" ),
		"items_list" => __( "Список типов", "ministar" ),
	];

	$args = [
		"label" => __( "Типы каналов", "ministar" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'channel_types', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "channel_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "channel_types", [ "channels_tv" ], $args );
	
	// /**
	//  * Post Type: ТВ каналы.
	//  */

	// $args = [
	// 	"label" => __( "", "ministar" ),
	// 	"labels" => [],
	// 	"description" => "",
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"show_ui" => true,
	// 	"show_in_rest" => true,
	// 	"rest_base" => "",
	// 	"rest_controller_class" => "WP_REST_Posts_Controller",
	// 	"has_archive" => false,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"delete_with_user" => false,
	// 	"exclude_from_search" => false,
	// 	"capability_type" => "post",
	// 	"map_meta_cap" => true,
	// 	"hierarchical" => false,
	// 	"rewrite" => [ "slug" => "channels_tv", "with_front" => true ],
	// 	"query_var" => true,
	// 	"menu_icon" => "dashicons-welcome-view-site",
	// 	"supports" => [ "title", "custom-fields" ]
	// ];

	// register_post_type( "channels_tv", $args );

	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' )
		)
	);
}
add_action( 'init', 'ministar_init' );

/**
 * Add meta fields count
 */
add_filter( 'postmeta_form_limit', 'meta_limit_increase' );
function meta_limit_increase( $limit ) {
    return 100;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * TGM Plugin.
 */
//require get_template_directory() . '/tgm/ministar.php';


/**
 * Customs in cf7
 */
add_filter( 'wpcf7_form_elements', 'do_shortcode' );

// add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
// function custom_email_confirmation_validation_filter( $result, $tag ) {
// 	if ( 'your-email' == $tag->name ) {
// 		$your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
// 		if(!strpos($your_email, "@") || substr_count($your_email, "@") < 1){
// 			$result->invalidate( $tag, "Проверьте введённый почтовый адрес на правильность." );
// 		}
// 	}
// 	return $result;
// }


/**
 * Shortcodes
 */

function short_acf_options( $atts ) {
	$attrs = shortcode_atts( array(
		'group' => '',
		'field' => '',
	), $atts);

	if($attrs["group"] === ''){
		return get_field($attrs["field"], 'options');
	}else{
		$group = get_field($attrs["group"], 'options');
		return $group[$attrs["field"]];
	}
}
add_shortcode( 'acf_options', 'short_acf_options' );

function short_run_php( $atts ) {
	$attrs = shortcode_atts( array(
		'fn' => '',
	), $atts);
	if($attrs["fn"] === '')
		return '';
	else
		return call_user_func($attrs["fn"]);
}
add_shortcode( 'run_php', 'short_run_php' );


/**
 * Common fns
 */
function show_tv_channels(){
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

	$html = '<div class="channels_emb_list">';
	$html .= '<div class="type">Эфирные каналы</div>';
	$html .= '<ul class="channels">';
	foreach($channels_live as $channel){
		$html .= '<li><a href="'. get_post_permalink($channel->ID) .'">'. $channel->post_title .'</a></li>';
	}
	$html .= '</ul>';
	$html .= '<div class="type">Неэфирные каналы</div>';
	$html .= '<ul class="channels">';
	foreach($channels_nonlive as $channel){
		$html .= '<li><a href="'. get_post_permalink($channel->ID) .'">'. $channel->post_title .'</a></li>';
	}
	$html .= '</ul>';
	$html .= '</div>';
	return $html;
}

function show_radio_channels(){
	$channels = get_posts( array(
		'numberposts' => -1,
		'post_type'   => 'channels_radio',
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

	$html = '<div class="channels_emb_list">';
	$html .= '<ul class="channels">';
	foreach($channels as $channel){
		$html .= '<li><a href="'. get_post_permalink($channel->ID) .'">'. $channel->post_title .'</a></li>';
	}
	$html .= '</ul>';
	$html .= '</div>';
	return $html;
}

function custom_filter_wpcf7_is_tel( $result, $tel ) { 
	$result = preg_match( '/(\d\D*){10,13}/', $tel );
	return $result; 
}
  
add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );