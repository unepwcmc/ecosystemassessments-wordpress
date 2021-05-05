<?php

function hero_customizer_settings($wp_customize) {

  /*-------------------------------------------------------------------------------
  	Default
  -------------------------------------------------------------------------------*/

  // Add Default Hero Section
  $wp_customize->add_section( 'default_hero', array (
  'title' => 'Default Hero Settings',
  'panel' => 'hero_settings',
  'description' => 'For all heroes on the site with no custom configuration',
  'priority' => 100
  ) );

    // Default background image
    $wp_customize->add_setting('default_hero_image');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default_hero_image', array(
      'label' => 'Default Background Image',
      'section' => 'default_hero',
      'settings' => 'default_hero_image'
    ) ) );

    // Default text
    $wp_customize->add_setting('default_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_text',
    array(
    'label' => 'Default Text',
    'type' => 'textarea',
    'section' => 'default_hero',
    'settings' => 'default_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Events
  -------------------------------------------------------------------------------*/

  // Add Events Hero Section
  $wp_customize->add_section( 'events_hero', array (
    'title' => 'Events Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Events listing page',
    'priority' => 100
  ) );

    // Events Hero Title
    $wp_customize->add_setting('events_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_title',
    array(
    'label' => 'Title',
    'section' => 'events_hero',
    'settings' => 'events_hero_title'
    ) ) );

    // Events Hero Background Image
    $wp_customize->add_setting('events_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'events_hero_image', array(
      'label' => 'Background Image',
      'section' => 'events_hero',
      'settings' => 'events_hero_image'
    ) ) );

    // Events Hero Hero Overlay Opacity
    $wp_customize->add_setting('events_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'events_hero',
      'settings' => 'events_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // Events Hero Text
    $wp_customize->add_setting('events_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'events_hero',
    'settings' => 'events_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
    News
  -------------------------------------------------------------------------------*/

  // Add News Hero Section
  $wp_customize->add_section( 'news_hero', array (
    'title' => 'News Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the News listing page',
    'priority' => 100
  ) );

    // News Hero Title
    $wp_customize->add_setting('news_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_title',
    array(
    'label' => 'Title',
    'section' => 'news_hero',
    'settings' => 'news_hero_title'
    ) ) );

    // News Hero Background Image
    $wp_customize->add_setting('news_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'news_hero_image', array(
      'label' => 'Background Image',
      'section' => 'news_hero',
      'settings' => 'news_hero_image'
    ) ) );

    // News Hero Hero Overlay Opacity
    $wp_customize->add_setting('news_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'news_hero',
      'settings' => 'news_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // News Hero Text
    $wp_customize->add_setting('news_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'news_hero',
    'settings' => 'news_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Partners
  -------------------------------------------------------------------------------*/

  // Add Partners Hero Section
  $wp_customize->add_section( 'partners_hero', array (
    'title' => 'Partners Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Partners listing page',
    'priority' => 100
  ) );

    // Partners Hero Title
    $wp_customize->add_setting('partners_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_title',
    array(
    'label' => 'Title',
    'section' => 'partners_hero',
    'settings' => 'partners_hero_title'
    ) ) );

    // Partners Hero Background Image
    $wp_customize->add_setting('partners_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'partners_hero_image', array(
      'label' => 'Background Image',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_image'
    ) ) );

    // Partners Hero Hero Overlay Opacity
    $wp_customize->add_setting('partners_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // Partners Hero Text
    $wp_customize->add_setting('partners_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'partners_hero',
    'settings' => 'partners_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Resources
  -------------------------------------------------------------------------------*/

  // Add Resources Hero Section
  $wp_customize->add_section( 'resources_hero', array (
    'title' => 'Resources Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Resources listing page',
    'priority' => 100
  ) );

    // Resources Hero Title
    $wp_customize->add_setting('resources_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_title',
    array(
    'label' => 'Title',
    'section' => 'resources_hero',
    'settings' => 'resources_hero_title'
    ) ) );

    // Resources Hero Background Image
    $wp_customize->add_setting('resources_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'resources_hero_image', array(
      'label' => 'Background Image',
      'section' => 'resources_hero',
      'settings' => 'resources_hero_image'
    ) ) );

    // Resources Hero Overlay Opacity
    $wp_customize->add_setting('resources_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'resources_hero',
      'settings' => 'resources_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // Resources Hero Text
    $wp_customize->add_setting('resources_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'resources_hero',
    'settings' => 'resources_hero_text'
    ) ) );
}

add_action('customize_register', 'hero_customizer_settings');
