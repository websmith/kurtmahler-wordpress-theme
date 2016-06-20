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

				<?php comments_template(); ?>

				<?php
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
					) );
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}
				?>
			</div>
		</section>
	<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
