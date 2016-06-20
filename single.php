<?php get_header(); ?>

<main id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header <?php if(has_post_thumbnail()) echo "style='background-image: url(".wp_get_attachment_url(get_post_thumbnail_id($post->ID)).");'"; ?>>
			<h2><?php the_title(); ?></h2>
			<small class="post-date"><? the_date(); ?></small>
		</header>
		<section class="wrapper style5">
			<div class="inner">
				<?php the_content(); ?>
				<?php the_tags( '<strong>Tagged as:</strong> ', ', ', ''); ?>
				<hr>
				<?php comments_template(); ?>
				<ul class="actions navigation">
					<li><?php previous_post_link(); ?></li>
					<li><?php next_post_link(); ?></li>
				</ul>
			</div>
		</section>
	<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
