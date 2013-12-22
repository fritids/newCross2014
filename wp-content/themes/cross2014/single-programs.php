<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<section class="program-single-page">
	<div class="container">
		<div class="page-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php 
				if ( $terms = get_the_terms($post->ID, 'tagtype') ) {
					echo '<p>';
					foreach ( $terms as $term ) {
						echo '<a class="label '.'label-'.'tag'.$term->parent.'" href="/tagtype/'.esc_html($term->slug).'">' . esc_html($term->name) . '</a>';
					}
					echo '</p>';
				}
				?>
				<h2>会場</h2>
				<p><?php the_field('programs_place',$post->ID); ?></p>
				<h2>セッション概要</h2>
				<p><?php the_field('program_dtl',$post->ID); $programpost = $post;?></p>
<!--
				<?php if(post_custom('ust_id')):?>
				<h3>USTREAM アーカイブ</h3>
				<div style="margin-bottom:20px">
				<iframe width="480" height="302" src="http://www.ustream.tv/embed/recorded/<?php the_field('ust_id',$post->ID);?>?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe><br /><a href="http://www.ustream.tv/" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: center;" target="_blank">Video streaming by Ustream</a>
				</div>
				<?php endif;?>

				<?php if(post_custom('ust_id2')):?>
				<iframe width="480" height="302" src="http://www.ustream.tv/embed/recorded/<?php the_field('ust_id2',$post->ID);?>?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe><br /><a href="http://www.ustream.tv/" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: center;" target="_blank">Video streaming by Ustream</a>
				<?php endif;?>
-->
				<h2>セッションオーナー</h2>
				<!-- スピーカー -->
				<div class="media">
					<a href="https://twitter.com/<?php the_field('program_owner',$post->ID); $programpost = $post;?>" target="_blank"><img class="img-circle" src="<?php the_field('program_owner_img',$post->ID); $programpost = $post;?>" alt="<?php the_field('program_owner',$post->ID); $programpost = $post;?>"></a>
					<div class="media-body">
						<p><?php the_field('program_owner',$post->ID); $programpost = $post;?>(<a href="https://twitter.com/<?php the_field('program_owner_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_owner_id',$post->ID); $programpost = $post;?></a>) </p>
					</div>
				</div>

				<h2>スピーカー</h2>
				<!-- スピーカー -->
				<?php if (get_field('program_speaker',$post->ID) != "") { ?>
				<p><?php the_field('program_speaker',$post->ID); $programpost = $post;?>
				<?php if (get_field('program_speaker_id',$post->ID) != "") { ?>(<a href="https://twitter.com/<?php the_field('program_speaker_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_speaker_id',$post->ID); $programpost = $post;?></a>)<?php }?>
				</p>
				<?php }?>
				<?php if (get_field('program_speaker2',$post->ID) != "") { ?>
				<p><?php the_field('program_speaker2',$post->ID); $programpost = $post;?>
				<?php if (get_field('program_speaker2_id',$post->ID) != "") { ?>(<a href="https://twitter.com/<?php the_field('program_speaker2_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_speaker2_id',$post->ID); $programpost = $post;?></a>)<?php }?>
				</p>
				<?php }?>
				<?php if (get_field('program_speaker3',$post->ID) != "") { ?>
				<p><?php the_field('program_speaker3',$post->ID); $programpost = $post;?>
				<?php if (get_field('program_speaker3_id',$post->ID) != "") { ?>(<a href="https://twitter.com/<?php the_field('program_speaker3_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_speaker3_id',$post->ID); $programpost = $post;?></a>)<?php }?>
				</p>
				<?php }?>
				<?php if (get_field('program_speaker4',$post->ID) != "") { ?>
				<p><?php the_field('program_speaker4',$post->ID); $programpost = $post;?>
				<?php if (get_field('program_speaker4_id',$post->ID) != "") { ?>(<a href="https://twitter.com/<?php the_field('program_speaker4_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_speaker4_id',$post->ID); $programpost = $post;?></a>)<?php }?>
				</p>
				<?php }?>
				<?php if (get_field('program_speaker5',$post->ID) != "") { ?>
				<p><?php the_field('program_speaker5',$post->ID); $programpost = $post;?>
				<?php if (get_field('program_speaker5_id',$post->ID) != "") { ?>(<a href="https://twitter.com/<?php the_field('program_speaker5_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_speaker5_id',$post->ID); $programpost = $post;?></a>)<?php }?>
				</p>
				<?php }?>
				<?php if (get_field('program_speaker6',$post->ID) != "") { ?>
				<p><?php the_field('program_speaker6',$post->ID); $programpost = $post;?>
				<?php if (get_field('program_speaker6_id',$post->ID) != "") { ?>(<a href="https://twitter.com/<?php the_field('program_speaker6_id',$post->ID); $programpost = $post;?>" target="_blank">@<?php the_field('program_speaker6_id',$post->ID); $programpost = $post;?></a>)<?php }?>
				</p>
				<?php }?>
			</div>
		</div>
	</div><!-- #container -->
</section>
		
<?php get_footer(); ?>