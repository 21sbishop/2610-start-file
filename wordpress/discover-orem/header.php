<?php
/**
 * Site header: <head>, skip link, brand, hamburger button, and navigation.
 *
 * @package Discover_Orem
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<a class="skip-link" href="#main">Skip to main content</a>

	<header class="site-header">
		<div class="container site-header__inner">
			<a class="brand" href="<?php echo esc_url( discover_orem_section_url( 'hero' ) ); ?>">
				<img class="brand__mark" src="<?php echo esc_url( get_theme_file_uri( 'img/logo.svg' ) ); ?>" alt="" width="36" height="27" loading="lazy">
				<span class="brand__name">OREM</span>
			</a>
			<button class="hamburger-button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="primary-nav"></button>
		</div>
	</header>

	<nav class="primary-nav" id="primary-nav" aria-label="Primary">
		<div class="container">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav',
					)
				);
			} else {
				discover_orem_fallback_menu();
			}
			?>
		</div>
	</nav>
