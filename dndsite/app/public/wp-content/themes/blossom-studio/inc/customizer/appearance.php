<?php
/**
 * Appearance Settings
 *
 * @package Blossom_Studio
 */

function blossom_studio_customize_register_appearance( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'blossom-studio' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'blossom-studio' ),
        ) 
    );

    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'blossom-studio' ),
            'priority' => 15,
            'panel'    => 'appearance_settings',
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font',
        array(
            'default'           => 'Esteban',
            'sanitize_callback' => 'blossom_studio_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Studio_Select_Control(
            $wp_customize,
            'primary_font',
            array(
                'label'       => __( 'Primary Font', 'blossom-studio' ),
                'description' => __( 'Primary font of the site.', 'blossom-studio' ),
                'section'     => 'typography_settings',
                'choices'     => blossom_studio_get_all_fonts(),  
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font',
        array(
            'default'           => 'DM Serif Text',
            'sanitize_callback' => 'blossom_studio_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Studio_Select_Control(
            $wp_customize,
            'secondary_font',
            array(
                'label'       => __( 'Secondary Font', 'blossom-studio' ),
                'description' => __( 'Secondary font of the site.', 'blossom-studio' ),
                'section'     => 'typography_settings',
                'choices'     => blossom_studio_get_all_fonts(),  
            )
        )
    );
    
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 20,
            'sanitize_callback' => 'blossom_studio_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Studio_Slider_Control( 
            $wp_customize,
            'font_size',
            array(
                'section'     => 'typography_settings',
                'label'       => __( 'Font Size', 'blossom-studio' ),
                'description' => __( 'Change the font size of your site.', 'blossom-studio' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                )                 
            )
        )
    );
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel              = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority           = 5;
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 10;
  
}
add_action( 'customize_register', 'blossom_studio_customize_register_appearance' );