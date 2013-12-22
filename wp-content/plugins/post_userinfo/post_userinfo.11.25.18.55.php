<?php
/*
Plugin Name: Post User Info
Plugin URI: http://d.hatena.ne.jp/fuyumi3/
Description: ユーザー情報を登録
Author: Hisao Soyama
Version: 0.1
Author URI: http://d.hatena.ne.jp/fuyumi3/
*/

function display_controller() {
  if (is_user_logged_in()) {
    global $register_in_progress;
    global $current_user;
    get_currentuserinfo();
    if (!$current_user->age OR $_GET['mode'] == 'edit' OR $register_in_progress) {
      display_form();
    } else {
      if ($register_in_progress === false) {
        $msg = "登録完了しました";
      }
      display_userinfo($msg);
    }
  } else {
    ?>
    <p>サイトのヘッダーから、Twitterアカウントでログインしてください。</p>
  <a href="<?php bloginfo('url'); ?>">トップに戻る</a>
    <?php
  }
}

function display_form() {
  global $wpdb;
  $terms = $wpdb->terms;
  $taxonomy = $wpdb->term_taxonomy;
  $sql = "SELECT tag_id, name, slug, parent_id FROM tags
           INNER JOIN {$terms}
           ON wp_term_id = term_id;";
  $tags = $wpdb->get_results($sql);

  $sql = "SELECT parent_id, name FROM parents
           INNER JOIN {$terms}
           ON wp_term_id = term_id;";
  $parents = $wpdb->get_results($sql);

  $cats = Array();
  $display_tags = Array();
  foreach($parents as $parent) {
    $cats[$parent->parent_id] = $parent->name;
    $display_tags[$parent->parent_id] = Array();
  }

  $display_tags = Array();
  foreach($tags as $tag) {
    $display_tags[$tag->parent_id][] = $tag;
  }
  
  // 年齢
  $ages = get_ages();
  // 職業
  $jobs = get_jobs();
  // 5人組制度
  $groups = get_groups();


  
  //ログインユーザの情報を取得
  global $current_user;
  get_currentuserinfo();
  global $errors;
  ?>
<header class="pkg">
  <p class="ph"><img src="<?php echo get_user_meta($current_user->ID, 'oa_social_login_user_thumbnail', true);?>"></p>
  <p class="headTxt">ようこそ<br><span class="name"><?php echo $current_user->nickname;?></span> さん
</header>
<div id="contents">
<h1>ユーザー情報を登録</h1>

<p>登録した情報は、エンジニアサポートCROSS 2013告知サイト・エンジニアサポートCROSS 2013イベントのみで使用されます。<br><a href="<?php bloginfo('url'); ?>/policy/" target="_blank">個人情報保護ポリシーについて</a></p>

  <?php
    if ($errors) {
      foreach ($errors as $error) {
        echo '<p class="red fontW">'.$error.'</p>';
      }
    }
  ?>
  <form action="<?php the_permalink();?>" method="post" enctype="multipart/form-data">
    <?php wp_nonce_field('post_userinfo'); ?>

  <h2>Nickname</h2>
    <div id="description_form">
      <input type="text" name="nickname" value="<?php echo get_user_meta($current_user->ID, 'nickname', true); ?>"></input>
    </div>

  <h2>Password</h2>
    <div id="description_form">
      <input type="text" name="password" value=""></input>
      <input type="text" name="repassword" value=""></input>
    </div>

  <h2>年齢<em class="red">※必須</em></h2>
    <div id="age_form" class="formSec">
    <?php
    // 年齢
    $registered_age = get_user_meta($current_user->ID, 'age', true);
    foreach ($ages as $num => $age) {
      if ($num == $registered_age) {
        $checked = "checked";
      } else {
        $checked = "";
      }
      $input = "<input type=\"radio\" name=\"age\" id=\"age{$num}\" value={$num} {$checked} />";
      $label = "<label for=\"age{$num}\">{$age}</label>";
      echo $input.$label."\n";
      $num += 1;
    }
    ?>
    </div>
  <h2>職業<em class="red">※必須</em></h2>
    <div id="job_form" class="formSec">
    <?php
      // 職業
      $registered_job = get_user_meta($current_user->ID, 'job', true);
      echo "<select id=\"job1\" name=\"job\" value=1>";
      foreach($jobs as $num => $job) {
        if ($num == $registered_job) {
        $selected = "selected";
      } else {
        $selected = "";
      }
        $label = "<option value=\"{$num}\" {$selected}>{$job}</option>";
        echo $label."\n";
        $num += 1;
      }
    echo "</select>";
    ?>
    </div>
  <h2>4人組制度に参加しますか？<em class="red">※必須</em></h2>
    <div id="group_form" class="formSec">
    <?php
      // 5人組制度
      $registered_group = get_user_meta($current_user->ID, 'group', true);
      echo "<select id=\"group1\" name=\"group\" value=1>";
      foreach($groups as $num => $group) {
        if ($num == $registered_group) {
        $selected = "selected";
      } else {
        $selected = "";
      }
        $label = "<option value=\"{$num}\" {$selected}>{$group}</option>";
        echo $label."\n";
        $num += 1;
      }
    echo "</select>";
    ?>
    </div>
 
  <h2>興味のあるジャンル<em class="red">※必須</em></h2>
  <p>タグをクリックして選択してください。タグは<em>複数選択</em>できます。</p>
    <div id="tag_form" class="formSec">
    <?php
      // タグ
      $registered_tags = get_user_meta($current_user->ID, 'tag');
      foreach($cats as $cat_id => $cat) {
        echo '<div class="pkg"><span class="catName">'."{$cat} ".'：</span><span class="tags">';
        foreach($display_tags[$cat_id] as $tag) {
          if (in_array($tag->tag_id, $registered_tags)) {
            $checked = " checked";
          } else {
            $checked = "";
          }
          $label = "<label for=\"{$tag->slug}\">{$tag->name}</label>";
          $input = "<input id=\"{$tag->slug}\" type=\"checkbox\" name=\"tags[]\" value={$tag->tag_id}{$checked} />";
          echo $input.$label."\n";
        }
        echo "</span></div>";
      }
    ?>

  <p class="fontW">その他
    <input type="search" id="tag_other" name="tag_other" placeholder="IT擬人化,Firefox OS,PDF" value="<?php echo get_user_meta($current_user->ID, 'tag_other',true); ?>"></textarea></p>
  <p class="gray">※複数入力する際は「,」（カンマ）で区切って入力してください。</p>
    </div>
  <h2>自己紹介</h2>
    <div id="description_form">
    <textarea id="prof_dtl" name="description"><?php echo get_user_meta($current_user->ID, 'description', true); ?></textarea>
    </div>
  <input class="btnY"  type="submit" value="登録" />

  <!-- kdjfakjfdkjkajkdfjkajkdfjkajkdjkjkadjkjakfjdkajkfdjkajkfdja;kjka-->
  <?php
    /*
    global $user_ID;
    if ($user_ID) {
      $user_info = get_userdata($user_ID);
      $id = $user_info->ID;
    }
    $myAv = new simple_local_avatars();
    $myAv->edit_user_profile($user_info);
    */
    $myAv = new simple_local_avatars();
    $myAv->edit_user_profile($current_user);    
  ?>

  </form>

  </div>
  <?php
}

