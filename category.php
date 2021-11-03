<?php get_header(); ?>

<article id="main">
  <header
    <?php if(has_post_thumbnail()) echo "style='background-image: url(".wp_get_attachment_url(get_post_thumbnail_id($post->ID)).");'"; ?>>
    <h2><?php single_cat_title( '', true ); ?></h2>
  </header>

  <section class="wrapper style5">
    <div class="inner">
      <div class="breadcrumb">
        <?php echo do_shortcode('[flexy_breadcrumb]'); ?>
      </div>
      <div class="post-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <span class="image fit">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class'=>'image')); ?></a>
          </span>
          <h3 class="major post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <small class="post-date">
            <?php the_date(); ?>
          </small>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <h2>No Posts Available</h2>
        <?php endif; ?>
      </div>
    </div>
  </section>
</article>

<?php get_footer(); ?>