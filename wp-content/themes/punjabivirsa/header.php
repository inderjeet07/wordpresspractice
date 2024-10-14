<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage punjabivirsa
 * @since punjabivirsa 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- <meta charset="<?php bloginfo( 'charset' ); ?>" /> -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the site name.
	bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) {
	echo " | $site_description";
}

	// Add a page number if necessary:
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
	/* translators: %s: Page number. */
	echo esc_html( ' | ' . sprintf( __( 'Page %s', 'punjabivirsa' ), max( $paged, $page ) ) );
}

?>
	</title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url( get_stylesheet_uri() ); ?>?ver=20230808" />
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
if ( is_singular() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
	<div class="container">
		<nav class="navigation">

			<!-- Logo -->
			<div class="logo">
				<a href="<?php echo site_url(); ?>"><img src="<?php echo site_url();?>/wp-content/uploads/2023/08/punjabi-logo.png" height="100px" width="200px"></a>
			</div>

			<!-- Navigation -->
			<ul class="menu-list">
<!-- 				<li><a href="<?php echo site_url(); ?>">Home</a></li>
				<li><a href="#">ਸਾਡੇ ਬਾਰੇ</a></li>
				<li><a href="http://localhost/punjabivirsa/blog/">ਲਿਖਤਾਂ</a></li>
				<li><a href="#portfolio">ਮਾਂ ਬੋਲੀ ਪੰਜਾਬੀ</a></li>
				<li><a href="http://localhost/punjabivirsa/login/">ਦਾਖਲ ਹੋਵੋ</a></li> -->
				<?php// echo do_shortcode('[language-switcher]'); ?>
				
						<?php 
			$options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'primary_menu',
//         'fallback_cb'=> 'fall_back_menu'
    );
echo strip_tags(wp_nav_menu( $options ), '<li><a></li>' );
			?>
			</ul>

			<div class="humbarger">
				<div class="bar"></div>
				<div class="bar2 bar"></div>
				<div class="bar"></div>
			</div>
		</nav>
	</div>
	</header>
