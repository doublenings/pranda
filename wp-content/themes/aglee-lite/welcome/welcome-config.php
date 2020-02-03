<?php
/**
 * Welcome Page Initiation
*/

include get_template_directory() . '/welcome/welcome.php';

/** Plugins **/
$plugins = array(
	// *** Companion Plugins
	'companion_plugins' => array(
		'access-demo-importer' 	=> array(
			'slug' 				=> 'access-demo-importer',
			'name' 				=> esc_html__('Instant Demo Importer', 'aglee-lite'),
			'filename' 			=>'access-demo-importer.php',
 			// Use either bundled, remote, wordpress
			'host_type' 		=> 'wordpress',
			'class' 			=> 'Access_Demo_Importer',
			'info' => __('Access Demo Importer Plugin adds the feature to Import the Demo Conent with a single click.', 'aglee-lite'),
		)
	),
	// *** Required Plugins
	'required_plugins' 			=> array(),

	// *** Recommended Plugins
	'recommended_plugins' => array(
			// Free Plugins
		'free_plugins' => array(
			'accesspress-social-counter' => array(
				'slug' 		=> 'accesspress-social-counter',
				'filename' 	=> 'accesspress-social-counter.php',
				'class' 	=> 'SC_Class'
			),
			'contact-form-7' => array(
				'slug' 		=> 'contact-form-7',
				'filename' 	=> 'wp-contact-form-7.php',
				'class' 	=> 'WPCF7_Submission'
			),
			'newsletter' => array(
				'slug' 		=> 'newsletter',
				'filename' 	=> 'plugin.php',
				'class' 	=> 'Newsletter'
			),
			'accesspress-twitter-feed' => array(
				'slug' 		=> 'accesspress-twitter-feed',
				'filename' 	=> 'accesspress-twitter-feed.php',
				'class' 	=> 'APTF_Class'
			)
		),
		// Pro Plugins
		'pro_plugins' => array()
	),
);

$strings = array(
		// Welcome Page General Texts
	'welcome_menu_text' => esc_html__( 'Aglee Lite Setup', 'aglee-lite' ),
	'theme_short_description' => esc_html__( 'Aglee Lite is a simple, basic & clean.  It is beautifully designed responsive free WordPress business theme. It has useful features to setup your website fast and make your website operate smoothly. It doesnot have much features which you probably will not use at all! Full width and boxed layout, featured slider, featured posts, services/features/projects layout, testimonial layout, blog layout, social media integration, call to action and many other page layouts. Fully responsive, bbPress compatible, translation ready, cross-browser compatible, SEO friendly, RTL support. Aglee Lite is multi-purpose and is suitable for any type of business. Highest level of compatibility with mostly used WP plugins.  Great customer support via online chat, email.', 'aglee-lite' ),

	// Plugin Action Texts
	'install_n_activate' => esc_html__('Install and Activate', 'aglee-lite'),
	'deactivate' => esc_html__('Deactivate', 'aglee-lite'),
	'activate' => esc_html__('Activate', 'aglee-lite'),

	// Recommended Plugins Section
	'pro_plugin_title' => esc_html__( 'Pro Plugins', 'aglee-lite' ),
	'pro_plugin_description' => esc_html__( 'Take Advantage of some of our Premium Plugins.', 'aglee-lite' ),
	'free_plugin_title' => esc_html__( 'Free Plugins', 'aglee-lite' ),
	'free_plugin_description' => esc_html__( 'These Free Plugins might be handy for you.', 'aglee-lite' ),

	// Demo Actions
	'installed_btn' => esc_html__('Activated', 'aglee-lite'),
	'deactivated_btn' => esc_html__('Activated', 'aglee-lite'),
	'demo_installing' => esc_html__('Installing Demo', 'aglee-lite'),
	'demo_installed' => esc_html__('Demo Installed', 'aglee-lite'),
	'demo_confirm' => esc_html__('Are you sure to import demo content ?', 'aglee-lite'),

	// Actions Required
	'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'aglee-lite' ),
	'customize_theme_btn' => esc_html__( 'Customize Theme', 'aglee-lite' ),
);

/**
 * Initiating Welcome Page
*/
$my_theme_wc_page = new Aglee_Lite_Welcome( $plugins, $strings );