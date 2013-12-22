<header id="mainHdr">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
		<div class="nav-inner">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<h1><a class="navbar-brand" href="/"><img src="/wp-content/themes/cross2014/images/logo.png" width="172" height="26" alt="エンジニアサポートCROSS 2014" /></a></h1>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
					<div class="inner">
						<ul class="nav navbar-nav" id="mainNav">
							<li class="home<?php if ( is_front_page() ) :?> active<?php endif;?>"><a href="/">HOME</a></li>
							<li class="ticket<?php if( is_page("ticket")) :?> active<?php endif;?>"><a href="/ticket/">チケット</a></li>
							<li class="program<?php if( is_page("program")) :?> active<?php endif;?>"><a href="/program/">プログラム</a></li>
							<li class="past<?php if( is_page("past")) :?> active<?php endif;?>"><a href="/past/">過去のイベント</a></li>
							<li class="sponsor<?php if( is_page("sponsor")) :?> active<?php endif;?>"><a href="/sponsor/">スポンサー・スタッフ募集</a></li>
							<li class="staff<?php if( is_page("staff")) :?> active<?php endif;?>"><a href="/staff/">スタッフ募集</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right" id="subNav">
							<li class="social tw"><a href="https://twitter.com/nifty_engineer" target="_blank">エンジニアサポートCROSS Twitterアカウント</a></li>
							<li class="social fb"><a href="https://www.facebook.com/engineersupportCROSS" target="_blank">エンジニアサポートCROSS Facebookページ</a></li>
							<?php $user = wp_get_current_user(); ?>

							<!-- ログイン後 -->
							<?php if (is_user_logged_in()): ?>
							<li class="mypage">
								<a id="usrInfo" class="fancybox fancybox.iframe btn btn-info" href="<?php bloginfo('url'); ?>/login_cross/">マイページ</a>
							</li>
							<!-- ログイン後ここまで -->
							<?php else : ?>
							<!-- ログイン前 -->
							<li class="un-login">
								<a href="/login/" class="fancybox fancybox.iframe btn btn-default">Login</a>
							</li>
							<!-- ログイン前 ここまで-->
							<?php endif;?>
						</ul>
					</div>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</div>
	</nav>
</header>
