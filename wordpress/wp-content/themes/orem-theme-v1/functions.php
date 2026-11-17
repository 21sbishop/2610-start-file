<?php

// Remove the Gutenberg block editor so pages open in the classic editor
add_filter( 'use_block_editor_for_post', '__return_false', 10 );

// Remove the TinyMCE visual editor so pages are edited as plain HTML
add_filter( 'user_can_richedit', '__return_false', 50 );

// Stop WordPress from adding automatic paragraph and break tags
remove_filter( 'the_content', 'wpautop' );

// Register the menu location used by wp_nav_menu() in header.php
register_nav_menu( 'site-navigation', 'Primary Navigation' );

// Wayfinding: Explore and Visit jump to homepage sections, so only page links get current-menu-item
function orem_section_links_not_current( $classes, $item ) {
  if ( 'custom' === $item->type ) {
    $classes = array_diff( $classes, array( 'current-menu-item' ) );
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'orem_section_links_not_current', 10, 2 );

// Remove the random paragraph tags Contact Form 7 adds to web forms
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// No inline CSS: the image CAPTCHA plugin hides its spam-trap field with a
// style attribute, so swap it for a class the stylesheet hides instead.
function orem_cf7_no_inline_styles( $html ) {
  $html = str_replace(
    array( '<span style="display:none">', '<input type="text" name="kc_honeypot">' ),
    array( '<span class="kc-honeypot">', '<input type="text" name="kc_honeypot" aria-label="Leave this field empty" tabindex="-1" autocomplete="off">' ),
    $html
  );

  // Each CAPTCHA choice is just a radio button and an icon, so its label is
  // empty. Give each one screen-reader text ("Option 1") the CSS hides.
  return preg_replace(
    '/<input aria-label="(\d+)" type="radio" name="kc_captcha"/',
    '<span class="kc-option-text">Option $1</span><input type="radio" name="kc_captcha"',
    $html
  );
}
add_filter( 'wpcf7_form_elements', 'orem_cf7_no_inline_styles' );
