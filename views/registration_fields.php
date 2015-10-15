<!--
<p>  
  <label for="password">
    Choose Password
    <br />
    <input type="password" class="" tabindex="4" size="30" id="password" name="password" />
  </label>
</p> 

<p>
  <label for="password_confirmation">
    Verify Password
    <br />
    <input type="password" class="" size="30" id="password_confirmation" name="password_confirmation"/ >
  </label>
</p>
-->

<p>
  <div class="g-recaptcha" data-sitekey="<?php echo KeyshotShopifyMultipass::get_recaptcha_client_key() ?>"></div>
</p>
