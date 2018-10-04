<?php
	
	$akvo_shortcode_custom_posts = new AKVO_SOW_SHORTCODE_CUSTOM_POSTS;
	
	if( isset( $instance['filter_value'] ) && $instance['filter_value'] && isset( $instance['filter_taxonomy'] )  && $instance['filter_taxonomy'] ){
		
		$instance['filter_by'] = $instance['filter_taxonomy'].":".$instance['filter_value'];
		
	}
	
	/*
	*	
	*	Find the shortcode in the plugin folder itself
	*
	*/
	
?>
<div class='akvo-sow-container'>
	<h1><?php _e( $instance['title'] );?></h1>
	<?php echo do_shortcode( $akvo_shortcode_custom_posts->form_shortcode( $instance ) );?>	
</div>