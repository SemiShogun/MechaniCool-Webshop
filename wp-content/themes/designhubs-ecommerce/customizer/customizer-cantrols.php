<?php 
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Designhubs_Align_Radio_Control' ) ) {
	class Designhubs_Align_Radio_Control extends WP_Customize_Control {
	
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
		<div id="input_<?php echo esc_attr( $this->id ); ?>" class="align_item_tab">
			<?php foreach ( $this->choices as $value => $label ) : 
				?>
					<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
						<input class="align_item-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<h2><?php echo esc_html( $label ); ?></h2>
					</label>
			<?php endforeach; ?>
		</div>
		<?php
	}
	}
}
if ( ! function_exists( 'designhubs_ecommerce_full_banner_section' ) ) :
    function designhubs_ecommerce_full_banner_section() {
        get_template_part( 'customizer/theme_option/projectmanager' );
    }
endif;

?>