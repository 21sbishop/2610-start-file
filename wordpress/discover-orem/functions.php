<?php
/**
 * Discover Orem theme functions.
 *
 * @package Discover_Orem
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DISCOVER_OREM_VERSION', '1.0.0' );
define( 'DISCOVER_OREM_TITLE', 'Discover Orem — A Mountain Town Worth Exploring' );
define( 'DISCOVER_OREM_DESCRIPTION', 'Discover Orem, Utah — at the foot of Mt. Timpanogos. Trails, Utah Lake, community events, and small-town charm minutes from the city.' );

/**
 * Theme setup.
 */
function discover_orem_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'discover-orem' ),
		)
	);
}
add_action( 'after_setup_theme', 'discover_orem_setup' );

/**
 * Styles and scripts: Work Sans, the compiled stylesheet, and the two
 * scripts, which load in the <head> with defer like the original site.
 */
function discover_orem_assets() {
	wp_enqueue_style(
		'discover-orem-fonts',
		'https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'discover-orem-styles', get_theme_file_uri( 'styles/styles.min.css' ), array( 'discover-orem-fonts' ), DISCOVER_OREM_VERSION );

	foreach ( array( 'year', 'navigation' ) as $script ) {
		wp_enqueue_script(
			'discover-orem-' . $script,
			get_theme_file_uri( 'scripts/' . $script . '.js' ),
			array(),
			DISCOVER_OREM_VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => false,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'discover_orem_assets' );

/**
 * Preconnect to Google Fonts.
 */
function discover_orem_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'discover_orem_resource_hints', 10, 2 );

/**
 * Keep the front end free of inline CSS: switch off the <style> blocks
 * WordPress core prints (emoji, block library, classic theme, global
 * styles, image auto-sizes) and the inline emoji script.
 */
function discover_orem_remove_core_inline_output() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles' );
	remove_action( 'wp_head', 'wp_enqueue_img_auto_sizes_contain_css_fix', 0 );
	add_filter( 'wp_img_tag_add_auto_sizes', '__return_false' );
	add_filter( 'should_load_separate_core_block_assets', '__return_false' );
}
add_action( 'init', 'discover_orem_remove_core_inline_output' );

/**
 * Dequeue any core style that would still print as an inline <style> tag.
 */
function discover_orem_dequeue_core_inline_styles() {
	$core_handles = array( 'wp-img-auto-sizes-contain', 'wp-emoji-styles', 'classic-theme-styles', 'global-styles', 'core-block-supports', 'core-block-supports-duotone' );

	foreach ( wp_styles()->queue as $handle ) {
		if ( 0 === strpos( $handle, 'wp-block-' ) || in_array( $handle, $core_handles, true ) ) {
			wp_dequeue_style( $handle );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'discover_orem_dequeue_core_inline_styles', 100 );
add_action( 'wp_print_styles', 'discover_orem_dequeue_core_inline_styles', 1 );
add_action( 'wp_print_footer_scripts', 'discover_orem_dequeue_core_inline_styles', 1 );

/**
 * Title tag: the original title on the homepage, "Page | Site" elsewhere.
 */
function discover_orem_document_title( $title ) {
	return is_front_page() ? DISCOVER_OREM_TITLE : $title;
}
add_filter( 'pre_get_document_title', 'discover_orem_document_title' );

function discover_orem_title_separator() {
	return '|';
}
add_filter( 'document_title_separator', 'discover_orem_title_separator' );

/**
 * Description, Open Graph, Twitter, and favicon tags from the original site.
 */
function discover_orem_head_meta() {
	$title = wp_get_document_title();
	$url   = is_front_page() ? home_url( '/' ) : get_permalink();
	$image = get_theme_file_uri( 'img/og-image.png' );
	?>
	<meta name="description" content="<?php echo esc_attr( DISCOVER_OREM_DESCRIPTION ); ?>">

	<!-- Open Graph -->
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( DISCOVER_OREM_DESCRIPTION ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( DISCOVER_OREM_DESCRIPTION ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">

	<!-- Favicons -->
	<link rel="icon" href="<?php echo esc_url( get_theme_file_uri( 'favicon.ico' ) ); ?>" sizes="any">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_theme_file_uri( 'img/favicon-32x32.png' ) ); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_theme_file_uri( 'img/favicon-16x16.png' ) ); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_theme_file_uri( 'img/apple-touch-icon.png' ) ); ?>">
	<link rel="manifest" href="<?php echo esc_url( get_theme_file_uri( 'site.webmanifest' ) ); ?>">
	<meta name="theme-color" content="#1f6f8b">
	<?php
}
add_action( 'wp_head', 'discover_orem_head_meta', 1 );

/**
 * Give WordPress menu links the site's classes, and mark the current item
 * "active" the way the original navigation does.
 */
function discover_orem_menu_link_class( $atts ) {
	$atts['class'] = 'site-nav__link';
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'discover_orem_menu_link_class' );

function discover_orem_menu_item_class( $classes ) {
	if ( in_array( 'current-menu-item', $classes, true ) ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'discover_orem_menu_item_class' );

/**
 * Link to a homepage section: a plain #anchor on the homepage, the full
 * homepage URL plus #anchor everywhere else.
 */
function discover_orem_section_url( $id ) {
	return is_front_page() ? '#' . $id : home_url( '/#' . $id );
}

/**
 * Fallback menu: the original Home / Explore / Visit links, used until a
 * menu is assigned under Appearance > Menus.
 */
function discover_orem_fallback_menu() {
	$links = array(
		'hero'     => 'Home',
		'features' => 'Explore',
		'visit'    => 'Visit',
	);
	?>
	<ul class="site-nav">
		<?php foreach ( $links as $id => $label ) : ?>
			<li<?php echo ( 'hero' === $id && is_front_page() ) ? ' class="active"' : ''; ?>><a class="site-nav__link" href="<?php echo esc_url( discover_orem_section_url( $id ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php
}
