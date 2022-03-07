<?php

function designhubs_about_menu() {
	add_theme_page( esc_html__( 'About Theme', 'designhubs' ), esc_html__( 'About Theme', 'designhubs' ), 'edit_theme_options', 'designhubs-about', 'designhubs_about_display' );
}
add_action( 'admin_menu', 'designhubs_about_menu' );

function designhubs_about_display(){
	?>
	<div class="designhubs_about_data">
		<div class="designhubs_about_title">
			<h1>Welcome to Designhubs!</h1>
			<div class="designhubs_about_theme">
				<div class="designhubs_about_description">
					<p>
						Designhubs is a powerful, modern and professional multipurpose WordPress theme. This theme fully customizable & beautiful WordPress theme suitable for blog, personal portfolio, business website. This Designhubs WordPress theme, carries an abundance of crucial features and functionalities. For instance, Social Icon, Transparent Header, featured slider, featured Section, About Section, Our Portfolio, Our team Section, Testimonial Slider, Our Services, Our Sponsors, Sticky Header, Social Information, Sidebar, Excerpt Options, and many more. All of these highly-customizable features and sections are completely responsive and absolutely easy to customize.
					</p>
				</div>
				<div class="designhubs_about_image">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				</div> 
			</div>
			<div class="designhubs_about_demo">
				<div class="feature-section">
					<div class="about_data_designhubs">
						<h3>Documentation</h3>
						<p>Getting started with a new theme can be difficult, But its installation and customization is so easy</p>
						<a href="https://www.xeeshop.com/designhubs-documentation/"><?php echo esc_html( 'Read Documentation', 'designhubs' ); ?></a>
					</div>
				</div>
				<div class="feature-section">
					<div class="about_data_designhubs">
						<h3>Recommended Plugins</h3>
						<p>Please install recommended plugins for better use of theme. It will help you to make website more useful</p>
						<a href="<?php echo esc_url(admin_url('/themes.php?page=tgmpa-install-plugins&plugin_status=activate'), 'designhubs'); ?>"><?php echo esc_html( 'Install Plugins ', 'designhubs' ); ?></a>
					</div>
				</div>
				<div class="feature-section">
					<div class="about_data_designhubs">
						<h3>Free Theme Demo</h3>
						<p>You can check free theme demo before setup your website if you like demo then install theme</p>
						<a href="https://xeeshop.com/themedemo/designhubs/"><?php echo esc_html( 'Free Theme Demo ', 'designhubs' ); ?></a>
					</div>
				</div>
				<div class="feature-section">
					<div class="about_data_designhubs">
						<h3>Free VS Pro</h3>
						<p>You can check compare free version and pro version.</p>
						<a href="https://www.xeeshop.com/product/designhubs-pro/"><?php echo esc_html( 'Compare free Vs Pro ', 'designhubs' ); ?></a>
					</div>
				</div>
				<div class="feature-section">
					<div class="about_data_designhubs">
						<h3>Rate this theme</h3>
						<p>If you like our theme, Please vote us , so we can contribute more features for you.</p>
						<a href="#"><?php echo esc_html( 'Rate This Theme ', 'designhubs' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<ul class="tabs">
			<li class="tab-link current" data-tab="about">About</li>
		</ul> 
		<div id="about" class="tab-content current">
			<div class="about_section">
				<div class="about_info_data theme_info">
					<div class="about_theme_title">
						<h2>Theme Customizer</h2>
					</div>
					<div class="about_theme_data">
						<p>All Theme Options are available via Customize screen.</p>
					</div>
					<div class="about_theme_btn">
						<a class="customize_btn button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>">Customize</a>
					</div>
				</div>
				<div class="theme_que theme_info">
					<div class="about_theme_que">
						<h2>Got theme support question?</h2>
					</div>
					<div class="about_que_data">
						<p>Get genuine support from genuine people. Whether it's customization or compatibility, our seasoned developers deliver tailored solutions to your queries.</p>
					</div>
					<div class="about_que_btn">
						<a class="support_forum button button-primary" href="https://www.xeeshop.com/support-us/">Support Forum</a>
					</div>
				</div>
			</div>
			<div class="about_shortcode theme_info">
				<div class="about_single_page_post_shortcode">
					<h2>Single Page And Post Add shortcode</h2>
					<p>if this plugin Page Section For Themereviewer must be installed then this Shortcode use Otherwise this Shortcode is not work.</p>
				</div>
				<ul>
					<h3>Featured Slider :</h3>
					<li>[theme_section section='designhubs_featuredimage_slider']</li>
					<h3>Featured Section :</h3>
					<li>[theme_section section='designhubs_featured_section']</li>
					<h3>About Section :</h3>
					<li>[theme_section section='designhubs_about_section']</li>
					<h3>Our Portfolio :</h3>
					<li>[theme_section section='designhubs_our_portfolio']</li>
					<h3>Our Services :</h3>
					<li>[theme_section section='designhubs_our_services']</li>
					<h3>Our Sponsors :</h3>
					<li>[theme_section section='designhubs_our_sponsors']</li>
					<h3>Our Team :</h3>
					<li>[theme_section section='designhubs_our_team']</li>
					<h3>Our Testimonial :</h3>
					<li>[theme_section section='designhubs_our_testimonial']</li>
					<h3>Widget Section :</h3>
					<li>[theme_section section='designhubs_widget_section']</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
}
?>