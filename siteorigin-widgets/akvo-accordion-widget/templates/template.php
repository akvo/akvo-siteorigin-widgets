<?php
	global $akvo_widgets_template;
	$widget_id = 'accordion-'.$akvo_widgets_template->getUniqueID( $instance );
?>
<div class="panel-group" id="<?php _e( $widget_id );?>" role="tablist" aria-multiselectable="true">
	<?php foreach( $instance['accordions'] as $accordion ): ?>
	<?php
		$collapse_id = 'collapse-'.$akvo_widgets_template->getUniqueID( $accordion );
		$heading_id = 'heading-'.$akvo_widgets_template->getUniqueID( $accordion );
		$desc_id = 'desc-'.$akvo_widgets_template->getUniqueID( $accordion );
	?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="<?php _e( $heading_id );?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php _e( $collapse_id );?>" aria-expanded="true" aria-controls="<?php _e( $widget_id );?>">
          <?php _e( $accordion['title'] );?>
        </a>
      </h4>
    </div>
    <div id="<?php _e( $collapse_id );?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php _e( $heading_id );?>">
      <div class="panel-body">
        <?php echo siteorigin_panels_render( $desc_id, true, $accordion['desc'] );?>
      </div>
    </div>
  </div>
	<?php endforeach;?>
</div>
