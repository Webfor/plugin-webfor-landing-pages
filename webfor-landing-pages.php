<?php
/**
 * @package Landing Pages by Plugin
 * @version 1.1.0
 */
/*
Plugin Name: Landing Pages by Webfor
Plugin URI: https://webfor.com/
Description: Create fast landing pages for marketing campaigns with minimal setup required.  NOTE: Cannot be installed on site running ACF Free standalone plugin.
Author: Webfor
Version: 1.1.0
Author URI: https://webfor.com/
*/

define('PLUGIN_PARTIALS_PATH', 'includes/partials');
define('PLUGIN_STYLES_PATH', 'includes/css');
define('PLUGIN_SCRIPTS_PATH', 'includes/js');

if(!class_exists("LandingPages"))
{
    /**
     * class:   LandingPages
     * desc:    plugin class to allow reports be pulled from multipe GA accounts
     */
    class LandingPages
    {
        /**
         * Created an instance of the LandingPages class
         */
        public function __construct()
        {
            if ( !function_exists( 'acf_add_options_page' ) ) {
                // Include the plugin bundled ACF, otherwise use the site installed version.

                // Set up ACF
                add_filter('acf/settings/path', function() {
                    return sprintf("%s/includes/acf/", dirname(__FILE__));
                });
                add_filter('acf/settings/dir', function() {
                    return sprintf("%s/includes/acf/", plugin_dir_url(__FILE__));
                });
                require_once(sprintf("%s/includes/acf/acf.php", dirname(__FILE__)));

            }

            // Settings managed via ACF
            require_once(sprintf("%s/includes/settings.php", dirname(__FILE__)));
            $settings = new LandingPages_Settings(plugin_basename(__FILE__));

            // CPT for landing-page post type
            require_once(sprintf("%s/includes/landing-page.php", dirname(__FILE__)));
            $landingpageposttype = new LandingPages_LandingPagePostType();
        } // END public function __construct()

        /**
         * Hook into the WordPress activate hook
         */
        public static function activate()
        {
            // Do something
        }

        /**
         * Hook into the WordPress deactivate hook
         */
        public static function deactivate()
        {
            // Do something
        }
    } // END class LandingPages
} // END if(!class_exists("LandingPages"))


if(class_exists('LandingPages'))
{    
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('LandingPages', 'activate'));
    register_deactivation_hook(__FILE__, array('LandingPages', 'deactivate'));
    
    // instantiate the plugin class
    $plugin = new LandingPages();
} // END if(class_exists('LandingPages'))

/* Filter the single_template with our custom function*/
add_filter('single_template', 'wflp_template');

function wflp_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'landing-page' ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . '/single-landing-page.php' ) ) {
            return plugin_dir_path( __FILE__ ) . '/single-landing-page.php';
        }
    }

    return $single;

}

function posttype_admin_css() {
    global $post_type;
    $post_types = array(
        /* set post types */
        'landing-page',
        'post',
        'page',
    );
    if(in_array($post_type, $post_types))
    echo '<style type="text/css">#post-preview, #view-post-btn{display: none;}</style>';
}
add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
add_action( 'admin_head-post.php', 'posttype_admin_css' );

require plugin_dir_path( __FILE__ ) . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Webfor/webfor-landing-pages',
	__FILE__, //Full path to the main plugin file or functions.php.
	'webfor-landing-pages'
);
//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');
//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name'); 