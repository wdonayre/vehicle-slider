<?php
//===========================================================================
//    CUSTOMIZE COLUMNS
//===========================================================================
add_filter( 'manage_gltv_posts_columns', 'gltv_set_columns' );
function gltv_set_columns( $columns ) {
  
  $newColumns = array();
  
  $newColumns['title'] = 'Title';
  
  $newColumns['shortcode'] = 'Shortcode';
  
  $newColumns['date'] = 'Date';
  
  return $newColumns;
  
}

//===========================================================================
//    DISPLAY SINGLE POST SHORTCODE IN COLUMN
//===========================================================================
add_action( 'manage_gltv_posts_custom_column', 'gltv_custom_column', 10, 2 );
function gltv_custom_column( $column, $post_id ) {
  
  switch( $column ) {
      
    case 'shortcode' :
      
      echo '<input type="text" id="cc_txtfld" value="[gltv_shortcode id='.$post_id.']" />';
      
    break;
      
  }
  
}