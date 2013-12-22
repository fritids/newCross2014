<?php
/**
 * index.php
 *
 */
get_header(); ?>

	<!-- Jumbotron -->
	<header id="overview">
		<div class="jumbotron text-center"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="エンジニアサポートCROSS 2014" /></div>
	</header>

	<div class="container">
		<ul class="social">
			<li>
				<div class="fb-like" data-href="http://www.cross-party.com/" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
			</li>
			<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.cross-party.com/" data-lang="ja" data-hashtags="cross2014">ツイート</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
			<li> 
				<!-- +1 ボタン を表示したい位置に次のタグを貼り付けてください。 -->
				<div class="g-plusone" data-size="medium" data-href="http://www.cross-party.com/"></div>
				
				<!-- 最後の +1 ボタン タグの後に次のタグを貼り付けてください。 --> 
				<script type="text/javascript">
				  window.___gcfg = {lang: 'ja'};
				
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script> 
			</li>
		</ul>
		<div class="well">
			<h1 class="ttl">NEWS</h1>
			<p style="background:#fff; margin-top: 6px; padding: 5px 3px 1px;"><span class="label label-warning">HOT</span><a href="/quartet/" style="vertical-align: middle;">グループランチ制度を導入しました。詳細はこちらから。</a></p>
			<ul class="list-unstyled">
				<?php
				/* news */
				$loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 3 ) );
				while ( $loop->have_posts() ) : $loop->the_post();
				?>
				
				<li>
					<?php the_date(); ?>&nbsp;<a href="<?php the_field('news_link',$post->ID); ?>"><?php remove_filter ('the_content', 'wpautop'); ?><?php the_content(); ?></a>
					
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
	
	<section id="whatis">
		<div class="container">
			<div class="page-header">
				<h1>エンジニアサポートCROSSについて</h1>
			</div>
			<p class="lead"><strong>「エンジニアサポートCROSS 2014」</strong>は、Webテクノロジーに関わる人たちが集まり、<br>
				Web技術について横断的に、過去・現在・未来について縦断的に語り合うイベントです。</p>
			<div class="row">
				<div class="col-lg-6">
					<h2>CROSSとは</h2>
					<p>Webテクノロジーに関わる人たちが「CROSS(クロス・交流)」することによって、「技術」「年代」「個人・企業」の間で多くのコミュニケーションの機会を創出し、Webテクノロジーに関わる人たちが今日より少しでも広く深い見識を得る場を提供することを願って「エンジニアサポートCROSS 2014」を開催いたします。</p>
				</div>
				<div class="col-lg-6">
					<h2>エンジニアサポートCROSS 2014について</h2>
					<p>2012年から始まり、来年で第3回となる「エンジニアサポートCROSS 2014」では、従来の「技術・年代・個人/企業がCROSSすること」だけでなく、交流を通し「自分の技術・知見・人脈をすすめ、よりパフォーマンスが高い人材へと変わる」機会の提供をテーマと据えました。</p>
					<p>本イベントでは<strong>「クロスでススム、クロスで変わる」</strong>を実現する企画を実施します。</p>
				</div>
			</div>
			<div class="row well">
				<div class="col-lg-6">
					<h3 class="mrgb20">開催日時</h3>
					<p>2014年1月17日（金）</p>
					<dl class="dl-horizontal">
						<dt>【第1部】セミナーセッション</dt><dd>：<br />[開場]11:30 [開始]11:15 [終了]17:30 </dd>
						<dt>【第2部】コミュニケートセッション</dt><dd>： <br />[開場]17:30 [開始]17:45 [終了]19:30</dd>
					</dl>
				</div>
				<div class="col-lg-6">
					<h3 class="mrgb20">会場・アクセス</h3>
					<p><a target="_blank" href="http://www.bellesalle.co.jp/bs_shinjukugrand/">ベルサール新宿グランド</a><br />東京都新宿区西新宿8-17-3</p>
					<p>「西新宿駅」1番出口徒歩3分(丸ノ内線)<br />「都庁前駅」E4出口徒歩7分(大江戸線)<br />「新宿西口駅」D4出口徒歩11分(大江戸線)<br />「新宿駅」西口徒歩15分</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="other">
		<div class="container">
			<div class="page-header">
				<h1>主催について</h1>
			</div>
			<div class="row">
				<div class="span12">
					<p>「エンジニアサポートCROSS 2014」は、「@nifty エンジニアサポート」<small>※</small>を活用して勉強会を開催した勉強会主催者の有志により構成された「エンジニアサポートCROSS 2014 実行委員会」が主催します。 <br>
						<small>※ @nifty エンジニアサポートニフティが2010年8月から正式運用。『日本のウェブエンジニアリングをもっと活発にしていきたい』という思いのもと、技術者の勉強会を主催する技術者に対して、会場の提供や動画配信協力などを実施している。これまで100回以上の勉強会をサポート。勉強会主催者数は40団体以上、「@nifty エンジニアサポート」を活用した勉強会の参加者は約5,000名以上。</small></p>
					<p>実行委員長: <a target="_blank" href="https://mobile.twitter.com/muddydixon">@muddydixon</a>&#12288;副実行委員長: <a target="_blank" href="https://mobile.twitter.com/meryo2000">@meryo2000</a></p>
				</div>
			</div>
			<div class="row">
				<div class="span12">
					<h3>お問い合わせ</h3>
					<p>ご要望、ご質問などは、<a target="_blank" href="https://mobile.twitter.com/nifty_engineer">@nifty エンジニアサポート公式Twitterアカウント</a>、または以下のメールアドレスまでお問い合わせください</p>
					<p class="well">cross2014 [AT] googlegroups.com</p>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>

