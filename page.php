<?php get_header(); ?>

<article id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header <?php if(has_post_thumbnail()) echo "style='background-image: url(".wp_get_attachment_url(get_post_thumbnail_id($post->ID)).");'"; ?>>
			<h2><?php the_title(); ?></h2>
		</header>
		<section class="wrapper style5">
			<div class="inner">
				<?php the_content(); ?>
			</div>
		</section>
	<?php endwhile; endif; ?>
</article>

<?php get_footer(); ?>
