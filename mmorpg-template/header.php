<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php wp_title (); ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>

<body>
  <div id="wrapper">
    <header>
    	<img src="<?php bloginfo( 'template_url' ); ?>/img/mmorpg.png" alt="" width="250" height="50" alt="mmorpg"><br />
      <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>
    </header>
<?php
 wp_nav_menu( array( 'container' => 'nav', 'walker' => new MV_Cleaner_Walker_Nav_Menu() ) );
?>