<?php

/*-------------------------------------------------------------------------------------------------
Add Class to Body
------------------------------------------------------------------------------------------------- */

// Add specific CSS class by filter.

add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'layout__body' ) );
} );

/*-------------------------------------------------------------------------------------------------
Remove About Us
------------------------------------------------------------------------------------------------- */

function change_toolbar($wp_toolbar) {
	$wp_toolbar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'change_toolbar', 999);

/*-------------------------------------------------------------------------------------------------
  Remove Categories and Tags from default WP Posts
------------------------------------------------------------------------------------------------- */

function myprefix_remove_tax() {
    register_taxonomy('post_tag', array());
    register_taxonomy('post_format', array());
}
add_action('init', 'myprefix_remove_tax');

/*-------------------------------------------------------------------------------
GUTENBERG ADMIN SCRIPTS
-------------------------------------------------------------------------------*/

// add_action( 'admin_enqueue_scripts', 'mscfp_admin_style' );
// function mscfp_admin_style( $hook ) {
// 	   wp_enqueue_style( 'admin-gutenberg-style', get_stylesheet_directory_uri().'/dist/build/css/gutenberg.css' );
// }

/*-------------------------------------------------------------------------------
Gutenberg Colour Pallet
-------------------------------------------------------------------------------*/

// -- Disable Colors
add_theme_support( 'editor-color-palette', array() );
add_theme_support( 'disable-custom-colors' );


/*-------------------------------------------------------------------------------------------------
SHOW ADMIN FOR EDITOR
------------------------------------------------------------------------------------------------- */

if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

/*-------------------------------------------------------------------------------------------------
REPLACE EXCERPT
------------------------------------------------------------------------------------------------- */

function new_excerpt_more($more) {
	   global $post;
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*-------------------------------------------------------------------------------------------------
SETUP THEME
------------------------------------------------------------------------------------------------- */

add_action('after_setup_theme', 'custom_setup');


if (! function_exists('custom_setup')){

	function custom_setup() {

		global $wp_version, $wpdb;

		// Add styles for the visual editor
		add_editor_style();

		// Add default posts and comments RSS feed links to <head>.
		add_theme_support('automatic-feed-links');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu('primary', __('Primary Menu', 'custom'));
		register_nav_menu('mobile', __('Mobile Menu', 'custom'));
		register_nav_menu('footer', __('Footer Menu', 'custom'));
		register_nav_menu('social', __('Social Menu', 'custom'));

		// Add support for Featured Images
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(250, 250, true);
		add_image_size('banner', 1920, 456, true); // Banner Image
		add_image_size('featured', 500, 350, true); // Featured Image
		add_image_size('small-featured', 400, 260, true); // Featured Image
		add_image_size('logo', 300, 300, false); // Featured Image
		add_image_size('featured-portrait', 350, 500, true); // Featured Image

		// Disable default gallery css styles
		add_filter( 'use_default_gallery_style', '__return_false' );

		if (!is_admin()){
			add_action('wp_enqueue_scripts', 'custom_load_js');
		}
	}
}

/*-------------------------------------------------------------------------------------------------
IS BLOG PAGE
------------------------------------------------------------------------------------------------- */
function is_blog () {
	global $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post') ) ? true : false ;
}

/*-------------------------------------------------------------------------------------------------
LOAD STYLES
------------------------------------------------------------------------------------------------- */

function custom_styles(){
    wp_enqueue_style( 'adobe_typekit', 'https://use.typekit.net/dkb3oud.css' );
    wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
    wp_enqueue_style( 'main_css', get_stylesheet_directory_uri() . '/dist/build/css/main.css' );
    wp_enqueue_style( 'ie_css', get_stylesheet_directory_uri() . '/dist/build/css/ie.css' );
}

add_action( 'wp_enqueue_scripts', 'custom_styles' );

/*-------------------------------------------------------------------------------------------------
LOAD JS
------------------------------------------------------------------------------------------------- */

function custom_load_js(){
	// Enqueue Javascript
	if(!is_admin()) {
    wp_enqueue_script( 'polyfill_js', 'https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise,fetch,Symbol,Array.prototype.@@iterator,Element.prototype.classList,Object.values,Object.entries,IntersectionObserver', '', '', true );
    wp_enqueue_script( 'vendor_js', get_template_directory_uri() . '/dist/build/js/vendor.js', '', '', true );
    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/dist/build/js/app.js', array('vendor_js'), '', true );
	}
}

/*-------------------------------------------------------------------------------------------------
SIDEBARS
------------------------------------------------------------------------------------------------- */

function custom_register_sidebar() {

	register_sidebar(array(
		'name' => __('Sidebar', 'custom'),
		'id' => 'sidebar',
		'before_widget' => '<li class="sidebar-widgets__item"><div class="sidebar-widget sidebar-widget-%1$s sidebar-widget-%2$s">',
		'after_widget' => "</div></li>",
		'before_title' => '<h3 class="sidebar-widget__title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('Header', 'custom'),
		'id' => 'header',
		'before_widget' => '<div class="header-widgets__item"><aside class="header-widget header-widget-%1$s header-widget-%2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="header-widget__title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('After Content', 'custom'),
		'id' => 'after-content',
		'before_widget' => '<div class="widgets__item"><aside class="widget widget-%1$s widget-%2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="widget__title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('Footer', 'custom'),
		'id' => 'footer',
		'before_widget' => '<div class="footer-widgets__item footer-widgets__item-%1$s footer-widgets__item-%2$s"><aside class="footer-widget footer-widget-%1$s footer-widget-%2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="footer-widget__title">',
		'after_title' => '</h3>'
	));
}

add_action('widgets_init', 'custom_register_sidebar');



/*-------------------------------------------------------------------------------------------------
EXCERPTS LENGTH & ADD
------------------------------------------------------------------------------------------------- */

function custom_get_the_excerpt($length=100, $end=' ...') {
	$out = get_the_excerpt();
	if (strlen($out) > $length)
		$out = substr($out, 0, $length).$end;

	return $out;
}

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	 add_post_type_support( 'page', 'excerpt' );
}

