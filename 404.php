<?php get_header(); ?>

<article id="main">
		<header>
			<h2>Error 404 - Page Not Found</h2>
		</header>
		<section class="wrapper style5">
			<div class="inner">
				<p style="text-align: center;">Sorry, the page you requested does not exist, or perhaps requires authentication to view.</p>
				<ul class="actions vertical">
					<li><a href="<?php bloginfo('wpurl'); ?>" class="button fit">Return to homepage</a></li>
				</ul>
			</div>
		</section>
</article>

<?php get_footer(); ?>
