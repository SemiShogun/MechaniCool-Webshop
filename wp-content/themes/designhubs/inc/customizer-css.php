<?php
function designhubs_customize_css(){
	global $designhubs_fonttotal;
	$designhubs_body_fontfamily = get_theme_mod("designhubs_body_fontfamily",5);
    $designhubs_body_fontfamily = $designhubs_fonttotal[$designhubs_body_fontfamily];

    $designhubs_Heading_fontfamily = get_theme_mod("designhubs_Heading_fontfamily",5);
    $designhubs_Heading_fontfamily = $designhubs_fonttotal[$designhubs_Heading_fontfamily];

    $designhubs_Heading1_fontfamily = get_theme_mod("designhubs_Heading1_fontfamily",5);
    $designhubs_Heading1_fontfamily = $designhubs_fonttotal[$designhubs_Heading1_fontfamily];

    $designhubs_Heading2_fontfamily = get_theme_mod("designhubs_Heading2_fontfamily",5);
    $designhubs_Heading2_fontfamily = $designhubs_fonttotal[$designhubs_Heading2_fontfamily];

    $designhubs_Heading3_fontfamily = get_theme_mod("designhubs_Heading3_fontfamily",5);
    $designhubs_Heading3_fontfamily = $designhubs_fonttotal[$designhubs_Heading3_fontfamily];

    //Body Font-Family
    if($designhubs_body_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        body{
	            font-family: <?php echo esc_attr( $designhubs_body_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($designhubs_Heading_fontfamily!='Select Font'){
    	?>
		<style type="text/css">
	        h1, h2, h3, h4, h5, h6{
	            font-family: <?php echo esc_attr( $designhubs_Heading_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($designhubs_Heading1_fontfamily!='Select Font'){
    	?>
		<style type="text/css">
	        h1{
	            font-family: <?php echo esc_attr( $designhubs_Heading1_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($designhubs_Heading2_fontfamily!='Select Font'){
    	?>
		<style type="text/css">
	        h2{
	            font-family: <?php echo esc_attr( $designhubs_Heading2_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($designhubs_Heading3_fontfamily!='Select Font'){
    	?>
		<style type="text/css">
	        h3{
	            font-family: <?php echo esc_attr( $designhubs_Heading3_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if(get_theme_mod('designhubs_header_layout','header1')=='header1'){
    	?>
		<style type="text/css">
			.main_site_header{
				background-color: <?php echo esc_attr(get_theme_mod('designhubs_header1_bg_color','#455d58')); ?>;
				color: <?php echo esc_attr(get_theme_mod('designhubs_header1_text_color','#ffffff')); ?>;
			}
			.main_site_header a{
				color: <?php echo esc_attr(get_theme_mod('designhubs_header1_Link_color','#ffffff')); ?>;
			}
			.main_site_header a:hover{
				color: <?php echo esc_attr(get_theme_mod('designhubs_header1_linkhover_color','#ffffff')); ?>;
			}
	    	.header_info {
			    display: flex;
			    align-items: center;
			    justify-content: space-between;
			    padding: 12px 0px;			    
			}
			.header_info p.site-description, .header_info h1.site-title {
			    margin: 0px;
			}
			.call_button_info {
			    display: grid;
			    grid-template-columns: auto auto auto auto;
			    align-items: center;
			    overflow-wrap: anywhere;
			    justify-content: space-between;
			}
			.search_call_btn_info {
			    display: flex;
			}
			.top_header{
				background-color: <?php echo esc_attr(get_theme_mod('header1_top_bar_bg_color','#fff')); ?>;
				color: <?php echo esc_attr(get_theme_mod('header1_top_bar_text_color','#455d58')); ?>;
			}
		</style>
		<?php
    }
    if(get_theme_mod('designhubs_header_layout','header1')=='header3'){
    	?>
		<style type="text/css">
			header#masthead {
				background: <?php echo esc_attr(get_theme_mod('transparent_header_bg_color','rgba(0,0,0,0.6)')); ?>;
			    position: absolute;
			    right: 0;
			    left: 0;
			    width: 100%;
			    border-top: 0;
			    margin: 0 auto;
			    z-index: 99;
			    color: <?php echo esc_attr(get_theme_mod('transparent_header_text_color','#fff')); ?>;
			}
			header#masthead a{
				color: <?php echo esc_attr(get_theme_mod('transparent_header_link_color','#fff')); ?>;
			}
			header#masthead a:hover{
				color: <?php echo esc_attr(get_theme_mod('transparent_header_link_hover_color','#02cfaa')); ?>;
			}
			.featured_slider_image .hentry-inner {
			    height: 700px;
			}
			.header_info {
			    display: grid;
			    grid-template-columns: auto auto;
			    align-items: center;
			    grid-column-gap: 20px;
			    overflow-wrap: anywhere;
			    justify-content: space-between;
			}
			.call_button_info {
			    display: grid;
			    grid-template-columns: auto auto auto;
			}
			.home .featured_slider_image .hentry-inner .entry-container{
				margin-top: 180px;
			}
			.site-branding h1.site-title, .site-branding p {
			    margin: 5px 0px;
			}
			.breadcrumb_info {
			    padding-top: 200px;
			    padding-bottom: 90px;
			}
		</style>
		<?php
    }
    if(get_theme_mod( 'designhubs_header_width_layout','content_width')=='content_width'){
    	?>
		<style type="text/css">
    		.header_info {
    			max-width: <?php echo esc_attr(get_theme_mod('designhubs_header_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
    		}
    	</style>
		<?php
    }
    if(get_theme_mod( 'designhubs_top_bar_width_layout','content_width')=='content_width'){
    	?>
		<style type="text/css">
    		.topbar_info_data {
    			max-width: <?php echo esc_attr(get_theme_mod('designhubs_top_bar_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
    		}
    	</style>
		<?php
    }
    if(get_theme_mod( 'designhubs_footer_width_layout','content_width')=='content_width'){
    	?>
		<style type="text/css">
    		footer#colophon .site-info {
    			max-width: <?php echo esc_attr(get_theme_mod('designhubs_footer_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
    		}
    	</style>
		<?php
    }
    if(get_theme_mod( 'display_cart_icon',true) == ''){
    	?>
		<style type="text/css">
			.add_cart_icon{
				display: none !important;
			}
		</style>
		<?php
    }
    if(get_theme_mod( 'display_mobile_cart_icon',true) == ''){
		?>
		<style type="text/css">
			@media only screen and (max-width: 768px){
				.add_cart_icon{
					display: none !important;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_mobile_cart_icon',true) == true){
		?>
		<style type="text/css">
			@media only screen and (max-width: 768px){
				.add_cart_icon{
					display: block !important;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_mobile_search_icon', true) == true){
		?>
		<style type="text/css"> 
			@media only screen and (max-width: 768px){
				div#cl_serchs{
					display: block !important;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_mobile_search_icon', true) == ''){
		?>
		<style type="text/css"> 
			@media only screen and (max-width: 768px){
				div#cl_serchs{
					display: none;
				}
			}
		</style>
		<?php
	}	
	if(get_theme_mod( 'designhubs_post_sidebar_width_'.get_post_type(),'30')){
    	$secondary_width = get_theme_mod('designhubs_post_sidebar_width_'.get_post_type(),'30');
		$primary_width   = absint( 100 - $secondary_width );
		?>
		<style type="text/css">
			aside.widget-area{
				width: <?php echo esc_attr($secondary_width);?>%;
			}
			main#primary{
				width: <?php echo esc_attr($primary_width);?>%;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'designhubs_footer_width_layout','content_width')=='content_width'){
    	?>
		<style type="text/css">
    		footer#colophon .site-info {
    			max-width: <?php echo esc_attr(get_theme_mod('designhubs_footer_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
    		}
    	</style>
		<?php
    }
    if(get_theme_mod( 'designhubs_container_width_layout','content_width')=='content_width'){
    	?>
		<style type="text/css">
		    .designhubs_container_info{
		    	max-width: <?php echo esc_attr(get_theme_mod('designhubs_container_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			    padding: 20px 0px;
		    }
		    main#primary{		    	
		    	margin: 15px;
		    }
		    main#primary {
			    background-color: <?php echo esc_attr(get_theme_mod('designhubs_boxed_container_bg_color','#eeeeee')); ?>;
			}
		    aside.widget-area .widget{
		    	background-color: <?php echo esc_attr(get_theme_mod('designhubs_boxed_container_bg_color','#eeeeee')); ?>;
		    	margin: 15px;
		    }
    	</style>
		<?php
    }
    if(get_theme_mod( 'designhubs_container_width_layout','content_width')=='boxed_layout'){
    	?>
		<style type="text/css">
		    .designhubs_container_info{
		    	max-width: <?php echo esc_attr(get_theme_mod('designhubs_container_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
		    }
		    .designhubs_container_info {
			    margin-top: 20px;
			    margin-bottom: 20px;
			    background-color: <?php echo esc_attr(get_theme_mod('designhubs_boxed_layout_bg_color','#eeeeee')); ?>;
			}
		</style>
		<?php
    }
    if(get_theme_mod( 'designhubs_breadcrumb_bg_image')){
    	?>
		<style type="text/css">
		.breadcrumb_info{
			background: url(<?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_bg_image'))?>) rgb(0 0 0 / 0.75);
			background-position: <?php echo esc_attr(get_theme_mod('designhubs_img_bg_position','center center')); ?>;
		    background-attachment: <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_bg_attachment','scroll'));?>;
		    background-size: <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_bg_size','cover'));?>;
		    background-blend-mode: multiply;
		}
		</style>
		<?php
    }else{
    	?>
		<style type="text/css">
    	.breadcrumb_info{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_bg_color','#c8c9cb')); ?>;
		}
		</style>
		<?php
    }    
	if(get_theme_mod('designhubs_container_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.featured-section, .about_data, .our_portfolio_data, .our_team_info, .our_services_info, .our_testimonial_info, .our_sponsors_info, .designhubs_product_data {
				max-width: <?php echo esc_attr(get_theme_mod('designhubs_container_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
    if(get_theme_mod( 'display_scroll_button',true) == ''){
		?>
		<style>			
			.scrolling-btn {
    			display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod( 'designhubs_container_containe',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog .designhubs_container_data {
			    display: none;
			}
	    </style>
        <?php
    } 
   	if(get_theme_mod( 'designhubs_container_description',false ) == ''){
    	?>
		<style type="text/css">
	    	.blog article .entry-content {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'designhubs_container_date',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog span.posted-on {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'designhubs_container_authore',false ) == ''){
    	?>
		<style type="text/css">
			.blog span.byline {
				display: none;
			}
		 </style>
        <?php
    }
    if(get_theme_mod( 'designhubs_container_category',true ) == ''){
    	?>
		<style type="text/css">
			.blog span.cat-links {
				display: none;
			}
		 </style>
        <?php
    } 
    if(get_theme_mod( 'designhubs_container_comments',false ) == ''){
    	?>
		<style type="text/css">
			.blog span.comments-link {
				display: none;
			}
		 </style>
        <?php
    }  
    if(get_theme_mod( 'display_search_icon',true) == ''){ 
    	?>
		<style type="text/css">
			div#cl_serchs {
			   display: none;
			}
		 </style>
        <?php
    }
    if(get_theme_mod('footer_bg_image')){
    	?>
		<style type="text/css">
			footer#colophon{
				background:url(<?php echo  esc_attr(get_theme_mod('footer_bg_image'));?>) rgb(0 0 0 / 0.75);
	    		background-position: <?php echo esc_attr(get_theme_mod('footer_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('footer_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('footer_bg_attachment','scroll')); ?>;
	    		background-blend-mode: multiply;
			}
		</style>
		<?php
    }else{
    	?>
		<style type="text/css">
			footer#colophon{
				background-color: <?php echo esc_attr(get_theme_mod('designhubs_footer_bg_color','#455d58')); ?>;
			}
		</style>
		<?php
    }
	?>
	<style>	
		body {
			font-size: <?php echo esc_attr(get_theme_mod('designhubs_body_font_size','15')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('designhubs_body_font_weight','400')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('designhubs_body_text_transform','inherit')); ?>;
		}
		h1{
			font-size: <?php echo esc_attr(get_theme_mod('designhubs_heading1_font_size','35')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('designhubs_heading1_font_weight','bold')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('designhubs_heading1_text_transform','inherit')); ?>;
		}
		h2{
			font-size: <?php echo esc_attr(get_theme_mod('designhubs_heading2_font_size','28')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('designhubs_heading2_font_weight','bold')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('designhubs_heading2_text_transform','inherit')); ?>;
		}
		h3{
			font-size: <?php echo esc_attr(get_theme_mod('designhubs_heading3_font_size','25')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('designhubs_heading3_font_weight','400')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('designhubs_heading3_text_transform','inherit')); ?>;
		}
		body a, time.entry-date.published:before, time.entry-date.published:before, span.cat-links:before, span.comments-link:before, span.byline:before {
			color: <?php echo esc_attr(get_theme_mod('designhubs_link_color','#455d58')); ?> ;
			text-decoration: none;
		} 
		body a:hover {
			color: <?php echo esc_attr(get_theme_mod('designhubs_link_hover_color','#000000')); ?> ;
		}
		.blog main#primary {
		    background: none;
		}
		.blog .designhubs_container_info.content_width.grid_view .main_containor.grid_view article{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_boxed_container_bg_color','#eeeeee')); ?>;
			margin-bottom: 20px;
		}
		aside.widget-area section h2, aside.widget-area label.wp-block-search__label{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_sidebar_heading_bg_color','#455d58')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_sidebar_heading_text_color','#ffffff')); ?>;
		}
		.current-menu-ancestor > a, .current-menu-item > a, .current_page_item > a {
			color: <?php echo esc_attr(get_theme_mod('header_menu_active_color','#02cfaa')); ?> !important;
		}
		.main-navigation .nav-menu ul.sub-menu{
			background-color: <?php echo esc_attr(get_theme_mod('header_desktop_submenu_bg_color','#ffffff')); ?>;
		}
		.main-navigation ul ul a{
			color: <?php echo esc_attr(get_theme_mod('header_desktop_submenu_text_color','#455d58')); ?> !important;
		}
		a.social_icon i{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_social_icon_bg_color','#455d58')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_social_icon_color','#ffffff')); ?>;
			border-color: <?php echo esc_attr(get_theme_mod('designhubs_social_icon_bg_color','#455d58')); ?>;
		}
		a.social_icon i:hover{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_social_icon_bg_hover_color','#ffffff')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_social_icon_hover_color','#455d58')); ?>;
			border-color: <?php echo esc_attr(get_theme_mod('designhubs_social_icon_bg_hover_color','#ffffff')); ?>;
		}
		img.custom-logo {
		    width: <?php echo esc_attr(get_theme_mod('designhubs_logo_width','150')); ?>px;
		}

		/*--------------------------------------------------------------
		# Buttons
		--------------------------------------------------------------*/
		button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button, .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button,.woocommerce button.button.alt.disabled {
			display: inline-block;
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_button_bg_color','#455d58')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_button_text_color','#ffffff')); ?>!important ;			
			padding: <?php echo esc_attr(get_theme_mod('designhubs_button_padding','10px 15px')); ?> ;
			border: <?php echo esc_attr(get_theme_mod('designhubs_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('designhubs_button_border_color','#455d58')); ?>;
			border-radius:  <?php echo esc_attr(get_theme_mod('designhubs_button_border_radius','2')); ?>px;
		}
		button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button:hover, .woocommerce button.button.alt.disabled:hover{
			color: <?php echo esc_attr(get_theme_mod('designhubs_button_texthover_color','#455d58')); ?>!important ;
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_button_bg_hover_color','#ffffff')); ?>;
			border: <?php echo esc_attr(get_theme_mod('designhubs_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('designhubs_button_border_hover_color','#455d58')); ?>;
		}

		.woocommerce .woocommerce-message {
		    border-top-color: <?php echo esc_attr(get_theme_mod('designhubs_button_bg_color','#455d58')); ?> 
		}
		.woocommerce .woocommerce-message::before{
			color: <?php echo esc_attr(get_theme_mod('designhubs_button_bg_color','#455d58')); ?> ;
		}
		.woocommerce .woocommerce-info, .woocommerce-noreviews, p.no-comments {
		    background-color: <?php echo esc_attr(get_theme_mod('designhubs_button_bg_color','#455d58')); ?> ;
			color: <?php echo esc_attr(get_theme_mod('designhubs_button_text_color','#ffffff')); ?> ;
		}
		/*--------------------------------------------------------------
		# buttons end
		--------------------------------------------------------------*/

		.call_menu_btn{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_callmenu_btn_bg_color','#455d58')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_callmenu_btn_color','#fff')); ?> !important;
			border: 1px solid  <?php echo esc_attr(get_theme_mod('designhubs_call_btn_border_color','#ffffff')); ?>;
		}
		.call_menu_btn:hover{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_callmenu_btn_bghover_color','#ffffff')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_call_btn_texthover_color','#455d58')); ?> !important;
		}
		.designhubs_container_data {
		    background-color: <?php echo esc_attr(get_theme_mod('designhubs_container_bg_color','#ffffff')); ?>;
		}
		.main_containor.grid_view{
		    display: grid;
		    grid-template-columns: repeat(<?php echo esc_attr(get_theme_mod('designhubs_container_grid_view_col','3'));?>, 1fr);
		    grid-column-gap :<?php echo esc_attr(get_theme_mod('designhubs_container_grid_view_col_gap','20'));?>px;
		}
		/*.main_site_header.is-sticky-menu {
		    background-color: <?php echo esc_attr(get_theme_mod('designhubs_sticky_bg_color','#455d58')); ?>;
		}*/

		/*--------------------------------------------------------------
		# breadcrumb Section
		--------------------------------------------------------------*/
		.breadcrumb_info{
			color: <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_text_color','#ffffff')); ?>;
		}
		section#breadcrumb-section a {
		    color: <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_link_color','#ffffff')); ?>;
    		text-decoration: none;
    		border: 2px solid <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_link_color','#ffffff')); ?>;
    		padding: 7px;
    		border-radius: 100px;
		}
		.breadcrumb_info ol.breadcrumb-list {
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_icon_background_color','#455d58'));?>;
			border: 1px solid <?php echo esc_attr(get_theme_mod('designhubs_breadcrumb_icon_background_color','#455d58'));?>;
		}

		/*--------------------------------------------------------------
		# Footer
		--------------------------------------------------------------*/
		footer#colophon{
			color: <?php echo esc_attr(get_theme_mod('designhubs_footer_text_color','#ffffff')); ?>;
		}
		footer#colophon a{
			color: <?php echo esc_attr(get_theme_mod('designhubs_footer_link_color','#24c3a2')); ?>;
		}
		footer#colophon a:hover{
			color: <?php echo esc_attr(get_theme_mod('designhubs_footer_link_hover_color','#eeeeee')); ?>;
		}
		.scrolling-btn{
			background-color: <?php echo esc_attr(get_theme_mod('goldly_scroll_button_bg_color','#02cfaa'));?> !important;
			color: <?php echo esc_attr(get_theme_mod('goldly_scroll_button_color','#ffffff')); ?> !important;
		}


		@media only screen and (max-width: 768px){
			body {
				font-size: <?php echo esc_attr(get_theme_mod('designhubs_mobile_font_size','14')); ?>px;
			}
			h1{
				font-size: <?php echo esc_attr(get_theme_mod('designhubs_mobile_heading1_font_size','20')); ?>px;
			} 
			h2{
				font-size: <?php echo esc_attr(get_theme_mod('designhubs_mobile_heading2_font_size','18')); ?>px;
			}
			h3{
				font-size: <?php echo esc_attr(get_theme_mod('designhubs_mobile_heading3_font_size','14')); ?>px;
			}
			.mobile_menu {
			    background-color: <?php echo esc_attr(get_theme_mod('header_mobile_navmenu_background_color','#455d58')); ?>;
			}
			.main-navigation .sub-menu li, .main-navigation ul ul ul.toggled-on li {
		        background-color: <?php echo esc_attr(get_theme_mod('header_mobile_submenu_background_color','#a9d7ce')); ?>;
		    }
		    .mobile_menu #primary-menu ul li a{
		    	color: <?php echo esc_attr(get_theme_mod('header_mobile_navmenu_color','#ffffff')); ?>;		    	
		    }
		    .current-menu-ancestor > a, .current-menu-item > a, .current_page_item > a {
			    color: <?php echo esc_attr(get_theme_mod('header_mobile_navmenu_active_color','#00ffca')); ?> !important;
			}
		}


	</style>

	<?php
	if (!class_exists('WooCommerce'))  return;
    //if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if(is_product() || is_shop() || is_cart() || is_checkout()){
			if(empty(get_post_meta(get_the_ID(),'sidebar_select',true))){
		        ?>
		        <style> 
			        aside.widget-area{
			            display: none;
			        }
			        main#primary {
					    width: 100% !important;
					}
		        </style>
		        <?php
		    }
	    }
	//}
}
add_action( 'wp_head', 'designhubs_customize_css');