<?php
/*
Plugin Name: User profile
Plugin URI: http://d.hatena.ne.jp/fuyumi3/
Description: ユーザー情報
Author: Kakuta + Duong
Version: 0.1
Author URI: http://d.hatena.ne.jp/fuyumi3/
*/

function up_display_controller() {
 // global $selected_user = htmlspecialchars($_GET["name"]);
  global $selected_user;
  if(!is_null($_GET["usr"])) {
    up_display_userinfo($_GET["usr"]);
  } else {
    up_display_userinfo(1);
  }
}

//登録済みの処理
function up_display_userinfo($usr) {
  //echo("Parameter: " + $_GET["user"]);
  global $wpdb;
  $terms = $wpdb->terms;
  $sql = "SELECT tag_id, name, slug, parent_id FROM tags
           INNER JOIN {$terms}
           ON wp_term_id = term_id;";
  $tags = $wpdb->get_results($sql);

  /*
  $display_tags = Array();
  $display_slug = Array();
  foreach($tags as $tag) {
    $display_tags[$tag->tag_id] = $tag->name;
    $display_slug[$tag->tag_id] = $tag->slug;
    $display_parent[$tag->tag_id] = $tag->parent_id;
  }
  */
  /*
   $display_parent = Array();
  foreach($terms as $term) {
    $display_parent[$term->parent];
  }
  */

   //get parents information from $parents table
  $display_parent_tmp = Array();

  $sql2 = "SELECT parent_id, wp_term_id FROM parents;";
  $parents = $wpdb->get_results($sql2);
  foreach($parents as $parent) {
    $display_parent_tmp[$parent->parent_id] = $parent->wp_term_id ;
  }

  $display_tags = Array();
  $display_slug = Array();
  $display_parent = Array();
  foreach($tags as $tag) {
    $display_tags[$tag->tag_id] = $tag->name;
    $display_slug[$tag->tag_id] = $tag->slug;
    $display_parent[$tag->tag_id] = $display_parent_tmp[$tag->parent_id];
  }
  
  // 年齢
  $ages = get_ages();
  // 職業
  $jobs = get_jobs();
  // 4人組制度
  $groups = get_groups();
  
  //ユーザの情報を取得 
  if(is_numeric($usr)) {
    $selected_user = get_user_by( 'id', $usr );  //if parameter is id
  } else {
    $selected_user = get_user_by( 'login', $usr ); //if parameter is user_login
  }

  global $errors;
  
  $registered_tags = get_user_meta($selected_user->ID, 'tag');
  asort($registered_tags);
  ?>
      <div class="container registered">
      <h1 class="lead">ユーザー情報</h1>
 
      <div class="text-center">
      	<span class="prof-ph img-circle"><span><?php up_show_avatar($selected_user->ID);?></span></span>
		<p><b><?php echo $selected_user->nickname;?></b> さん</p>
	  </div>
       
      <h2>職業</h2>
      <p><?php echo $jobs[get_user_meta($selected_user->ID, 'job', true)]; ?></p>
      <h2>グループランチへの参加</h2>
      <p><a href="/quartet/" target="_blank">グループランチとは</a><?php echo $groups[get_user_meta($selected_user->ID, 'group', true)]; ?></p> 
      <h2>興味のあるジャンル</h2>
  <?php
    echo '<p>';
    foreach($registered_tags as $tag) {
      echo '<a class="label label-tag'.$display_parent[$tag].'" href="/tagtype/'.esc_html($display_slug[$tag]).'" target="_top">'.$display_tags[$tag].'</a>';
    }
    echo '</p>';
  echo' <p>その他:'.get_user_meta($selected_user->ID, 'tag_other', true).'</p>';
  ?>
      <h2>自己紹介</h2>
        <p><?php echo get_user_meta($selected_user->ID, 'description', true); ?></p>
      <h2>登録したタグをシェア</h2>
      <p>興味のあるジャンルを共有しましょう！<br />
	  
<?php
  $tweet_tags = Array();
  foreach ($registered_tags as $tags) {
    $tweet_tags[] = $display_tags[$tags];
  }
  
  $over5 = NULL;
  if (count($tweet_tags) > 5) {
    $over5 = "など";
  }

  $text_tags = join('、', array_slice($tweet_tags, 0, 5));
  $text = ".@".$selected_user->nickname." さんが興味のあるジャンルは、".$text_tags.$over5."です";
?>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.cross-party.com/" data-text="<?php echo $text ?>" data-lang="ja" data-size="large" data-count="none" data-hashtags=" CROSS2013">Tweet</a>
<script>
<!--
  !function(d,s,id) {
    var js
    var fjs = d.getElementsByTagName(s)[0];
    if(!d.getElementById(id)) {
      js = d.createElement(s);
      js.id = id;
      js.src="https://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js,fjs);
    }
  }(document,"script","twitter-wjs");
//-->
</script>
</p>

</div>
<?php
}

function user_profile_activate() {
}


function up_show_avatar($user_id) {
  //check if twitter or not
  if (get_user_meta($user_id, 'oa_social_login_user_thumbnail', true)) {
    //check if show twitter avatar
    if ( get_user_meta($user_id, 'avatarType', true)) {
       echo '<p class="ph"><img src="'. get_user_meta($user_id, 'oa_social_login_user_thumbnail', true). '"></p>';
    } else {
       echo get_simple_local_avatar($user_id);
    }
  }
  else {
      echo get_simple_local_avatar($user_id);
  } 
}


function up_get_ages() {
  return array(1 => "20代未満",
               2 => "20代",
               3 => "30代",
               4 => "40代",
               5 => "50代",
               6 => "60代以上");
}
function up_get_jobs() {
  return array(1 => "選択してください",
               2 => "Webエンジニア",
               3 => "SIエンジニア",
               4 => "基幹エンジニア",
               5 => "UIエンジニア",
               6 => "デザイナー",
               7 => "マークアップエンジニア",
               8 => "IT運用・オペレータ",
               9 => "営業",
               10 => "人事",
               11 => "その他");
}
function up_get_groups() {
  return array(1 => "選択してください",
               2 => "はい",
               3 => "いいえ");
}


register_activation_hook (__FILE__, 'user_profile_activate');
//add_action('template_redirect', '_user_profile'); //??