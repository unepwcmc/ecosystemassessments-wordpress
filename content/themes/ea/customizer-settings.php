<?php
/**
 * Customeriser Settings
 *
 * @link https://developer.wordpress.org/themes/customize-api/
 *
 */

/*-------------------------------------------------------------------------------
	Remove Unnecessary Settings
-------------------------------------------------------------------------------*/

function remove_customizer_settings() {
  global $wp_customize;

  $wp_customize->remove_panel( 'themes' ); // Theme change settings
  $wp_customize->get_panel( 'nav_menus' )->active_callback = '__return_false'; // Navigation Menus
  $wp_customize->remove_section( 'widgets' ); // Widgets
  $wp_customize->remove_section( 'static_front_page' ); // Homepage Settings
  $wp_customize->remove_section( 'custom_css' ); // Additional CSS
  $wp_customize->add_panel( 'hero_settings',
    array(
      'title' => __( 'Hero Settings' ),
      'description' => esc_html__( 'Adjust your Hero settings.' ),
      'priority' => 100,
      'capability' => 'edit_theme_options'
    )
  );
}

add_action( 'customize_register', 'remove_customizer_settings', 11 );

/*-------------------------------------------------------------------------------
  Header Button Customiser Settings
-------------------------------------------------------------------------------*/

function header_button_customizer_settings($wp_customize) {
  // Add Header Button Section
  $wp_customize->add_section( 'header_button', array (
  'title' => 'Header Button',
  'description' => 'Settings for the CTA button in the header',
  'priority' => 100
  ) );

  // add a setting to enable the button
  $wp_customize->add_setting('enable_header_button');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_header_button',
  array(
  'label'     => 'Enable Header Button',
  'section'   => 'header_button',
  'settings'  => 'enable_header_button',
  'type'      => 'checkbox'
  ) ) );

  // add a setting for the button URL
  $wp_customize->add_setting('header_button_url');
  // Add a control to input the Button URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_button_url',
  array(
  'label' => 'Button URL',
  'section' => 'header_button',
  'settings' => 'header_button_url'
  ) ) );

  // add a setting for the button text
  $wp_customize->add_setting('header_button_text');
  // Add a control to input the button text
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_button_text',
  array(
  'label' => 'Button Text',
  'section' => 'header_button',
  'settings' => 'header_button_text'
  ) ) );

  // add a setting to make the button link open in a new tab
  $wp_customize->add_setting('header_button_external_link');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_button_external_link',
  array(
  'label'     => 'External Link',
  'section'   => 'header_button',
  'settings'  => 'header_button_external_link',
  'type'      => 'checkbox'
  ) ) );

}
add_action('customize_register', 'header_button_customizer_settings');

/*-------------------------------------------------------------------------------
	Contact Details
-------------------------------------------------------------------------------*/

