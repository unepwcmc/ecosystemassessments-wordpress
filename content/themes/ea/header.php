<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" dir="ltr" class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?><?php echo get_bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php
    wp_head();
    global $post;
    $body_class = 'page';

    if ($post) {
      $body_class = $body_class . ' page-' . $post->post_name;
    }
  ?>
</head>

<body <?php body_class($body_class); ?>>
  <div id="v-app">
    <!-- Drawers -->
    <div class="drw-Drawers">
      <drawers-overlay></drawers-overlay>
      <drawer name="menu">
        <add-class-on-click
          class="drw-Drawer_Content"
          class-name="open"
          element=".menu-item-has-children"
        >
          <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
        </add-class-on-click>
      </drawer>
    </div>
    <!-- Header -->
    <header class="lyt-Header">
      <main-header>

        <div class="hd-Header_Items">
          <div class="hd-Header_Item hd-Header_Item--logo">
            <!-- Site Name & Logo  -->
            <h1 class="hd-Header_Title"><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></h1>
            <a class="hd-Header_Logo" href="/" title="<?php echo get_bloginfo('name'); ?>">
              <span class="utl-ScreenReaderOnly"><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></span>
              <?php get_template_part( 'template-parts/global/logo' ); ?>
            </a>
          </div>
          <div class="hd-Header_Item hd-Header_Item--nav">
            <!-- Main Navigation -->
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
              <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            <?php endif; ?>
          </div>
          <div class="hd-Header_Item hd-Header_Item--tools">
            <div class="hd-Tools">
              <div class="hd-Tools_Items">
                <div class="hd-Tools_Item hd-Tools_Item-search">
                  <header-search form-action="<?php echo esc_url( home_url( '/' ) ); ?>" />
                </div>
                <?php
                  if (get_theme_mod( 'enable_header_button' )):
                    $external_header_link = get_theme_mod( 'header_button_external_link' );
                ?>
                  <div class="hd-Tools_Item hd-Tools_Item--cta">
                    <a href="<?php echo get_theme_mod( 'header_button_url' ); ?>" class="hd-Tools_Button<?php if ($external_header_link) echo ' hd-Tools_Button--external'; ?>" <?php if ($external_header_link) echo 'target="_blank"' ?> title="<?php echo get_theme_mod( 'header_button_text' ); ?>">
                      <?php echo get_theme_mod( 'header_button_text' ); ?><?php if ($external_header_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
                    </a>
                  </div>
                <?php endif; ?>
                <div class="hd-Tools_Item hd-Tools_Item--menuToggle">
                  <drawer-trigger
                    class="hd-Tools_NavToggle"
                    controls="navigation"
                    drawer="menu"
                    label="Menu Toggle"
                  >
                    <?php get_template_part( 'template-parts/icons/icon', 'menu' ); ?>
                  </drawer-trigger>
                </div>
              </div>
            </div>
          </div>

        </div>

      </main-header>
    </header>

    <main class="lyt-Main" role="main">
