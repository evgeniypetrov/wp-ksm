<div class="no-key config-wrap">
  <!--
  <div class="wrapper">
    <h3> short instruction </h3>
    <h4> enable shopify multipass here </h4>
    <img src="https://docs.shopify.com/assets/images/api/tutorials/multipass-login-1.jpg" />
    <br />
    <h4> take the key </h4>
    <img src="https://docs.shopify.com/assets/images/api/tutorials/multipass-login-2.jpg" />
  </div>
  -->

  <div class="wrapper">
    <h3> Options </h3>
    <form name="" action="<?php echo esc_url( KeyshotShopifyMultipassAdmin::get_page_url() ); ?>" method="post"> 
      <p>
        <label for="shopify_api_secret">
          Shopify Multipass api secret
          <br />
          <input name="shopify_api_secret" type="text" size="50" value="<?php echo esc_attr( KeyshotShopifyMultipass::get_api_secret() ); ?>" class="regular-text" />
        </label>
      </p>

      <p>
        <label for="shopify_api_domain">
          Shopify store domain
          <br />
          <input name="shopify_api_domain" type="text" size="50" value="<?php echo esc_attr( KeyshotShopifyMultipass::get_api_domain() ); ?>" class="regular-text" />
        </label>
      </p>

      <div>
        <label for="recaptcha_client_key">
          Recaptcha client side validation pass
          <br />
        </label>
        
        <input name="recaptcha_client_key" type="text" size="50" value="<?php echo KeyshotShopifyMultipass::get_recaptcha_client_key() ?>" class="regular-text" />
      </div>

      <br />

      <input type="submit" class="button button-primary" value="Update options"/>
    </form>
  </div>
</div>
