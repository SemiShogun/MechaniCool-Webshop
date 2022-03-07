<?php
if ( ! function_exists( 'designhubs_social_section' ) ) :
	function designhubs_social_section( $selector = 'header' ) {
		get_template_part( 'template-parts/top_bar/social_info' );
	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Designhubs_Custom_Radio_Image_Control' ) ) {
	class Designhubs_Custom_Radio_Image_Control extends WP_Customize_Control {

		public $type = 'radio-image';
		
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="customizer_images">
				<?php foreach ( $this->choices as $value => $label ) : ?>
						<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
							<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
							</input>
						</label>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'designhubs_GeneratePress_Upsell_Section' ) ) {

	class designhubs_GeneratePress_Upsell_Section extends WP_Customize_Control {

	public $type = 'ast-description';
	
    public $id = '';

	public function to_json() {
		parent::to_json();		

		$this->json['label']       = esc_html( $this->label );
		$json['id'] = $this->id;
            return $json;
	}

	protected function render_content() {
		?>
		<h3 class="section-heading">
            <?php echo esc_html( $this->label ); ?>      
        </h3>
		<?php
	}
	}

}
if ( ! function_exists( 'designhubs_breadcrumb_title' ) ) {
	function designhubs_breadcrumb_title() {
		
		if ( is_home() || is_front_page()):
			
			single_post_title();
			
		elseif ( is_day() ) : 
										
			printf( esc_html( 'Daily Archives: %s', 'designhubs' ), get_the_date() );
		
		elseif ( is_month() ) :
		
			printf( esc_html( 'Monthly Archives: %s', 'designhubs' ), (get_the_date( 'F Y' ) ));
			
		elseif ( is_year() ) :
		
			printf( esc_html( 'Yearly Archives: %s', 'designhubs' ), (get_the_date( 'Y' ) ) );
			
		elseif ( is_category() ) :
		
			printf( esc_html( 'Category Archives: %s', 'designhubs' ), (single_cat_title( '', false ) ));

		elseif ( is_tag() ) :
		
			printf( esc_html( 'Tag Archives: %s', 'designhubs' ), (single_tag_title( '', false ) ));
			
		elseif ( is_404() ) :

			printf( esc_html( 'Error 404', 'designhubs' ));
			
		elseif ( is_author() ) :
		
			printf( esc_html( 'Author: %s', 'designhubs' ), (get_the_author( '', false ) ));			
			
		elseif ( class_exists( 'woocommerce' ) ) : 
			
			if ( is_shop() ) {
				woocommerce_page_title();
			}
			
			elseif ( is_cart() ) {
				the_title();
			}
			
			elseif ( is_checkout() ) {
				the_title();
			}
			
			else {
				the_title();
			}
		else :
				the_title();
				
		endif;
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Designhubs_Custom_Radio_Control' ) ) {
	class Designhubs_Custom_Radio_Control extends WP_Customize_Control {
	
	public $type = 'radio-select';
	
	public function render_content() {
		if ( empty( $this->choices ) ) {
			return;
		}			
		
		$name = '_customize-radio-' . $this->id;

		?>
		<span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
		</span>
		<div id="input_<?php echo esc_attr( $this->id ); ?>" class="general_design_tab">
			<?php foreach ( $this->choices as $value => $label ) : 
				?>
					<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
						<input class="general-design-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<h2><?php echo esc_html( $label ); ?></h2>
					</label>
			<?php endforeach; ?>
		</div>
		<?php
	}
}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Designhubs_Transparent_Color_Control' ) ) {

	class Designhubs_Transparent_Color_Control extends WP_Customize_Control {
	
	public $type = 'alpha-color';
		
		public function render_content() {

			// Begin the output. ?>
			<span class='customize-control-title'><?php echo esc_html($this->label); ?></span>
			<label>
				<input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" value="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?> /> 
			</label>
			<?php
		}
	}
}


if ( ! function_exists( 'designhubs_breadcrumb_sections' ) ) :
	function designhubs_breadcrumb_sections( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/breadcrumb_section' );
	}
endif;
if ( ! function_exists( 'designhubs_featuredimage_slider' ) ) :
	function designhubs_featuredimage_slider() {
		echo designhubs_slider_activate();
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-slider.php';			
	}
endif;
if ( ! function_exists( 'designhubs_featured_section' ) ) :
	function designhubs_featured_section( $selector = 'header' ) {
		//get_template_part( 'template-parts/theme_option/featured_section' );
		echo designhubs_section_info_activate();
		//require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-info.php';
	}
endif;
if ( ! function_exists( 'designhubs_about_section' ) ) :
	function designhubs_about_section( $selector = 'header' ) {
		echo designhubs_section_about_activate();
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-about.php';	
	}
endif;
if ( ! function_exists( 'designhubs_our_portfolio' ) ) :
	function designhubs_our_portfolio( $selector = 'header' ) {
		echo designhubs_section_portfolio_activate();;
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-portfolio.php';
	}
endif;
if ( ! function_exists( 'designhubs_our_services' ) ) :
	function designhubs_our_services( $selector = 'header' ) {
		echo designhubs_services_activate();
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-services.php';
	}
endif;
if ( ! function_exists( 'designhubs_our_sponsors' ) ) :
	function designhubs_our_sponsors( $selector = 'header' ) {
		echo designhubs_sponsors_activate();
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-sponsors.php';
	}
endif;
if ( ! function_exists( 'designhubs_our_team' ) ) :
	function designhubs_our_team( $selector = 'header' ) {
		echo designhubs_team_activate();
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-team.php';
	}
endif;
if ( ! function_exists( 'designhubs_our_testimonial' ) ) :
	function designhubs_our_testimonial( $selector = 'header' ) {
		echo designhubs_testimonial_activate();
		require_once WP_PLUGIN_DIR .'/page-section-for-themereviewer/inc/designhubs/sections/section-testimonial.php';
	}
endif;
if ( ! function_exists( 'designhubs_widget_section' ) ) :
	function designhubs_widget_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/widget_section' );
	}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'designhubs_custom_ordering' ) ) {

	class designhubs_custom_ordering extends WP_Customize_Control {
	
	public $type = 'sortable_repeater';
	
	public function enqueue() {
	wp_enqueue_script( 'designhubs_customizs_js', trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer_ordering.js', array( 'jquery' ), '1.0', true );
	}
	
	public function render_content() {
        ?>
          <div class="drag_and_drop_control">
                <?php if( !empty( $this->label ) ) { ?>
                	<h3 class="section-heading">
	                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                </h3>
                <?php } ?>
                <?php if( !empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
                <?php
                $designhubs_diseble = get_theme_mod( 'designhubs_diseble' );
				$designhubs_diseble_arr =  explode(",",$designhubs_diseble); 

                ?>
                <ul class="sortable">
                	<?php
						$valuechoices = $this->choices;
						foreach ($valuechoices as $key => $value) {
							?>
							<li class="repeater <?php echo (in_array($key, $designhubs_diseble_arr)?'invisibility':'');?>" value="<?php echo esc_attr($key)?>" id='<?php echo esc_attr($key)?>'>
		                        <div class="repeater-input">
		                        	<i class='dashicons dashicons-visibility visibility'></i>
		                        	<?php echo esc_attr($value); ?>
		                        </div>
		                    </li>
							<?php
						}						
					?>	
                </div> 
            </div>
        <?php
    }
	}
}

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'designhubs_pro_Section' ) ) {
    
    class designhubs_pro_Section extends WP_Customize_Section {
       
        public $type = 'gp-upselles-section';

        public $pro_url = '';
        
        public $pro_text = '';

        public $id = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['id'] = $this->id;
            return $json;
        }

        protected function render_template() {
        	$upgrade_prolinks = apply_filters('designhubs_prosectionlinks', 'https://www.xeeshop.com/product/designhubs-pro/');
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                    <div class="titled_pro_heading">
						<label class='customize-control-title'><?php echo $this->pro_text; ?></label>
						<a href="<?php echo esc_attr($upgrade_prolinks);?>" class="button button-secondary alignright button_pro" target="_blank">Upgrade To PRO</a>
					</div>
            </li>   
            <?php
        }
    }
}
if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'designhubs_documentation_Upsell_Section' ) ) {
   
    class designhubs_documentation_Upsell_Section extends WP_Customize_Section {
        
        public $type = 'gp-upsell-section';

        public $pro_url = '';

        public $pro_text = '';

        public $id = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['id'] = $this->id;
            return $json;
        }
        protected function render_template() {
        	$document_link = apply_filters('designhubs_document_link', 'https://www.xeeshop.com/designhubs-documentation/');
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <h3 class="accordion-section-title">
                    {{ data.title }}

                   <!--  <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #> -->
                    <a href="<?php echo esc_attr($document_link);?>" class="button button-secondary alignright" target="_blank">Documentation</a>
                </h3>
            </li>   
            <?php
        }
    }
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'designhubs_pro_option_Control' ) ) {
	class designhubs_pro_option_Control extends WP_Customize_Control {
	
		public $type = 'more-option';
		
	    public $id = '';

		public function json() {
	            $json = parent::json();
	            $this->json['label']       = esc_html( $this->label );
	            $json['id'] = $this->id;
	            return $json;
	        }
		protected function render_content() {
			$theme_name = wp_get_theme();
			$proverslink = apply_filters('designhubs_proversinline', 'https://www.xeeshop.com/product/designhubs-pro/');
			?>
			<div class="title_pro_heading">
				<label class='customize-control-title'>More Options Available in <?php echo esc_attr($theme_name); ?> Pro!</label>
				<a href="<?php echo esc_attr($proverslink);?>" class="button button-secondary button_more_pro" target="_blank">Lern More</a>
			</div>
			<?php
		}
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'designhubs_drag_drop_option_Control' ) ) {
	class designhubs_drag_drop_option_Control extends WP_Customize_Control {
	
		public $type = 'more-option';
		
	    public $id = '';
		
		public function json() {
            $json = parent::json();
            $this->json['label'] = esc_html( $this->label );
            $json['id'] = $this->id;
            return $json;
        }
		
		protected function render_content() {
			$theme_name = wp_get_theme();
			$proverslink = apply_filters('designhubs_proversinline', 'https://www.xeeshop.com/product/designhubs-pro/');
			?>
			<div class="title_pro_heading">
				<label class='customize-control-title'>Drag & Drop Section in <?php echo esc_attr($theme_name); ?> Pro!</label> 
				<a href="<?php echo esc_attr($proverslink);?>" class="button button-secondary button_more_pro" target="_blank">Lern More</a>
			</div>
			<?php
		}
	}
}



?>