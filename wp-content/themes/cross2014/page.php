<?php
/**
Template Name: page
 */
get_header(); ?>

<section class="default-page">
	<div class="container">
		<div class="page-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						
						<!-- 本文 -->
						<?php the_content(); ?>
						
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>