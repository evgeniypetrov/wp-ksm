<?php if ('login' === $action) {  ?>

  <div id="login-register-separator">Or</div>
  <div id="login-register">
    <h2>&nbsp;</h2>
    <br />
    <a class="cta-button inverse" href="<?php echo esc_url( wp_registration_url() ) ?>">Register</a>
  </div>


<?php } else { ?>

    <div id="login-register-separator">Or</div>
    <div id="login-register">
      <h2>&nbsp;</h2>
      <br />
      <a class="cta-button inverse" href="<?php echo esc_url( wp_login_url() ) ?>">Login</a>
    </div>

<?php } ?>

<div class="clearfix" />
