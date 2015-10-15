<?php

class KeyshotShopifyMultipassLoginPage {
  private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;

    add_action( 'login_enqueue_scripts', array('KeyshotShopifyMultipassLoginPage', 'load_login_styles'), 0);
    add_action( 'login_head', array('KeyshotShopifyMultipassLoginPage', 'load_login_head'), 0);
    add_action( 'login_message', array('KeyshotShopifyMultipassLoginPage', 'update_login_message'), 0);

    add_action( 'login_footer', array('KeyshotShopifyMultipassLoginPage', 'load_login_footer'), 0);

    add_action( 'login_form_register', array('KeyshotShopifyMultipassLoginPage', 'ensure_user_accepted_terms'), 0);
    add_action( 'login_form_register', array('KeyshotShopifyMultipassLoginPage', 'load_recapcha_scripts'), 0);
    add_action( 'register_form', array('KeyshotShopifyMultipassLoginPage', 'add_additional_register_fields'), 0);

    add_action( 'wp_login', array('KeyshotShopifyMultipassLoginPage', 'login_on_shopify'), 10, 2);
  }

	public static function load_login_styles() {
    KeyshotShopifyMultipass::view('login_styles', array( 'arg1' => 'key1' ));

  }

	public static function load_login_head() {
    global $action;
    KeyshotShopifyMultipass::view('login_head', array( 'action' => $action ));
  }

	public static function load_login_footer() {
    global $action;
    KeyshotShopifyMultipass::view('login_footer', array( 'action' => $action ));
  }

  public static function add_additional_register_fields() {
    global $action;
    if ('register' != $action) {
      exit();
    }
    KeyshotShopifyMultipass::view('registration_fields', array( ));
  }

  public static function load_recapcha_scripts() {
    echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
  }

	public static function update_login_message() {
    global $action;
    switch ($action) {
    case 'login' :
      echo '<h2> Login </h2>';
      break;

    case 'register' :
      echo '<h2> Register </h2>';
      break;

    default :
      //echo '<h2>' . $action . '</h2>';
      break;
    }
  }

  // before filters with breaking changes is lesser evil
  //
  public static function ensure_user_accepted_terms() {
    if ( isset( $_COOKIE['user-accepted-terms'] )) {
      return;
    } elseif ( isset($_POST) && isset($_POST['terms-acceptance']) ) {
      setcookie('user-accepted-terms', 'yes', time()+3600*24*10, COOKIEPATH, COOKIE_DOMAIN, false);
      wp_redirect( wp_registration_url() );
      exit();

    } else {
      KeyshotShopifyMultipassLoginPage::load_login_head();
      KeyshotShopifyMultipass::view('terms', array( ));
      exit();
    };
  }

  // multipass logic
  public static function login_on_shopify($user_login, $user){
    $multipass_url = self::shopify_multipass_url($user_login, $user);
    if ($multipass_url) {
      wp_redirect($multipass_url);
      exit();
    } else {
      wp_redirect(get_site_url());
      exit();
    };
  }

  private static function shopify_multipass_url($user_login, $user){
    $customer_data = array(
      'email'      => $user -> user_email,
      'tag_string' => 'blog_member',
      'return_to'  => get_site_url()
    );

    $multipass = new ShopifyMultipass( KeyshotShopifyMultipass::get_api_secret());
    $token = $multipass->generate_token($customer_data);
    return 'https://' . KeyshotShopifyMultipass::get_api_domain() . '/account/login/multipass/' . $token;
  }
}
