<?php
/**
 * @package Landing Pages by Plugin
 * @version 1.1.9
 */
/*
Plugin Name: Landing Pages by Webfor
Plugin URI: https://webfor.com/
Description: Create fast landing pages for marketing campaigns with minimal setup required.  NOTE: Cannot be installed on site running ACF Free standalone plugin.
Author: Webfor
Version: 1.1.9
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


/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function clone_lp_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'clone_lp_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_clone_lp_as_draft', 'clone_lp_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=clone_lp_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

// Move Yoast to bottom
add_filter('wpseo_metabox_prio', function() {
    return 'low'; // 'high', 'default', 'low';
});
// Move TSF to bottom
add_filter('the_seo_framework_metabox_priority', function() {
    return 'low'; // 'high', 'default', 'low';
});