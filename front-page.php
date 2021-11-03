<?php 
get_header(); 

$num_blog_posts_displayed = 3;
$num_wonder_posts_displayed = 4;
?>

<!-- Banner -->
<section id="banner">
  <div class="inner">
    <!--<h2><?php echo bloginfo('name'); ?></h2>-->
    <h2>Kurt M<span>&#196;</span>hler</h2>
    <!--<img src="<?php bloginfo('template_directory'); ?>/images/logo-abbr.png" alt="Kurt Mahler" />-->
    <p><?php echo bloginfo('description'); ?></p>
  </div>
  <a href="#one" class="more scrolly">Read On</a>
</section>

<!-- Wrapper -->
<main id="wrapper">

  <!-- One -->
  <section id="one" class="wrapper style1 special">
    <div class="inner">
      <header class="major">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php endif; ?>
      </header>
    </div>
  </section>

  <!-- Two -->
  <section id="two" class="wrapper alt style2">
    <div class="posts-title">
      <h2>Recent Articles</h2>
    </div>
    <?php
			$args = array(
				'post_type' 	=> 'post',
				'post_status'	=> 'publish',
				'posts_per_page'=> $num_blog_posts_displayed
			);
			$the_query = new WP_Query( $args );
		?>
    <?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <section <?php post_class('spotlight') ?> id="post-<?php the_ID(); ?>">
      <div class="image">
        <a href="<?php the_permalink() ?>">
          <?php if(has_post_thumbnail()) : the_post_thumbnail(); ?>
          <?php else: ?>
          <img src="<?php bloginfo('template_directory'); ?>/images/pic03.jpg">
          <?php endif; ?>
        </a>
      </div>
      <div class="entry article-wrap content">
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <small class="post-date"><?php the_date(); ?></small>
        <?php the_excerpt(); ?>
      </div>
    </section>
    <?php endwhile; ?>
    <?php else : ?>
    <section class="spotlight">
      <div class="image"><img src="<?php bloginfo('template_directory'); ?>/images/pic01.jpg" alt=""></div>
      <div class="content">
        <h2>No Posts Available</h2>
      </div>
    </section>
    <?php
		endif;
		wp_reset_postdata();
		?>
    <div class="posts-title">
      <a href="<?php echo (get_option('show_on_front') == 'page') ? get_permalink(get_option('page_for_posts')) : bloginfo('url'); ?>"
        class="button centered">View All Posts</a>
    </div>
  </section>

  <!-- Three -->
  <section id="three" class="wrapper style3 special">
    <div class="inner">
      <header class="major">
        <h2>Wonder</h2>
        <p><em>Why are we here? Where are we going?<br>
            Ray Mayhew Articles Revised by Kurt</em></p>
      </header>
      <ul class="features">
        <?php
					$wonder = array(
						'post_type' 	=> 'wonder',
						'post_status'	=> 'publish',
						'posts_per_page'=> $num_wonder_posts_displayed
					);
					$the_query = new WP_Query($wonder);
				?>
        <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
        </li>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
      <div class="posts-title">
        <a href="<?php echo get_post_type_archive_link('wonder'); ?>" class="button centered">View All</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>