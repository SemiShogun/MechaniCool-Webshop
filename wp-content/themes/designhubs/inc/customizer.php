<?php
/**
 * designhubs Theme Customizer
 *
 * @package designhubs
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

global $designhubs_fonttotal;
	$designhubs_fonttotal = array(
        __( 'Select Font', 'designhubs'  ),
        __( 'Abril Fatface', 'designhubs'  ),
        __( 'BenchNine', 'designhubs'  ),
        __( 'Cookie', 'designhubs'  ),
        __( 'Economica', 'designhubs'  ),
        __( 'Monda' , 'designhubs' ),
    );
function designhubs_customize_register( $wp_customize ) {

	

	$font_weight = array('100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
						'bold' => 'bold',
						'bolder' => 'bolder',
						'inherit' => 'inherit',
						'initial' => 'initial',
						'normal' => 'normal',
						'revert' => 'revert',
						'unset' => 'unset',
					);

	$text_transform = array(
						'capitalize' => 'Capitalize',
						'inherit'	 => 'Inherit',
						'lowercase'  => 'Lowercase',
						'uppercase'  => 'Uppercase',
	);

	$image_position = array(
						'left top' => 'Left Top',
			        	'left center' => 'Left Center',
			        	'left bottom' => 'Left Bottom',
			            'right top' => 'Right Top',
			            'right center' => 'Right Center',
			            'right bottom' => 'Right Bottom',
			            'center top' => 'Center Top',
			            'center center' => 'Center Center',
			            'center bottom' => 'Center Bottom',
	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'designhubs_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'designhubs_customize_partial_blogdescription',
			)
		);
	}


	if ( method_exists( $wp_customize, 'register_section_type' ) ) {
		$wp_customize->register_section_type( 'designhubs_pro_Section' );
	}
	if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
		$wp_customize->add_section(
			new designhubs_pro_Section(
				$wp_customize,
				'designhubs_pro_Section',
				array(
                	'pro_text' => esc_html__( 'Upgrade To PRO', 'designhubs' ),
                    //'pro_url'  => '#',
					'capability' => 'edit_theme_options',
					'priority' => 0,
					'type' => 'gp-upselles-section',
				)
			)
		);
	}

	if ( method_exists( $wp_customize, 'register_section_type' ) ) {
		$wp_customize->register_section_type( 'designhubs_documentation_Upsell_Section' );
	}
	if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
		$wp_customize->add_section(
			new designhubs_documentation_Upsell_Section(
				$wp_customize,
				'designhubs_documentation_Upsell_Section',
				array(
					'title'    => esc_html__( 'Documentation', 'designhubs' ),
                	'pro_text' => esc_html__( 'Read More', 'designhubs' ),
                	//'pro_url'  => 'https://www.xeeshop.com/designhubs-documentation/',
					'capability' => 'edit_theme_options',
					'priority' => 0,
					'type' => 'gp-upsell-section',
				)
			)
		);
	}

	//Color Section
		//body link color
			$wp_customize->add_setting( 'designhubs_link_color', 
				array(
		            'default'    => '#455d58', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'designhubs_link_color',array(
		            'label'      => __( 'Link Color', 'designhubs' ), 
		            'settings'   => 'designhubs_link_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 
	    //body link hover color
			$wp_customize->add_setting( 'designhubs_link_hover_color', 
				array(
		            'default'    => '#000000', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'designhubs_link_hover_color',array(
		            'label'      => __( 'Link Hover Color', 'designhubs' ), 
		            'settings'   => 'designhubs_link_hover_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 

	//Top Bar Section
		$wp_customize->add_panel( 'designhubs_topbar_section', array(
			'title'       => __('Top Bar', 'designhubs'),
			'priority'    => 1,
		) );
		// Create address Section
			$wp_customize->add_section( 'designhubs_address_section' , array(
				'title'             => 'Address Section',
				'panel'             => 'designhubs_topbar_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'designhubs_address_info_number', 
			        array(
			            'default'    => '2130 Fulton Street, San Francisco, CA - USA',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_address_info_number', 
			        array(
			            'label'      => __( 'Address', 'designhubs' ), 
			            'type'       => 'textarea',
			            'settings'   => 'designhubs_address_info_number',
			            'section'    => 'designhubs_address_section',
			        ) 
		        ) ); 
		//Create Contact Info Section
		    $wp_customize->add_section( 'designhubs_contact_section' , array(
				'title'             => 'Contact Info',
				'panel'             => 'designhubs_topbar_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'designhubs_contact_info_number', 
			        array(
			            'default'    => '04463235323',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_contact_info_number', 
			        array(
			            'label'      => __( 'Contact No.', 'designhubs' ), 
			            'type'       => 'text',
			            'settings'   => 'designhubs_contact_info_number',
			            'section'    => 'designhubs_contact_section',
			        ) 
		        ) ); 
		    //Contact Info Section in Email Info
			    $wp_customize->add_setting( 'designhubs_email_info', 
			        array(
			            'default'    => 'designhubs@gmail.com',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_email_info', 
			        array(
			            'label'      => __( 'Email Info', 'designhubs' ), 
			            'type'       => 'text',
			            'settings'   => 'designhubs_email_info',
			            'section'    => 'designhubs_contact_section',
			        ) 
		        ) );
		//Create Social Info Section
		    $wp_customize->add_section( 'designhubs_social_section' , array(
				'title'             => 'Social Info',
				'panel'             => 'designhubs_topbar_section',
			) );
			// Social Icon tabing
				$wp_customize->add_setting( 'social_icon_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Custom_Radio_Control( 
			        $wp_customize,'social_icon_tab',array(
			            'settings'   => 'social_icon_tab', 
			            'priority'   => 10,
			            'section'    => 'designhubs_social_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) ); 
		    //Display Social Icon
		        $wp_customize->add_setting( 'display_social_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_social_icon', 
			    	array(
		                'label' => 'Display Social Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'designhubs_social_section',
		                'settings' => 'display_social_icon',
		                'active_callback' => 'designhubs_social_icon_general_callback',
			        )
			    )); 
			//
			    $wp_customize->add_setting( 'social_icon_section', array(
			    	'default'  => 4,
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'designhubs_sanitize_number_range',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'social_icon_section',
			    	array(
						'type' => 'number',
						'settings'   => 'social_icon_section', 
						'section' => 'designhubs_social_section', // // Add a default or your own section
						'label' => 'No of Section',
						'description' => 'Save and refresh the page if No. of Sections is changed (Max no of Section is 4)',
						'input_attrs' => array(
									    'min' => 1,
									    'max' => 4,
									),
						'active_callback' => 'designhubs_social_icon_general_callback',				   
					)
				) );
				$social_icon = get_theme_mod( 'social_icon_section', 4 );
					for ( $i = 1; $i <= $social_icon ; $i++ ) {
						//social_icon Heading
							$wp_customize->add_setting('social_icon'.$i, array(
						        'type'       => 'theme_mod',
						        'transport'   => 'refresh',
						        'capability'     => 'edit_theme_options',
						        'sanitize_callback' => 'sanitize_text_field',
						    ));
						    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
						    	$wp_customize,'social_icon'.$i,
						    	array(
							        'settings' => 'social_icon'.$i,
							        'label'   => 'Social Icon '.$i ,
							        'section' => 'designhubs_social_section',
							        'type'     => 'ast-description',
							        'active_callback' => 'designhubs_social_icon_general_callback',
						        )
						    ));
						//Featured Section icon
							$wp_customize->add_setting('social_icon_one_icon'. $i,
						        array(
						            'default' => 'fa fa-facebook',
						            'transport' => 'refresh',
						            'type'       => 'theme_mod',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sanitize_text_field',
						        )
						    );
						    $wp_customize->add_control( new WP_Customize_Control(
						    	$wp_customize,'social_icon_one_icon'.$i,
						    	array(
						            'type'        => 'text',
									'settings'    => 'social_icon_one_icon'.$i,
									'label'       => 'Select Icon '.$i,
									'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Click Here</a> for select icon','designhubs'),
									'section'     => 'designhubs_social_section',
									'active_callback' => 'designhubs_social_icon_general_callback',
						        )
						    ));	
						//Featured Section Title 
							$wp_customize->add_setting( 'social_icon_link_' . $i , array(
								'default'   => '#',
							    'type'       => 'theme_mod',
						        'transport'   => 'refresh',
						        'capability'     => 'edit_theme_options',
						        'sanitize_callback' => 'sanitize_text_field',
							) );
							$wp_customize->add_control( new WP_Customize_Control(
						    	$wp_customize,'social_icon_link_' . $i,
						    	array(
									'type' => 'text',
									'settings'   => 'social_icon_link_' . $i, 
									'section' => 'designhubs_social_section', // // Add a default or your own section
									'label' => 'Link ' . $i,
									'active_callback' => 'designhubs_social_icon_general_callback',
								)
							) );
					}
			//Social Icon background Color
				$wp_customize->add_setting( 'designhubs_social_icon_bg_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_social_icon_bg_color', 
			        array(
			            'label'      => __( 'Icon Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_social_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_social_section',
			            'active_callback' => 'designhubs_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon background Hover Color
				$wp_customize->add_setting( 'designhubs_social_icon_bg_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_social_icon_bg_hover_color', 
			        array(
			            'label'      => __( 'Icon Background Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_social_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_social_section',
			            'active_callback' => 'designhubs_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Color
		    	$wp_customize->add_setting( 'designhubs_social_icon_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_social_icon_color', 
			        array(
			            'label'      => __( 'Icon Color', 'designhubs' ), 
			            'settings'   => 'designhubs_social_icon_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_social_section',
			            'active_callback' => 'designhubs_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Hover Color
		    	$wp_customize->add_setting( 'designhubs_social_icon_hover_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_social_icon_hover_color', 
			        array(
			            'label'      => __( 'Icon Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_social_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_social_section',
			            'active_callback' => 'designhubs_social_icon_design_callback',
			        ) 
		        ) );

		//Top Bar Width
		    $wp_customize->add_section( 'designhubs_top_bar_width' , array(
				'title'             => 'Top Bar Width',
				'panel'             => 'designhubs_topbar_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'designhubs_top_bar_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_top_bar_width_layout',array(
			        	'label'      => __( 'Top Bar Width', 'designhubs' ), 
			            'settings'   => 'designhubs_top_bar_width_layout', 
			            'priority'   => 0,
			            'section'    => 'designhubs_top_bar_width',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'designhubs_top_bar_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_top_bar_contact_width',array(
			        	'label'      => __( 'Top Bar Contact Width', 'designhubs' ), 
			            'settings'   => 'designhubs_top_bar_contact_width', 
			            'priority'   => 0,
			            'section'    => 'designhubs_top_bar_width',
			            'type'    => 'number',
			            'active_callback'  => 'designhubs_topbar_content_width_call_back',
			        ) 
		        ) );	   

    //Header Section
    	$wp_customize->add_panel( 'designhubs_header_section', array(
			'title'       => __('Header', 'designhubs'),
			'priority'    => 2,
		) );
		// Create Header Layouts
			$wp_customize->add_section( 'designhubs_header_layouts' , array(
				'title'             => 'Header Option',
				'panel'             => 'designhubs_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'designhubs_header_layout', 
			        array(
			            'default'    => 'header1',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Custom_Radio_Image_Control( 
			        $wp_customize,'designhubs_header_layout',array(
			        	'label'      => __( 'Header Layout & Transparent Layout', 'designhubs' ), 
			            'settings'   => 'designhubs_header_layout', 
			            'priority'   => 0,
			            'section'    => 'designhubs_header_layouts',
			            'type'    	 => 'select',
			            'choices'    => designhubs_header_site_layout(),
			        ) 
		        ) );	

		    //Header 1
		        //Header1 Background color
			        $wp_customize->add_setting( 'designhubs_header1_bg_color', 
				        array(
				            'default'    => '#455d58', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control( 
				        $wp_customize, 'designhubs_header1_bg_color', 
				        array(
				            'label'      => __( 'Background Color', 'designhubs' ), 
				            'settings'   => 'designhubs_header1_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback' => 'designhubs_header1_call_back',
				        ) 
			        ) );
			    //Header1 Text color
			        $wp_customize->add_setting( 'designhubs_header1_text_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control( 
				        $wp_customize, 'designhubs_header1_text_color', 
				        array(
				            'label'      => __( 'Text Color', 'designhubs' ), 
				            'settings'   => 'designhubs_header1_text_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback' => 'designhubs_header1_call_back',
				        ) 
			        ) );
			    //Header1 Link Color
			        $wp_customize->add_setting( 'designhubs_header1_Link_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control( 
				        $wp_customize, 'designhubs_header1_Link_color', 
				        array(
				            'label'      => __( 'Link Color', 'designhubs' ), 
				            'settings'   => 'designhubs_header1_Link_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback' => 'designhubs_header1_call_back',
				        ) 
			        ) );
			    //Header1 Link Hover Color
			        $wp_customize->add_setting( 'designhubs_header1_linkhover_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control( 
				        $wp_customize, 'designhubs_header1_linkhover_color', 
				        array(
				            'label'      => __( 'Link hover Color', 'designhubs' ), 
				            'settings'   => 'designhubs_header1_linkhover_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback' => 'designhubs_header1_call_back',
				        ) 
			        ) );
			    //Header1 top bar background color
					$wp_customize->add_setting( 'header1_top_bar_bg_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control( 
				        $wp_customize,'header1_top_bar_bg_color', 
				        array(
				            'label'      => __( 'Top Bar Background Color', 'designhubs' ), 
				            'settings'   => 'header1_top_bar_bg_color', 
				            'priority'   => 10,
				            'section'    => 'designhubs_header_layouts', 
				            'active_callback' => 'designhubs_header1_call_back',    
				        ) 
			        ) );
			    //top bar text color
					$wp_customize->add_setting( 'header1_top_bar_text_color', 
				        array(
				            'default'    => '#455d58', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control( 
				        $wp_customize,'header1_top_bar_text_color', 
				        array(
				            'label'      => __( 'Top Bar Text Color', 'designhubs' ), 
				            'settings'   => 'header1_top_bar_text_color', 
				            'priority'   => 10,
				            'section'    => 'designhubs_header_layouts',   
				            'active_callback' => 'designhubs_header1_call_back',  
				        ) 
			        ) );

			//Header 3
			    //Transparent Header Background Color
				    $wp_customize->add_setting( 'transparent_header_bg_color', 
				        array(
				            'default'    => 'rgba(0,0,0,0.6)', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Designhubs_Transparent_Color_Control(  $wp_customize, 'transparent_header_bg_color',array(
				            'label'      => __( 'Transparent Header Background Color', 'designhubs' ), 
				            'settings'   => 'transparent_header_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback'  => 'designhubs_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Text Color
				    $wp_customize->add_setting( 'transparent_header_text_color', 
				        array(
				            'default'    => '#fff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'transparent_header_text_color',array(
				            'label'      => __( 'Transparent Header Text Color', 'designhubs' ), 
				            'settings'   => 'transparent_header_text_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback'  => 'designhubs_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Link Color
				    $wp_customize->add_setting( 'transparent_header_link_color', 
				        array(
				            'default'    => '#fff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'transparent_header_link_color',array(
				            'label'      => __( 'Transparent Header Link Color', 'designhubs' ), 
				            'settings'   => 'transparent_header_link_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback'  => 'designhubs_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Link Hover Color
				    $wp_customize->add_setting( 'transparent_header_link_hover_color', 
				        array(
				            'default'    => '#02cfaa', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_hex_color',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'transparent_header_link_hover_color',array(
				            'label'      => __( 'Transparent Header Link Hover Color', 'designhubs' ), 
				            'settings'   => 'transparent_header_link_hover_color', 
				            'priority'   => 10, 
				            'section'    => 'designhubs_header_layouts',
				            'active_callback'  => 'designhubs_transparent_call_menu_btn_callback',
				        ) 
			        ) );

			//Manu Active color
				$wp_customize->add_setting( 'header_menu_active_color', 
			        array(
			            'default'    => '#02cfaa', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_active_color',array(
			            'label'      => __( 'Menu Active Color', 'designhubs' ), 
			            'settings'   => 'header_menu_active_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );
		    //Desktop Submenu Background Color
		        $wp_customize->add_setting( 'header_desktop_submenu_bg_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_desktop_submenu_bg_color',array(
			            'label'      => __( 'Desktop Submenu Background Color', 'designhubs' ), 
			            'settings'   => 'header_desktop_submenu_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );
		    //Desktop Submenu text Color
		        $wp_customize->add_setting( 'header_desktop_submenu_text_color', 
			        array(
			            'default'    => '#455d58', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_desktop_submenu_text_color',array(
			            'label'      => __( 'Desktop Submenu Text Color', 'designhubs' ), 
			            'settings'   => 'header_desktop_submenu_text_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );

		    //Mobile Nav menu Background Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_background_color', 
			        array(
			            'default'    => '#455d58', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_mobile_navmenu_background_color',array(
			            'label'      => __( 'Mobile NavMenu Background Color', 'designhubs' ), 
			            'settings'   => 'header_mobile_navmenu_background_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );
		    //Mobile Submenu Background Color
		        $wp_customize->add_setting( 'header_mobile_submenu_background_color', 
			        array(
			            'default'    => '#a9d7ce', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_mobile_submenu_background_color',array(
			            'label'      => __( 'Mobile Submenu Background Color', 'designhubs' ), 
			            'settings'   => 'header_mobile_submenu_background_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );
		    //Mobile Nav Menu Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_mobile_navmenu_color',array(
			            'label'      => __( 'Mobile Nav Menu Color', 'designhubs' ), 
			            'settings'   => 'header_mobile_navmenu_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );
		    //Mobile Nav Menu Acive Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_active_color', 
			        array(
			            'default'    => '#00ffca', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_mobile_navmenu_active_color',array(
			            'label'      => __( 'Mobile Nav Menu Active Color', 'designhubs' ), 
			            'settings'   => 'header_mobile_navmenu_active_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_header_layouts',
			        ) 
		        ) );

			//Display Search Icon
			    $wp_customize->add_setting( 'display_search_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_search_icon', 
			    	array(
		                'label' => 'Display Search Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'designhubs_header_layouts',
		                'settings' => 'display_search_icon',
			        )
			    )); 
			//Mobile Display Search Icon
			    $wp_customize->add_setting( 'display_mobile_search_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_mobile_search_icon', 
			    	array(
		                'label' => 'Mobile In Display Search Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'designhubs_header_layouts',
		                'settings' => 'display_mobile_search_icon',
			        )
			    )); 
			//Display Cart Icon
			    $wp_customize->add_setting( 'display_cart_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_cart_icon', 
			    	array(
		                'label' => 'Display Cart Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'designhubs_header_layouts',
		                'settings' => 'display_cart_icon',
			        )
			    )); 
			//Mobile Display Search Icon
			    $wp_customize->add_setting( 'display_mobile_cart_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_mobile_cart_icon', 
			    	array(
		                'label' => 'Mobile In Display Cart Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'designhubs_header_layouts',
		                'settings' => 'display_mobile_cart_icon',
			        )
			    )); 

		// Create Call Menu Buttons
			$wp_customize->add_section( 'call_menu_btn_section' , array(
				'title'             => 'Call Menu Button',
				'panel'             => 'designhubs_header_section',
			) );        
			//call menu button display in header option
		        $wp_customize->add_setting( 'designhubs_call_menu_btn', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'designhubs_call_menu_btn', 
			    	array(
		                'label' => 'Display header Menu Button',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'call_menu_btn_section',
		                'settings' => 'designhubs_call_menu_btn',
			        )
			    )); 
			//call menu button title 
			    $wp_customize->add_setting( 'designhubs_call_menu_btn_title', array(		                
			                'default'   => "Get A Quote",
							'priority'  => 10,
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'designhubs_call_menu_btn_title', 
				    	array(
			                'label' => 'Title',
			                'type'  => 'text', // this indicates the type of control
			                'section' => 'call_menu_btn_section',
			                'settings' => 'designhubs_call_menu_btn_title',
			                'active_callback'  => 'designhubs_call_menu_btn_callback',
				        )
			    ));
			//call menu button in add link
		        $wp_customize->add_setting( 'designhubs_menu_btn_link', array(
		            'default'        => '#',
		            'capability'     => 'edit_theme_options',
		            'type'           => 'theme_mod',
		            'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,'designhubs_menu_btn_link',
			    	array(
			            'label'      => __('Text Link', 'designhubs'),
			            'section'    =>  'call_menu_btn_section',
			            'settings'   => 'designhubs_menu_btn_link',
			            'active_callback'  => 'designhubs_call_menu_btn_callback',
			        )
		        ));
			//call menu button in add background color
			    $wp_customize->add_setting( 'designhubs_callmenu_btn_bg_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control(  $wp_customize, 'designhubs_callmenu_btn_bg_color',array(
			            'label'      => __( 'Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_callmenu_btn_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section',
			            'active_callback'  => 'designhubs_call_menu_btn_callback',
			        ) 
		        ) );
	        //call menu button in add backround hovor color
		        $wp_customize->add_setting( 'designhubs_callmenu_btn_bghover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'designhubs_callmenu_btn_bghover_color', 
			        array(
			            'label'      => __( 'Background Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_callmenu_btn_bghover_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section',
			            'active_callback'  => 'designhubs_call_menu_btn_callback', 
			        ) 
		        ) );
	        //call menu button in add text color
		        $wp_customize->add_setting( 'designhubs_callmenu_btn_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'designhubs_callmenu_btn_color', 
			        array(
			            'label'      => __( 'Text Color', 'designhubs' ), 
			            'settings'   => 'designhubs_callmenu_btn_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section', 
			            'active_callback'  => 'designhubs_call_menu_btn_callback',
			        ) 
		        ) );
	        //call menu button in add Text hovor color
		        $wp_customize->add_setting( 'designhubs_call_btn_texthover_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'designhubs_call_btn_texthover_color', 
			        array(
			            'label'      => __( 'Text Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_call_btn_texthover_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section', 
			            'active_callback'  => 'designhubs_call_menu_btn_callback',
			        ) 
		        ) );
	        //call menu button in add Border color
		        $wp_customize->add_setting( 'designhubs_call_btn_border_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'designhubs_call_btn_border_color', 
			        array(
			            'label'      => __( 'Border Color', 'designhubs' ), 
			            'settings'   => 'designhubs_call_btn_border_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section', 
			            'active_callback'  => 'designhubs_call_menu_btn_callback',
			        ) 
		        ) );

		//Header Width
		    $wp_customize->add_section( 'designhubs_header_width' , array(
				'title'             => 'Header Width',
				'panel'             => 'designhubs_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'designhubs_header_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_header_width_layout',array(
			        	'label'      => __( 'Header Width', 'designhubs' ), 
			            'settings'   => 'designhubs_header_width_layout', 
			            'priority'   => 0,
			            'section'    => 'designhubs_header_width',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'designhubs_header_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_header_contact_width',array(
			        	'label'      => __( 'Header Contact Width', 'designhubs' ), 
			            'settings'   => 'designhubs_header_contact_width', 
			            'priority'   => 0,
			            'section'    => 'designhubs_header_width',
			            'type'    => 'number',
			            'active_callback'  => 'designhubs_header_content_width_call_back',
			        ) 
		        ) );	   

    //Global Section		
    	$wp_customize->add_panel( 'designhubs_global_panel', array(
			'title'     => __('Global', 'designhubs'),
			'priority'  => 3,
		) );  
		// Create global Fonts & Typography option
			$wp_customize->add_section( 'global_body_section' , array(
				'title'  => 'Body Fonts & Typography',
				'panel'  => 'designhubs_global_panel',
			) );			
			//global option in body font family
				global $designhubs_fonttotal;
		        $wp_customize->add_setting('designhubs_body_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_body_fontfamily',
			    	array(
				        'settings' => 'designhubs_body_fontfamily',
				        'label'   => 'Body Font Family',
				        'section' => 'global_body_section',
				        'type'    => 'select',
				        'choices' => $designhubs_fonttotal,
				    )
				)); 

			//global otion in body font size 
				$wp_customize->add_setting('designhubs_body_font_size', array(
			        'default'        => 15,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_body_font_size',
			    	array(
				        'settings' => 'designhubs_body_font_size',
				        'label'   => 'Body Font Size',
				        'section' => 'global_body_section',
				        'type'  => "number",
				        'description' => 'in px',
		            	'input_attrs' => array(
									    'min' => 1,
									    'max' => 50,
									),
			        )
			    )); 
			//global option in body font weight
			    $wp_customize->add_setting('designhubs_body_font_weight', array(
			        'default'        => 400,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_body_font_weight',
			    	array(
				        'settings' => 'designhubs_body_font_weight',
				        'label'   => 'Body Font Weight',
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' => $font_weight,
			        )
			    ));
			//global option in body text transform
			    $wp_customize->add_setting('designhubs_body_text_transform', array(
			        'default'        => 'inherit',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_body_text_transform',
			    	array(
				        'settings' => 'designhubs_body_text_transform',
				        'label'   => 'Body Text Transform',
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' =>  $text_transform,
			        )
			    ));

				//mobile in font size
				    $wp_customize->add_setting( 'designhubs_mobile_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'designhubs_mobile_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_mobile_font_size', 
				            'section'    => 'global_body_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );     

		// Create global Heading Fonts & Typography option
			$wp_customize->add_section( 'global_heading_section' , array(
				'title'             => 'Heading Fonts & Typography',
				'panel'             => 'designhubs_global_panel',
			) );
			//global option in body font family add select dropdown
				global $designhubs_fonttotal;
		        $wp_customize->add_setting('designhubs_Heading_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_Heading_fontfamily',
			    	array(
				        'settings' => 'designhubs_Heading_fontfamily',
				        'label'   => 'Heading Font Family',
				        'section' => 'global_heading_section',
				        'type'    => 'select',
				        'choices' => $designhubs_fonttotal,
			        )
			    )); 

			//heading1 Title
			    $wp_customize->add_setting('Heading1_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading1_section',
			    	array(
				        'settings' => 'Heading1_section',
				        'label'   => 'Heading 1 (H1)',
				        'section' => 'global_heading_section',
				        'type'     => 'ast-description',
			        )
			    ));

				//global option in heading1 font family
					global $designhubs_fonttotal;
			        $wp_customize->add_setting('designhubs_Heading1_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_Heading1_fontfamily',
				    	array(
					        'settings' => 'designhubs_Heading1_fontfamily',
					        'label'   => 'Font Family',
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $designhubs_fonttotal,
				        )
				    ));
				//global heading1 font size
				    $wp_customize->add_setting( 'designhubs_heading1_font_size', 
				        array(
				            'default'    => '35', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'designhubs_heading1_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading1 font weight
				    $wp_customize->add_setting('designhubs_heading1_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_heading1_font_weight',
				    	array(
					        'settings' => 'designhubs_heading1_font_weight',
					        'label'   => 'Font Weight',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading1 text transform
				    $wp_customize->add_setting('designhubs_heading1_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_heading1_text_transform',
				    	array(
					        'settings' => 'designhubs_heading1_text_transform',
					        'label'   => 'Text Transform',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading1 font size
				    $wp_customize->add_setting( 'designhubs_mobile_heading1_font_size', 
				        array(
				            'default'    => '20', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'designhubs_mobile_heading1_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_mobile_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		    //heading2 Title
			    $wp_customize->add_setting('Heading2_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading2_section',
			    	array(
				        'settings' => 'Heading2_section',
				        'label'   => 'Heading 2 (H2)',
				        'section' => 'global_heading_section',
			        )
			    ));
				//global option in heading2 font family
					global $designhubs_fonttotal;
			        $wp_customize->add_setting('designhubs_Heading2_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_Heading2_fontfamily',
				    	array(
					        'settings' => 'designhubs_Heading2_fontfamily',
					        'label'   => 'Font Family',
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $designhubs_fonttotal,
				        )
				    )); 
				//global heading2 font size
				    $wp_customize->add_setting( 'designhubs_heading2_font_size', 
				        array(
				            'default'    => '28', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'designhubs_heading2_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading2 font weight
				    $wp_customize->add_setting('designhubs_heading2_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_heading2_font_weight',
				    	array(
					        'settings' => 'designhubs_heading2_font_weight',
					        'label'   => 'Font Weight',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('designhubs_heading2_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_heading2_text_transform',
				    	array(
					        'settings' => 'designhubs_heading2_text_transform',
					        'label'   => 'Text Transform',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'designhubs_mobile_heading2_font_size', 
				        array(
				            'default'    => '18', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'designhubs_mobile_heading2_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_mobile_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		    //heading3 Title
			    $wp_customize->add_setting('Heading3_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading3_section',
			    	array(
				        'settings' => 'Heading3_section',
				        'label'   => 'Heading 3 (H3)',
				        'section' => 'global_heading_section',
			        )
			    ));
				//global option in heading3 font family
					global $designhubs_fonttotal;
			        $wp_customize->add_setting('designhubs_Heading3_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_Heading3_fontfamily',
				    	array(
					        'settings' => 'designhubs_Heading3_fontfamily',
					        'label'   => 'Font Family',
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $designhubs_fonttotal,
				        )
				    ));
			    //global heading3 font size
				    $wp_customize->add_setting( 'designhubs_heading3_font_size', 
				        array(
				            'default'    => '25', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'designhubs_heading3_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading3 font weight
				    $wp_customize->add_setting('designhubs_heading3_font_weight', array(
				        'default'        => 400,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_heading3_font_weight',
				    	array(
					        'settings' => 'designhubs_heading3_font_weight',
					        'label'   => 'Font Weight',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('designhubs_heading3_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'designhubs_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_heading3_text_transform',
				    	array(
					        'settings' => 'designhubs_heading3_text_transform',
					        'label'   => 'Text Transform',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'designhubs_mobile_heading3_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'designhubs_mobile_heading3_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'designhubs' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'designhubs_mobile_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		//Create global in Container Option
			$wp_customize->add_section( 'global_container_section' , array(
				'title'             => 'Container',
				'panel'             => 'designhubs_global_panel',
			) );	
			//Container Blog Title
				$wp_customize->add_setting( 'designhubs_blog_title', 
			        array(
			            'default'    => 'Blogs', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'designhubs_blog_title', 
			        array(
			            'label'      => __( 'Blog Title', 'designhubs' ), 
			            'settings'   => 'designhubs_blog_title', 
			            'priority'   => 0, 
			            'type'       => 'text',
			            'section'    => 'global_container_section',
			        ) 
		        ) );
			//Container Section in width layout
			    $wp_customize->add_setting( 'designhubs_container_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_container_width_layout',array(
			        	'label'      => __( 'Page Layouts', 'designhubs' ), 
			            'settings'   => 'designhubs_container_width_layout', 
			            'priority'   => 0,
			            'section'    => 'global_container_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Boxed',
			            				'boxed_layout' => 'Boxed Layout',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'designhubs_container_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_container_contact_width',array(
			        	'label'      => __( 'Container Contact Width', 'designhubs' ), 
			            'settings'   => 'designhubs_container_contact_width', 
			            'priority'   => 0,
			            'section'    => 'global_container_section',
			            'type'    => 'number',
			            'active_callback'  => 'designhubs_container_content_width_call_back',
			        ) 
		        ) );	           
		    //Container Option in Backgound Color
				$wp_customize->add_setting( 'designhubs_container_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_container_bg_color', 
			        array(
			            'label'      => __( 'Container Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			        ) 
		        ) );	
		    //Container Option in Boxed Backgound Color
				$wp_customize->add_setting( 'designhubs_boxed_container_bg_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_boxed_container_bg_color', 
			        array(
			            'label'      => __( 'Content Boxed Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_boxed_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			            'active_callback'  => 'designhubs_content_box_call_back',
			        ) 
		        ) );	
		    //Boxed Layout Option in Backgound Color
				$wp_customize->add_setting( 'designhubs_boxed_layout_bg_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_boxed_layout_bg_color', 
			        array(
			            'label'      => __( 'Boxed Layout Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_boxed_layout_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			            'active_callback'  => 'designhubs_box_layout_call_back',
			        ) 
		        ) );	
		    //Container Option in blog layout
		        $wp_customize->add_setting('designhubs_container_blog_layout', array(
			        'default'        => 'grid_view',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_container_blog_layout',
			    	array(
				        'settings' => 'designhubs_container_blog_layout',
				        'label'   => 'Blogs Layouts',
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices' => array(
				        			'list_view' => 'List View',
				        			'grid_view' => 'Grid View',
				        ),
			        )
			    ));	
			//Grid View Title
			    $wp_customize->add_setting('grid_view_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
			    	$wp_customize,'grid_view_section',
			    	array(
				        'settings' => 'grid_view_section',
				        'label'   => 'Grid View',
				        'section' => 'global_container_section',
				        'type'     => 'ast-description',
				        'active_callback'  => 'designhubs_grid_view_callback',
			        )
			    ));
			//Container Option in grid view columns
			        $wp_customize->add_setting('designhubs_container_grid_view_col', array(
				        'default'        => '3',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_container_grid_view_col',
				    	array(
					        'settings' => 'designhubs_container_grid_view_col',
					        'label'   => 'Columns',
					        'section' => 'global_container_section',
					        'type'    => 'select',
					        'choices' => array(
					        			'1' => '1',
					        			'2' => '2',
					        			'3' => '3',
					        ),
					        'active_callback'  => 'designhubs_grid_view_callback',
				        )
				    ));
				//Container Option in grid view columns gap
			        $wp_customize->add_setting('designhubs_container_grid_view_col_gap', array(
				        'default'        => '20',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'designhubs_container_grid_view_col_gap',
				    	array(
					        'settings' => 'designhubs_container_grid_view_col_gap',
					        'label'   => 'Columns Gap',
					        'section' => 'global_container_section',
					        'type'    => 'number',
					        'description' => 'in px',
					        'active_callback'  => 'designhubs_grid_view_callback',
				        )
				    ));	  
		    //Display meta and entry-content title
				$wp_customize->add_setting('display_meta_content_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
			    	$wp_customize,'display_meta_content_section',
			    	array(
				        'settings' => 'display_meta_content_section',
				        'label'   => 'Display Home Page Container',
				        'section' => 'global_container_section',
			        )
			    )); 
			    //display containe
			        $wp_customize->add_setting( 'designhubs_container_containe', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_containe', 
						array(
							'label' => 'Display Blog Containe',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_containe',
							)
					));
				//display container description
			        $wp_customize->add_setting( 'designhubs_container_description', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_description', 
						array(
							'label' => 'Display Container Description',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_description',
							)
					));
				//display container Date
			        $wp_customize->add_setting( 'designhubs_container_date', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_date', 
						array(
							'label' => 'Display Container Date',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_date',
							)
					));
				//display container Authore
			        $wp_customize->add_setting( 'designhubs_container_authore', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_authore', 
						array(
							'label' => 'Display Container Authore',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_authore',
							)
					));
				//display container Category
			        $wp_customize->add_setting( 'designhubs_container_category', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_category', 
						array(
							'label' => 'Display Container Category',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_category',
							)
					));
				//display container comments
			        $wp_customize->add_setting( 'designhubs_container_comments', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_comments', 
						array(
							'label' => 'Display Container Comments',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_comments',
							)
					));	
				//display Read More buttons
					$wp_customize->add_setting( 'designhubs_container_readmore_btn', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'designhubs_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_readmore_btn', 
						array(
							'label' => 'Display Read More Button',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_readmore_btn',
							)
					));	
				//display Read More buttons title
					$wp_customize->add_setting( 'designhubs_container_readmore_btn_title', array(		                
						'default'   => 'Read More',
						'priority'  => 10,
						'sanitize_callback' => 'sanitize_text_field',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'designhubs_container_readmore_btn_title', 
						array(
							'label' => 'Read More Button Title',
							'type'  => 'text', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'designhubs_container_readmore_btn_title',
							'active_callback' => 'designhubs_read_more_callback',
							)
					));	

		//Create global section in add Buttons
			// Create Button color and Backgound color
				$wp_customize->add_section( 'global_button_option' , array(
					'title'  => 'Buttons',
					'panel'  => 'designhubs_global_panel',
				) );
			//Button background color
		        $wp_customize->add_setting( 'designhubs_button_bg_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_button_bg_color', 
			        array(
			            'label'      => __( 'Button Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_button_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Background Hover color
				$wp_customize->add_setting( 'designhubs_button_bg_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_button_bg_hover_color', 
			        array(
			            'label'      => __( 'Background Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_button_bg_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Text color
				$wp_customize->add_setting( 'designhubs_button_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_button_text_color', 
			        array(
			            'label'      => __( 'Button Text Color', 'designhubs' ), 
			            'settings'   => 'designhubs_button_text_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Text hover color
				$wp_customize->add_setting( 'designhubs_button_texthover_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_button_texthover_color', 
			        array(
			            'label'      => __( 'Button Text Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_button_texthover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Border color
				$wp_customize->add_setting( 'designhubs_button_border_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_button_border_color', 
			        array(
			            'label'      => __( 'Border Color', 'designhubs' ), 
			            'settings'   => 'designhubs_button_border_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Border Hover color
				$wp_customize->add_setting( 'designhubs_button_border_hover_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'designhubs_button_border_hover_color', 
			        array(
			            'label'      => __( 'Border Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_button_border_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in button border width
		        $wp_customize->add_setting( 'designhubs_borderwidth', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'designhubs_borderwidth', 
			        array(
			            'label'      => __( 'Border Width', 'designhubs' ), 
			            'type'  => "number",
			            'settings'   => 'designhubs_borderwidth', 
			            'section'    => 'global_button_option',
			            'description' => 'in px',
			        ) 
		        ) ); 
		    //global option in button border radius
		        $wp_customize->add_setting( 'designhubs_button_border_radius', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'designhubs_button_border_radius', 
			        array(
			            'label'      => __( 'Border Radius', 'designhubs' ), 
			            'type'  	 => "number",
			            'settings'   => 'designhubs_button_border_radius', 
			            'section'    => 'global_button_option',
			            'description'=> 'in px',
			        ) 
		        ) );
		    //global option in button padding
		        $wp_customize->add_setting( 'designhubs_button_padding', 
			        array(
			            'default'    => '10px 15px', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'designhubs_button_padding', 
			        array(
			            'label'      => __( 'Button Padding', 'designhubs' ), 
			            'type'  	 => "text",
			            'settings'   => 'designhubs_button_padding', 
			            'section'    => 'global_button_option',
			            'description'=> '15px 25px',
			        ) 
		        ) );  
		//Create a Scroll Button
			$wp_customize->add_section( 'scroll_button_section' , array(
				'title'             => 'Scroll Button',
				'panel'             => 'designhubs_global_panel',
			) ); 
			//Scroll Button display
				$wp_customize->add_setting( 'display_scroll_button', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'display_scroll_button', 
					array(
						'label' => 'Display Scroll Button',
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'scroll_button_section',
						'settings' => 'display_scroll_button',
						)
				));
			//Scroll Button in add Background color
			    $wp_customize->add_setting( 'designhubs_scroll_button_bg_color', 
			        array(
			            'default'    => '#02cfaa', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_scroll_button_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_scroll_button_bg_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'designhubs_scroll_callback',
			        ) 
		        ) );  
		    //Scroll Button in add color
			    $wp_customize->add_setting( 'designhubs_scroll_button_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_scroll_button_color', 
			        array(
			            'label'      => __( 'Scroll Icon Color', 'designhubs' ), 
			            'settings'   => 'designhubs_scroll_button_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'designhubs_scroll_callback',
			        ) 
		        ) ); 

	//Sidebar Section
		$wp_customize->add_panel( 'designhubs_sidebar_panel', array(
			'title'     => __('Sidebar', 'designhubs'),
			'priority'  => 4,
		) ); 
		$post_types = get_post_types(array('public' => true), 'names', 'and');
		foreach ($post_types  as $post_type) {
				$wp_customize->add_section( 'sidebar_section_' .$post_type, array(
					'title'             => $post_type .' Sidebar',
					'panel'             => 'designhubs_sidebar_panel',
				) );
				//sidebar in add layout select dropdown
			        $wp_customize->add_setting('designhubs_post_sidebar_select_'.$post_type , array(
						'default'   => 'right_sidebar',
				        'type'       => 'theme_mod',
				        'capability'     => 'edit_theme_options',
				        'transport'   => 'refresh',
				        'sanitize_callback' => 'designhubs_sanitize_select',		  
				    ));
				    $layout_label= $post_type . ' Layout:';
				    $wp_customize->add_control( new Designhubs_Custom_Radio_Image_Control(
				    	$wp_customize,'designhubs_post_sidebar_select_'.$post_type,
				    	array(
					        'settings' => 'designhubs_post_sidebar_select_'.$post_type,
					        'label'   => $layout_label,
					        'section' => 'sidebar_section_'.$post_type,
					        'type'    => 'select',
					        'choices' => designhubs_site_layout(),
				        )
				    ));

			    //sidebar in width text filed
					$wp_customize->add_setting( 'designhubs_post_sidebar_width_' . $post_type, 
				        array(
				            'default'    => '30', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'capability'     => 'edit_theme_options',
				            'transport'   => 'refresh',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    );
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'designhubs_post_sidebar_width_' . $post_type, 
				        array(
				            'label'      =>$post_type . ' Sidebar Width:', 
				            'type'  => "number",
				            'settings'   => 'designhubs_post_sidebar_width_' . $post_type, 
				            'section'    => 'sidebar_section_'.$post_type,
				            'description' => 'in %',
				        ) 
			        ) );
		} 
		$wp_customize->add_section( 'designhubs_sidebar_design', array(
			'title'             => 'Design',
			'panel'             => 'designhubs_sidebar_panel',
		) );
		//Sidebar design option
			$wp_customize->add_setting( 'designhubs_sidebar_heading_bg_color', 
		        array(
		            'default'    => '#455d58', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'designhubs_sidebar_heading_bg_color', 
		        array(
		            'label'      => __( 'Heading Background Color', 'designhubs' ), 
		            'settings'   => 'designhubs_sidebar_heading_bg_color', 
		            'priority'   => 10,
		            'section'    => 'designhubs_sidebar_design',
		        ) 
	        ) );
	    //Sidebar design Heading Text color
			$wp_customize->add_setting( 'designhubs_sidebar_heading_text_color', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'designhubs_sidebar_heading_text_color', 
		        array(
		            'label'      => __( 'Heading Text Color', 'designhubs' ), 
		            'settings'   => 'designhubs_sidebar_heading_text_color', 
		            'priority'   => 10,
		            'section'    => 'designhubs_sidebar_design',
		        ) 
	        ) );  

	//Theme Option in globly
		$wp_customize->add_panel( 'designhubs_theme_option_panel', array(
			'title'     => __('Theme Option', 'designhubs'),
			'priority'  => 5,
		) );
		//Breadcrumb Section			
			$wp_customize->add_section( 'global_breadcrumb_section' , array(
				'title'  => 'Breadcrumb Section',
				'panel'  => 'designhubs_theme_option_panel',				

			) );
			//Breadcrumb Section in entire site select 
				$wp_customize->add_setting( 'designhubs_display_breadcrumb_section', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'designhubs_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'designhubs_display_breadcrumb_section', 
					array(
						'label' => 'Disable On Breadcrumb Entire Site',
						'type'  => 'checkbox',
						'section' => 'global_breadcrumb_section',
						'settings' => 'designhubs_display_breadcrumb_section',
						)
				));	
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'designhubs_display_breadcrumb_section',
						array(
							'selector'        => '.breadcrumb_info',
							'render_callback' => 'designhubs_customize_partial_breadcrumb',
						)
					);
				}
			//Breadcrumb Section in Background color
				$wp_customize->add_setting( 'designhubs_breadcrumb_bg_color', 
			        array(
			            'default'    => '#c8c9cb', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_breadcrumb_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_breadcrumb_bg_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'designhubs_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Text color
				$wp_customize->add_setting( 'designhubs_breadcrumb_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_breadcrumb_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'designhubs' ), 
			            'settings'   => 'designhubs_breadcrumb_text_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'designhubs_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Icon color
				$wp_customize->add_setting( 'designhubs_breadcrumb_link_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_breadcrumb_link_color', 
			        array(
			            'label'      => __( 'Icon Color', 'designhubs' ), 
			            'settings'   => 'designhubs_breadcrumb_link_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'designhubs_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Icon Background color
		        $wp_customize->add_setting( 'designhubs_breadcrumb_icon_background_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'designhubs_breadcrumb_icon_background_color', 
			        array(
			            'label'      => __( 'Icon Button Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_breadcrumb_icon_background_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'designhubs_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section background image option
		        $wp_customize->add_setting('designhubs_breadcrumb_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'designhubs_breadcrumb_bg_image', array(
			        'label' => __('Backgroung Image', 'designhubs'),
			        'section' => 'global_breadcrumb_section',
			        'settings' => 'designhubs_breadcrumb_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'designhubs_breadcrumb_call_back',
			    ))); 
			//Breadcrumb Section in image background position
			    $wp_customize->add_setting('designhubs_img_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_img_bg_position',
			    	array(
				        'settings' => 'designhubs_img_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => $image_position,
			        	'active_callback' => 'designhubs_breadcrumb_call_back',
			        )
			    )); 
			//Breadcrumb Section in image background attachment
			    $wp_customize->add_setting('designhubs_breadcrumb_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_breadcrumb_bg_attachment',
			    	array(
				        'settings' => 'designhubs_breadcrumb_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'designhubs_breadcrumb_call_back',
			        )
			    ));
			//Breadcrumb Section in image background Size
			    $wp_customize->add_setting('designhubs_breadcrumb_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'designhubs_breadcrumb_bg_size',
			    	array(
				        'settings' => 'designhubs_breadcrumb_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'designhubs_breadcrumb_call_back',
			        )
			    ));   

	//Footer Section
		$wp_customize->add_panel( 'designhubs_footer_panel', array(
			'title'     => __('Footer', 'designhubs'),
			'priority'  => 6,
		) ); 
		//Footer Section 
			$wp_customize->add_section( 'designhubs_footer_section' , array(
				'title'       => __('Footer Option', 'designhubs'),
				'panel'  => 'designhubs_footer_panel',
			) );

			//Footer Background Color
				$wp_customize->add_setting( 'designhubs_footer_bg_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'designhubs_footer_bg_color', 
			        array(
			            'label'      => __( 'Footer Background Color', 'designhubs' ), 
			            'settings'   => 'designhubs_footer_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_footer_section',
			        ) 
		        ) );	
		    //Footer Text Color
				$wp_customize->add_setting( 'designhubs_footer_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'designhubs_footer_text_color', 
			        array(
			            'label'      => __( 'Footer Text Color', 'designhubs' ), 
			            'settings'   => 'designhubs_footer_text_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_footer_section',
			        ) 
		        ) );	
		    //Footer Link Color
				$wp_customize->add_setting( 'designhubs_footer_link_color', 
			        array(
			            'default'    => '#24c3a2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'designhubs_footer_link_color', 
			        array(
			            'label'      => __( 'Link Color', 'designhubs' ), 
			            'settings'   => 'designhubs_footer_link_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_footer_section',
			        ) 
		        ) );	
		    //Footer Link Hover Color
				$wp_customize->add_setting( 'designhubs_footer_link_hover_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'designhubs_footer_link_hover_color', 
			        array(
			            'label'      => __( 'Link Hover Color', 'designhubs' ), 
			            'settings'   => 'designhubs_footer_link_hover_color', 
			            'priority'   => 10, 
			            'section'    => 'designhubs_footer_section',
			        ) 
		        ) );
		    //Footer Background Image
		        $wp_customize->add_setting('footer_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
			        'label' => __('Backgroung Image', 'designhubs'),
			        'section' => 'designhubs_footer_section',
			        'settings' => 'footer_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			    )));
			//footer in image background position
			    $wp_customize->add_setting('footer_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'footer_bg_position',
			    	array(
				        'settings' => 'footer_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'designhubs_footer_section',
				        'type'  => 'select',
				        'choices'    => $image_position,
			        )
			    )); 
			//footer in image background attachment
				    $wp_customize->add_setting('footer_bg_attachment', array(
				        'default'        => 'scroll',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'footer_bg_attachment',
				    	array(
					        'settings' => 'footer_bg_attachment',
					        'label'   => 'Background Attachment',
					        'section' => 'designhubs_footer_section',
					        'type'  => 'select',
					        'choices'    => array(
					        	'scroll' => 'Scroll',
					        	'fixed' => 'Fixed',
				        	),
				        )
				    ));
			//footer in image background Size
			    $wp_customize->add_setting('footer_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'footer_bg_size',
			    	array(
				        'settings' => 'footer_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'designhubs_footer_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));  

		//Footer Width
			$wp_customize->add_section( 'designhubs_footer_width_section' , array(
				'title'       => __('Footer Width', 'designhubs'),
				'panel'  => 'designhubs_footer_panel',
			) );
			//footer width layout
			    $wp_customize->add_setting( 'designhubs_footer_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_footer_width_layout',array(
			        	'label'      => __( 'Footer Width', 'designhubs' ), 
			            'settings'   => 'designhubs_footer_width_layout', 
			            'priority'   => 0,
			            'section'    => 'designhubs_footer_width_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Footer Section in contact width
			    $wp_customize->add_setting( 'designhubs_footer_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'designhubs_footer_contact_width',array(
			        	'label'      => __( 'Footer Contact Width', 'designhubs' ), 
			            'settings'   => 'designhubs_footer_contact_width', 
			            'priority'   => 0,
			            'section'    => 'designhubs_footer_width_section',
			            'type'    => 'number',
			            'active_callback'  => 'designhubs_footer_content_width_call_back',
			        ) 
		        ) );	   

    //logo option in image width title_tagline
	    $wp_customize->add_setting('designhubs_logo_width', array(
	    	'default'    => '150',
	        'type'       => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'transport'  => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',		  
	    ));
	    $wp_customize->add_control( new WP_Customize_Control(
	    	$wp_customize,'designhubs_logo_width',
	    	array(
		        'settings' => 'designhubs_logo_width',
		        'label'    => 'Logo Image Width',
		        'section'  => 'title_tagline',
		        'type'  => "number",
		        'description' => 'in px',
	        )
	    ));
}
add_action( 'customize_register', 'designhubs_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function designhubs_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function designhubs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function designhubs_customize_preview_js() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'designhubs-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );	
}
add_action( 'customize_preview_init', 'designhubs_customize_preview_js' );

function designhubs_customizer_css() {

    wp_enqueue_style( 'designhubs-customize-controls-style', get_template_directory_uri() . '/assets/css/customizer_admin.css' );
    /*wp_enqueue_script( 'designhubs-customize-notice-js', get_template_directory_uri() . '/assets/css/customizer_notice.js');*/
}
add_action( 'customize_controls_enqueue_scripts', 'designhubs_customizer_css',0 );

