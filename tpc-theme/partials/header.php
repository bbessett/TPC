<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js  oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js  oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js  oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- favicon -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!-- WordPress Pingback Url-->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"> 
		<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7460292/730544/css/fonts.css" />
		<!-- wordpress head functions --> 
		<?php wp_head(); ?>
		<link rel="stylesheet" type="text/css" href="/wp-content/themes/tpc/css/override.css">

	</head>

	<body <?php body_class(); ?>>
	<div id="wrapper">
	<div class="container">
			<header class="header" role="banner">
			<div class="row">
				<div id="logo-wrap" class="three columns">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
					<p id="logo" class="h1"></p>
					</a>
				</div>
				<div class="head-sec push_one seven columns">
			<div id="nav-upper-bar" class="row">
	
			<div class="search-wrap">
				<div class="h-link-group two column right">
				<a href="/contact-us/" class="h-links right list-heading bold">Contact Us</a>
			</div>
					<div class="social right">
					<a target="_blank" title="Follow The Portland Clinic on Youtube" href="https://www.youtube.com/channel/UC-bnJcE16ETCZlGojSduT1w"><i class="fa fa-youtube-play no-white"></i></a>
					<a target="_blank" title="Follow The Portland Clinic on Facebook" href="https://www.facebook.com/ThePortlandClinic"><i class="icon-facebook-circled"></i></a>
					<a target="_blank" title="Follow The Portland Clinic on Twitter" href="https://twitter.com/portlandclinic"><i class="icon-twitter-circled"></i></a>
			</div>
			
				<?php get_search_form(); ?>
				
				</div>
			</div>
		</div>
			<div id="my_login" class="one columns right hide-phone">
					<a target="_blank" href="https://mychart.tpcllp.com/MyChart/" rel="nofollow"><span>&nbsp</span></a>
			     </div>

			 </div>

			<div class="navbar">
				<div class="row">
					<div class="tablet-hide visible-phone right">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nine columns ','walker' => new Walker_Page_Custom, 'container' => '', 'container_class' => '' ) ); ?>
					</div>
					<div class="just-visible-tablet right">
					<?php wp_nav_menu( array( 'theme_location' => 'tablet-menu', 'menu_class' => 'nine columns','walker' => new Walker_Page_Custom, 'container' => '', 'container_class' => '' ) ); ?>
					</div>
				<a class="toggle" gumby-trigger="#menu-main-menu" href="#">
				<h6>Menu</h6>
				</a> 
			<!--	</div> -->
			</div>
			</div>

			</header> <!-- end header -->