<?php  
//https://codex.wordpress.org/Plugin_API/Action_Reference/customire_register
add_action('customize_register',function(WP_Customize_Manager $manager){
	$manager->add_section('montheme_apparence',[
		'title'=>'Changer de fond du menu',

	]);
	//specifier la couleur du background du theme
	$manager->add_setting('header_background',[
		'default'=>'#7ad4e6',
		//charger seulement le menu
		'transport'=>'postMessage',
		'sanitize_callback'=>'sanitize_hex_color'
	]);
	//pour que l'utilisateur peut modifier la couleur de fond
/*	$manager->add_control('header_background',[
		'section'=>'montheme_apparence',
		'setting'=>'header_background',
		'label'=>'Couleur de l\'entete'
	]);
*/
	$manager->add_control(new WP_Customize_Color_Control($manager,'header_background',[		
			'section'=>'montheme_apparence',
			'setting'=>'header_background',
			'label'=>'Couleur de l\'entete'
		]));

	/* COPYRIGHT */
	// $manager->add_setting( new montheme_Custom_Setting( $manager, 'montheme_copyright_enable', array(
	// 	'label'             => esc_html__( 'Enable theme copyright message in the footer?', 'montheme' ),
	// 	'sanitize_callback' => 'montheme_sanitize_checkbox',
	// 	'default'           => 1,
	// 	'transport'         => 'postMessage',
	// ) ) );

	// $manager->add_control( new Epsilon_Control_Toggle( $manager, 'montheme_copyright_enable', array(
	// 	'type'        => 'epsilon-toggle',
	// 	'label'       => esc_html__( 'Display theme copyright in the footer?', 'montheme' ),
	// 	'description' => esc_html__( 'By disabling this field, the theme copyright text & links will be removed from the footer', 'montheme' ),
	// 	'section'     => 'montheme_general_section',
	// 	'std'         => '1',
	// ) ) );
//pour changer l'apparence du breadgrumb
	#Breadcrumbs on single blog posts
	// $manager->add_setting( new montheme_Custom_Setting( $manager, 'montheme_enable_post_breadcrumbs', array(
	// 	'sanitize_callback' => 'montheme_sanitize_radio_buttons',
	// 	'default'           => 'breadcrumbs_enabled',
	// ) ) );

	// $manager->add_control( new WP_Customize_Color_Control( $manager, 'montheme_enable_post_breadcrumbs', array(
	// 	'type'        => 'radio',
	// 	'choices'     => array(
	// 		'breadcrumbs_enabled'  => esc_html__( 'Enabled', 'montheme' ),
	// 		'breadcrumbs_disabled' => esc_html__( 'Disabled', 'montheme' ),
	// 	),
	// 	'label'       => esc_html__( 'Breadcrumbs on single blog posts', 'montheme' ),
	// 	'description' => esc_html__( 'This will disable the breadcrumbs', 'montheme' ),
	// 	'section'     => 'montheme_general_section',
	// ) ) );	
	
});





//Appeler le fichier apparence.js
add_action('customize_preview_init',function(){
	wp_enqueue_script('montheme_apparence',get_template_directory_uri().'/assets/js/apparence.js',['jquery','customize-preview'],'',true);
});


////CHANGER LA COULEUR DE FOND
function montheme_customize_register($wp_customize){
	$wp_customize->add_section(
		'options_perso',
		array(
			'title' => __( 'Couleur de fond', 'montheme' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'description' => __( 'Personnaliser la couleur de fond.', 'montheme' )
		)
	);

	$wp_customize->add_setting('montheme_options[bg_color]', array(
		'capability' => 'edit_theme_options',
		'type'       => 'option',
		'default'       => '#f8f9fa'
	));
	 
	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 'montheme_options[bg_color]', array(
		'settings' => 'montheme_options[bg_color]',
		'label'    => __('Couleur de fond', '1870wp'),
		'section'  => 'options_perso'
		)
	));
}
add_action('customize_register', 'montheme_customize_register');
// à utiliser avec echo montheme_options('bg_color');
function montheme_options($name, $default = false) {
    $options = ( get_option( 'montheme_options' ) ) ? get_option( 'montheme_options' ) : null;
    // return the option if it exists
    if ( isset( $options[ $name ] ) ) {
        return apply_filters( 'montheme_options_$name', $options[ $name ] );
    }
    // return default if nothing else
    return apply_filters( 'montheme_options_$name', $default );
}


?>