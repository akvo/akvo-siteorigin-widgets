<?php
	
	$akvo_shortcode_nested_filters = new AKVO_SOW_SHORTCODE_NESTED_FILTERS;
	
	if( ! $instance['has_filters'] ){
		$instance['primary_filter'] = '';
	}
	
	echo do_shortcode( $akvo_shortcode_nested_filters->form_shortcode( $instance ) );
	
	/*
	*	
	*	Find the shortcode in the plugin folder itself
	*
	*/
	
?>
