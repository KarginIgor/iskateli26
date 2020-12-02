<?php
/**
 * EightyDays functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EightyDays
 */

/**
 * Determine whether it is an AMP response.
 *
 * This function is used as a "Conditional Tag" in WordPress. It can only be used at the `wp` action or later.
 *
 * @link https://developer.wordpress.org/themes/references/list-of-conditional-tags/
 * @see is_amp_endpoint()
 *
 * @return bool Is AMP response.
 */
function eightydays_is_amp() {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eightydays_setup() {
	load_theme_textdomain( 'eightydays-lite', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'eightydays-related', 270, 168, true );
	add_image_size( 'eightydays-widget-thumb', 67, 67, true );
	add_image_size( 'eightydays-featured-big', 760, 474, true );
	add_image_size( 'eightydays-featured-small', 370, 232, true );
	set_post_thumbnail_size( 409, 255, true );

	// Enable support for meta title tag.
	add_theme_support( 'title-tag' );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' );

	// Editor style.
	add_editor_style( array(
		eightydays_fonts_url(),
		get_template_directory_uri() . '/css/bootstrap.css',
		'css/editor-style.css',
	) );

	register_nav_menus( array(
		'primary'      => esc_html__( 'Primary Menu', 'eightydays-lite' ),
		'top_bar_left' => esc_html__( 'Top Bar Menu', 'eightydays-lite' ),
	) );

	// AMP.
	add_theme_support(
		'amp',
		array(
			'paired' => true,
			/*
			 * Configure nav submenu toggles, per <https://amp-wp.org/documentation/playbooks/navigation-sub-menu-buttons/>.
			 * Note that Noto Simple does not make use of such buttons, using an older pattern used in core themes like
			 * Twenty Thirteen where a user must tap once on the parent nav menu item once to cause the submenu to appear;
			 * the user can then either tap on the parent nav menu item again to navigate to that page, or they can click
			 * on one of the revealed submenu items. In Twenty Fifteen, this pattern for mobile submenu navigation has been
			 * replaced by a more accessible method of adding submenu toggle buttons next to each parent item, allowing
			 * navigation to a parent nav menu item link without having to tap it twice. Because Noto Simple does not use
			 * these buttons, the style.css in the child theme has additional CSS to style the submenu toggle buttons when
			 * they appear on not just mobile but any touch interface.
			 */
			'nav_menu_dropdown' => array(
				'sub_menu_button_class'        => 'dropdown-toggle genericon genericon-expand',
				'sub_menu_button_toggle_class' => 'toggled-on',
			),
		)
	);
}
add_action( 'after_setup_theme', 'eightydays_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eightydays_content_width() {
	$GLOBALS['content_width'] = 870;
}
add_action( 'after_setup_theme', 'eightydays_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eightydays_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eightydays-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'eightydays-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div class="col-md-3 col-sm-6 widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'eightydays_widgets_init' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom theme widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Custom media functions.
 */
require get_template_directory() . '/inc/media.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load required plugins.
 */
require get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/admin/plugins.php';

/**
 * Load dashboard
 */
require get_template_directory() . '/inc/dashboard/class-eightydays-lite-dashboard.php';
$dashboard = new Eightydays_Lite_Dashboard();

require get_template_directory() . '/inc/customizer-pro/class-eightydays-lite-customizer-pro.php';
$customizer_pro = new Eightydays_Lite_Customizer_Pro();
$customizer_pro->init();

function eightydays_lite_style_editor_gutenberg() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'eightydays-fonts', eightydays_fonts_url() );
	wp_enqueue_style( 'style-editor', get_theme_file_uri( '/style-gutenberg.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'eightydays_lite_style_editor_gutenberg' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
