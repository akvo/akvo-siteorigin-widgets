<?php global $akvo_widgets_template;?>
<?php if( isset( $instance['logos'] ) ):?>
<ul>
	<?php foreach( $instance['logos'] as $logo ):?>
	<li>
		<?php if( isset( $logo['link'] ) && $logo['link'] ):?><a href="<?php _e( $logo['link'] );?>"><?php endif;?>
		<?php $akvo_widgets_template->print_image( $logo['image'] );?>
		<?php if( isset( $logo['link'] ) && $logo['link'] ):?></a><?php endif;?>
	</li>
	<?php endforeach;?>
</ul>
<?php endif;?>