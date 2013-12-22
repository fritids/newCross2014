<?php
/**
Template Name: Tag Archive
 */
get_header(); ?>

<div class="container">

<h2><?php single_tag_title(); ?></h2>
<?php
$tag_description = tag_description();
if ( ! empty($tag_description ) )
echo '<div>' .$tag_description . '</div>';
?>

<dl>
<?php
global $wp_query;
query_posts(array_merge(
    array( 'post_type' => array('post', 'sponsor') ),
    $wp_query->query
));
if (have_posts()) : while (have_posts()) : the_post();
?>
<dt><?php single_tag_title(); ?>に属する投稿一覧</dt>
<dd><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>の詳細へ"><?php the_title(); ?></a></dd>
<?php endwhile; ?>
</dl>
<?php else : ?>
<dl>
<dt>投稿がありません</dt>
<dd><?php single_tag_title(); ?>に関する記事はありません。</dd>
</dl>

<?php endif; ?>

<h2><?php single_tag_title(); ?></h2>
<?php
$tag_description = tag_description();
if ( ! empty($tag_description ) )
echo '<div>' .$tag_description . '</div>';
?>

<dl>
<?php
global $wp_query;
query_posts(array_merge(
    array( 'post_type' => array('post', 'program') ),
    $wp_query->query
));
if (have_posts()) : while (have_posts()) : the_post();
?>
<dt><?php single_tag_title(); ?>に属する投稿一覧</dt>
<dd><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>の詳細へ"><?php the_title(); ?></a></dd>
<?php endwhile; ?>
</dl>
<?php else : ?>
<dl>
<dt>投稿がありません</dt>
<dd><?php single_tag_title(); ?>に関する記事はありません。</dd>
</dl>

<?php endif; ?>


</div> <!-- /container -->

<?php get_footer(); ?>