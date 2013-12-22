<?php

/*-----------------------------------------------------------------------------------*/
/* ツールバーを非表示にします。
/*-----------------------------------------------------------------------------------*/
add_filter( 'show_admin_bar', '__return_false' );

/*-----------------------------------------------------------------------------------*/
/* 管理画面の不要な入力項目を削除します。
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* 管理画面の不要なメニューを削除します。
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* フッターのメッセージを変更します。
/*-----------------------------------------------------------------------------------*/
function custom_admin_footer() {
    echo get_bloginfo('name');
}
add_filter('admin_footer_text', 'custom_admin_footer');



/*-----------------------------------------------------------------------------------*/
/* アイキャッチ画象
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'custom-header' );

/*-----------------------------------------------------------------------------------*/
/* デバッグ用関数
/*-----------------------------------------------------------------------------------*/
function vd($data) {
	echo "<pre>\n";
	var_dump($data);
	echo "\n</pre>\n";
}

/*-----------------------------------------------------------------------------------*/
/* 画象ファイルからsrcのパスのみ取得します。
/*-----------------------------------------------------------------------------------*/
function thumb_src($attachment_id, $size = 'thumbnail', $icon = false) {
	$image = wp_get_attachment_image_src($attachment_id, $size, $icon);
	if ( $image ) {
		list($src, $width, $height) = $image;
	}
	return $src;
}

/*-----------------------------------------------------------------------------------*/
/* Public Post Preview 
/*-----------------------------------------------------------------------------------*/
function my_nonce_life() {
    return 60 * 60 * 24 * 8;    // 8 日間（秒×分×時間×日）
}

/*-----------------------------------------------------------------------------------*/
/* ログイン画面に独自CSSを適応
/*-----------------------------------------------------------------------------------*/
function login_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo("template_directory").'/css/bootstrap.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo("template_directory").'/style.css">';
}
add_action('login_head', 'login_css');

/* カスタム投稿タイプの追加 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'news', /* post-type */
		array(
			'labels' => array(
			'name' => __( 'news' ),
			'singular_name' => __( 'news' )
		),
		'public' => true,
		'menu_position' =>5
    	)
	);
	register_post_type( 'sponsors', /* post-type */
		array(
			'labels' => array(
			'name' => __( 'sponsors' ),
			'singular_name' => __( 'sponsors' )
		),
		'public' => true,
		'menu_position' =>5
    	)
	);
	register_post_type( 'programs', /* post-type */
		array(
			'labels' => array(
			'name' => __( 'programs' ),
			'singular_name' => __( 'programs' )
		),
		'public' => true,
		'menu_position' =>5
    	)
	);
	register_post_type( 'communities', /* post-type */
		array(
			'labels' => array(
			'name' => __( 'communities' ),
			'singular_name' => __( 'communities' )
		),
		'public' => true,
		'menu_position' =>5
    	)
	);
}

/* カスタムタクソノミーの追加 */
add_action('init','create_tag_ct',0);
function create_tag_ct(){
	register_taxonomy(
		'tagtype',
		array('sponsors','programs','communities'),
		array(
			'hierarchical' => true,
			'label' => 'タグ',
			'query_var' => true,
			'rewrite' => true
		)
	);
}