function contact_details_customizer_settings($wp_customize) {
  // Add Contact Details Section
  $wp_customize->add_section( 'contact_details', array (
  'title' => 'Contact Details',
  'description' => 'Address and Contact Details',
  'priority' => 170
  ) );

    // Add Title Setting & Control
    $wp_customize->add_setting('contact_details_title',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_title',
    array(
    'label' => 'Section Title',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_title'
    ) ) );

    // Add Heading Setting & Control
    $wp_customize->add_setting('contact_details_heading_1',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_heading_1',
    array(
    'label' => 'Heading 1',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_heading_1'
    ) ) );

    // Add Address Setting & Control
    $wp_customize->add_setting('contact_details_address_1',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_address_1',
    array(
    'label' => 'Address 1',
    'type' => 'textarea',
    'section' => 'contact_details',
    'settings' => 'contact_details_address_1'
    ) ) );

    // Add Phone Number Setting & Control
    $wp_customize->add_setting('contact_details_phone_1',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_phone_1',
    array(
    'label' => 'Phone Number 1',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_phone_1'
    ) ) );

    // Add Heading Setting & Control
    $wp_customize->add_setting('contact_details_heading_2',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_heading_2',
    array(
    'label' => 'Heading 2',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_heading_2'
    ) ) );

    // Add Address Setting & Control
    $wp_customize->add_setting('contact_details_address_2',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_address_2',
    array(
    'label' => 'Address 2',
    'type' => 'textarea',
    'section' => 'contact_details',
    'settings' => 'contact_details_address_2'
    ) ) );

    // Add Phone Number Setting & Control
    $wp_customize->add_setting('contact_details_phone_2',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_phone_2',
    array(
    'label' => 'Phone Number 2',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_phone_2'
    ) ) );

    // Add Heading Setting & Control
    $wp_customize->add_setting('contact_details_heading_3',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_heading_3',
    array(
    'label' => 'Heading 3',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_heading_3'
    ) ) );

    // Add Address Setting & Control
    $wp_customize->add_setting('contact_details_address_3',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_address_3',
    array(
    'label' => 'Address 3',
    'type' => 'textarea',
    'section' => 'contact_details',
    'settings' => 'contact_details_address_3'
    ) ) );

    // Add Phone Number Setting & Control
    $wp_customize->add_setting('contact_details_phone_3',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_phone_3',
    array(
    'label' => 'Phone Number 3',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_phone_3'
    ) ) );

}
add_action('customize_register', 'contact_details_customizer_settings');

/*-------------------------------------------------------------------------------
	Blog Posts
-------------------------------------------------------------------------------*/

function blog_posts_customizer_settings($wp_customize) {
  // Add Blog Posts Section
  $wp_customize->add_section( 'blog_posts', array (
  'title' => 'Blog Posts',
  'description' => 'Settings affecting blog posts',
  'priority' => 110
  ) );

    // Add Boilerplate Setting & Control
    $wp_customize->add_setting('blog_posts_boilerplate',
    array(
      'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_posts_boilerplate',
    array(
    'label' => 'Blog Post Boilerplate',
    'type' => 'textarea',
    'section' => 'blog_posts',
    'settings' => 'blog_posts_boilerplate'
    ) ) );
}
add_action('customize_register', 'blog_posts_customizer_settings');

/*-------------------------------------------------------------------------------
	Social Media Links
-------------------------------------------------------------------------------*/

function social_media_customizer_settings($wp_customize) {
  // Add Social Icons Section
  $wp_customize->add_section( 'social_icons', array (
  'title' => 'Social URLs',
  'description' => 'Enter the URL to your account on each social media site',
  'priority' => 120
  ) );

  // add a setting for the site Facebook URL
  $wp_customize->add_setting('facebook_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the Facebook URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url',
  array(
  'label' => 'Facebook',
  'section' => 'social_icons',
  'settings' => 'facebook_url'
  ) ) );

  // add a setting for the site Twitter URL
  $wp_customize->add_setting('twitter_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the Twitter URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url',
  array(
  'label' => 'Twitter',
  'section' => 'social_icons',
  'settings' => 'twitter_url'
  ) ) );

  // add a setting for the site Instagram URL
  $wp_customize->add_setting('instagram_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the Instagram URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_url',
  array(
  'label' => 'Instagram',
  'section' => 'social_icons',
  'settings' => 'instagram_url'
  ) ) );
}
add_action('customize_register', 'social_media_customizer_settings');

/*-------------------------------------------------------------------------------
  Default Hero Customiser Settings
-------------------------------------------------------------------------------*/

