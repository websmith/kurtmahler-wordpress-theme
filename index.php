<?php get_header(); ?>

<article id="main">
	<header>
		<?php
			if( is_home() && get_option('page_for_posts') ) {
				$blog_page_id = get_option('page_for_posts');
				echo '<h2>'.get_page($blog_page_id)->post_title.'</h2>';
			}
		?>
	</header>
</article>

<section class="wrapper style5">
	<div class="inner">
		<div class="row uniform 50%">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class('4u'); ?> id="post-<?php the_ID(); ?>">
					<span class="image fit">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class'=>'image')); ?></a>
					</span>
					<h3 class="major post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<small class="post-date"><? the_date(); ?></small>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
				<h2>No Posts Available</h2>
			<?php endif; ?>
		</div>
	</div>
</section>


<?php get_footer(); ?>
