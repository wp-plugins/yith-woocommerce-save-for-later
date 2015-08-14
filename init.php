<?php
/**
 * Plugin Name: YITH WooCommerce Save for Later
 * Plugin URI: http://yithemes.com/themes/plugins/yith-woocommerce-save-for-later/
 * Description: YITH WooCommerce Save for Later allows you to add your product in save-list.
 * Version: 1.0.1
 * Author: Yithemes
 * Author URI: http://yithemes.com/
 * Text Domain: ywsfl
 * Domain Path: /languages/
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Save for Later
 * @version 1.0.1
 */

/*  Copyright 2013  Your Inspiration Themes  (email : plugins@yithemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( ! function_exists( 'WC' ) ) {
    function ywsfl_free_install_woocommerce_admin_notice() {
        ?>
        <div class="error">
            <p><?php _e( 'YITH WooCommerce Save For Later is enabled but not effective. It requires WooCommerce in order to work.', 'ywsfl' ); ?></p>
        </div>
    <?php
    }

    add_action( 'admin_notices', 'ywsfl_free_install_woocommerce_admin_notice' );
    return;
}

if ( defined( 'YWCSFL_PREMIUM' ) ) {
    function yith_ywcsfl_install_free_admin_notice() {
        ?>
        <div class="error">
            <p><?php _e( 'You can\'t activate the free version of YITH WooCommerce Save For Later while you are using the premium one.', 'ywcds' ); ?></p>
        </div>
    <?php
    }

    add_action( 'admin_notices', 'yith_ywcsfl_install_free_admin_notice' );

    deactivate_plugins( plugin_basename( __FILE__ ) );
    return;
}


if ( ! function_exists( 'yith_plugin_registration_hook' ) ) {
    require_once 'plugin-fw/yit-plugin-registration-hook.php';
}
register_activation_hook( __FILE__, 'yith_plugin_registration_hook' );

load_plugin_textdomain( 'ywsfl', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


if ( !defined( 'YWSFL_VERSION' ) ) {
    define( 'YWSFL_VERSION', '1.0.1' );
}

if ( !defined( 'YWSFL_FREE_INIT' ) ) {
    define( 'YWSFL_FREE_INIT', plugin_basename( __FILE__ ) );
}

if ( !defined( 'YWSFL_FILE' ) ) {
    define( 'YWSFL_FILE', __FILE__ );
}

if ( !defined( 'YWSFL_DIR' ) ) {
    define( 'YWSFL_DIR', plugin_dir_path( __FILE__ ) );
}

if ( !defined( 'YWSFL_URL' ) ) {
    define( 'YWSFL_URL', plugins_url( '/', __FILE__ ) );
}

if ( !defined( 'YWSFL_ASSETS_URL' ) ) {
    define( 'YWSFL_ASSETS_URL', YWSFL_URL . 'assets/' );
}

if ( !defined( 'YWSFL_ASSETS_PATH' ) ) {
    define( 'YWSFL_ASSETS_PATH', YWSFL_DIR . 'assets/' );
}

if ( !defined( 'YWSFL_TEMPLATE_PATH' ) ) {
    define( 'YWSFL_TEMPLATE_PATH', YWSFL_DIR . 'templates/' );
}

if ( !defined( 'YWSFL_INC' ) ) {
    define( 'YWSFL_INC', YWSFL_DIR . 'includes/' );
}

if( !defined('YWSFL_SLUG' ) ){
    define( 'YWSFL_SLUG', 'yith-woocommerce-save-for-later' );
}


if (! function_exists( 'YITH_Woocommerce_Save_For_Later' ) ){
     function YITH_Woocommerce_Save_For_Later() {


         require_once( YWSFL_INC . 'functions.yith-wsfl.php');
         require_once( YWSFL_INC . 'class.yith-wsfl-install.php' );
         require_once( YWSFL_INC . 'class.yith-wsfl.php' );
         require_once( YWSFL_INC . 'class.yith-wsfl-shortcode.php');

         if( defined(' YWSFL_PREMIUM' ) && file_exists( YWCSFL_INC . 'class.yith-wsfl-premium.php' ) ){
             require_once( YWSFL_INC . 'class.yith-wsfl-premium.php' );
             return YITH_WC_Save_For_Later_Premium::get_instance();
         }
         return YITH_WC_Save_For_Later::get_instance();
    }

}
YITH_Woocommerce_Save_For_Later();
