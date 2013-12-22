<?php
/**
Template Name: login
 */
get_header(); ?>

<div class="container">


<?php $user = wp_get_current_user(); ?>

<!-- ログイン後 -->
<?php if (is_user_logged_in()): ?>
<p>すでにログイン済みです。</p>
<a href="/" target="_parent">トップに戻る</a>
<!-- ログイン後ここまで -->

<!-- ログイン前 -->
<?php else : ?>
<h1 class="ttl-m">Twitterでログイン</h1>
<?php do_action('oa_social_login'); ?>
<h1 class="ttl-m">メールアドレスでログイン</h1>
<a class="btn btn-success btn-block btn-lg" href="/wp-login.php">メールアドレスでログイン</a>
<?php endif;?>
<!-- ログイン前 ここまで-->

</div> <!-- /container -->

<?php get_footer(); ?>