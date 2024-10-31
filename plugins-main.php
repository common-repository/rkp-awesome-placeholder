<?php 
/*
Plugin Name: RKP Awesome Placeholder
Plugin URI: http://facebond.com/plugins/rkp-awesome-placeholder/
Description: This is awesome placeholder plugins. This plugins automatically animate and back type writing effect your placeholder. 
Author: Rejaul Karim Polin
Version: 1.0
Author URI: http://www.facebond.com
*/
 
/* Latest jQuery from Wordpress */
function rkp_awesome_placeholder_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'rkp_awesome_placeholder_latest_jquery');


/* Extra jQuery & CSS file include not for admin */
function rkp_awesome_jquery() {
	define('rkp_awesome_placeholder_wp', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

	wp_enqueue_script('rkp-awesome-placeholder-js', rkp_awesome_placeholder_wp . 'js/placeholdem.min.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'rkp_awesome_jquery' );


function rkp_awesome_placeholder_active() { ?>

	<script type="text/javascript">
			Placeholdem( document.querySelectorAll( '[placeholder]' ) );

			var fadeElems = document.body.querySelectorAll( '.fade' ),
				fadeElemsLength = fadeElems.length,
				i = 0,
				interval = 50;

				function incFade() {
					if( i < fadeElemsLength ) {
						fadeElems[ i ].className += ' fade-load';
						i++;
						setTimeout( incFade, interval );
					}
				}

				setTimeout( incFade, interval );
	</script>
<?php
}
add_action('wp_footer', 'rkp_awesome_placeholder_active');
?>