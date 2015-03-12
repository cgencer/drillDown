<?php
/**
 * drillDown
 *
 * WP plugin for endless drilldown menus with nested sets on database
 *
 * @package   drillDown
 * @author    Cem Gencer <cem.gencer@me.com>
 * @license   GPL-2.0+
 * @link      https://github.com/cgencer/drillDown
 * @copyright 2014 Cem Gencer
 *
 * @wordpress-plugin
 * Plugin Name:       drillDown
 * Plugin URI:        https://github.com/cgencer/drillDown
 * Description:       WP plugin for endless drilldown menus with nested sets on database
 * Version:           0.0.1
 * Author:            Cem Gencer
 * Author URI:        http://www.linkedin.com/in/cemgencer
 * Text Domain:       drilldown
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/cgencer/drillDown
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-drilldown.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'drillDown', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'drillDown', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'drillDown', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-drilldown-admin.php' );
	add_action( 'plugins_loaded', array( 'drillDown_Admin', 'get_instance' ) );

}
