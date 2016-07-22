<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script type='text/javascript' src="<?php bloginfo('template_url');?>/js/jquery-1.9.1.min.js"/></script>
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/style/icon.css" />
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script>
var cmp_url="<?php bloginfo('template_url');?>/cmp.swf";
</script>

</head>

<body <?php body_class(); ?>>
<!-- 头部 -->

<!-- 身体 -->
<section id="body-box"class="flex nowrap">
	<section class="main w70">
		<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex around" target="_blank">
		<i class="icon-cmplogo"></i>
		<h1><?php bloginfo('name');?></h1></a></div>
		<div class="nav">
			<ul class="nav1 nav3">
				<h2>频道</h2>
				
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
			
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
						
					) );
				?>
			<!-- .main-navigation -->
		<?php endif; ?>
			<!-- .main-navigation -->
		
			</ul>
		
			<ul class="nav1 nav2">
				<h2>其他</h2>
				<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="social-navigation" role="navigation">
				<?php
					// Social links navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>

			</ul>
		</div>
	
	</section>
	<div id="content" class="content flex wrap">
		<header id="header" class="flex">
		<div class="showmain flex"><i class="icon-menu"></i></div>
	<div class="search flex">
		<form role="search" method="get" class="search-form flex around" action="http://huoqingchun.cn/">
				<label class="houbianqu">
					<input type="text" autocomplete="off" class="search-field form-control" placeholder="搜索你喜欢的电台" value="" name="s" title="搜索：">
				</label>
				<button type="submit" class="search-submit">
					<i class="icon-pageview m0"></i>
				</button>
				
				
			</form>
		
	</div>
	</header>
	<section id="somecontent" class="flex nowrap">