<?php

class KeyshotShopifyMultipass {
	//const API_HOST = 'rest.akismet.com';
  //
  private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	/**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;
    /*
		add_action( 'wp_insert_comment', array( 'Akismet', 'auto_check_update_meta' ), 10, 2 );
		add_filter( 'preprocess_comment', array( 'Akismet', 'auto_check_comment' ), 1 );
		add_action( 'akismet_scheduled_delete', array( 'Akismet', 'delete_old_comments' ) );
     */
  }

	/**
	 * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
	 * @static
	 */
	public static function plugin_activation() {
    return true;
	}

	/**
	 * Removes all connection options
	 * @static
	 */
	public static function plugin_deactivation( ) {
    return true;
	}


	public static function view( $name, array $args = array() ) {
		//$args = apply_filters( 'akismet_view_arguments', $args, $name );
		
		foreach ( $args AS $key => $val ) {
			$$key = $val;
		}
		
		$file = KSM__PLUGIN_DIR . 'views/'. $name . '.php';

		include( $file );
	}

	public static function get_api_secret() {
		return get_option('keyshot_shopify_multipass_api_secret');
	}

	public static function set_api_secret($api_secret) {
    return update_option( 'keyshot_shopify_multipass_api_secret', $api_secret );
	}

	public static function get_api_domain() {
		return get_option('keyshot_shopify_multipass_customer_domain');
	}

	public static function set_api_domain($domain) {
		return update_option('keyshot_shopify_multipass_customer_domain', $domain);
	}

	public static function get_recaptcha_client_key() {
		return get_option('keyshot_shopify_multipass_recaptcha_key');
	}

	public static function set_recaptcha_client_key($key) {
    return update_option( 'keyshot_shopify_multipass_recaptcha_key', $key );
	}
}