/*-------------------------------------------------------------------------------------------------
EXCERPT STRIP
------------------------------------------------------------------------------------------------- */

function excerpt_strip_tags( $content ) {
	return strip_tags($content);
}
add_filter( 'the_excerpt', 'excerpt_strip_tags' );

/*-------------------------------------------------------------------------------
ADD SUB PAGES
-------------------------------------------------------------------------------*/

// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );

// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
	$root_id = 0;
	// find the current menu item
	foreach ( $sorted_menu_items as $menu_item ) {
	  if ( $menu_item->current ) {
		// set the root id based on whether the current menu item has a parent or not
	  $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
	  break;
	}
  }
  // find the top level parent
  if ( ! isset( $args->direct_parent ) ) {
	$prev_root_id = $root_id;
	while ( $prev_root_id != 0 ) {
	  foreach ( $sorted_menu_items as $menu_item ) {
		if ( $menu_item->ID == $prev_root_id ) {
		  $prev_root_id = $menu_item->menu_item_parent;
		  // don't set the root_id to 0 if we've reached the top of the menu
		  if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
			break;
		  }
		}
	  }
	}
	$menu_item_parents = array();
	foreach ( $sorted_menu_items as $key => $item ) {
	  // init menu_item_parents
	  if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

	  if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
	  // part of sub-tree: keep!
		$menu_item_parents[] = $item->ID;
	  } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
	  // not part of sub-tree: away with it!
	  unset( $sorted_menu_items[$key] );
	}
  }
return $sorted_menu_items;
} else {
  return $sorted_menu_items;
}
}

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

/*-------------------------------------------------------------------------------
Save template part to variable
-------------------------------------------------------------------------------*/

function load_template_part($template_name, $part_name=null) {
  ob_start();
  get_template_part($template_name, $part_name);
  $var = ob_get_contents();
  ob_end_clean();
  return $var;
}

/*-------------------------------------------------------------------------------
Add social icons to footer nav
-------------------------------------------------------------------------------*/

add_filter( 'wp_nav_menu_items', 'footer_social_icons', 10, 2 );

