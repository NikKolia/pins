<?php
/**
 * pins-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pins-theme
 */

if (!function_exists('pins_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function pins_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on pins-theme, use a find and replace
         * to change 'pins-theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('pins-theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'header' => esc_html__('Header', 'pins-theme'),
            'mobile' => esc_html__('Mobile', 'pins-theme'),
            'footer-1' => esc_html__('footer-1', 'pins-theme'),
            'footer-2' => esc_html__('footer-2', 'pins-theme'),
            'footer-3' => esc_html__('footer-3', 'pins-theme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('pins_theme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'pins_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pins_theme_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('pins_theme_content_width', 640);
}

add_action('after_setup_theme', 'pins_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pins_theme_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'pins-theme'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'pins-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Facebook reviews area', 'pins-theme'),
        'id' => 'fb',
        'description' => esc_html__('There should be added a content that would appear inside the Facebook reviews section in front of page', 'pins-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'pins_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function pins_theme_scripts()
{
    wp_enqueue_style('pins-theme-style', get_stylesheet_uri());

    wp_enqueue_style('pins-theme-reset', get_template_directory_uri() . '/assets/css/reset.css');

    wp_enqueue_style('pins-theme-main', get_template_directory_uri() . '/assets/css/main.css?v=1.0.14');

    //wp_enqueue_style( 'pins-theme-slick', get_template_directory_uri().'/assets/css/slick.css' );

    wp_enqueue_style('pins-theme-hamburgers', get_template_directory_uri() . '/assets/css/hamburgers.min.css');

    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css');

    wp_enqueue_style('pins-main-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:300,400,500,700&display=swap&subset=cyrillic');

    wp_enqueue_script('jquery');

    wp_enqueue_script('pins-theme-fonts', 'https://kit.fontawesome.com/50b570d5b3.js', true);

    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);

    //wp_enqueue_script( 'pins-theme-jq', get_template_directory_uri().'/assets/js/jquery-3.4.1.min.js');

    //wp_enqueue_script( 'pins-theme-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.0', true );

    // wp_enqueue_script( 'pins-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    // wp_enqueue_script( 'pins-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'pins_theme_scripts');

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
 * Options pins theme.
 */
require get_template_directory() . '/inc/options.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

add_action('init', 'custom_post_init');
function custom_post_init()
{

    register_post_type('course', array(
        'labels' => array(
            'name' => 'Курсы', // Основное название типа записи
            'singular_name' => 'Курс', // отдельное название записи типа News
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый курс',
            'edit_item' => 'Редактировать курс',
            'new_item' => 'Новая курс',
            'view_item' => 'Посмотреть ',
            'search_items' => 'Найти курс',
            'not_found' => 'Курс не найден',
            'not_found_in_trash' => 'В корзине курс не найден',
            'parent_item_colon' => '',
            'menu_name' => 'Курсы'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));
    register_post_type('study', array(
        'labels' => array(
            'name' => 'Записи на курсы', // Основное название типа записи
            'singular_name' => 'Запись на курсы', // отдельное название записи типа News
            'add_new' => 'Добавить новую',
            'add_new_item' => 'Добавить новую запись',
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Новая запись',
            'view_item' => 'Посмотреть запись',
            'search_items' => 'Найти запись',
            'not_found' => 'Записей не найдено',
            'not_found_in_trash' => 'В корзине записей не найден',
            'parent_item_colon' => '',
            'menu_name' => 'Запись на курсы'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));
    register_post_type('prepod', array(
        'labels' => array(
            'name' => 'Преподаватели', // Основное название типа записи
            'singular_name' => 'Преподаватель', // отдельное название записи типа News
            'add_new' => 'Добавить нового',
            'add_new_item' => 'Добавить нового преподавателя',
            'edit_item' => 'Редактировать преподавателя',
            'new_item' => 'Новый преподаватель',
            'view_item' => 'Посмотреть ',
            'search_items' => 'Найти преподаватель',
            'not_found' => 'Преподаватель не найден',
            'not_found_in_trash' => 'В корзине преподаватель не найден',
            'parent_item_colon' => '',
            'menu_name' => 'Преподаватели'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));
    register_post_type('reviews', array(
        'labels' => array(
            'name' => 'Отзывы', // Основное название типа записи
            'singular_name' => 'Отзыв', // отдельное название записи типа News
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый отзыв',
            'edit_item' => 'Редактировать отзыв',
            'new_item' => 'Новый отзыв',
            'view_item' => 'Посмотреть ',
            'search_items' => 'Найти отзыв',
            'not_found' => 'Отзыв не найден',
            'not_found_in_trash' => 'В корзине отзыв не найден',
            'parent_item_colon' => '',
            'menu_name' => 'Отзывы'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        // 'taxonomies'         => array( 'category' ),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));
    register_post_type('gallery', array(
        'labels' => array(
            'name' => 'Галерея', // Основное название типа записи
            'singular_name' => 'Галерея', // отдельное название записи типа News
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый',
            'edit_item' => 'Редактировать',
            'new_item' => 'Новый',
            'view_item' => 'Посмотреть ',
            'search_items' => 'Найти',
            'not_found' => 'Не найден',
            'not_found_in_trash' => 'В корзине не найден',
            'parent_item_colon' => '',
            'menu_name' => 'Галерея'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        // 'taxonomies'         => array( 'category' ),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));

}

add_action('wpcf7_mail_sent', 'save_my_form_data_to_my_cpt');
add_action('wpcf7_mail_failed', 'save_my_form_data_to_my_cpt');

function register_taxonomy_city()
{
    $labels = [
        'name' => _x('Города', 'taxonomy general name'),
        'singular_name' => _x('Город', 'taxonomy singular name'),
        'search_items' => __('Найти город'),
        'all_items' => __('Все города'),
        'parent_item' => __('Основной город'),
        'parent_item_colon' => __('Основной город:'),
        'edit_item' => __('Добавить город'),
        'update_item' => __('Обновить город'),
        'add_new_item' => __('Добавить новый город'),
        'new_item_name' => __('Новый город'),
        'menu_name' => __('Города'),
    ];
    $args = [
        'hierarchical' => true, // make it hierarchical (like categories)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'city'],
    ];
    register_taxonomy('city', ['course'], $args);
}

add_action('init', 'register_taxonomy_city');

function register_taxonomy_knowledge()
{
    $labels = [
        'name' => _x('Квалификации', 'taxonomy general name'),
        'singular_name' => _x('Квалификация', 'taxonomy singular name'),
        'search_items' => __('Найти Квалификацию'),
        'all_items' => __('Все квалификации'),
        'parent_item' => __('Основная квалификация'),
        'parent_item_colon' => __('Основная квалификация:'),
        'edit_item' => __('Добавить квалификацию'),
        'update_item' => __('Обновить квалификацию'),
        'add_new_item' => __('Добавить новую квалификацию'),
        'new_item_name' => __('Новая квалификация'),
        'menu_name' => __('Квалификация'),
    ];
    $args = [
        'hierarchical' => true, // make it hierarchical (like categories)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'knowledge'],
    ];
    register_taxonomy('knowledge', ['course'], $args);
}

add_action('init', 'register_taxonomy_knowledge');

//function register_taxonomy_timetable()
//{
//    $labels = [
//        'name' => _x('Расписание', 'taxonomy general name'),
//        'singular_name' => _x('Расписание', 'taxonomy singular name'),
//        'search_items' => __('Найти расписание'),
//        'all_items' => __('Всё расписание'),
//        'parent_item' => __('Основное расписание'),
//        'parent_item_colon' => __('Основное расписание:'),
//        'edit_item' => __('Добавить расписание'),
//        'update_item' => __('Обновить расписание'),
//        'add_new_item' => __('Добавить новое расписание'),
//        'new_item_name' => __('Новое расписание'),
//        'menu_name' => __('Расписание'),
//    ];
//    $args = [
//        'hierarchical' => true, // make it hierarchical (like categories)
//        'labels' => $labels,
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//        'rewrite' => ['slug' => 'timetable'],
//    ];
//    register_taxonomy('timetable', ['course'], $args);
//}
//
//add_action('init', 'register_taxonomy_timetable');
//
//function register_taxonomy_timestudy()
//{
//    $labels = [
//        'name' => _x('Время', 'taxonomy general name'),
//        'singular_name' => _x('Время', 'taxonomy singular name'),
//        'search_items' => __('Найти время'),
//        'all_items' => __('Доступное время'),
//        'parent_item' => __('Основное время'),
//        'parent_item_colon' => __('Основное время:'),
//        'edit_item' => __('Добавить время занятий'),
//        'update_item' => __('Обновить время'),
//        'add_new_item' => __('Добавить новое время'),
//        'new_item_name' => __('Новое время'),
//        'menu_name' => __('Время занятий'),
//    ];
//    $args = [
//        'hierarchical' => true, // make it hierarchical (like categories)
//        'labels' => $labels,
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//        'rewrite' => ['slug' => 'timestudy'],
//    ];
//    register_taxonomy('timestudy', ['course'], $args);
//}
//
//add_action('init', 'register_taxonomy_timestudy');

function register_taxonomy_gallery()
{
    $labels = [
        'name' => _x('Положения', 'taxonomy general name'),
        'singular_name' => _x('Положение', 'taxonomy singular name'),
        'search_items' => __('Найти положение'),
        'all_items' => __('Все роложения'),
        'parent_item' => __('Основное положение'),
        'parent_item_colon' => __('Основное положение:'),
        'edit_item' => __('Добавить положение'),
        'update_item' => __('Обновить положение'),
        'add_new_item' => __('Добавить новое положение'),
        'new_item_name' => __('Новое положение'),
        'menu_name' => __('Положение'),
    ];
    $args = [
        'hierarchical' => true, // make it hierarchical (like categories)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'position'],
    ];
    register_taxonomy('position', ['gallery'], $args);
}

add_action('init', 'register_taxonomy_gallery');

/* add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
    register_taxonomy(
        'gallery_carousel',
        'gallery',
        array(
            'labels' => array(
                'name' => 'Для слайдера',
                'add_new_item' => 'Add New Item',
                'new_item_name' => "New Carousel Type"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
} */

function save_my_form_data_to_my_cpt($contact_form)
{
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return;
    }
    $posted_data = $submission->get_posted_data();
    //The Sent Fields are now in an array
    //Let's say you got 4 Fields in your Contact Form
    //my-email, my-name, my-subject and my-message
    //you can now access them with $posted_data['my-email']
    //Do whatever you want like:
    $new_post = array();
    if (isset($posted_data['your-name']) && !empty($posted_data['your-name'])) {
        $new_post['post_title'] = $posted_data['your-name'];
    } else {
        $new_post['post_title'] = 'Отзыв';
    }
    $new_post['post_type'] = 'reviews'; //insert here your CPT
    if (isset($posted_data['your-message'])) {
        $new_post['post_content'] = $posted_data['your-message'];
    } else {
        $new_post['post_content'] = 'Отзыв не внесён';
    }
    $new_post['post_status'] = 'pending';
    $new_post['post_category'] = array(16); //добавляем категорию
    //you can also build your post_content from all of the fields of the form, or you can save them into some meta fields
    if (isset($posted_data['your-email']) && !empty($posted_data['your-email'])) {
        $new_post['meta_input']['mail'] = $posted_data['your-email'];
    }
    if (isset($posted_data['tel-172']) && !empty($posted_data['tel-172'])) {
        $new_post['meta_input']['phone'] = $posted_data['tel-172'];
    }
    //When everything is prepared, insert the post into your Wordpress Database
    if ($post_id = wp_insert_post($new_post)) {
        //Everything worked, you can stop here or do whatever
    } else {
        //The post was not inserted correctly, do something (or don't ;) )
    }
    return;
}


function edit_admin_menus()
{
    global $menu;
    $menu[5][0] = 'Новости';
}

add_action('admin_menu', 'edit_admin_menus');

function get_excerpt($count)
{
    $permalink = get_permalink($news->ID);
    $excerpt = get_the_excerpt();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = '<p>' . $excerpt . '... <a href="' . $permalink . '">Читать дальше</a></p>';
    return $excerpt;
}

function my_category_templates($single_template)
{
    global $post;

    if (in_category('news')) {
        $single_template = dirname(__FILE__) . '/single-news.php';
    }
    // Copy the above for your other categories
    return $single_template;
}

add_filter("single_template", "my_category_templates");

function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

//add_action( 'init', 'my_script_enqueuer' );
//
//function my_script_enqueuer() {
//    wp_enqueue_script( 'add-order-front',  get_template_directory_uri() . '/js/app.js' );
//    wp_localize_script( 'add-order-front', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
//
//    wp_enqueue_script( 'jquery' );
//    wp_enqueue_script( 'add-order-front' );
//
//}


wp_enqueue_script( 'vue-script', get_template_directory_uri().'/js/vue.js', '', '1.0.0', true );
wp_enqueue_script( 'my-ajax-script', get_template_directory_uri().'/js/main.js', array( 'jquery'), '1.0.4', true );
wp_localize_script( 'my-ajax-script', 'my_ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' )));


function my_ajax_handler(){
    $city = $_POST['city'];
    $knowledge = $_POST['knowledge'];
    $time = $_POST['time'];
    $course = $_POST['course'];


    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    $to      = get_option('admin_email');
    $subject = 'Контактная форма';
    $message =
        'Имя: '. $name ."\r\n".
        'Телефон: '. $phone ."\r\n".
        'E-mail: '. $email ."\r\n"."\r\n".
        'Город: '. $city ."\r\n".
        'Курс: '. $course ."\r\n".
        'Квалификация: '. $knowledge ."\r\n".
        'Даты: '. $time;

    $test = wp_mail($to, $subject, $message);

    global $wpdb;

    $result_check = $wpdb->insert('custom_contact_form', [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'city' => $city,
        'knowledge' => $knowledge ? $knowledge : null,
        'time' => $time,
        'course' => $course
    ]);

    if($result_check){
    	print_r($test);
    	print_r($to);
        echo 'success';
    }else{
        echo 'error';
    }

    wp_die();

}
add_action( 'wp_ajax_call_my_ajax_handler', 'my_ajax_handler' );
add_action( 'wp_ajax_nopriv_call_my_ajax_handler', 'my_ajax_handler' );

