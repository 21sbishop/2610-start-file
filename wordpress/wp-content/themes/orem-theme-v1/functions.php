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

// Wayfinding: the four amenity pages aren't in the menu, so highlight Amenities while viewing them
function orem_amenity_pages_current( $classes, $item ) {
  $amenity_pages = array( 'library', 'recreation-center', 'sports-field', 'city-park' );
  $amenities     = get_page_by_path( 'amenities' );

  if ( $amenities && is_page( $amenity_pages ) && (int) $item->object_id === $amenities->ID ) {
    $classes[] = 'current-menu-item';
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'orem_amenity_pages_current', 10, 2 );
