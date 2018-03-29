<?php global $akvo_widgets_template;?>
<div class='akvo-grid-parent'>
	<?php 
		if( isset( $instance['image_align'] )  && $instance['image_align'] && $instance['image_align'] == 'left' ){
			$akvo_widgets_template->print_bg_image( $instance['image'] );
		}
	?>
	<div class='text' style="background-color: <?php _e( $instance['text_bg'] );?>;padding: <?php _e( $instance['text_padding'] );?>px"><?php echo $instance['text'];?></div>
	<?php 
		if( isset( $instance['image_align'] )  && $instance['image_align'] && $instance['image_align'] == 'right' ){
			$akvo_widgets_template->print_bg_image( $instance['image'] );
		}
	?>
</div>

