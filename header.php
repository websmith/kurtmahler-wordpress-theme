<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	Adaptation of theme by Apparatus (http://apparatusagency.com)
-->
<html>

<head>
  <title><?php wp_title(''); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <!--[if lte IE 9]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/ie9.css"><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/ie8.css"><![endif]-->
  <!--[if lte IE 8]><script src="<?php bloginfo('template_directory'); ?>/assets/js/ie/html5shiv.js"></script><![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class('landing'); ?>>
  <!-- Page Wrapper -->
  <div id="page-wrapper">

    <!-- Header -->
    <header id="header">
      <h1><a href="<?php bloginfo('wpurl'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo-long.png"
            alt="<?php echo get_bloginfo('name'); ?>" class="header-logo"></a></h1>
      <nav id="nav">
        <ul>
          <li class="special">
            <a href="#menu" class="menuToggle"><span>Menu</span></a>
            <?php
										wp_nav_menu( array(
											'menu'              => 'primary',
											'theme_location'    => 'primary',
											'depth'             => 3,
											'container'					=> 'div',
											'container_id'			=> 'menu',
											'walker' 						=> new Mahler_Menu_Walker(),
											'show_carets' 			=> true
										));
									?>
          </li>
        </ul>
      </nav>
    </header>