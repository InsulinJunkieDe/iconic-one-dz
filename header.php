<?php
/*
 * Header Section of Iconic One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no" />
<meta name="newServer" content="true" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script type="application/ld+json">
{  "@context" : "http://schema.org",
   "@type" : "WebSite",
   "name" : "InsulinJunkie",
   "url" : "http://insulinjunkie.de"
}
</script>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
			<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		<hgroup class="ir">
			<?php if ( is_home() ) : ?>
    <h1>
			<?php endif; // is_single() ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></a>

			<?php if ( is_home() ) : ?>
    </h1>
			<?php endif; // is_single() ?>




		</hgroup>
		<div class="themonic-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img width="320" height="109" src="<?php $r = wp_upload_dir(); echo $r['baseurl'].'/2015/03/InsulinJunkieLogo-660x225.png' ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>
<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1' and function_exists("dz_social_stats")) { ?>
		<div class="socialmedia">
<span id="sfacebook">
	<a title="InsulinJunkie@Facebook" rel="nofollow"  href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank" onclick="window.open('/likeme', '', 'width=320, height=320'); return false;">
		<i class="fa fa-facebook fa-2x"></i>
		<span>Liken <span><?=dz_social_stats('facebook')?></span></span>
	</a>
</span>	<!--
<span id="stwitter">
	<a title="InsulinJunkie@Twitter" rel="nofollow" href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank">
		<i class="fa fa-twitter fa-2x"></i>
		<span>Folgen <span><?=dz_social_stats('twitter')?></span></span>
	</a>
</span>	-->
<span id="sinstagram">
	<a title="InsulinJunkie@Instagram" rel="nofollow" href="http://Instagram.com/insulinjunkiede" target="_blank">
		<i class="fa fa-instagram fa-2x"></i>
		<span>Folgen <span><?=dz_social_stats('instagram')?></span></span>
	</a>
</span>
<span id="srss" title="CacheDate: <?php echo $sstats['date'] ?>">
	<a title="RSS Feed" href="<?php echo get_theme_mod( 'rss_url', 'default_value' ); ?>" target="_blank">
		<i class="fa fa-rss fa-2x"></i>
	</a>
</span>

		</div>
	<?php } ?>

		<?php else : ?>
		<hgroup>
			<?php if ( !is_single() ) : ?>

			<?php endif; // is_single() ?>
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( !is_single() ) : ?>

			<?php endif; // is_single() ?>
				<br /> <a class="site-description"><?php bloginfo( 'description' ); ?></a>
		</hgroup>
<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>
		<div class="socialmedia">
<?php if(get_theme_mod( 'twitter_url', 'default_value' ) != "") { ?>
<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' )  ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a>
<?php }
 if(get_theme_mod( 'facebook_url', 'default_value' ) != "") {
?>
<a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a>
<?php }
 if(get_theme_mod( 'plus_url', 'default_value' ) != "") {
?>
<a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a>
<?php }
 if(get_theme_mod( 'rss_url', 'default_value' ) != "") {
?>
<a href="<?php echo get_theme_mod( 'rss_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>
<?php } ?>
		</div>
	<?php } ?>
		<?php endif; ?>

		<nav id="site-navigation" class="themonic-nav" role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?><div class="clear"></div>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
