<?php 
/*
Widget Name: Akvo Iframe Widget
Description: RSR Maps with Legends 
Author: Samuel Thomas
Author URI: 
Widget URI: 
Video URI: 
*/

class Akvo_Iframe_Widget extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-iframe-widget',

			// The name of the widget for display purposes.
			__('Akvo Iframe Widget', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('RSR Maps with Legends', 'siteorigin-widgets'),
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			),
			
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'legends' => array(
					'type' => 'repeater',
					'label' => __( 'Legends' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Legend', 'siteorigin-widgets' ),
					'fields' => array(
						'image' => array(
							'type' 		=> 'media',
							'label' 	=> __( 'Legend Icon', 'siteorigin-widgets' ),
							'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
						'title' => array(
							'type' => 'text',
							'label' => __( 'Legend Title', 'siteorigin-widgets' )
						),
						
					)
				),
				'iframe' => array(
					'type' 				=> 'tinymce',
					'label' 			=> __( 'Add Iframe or Custom Html', 'siteorigin-widgets' ),
					'default' 			=> '',
					'rows' 				=> 10,
					'default_editor' 	=> 'html',
					'button_filters' => array(
						'mce_buttons' 			=> array( $this, 'filter_mce_buttons' ),
						'mce_buttons_2' 		=> array( $this, 'filter_mce_buttons_2' ),
						'mce_buttons_3' 		=> array( $this, 'filter_mce_buttons_3' ),
						'mce_buttons_4' 		=> array( $this, 'filter_mce_buttons_5' ),
						'quicktags_settings' 	=> array( $this, 'filter_quicktags_settings' ),
					),
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}
	
	function get_template_name($instance) {
		return 'template';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('akvo-iframe-widget', __FILE__, 'Akvo_Iframe_Widget');