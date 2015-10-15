<?php

class KeyshotShopifyMultipassAdmin {
  private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}

    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
      self::update_settings();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;
		add_action( 'admin_menu', array( 'KeyshotShopifyMultipassAdmin', 'admin_menu' ), 0 );
  }

  private static function update_settings(){
    if (isset( $_POST['shopify_api_secret'] )) {
      KeyshotShopifyMultipass::set_api_secret($_POST['shopify_api_secret'] );
    };
    if (isset( $_POST['shopify_api_domain'] )) {
      KeyshotShopifyMultipass::set_api_domain($_POST['shopify_api_domain'] );
    };
    if (isset( $_POST['recaptcha_client_key'] )) {
      KeyshotShopifyMultipass::set_recaptcha_client_key($_POST['recaptcha_client_key'] );
    };
  }

	public static function admin_menu() {
    $hook = add_options_page(
      __('Shopify Multipass', 'KeyshotShopifyMultipass'),
      __('Shopify Multipass', 'KeyshotShopifyMultipass'), 
      'manage_options',
      'keyshot-shopify-multipass-config',
      array( 'KeyshotShopifyMultipassAdmin', 'display_page' )
    );
  }

	public static function get_page_url( $page = 'config' ) {
		$args = array( 'page' => 'keyshot-shopify-multipass-config' );

    $url = add_query_arg( $args, admin_url( 'options-general.php' ) );

		return $url;
  }

	public static function display_page() {
    KeyshotShopifyMultipass::view('admin_page', array( 'arg1' => 'key1' ));
  }
}
