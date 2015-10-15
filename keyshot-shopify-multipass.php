<?php
/*
  @package Keyshot Shopify Multipass
  Plugin Name: Keyshot Shopify Multipass
  Plugin URI: http://example.com/
  Description: login & registration & sync with shopify multipass
  Version: 0.0.0.1
 */

if ( !function_exists( 'add_action' ) ) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
  exit;
}

define( 'KSM__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__,   array( 'KeyshotShopifyMultipass', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'KeyshotShopifyMultipass', 'plugin_deactivation' ) );

require_once( KSM__PLUGIN_DIR . 'class.ksm.php' );
require_once( KSM__PLUGIN_DIR . 'class.ksm-login-page.php' );
require_once( KSM__PLUGIN_DIR . 'class.shopify_multipass.php' );

add_action( 'init', array( 'KeyshotShopifyMultipass', 'init' ) );
add_action( 'init', array( 'KeyshotShopifyMultipassLoginPage', 'init' ) );

if ( is_admin() ) {
	require_once( KSM__PLUGIN_DIR . 'class.ksm-admin.php' );
	add_action( 'init', array( 'KeyshotShopifyMultipassAdmin', 'init' ) );
}

// other things
//require_once( KSM__PLUGIN_DIR . 'wrapper.php' );
