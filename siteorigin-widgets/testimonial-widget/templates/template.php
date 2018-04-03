<?php global $akvo_widgets_template;?>
<div class="testimonial-widget">
	<div class="testimonial-widget-image">
		<?php $akvo_widgets_template->print_image( $instance['image'] );?>
	</div>
	<div class="testimonial-text"><?php echo $instance['testimonial'];?></div>
	<div class="testimonial-title"><?php echo wp_kses_post($instance['title']) ?></div>
</div>