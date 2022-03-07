<?php
/* Notifications in customizer */

require get_template_directory()  . '/inc/customizer-notify/designhubs-notify.php';
$designhubs_config_customizer = array(
	'recommended_plugins'       => array(
		'page-section-for-themereviewer' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Page Section For Themereviewer </strong> plugin for taking full advantage of all the features this theme has to offer DesignHubs.', 'designhubs')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'designhubs' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'designhubs' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'designhubs' ),
	'activate_button_label'     => esc_html__( 'Activate', 'designhubs' ),
	'designhubs_deactivate_button_label'   => esc_html__( 'Deactivate', 'designhubs' ),
);
designhubs_Customizer_Notify::init( apply_filters( 'designhubs_recommended_plugins', $designhubs_config_customizer ) );
