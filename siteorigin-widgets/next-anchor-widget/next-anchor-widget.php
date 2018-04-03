<?php 
/*
Widget Name: Next Anchor Widget
Description: Animate to the next section when the anchor button is clicked. 
Author: Samuel Thomas
Author URI: 
Widget URI: 
Video URI: 
*/

class Next_Anchor_Widget extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'next-anchor-widget',

			// The name of the widget for display purposes.
			__('Next Anchor Widget', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Animate to the next section when the anchor is clicked.', 'siteorigin-widgets'),
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			),
			
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'buttons' => array(
					'type' => 'repeater',
					'label' => __( 'Anchor Links' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Anchor Link', 'siteorigin-widgets' ),
					'fields' => array(
						'image' => array(
							'type' 		=> 'media',
							'label' 	=> __( 'Choose Image', 'siteorigin-widgets' ),
							'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
						'link' => array(
							'type' => 'text',
							'label' => __( 'Anchor Link of the next section', 'siteorigin-widgets' )
						),
						
					)
				)
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

siteorigin_widget_register('next-anchor-widget', __FILE__, 'Next_Anchor_Widget');