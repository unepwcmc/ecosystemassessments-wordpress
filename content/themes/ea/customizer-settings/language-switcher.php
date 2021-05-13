<?php
function language_switcher_customizer_settings( $wp_customize ) {
  // Add Language Switcher Section
  $wp_customize->add_section( 'language_switcher', array (
  'title' => 'Language Switcher',
  'description' => 'Settings affecting the WPML language switcher',
  'priority' => 30
  ) );

    // Add a setting to enable the language switcher
    $wp_customize->add_setting( 'enable_language_switcher' );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_language_switcher',
    array(
    'label'     => 'Enable Language Switcher',
    'section'   => 'language_switcher',
    'settings'  => 'enable_language_switcher',
    'type'      => 'checkbox'
    ) ) );
}
add_action( 'customize_register', 'language_switcher_customizer_settings' );
