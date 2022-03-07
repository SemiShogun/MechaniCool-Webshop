<?php
function designhubs_ecommerce_ecco_customize_css(){
	if(get_theme_mod('designhubs_eco_slider_aling_item','left')=='left'){
		?>
		<style type="text/css">
			.featured_slider_image .hentry-inner .entry-container{
				text-align: left;
			    margin-left: 20px;
			    margin-right: 450px;
	    	}
    	</style>
	<?php
	}
	if(get_theme_mod('designhubs_eco_slider_aling_item','left')=='center'){
		?>
		<style type="text/css">
			.featured_slider_image .hentry-inner .entry-container{
				text-align: center;
				margin: 0px 220px 0;
	    	}
    	</style>
	<?php
	}
	if(get_theme_mod('designhubs_eco_slider_aling_item','left')=='right'){
		?>
		<style type="text/css">
			.featured_slider_image .hentry-inner .entry-container{
				text-align: right;
				margin-left: 450px;
    			margin-right: 20px;
	    	}
    	</style>
	<?php
	}
	if(get_theme_mod('our_projectmanager_background_image')){
		?>
		<style type="text/css">
			.designhubs_projectmanager_section{
				background: url(<?php echo esc_attr(get_theme_mod('our_projectmanager_background_image'))?>) rgb(0 0 0 / 0.68);
				background-position: <?php echo esc_attr(get_theme_mod('our_projectmanager_bg_position','center center'));?>;
			    background-attachment: <?php echo esc_attr(get_theme_mod('our_projectmanager_bg_attachment','fixed'));?>;
			    background-size: <?php echo esc_attr(get_theme_mod('our_projectmanager_bg_size','cover'));?>;
			    background-blend-mode: multiply;
			}
		</style>
	<?php
	}else{
		?>
		<style type="text/css">
			.designhubs_projectmanager_section{
				background: <?php echo esc_attr(get_theme_mod('our_projectmanager_bg_color','#ffffff'));?>;
			}

		</style>
		<?php
	}
	if(get_theme_mod('designhubs_container_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.designhubs_projectmanager_info {
				max-width: <?php echo esc_attr(get_theme_mod('designhubs_container_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
	?>
		<style type="text/css">
			.our_portfolio_container .our_port_containe {
    			background-color: <?php echo esc_attr(get_theme_mod('designhubs_eco_our_portfolio_bg_color','#245d6c'))?>;
    		}
    		.our_testimonial_data .testimonials_disc{
    			background-color: <?php echo esc_attr(get_theme_mod('our_testimonial_alpha_color_setting','#ffffff'))?>;
    			color: <?php echo esc_attr(get_theme_mod('our_team_testimonial_text_color','#455d58'))?>;
    		}
    		.our_testimonial_data .testimonials_disc:after{
    			color: <?php echo esc_attr(get_theme_mod('our_testimonial_alpha_color_setting','#ffffff'))?>;
    		}
    		.our_testimonial_data .testimonials_disc:hover {
    			background-color: <?php echo esc_attr(get_theme_mod('our_testimonial_contain_bg_hover_color','#245d6c'))?>;
    			color: <?php echo esc_attr(get_theme_mod('our_testimonial_contain_color_hover_color','#ffffff'))?>;
    		}
    		.our_testimonial_data .testimonials_disc:hover:after {
			    color: <?php echo esc_attr(get_theme_mod('our_testimonial_contain_bg_hover_color','#245d6c'))?>;
			}
    		
    		.designhubs_projectmanager_title h1{
    			color: <?php echo esc_attr(get_theme_mod('our_projectmanager_title_color','#333'))?>;
    		}
    		.designhubs_projectmanager_subheadine h2{
    			color: <?php echo esc_attr(get_theme_mod('our_projectmanager_subheading_color','#245d6c'))?>;
    		}
    		.designhubs_projectmanager_description p{
    			color: <?php echo esc_attr(get_theme_mod('our_projectmanager_text_color','#333'))?>;
    		}
    		a.projectmanager_social_icon{
    			background-color: <?php echo esc_attr(get_theme_mod('our_projectmanager_icon_bg_color','#ffffff'))?>;
    			color: <?php echo esc_attr(get_theme_mod('our_projectmanager_icon_color','#245d6c'))?>;
    			border: 2px solid <?php echo esc_attr(get_theme_mod('our_projectmanager_icon_color','#245d6c')); ?>;
    		}
    		a.projectmanager_social_icon:hover{
    			background-color: <?php echo esc_attr(get_theme_mod('our_projectmanager_icon_bg_hover_color','#245d6c'))?>;
    			color: <?php echo esc_attr(get_theme_mod('our_projectmanager_icon_hover_color','#ffffff'))?>;
    			border: 2px solid <?php echo esc_attr(get_theme_mod('our_projectmanager_icon_hover_color','#ffffff')); ?>;
    		}
    		.designhubs_projectmanager_image img {
    			border: <?php echo esc_attr(get_theme_mod('our_projectmanager_image_border_width','10')); ?>px solid <?php echo esc_attr(get_theme_mod('our_projectmanager_image_border_color','#eeeeee')); ?>;
    		}
		</style>
	<?php
}
add_action( 'wp_head', 'designhubs_ecommerce_ecco_customize_css');
?>