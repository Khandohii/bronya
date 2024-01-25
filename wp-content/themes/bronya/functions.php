<?php

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Show New Layout
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Show Settings Pages
 */
add_filter( 'ot_show_pages', '__return_false' );


function theme_options_parent($parent){
	$parent = '';
	return $parent;
}
add_filter( 'ot_theme_options_parent_slug', 'theme_options_parent', 20 );

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'functions/theme-options.php');
require( trailingslashit( get_template_directory() ) . 'functions/meta-boxes.php');


// Фильтр для полного textarea
add_filter( 'ot_override_forced_textarea_simple', 'helpua_filter_function', 10, 2 );
function helpua_filter_function( $value, $id ) {
	if ( $id == 'about_list_item_content' ) {
		$value = true;
	}
  return $value;
}


// Настройки темы
add_action('after_setup_theme', 'help_setup_theme');
function help_setup_theme(){
	// Включение поддержки кастомного логотипа
	add_theme_support( 'custom-logo' );

	// Включение вывода тега title в head
	// add_theme_support( 'title-tag' );

	// Включение поддержки миниатюр для записей
	// add_theme_support( 'post-thumbnails' );

	// Регистрация меню
	// register_nav_menu( 'menu-header', 'Меню' );

}

// Регистрация типа записи для заявок
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'orders', [
		'label'  => null,
		'labels' => [
			'name'               => 'Заявки', // основное название для типа записи
			'singular_name'      => 'Заявка', // название для одной записи этого типа
			'add_new'            => 'Добавить заявку', // для добавления новой записи
			'add_new_item'       => 'Добавление заявки', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование заявки', // для редактирования типа записи
			'new_item'           => 'Новая заявка', // текст новой записи
			'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
			'search_items'       => 'Искать заявки', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Заявки', // название меню
		],
		'public'              => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-format-aside',
		'hierarchical'        => false,
		'supports'            => [ 'title' ],
	] );
}

// Отправка формы
include(trailingslashit( get_template_directory() ) . 'action_ajax_form.php');


// Вывод файлов стилей и скриптов
add_action( 'wp_enqueue_scripts', 'help_scripts' );
function help_scripts(){
	wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', [], '1.0.0', 'all');
	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/assets/css/fancybox.css', [], '1.0.0', 'all');
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css', [], '1.0.0', 'all');
	wp_enqueue_style( 'response_1199', get_template_directory_uri() . '/assets/css/response_1199.css', [], '1.0.0', '(max-width: 1199px)');
	wp_enqueue_style( 'response_1024', get_template_directory_uri() . '/assets/css/response_1024.css', [], '1.0.0', '(max-width: 1024px)');
	wp_enqueue_style( 'response_767', get_template_directory_uri() . '/assets/css/response_767.css', [], '1.0.0', '(max-width: 767px)');
	wp_enqueue_style( 'response_479', get_template_directory_uri() . '/assets/css/response_479.css', [], '1.0.0', '(max-width: 479px)');

	wp_enqueue_script('my-jquery', get_template_directory_uri() . '/assets/js/jquery-3.5.0.min.js', '', '3.5.0', true);
	wp_enqueue_script('my-jquery-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-1.4.1.min.js', array('my-jquery'), '1.4.1', true);
	wp_enqueue_script('lozad', get_template_directory_uri() . '/assets/js/lozad.min.js', array('my-jquery-migrate'), '1.11.0', true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('my-jquery-migrate'), '8.0.7', true);
	wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/assets/js/fancybox.min.js', array('my-jquery-migrate'), '3.5.7', true);
	wp_enqueue_script('inputmask-js', get_template_directory_uri() . '/assets/js/inputmask.min.js', array('my-jquery-migrate'), '5.0.7', true);
	wp_enqueue_script('functions', get_template_directory_uri() . '/assets/js/functions.js', array('my-jquery-migrate'), '1.0.0', true);
	wp_enqueue_script('my-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('my-jquery-migrate'), '1.0.0', true);
	wp_enqueue_script('ajax-js', get_template_directory_uri() . '/assets/js/ajax.js', array('my-jquery-migrate'), '1.0.0', true);
}


// Функция замены пути в шаблоне
function help_images($name){
	echo get_template_directory_uri() . '/assets/images/' . $name;
}

function help_images_tmp($name){
	echo get_template_directory_uri() . '/assets/images/tmp/' . $name;
}

// Отключить админ панель на странице сайта
// add_filter( 'show_admin_bar', '__return_false' );


// Инициализация виджетов
/*add_action('widgets_init', 'help_widgets');
function help_widgets(){
	register_sidebar([
		'name' => 'Первый экран',
		'id' => 'first-screen',
		'description' => 'Первый блок',
		'before_widget' => null,
		'after_widget' => null,
	]);
}*/


// Добавление SVG файлов
include(trailingslashit( get_template_directory() ) . 'functions/svg-allowing.php');



/**
 * 	Отключаем лишнее подключаем нужное
 */
// include('resetWP.php');


?>