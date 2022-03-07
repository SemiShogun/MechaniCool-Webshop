<?php
function designhubs_ecommerce_customize_register($wp_customize){
	//remove Controls
	$wp_customize->remove_control('designhubs_our_portfolio_container_bg_color','#ffffff');
	$wp_customize->remove_control('alpha_color_setting','rgba(255, 255, 255, 0.3)');

	//Our Portfolio in title color
	   	$wp_customize->add_setting( 'designhubs_eco_our_portfolio_bg_color', 
	        array(
	            'default'    => '#245d6c', //Default setting/value to save
	            'type'       => 'theme_mod',
	            'transport'   => 'refresh',
	            'capability' => 'edit_theme_options',
	            'sanitize_callback' => 'sanitize_hex_color',
	        ) 
	    ); 
        $wp_customize->add_control( new WP_Customize_Color_Control( 
	        $wp_customize,'designhubs_eco_our_portfolio_bg_color', 
	        array(
	            'label'      => __( 'Background Hover Color', 'designhubs-ecommerce' ), 
	            'settings'   => 'designhubs_eco_our_portfolio_bg_color', 
	            'priority'   => 10,
	            'section'    => 'designhubs_our_portfolio_section',
	            'active_callback' => 'designhubs_our_portfolio_design_callback',
	        ) 
        ) );  
    //Featured slider aling item
	    $wp_customize->add_setting( 'designhubs_eco_slider_aling_item' , array(
	    	'default'    => 'left',
		    'type'       => 'theme_mod',
	        'transport'   => 'refresh',
	        'capability'     => 'edit_theme_options',
	        'sanitize_callback' => 'designhubs_sanitize_select',
		) );
		$wp_customize->add_control( new Designhubs_Align_Radio_Control(
	    	$wp_customize,'designhubs_eco_slider_aling_item',
	    	array(
				'settings'   => 'designhubs_eco_slider_aling_item', 
				'section' => 'designhubs_featured_slider', // // Add a default or your own section
				'label' => 'Slider Content Alignment',	
				'type'    => 'select',
	            'choices'    => array(
		        	'left' => 'Left',
		        	'center' => 'Center',
		        	'right' => 'Right',
	        	),		   
	        	'active_callback' => 'designhubs_featured_design_callback',
			)
		) );	

    //Testimonial background hover color
		$wp_customize->add_setting('our_testimonial_contain_bg_hover_color',
	        array(
	            'default'    => '#245d6c',
	            'type'       => 'theme_mod',
	            'capability' => 'edit_theme_options',
	            'transport'  => 'refresh',
				'sanitize_callback' => 'designhubs_custom_sanitization_callback',
	        )
	    );	
	    $wp_customize->add_control(new Designhubs_Transparent_Color_Control(
	            $wp_customize,'our_testimonial_contain_bg_hover_color',
	            array(
	                'label'        => __( 'Contain Background Hover Color', 'designhubs-ecommerce' ),
	                'section'      => 'designhubs_our_testimonial_section',
	                'settings'     => 'our_testimonial_contain_bg_hover_color',
	                'active_callback'  => 'designhubs_our_testimonial_design_callback',
	            )
	        )
	    ); 
	//Testimonial color hover color
		$wp_customize->add_setting('our_testimonial_contain_color_hover_color',
	        array(
	            'default'    => '#ffffff',
	            'type'       => 'theme_mod',
	            'capability' => 'edit_theme_options',
	            'transport'  => 'refresh',
				'sanitize_callback' => 'designhubs_custom_sanitization_callback',
	        )
	    );	
	    $wp_customize->add_control(new Designhubs_Transparent_Color_Control(
	            $wp_customize,'our_testimonial_contain_color_hover_color',
	            array(
	                'label'        => __( 'Contain Text Hover Color', 'designhubs-ecommerce' ),
	                'section'      => 'designhubs_our_testimonial_section',
	                'settings'     => 'our_testimonial_contain_color_hover_color',
	                'active_callback'  => 'designhubs_our_testimonial_design_callback',
	            )
	        )
	    ); 
	
	//Projectmanager Section
	    $wp_customize->add_section( 'designhubs_projectmanager_section' , array(
			'title'  => 'Our ProjectManager',
			'panel'  => 'designhubs_theme_option_panel',
		) );
		//Our Projectmanager Tabing
		 	$wp_customize->add_setting( 'our_projectmanager_section_tab', 
		        array(
		            'default'    => 'general', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'designhubs_sanitize_select',
		        ) 
		    ); 
	        $wp_customize->add_control( new designhubs_Custom_Radio_Control( 
		        $wp_customize,'our_projectmanager_section_tab',array(
		            'settings'   => 'our_projectmanager_section_tab', 
		            'priority'   => 10,
		            'section'    => 'designhubs_projectmanager_section',
		            'type'    => 'select',
		            'choices'    => array(
			        	'general' => 'General',
			        	'design' => 'Design',
		        	),
		        ) 
	        ) );
	    //Our Projectmanager in Title
			$wp_customize->add_setting( 'our_projectmanager_main_title', array(
				'default'    => 'PROJECT MANAGER',
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_projectmanager_main_title',
		    	array(
					'type' => 'text',
					'settings' => 'our_projectmanager_main_title',
					'section' => 'designhubs_projectmanager_section', // // Add a default or your own section
					'label' => 'Title',
					'active_callback' => 'designhubs_our_projectmanager_general_callback',
				)
			) );
		//Our Projectmanager in sub heading
			$wp_customize->add_setting( 'our_projectmanager_main_subheading', array(
				'default'    => 'MISS KATHERINA HALE',
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_projectmanager_main_subheading',
		    	array(
					'type' => 'text',
					'settings' => 'our_projectmanager_main_subheading',
					'section' => 'designhubs_projectmanager_section', // // Add a default or your own section
					'label' => 'Sub Heading',
					'active_callback' => 'designhubs_our_projectmanager_general_callback',
				)
			) );
	    //Our Projectmanager in description
			$wp_customize->add_setting( 'our_projectmanager_description', array(
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_projectmanager_description',
		    	array(
					'type' => 'text',
					'settings' => 'our_projectmanager_description',
					'section' => 'designhubs_projectmanager_section', // // Add a default or your own section
					'label' => 'Description',
					'active_callback' => 'designhubs_our_projectmanager_general_callback',
				)
			) );
	    //Our Projectmanager image option
	        $wp_customize->add_setting('our_projectmanager_image', array(
	        	'type'       => 'theme_mod',
		        'transport'     => 'refresh',
		        'height'        => 180,
		        'width'        => 160,
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw'
		    ));
		    $wp_customize->add_control( new WP_Customize_Image_Control( 
		    	$wp_customize, 'our_projectmanager_image', array(
			        'label' => 'Image ', 
			        'section' => 'designhubs_projectmanager_section',
			        'settings' => 'our_projectmanager_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'designhubs_our_projectmanager_general_callback',
			    )
		    ) );
		//Our Projectmanager social icon option
		    $wp_customize->add_setting( 'our_projectmanager_social_icon_section', array(
		    	'default'  => 4,
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'designhubs_sanitize_number_range',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_projectmanager_social_icon_section',
		    	array(
					'type' => 'number',
					'settings'   => 'our_projectmanager_social_icon_section', 
					'section' => 'designhubs_projectmanager_section', // // Add a default or your own section
					'label' => 'No of Section',
					'description' => 'Save and refresh the page if No. of Sections is changed (Max no of Section is 4)',
					'input_attrs' => array(
								    'min' => 1,
								    'max' => 4,
								),
					'active_callback' => 'designhubs_our_projectmanager_general_callback',				   
				)
			) );
			$social_icon = get_theme_mod( 'our_projectmanager_social_icon_section', 4 );
			for ( $i = 1; $i <= $social_icon ; $i++ ) {
				//Projectmanager social_icon Heading
					$wp_customize->add_setting('our_projectmanagersocial_icon'.$i, array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
				    	$wp_customize,'our_projectmanagersocial_icon'.$i,
				    	array(
					        'settings' => 'our_projectmanagersocial_icon'.$i,
					        'label'   => 'Social Icon '.$i ,
					        'section' => 'designhubs_projectmanager_section',
					        'type'     => 'ast-description',
					        'active_callback' => 'designhubs_our_projectmanager_general_callback',
				        )
				    ));
				//Projectmanager Section icon
					$wp_customize->add_setting('our_projectmanager_icon'. $i,
				        array(
				            'default' => 'fa fa-facebook',
				            'transport' => 'refresh',
				            'type'       => 'theme_mod',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        )
				    );
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_projectmanager_icon'.$i,
				    	array(
				            'type'        => 'text',
							'settings'    => 'our_projectmanager_icon'.$i,
							'label'       => 'Select Icon '.$i,
							'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Click Here</a> for select icon','designhubs-ecommerce'),
							'section'     => 'designhubs_projectmanager_section',
							'active_callback' => 'designhubs_our_projectmanager_general_callback',
				        )
				    ));	
				//Projectmanager Section Social Links 
					$wp_customize->add_setting( 'projectmanager_social_icon_link_' . $i , array(
						'default'   => '#',
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'projectmanager_social_icon_link_' . $i,
				    	array(
							'type' => 'text',
							'settings'   => 'projectmanager_social_icon_link_' . $i, 
							'section' => 'designhubs_projectmanager_section', // // Add a default or your own section
							'label' => 'Link ' . $i,
							'active_callback' => 'designhubs_our_projectmanager_general_callback',
						)
					) );
			}
			//Projectmanager Section background image
				$wp_customize->add_setting('our_projectmanager_background_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_projectmanager_background_image', array(
			        'label' => __('Backgroung Image', 'designhubs-ecommerce'),
			        'section' => 'designhubs_projectmanager_section',
			        'settings' => 'our_projectmanager_background_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'designhubs_our_projectmanager_design_callback',
			    )));
			//Our Projectmanager in image background position
			    $wp_customize->add_setting('our_projectmanager_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_projectmanager_bg_position',
			    	array(
				        'settings' => 'our_projectmanager_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'designhubs_projectmanager_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        	'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        )
			    )); 
			//Our Projectmanager in image background attachment
			    $wp_customize->add_setting('our_projectmanager_bg_attachment', array(
			        'default'        => 'fixed',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_projectmanager_bg_attachment',
			    	array(
				        'settings' => 'our_projectmanager_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'designhubs_projectmanager_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        )
			    ));
			//Our Projectmanager in image background Size
			    $wp_customize->add_setting('our_projectmanager_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_projectmanager_bg_size',
			    	array(
				        'settings' => 'our_projectmanager_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'designhubs_projectmanager_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        )
			    )); 
			//Our Projectmanager in Background color
				$wp_customize->add_setting( 'our_projectmanager_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_bg_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) );  	
		    //Our Projectmanager in Title text color
				$wp_customize->add_setting( 'our_projectmanager_title_color', 
			        array(
			            'default'    => '#333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_title_color', 
			        array(
			            'label'      => __( 'Title Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_title_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 
		    //Our Projectmanager in Sub Heading text color
				$wp_customize->add_setting( 'our_projectmanager_subheading_color', 
			        array(
			            'default'    => '#245d6c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_subheading_color', 
			        array(
			            'label'      => __( 'Sub Heading Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_subheading_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 
		    //Our Projectmanager in text color
				$wp_customize->add_setting( 'our_projectmanager_text_color', 
			        array(
			            'default'    => '#333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_text_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 
		    //Our Projectmanager in icon color	
		    	$wp_customize->add_setting( 'our_projectmanager_icon_color', 
			        array(
			            'default'    => '#245d6c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_icon_color', 
			        array(
			            'label'      => __( 'Icon Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_icon_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 	
		    //Our Projectmanager in icon Hover color	
		    	$wp_customize->add_setting( 'our_projectmanager_icon_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_icon_hover_color', 
			        array(
			            'label'      => __( 'Icon Hover Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 	
		    //Our Projectmanager in icon Background color	
		    	$wp_customize->add_setting( 'our_projectmanager_icon_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_icon_bg_color', 
			        array(
			            'label'      => __( 'Icon Background Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 
		    //Our Projectmanager in icon Background Hover color	
		    	$wp_customize->add_setting( 'our_projectmanager_icon_bg_hover_color', 
			        array(
			            'default'    => '#245d6c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_icon_bg_hover_color', 
			        array(
			            'label'      => __( 'Icon Background Hover Color', 'designhubs-ecommerce' ), 
			            'settings'   => 'our_projectmanager_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 
		    //Our Projectmanager in image border width	
		    	$wp_customize->add_setting( 'our_projectmanager_image_border_width', 
			        array(
			            'default'    => '10', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'our_projectmanager_image_border_width', 
			        array(
			            'label'      => __( 'Image Border Width', 'designhubs-ecommerce' ), 
			            'description'=> 'in px', 
			            'type'       => 'text', 
			            'settings'   => 'our_projectmanager_image_border_width', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) );
		    //Our Projectmanager in image border color	
		    	$wp_customize->add_setting( 'our_projectmanager_image_border_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Transparent_Color_Control( 
			        $wp_customize,'our_projectmanager_image_border_color', 
			        array(
			            'label'      => __( 'Image Border Color', 'designhubs-ecommerce' ),
			            'settings'   => 'our_projectmanager_image_border_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_projectmanager_section',
			            'active_callback' => 'designhubs_our_projectmanager_design_callback',
			        ) 
		        ) ); 	 
	
	//add Control
			$wp_customize->add_setting('global_ordering', array(
				'default'  => array( 
						'designhubs_featuredimage_slider',
						'designhubs_featured_section',	
						'designhubs_widget_section',						
						'designhubs_about_section',
						'designhubs_ecommerce_full_banner_section',
						'designhubs_our_portfolio',
						'designhubs_our_services',							
						'designhubs_our_team',
						'designhubs_our_testimonial',
						'designhubs_our_sponsors',							
					),
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'designhubs_sanitize_select',
		    ));
		    $wp_customize->add_control( new designhubs_custom_ordering(
		    	$wp_customize,'global_ordering',
		    	array(
			        'settings' => 'global_ordering',
			        'label'   => 'Select Section',
			        'description' => 'Hide & show Sections',
			        'section' => 'global_ordering_section',
			        'type'    => 'sortable_repeater',
			        'choices'     => array(
						'designhubs_featuredimage_slider' => 'Featured Slider',
						'designhubs_featured_section' => 'Featured Section',
						'designhubs_widget_section'  => 'Widget Woocommerce Product',							
						'designhubs_about_section'	=> 'About Section',
						'designhubs_ecommerce_full_banner_section' => 'ProjectManager',
						'designhubs_our_portfolio'	=> 'Our Portfolio',
						'designhubs_our_services'	=> 'Our Services',							
						'designhubs_our_team'	=> 'Our Team',	
						'designhubs_our_testimonial'	=> 'Our Testimonial',
						'designhubs_our_sponsors'	=> 'Our Sponsors',												
					),
			    )
			));	
}
add_action( 'customize_register', 'designhubs_ecommerce_customize_register', 20 );

function designhubs_ecommerce_customizer_css() {
    wp_enqueue_style( 'designhubs_ecommerce-customize-controls-style', get_stylesheet_directory_uri() . '/assets/css/customizer-admin.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'designhubs_ecommerce_customizer_css',0 );

function designhubs_our_projectmanager_general_callback(){
	$our_projectmanager_section_tab = get_theme_mod( 'our_projectmanager_section_tab','general');
	if ( 'general' === $our_projectmanager_section_tab ) {
		return true;
	}
	return false;
}
function designhubs_our_projectmanager_design_callback(){
	$our_projectmanager_section_tab = get_theme_mod( 'our_projectmanager_section_tab','general');
	if ( 'design' === $our_projectmanager_section_tab ) {
		return true;
	}
	return false;
}