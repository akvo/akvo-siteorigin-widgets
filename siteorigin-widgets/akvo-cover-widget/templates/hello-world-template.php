<?php global $akvo_widgets_template;?>
<?php if( isset( $instance['languages'] ) && is_array( $instance['languages'] ) && count( $instance['languages'] ) ):?>
<ul class='lang-list'>
	<?php foreach( $instance['languages'] as $language ):if( isset( $language['text'] ) ):?>
	<li>
		<a <?php if( isset( $language['is_active'] ) && $language['is_active'] ):?>class="active"<?php endif;?> href="<?php _e( isset( $language['link'] ) ? $language['link'] : '' );?>">
			<?php _e( $language['text'] );?>
		</a>
	</li>
	<?php endif;endforeach;?>
</ul>
<?php endif;?>
<?php $akvo_widgets_template->print_image( $instance['image'] );?>
<div class='cover-overlay'>
	<div class='cover-overlay-text'><?php echo $instance['text'];?></div>
	<?php if( isset( $instance['text_url'] ) && $instance['text_url'] ) :?>
	<a class='cover-overlay-link' href="<?php _e( $instance['text_url'] );?>"></a>
	<?php endif;?>
</div>