<?php
function statistics_block_customizer_settings($wp_customize) {
  // Add Statistics Block Section
  $wp_customize->add_section( 'statistics_block', array (
  'title' => 'Statistics Block',
  'description' => 'Address and Statistics Block',
  'priority' => 100
  ) );

    // Add Countries Count Setting & Control
    $wp_customize->add_setting('statistics_block_countries_count',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'statistics_block_countries_count',
    array(
    'label' => 'Countries Operated In',
    'type' => 'number',
    'section' => 'statistics_block',
    'settings' => 'statistics_block_countries_count'
    ) ) );

    // Add Years of Operation Setting & Control
    $wp_customize->add_setting('statistics_block_years_count',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'statistics_block_years_count',
    array(
    'label' => 'Years of Operation',
    'type' => 'number',
    'section' => 'statistics_block',
    'settings' => 'statistics_block_years_count'
    ) ) );

}
add_action('customize_register', 'statistics_block_customizer_settings');