function _post_userinfo() {
  if(
    is_user_logged_in()
      &&
    isset($_POST['_wpnonce'])
      &&
    wp_verify_nonce($_POST['_wpnonce'], 'post_userinfo')
  ) {
    //ログインユーザの情報を取得
    global $current_user;
    get_currentuserinfo();
    global $errors;
    $errors = array();
    global $register_in_progress;
    $register_in_progress = true;
    
    //to change password
    if( strcmp($_POST['repassword'] , $_POST['password']) == 0 ) {
      //change password
      if($_POST['password']) {
        wp_update_user(array ( 'ID' => $current_user->ID, 'user_pass' =>  $_POST['password'] ) ) ;
      }


      //Duong add on 2013/11/18
      do_action('edit_user_profile_update', $current_user->ID);


      //To change other profile information
      if ($_POST['age'] && $_POST['job'] != 1 && $_POST['tags']) {
        global $wpdb;
        update_user_meta($current_user->ID, 'age', $_POST['age']);
        update_user_meta($current_user->ID, 'job', $_POST['job']);
        update_user_meta($current_user->ID, 'group', $_POST['group']);

        if (!$_POST['tags']) {
          $_POST['tags'] = array();
        }
        $registered_tags = get_user_meta($current_user->ID, 'tag');
        $add_tags = array_diff($_POST['tags'], $registered_tags);
        $delete_tags = array_diff($registered_tags, $_POST['tags']);
        $nochange_tags = array_diff($registered_tags, $add_tags, $delete_tags);
        
        // usermetaに書き込み
        foreach($delete_tags as $delete_tag) {
          delete_user_meta($current_user->ID, 'tag', $delete_tag);
        }
        foreach($add_tags as $add_tag) {
          add_user_meta($current_user->ID, 'tag', $add_tag);
        }
        update_user_meta($current_user->ID, 'nickname', esc_html($_POST['nickname'])); //Duong added
        //update_user_meta($current_user->ID, 'email', esc_html($_POST['email']));
        update_user_meta($current_user->ID, 'tag_other', esc_html($_POST['tag_other']));
        update_user_meta($current_user->ID, 'description', esc_html($_POST['description']));
        
        // タグリレーション
         $add_relations = array();
        foreach (array_merge($nochange_tags, $add_tags) as $tag1) {
          foreach (array_merge($nochange_tags, $add_tags) as $tag2) {
            if ($tag1 < $tag2) {
              $sql = "UPDATE tag_relations SET count = count + 1
                      WHERE source = {$tag1} AND target = {$tag2};";
              $wpdb->query($sql);
            }
          }
        }
              
        $delete_relations = array();
        foreach (array_merge($nochange_tags, $delete_tags) as $tag1) {
          foreach (array_merge($nochange_tags, $delete_tags) as $tag2) {
            if ($tag1 < $tag2) {
              $sql = "UPDATE tag_relations SET count = count - 1
                      WHERE source = {$tag1} AND target = {$tag2};";
              $wpdb->query($sql);
            }
          }
        }
      
        $register_in_progress = false;

      } else {
        if (!$_POST['age']) {
          $errors[] = "年齢は必須項目です。";
        }
        if ($_POST['job'] == 1) {
          $errors[] = "職業は必須項目です。";
        }
        if (!$_POST['tags']) {
          $errors[] = "タグは最低1つは選択してください。";
        }
      }
    }
    else {
       //var_dump($_POST['password']);
       $errors[] = "Password and repassword must be the same";
    }
    

  }
}

