<?php 
/*
Widget Name: Akvo Grid Widget
Description: Akvo Grid - image and text in a grid
Author: Samuel Thomas
Author URI: 
Widget URI: ,
Video URI: 
*/

class Akvo_Grid_Widget extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-grid',

			// The name of the widget for display purposes.
			__('Akvo Grid Widget', 'hello-world-widget-text-domain'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Akvo Grid - image and text in a grid', 'siteorigin-widgets'),
				'help'        => 'http://example.com/hello-world-widget-docs',
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'image' => array(
					'type' 		=> 'media',
					'label' 	=> __( 'Choose Image', 'siteorigin-widgets' ),
					'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
					'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
					'library' 	=> 'image',
					'fallback' 	=> false
				),
				'image_align' => array(
					'type' => 'select',
					'label' => __( 'Align Image', 'siteorigin-widgets' ),
					'default' => 'left',
					'options' => array(
						'left' => __( 'Left', 'siteorigin-widgets' ),
						'right' => __( 'Right', 'siteorigin-widgets' ),
					)
				),
				'text_bg' => array(
					'type' 		=> 'color',
					'label' 	=> __( 'Choose a background color for the text', 'siteorigin-widgets' ),
					'default' 	=> '#EEEEEE'
				),
				'text_padding' => array(
					'type' 		=> 'slider',
					'label' 	=> __( 'Padding of Text (in px)', 'siteorigin-widgets' ),
					'default' 	=> 10,
					'min' 		=> 10,
					'max' 		=> 100,
					'integer' 	=> true
				),
				'text' => array(
					'type' 				=> 'tinymce',
					'label' 			=> __( 'Text', 'siteorigin-widgets' ),
					'default' 			=> '',
					'rows' 				=> 10,
					'default_editor' 	=> 'html',
					'button_filters' 	=> array(
						'mce_buttons' 	=> array( $this, 'filter_mce_buttons' ),
						'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
						'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
						'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
						'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
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

siteorigin_widget_register( 'akvo-grid', __FILE__, 'Akvo_Grid_Widget' );