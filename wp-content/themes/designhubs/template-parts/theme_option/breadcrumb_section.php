<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designhubs
 */

if(get_theme_mod('designhubs_display_breadcrumb_section',true) != ''){
	designhubs_breadcrumb_slider();
}elseif(get_post_type()){	
	if(get_post_meta(get_the_ID(),'breadcrumb_select',true) == 'yes'){
		designhubs_breadcrumb_slider();
	}
}