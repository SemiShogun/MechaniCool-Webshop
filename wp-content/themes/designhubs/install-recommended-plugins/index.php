<?php

add_action( "wp_ajax_designhubs_install_plugins", "designhubs_install_recommended_plugins" );
function designhubs_install_recommended_plugins(){
 	if ( isset( $_POST['nonce'] )  && !wp_verify_nonce( sanitize_text_field( wp_unslash($_POST['nonce'])), "designhubs_install_plugins" ) ) {
	//if ( !wp_verify_nonce( $_POST['nonce'], "designhubs_install_plugins" ) ) {
      	die;
   	}  

   	$recommended_plugins = apply_filters( 'designhubs_plugins', $plugins = array() );

   	designhubs_install_activate_plugins( $recommended_plugins );
   	update_option( 'designhubs_hide_msg', true );

   	echo 'success';

   	die;

}
function designhubs_install_activate_plugins( $recommended_plugins ){

	// Install and activate recommended plugins
	foreach ( $recommended_plugins as $key => $value ) {
		
		if ( !designhubs_is_plugin_installed( $value['slug'] ) ) {
	    	designhubs_install_plugin( 'https://downloads.wordpress.org/plugin/' . $value['zip'] . '.latest-stable.zip' );
	  	}

	    activate_plugin( $value['slug'] , '' , '' , true );

	}

}
function designhubs_is_plugin_installed( $slug ) {
	
  	if ( ! function_exists( 'get_plugins' ) ) {
    	//require_once ABSPATH . 'wp-admin/includes/plugin.php';
		get_template_part( 'wp-admin/includes/plugin.php' );
  	}

  	$all_plugins = get_plugins();
   
  	if ( !empty( $all_plugins[$slug] ) ) {
    	return true;
  	} else {
    	return false;
  	}

}

function designhubs_install_plugin( $plugin_zip ) {

	$upgrader = new \Plugin_Upgrader( new designhubs_Quiet_Skin() );

  	$installed = $upgrader->install( $plugin_zip );
 
  	return $installed;

}

include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';   	
 
class designhubs_Quiet_Skin extends \WP_Upgrader_Skin {

    public function feedback( $string, ...$args )
    {
        
    }
    public function header() 
    {
        
    }
    public function footer() 
    {
       
    }

}