function hero_customizer_settings($wp_customize) {

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

      // Default Hero overlay opacity
      $wp_customize->add_setting('default_hero_overlay_opacity');
      // Add a control to input the default overlay opacity
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_overlay_opacity',
      array(
        'label' => 'Default Overlay Opacity',
        'section' => 'default_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'default_hero_overlay_opacity'
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

      // Default button text
      $wp_customize->add_setting('default_hero_button_link');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_button_link',
      array(
      'label' => 'Button Link',
      'type' => 'dropdown-pages',
      'section' => 'default_hero',
      'settings' => 'default_hero_button_link'
      ) ) );

      // Default button url
      $wp_customize->add_setting('default_hero_button_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_button_text',
      array(
      'label' => 'Button Text',
      'section' => 'default_hero',
      'settings' => 'default_hero_button_text'
      ) ) );

  // Add Team Hero Section
  $wp_customize->add_section( 'team_hero', array (
    'title' => 'Team Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Team listing page',
    'priority' => 100
  ) );

      // Team Hero title
      $wp_customize->add_setting('team_hero_title');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'team_hero_title',
      array(
      'label' => 'Title',
      'section' => 'team_hero',
      'settings' => 'team_hero_title'
      ) ) );

      // Team Hero background image
      $wp_customize->add_setting('team_hero_image');
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'team_hero_image', array(
        'label' => 'Background Image',
        'section' => 'team_hero',
        'settings' => 'team_hero_image'
      ) ) );

      // Team Hero Hero overlay opacity
      $wp_customize->add_setting('team_hero_overlay_opacity');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'team_hero_overlay_opacity',
      array(
        'label' => 'Overlay Opacity',
        'section' => 'team_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'team_hero_overlay_opacity'
      ) ) );

      // Team Hero text
      $wp_customize->add_setting('team_hero_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'team_hero_text',
      array(
      'label' => 'Text',
      'type' => 'textarea',
      'section' => 'team_hero',
      'settings' => 'team_hero_text'
      ) ) );

      // Team Hero button url
      $wp_customize->add_setting('team_hero_button_link');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'team_hero_button_link',
      array(
      'label' => 'Button Link',
      'type' => 'dropdown-pages',
      'section' => 'team_hero',
      'settings' => 'team_hero_button_link'
      ) ) );

      // Team Hero button text
      $wp_customize->add_setting('team_hero_button_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'team_hero_button_text',
      array(
      'label' => 'Button Text',
      'section' => 'team_hero',
      'settings' => 'team_hero_button_text'
      ) ) );


  // Add Partners Hero Section
  $wp_customize->add_section( 'partners_hero', array (
    'title' => 'Partners Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Partners listing page',
    'priority' => 100
  ) );

      // Partners Hero title
      $wp_customize->add_setting('partners_hero_title');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_title',
      array(
      'label' => 'Title',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_title'
      ) ) );

      // Partners Hero background image
      $wp_customize->add_setting('partners_hero_image');
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'partners_hero_image', array(
        'label' => 'Background Image',
        'section' => 'partners_hero',
        'settings' => 'partners_hero_image'
      ) ) );

      // Partners Hero Hero overlay opacity
      $wp_customize->add_setting('partners_hero_overlay_opacity');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_overlay_opacity',
      array(
        'label' => 'Overlay Opacity',
        'section' => 'partners_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'partners_hero_overlay_opacity'
      ) ) );

      // Partners Hero text
      $wp_customize->add_setting('partners_hero_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_text',
      array(
      'label' => 'Text',
      'type' => 'textarea',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_text'
      ) ) );

      // Partners Hero button url
      $wp_customize->add_setting('partners_hero_button_link');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_button_link',
      array(
      'label' => 'Button Link',
      'type' => 'dropdown-pages',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_button_link'
      ) ) );

      // Partners Hero button text
      $wp_customize->add_setting('partners_hero_button_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_button_text',
      array(
      'label' => 'Button Text',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_button_text'
      ) ) );

  // Add Resources Hero Section
  $wp_customize->add_section( 'resources_hero', array (
    'title' => 'Resources Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Resources listing page',
    'priority' => 100
  ) );

      // Resources Hero title
      $wp_customize->add_setting('resources_hero_title');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_title',
      array(
      'label' => 'Title',
      'section' => 'resources_hero',
      'settings' => 'resources_hero_title'
      ) ) );

      // Resources Hero background image
      $wp_customize->add_setting('resources_hero_image');
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'resources_hero_image', array(
        'label' => 'Background Image',
        'section' => 'resources_hero',
        'settings' => 'resources_hero_image'
      ) ) );

      // Resources Hero Hero overlay opacity
      $wp_customize->add_setting('resources_hero_overlay_opacity');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_overlay_opacity',
      array(
        'label' => 'Overlay Opacity',
        'section' => 'resources_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'resources_hero_overlay_opacity'
      ) ) );

  // Add Projects Hero Section
  $wp_customize->add_section( 'projects_hero', array (
    'title' => 'Projects Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Projects listing page',
    'priority' => 100
  ) );

      // Projects Hero title
      $wp_customize->add_setting('projects_hero_title');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'projects_hero_title',
      array(
      'label' => 'Title',
      'section' => 'projects_hero',
      'settings' => 'projects_hero_title'
      ) ) );

      // Projects Hero background image
      $wp_customize->add_setting('projects_hero_image');
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'projects_hero_image', array(
        'label' => 'Background Image',
        'section' => 'projects_hero',
        'settings' => 'projects_hero_image'
      ) ) );

      // Projects Hero Hero overlay opacity
      $wp_customize->add_setting('projects_hero_overlay_opacity');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'projects_hero_overlay_opacity',
      array(
        'label' => 'Overlay Opacity',
        'section' => 'projects_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'projects_hero_overlay_opacity'
      ) ) );

      // Projects Hero text
      $wp_customize->add_setting('projects_hero_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'projects_hero_text',
      array(
      'label' => 'Text',
      'type' => 'textarea',
      'section' => 'projects_hero',
      'settings' => 'projects_hero_text'
      ) ) );

      // Projects Hero button url
      $wp_customize->add_setting('projects_hero_button_link');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'projects_hero_button_link',
      array(
      'label' => 'Button Link',
      'type' => 'dropdown-pages',
      'section' => 'projects_hero',
      'settings' => 'projects_hero_button_link'
      ) ) );

      // Projects Hero button text
      $wp_customize->add_setting('projects_hero_button_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'projects_hero_button_text',
      array(
      'label' => 'Button Text',
      'section' => 'projects_hero',
      'settings' => 'projects_hero_button_text'
      ) ) );

  // Add News Hero Section
  $wp_customize->add_section( 'news_hero', array (
    'title' => 'News Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the News listing page',
    'priority' => 100
  ) );

      // News Hero title
      $wp_customize->add_setting('news_hero_title');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_title',
      array(
      'label' => 'Title',
      'section' => 'news_hero',
      'settings' => 'news_hero_title'
      ) ) );

      // News Hero background image
      $wp_customize->add_setting('news_hero_image');
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'news_hero_image', array(
        'label' => 'Background Image',
        'section' => 'news_hero',
        'settings' => 'news_hero_image'
      ) ) );

      // News Hero Hero overlay opacity
      $wp_customize->add_setting('news_hero_overlay_opacity');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_overlay_opacity',
      array(
        'label' => 'Overlay Opacity',
        'section' => 'news_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'news_hero_overlay_opacity'
      ) ) );

      // News Hero text
      $wp_customize->add_setting('news_hero_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_text',
      array(
      'label' => 'Text',
      'type' => 'textarea',
      'section' => 'news_hero',
      'settings' => 'news_hero_text'
      ) ) );

      // News Hero button url
      $wp_customize->add_setting('news_hero_button_link');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_button_link',
      array(
      'label' => 'Button Link',
      'type' => 'dropdown-pages',
      'section' => 'news_hero',
      'settings' => 'news_hero_button_link'
      ) ) );

      // News Hero button text
      $wp_customize->add_setting('news_hero_button_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_button_text',
      array(
      'label' => 'Button Text',
      'section' => 'news_hero',
      'settings' => 'news_hero_button_text'
      ) ) );

  // Add Events Hero Section
  $wp_customize->add_section( 'events_hero', array (
    'title' => 'Events Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Events listing page',
    'priority' => 100
  ) );

      // Events Hero title
      $wp_customize->add_setting('events_hero_title');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_title',
      array(
      'label' => 'Title',
      'section' => 'events_hero',
      'settings' => 'events_hero_title'
      ) ) );

      // Events Hero background image
      $wp_customize->add_setting('events_hero_image');
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'events_hero_image', array(
        'label' => 'Background Image',
        'section' => 'events_hero',
        'settings' => 'events_hero_image'
      ) ) );

      // Events Hero Hero overlay opacity
      $wp_customize->add_setting('events_hero_overlay_opacity');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_overlay_opacity',
      array(
        'label' => 'Overlay Opacity',
        'section' => 'events_hero',
        'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
        'settings' => 'events_hero_overlay_opacity'
      ) ) );

      // Events Hero text
      $wp_customize->add_setting('events_hero_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_text',
      array(
      'label' => 'Text',
      'type' => 'textarea',
      'section' => 'events_hero',
      'settings' => 'events_hero_text'
      ) ) );

      // Events Hero button url
      $wp_customize->add_setting('events_hero_button_link');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_button_link',
      array(
      'label' => 'Button Link',
      'type' => 'dropdown-pages',
      'section' => 'events_hero',
      'settings' => 'events_hero_button_link'
      ) ) );

      // Events Hero button text
      $wp_customize->add_setting('events_hero_button_text');
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_button_text',
      array(
      'label' => 'Button Text',
      'section' => 'events_hero',
      'settings' => 'events_hero_button_text'
      ) ) );
}

