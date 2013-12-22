<?php
/**
 * ヘッダー
 * 
 */
?>
<!DOCTYPE HTML>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="imagetoolbar" content="no">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( 'ページ %s', max( $paged, $page ) );

	?></title>
	<meta name="description" content="1,000人のエンジニアとwebの未来を語ろう！ 「エンジニアサポートCROSS 2014」は、WEBテクノロジーに関わる人たちが集まり、WEBの未来を語る勉強会です。">
	<meta name="keywords" content="CROSS,CROSS 2014,クロス,エンジニアサポート,勉強会,web,エンジニア">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:type" content="website">
	<meta property="og:title" content="エンジニアサポートCROSS 2014">
	<meta property="og:url" content="http://www.cross-party.com/">
	<meta property="og:description" content="1,000人のエンジニアとwebの未来を語ろう！ 「エンジニアサポートCROSS 2014」は、WEBテクノロジーに関わる人たちが集まり、WEBの未来を語る勉強会です。">
	<meta property="og:image" content="http://www.cross-party.com/2014/img/ogimg.jpg">
	<meta property="og:locale" content="ja_JP">
	<meta property="fb:admins" content="100002176632876">
	<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/cross2014/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="stylesheet" href="/wp-content/themes/cross2014/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/main.js"></script>
<?php wp_head(); ?>


<?php if( is_page("info")) :?>

<script type="text/javascript"
src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize() {
var myOptions = {
zoom: 17,
center: new google.maps.LatLng(35.696609, 139.69134),
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map_canvas"),
myOptions);

var image = new google.maps.MarkerImage('<?php bloginfo('url'); ?>/images/bellesalle.png', new google.maps.Size(52,50));
var myLatLng = new google.maps.LatLng(35.696236,139.691065);
var beachMarker = new google.maps.Marker({
position: myLatLng,
map: map,
icon: image,
title:"taskmother"
});

}

</script>

<?php endif;?>
</head>

<body id="top" <?php body_class(); ?><?php if( is_page("info")) :?> onload="initialize()"<?php endif;?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=366413006735738";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php get_sidebar();?>