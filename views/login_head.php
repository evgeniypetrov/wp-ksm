<?php get_header() ?>

<div class="secondary-menu">
  <div class="container">
    <div class="col-sm-3">
      <ol class="breadcrumbs">
        <li class="item-home">
          <a title="Blog" href="/blog" class="bread-link bread-home">Blog</a>
        </li>
        <li class="item-cat item-cat-33 item-cat-keyshot-tips">
          <a title="Login" class="bread-cat bread-cat-33 bread-cat-keyshot-tips">
            <?php
              switch($action){
                case 'login' :
                  echo 'Login';
                  break;
                case 'register':
                  echo 'Registration form';
                  break;
                case 'lostpassword':
                  echo 'Lost password';
                  break;
                default:
                  echo $action;
                  break;
              };
            ?>
          </a>
        </li>
      </ol>
    </div>
    <div class="col-sm-9">
      <?php rrssb('email', 'facebook', 'linkedin', 'twitter', 'google', 'pinterest'); ?>
    </div>
  </div>
</div>
