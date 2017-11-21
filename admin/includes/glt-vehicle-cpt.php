<?php
//===========================================================================
//    CREATE CUSTOM POST TYPE
//===========================================================================
add_action( 'init', 'gltv_custom_post_type' );
function gltv_custom_post_type() {
  register_post_type( 'gltv',
    array(
      'labels' => array(
        'name' => 'Vehicle Variations',
        'singular_name' => 'Vehicle Variation',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Vehicle Variation',
        'edit' => 'Edit',
        'edit_item' => 'Edit Vehicle Variation',
        'new_item' => 'New Vehicle Variation',
        'view' => 'View',
        'view_item' => 'View Vehicle Variation',
        'search_items' => 'Search Vehicle Variations',
        'not_found' => 'No Vehicle Variations found',
        'not_found_in_trash' => 'No Vehicle Variations found in Trash',
        'parent' => 'Parent Vehicle Variation'
      ),

      'public' => true,
      'menu_position' => 0,
      'supports' => array( 'title', 'thumbnail' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-performance',
      'has_archive' => true
    )
  );
}