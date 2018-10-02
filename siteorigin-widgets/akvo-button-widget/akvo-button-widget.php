<?php 
/*
Widget Name: Akvo Button 
Description: Button that opens a modal box
Author: Samuel Thomas
Author URI: 
Widget URI: 
Video URI: 
*/

class Akvo_Button_Widget extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-button-widget',

			// The name of the widget for display purposes.
			__('Akvo Button', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Button that opens a modal box', 'siteorigin-widgets'),
				'help'        => '',
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'text' => array(
					'type' 	=> 'text',
					'label' => __( 'Text for Button', 'siteorigin-widgets' ),
				),
				'is_modal' => array(
					'type' => 'checkbox',
					'label' => __( 'Open Modal Box', 'siteorigin-widgets' ),
					'default' => false,
					'state_emitter' => array(
						'callback' 	=> 'conditional',
						'args' 		=> array( 
							'is_modal[active]: val',
							'is_modal[inactive]: !val' 
						)
					),
				),
				'modal_builder' => array(
					'type' 	=> 'builder',
					'label' => __( 'Modal Content', 'siteorigin-widgets'),
					'state_handler' => array(
						'is_modal[active]' 	=> array('show'),
						'_else[is_modal]' 	=> array('hide'),
					),
				),
				'link' => array(
					'type' => 'link',
					'label' => __('Button URL', 'widget-form-fields-text-domain'),
					'default' => 'http://www.example.com',
					'state_handler' => array(
						'is_modal[active]' 	=> array('hide'),
						'_else[is_modal]' 	=> array('show'),
					),
				),
				'type' => array(
					'type' 		=> 'select',
					'label' 	=> __( 'Button Type', 'siteorigin-widgets' ),
					'default' 	=> 'noclass',
					'options' 	=> $this->get_button_types() 
				),
				'align' => array(
					'type' 		=> 'select',
					'label' 	=> __( 'Alignment', 'siteorigin-widgets' ),
					'default' 	=> 'text-left',
					'options' 	=> array(
						'text-left'		=> 'Align to left',
						'text-center'	=> 'Align to center',
						'text-right'	=> 'Align to right'
					)
				)
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}
	
	function get_button_types(){
		return apply_filters( 'akvo-sow-button-widget-types', array( 'noclass'	=> 'Default' ) );
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

siteorigin_widget_register('akvo-button-widget', __FILE__, 'Akvo_Button_Widget');