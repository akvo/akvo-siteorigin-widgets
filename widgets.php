<?php
	
	/*
	Plugin Name: Akvo Site Origin Widgets
	Plugin URI: http://akvo.org
	Description: Akvo widgets that works with Site Origin Page Builder
	Version: 1.0
	Author: Samuel Thomas
	Author URI: http://akvo.org/
	*/
	
	$inc_files = array(
		'class-akvo-sow-shortcode.php',
		'class-akvo-sow-shortcode-nested-filters.php',
		'class-akvo-sow-shortcode-custom-posts.php'
	);
	
	foreach( $inc_files as $inc_file ){
		include( $inc_file );
	}

	
	class AKVO_WIDGETS_TEMPLATE{
		
		function __construct(){
			add_action('wp_enqueue_scripts', array( $this, 'assets' ) );
		}
		
		function assets(){
			
			wp_enqueue_script('akvo-sow-script', plugins_url('akvo-siteorigin-widgets/widget.js'), array('jquery'), '1.0.1', true );
			wp_enqueue_style('akvo-sow-styles', plugins_url('akvo-siteorigin-widgets/style.css'), false, '1.1.2' );
		}
		
		function get_image_url( $post_id ){
			if( $post_id ) return wp_get_attachment_url( $post_id );
			return false;
		}
		
		function print_image( $post_id ){
			
			$url = $this->get_image_url( $post_id );
			
			if( $url ){
				echo "<img src='".$url."' />";
			}
			
			
		}
		function print_bg_image( $post_id ){
			
			$url = $this->get_image_url( $post_id );
			
			if( $url ){
				echo "<div class='akvo-bg' style='background-image:url(".$url.")'></div>";
			}
			
		}
		
		function getUniqueID( $data ){
			return substr( md5( json_encode( $data ) ), 0, 8 );
		}
		
		/*
		* LIST OF POST TYPES THAT ARE IN THE WORDPRESS DASHBOARD
		*/
		function get_post_types(){
			return apply_filters( 'akvo-sow-post-types', get_post_types() );
		}
		
		/*
		* LIST OF TAXONOMIES THAT ARE IN THE WORDPRESS DASHBOARD
		*/
		function get_taxonomies(){
			return apply_filters( 'akvo-sow-taxonomies', get_taxonomies() );
		}
		
	}
	
	global $akvo_widgets_template;
	$akvo_widgets_template = new AKVO_WIDGETS_TEMPLATE;
	
	add_filter('siteorigin_widgets_widget_folders', function( $folders ){
		
		$folders[] = plugin_dir_path(__FILE__).'siteorigin-widgets/';
		
		return $folders;
		
	});