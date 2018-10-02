<?php global $akvo_widgets_template;?>

<?php if( isset( $instance['text'] ) ):?>

<?php 
	$widget_id = $akvo_widgets_template->getUniqueID( $instance );
	
	$widget_classes = array('buttonmodal');
	
	if( isset( $instance['type'] ) && $instance['type'] ){
		$widget_classes[] = $instance['type'];
	}
	
	$widget_link = $instance['is_modal'] ? '#modal-'.$widget_id : sow_esc_url( $instance['link'] ); 
	
?>
<div class='<?php _e( $instance['align'] ); ?>'>
	<a <?php if( $instance['is_modal'] ):?>data-toggle='modal'<?php endif;?> href="<?php _e( $widget_link );?>" class="<?php _e( implode(' ', $widget_classes) );?>"><?php _e( $instance['text'] );?></a>
</div>
<?php if( $instance['is_modal'] ):?>
<div id="<?php _e( 'modal-'.$widget_id );?>" class="modal sow-modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php echo siteorigin_panels_render( 'w'.$widget_id, true, $instance['modal_builder'] );?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>	

<?php endif;?>
