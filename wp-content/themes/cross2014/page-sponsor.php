<?php
/**
Template Name: sponsor
 */
get_header(); ?>

<section class="sponsor-page">
	<div class="container">
	
		<div class="page-header">
			<h1>スポンサー紹介<small>（お申し込み順）</small></h1>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h2 id="plutinumsp">プラチナスポンサー</h2>
			</div>
		</div>
	
		<?php
		/* sponsor */
		$loop = new WP_Query(
			array( 
				'post_type' => 'sponsors',
				'posts_per_page'=>'-1',
				'order' => 'ASC',
				'meta_key' => 'sponsor_value',
				'meta_value' => 'platinum'
			) 
		);
		while ( $loop->have_posts() ) : $loop->the_post();
		?>
		
		<div class="plutinum row mrgb30">
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

		<div class="row">
			<div class="col-lg-12">
				<h2 id="goldsp">ゴールドスポンサー</h2>
			</div>
		</div>

		<div class="gold row mrgb30">
			<?php
			/* sponsor */
			$loop = new WP_Query(
				array( 
					'post_type' => 'sponsors',
					'posts_per_page'=>'-1',
					'order' => 'ASC',
					'meta_key' => 'sponsor_value',
					'meta_value' => 'gold'
				) 
			);
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="col-lg-6">
				<p class="col-lg-3"><img class="img-thumbnail" src="<?php the_field( 'sponsor_img',$post->ID); ?>" alt="<?php the_title(); ?>" /></p>
				<div class="txt col-lg-9">
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
						echo '<p class="mrgb20">';
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
	
		<div class="row">
			<div class="col-lg-12">
				<h2 id="silversp">シルバースポンサー</h2>
			</div>
		</div>

		<div class="silver row mrgb30">
			<?php
			/* sponsor */
			$loop = new WP_Query(
				array( 
					'post_type' => 'sponsors',
					'posts_per_page'=>'-1',
					'order' => 'ASC',
					'meta_key' => 'sponsor_value',
					'meta_value' => 'silver'
				) 
			);
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			

			<div class="txt col-lg-4">
				<p class="col-lg-4"><img class="img-thumbnail" src="<?php the_field( 'sponsor_img',$post->ID); ?>" alt="<?php the_title(); ?>" /></p>
				<div class="txt col-lg-8">
					<h3><?php the_title(); ?></h3>
					<ul class="list-inline">
						<?php if(post_custom('sponsor_url')):?>
						<li><a href="<?php the_field('sponsor_url',$post->ID); ?>" target="_blank">公式サイト</a></li>
						<?php endif;?>
						<?php if(post_custom('sponsor_twitter')):?>
						<li>｜<a href="https://twitter.com/<?php the_field('sponsor_twitter',$post->ID); ?>" target="_blank">公式Twitter</a></li>
						<?php endif;?>
						<?php if(post_custom('sponsor_fb')):?>
						<li>｜<a href="http://www.facebook.com/<?php the_field('sponsor_fb',$post->ID); ?>" target="_blank">facebook</a></li>
						<?php endif;?>
					</ul>
	
					<p><?php the_field('sponsor_dtl',$post->ID); ?></p>
					<?php 
					if ( $terms = get_the_terms($post->ID, 'tagtype') ) {
						echo '<p class="mrgb20">';
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
	
		<div class="row">
			<div class="col-lg-12">	
				<h2 id="supportersp">サポーター</h2>
			</div>
		</div>
	
		<div class="support row mrgb30">
			<?php
			/* sponsor */
			$loop = new WP_Query(
				array( 
					'post_type' => 'sponsors',
					'posts_per_page'=>'-1',
					'order' => 'ASC',
					'meta_key' => 'sponsor_value',
					'meta_value' => 'supporter'
				) 
			);
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			

			<div class="txt col-lg-3">
				<p class="pull-left"><img class="img-thumbnail" src="<?php the_field( 'sponsor_img',$post->ID); ?>" alt="<?php the_title(); ?>" /></p>
				<div class="txt col-lg-9">
					<h3><?php the_title(); ?></h3>
					<ul class="list-inline">
						<?php if(post_custom('sponsor_url')):?>
						<li><a href="<?php the_field('sponsor_url',$post->ID); ?>" target="_blank">公式サイト</a></li>
						<?php endif;?>
						<?php if(post_custom('sponsor_twitter')):?>
						<li>｜<a href="https://twitter.com/<?php the_field('sponsor_twitter',$post->ID); ?>" target="_blank">公式Twitter</a></li>
						<?php endif;?>
						<?php if(post_custom('sponsor_fb')):?>
						<li>｜<a href="http://www.facebook.com/<?php the_field('sponsor_fb',$post->ID); ?>" target="_blank">facebook</a></li>
						<?php endif;?>
					</ul>

					<?php 
					if ( $terms = get_the_terms($post->ID, 'tagtype') ) {
						echo '<p class="mrgb20">';
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

		<div class="row">
			<div class="col-lg-12">
				<h2 id="crosssp">クロススポンサー</h2>
			</div>
		</div>

		<div class="cross row mrgb30">
			<?php
			/* sponsor */
			$loop = new WP_Query(
				array( 
					'post_type' => 'sponsors',
					'posts_per_page'=>'-1',
					'order' => 'ASC',
					'meta_key' => 'sponsor_value',
					'meta_value' => 'cross'
				) 
			);
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="col-lg-6">
				<p class="col-lg-3"><img class="img-thumbnail" src="<?php the_field( 'sponsor_img',$post->ID); ?>" alt="<?php the_title(); ?>" /></p>
				<div class="txt col-lg-9">
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
						echo '<p class="mrgb20">';
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
	</div> <!-- /container -->
</section>
<?php get_footer(); ?>