<?php 
/*
Widget Name: Logos widget
Description: List of logos
Author: Samuel Thomas
Author URI: 
Widget URI: 
Video URI: 
*/

class Logos_Widget extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'logos',

			// The name of the widget for display purposes.
			__('Logos Widget', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('List of logos.', 'siteorigin-widgets'),
				'help'        => 'http://example.com/hello-world-widget-docs',
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'logos' => array(
					'type' => 'repeater',
					'label' => __( 'Logos' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Logo', 'siteorigin-widgets' ),
					'fields' => array(
						'image' => array(
							'type' 		=> 'media',
							'label' 	=> __( 'Choose Image', 'widget-form-fields-text-domain' ),
							'choose' 	=> __( 'Choose image', 'widget-form-fields-text-domain' ),
							'update' 	=> __( 'Set image', 'widget-form-fields-text-domain' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
						'link' => array(
							'type' => 'text',
							'label' => __( 'Link', 'siteorigin-widgets' )
						),
						
					)
				)
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}
	
	function get_template_name($instance) {
		return 'logos';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('logos', __FILE__, 'Logos_Widget');