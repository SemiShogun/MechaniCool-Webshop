<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designhubs-ecommerce
 */
$social_icon = get_theme_mod( 'our_projectmanager_social_icon_section', 4 );
?>
<div class="designhubs_projectmanager_section">
	<div class="designhubs_projectmanager_info">
		<div class="designhubs_projectmanager_image">
			<?php
			if(get_theme_mod( 'our_projectmanager_image')){
				?>
				<img src="<?php echo esc_attr(get_theme_mod( 'our_projectmanager_image'));?>">
				<?php
			}else{
				?>
				<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
				<?php
			} ?>
		</div>
		<div class="designhubs_projectmanager_contain">
			<div class="designhubs_projectmanager_title">
				<h1><?php echo esc_html(get_theme_mod( 'our_projectmanager_main_title','PROJECT MANAGER')); ?></h1>
			</div>
			<div class="designhubs_projectmanager_subheadine">
				<h2><?php echo esc_html(get_theme_mod( 'our_projectmanager_main_subheading','MISS KATHERINA HALE')); ?></h2>
			</div>
			<div class="designhubs_projectmanager_description">
				<p><?php echo esc_html(get_theme_mod( 'our_projectmanager_description')); ?></p>
			</div>
			<div class="our_projectmanager_icon_data">
				<?php for ( $i = 1; $i <= $social_icon ; $i++ ) { 
					?>
					<div class="our_projectmanager_icon">
						<a class="projectmanager_social_icon" href="<?php echo esc_attr(get_theme_mod( 'projectmanager_social_icon_link_'.$i ,'#'));?>" target="_blank">
							<i class="<?php echo esc_attr(get_theme_mod( 'our_projectmanager_icon'.$i ,'fa fa-facebook'));?>"></i>
						</a>
					</div>
					<?php
				} ?>
			</div>
		</div>
	</div>
</div>