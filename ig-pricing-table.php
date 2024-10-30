<?php
/**
 * Plugin Name:IG Pricing Table
 * Plugin URI: http://www.iograficathemes.com/downloads/ig-pricing-table
 * Description: A responsive and simple way to present your offer to your visitors.
 * Version: 1.3
 * Author: iografica
 * Author URI: http://www.iograficathemes.com/
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
 // Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/* Variables */
$ig_pricing_table_name = "IG Pricing Table";
//start class
if ( ! class_exists( 'IG_Pricing_Table' ) ) {
    class IG_Pricing_Table {
        public function __construct() {
        add_action('wp_enqueue_scripts', array( $this, 'ig_pricing_table_scripts' ));
        add_action('admin_enqueue_scripts', array( $this, 'ig_pricing_table_admin_enqueue' ));
        /* Includes */
        include ('includes/ig-pricing-table-settings.php');
        include ('includes/ig-pricing-table-post-type.php');
        include ('includes/ig-pricing-table-function.php');
        include ('extra/ig-pricing-table-shortcodes.php');
        include ('welcome/welcome-screen.php');
}
// Add testimonials scripts file
public function ig_pricing_table_scripts() {
        wp_enqueue_style('ig-pricing-table', plugins_url( 'css/ig-pricing-table.css', __FILE__ ) );
}
//Add admin css
public function ig_pricing_table_admin_enqueue($hook) {
    global $ig_pricing_table_welcome_page;
    if ( $hook != $ig_pricing_table_welcome_page ) {
        return;
    }
    wp_enqueue_style( 'ig-pricing-table-admin', plugins_url( 'welcome/css/welcome.css', __FILE__ ) );
}
        
        }//end class
    $igpricingtable = new IG_Pricing_Table();
}//end if class exists

//Load plugin textdomain
function ig_pricing_table_load_textdomain() {
    load_plugin_textdomain( 'ig-pricing-table', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'ig_pricing_table_load_textdomain' );

// Get plugin name and version
function ig_pricing_table_version() {
    $plugin_data = get_plugin_data( __FILE__ );
    $plugin_version = $plugin_data['Version'];
    return $plugin_version;
}
function ig_pricing_table_name() {
    $plugin_data = get_plugin_data( __FILE__ );
    $plugin_name = $plugin_data['Name'];
    return $plugin_name;
}