add_action('customize_register', 'hero_customizer_settings');

/*-------------------------------------------------------------------------------
  CTA Block Customiser Settings
-------------------------------------------------------------------------------*/

function cta_block_customizer_settings($wp_customize) {
  // Add CTA Section
  $wp_customize->add_section( 'cta_block', array (
  'title' => 'CTA Block Settings',
  'description' => 'Settings for the CTA block',
  'priority' => 100
  ) );

    // Background image
    $wp_customize->add_setting('cta_block_background_image');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_block_background_image', array(
      'label' => 'Background Image',
      'section' => 'cta_block',
      'settings' => 'cta_block_background_image'
    ) ) );

    // Background image opacity
    $wp_customize->add_setting('cta_block_background_image_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_background_image_opacity',
    array(
    'label' => 'Background Image Opacity',
    'description' => 'From 0-1 in 0.1 increments',
    'section' => 'cta_block',
    'settings' => 'cta_block_background_image_opacity'
    ) ) );

    // Background color
    $wp_customize->add_setting('cta_block_background_colour');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_background_colour',
    array(
    'label' => 'Background Colour',
    'type' => 'color',
    'section' => 'cta_block',
    'settings' => 'cta_block_background_colour'
    ) ) );

    // Title
    $wp_customize->add_setting('cta_block_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_title',
    array(
    'label' => 'Title',
    'section' => 'cta_block',
    'settings' => 'cta_block_title'
    ) ) );

    // Text
    $wp_customize->add_setting('cta_block_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'cta_block',
    'settings' => 'cta_block_text'
    ) ) );

    // Button link
    $wp_customize->add_setting('cta_block_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_button_link',
    array(
    'label' => 'Button Link',
    'section' => 'cta_block',
    'settings' => 'cta_block_button_link'
    ) ) );

    // Button external link?
    $wp_customize->add_setting('cta_block_button_link_external');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_button_link_external',
    array(
    'label'     => 'External link',
    'section'   => 'cta_block',
    'settings'  => 'cta_block_button_link_external',
    'type'      => 'checkbox'
    ) ) );

    // Button text
    $wp_customize->add_setting('cta_block_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'cta_block',
    'settings' => 'cta_block_button_text'
    ) ) );

}
add_action('customize_register', 'cta_block_customizer_settings');