if ( ! function_exists( 'designhubs_sanitize_select' ) ) :
    function designhubs_sanitize_select( $input, $setting ) {

        $input = sanitize_text_field( $input );

        $choices = $setting->manager->get_control( $setting->id )->choices;

        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }
endif;
if ( ! function_exists( 'designhubs_sanitize_checkbox' ) ) :
    function designhubs_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }
endif;
if ( ! function_exists( 'designhubs_header_site_layout' ) ) :
    function designhubs_header_site_layout() {
        $designhubs_header_site_layout = array(
            'header1'  => get_template_directory_uri() . '/assets/images/header1.png',
            'header3'  => get_template_directory_uri() . '/assets/images/header3.png',
        );

        $output = apply_filters( 'designhubs_header_site_layout', $designhubs_header_site_layout );
        return $output;
    }
endif;
if ( ! function_exists( 'designhubs_site_layout' ) ) :
    function designhubs_site_layout() {
        $designhubs_site_layout = array(
            'no_sidedbar'  => get_template_directory_uri() . '/assets/images/full.png',
            'left_sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'right_sidebar'  => get_template_directory_uri() . '/assets/images/right.png',
        );

        $output = apply_filters( 'designhubs_site_layout', $designhubs_site_layout );
        return $output;
    }
endif;