//登録済みの処理
function display_userinfo($msg) {
  global $wpdb;
  $terms = $wpdb->terms;
  $sql = "SELECT tag_id, name, slug FROM tags
           INNER JOIN {$terms}
           ON wp_term_id = term_id;";
  $tags = $wpdb->get_results($sql);

  $display_tags = Array();
  $display_slug = Array();
  foreach($tags as $tag) {
    $display_tags[$tag->tag_id] = $tag->name;
    $display_slug[$tag->tag_id] = $tag->slug;
  }
   $display_parent = Array();
  foreach($terms as $term) {
    $display_parent[$term->parent];
  }

  // 年齢
  $ages = get_ages();
  // 職業
  $jobs = get_jobs();
  // 5人組制度
  $groups = get_groups();
  //画像アップロード
  $post_id = $_POST['post_id'];
  if($_FILES['thumbnail']['size'] > 0)
  {
      $attachment_id = insert_attachment('thumbnail', $post_id);
  }


  //ログインユーザの情報を取得
  global $current_user;
  get_currentuserinfo();
  global $errors;
  
  $registered_tags = get_user_meta($current_user->ID, 'tag');
  asort($registered_tags);
  ?>
<header class="pkg">
  <p class="ph"><img src="<?php echo get_user_meta($current_user->ID, 'oa_social_login_user_thumbnail', true);?>"></p>
  <p class="headTxt">ようこそ<br><span class="name"><?php echo $current_user->nickname;?></span> さん
  <?php if ($msg) {echo "<p>{$msg}</p>";} ?>
</header>
<div id="contents" class="registered">

<h1>ユーザー情報</h1>

<!-- Avatar-->
<h1>

<?php
global $user_ID;
//var_dump($user_ID);
//var_dump($current_user);
//echo get_avatar($user_ID);
echo get_simple_local_avatar($user_ID);
?>
</h1>

<p>登録した情報は、エンジニアサポートCROSS 2013告知サイト・エンジニアサポートCROSS 2013イベントのみで使用されます。<br><a href="<?php bloginfo('url'); ?>/policy/" target="_blank">個人情報保護ポリシーについて</a></p>
<h2>年齢</h2>
<p><?php echo $ages[get_user_meta($current_user->ID, 'age', true)]; ?></p>
<h2>職業</h2>
<p><?php echo $jobs[get_user_meta($current_user->ID, 'job', true)]; ?></p>
<h2>5人組制度に参加しますか？</h2>
<p><?php echo $groups[get_user_meta($current_user->ID, 'group', true)]; ?></p>

<h2>興味のあるジャンル</h2>
  <?php
  echo '<ul class="tags">';
    foreach($registered_tags as $tag) {
        echo '<li class="'.$display_slug[$tag].' tag category'.$display_parent.'"><a href="/tagtype/'.esc_html($display_slug[$tag]).'" target="_top">'.$display_tags[$tag].'</a></li>';
    }
  echo '</ul>';
  echo' <p>その他:'.get_user_meta($current_user->ID, 'tag_other', true).'</p>';
  ?>
<h2>自己紹介</h2>
  <p><?php echo get_user_meta($current_user->ID, 'description', true); ?></p>
  <a class="btnY" href=./?mode=edit>編集する</a>
<h2>登録したタグをシェア</h2>
<p>興味のあるジャンルをTwitterで共有しましょう！<br />
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
  $text = ".@".$current_user->nickname." さんが興味のあるジャンルは、".$text_tags.$over5."です";
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
<a id="logout" class="btn btn-info btn-lg btn-block" href="<?php echo wp_logout_url('/'); ?>" target="_parent">ログアウト</a>
</div>
<?php
}

