<?php global $akvo_widgets_template;?>
<div class="akvo-iframe-widget">
<?php if( isset( $instance['iframe'] ) && $instance['iframe'] ) { echo $instance['iframe']; } ?>
<?php if( isset( $instance['legends'] ) && count( $instance['legends'] ) ):?>
	<ul>
		<?php foreach( $instance['legends'] as $btn ):?>
			<?php if( isset( $btn['image'] ) && isset( $btn['title'] ) ):?>
			<li>
				<?php $akvo_widgets_template->print_image( $btn['image'] );?>
				<span><?php echo $btn['title'];?></span>
			</li>
			<?php endif;?>
		<?php endforeach;?>
	</ul>
<?php endif;?>
</div>
