<?php
/**
 * The Header for mmorpg-template.
 * @package WordPress
 * @subpackage mmorpg-template
 * @since mmorpg-template 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

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