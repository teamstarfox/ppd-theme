<?php
/**
 * planpackdiscover Theme Customizer
 *
 * @package planpackdiscover
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function planpackdiscover_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_section( 'static_front_page');

	if ( isset( $wp_customize->selective_refresh ) ) {

		// Blog Description

		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'planpackdiscover_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'planpackdiscover_customize_partial_blogdescription',
			)
		);

		// CTA Button

		// $wp_customize->add_section(
		// 	'CTA Button',
		// 	array(
		// 		'title' => __( 'CTA Button', '_s' ),
		// 		'priority' => 30,
		// 		'description' => __( 'This field determines where all of the primary CTA buttons take the user.', '_s' )
		// 	)
		// );
		
		// $wp_customize->add_setting( 'cta_link', array( 'default' => '' ) );
		// $wp_customize->add_control( 
		// 	new WP_Customize_Control( 
		// 		$wp_customize, 'cta_link', array( 
		// 			'label' => __( 'Link', '_s' ), 
		// 			'section' => 'CTA Button', 
		// 			'settings' => 'cta_link', 
		// 		) 
		// 	) 
		// );

		// $wp_customize->add_setting( 'cta_text', array( 'default' => '' ) );
		// $wp_customize->add_control( 
		// 	new WP_Customize_Control( 
		// 		$wp_customize, 'cta_text', array( 
		// 			'label' => __( 'Text', '_s' ), 
		// 			'section' => 'CTA Button', 
		// 			'settings' => 'cta_text', 
		// 		) 
		// 	) 
		// );

		// Sidebar Bio
	}
}
add_action( 'customize_register', 'planpackdiscover_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function planpackdiscover_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function planpackdiscover_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function planpackdiscover_customize_preview_js() {
	wp_enqueue_script( 'planpackdiscover-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'planpackdiscover_customize_preview_js' );
