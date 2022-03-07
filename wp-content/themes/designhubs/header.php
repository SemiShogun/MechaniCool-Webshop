<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package designhubs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'designhubs' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="top_header">
			<?php
				designhubs_social_section();
			?>
		</div>
		<div class="main_site_header">
			<div class="header_info">
				<div class="site-branding">
					<?php	
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					endif;
					$designhubs_description = get_bloginfo( 'description', 'display' );
					if ( $designhubs_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $designhubs_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<!-- <div class="header_navigation"> -->
					<div class="menu_call_button">
						<div class="call_button_info">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" id="navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
									<i class="fa fa-bars"></i>
								</button>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>							
							</nav>
							<div class="mobile_menu main-navigation" id="mobile_primary">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
								<div class="search_call_btn_info">
								    <?php  if(!empty(get_theme_mod( 'designhubs_call_menu_btn',true))){ ?>
										<div class="header_call_btn header_nav_info">
											<a class="call_menu_btn" href="<?php echo esc_attr(get_theme_mod( 'designhubs_menu_btn_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'designhubs_call_menu_btn_title','Get A Quote')); ?></a>
										</div> 	
									<?php } ?>					
								</div>
								<button class="menu-toggle" id="mobilepop"  aria-expanded="false">
									<i class="fa fa-close"></i>
								</button>													
							</div>
							<div class="search_call_btn_info">
								<?php
								if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {									
										?>
										<div class="add_cart_icon header_nav_info">							
											<a href="<?php echo esc_attr(wc_get_cart_url()); ?>">
												<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											</a>
										</div>
									<?php 
								} ?>
								<div id="cl_serchs" class="cl_serchs">
									<a href="#" id="searchlinks" class="cl_res_serch_icon searchlinks">	
										<i id="serches" class="fa fa-search fa-lg serches" aria-hidden="true"></i>
									</a>								
									<div class="searchforms">
								        <form id="searchs" class="serchings" action="">
									        <input type="text" class="s" id="s" name="s" placeholder="keywords...">
									        <button type="submit" class="sbtns"><i class="fa fa-search"></i></button>
								        </form>										    
							    	</div>
							    </div>
							    <?php  if(!empty(get_theme_mod( 'designhubs_call_menu_btn',true))){ ?>
									<div class="header_call_btn header_nav_info">
										<a class="call_menu_btn" href="<?php echo esc_attr(get_theme_mod( 'designhubs_menu_btn_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'designhubs_call_menu_btn_title','Get A Quote')); ?></a>
									</div> 	
								<?php } ?>					
							</div>
						</div>
					</div>
				<!-- </div> -->
			</div>
		</div>
	</header><!-- #masthead -->
	<div class="theme_section_info">
		<?php echo esc_attr(designhubs_breadcrumb_sections());
		?>
		
		<?php
		if ( in_array( 'page-section-for-themereviewer/page-section-for-themereviewer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		//if ( is_plugin_active( 'wondering-companion/wondering-companion.php' ) ) {
			$designhubs_diseble = get_theme_mod( 'designhubs_diseble' );
			$goldly_diseble_array =  explode(",",$designhubs_diseble);
			

			$orderarr = array('designhubs_featuredimage_slider','designhubs_featured_section', 'designhubs_widget_section', 'designhubs_about_section','designhubs_our_portfolio','designhubs_our_services','designhubs_our_team','designhubs_our_testimonial','designhubs_our_sponsors');			

			$orderarr = apply_filters('designhubs_order_settings', $orderarr);
			$global_ordering_array = get_theme_mod( 'global_ordering',$orderarr );
			?>
			<?php
			if(is_front_page()){				
				if(!empty($global_ordering_array)){
					foreach ($global_ordering_array as $global_ordering_arraydd) { 
						if(!in_array( $global_ordering_arraydd, $goldly_diseble_array)){
							call_user_func($global_ordering_arraydd);
						}		
					}
				}							
			} 
		}
		?>
	</div>
	<div class="designhubs_container_data">
		<?php
		if(get_post_meta(get_the_ID(),'sidebar_select',true)){
			?>
			<div class="designhubs_container_info <?php echo esc_attr(get_post_meta(get_the_ID(),'sidebar_select',true));?>  <?php echo esc_attr(get_theme_mod( 'designhubs_container_width_layout','full_width'));?> <?php echo esc_attr(get_theme_mod( 'designhubs_container_blog_layout','grid_view'));?>">
				<?php
		}else{
			?>
			<div class="designhubs_container_info <?php echo esc_attr(get_theme_mod( 'designhubs_post_sidebar_select_'.get_post_type(),'right_sidebar'));?> <?php echo esc_attr(get_theme_mod( 'designhubs_container_width_layout','full_width'));?> <?php echo esc_attr(get_theme_mod( 'designhubs_container_blog_layout','grid_view')); ?>">
		<?php }
