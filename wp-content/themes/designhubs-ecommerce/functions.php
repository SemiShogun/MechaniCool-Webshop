<?php
require get_stylesheet_directory() . '/customizer/customizer.php';
require get_stylesheet_directory() . '/customizer/customizer-css.php';
require get_stylesheet_directory() . '/customizer/customizer-cantrols.php';
require get_stylesheet_directory() . '/customizer/designhubs-ecommerce-about.php';

/* enqueue script for parent theme stylesheeet */        
function designhubs_ecommerce_childtheme_parent_styles() {
 
 // enqueue style
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'designhubs-ecommerce' ) );
}
add_action( 'wp_enqueue_scripts', 'designhubs_ecommerce_childtheme_parent_styles');

function designhubs_ecommerce_theme_mods() {
	if(empty(get_theme_mod( 'designhubs_header1_bg_color' )))
        set_theme_mod('designhubs_header1_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_header1_text_color' )))
        set_theme_mod('designhubs_header1_text_color', '#ffffff');
    if(empty(get_theme_mod( 'designhubs_header1_Link_color' )))
        set_theme_mod('designhubs_header1_Link_color', '#ffffff');
    if(empty(get_theme_mod( 'header1_top_bar_bg_color' )))
        set_theme_mod('header1_top_bar_bg_color', '#ffffff');
    if(empty(get_theme_mod( 'header1_top_bar_text_color' )))
        set_theme_mod('header1_top_bar_text_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_social_icon_bg_color' )))
        set_theme_mod('designhubs_social_icon_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_social_icon_color' )))
        set_theme_mod('designhubs_social_icon_color', '#ffffff');
    if(empty(get_theme_mod( 'designhubs_callmenu_btn_bg_color' )))
        set_theme_mod('designhubs_callmenu_btn_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_button_bg_color' )))
        set_theme_mod('designhubs_button_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_button_border_color' )))
        set_theme_mod('designhubs_button_border_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_button_texthover_color' )))
        set_theme_mod('designhubs_button_texthover_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_button_border_hover_color' )))
        set_theme_mod('designhubs_button_border_hover_color', '#245d6c');
    if(empty(get_theme_mod( 'featured_slider_arrow_bg_color' )))
        set_theme_mod('featured_slider_arrow_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'featured_slider_arrow_texthover_color' )))
        set_theme_mod('featured_slider_arrow_texthover_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_featured_section_color' )))
        set_theme_mod('designhubs_featured_section_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_featured_section_icon_bg_color' )))
        set_theme_mod('designhubs_featured_section_icon_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_featured_section_bg_hover_color' )))
        set_theme_mod('designhubs_featured_section_bg_hover_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_featured_section_icon_hover_color' )))
        set_theme_mod('designhubs_featured_section_icon_hover_color', '#245d6c');
    if(empty(get_theme_mod( 'our_services_contain_text_color' )))
        set_theme_mod('our_services_contain_text_color', '#245d6c');
    if(empty(get_theme_mod( 'our_services_icon_bg_color' )))
        set_theme_mod('our_services_icon_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'our_team_link_color' )))
        set_theme_mod('our_team_link_color', '#245d6c');
    if(empty(get_theme_mod( 'our_team_container_text_color' )))
        set_theme_mod('our_team_container_text_color', '#245d6c');
    if(empty(get_theme_mod( 'our_team_icon_bg_hover_color' )))
        set_theme_mod('our_team_icon_bg_hover_color', '#245d6c');
    if(empty(get_theme_mod( 'our_team_icon_color' )))
        set_theme_mod('our_team_icon_color', '#245d6c');    
    if(empty(get_theme_mod( 'our_team_testimonial_text_color' )))
        set_theme_mod('our_team_testimonial_text_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_footer_link_color' )))
        set_theme_mod('designhubs_footer_link_color', '#ffffff');
    if(empty(get_theme_mod( 'designhubs_footer_bg_color' )))
        set_theme_mod('designhubs_footer_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_link_color' )))
        set_theme_mod('designhubs_link_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_heading_underline_color' )))
        set_theme_mod('designhubs_heading_underline_color', '#245d6c');
    if(empty(get_theme_mod( 'goldly_scroll_button_bg_color' )))
        set_theme_mod('goldly_scroll_button_bg_color', '#73b5c7');
    if(empty(get_theme_mod( 'designhubs_breadcrumb_icon_background_color' )))
        set_theme_mod('designhubs_breadcrumb_icon_background_color', '#245d6c');
    if(empty(get_theme_mod( 'designhubs_sidebar_heading_bg_color' )))
        set_theme_mod('designhubs_sidebar_heading_bg_color', '#245d6c');
    if(empty(get_theme_mod( 'transparent_header_bg_color' )))
        set_theme_mod('transparent_header_bg_color', 'rgba(36,93,108,0.3)');
    if(empty(get_theme_mod( 'designhubs_our_portfolio_icon_bg_color' )))
        set_theme_mod('designhubs_our_portfolio_icon_bg_color', '#ffffff');
    if(empty(get_theme_mod( 'designhubs_our_portfolio_icon_color' )))
        set_theme_mod('designhubs_our_portfolio_icon_color', '#245d6c');
}
add_action( 'init', 'designhubs_ecommerce_theme_mods' );

function designhubs_ecommerce__proversinline($link){
    $link ='https://www.xeeshop.com/product/designhubs-ecommerce-pro/';
    return $link;
}
add_filter( 'designhubs_proversinline', 'designhubs_ecommerce__proversinline');

function designhubs_ecommerce_proversinliness($link){
	$link ='https://www.xeeshop.com/product/designhubs-ecommerce-pro/';
    return $link;
}
add_filter('designhubs_prosectionlinks','designhubs_ecommerce_proversinliness');

function designhubs_ecommerce_documentlinks($link){
	$link ='https://www.xeeshop.com/designhubs-ecommerce-documentation/';
    return $link;
}
add_filter('designhubs_document_link', 'designhubs_ecommerce_documentlinks');

function designhubs_ecommerce_ordering_child($orderarr){    
    $orderarr[] ='designhubs_ecommerce_full_banner_section';
    return $orderarr;
}
add_filter( 'designhubs_order_settings', 'designhubs_ecommerce_ordering_child');