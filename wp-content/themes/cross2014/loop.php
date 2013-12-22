<?php
/**
 * 記事表示テンプレート
 */

?>


	<?php if ( ! have_posts() ) : ?>
		<p>記事がありません。</p>
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- 本文 -->
		<?php the_title(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( ); ?>

		<!-- カスタムフィールドテンプレート 画象ファイル -->
		<?php if ( get_post_meta($post->ID,'custom_field',TRUE)) : ?>
		<img src="<?php echo wp_get_attachment_url(get_post_meta($post->ID,'custom_field',TRUE)); ?>" style="width664;height:auto;" width="664" alt="" />
		<?php endif; ?>

		<!-- カスタムフィールドテンプレート テキスト -->
		<?php if ( get_post_meta($post->ID,'custom_field',TRUE)) : ?>
			<?php echo get_post_meta($post->ID,'custom_field',TRUE);?>
		<?php endif;?>
		
	<?php endwhile;?>
	
	
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="navigation">
		<?php if(!function_exists('wp_pagenavi')) : ?>
        <div class="alignleft"><?php next_posts_link('次へ') ?></div>
        <div class="alignright"><?php previous_posts_link('前へ') ?></div>
        <?php else : wp_pagenavi(); endif; ?>
	</div>
	<?php endif; ?>
	