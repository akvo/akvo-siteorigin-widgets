<?php
	
	/*
	Plugin Name: Akvo Site Origin Widgets
	Plugin URI: http://akvo.org
	Description: Akvo widgets that works with Site Origin Page Builder
	Version: 1.0
	Author: Samuel Thomas
	Author URI: http://akvo.org/
	*/

	class AKVO_WIDGETS_TEMPLATE{
		
		function __construct(){
			add_action('wp_enqueue_scripts', array( $this, 'assets' ) );
		}
		
		function assets(){
			
			wp_enqueue_style('akvo-sow-styles', plugins_url('akvo-siteorigin-widgets/style.css'), false, '1.0.5' );
		}
		
		function print_image( $post_id ){
			
			echo "<img src='".wp_get_attachment_url( $post_id )."' />";
			
		}
		
		
	}
	
	global $akvo_widgets_template;
	$akvo_widgets_template = new AKVO_WIDGETS_TEMPLATE;
	
	add_filter('siteorigin_widgets_widget_folders', function( $folders ){
		
		$folders[] = plugin_dir_path(__FILE__).'siteorigin-widgets/';
		
		return $folders;
		
	});