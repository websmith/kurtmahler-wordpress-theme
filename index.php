<?php get_header(); ?>

<article id="main">
  <?php
	if (is_home() && get_option('page_for_posts') ) {
		$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
		$featured_image = $img[0];
	}
	?>
  <header style='background-image: url("<?php echo $featured_image; ?>");'>
    <?php
			if( is_home() && get_option('page_for_posts') ) {
				$blog_page_id = get_option('page_for_posts');
				echo '<h2>'.get_page($blog_page_id)->post_title.'</h2>';
			} else if (is_category() || is_tag()) {
				echo '<h2>'.get_the_archive_title().'</h2>';
			}
		?>
  </header>
</article>

<section class="wrapper style5">
  <div class="inner">
    <div class="post-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <span class="image fit">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class'=>'image')); ?></a>
        </span>
        <h3 class="major post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <small class="post-date"><?php the_date(); ?></small>
      </div>
      <?php endwhile; ?>
      <?php else : ?>
      <h2>No Posts Available</h2>
      <?php endif; ?>
    </div>
  </div>
</section>


<?php get_footer(); ?>