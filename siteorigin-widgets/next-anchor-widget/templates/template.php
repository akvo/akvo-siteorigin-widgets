<?php global $akvo_widgets_template;?>
<?php if( isset( $instance['buttons'] ) && count( $instance['buttons'] ) ):?>
<ul class='next-anchor-widget'>
	<?php foreach( $instance['buttons'] as $btn ):?>
		<?php if( isset( $btn['image'] ) && isset( $btn['link'] ) ):?>
		<li><a href="<?php _e( $btn['link'] );?>"><?php $akvo_widgets_template->print_image( $btn['image'] );?></a></li>
		<?php endif;?>
	<?php endforeach;?>
</ul>
<?php endif;?>