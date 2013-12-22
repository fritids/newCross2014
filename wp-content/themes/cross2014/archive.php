<?php
/**
Template Name: tag archive
 */
get_header(); ?>

<section>
	<div class="container">
		<div class="page-header">
			<h1><?php single_cat_title(); ?></h1>
		</div>
		<p class="lead"><?php single_cat_title(); ?>タグをつけているプログラム、スポンサー、ユーザーの一覧です。</p>

		<?php if (have_posts()) : ?> 
		<div class="row">
			<div class="col-lg-12">
				<h2 id="plutinumsp">スポンサー＆セッション一覧</h2>
			</div>
		</div>		

		<div class="sponsor-page">
			<?php while (have_posts()) : the_post(); ?>
			<!--//コンテンツデータを取得する・ループのPHPコードの開始-->
			<!-- スポンサー -->	
			<div class="meta_value row mrgb30">
				<p class=" col-lg-2"><img class="img-thumbnail" src="<?php the_field( 'sponsor_img',$post->ID); ?>" alt="<?php the_title(); ?>" /></p>
				<div class="txt col-lg-10">
					<h3><?php the_title(); ?></h3>
					<ul class="list-inline">
						<?php if(post_custom('sponsor_url')):?>
						<li><a href="<?php the_field('sponsor_url',$post->ID); ?>" target="_blank">公式サイト</a></li>
						<?php endif;?>
						<?php if(post_custom('sponsor_twitter')):?>
						<li>｜&emsp;<a href="https://twitter.com/<?php the_field('sponsor_twitter',$post->ID); ?>" target="_blank">公式Twitter</a></li>
						<?php endif;?>
						<?php if(post_custom('sponsor_fb')):?>
						<li>｜&emsp;<a href="http://www.facebook.com/<?php the_field('sponsor_fb',$post->ID); ?>" target="_blank">facebook</a></li>
						<?php endif;?>
					</ul>
	
					<p><?php the_field('sponsor_dtl',$post->ID); ?></p>
					<?php 
					if ( $terms = get_the_terms($post->ID, 'tagtype') ) {
						echo '<p>';
						foreach ( $terms as $term ) {
							echo '<a class="label '.'label-'.'tag'.$term->parent.'" href="/tagtype/'.esc_html($term->slug).'">' . esc_html($term->name) . '</a>';
						}
						echo '</p>';
					}
					?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>

		<!-- ユーザー一覧 -->
		<div class="user_by_tag">
				<?php
					global $wpdb;
					$tagName = $wp_query->query['tagtype'];
	
					// ページに紐づくタグのIDを取得
					$sql = "SELECT tag_id, wp_term_id FROM tags
							INNER JOIN {$wpdb->terms}
							ON wp_term_id = {$wpdb->terms}.term_id
							WHERE slug = '{$tagName}';";
					$row = $wpdb->get_row($sql);
					$tag_id = $row->tag_id;
	
					// タグに紐づくユーザーのIDとサムネイルとリンク先
					// $sql = "SELECT user_id, meta_key, meta_value FROM {$wpdb->usermeta}
					// 		WHERE meta_key IN ('oa_social_login_user_thumbnail',  'oa_social_login_identity_id')
					// 		AND user_id IN (
					// 		  SELECT user_id FROM {$wpdb->usermeta}
					// 		  WHERE meta_key = 'tag' AND meta_value = {$tag_id}
					// 		);";
					// タグに紐づくユーザーのIDとサムネイルとリンク先

					$sql = "SELECT user_id FROM {$wpdb->usermeta}
							WHERE user_id IN (
							  SELECT user_id FROM {$wpdb->usermeta}
							  WHERE meta_key = 'tag' AND meta_value = {$tag_id}
							);";
	
					$results = $wpdb->get_results($sql);
					$users = array();
	
					foreach ($results as $result) {
					  //if (array_key_exists($result->user_id, $users)) {
					  if (array_key_exists("user_id", $result)) {
						$users[$result->user_id]["user_id"] = $result->user_id;  //edit by Duong, to pass userid with result
						//$users[$result->user_id][$result->meta_key] = $result->meta_value;
					  //} else {
					  //	$users[$result->user_id] = array($result->meta_key => $result->meta_value);
					  }
					}
					$url = get_site_url();

					
					echo "<h2>{$tagName}を選択しているユーザー</h2><p class=\"row\">";
					//var_dump($users);
					if (is_null($users)) {
                        echo "</p><p class=\"no-usr\">このタグを選択しているユーザーはいません</p>";	
					} else {
					    foreach ($users as $user) {
							//get avatar by user id
							if (get_user_meta($user['user_id'], 'oa_social_login_user_thumbnail', true)) {
						      //check if show twitter avatar
						      if ( get_user_meta($user['user_id'], 'avatarType', true)) {
						        //echo '<p class="ph"><img src="'. get_user_meta($user['user_id'], 'oa_social_login_user_thumbnail', true). '"></p>';
						        //$user['oa_social_login_user_thumbnail'] = get_user_meta($user['user_id'], 'oa_social_login_user_thumbnail', true);
						      	echo "<span><a class=\"fancybox fancybox.iframe\" href=\" {$url}/user_profile/?usr={$user['user_id']} \"></a>
						           <img class=\"img-circle\" src='". get_user_meta($user['user_id'], 'oa_social_login_user_thumbnail', true) ."'></span>";
						      } else {
						         echo get_simple_local_avatar($user['user_id']);
						      }
						    }
						    else {
						        echo get_simple_local_avatar($user['user_id']);
						    }	
						  //echo "<span class=\"col-lg-1 mrgb20\"><a class=\"fancybox fancybox.iframe\" href=\" {$url}/user_profile/?usr={$user['user_id']} \">
						  //<img class=\"img-circle\" src=\"{$user['oa_social_login_user_thumbnail']}\"></a></span>";
					    }
						echo "</p><p class=\"no-usr\">このタグを選択しているユーザーはいません</p>";		
					}
					


				?>
				
		</div>
	</div>
</section>


<?php get_footer(); ?>
