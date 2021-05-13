<?php
function footer_customizer_settings( $wp_customize ) {
  // Add Footer Section
  $wp_customize->add_section( 'footer', array (
  'title' => 'Footer',
  'description' => 'Settings affecting the footer',
  'priority' => 200
  ) );

    // Enable Footer Tagline
    $wp_customize->add_setting( 'enable_footer_tagline' );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_footer_tagline',
    array(
    'label'     => 'Enable Footer Tagline',
    'section'   => 'footer',
    'settings'  => 'enable_footer_tagline',
    'type'      => 'checkbox'
    ) ) );

    // Footer Tagline
    $wp_customize->add_setting('footer_tagline');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_tagline',
    array(
    'label' => 'Footer Tagline',
    'type' => 'textarea',
    'section' => 'footer',
    'settings' => 'footer_tagline'
    ) ) );
}
add_action( 'customize_register', 'footer_customizer_settings' );
