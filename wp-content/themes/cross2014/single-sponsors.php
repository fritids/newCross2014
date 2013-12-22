<?php
/**
 */
get_header(); ?>

<section class="sponsor-single-page">
	<div class="container" style="padding-top:80px;">
	
		
		<div class="row mrgb30">
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
	</div> <!-- /container -->
</section>
<?php get_footer(); ?>