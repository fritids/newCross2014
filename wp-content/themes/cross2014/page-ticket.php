<?php
/**
Template Name: ticket
 */
get_header(); ?>

<section class="ticket-page">
	<div class="container">
		<div class="page-header">
			<h1>
				<?php the_title(); ?>
			</h1>
		</div>

		<p class="lead">Peatixにてチケット販売中！学割チケットや、お友達・同僚のみんなで来るとお得な「ペア割」「団体割」チケットもご用意しています。</p>

		<div class="row mrgb30">
			<div class="col-lg-7">
				<h2>各種チケットについて</h2>
				<div class="well">
					<h3>ペア割とは</h3>
					<p>2名でCROSSに参加すると前売り券よりもグッと！お得になるチケットです。<br>ぜひお誘いあわせの上ご参加ください！</p>
				</div>
				<div class="well">
					<h3>団体割とは</h3>
					<p>5名以上でCROSSに参加すると、前売り券の半額になる、とてもお得なチケットです。<br>しかも、団体割を利用して参加される方々は、<br>CROSS会場の入り口にて「 ○○様 御一行 」とご紹介させていただきます！<br>会社での研修として！また、大学のゼミ仲間でのご参加などにご活用ください！</p>
				</div>
			</div>
			<div class="col-lg-5">
				<h2>チケット種別</h2>
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th><span class="glyphicon glyphicon-cross glyphicon-preorder"></span>前売り券</th>
							<td>￥2,500</td>
						</tr>
						<tr>
							<th><span class="glyphicon glyphicon-cross glyphicon-pair"></span>ペア割（2名）</th>
							<td>￥2,000（1名あたり）</td>
						</tr>
						<tr>
							<th><span class="glyphicon glyphicon-cross glyphicon-smap"></span>団体割（5名以上～）</th>
							<td>￥1,500（1名あたり）</td>
						</tr>
						<tr>
							<th><span class="glyphicon glyphicon-cross glyphicon-student"></span>学割</th>
							<td>￥1,000</td>
						</tr>
						<tr>
							<th><span class="glyphicon glyphicon-cross glyphicon-door"></span>当日券</th>
							<td>￥3,000</td>
						</tr>
					</tbody>
				</table>
				<p><a class="btn btn-success btn-lg btn-block" href="http://cross2014.peatix.com" target="_blank">チケット購入はこちら »</a></p>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12">
			<h2>注意事項</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
					<strong>ペア割、団体割のチケットを購入される方へ</strong>
					<p>Peatixでは、複数枚のチケットを代表の方が購入されたあとに、そのチケットを譲渡する仕組みがございます。<br>この仕組みを利用することで、別々のタイミングでの受付も可能になります。<br>
詳しくはヘルプページをご覧ください。</p>
				</div>
			<div class="col-lg-4">
					<strong>購入後のキャンセルについて</strong>
					<p>チケットのキャンセルを依頼したい場合は、購入したイベントページにある「主催者へ連絡」ボタンより開催前日までにお問い合わせください。<br>当イベントでは、原則当日の返金対応は行いません。<br>キャンセル希望の場合は、必ず前日までのご連絡をお願いします。</p>
				</div>
			<div class="col-lg-4">
					<strong>領収書の発行について</strong><p>領収書については、Peatix上で発行が可能になります。詳しくはヘルプページをご覧ください。当日も領収書窓口は設置いたしますが、例年込み合いますので事前にPeatixにて発行いただけると幸いです。</p>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
