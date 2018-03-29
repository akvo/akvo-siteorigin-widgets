<?php 
/*
Widget Name: Akvo Cover Widget
Description: Akvo Cover: image, overlay text and languages
Author: Samuel Thomas
Author URI: http://example.com
Widget URI: ,
Video URI: 
*/

class Akvo_Cover_Widget extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-cover',

			// The name of the widget for display purposes.
			__('Akvo Cover Widget', 'hello-world-widget-text-domain'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Akvo Cover: image, overlay text and languages.', 'hello-world-widget-text-domain'),
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
				'text_url' => array(
					'type' => 'text',
					'label' => __('Caption URL', 'siteorigin-widgets'),
					'default' => ''
				),
				'text' => array(
					'type' 				=> 'tinymce',
					'label' 			=> __( 'Overlay Text', 'siteorigin-widgets' ),
					'default' 			=> '',
					'rows' 				=> 10,
					'default_editor' 	=> 'html',
					'button_filters' => array(
						'mce_buttons' 	=> array( $this, 'filter_mce_buttons' ),
						'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
						'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
						'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
						'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
					),
				),
				'languages' => array(
					'type' => 'repeater',
					'label' => __( 'Languages' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Language', 'siteorigin-widgets' ),
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => __( 'Text', 'siteorigin-widgets' )
						),
						'link' => array(
							'type' => 'text',
							'label' => __( 'Link', 'siteorigin-widgets' )
						),
						'is_active' => array(
							'type' => 'checkbox',
							'label' => __( 'Is Active', 'siteorigin-widgets' )
						)
					)
				)
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}
	
	function get_template_name($instance) {
		return 'hello-world-template';
	}

	function get_template_dir($instance) {
		return 'hw-templates';
	}

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('akvo-cover', __FILE__, 'Akvo_Cover_Widget');