function footer_social_icons( $items, $args ) {
  if ($args->theme_location == 'footer') {
    $instagram_url = get_theme_mod( 'instagram_url' );

    $facebook_url = get_theme_mod( 'facebook_url' );
    $facebook_icon = load_template_part('template-parts/icons/icon', 'facebook');

    $twitter_url = get_theme_mod( 'twitter_url' );
    $twitter_icon = load_template_part('template-parts/icons/icon', 'twitter');


    $items .=
      '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
        <a>Get In Touch</a>
        <ul class="sub-menu">
          <li class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="/contact-us/" title="Contact Us">Contact Us</a>
          </li>
          <li class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="/newsletter/" title="Newsletter">Newsletter</a>
          </li>';
      if ($instagram_url) {
        $items .= '
          <li class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="' . $instagram_url . '" title="Instagram" target="_blank">Instagram</a>
          </li>';
      }
      if ($facebook_url || $twitter_url) {
        $items .= '
          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item--social-icons">';
          if ($facebook_url) {
            $items .= '
              <a class="social-icon social-icon---facebook" href="' . $facebook_url . '" title="Facebook" target="_blank">Facebook' . $facebook_icon . '</a>';
          }
          if ($twitter_url) {
            $items .= '
              <a class="social-icon social-icon---twitter" href="' . $twitter_url . '" title="Twitter" target="_blank">Twitter' . $twitter_icon . '</a>';
          }
        $items .= '</li>';
      }
    $items .= '
        </ul>
      </li>';
  }
  return $items;
}

/*-------------------------------------------------------------------------------
Add logo to footer nav
-------------------------------------------------------------------------------*/

// Footer
add_filter( 'wp_nav_menu_items', 'footer_logo', 10, 2 );

function footer_logo( $items, $args ) {
  if ($args->theme_location == 'footer') {
    $logo = load_template_part('template-parts/global/logo');
    $items .= '<li class="menu-item menu-item--logo"><a class="nav-footer__logo" href="' . get_site_url() . '" title="' . get_bloginfo('name') . '">' . $logo . '</a></li>';
  }
  return $items;
}

/*-------------------------------------------------------------------------------
Remove Archive Labels
-------------------------------------------------------------------------------*/

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
/**
 * Remove archive labels.
 *
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

/*-------------------------------------------------------------------------------
	Disable gutenberg for FAQ post types
-------------------------------------------------------------------------------*/

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'faq') return false;
    return $current_status;
}

/*-------------------------------------------------------------------------------
	Add wrapper around header menu UL
-------------------------------------------------------------------------------*/

class submenuWrap extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<div class='nav-header__submenu'><ul class='sub-menu'>\n";
  }
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }
}

/*-------------------------------------------------------------------------------
	Remove P tags from Contact Form 7
-------------------------------------------------------------------------------*/

add_filter('wpcf7_autop_or_not', '__return_false');

/*-------------------------------------------------------------------------------
	Pagination Bar
-------------------------------------------------------------------------------*/

function pagination_bar() {
  global $wp_query;

  $total_pages = $wp_query->max_num_pages;

  if ($total_pages > 1){
    $current_page = max(1, get_query_var('paged'));

		echo '<div class="pagination__bar">';
			echo '<div class="pagination__nav">';

        global $template;
        // structure of "format" depends on whether we're using pretty permalinks
        basename( $template ) === 'search.php' ? $format = '&paged=%#%' : $format = 'page/%#%/';

  		  echo paginate_links(array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => $format,
          'current' => $current_page,
          'total' => $total_pages,
          'prev_next' => True,
          'prev_text' => __('<div class="pagination__number">&laquo;</div>'),
          'next_text' => __('<div class="pagination__number">&raquo;</div>'),
          'before_page_number' => '<div class="pagination__number">',
          'after_page_number' => '</div>'
  	    ));

			echo '</div>';
		echo '</div>';
  }
}

/*-------------------------------------------------------------------------------------------------
CREATE ACF META IN REST
------------------------------------------------------------------------------------------------- */

// function create_ACF_meta_in_REST() {
//   $postypes_to_exclude = ['acf-field-group','acf-field'];
//   $extra_postypes_to_include = ["page"];
//   $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);
//
//   array_push($post_types, $extra_postypes_to_include);
//
//   foreach ($post_types as $post_type) {
//     register_rest_field( $post_type, 'ACF', [
//       'get_callback'    => 'expose_ACF_fields',
//       'schema'          => null,
//     ] );
//   }
// }
//
// function expose_ACF_fields( $object ) {
//   $ID = $object['id'];
//   return get_fields($ID);
// }
//
// add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );

/*-------------------------------------------------------------------------------------------------
IMPORT CUSTOMIZER SETTINGS
------------------------------------------------------------------------------------------------- */
require_once( 'customizer-settings.php' );

/*-------------------------------------------------------------------------------------------------
Custom Rest API Settings
------------------------------------------------------------------------------------------------- */
// require_once( 'rest-api-settings.php' );
