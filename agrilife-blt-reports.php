<?php
/**
 * Plugin Name: AgriLife BLT Reports
 * Plugin URI: https://github.com/AgriLife/AgriLife-BLT-Reports
 * Description: BLT functionality for Texas A&M AgriLife sites
 * Version: 1.0
 * Author: Zachary K. Watkins
 * License: GPL2+
 */

require 'vendor/autoload.php';

define( 'AG_BLT_DIRNAME', 'agrilife-BLT' );
define( 'AG_BLT_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AG_BLT_DIR_FILE', __FILE__ );
define( 'AG_BLT_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AG_BLT_TEMPLATE_PATH', AG_BLT_DIR_PATH . 'templates' );

// Register plugin activation functions
$activate = new \AgriLife\BLT\Activate;
register_activation_hook( __FILE__, array( $activate, 'run') );

// Register plugin deactivation functions
$deactivate = new \AgriLife\BLT\Deactivate;
register_deactivation_hook( __FILE__, array( $deactivate, 'run' ) );

// Register page template
$template = new \AgriLife\BLT\PageTemplate();
$template->with_path( AG_BLT_TEMPLATE_PATH )->with_file( 'reports' )->with_name( 'Reports' );
$template->register();

// Load up the plugin
add_action( 'init', function(){

  // flush_rewrite_rules();
  $monthly = new \AgriLife\BLT\PostType_Monthly;
  $monthly_templates = new \AgriLife\BLT\Templates_Monthly_Reports;

  $quarterly = new \AgriLife\BLT\PostType_Quarterly;
  $quarterly_templates = new \AgriLife\BLT\Templates_Quarterly_Reports;

  $eddoc = new \AgriLife\BLT\PostType_EducatorDocs;
  $eddoc_templates = new \AgriLife\BLT\Templates_EducatorDocs;
  $eddoc_taxonomies = new \AgriLife\BLT\Taxonomy_DocumentType;
  $eddoc_shortcode = new \AgriLife\BLT\Shortcode_EducatorDocs;

  $newsletter = new \AgriLife\BLT\PostType_Newsletter;
  $newsletter_templates = new \AgriLife\BLT\Templates_Newsletters;
  $newsletter_taxonomies = new \AgriLife\BLT\Taxonomy_Language;
  $newsletter_shortcode = new \AgriLife\BLT\Shortcode_Newsletters;

} );

// Register custom fields
add_action( 'plugins_loaded', function() {
  if ( class_exists( 'acf' ) ) {
    require_once(AG_BLT_DIR_PATH . '/fields/pdf_field.php');
    require_once(AG_BLT_DIR_PATH . '/fields/document_field.php');
    require_once(AG_BLT_DIR_PATH . '/fields/newsletter_field.php');
  }
}, 15);

// Prevent plugin installation if ACF is not active
add_action( 'admin_init', function(){
    if ( !class_exists( 'acf' ) ) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( 'The AgriLife BLT plugin requires Advanced Custom Fields 5, which is not active on this site. Deactivating plugin. <br><a href="' . str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']) . '">Return to Plugins page.</a>' );
    }
});

// Add custom admin styles
function blt_acf_admin_head() {
	?>
	<style type="text/css">

		#report-file > .acf-label { display: none };

	</style>
	<?php
}

add_action('acf/input/admin_head', 'blt_acf_admin_head');

function blt_acf_hide_genesis_fields($fields, $parent) {

  if($fields[0]['name'] == 'file'){

  	?>
		<style type="text/css">
			#genesis_inpost_seo_box, #genesis_inpost_layout_box, #genesis_inpost_scripts_box {
				display: none;
			}
		</style>
  	<?php

  }

  return $fields;

}

add_filter('acf/get_fields', 'blt_acf_hide_genesis_fields', 20, 2);

function blt_include_template_function( $template_path ) {

  if ( get_post_type() == 'monthly-reports' ) {

    if ( is_single() ) {

      $template_path = AG_BLT_TEMPLATE_PATH . '/single-monthlyreport.php';

    }

  } else if ( get_post_type() == 'quarterly-reports' ) {

    if ( is_single() ) {

      $template_path = AG_BLT_TEMPLATE_PATH . '/single-quarterlyreport.php';

    }

  } else if ( get_post_type() == 'educator-documents' ) {

    if ( is_single() ) {

      $template_path = AG_BLT_TEMPLATE_PATH . '/single-educatordoc.php';

    }

  }

  return $template_path;
}

add_filter( 'template_include', 'blt_include_template_function', 1 );

function toolset_fix_custom_posts_per_page( $query_string ){
    if( is_admin() || ! is_array( $query_string ) )
        return $query_string;

    $post_types_to_fix = array(
        array(
            'post_type' => 'monthly-reports',
            'posts_per_page' => 12
        ),
        array(
            'post_type' => 'quarterly-reports',
            'posts_per_page' => 12
        ),

    );

    foreach( $post_types_to_fix as $fix ) {
        if( array_key_exists( 'post_type', $query_string )
            && $query_string['post_type'] == $fix['post_type']
        ) {
            $query_string['posts_per_page'] = $fix['posts_per_page'];
            return $query_string;
        }
    }

    return $query_string;
}

add_filter( 'request', 'toolset_fix_custom_posts_per_page' );