function userinfo_activate() {
  global $wpdb;
  $db_version = '0.1';
  $installed_db_version = get_option('tag_relations_version');
  $terms = $wpdb->terms;
  $taxonomy = $wpdb->term_taxonomy;

  
  if ($db_version != $installed_db_version) {
    require_once(ABSPATH."wp-admin/includes/upgrade.php");

    $sql = "CREATE TABLE tags (
            tag_id BIGINT PRIMARY KEY AUTO_INCREMENT,
            wp_term_id BIGINT,
            parent_id INT
            );";
    dbDelta($sql);
    
    $sql = "CREATE TABLE parents (
            parent_id INT PRIMARY KEY AUTO_INCREMENT,
            wp_term_id BIGINT
            );";
    dbDelta($sql);
    
    $sql = "CREATE TABLE tag_relations (
            source INT,
            target INT,
            count INT NOT NULL,
            PRIMARY KEY(source, target)
            );";
    dbDelta($sql);

    $sql = "SELECT {$terms}.term_id FROM {$terms}
            INNER JOIN {$taxonomy} ON {$terms}.term_id = {$taxonomy}.term_id
            WHERE taxonomy = 'tagtype'
            AND parent = 0;";
    $results = $wpdb->get_results($sql);

    foreach ($results as $result) {
      $sql = "INSERT INTO parents (wp_term_id) VALUES ({$result->term_id});";
      $wpdb->query($sql);
    }

    $sql = "SELECT {$taxonomy}.term_id, parents.parent_id
            FROM {$taxonomy}
            INNER JOIN parents
            ON {$taxonomy}.parent = parents.wp_term_id
            WHERE taxonomy = 'tagtype'
            AND parent <> 0;";
    $results = $wpdb->get_results($sql);

    foreach ($results as $result) {
      $sql = "INSERT INTO tags (wp_term_id, parent_id)
              VALUES ({$result->term_id}, {$result->parent_id});";
      $wpdb->query($sql);
    }

    $sql = "SELECT tag_id FROM tags;";
    $results = $wpdb->get_results($sql);

    foreach ($results as $result1) {
      foreach ($results as $result2) {
        if ($result1 < $result2) {
          $sql = "INSERT INTO tag_relations
                  VALUES ({$result1->tag_id}, {$result2->tag_id}, 0);";
          $wpdb->query($sql);
        }
      }
    }
    
    update_option('tag_relations_version', $db_version);
  }
}

function get_ages() {
  return array(1 => "20代未満",
               2 => "20代",
               3 => "30代",
               4 => "40代",
               5 => "50代",
               6 => "60代以上");
}
function get_jobs() {
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
function get_groups() {
  return array(1 => "選択してください",
               2 => "はい",
               3 => "いいえ");
}

register_activation_hook (__FILE__, 'userinfo_activate');
add_action('template_redirect', '_post_userinfo');