add_action( 'wp_enqueue_scripts', 'designhubs_theme_scripts' );
function designhubs_theme_scripts() {
	//global $designhubs_fonttotal;
	
    $designhubs_body_fontfamily = get_theme_mod("designhubs_body_fontfamily",5);  
    if($designhubs_body_fontfamily!=''){
    	global $designhubs_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($designhubs_fonttotal[$designhubs_body_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font', $font_url, array() );
    }
    $designhubs_Heading_fontfamily = get_theme_mod("designhubs_Heading_fontfamily",5);    
    if($designhubs_Heading_fontfamily!=''){
        global $designhubs_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($designhubs_fonttotal[$designhubs_Heading_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-a', $font_url, array() );
    }
    $designhubs_Heading1_fontfamily = get_theme_mod("designhubs_Heading1_fontfamily",5);    
    if($designhubs_Heading1_fontfamily!=''){
        global $designhubs_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($designhubs_fonttotal[$designhubs_Heading1_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-b', $font_url, array() );
    }
    $designhubs_Heading2_fontfamily = get_theme_mod("designhubs_Heading2_fontfamily",5);    
    if($designhubs_Heading2_fontfamily!=''){
        global $designhubs_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($designhubs_fonttotal[$designhubs_Heading2_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-c', $font_url, array() );
    }
    $designhubs_Heading3_fontfamily = get_theme_mod("designhubs_Heading3_fontfamily",5);    
    if($designhubs_Heading3_fontfamily!=''){
        global $designhubs_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($designhubs_fonttotal[$designhubs_Heading3_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-d', $font_url, array() );
    }
}  
function designhubs_header1_call_back(){
	$designhubs_header_layout = get_theme_mod( 'designhubs_header_layout','header1');
	if ( 'header1' === $designhubs_header_layout ) {
		return true;
	}
	return false;
}
function designhubs_call_menu_btn_callback(){
	$designhubs_call_menu_btn = get_theme_mod( 'designhubs_call_menu_btn',true);
	if ( true === $designhubs_call_menu_btn ) {
		return true;
	}
	return false;
}
function designhubs_header2_call_back(){
	$designhubs_header_layout = get_theme_mod( 'designhubs_header_layout','header1');
	if ( 'header2' === $designhubs_header_layout ) {
		return true;
	}
	return false;
}
function designhubs_header_content_width_call_back(){
	$designhubs_header_width_layout = get_theme_mod( 'designhubs_header_width_layout','content_width');
	if ( 'content_width' === $designhubs_header_width_layout ) {
		return true;
	}
	return false;
}
function designhubs_topbar_content_width_call_back(){
	$designhubs_top_bar_width_layout = get_theme_mod( 'designhubs_top_bar_width_layout','content_width');
	if ( 'content_width' === $designhubs_top_bar_width_layout ) {
		return true;
	}
	return false;
}
function designhubs_sanitize_text( $string ) {
	$allowedtags = array(
		'a' => array(
			'href' => array (),
			'target' => array(),
			'title' => array (),
			'class' => array(),
		),
		'div' => array(
			'class' => array (),
		),
		'em' => array(),
		'i' => array(),
		'b' => array(),
		'strong' => array(),
		'p' => array(),
		'br' => array(),
		'hr' => array(),
	);

	return wp_kses( $string , $allowedtags );
}

function designhubs_footer_content_width_call_back(){
	$designhubs_footer_width_layout = get_theme_mod( 'designhubs_footer_width_layout','content_width');
	if ( 'content_width' === $designhubs_footer_width_layout ) {
		return true;
	}
	return false;
}
function designhubs_container_content_width_call_back(){
	$designhubs_container_width_layout = get_theme_mod( 'designhubs_container_width_layout','content_width');
	if ( 'content_width' === $designhubs_container_width_layout ) {
		return true;
	}	
	if ( 'boxed_layout' === $designhubs_container_width_layout ) {
		return true;
	}
	return false;
}
function designhubs_content_box_call_back(){
	$designhubs_container_width_layout = get_theme_mod( 'designhubs_container_width_layout','content_width');
	if ( 'content_width' === $designhubs_container_width_layout ) {
		return true;
	}
	return false;
}
function designhubs_box_layout_call_back(){
	$designhubs_container_width_layout = get_theme_mod( 'designhubs_container_width_layout','content_width');
	if ( 'boxed_layout' === $designhubs_container_width_layout ) {
		return true;
	}
	return false;
}
function designhubs_breadcrumb_call_back(){
	$designhubs_display_breadcrumb_section = get_theme_mod( 'designhubs_display_breadcrumb_section',true);
	if ( true === $designhubs_display_breadcrumb_section ) {
		return true;
	}
	return false;
}
function designhubs_sanitize_number_range( $number, $setting ) {

    $number = absint( $number );
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

    // If the number is within the valid range, return it; otherwise, return the default
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
function designhubs_featured_generalcallback(){
	$featuredimage_slider_tab = get_theme_mod( 'featuredimage_slider_tab','general');
	if ( 'general' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function designhubs_featured_design_callback(){
	$featuredimage_slider_tab = get_theme_mod( 'featuredimage_slider_tab','general');
	if ( 'design' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function designhubs_featured_section_design_callback(){
	$featuredimage_slider_tab = get_theme_mod( 'featured_section_tab','general');
	if ( 'design' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function designhubs_featured_section_callback(){
	$featuredimage_slider_tab = get_theme_mod( 'featured_section_tab','general');
	if ( 'general' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function designhubs_about_layout1_callback(){
	$designhubs_about_section_layouts = get_theme_mod( 'designhubs_about_section_layouts','layout1');
	if ( 'layout1' === $designhubs_about_section_layouts ) {
		return true;
	}
	return false;
}
function designhubs_about_layout2_callback(){
	$designhubs_about_section_layouts = get_theme_mod( 'designhubs_about_section_layouts','layout1');
	if ( 'layout2' === $designhubs_about_section_layouts ) {
		return true;
	}
	return false;
}
function designhubs_our_portfolio_general_callback(){
	$our_portfolio_section_tab = get_theme_mod( 'our_portfolio_section_tab','general');
	if ( 'general' === $our_portfolio_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_portfolio_design_callback(){
	$our_portfolio_section_tab = get_theme_mod( 'our_portfolio_section_tab','general');
	if ( 'design' === $our_portfolio_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_team_general_callback(){
	$our_team_section_tab = get_theme_mod( 'our_team_section_tab','general');
	if ( 'general' === $our_team_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_team_design_callback(){
	$our_team_section_tab = get_theme_mod( 'our_team_section_tab','general');
	if ( 'design' === $our_team_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_testimonial_general_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','general');
	if ( 'general' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_testimonial_design_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','general');
	if ( 'design' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_services_general_callback(){
	$our_services_tab = get_theme_mod( 'our_services_tab','general');
	if ( 'general' === $our_services_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_services_design_callback(){
	$our_services_tab = get_theme_mod( 'our_services_tab','general');
	if ( 'design' === $our_services_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_sponsors_general_callback(){
	$our_sponsors_tab = get_theme_mod( 'our_sponsors_tab','general');
	if ( 'general' === $our_sponsors_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_sponsors_design_callback(){
	$our_sponsors_tab = get_theme_mod( 'our_sponsors_tab','general');
	if ( 'design' === $our_sponsors_tab ) {
		return true;
	}
	return false;
}

function designhubs_custom_sanitization_callback( $value ) {
	// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
	$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
	\preg_match( $pattern, $value, $matches );
	// Return the 1st match found.
	if ( isset( $matches[0] ) ) {
		if ( is_string( $matches[0] ) ) {
			return $matches[0];
		}
		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
			return $matches[0][0];
		}
	}
	// If no match was found, return an empty string.
	return '';
}
function designhubs_scroll_callback(){
	$display_scroll_button = get_theme_mod( 'display_scroll_button',true);
	if ( true === $display_scroll_button ) {
		return true;
	}
	return false;
}
function designhubs_grid_view_callback(){
	$designhubs_container_blog_layout = get_theme_mod( 'designhubs_container_blog_layout','grid_view');
	if ( 'grid_view' === $designhubs_container_blog_layout ) {
		return true;
	}
	return false;
}
function designhubs_read_more_callback(){
	$designhubs_container_readmore_btn = get_theme_mod( 'designhubs_container_readmore_btn',true);
	if ( true === $designhubs_container_readmore_btn ) {
		return true;
	}
	return false;
}
/*function designhubs_sticky_callback(){
	$display_sticky_header = get_theme_mod( 'display_sticky_header',true);
	if ( true === $display_sticky_header ) {
		return true;
	}
	return false;
}*/
function designhubs_transparent_call_menu_btn_callback(){
	$designhubs_header_layout = get_theme_mod( 'designhubs_header_layout','header1');
	if ( 'header3' === $designhubs_header_layout ) {
		return true;
	}
	return false;
}
function designhubs_social_icon_design_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'design' === $social_icon_tab ) {
		return true;
	}
	return false;
}
function designhubs_social_icon_general_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'general' === $social_icon_tab ) {
		return true;
	}
	return false;
}