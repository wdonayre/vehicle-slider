<?php

add_shortcode( 'gltv_shortcode', 'gltv_shortcodes' );
function gltv_shortcodes( $atts ) {
	
  $atts = shortcode_atts( 
    array(
      'id' => ''
    ), 
  $atts );
	
	wp_enqueue_script( 'gltv-enqueue-id', GLTV_PLUGIN_ASSETS_JS_SCRIPT_PHP.'script.php?carid='.$atts['id'] );
	
  ob_start();

		gltv_display_carousel( $atts );

  return ob_get_clean();
}

function gltv_display_carousel( $atts ) {
	?>
	<div class="slider-area">
		<div class="single-slider">
			<div id="owl-demo" class="owl-carousel owl-theme"></div>
		</div>
	</div>
<?php
}
