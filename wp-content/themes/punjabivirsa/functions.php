<?php
/**
 * punjabivirsa functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, punjabivirsa_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value).
 *     remove_filter( 'excerpt_length', 'punjabivirsa_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see https://developer.wordpress.org/plugins/.
 *
 * @package WordPress
 * @subpackage punjabivirsa
 * @since punjabivirsa 1.0
 */

/*
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/* Tell WordPress to run punjabivirsa_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'punjabivirsa_setup' );

if ( ! function_exists( 'punjabivirsa_setup' ) ) :
	/**
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * To override punjabivirsa_setup() in a child theme, add your own punjabivirsa_setup to your child theme's
	 * functions.php file.
	 *
	 * @uses add_theme_support()        To add support for post thumbnails, custom headers and backgrounds, and automatic feed links.
	 * @uses register_nav_menus()       To add support for navigation menus.
	 * @uses add_editor_style()         To style the visual editor.
	 * @uses load_theme_textdomain()    For translation/localization support.
	 * @uses register_default_headers() To register the default custom header images provided with the theme.
	 * @uses set_post_thumbnail_size()  To set a custom post thumbnail size.
	 *
	 * @since punjabivirsa 1.0
	 */
	function punjabivirsa_setup() {

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Blue', 'punjabivirsa' ),
					'slug'  => 'blue',
					'color' => '#0066cc',
				),
				array(
					'name'  => __( 'Black', 'punjabivirsa' ),
					'slug'  => 'black',
					'color' => '#000',
				),
				array(
					'name'  => __( 'Medium Gray', 'punjabivirsa' ),
					'slug'  => 'medium-gray',
					'color' => '#666',
				),
				array(
					'name'  => __( 'Light Gray', 'punjabivirsa' ),
					'slug'  => 'light-gray',
					'color' => '#f1f1f1',
				),
				array(
					'name'  => __( 'White', 'punjabivirsa' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
			)
		);

		// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
		add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

		// This theme uses post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 *
		 * Manual loading of text domain is not required after the introduction of
		 * just in time translation loading in WordPress version 4.6.
		 *
		 * @ticket 58318
		 */
		if ( version_compare( $GLOBALS['wp_version'], '4.6', '<' ) ) {
			load_theme_textdomain( 'punjabivirsa', get_template_directory() . '/languages' );
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'punjabivirsa' ),
			)
		);

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			array(
				// Let WordPress know what our default background color is.
				'default-color' => 'f1f1f1',
			)
		);

		// The custom header business starts here.

		$custom_header_support = array(
			/*
			 * The default image to use.
			 * The %s is a placeholder for the theme template directory URI.
			 */
			'default-image'       => '%s/images/headers/path.jpg',
			// The height and width of our custom header.
			/**
			 * Filters the punjabivirsa default header image width.
			 *
			 * @since punjabivirsa 1.0
			 *
			 * @param int The default header image width in pixels. Default 940.
			 */
			'width'               => apply_filters( 'punjabivirsa_header_image_width', 940 ),
			/**
			 * Filters the punjabivirsa defaul header image height.
			 *
			 * @since punjabivirsa 1.0
			 *
			 * @param int The default header image height in pixels. Default 198.
			 */
			'height'              => apply_filters( 'punjabivirsa_header_image_height', 198 ),
			// Support flexible heights.
			'flex-height'         => true,
			// Don't support text inside the header image.
			'header-text'         => false,
			// Callback for styling the header preview in the admin.
			'admin-head-callback' => 'punjabivirsa_admin_header_style',
		);

		add_theme_support( 'custom-header', $custom_header_support );

		if ( ! function_exists( 'get_custom_header' ) ) {
			// This is all for compatibility with versions of WordPress prior to 3.4.
			define( 'HEADER_TEXTCOLOR', '' );
			define( 'NO_HEADER_TEXT', true );
			define( 'HEADER_IMAGE', $custom_header_support['default-image'] );
			define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
			define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
			add_custom_image_header( '', $custom_header_support['admin-head-callback'] );
			add_custom_background();
		}

		/*
		 * We'll be using post thumbnails for custom header images on posts and pages.
		 * We want them to be 940 pixels wide by 198 pixels tall.
		 * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
		 */
		set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

		// ...and thus ends the custom header business.

		// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
		register_default_headers(
			array(
				'berries'       => array(
					'url'           => '%s/images/headers/berries.jpg',
					'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Berries', 'punjabivirsa' ),
				),
				'cherryblossom' => array(
					'url'           => '%s/images/headers/cherryblossoms.jpg',
					'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Cherry Blossoms', 'punjabivirsa' ),
				),
				'concave'       => array(
					'url'           => '%s/images/headers/concave.jpg',
					'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Concave', 'punjabivirsa' ),
				),
				'fern'          => array(
					'url'           => '%s/images/headers/fern.jpg',
					'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Fern', 'punjabivirsa' ),
				),
				'forestfloor'   => array(
					'url'           => '%s/images/headers/forestfloor.jpg',
					'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Forest Floor', 'punjabivirsa' ),
				),
				'inkwell'       => array(
					'url'           => '%s/images/headers/inkwell.jpg',
					'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Inkwell', 'punjabivirsa' ),
				),
				'path'          => array(
					'url'           => '%s/images/headers/path.jpg',
					'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Path', 'punjabivirsa' ),
				),
				'sunset'        => array(
					'url'           => '%s/images/headers/sunset.jpg',
					'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Sunset', 'punjabivirsa' ),
				),
			)
		);
	}
endif;

if ( ! function_exists( 'punjabivirsa_admin_header_style' ) ) :
	/**
	 * Style the header image displayed on the Appearance > Header admin panel.
	 *
	 * Referenced via add_custom_image_header() in punjabivirsa_setup().
	 *
	 * @since punjabivirsa 1.0
	 */
	function punjabivirsa_admin_header_style() {
		?>
	<style type="text/css" id="punjabivirsa-admin-header-css">
	/* Shows the same border as on front end */
	#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
	}
	/* If header-text was supported, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
	*/
	</style>
		<?php
	}
endif;

/**
 * Show a home link for our wp_nav_menu() fallback, wp_page_menu().
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since punjabivirsa 1.0
 *
 * @param array $args An optional array of arguments. @see wp_page_menu()
 */
function punjabivirsa_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) ) {
		$args['show_home'] = true;
	}
	return $args;
}
add_filter( 'wp_page_menu_args', 'punjabivirsa_page_menu_args' );

/**
 * Set the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since punjabivirsa 1.0
 *
 * @param int $length The number of excerpt characters.
 * @return int The filtered number of excerpt characters.
 */
function punjabivirsa_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'punjabivirsa_excerpt_length' );

if ( ! function_exists( 'punjabivirsa_continue_reading_link' ) ) :
	/**
	 * Return a "Continue Reading" link for excerpts.
	 *
	 * @since punjabivirsa 1.0
	 *
	 * @return string "Continue Reading" link.
	 */
	function punjabivirsa_continue_reading_link() {
		return ' <a href="' . esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'punjabivirsa' ) . '</a>';
	}
endif;

/**
 * Replace "[...]" with an ellipsis and punjabivirsa_continue_reading_link().
 *
 * "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since punjabivirsa 1.0
 *
 * @param string $more The Read More text.
 * @return string The filtered Read More text.
 */
function punjabivirsa_auto_excerpt_more( $more ) {
	if ( ! is_admin() ) {
		return ' &hellip;' . punjabivirsa_continue_reading_link();
	}
	return $more;
}
add_filter( 'excerpt_more', 'punjabivirsa_auto_excerpt_more' );

/**
 * Add a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since punjabivirsa 1.0
 *
 * @param string $output The "Continue Reading" link.
 * @return string Excerpt with a pretty "Continue Reading" link.
 */
function punjabivirsa_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() && ! is_admin() ) {
		$output .= punjabivirsa_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'punjabivirsa_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in punjabivirsa's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since punjabivirsa 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since punjabivirsa 1.0
 * @deprecated Deprecated in punjabivirsa 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function punjabivirsa_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backward compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) ) {
	add_filter( 'gallery_style', 'punjabivirsa_remove_gallery_css' );
}

if ( ! function_exists( 'punjabivirsa_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own punjabivirsa_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since punjabivirsa 1.0
	 *
	 * @param WP_Comment $comment The comment object.
	 * @param array      $args    An array of arguments. @see get_comment_reply_link()
	 * @param int        $depth   The depth of the comment.
	 */
	function punjabivirsa_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '':
			case 'comment':
				?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php
				/* translators: %s: Author display name. */
				printf( __( '%s <span class="says">says:</span>', 'punjabivirsa' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
				?>
			</div><!-- .comment-author .vcard -->

				<?php
				$commenter = wp_get_current_commenter();
				if ( $commenter['comment_author_email'] ) {
					$moderation_note = __( 'Your comment is awaiting moderation.', 'punjabivirsa' );
				} else {
					$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'punjabivirsa' );
				}
				?>

				<?php if ( '0' === $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
			<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: Date, 2: Time. */
					printf( __( '%1$s at %2$s', 'punjabivirsa' ), get_comment_date(), get_comment_time() );
				?>
					</a>
					<?php
					edit_comment_link( __( '(Edit)', 'punjabivirsa' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->

				<div class="comment-body"><?php comment_text(); ?></div>

				<div class="reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>
				</div><!-- .reply -->
			</div><!-- #comment-##  -->

				<?php
				break;
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
		<p><?php _e( 'Pingback:', 'punjabivirsa' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'punjabivirsa' ), ' ' ); ?></p>
				<?php
				break;
		endswitch;
	}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override punjabivirsa_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since punjabivirsa 1.0
 *
 * @uses register_sidebar()
 */
function punjabivirsa_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar(
		array(
			'name'          => __( 'Primary Widget Area', 'punjabivirsa' ),
			'id'            => 'primary-widget-area',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'punjabivirsa' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Secondary Widget Area', 'punjabivirsa' ),
			'id'            => 'secondary-widget-area',
			'description'   => __( 'An optional secondary widget area, displays below the primary widget area in your sidebar.', 'punjabivirsa' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 3, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'First Footer Widget Area', 'punjabivirsa' ),
			'id'            => 'first-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'punjabivirsa' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 4, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Second Footer Widget Area', 'punjabivirsa' ),
			'id'            => 'second-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'punjabivirsa' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 5, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Third Footer Widget Area', 'punjabivirsa' ),
			'id'            => 'third-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'punjabivirsa' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 6, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Fourth Footer Widget Area', 'punjabivirsa' ),
			'id'            => 'fourth-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'punjabivirsa' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
/** Register sidebars by running punjabivirsa_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'punjabivirsa_widgets_init' );

/**
 * Remove the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using punjabivirsa 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default punjabivirsa styling.
 *
 * @since punjabivirsa 1.0
 */
function punjabivirsa_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'punjabivirsa_remove_recent_comments_style' );

if ( ! function_exists( 'punjabivirsa_posted_on' ) ) :
	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since punjabivirsa 1.0
	 */
	function punjabivirsa_posted_on() {
		printf(
			/* translators: 1: CSS classes, 2: Date, 3: Author display name. */
			__( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'punjabivirsa' ),
			'meta-prep meta-prep-author',
			sprintf(
				'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				get_the_date()
			),
			sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				/* translators: %s: Author display name. */
				esc_attr( sprintf( __( 'View all posts by %s', 'punjabivirsa' ), get_the_author() ) ),
				get_the_author()
			)
		);
	}
endif;

if ( ! function_exists( 'punjabivirsa_posted_in' ) ) :
	/**
	 * Print HTML with meta information for the current post (category, tags and permalink).
	 *
	 * @since punjabivirsa 1.0
	 */
	function punjabivirsa_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tags_list = get_the_tag_list( '', ', ' );

		if ( $tags_list && ! is_wp_error( $tags_list ) ) {
			/* translators: 1: Category name, 2: Tag name, 3: Post permalink, 4: Post title. */
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'punjabivirsa' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			/* translators: 1: Category name, 3: Post permalink, 4: Post title. */
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'punjabivirsa' );
		} else {
			/* translators: 3: Post permalink, 4: Post title. */
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'punjabivirsa' );
		}

		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tags_list,
			esc_url( get_permalink() ),
			the_title_attribute( 'echo=0' )
		);
	}
endif;

/**
 * Retrieve the IDs for images in a gallery.
 *
 * @uses get_post_galleries() First, if available. Falls back to shortcode parsing,
 *                            then as last option uses a get_posts() call.
 *
 * @since punjabivirsa 1.6.
 *
 * @return array List of image IDs from the post gallery.
 */
function punjabivirsa_get_gallery_images() {
	$images = array();

	if ( function_exists( 'get_post_galleries' ) ) {
		$galleries = get_post_galleries( get_the_ID(), false );
		if ( isset( $galleries[0]['ids'] ) ) {
			$images = explode( ',', $galleries[0]['ids'] );
		}
	} else {
		$pattern = get_shortcode_regex();
		preg_match( "/$pattern/s", get_the_content(), $match );
		$atts = shortcode_parse_atts( $match[3] );
		if ( isset( $atts['ids'] ) ) {
			$images = explode( ',', $atts['ids'] );
		}
	}

	if ( ! $images ) {
		$images = get_posts(
			array(
				'fields'         => 'ids',
				'numberposts'    => 999,
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_mime_type' => 'image',
				'post_parent'    => get_the_ID(),
				'post_type'      => 'attachment',
			)
		);
	}

	return $images;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since punjabivirsa 2.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function punjabivirsa_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'punjabivirsa_widget_tag_cloud_args' );

/**
 * Enqueue scripts and styles for front end.
 *
 * @since punjabivirsa 2.6
 */
function punjabivirsa_scripts_styles() {
	// Theme block stylesheet.
	wp_enqueue_style( 'punjabivirsa-block-style', get_template_directory_uri() . '/blocks.css', array(), '20230627' );
}
add_action( 'wp_enqueue_scripts', 'punjabivirsa_scripts_styles' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since punjabivirsa 2.6
 */
function punjabivirsa_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'punjabivirsa-block-editor-style', get_template_directory_uri() . '/editor-blocks.css', array(), '20230627' );
}
add_action( 'enqueue_block_editor_assets', 'punjabivirsa_block_editor_styles' );

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backward compatibility to support pre-5.2.0 WordPress versions.
	 *
	 * @since punjabivirsa 2.9
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since punjabivirsa 2.9
		 */
		do_action( 'wp_body_open' );
	}
endif;

function punjabivirsa_custom() {
	
// 		  wp_enqueue_script('js-validate-plugin','https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js');

		
    wp_enqueue_style('my-custom-css', get_template_directory_uri().'/assets/style.css');
	wp_enqueue_style('my-boot-css','https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	  wp_enqueue_style('font-awesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
//       wp_enqueue_script('jquery','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js');
	 wp_enqueue_script('bootstap','https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js');

    wp_enqueue_script('my-custom-js', get_template_directory_uri().'/assets/custom.js');
  
}
add_action('wp_enqueue_scripts', 'punjabivirsa_custom');

/*
* Creating a function to create our CPT
*/
  
function custom_post_type_new() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Writings', 'Post Type General Name', 'punjabivirsa' ),
        'singular_name'       => _x( 'writing', 'Post Type Singular Name', 'punjabivirsa' ),
        'menu_name'           => __( 'Writings', 'punjabivirsa' ),
        'parent_item_colon'   => __( 'Parent Writing', 'punjabivirsa' ),
        'all_items'           => __( 'All Writings', 'punjabivirsa' ),
        'view_item'           => __( 'View Writing', 'punjabivirsa' ),
        'add_new_item'        => __( 'Add New Writing', 'punjabivirsa' ),
        'add_new'             => __( 'Add New', 'punjabivirsa' ),
        'edit_item'           => __( 'Edit Writing', 'punjabivirsa' ),
        'update_item'         => __( 'Update Writing', 'punjabivirsa' ),
        'search_items'        => __( 'Search Writing', 'punjabivirsa' ),
        'not_found'           => __( 'Not Found', 'punjabivirsa' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'punjabivirsa' ),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'writings', 'punjabivirsa' ),
        'description'         => __( 'Writings and reviews', 'punjabivirsa' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'story' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'writings', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_type_new', 0 );


 // <-----------------------------------------------------for Submit the form  ------------------------------------------------------->


 function admin_area_custom_css() {
  wp_enqueue_style('admin_styles' , get_template_directory_uri().'/assets/admin/stylesheet.css', array(), null, 'all');
//   wp_enqueue_style('admin_styles-awosome' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');
	 
// 	  wp_enqueue_script('custom-change-plugin-cstm','https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');

     if($_GET["page"] == "new_details" || $_GET["page"] == "matrimonial_details" || $_GET['page']=="all_users_details" || $_GET['page']=="all_matrimonial_details" || $_GET['page']=="users_registration")
    {
        wp_enqueue_style('bootstrap_style_admin','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
         wp_enqueue_script('bootstap_js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js');
//            wp_enqueue_script('validation-plugin-cstm','https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js');
// 		 wp_enqueue_script('validation-new-plugn','http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js');
		 
		
           wp_enqueue_script('export-excel-cdn','https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js');
		 
// 		   wp_enqueue_script('validation-plugin-cstms','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js');
		 
// 		  wp_enqueue_script('validation-plugin-cstm','https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js');

        
    }
	 
	  wp_enqueue_script('validation-plugin-cstms','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js');
	 

  wp_enqueue_script('admin_custom_js' , get_stylesheet_directory_uri().'/assets/admin/custom.js',  array ( 'jquery' ),time(),true);
	 
 
// 	 if($_GET['page']=="users_registration"){
		
// 		   wp_enqueue_script('validation-plugin-cstms','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js');
// 	 }
}
add_action('admin_enqueue_scripts', 'admin_area_custom_css' );


 add_action( 'admin_menu', 'wpse_91693_register' );
function wpse_91693_register()
{
    add_menu_page(
        'User Details',   
        'Users Details',  
        'manage_options',  
        'new_details',     
        'wpse_91693_render', 
        'dashicons-chart-pie',
        5 
    );
}
function wpse_91693_render()
{
    global $title;
    global $wpdb;
    $items_per_page = 10;
    $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
    $offset = ( $page * $items_per_page ) - $items_per_page;
    $qa_table = $wpdb->prefix.'new_registration';
    $total_query = "SELECT COUNT(*) FROM $qa_table AS total where Approve_information='unapproved'";
    $total = $wpdb->get_var( $total_query );
    $get_qa = $wpdb->get_results("select * from $qa_table where Approve_information ='unapproved' LIMIT $offset, $items_per_page");
    print '<div class="wrap">';
    print "<h1>$title</h1>";

    echo "<table class='wp-list-table widefat fixed striped table-view-list comments'>";
    echo "<thead>";
    echo "<tr>";
    // echo "<th style='width: 15px;'><input type='checkbox' class='check_all chk1' id='chk_all' /></th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
//     echo "<th>Address</th>";
    echo "<th>Phone Number</th>";
//     echo "<th>Whatsapp Number</th>";
    echo "<th>Payment Proof</th>";
    echo "<th>View Full Profile</th>";
//     echo "<th>Edit Profile</th>";
    echo "<th>Approve/Disapprove</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($get_qa as $row) {
    
    echo "<tr>";
    echo "<td>$row->name</td>";
    echo "<td>$row->email</td>";
//     echo "<td>$row->Local_address</td>";
    echo "<td>$row->number</td>";
//     echo "<td>$row->Whatsapp_number</td>";

		    $supported_image = array(
		    'gif',
		    'jpg',
		    'jpeg',
		    'png'
		);

$ext = strtolower(pathinfo($row->payment, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
if (in_array($ext, $supported_image)) {

	 echo "<td><img data-bs-toggle='modal' data-bs-target='#proof_image' class='proof_screenshot' src=".site_url()."/wp-content/uploads/payment_proof/$row->payment></td>";
   
} else {
   echo "<td>$row->payment</td>";
}
    echo "<td>";
    echo '<button data-bs-toggle="modal" data-bs-target="#full-details-users-'.$row->Id.'" class="full-details-users">Full Profile';
    echo '</button>';
    echo "</td>";
//       echo "<td>";
//     echo '<button data-bs-toggle="modal" data-bs-target="#edit-profile-cstm-'.$row->Id.'" class="edit-profiles"><i class="fa fa-pencil" aria-hidden="true"></i>';
//     echo '</button>';
    echo "</td>";
    echo "<td>";
    echo '<button id="'.$row->Id.'" class="appoved_user_click">Approve';
    echo '</button>';
    echo '<button id="'.$row->Id.'" class="notappoved_user_click">Disapprove/Delete';
    echo '</button>';
    echo "</td>";
    
    echo "</tr>";
    ?>
 
    <?php 
}

	echo "</tbody>";
	echo "<tfoot>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<th>Email</th>";
// 	echo "<th>Address</th>";
	echo "<th>Phone Number</th>";
// 	echo "<th>Whatsapp Number</th>";
	echo "<th>Payment Proof</th>";
	echo "<th>View Full Profile</th>";
// 	echo "<th>Edit Profile</th>";
    echo "<th>Approve/Disapprove</th>";
	echo "</tr>";
	echo "</tfoot>";
	echo "</table>";
	echo '<div class="tablenav-pages">';
	echo paginate_links( array(
	    'base' => add_query_arg( 'cpage', '%#%' ),
	    'format' => '',
	    'prev_text' => __('&laquo;'),
	    'next_text' => __('&raquo;'),
	    'total' => ceil($total / $items_per_page),
	    'current' => $page
	));
	echo '</div>';
	print '</div>';
 foreach ($get_qa as $row) { ?>
   <div class="modal full-details-users" id="full-details-users-<?php echo $row->Id; ?>">
   <div class="modal-dialog">
      <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		      </div>

		      <h3 style="text-align:center ;">Full Details</h3>

		   <table border="5" class="full-details-users-cstm" style="width:100%">
		   	      <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">UserImage:</th>

				    <?php 
				    $user_image_path = $row->image;


				     $user_ext  = pathinfo($user_image_path, PATHINFO_EXTENSION);

				     // echo $user_ext;

				    // echo $ext;

				      if($user_ext == 'pdf'){?>
				      	 <td class="full-details-users-cstm"><iframe src="<?php echo site_url().'/wp-content/uploads/user_images/'.$user_image_path;?>" title="testPdf" height="100%" width="100%"></iframe>
				    </td>

				     <?php }else{



				     ?>
				   

				    <td class="full-details-users-cstm"><img src="<?php echo site_url().'/wp-content/uploads/user_images/'.$row->Image ;?>" ></td>

				       <?php } ?>

				  </tr>
				  <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">Name:</th>
				    <td class="full-details-users-cstm"><?php echo $row->name;?></td>
				  </tr>
				  <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">Email</th>
				    <td class="full-details-users-cstm"><?php echo $row->email; ?></td>
				  </tr>
				   <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">Phone Number</th>
				    <td class="full-details-users-cstm"><?php echo $row->number; ?></td>
				  </tr>
<!-- 				  <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">Local Address</th>
				    <td class="full-details-users-cstm"><?php //echo $row->Local_address; ?></td>
				  </tr> -->
<!--                   <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">Permanent Address</th>
				    <td class="full-details-users-cstm"><?php //echo $row->Permanent_address; ?></td>
				  </tr> -->
				   <tr class="full-details-users-cstm">
				    <th class="full-details-users-cstm">Payment Proof:</th>
				    	<?php

				   	    $supported_image = array(
												    'gif',
												    'jpg',
												    'jpeg',
												    'png'
												);

						$ext = strtolower(pathinfo($row->payment, PATHINFO_EXTENSION)); // Using strtolower to overcome case sens 

						if (in_array($ext, $supported_image)) {

				   	?>
				    <td class="full-details-users-cstm"><img src="<?php echo site_url().'/wp-content/uploads/payment_proof/'.$row->payment ;?>" >


				    </td>
				<?php } else{
					echo "<td>$row->payment</td>";
				} ?>
				  </tr>


		      <!-- Modal body -->
		   
		  </table>

      <!-- Modal footer -->
      </div>
   </div>
</div>

<!-- modal for edit profile popup -->


<?php } ?>

<div class="modal proof_image" id="proof_image">
   <div class="modal-dialog">
      <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body proof_image">
		        <img class="proof_image_modal" src="">
		      </div>



      <!-- Modal footer -->
      </div>
   </div>
</div>
   <!-- Full Profile  -->

	       <style>
/*table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}*/
.full-details-users-cstm{
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<?php }



add_action('wp_ajax_approve_the_users', 'approve_the_users');
add_action('wp_ajax_nopriv_approve_the_users', 'approve_the_users');

function approve_the_users(){

global $wpdb;
	$userid = $_POST['id_check'];

$resut = $wpdb->update('wp_new_registration', array('Approve_information' => 'approved'), array( 'Id' => $userid ));

if($resut){
	echo "save_done";

// 	$n=10;
// function getName($n) {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $randomString = '';
 
//     for ($i = 0; $i < $n; $i++) {
//         $index = rand(0, strlen($characters) - 1);
//         $randomString .= $characters[$index];
//     }
 
//     return $randomString;
// }
 
// $radonamly_password = getName($n);

// <------------------------- User Registration Code ----------------------------------->
  
$membership_table = $wpdb->prefix.'new_registration';

$get_user = $wpdb->get_row("select * from $membership_table where Id= $userid");

$user_name = $get_user->username;

// $last_name = 'himachal';

$password = $get_user->username;;

$user_email = $get_user->password;

// $login = $firstname . $lastname;

$to = $user_email; //sendto@example.com

// $gender = $get_user->gender;

// $current_year = date("Y");

// $member_id = sprintf('%06d', $userid);

$subject = "Welcome in punjabi virsa";

$Number = $get_user->number;

$url = site_url();


	 $body = "Hello Mr. $user_name,<br>
Thanks for joining Punjabi Virsa as our esteemed member.We welocme you to Punjabi Virsa.<br>We are hopeful of your active participation in all the events of Punjabi Virsa.Kindly keep visiting our website  for more details <br>This is your username and password for site login :<br>
    <b>Username:</b>$user_name<br>
    <b>Password:</b>$password<br>
    <b>website name:</b><a href ='$url'>$url</a> <br>
 Best Regards <br>

 President";

$users_data = array(
    'user_login' => $user_name,
    'user_email' => $user_email,
    'first_name' => $user_name,
    'display_name' => $user_name,
    'user_pass' => $password,
    'role' => 'subscriber'
);
$insert_user_data = wp_insert_user($users_data);

// print_r($insert_user_data);

if($insert_user_data){

$wp_user_id = $wpdb->update('wp_new_registration', array('user_id' => "$insert_user_data"), array( 'Id' => $userid ));

if($wp_user_id){

echo "add the user";
}
else{
	echo "not_add";
}
}
else{
	echo "not_add";
}


//  $headers = array('Content-Type: text/html; charset=UTF-8');
      
//  $send_email = wp_mail( $to, $subject, $body, $headers );
	
// 	if($send_email){
		
// 		echo "send_mail";
		
// 	}else{
		
// 		echo "not_send_mail";
// 	}

    }

else{

}
wp_die();
}


// for unapprove the users

add_action('wp_ajax_unapprove_the_users', 'unapprove_the_users');
add_action('wp_ajax_nopriv_unapprove_the_users', 'unapprove_the_users');

function unapprove_the_users(){

global $wpdb;
	 $userid = $_POST['id_check'];

$resut = $wpdb->delete('wp_new_registration',array( 'Id' => $userid ));

if($resut){
	echo "remove";
}
else{
	echo "not_remove";
}
wp_die();
}

 // <------------------------------------------for Submit the form  -------------------------------------------------->

add_action('wp_ajax_post_form_submit_ajax', 'post_form_submit_ajax_function');
add_action('wp_ajax_nopriv_post_form_submit_ajax', 'post_form_submit_ajax_function');
function post_form_submit_ajax_function()
{
		global $wpdb;
	
	if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
       }
//UPLOAD FOLDER FILTER FOR AVATAR
      function avatar_upload_dir( $dirs ) {
        // $dirs['subdir'] = '/avatars';
        $dirs['path'] = $dirs['basedir'] . '/post_images';
        $dirs['url'] = $dirs['baseurl'] . '/post_images';

        return $dirs;
         } 

add_filter( 'upload_dir', 'avatar_upload_dir' );


$_FILES['post_images']['name'] = time() . '-' . $_FILES['post_images']['name'];

$_FILES['post_images']['name'] = str_replace("  ", "-", $_FILES['post_images']['name']);

$_FILES['post_images']['name'] = str_replace(" ", "-", $_FILES['post_images']['name']);


$uploadedfiless = $_FILES['post_images'];
$upload_overridesss = array(
	'test_form' => false
);
$movefile = wp_handle_upload( $uploadedfiless, $upload_overridesss );

echo $payment_proof_image = $uploadedfiless['name'];
// }

remove_filter( 'upload_dir', 'avatar_upload_dir' ); 

echo $post_title = $_POST['post_title'];

echo $full_post_content = $_POST['full_post'];

// echo $email = $_POST['email'];

// echo $password = $_POST['password_custom'];

// $id = $wpdb->get_var( 'SELECT Id FROM ' . $wpdb->prefix . 'membership_userdata' . ' ORDER BY id DESC LIMIT 1');

// $new_id = $id+1;

$results= $wpdb->insert(
        'wp_new_posts',
       array('post_title' => $post_title,'post_images'=>'avtar.png','post_content' => $full_post_content));

//  if($results){
//  	$to = "inderjeet07112000@gmail.com"; //sendto@example.com
// 	$subject = "A new member has applied";
// 	$link =  site_url()."/wp-admin/admin.php?page=new_details";
// 	$body = nl2br("Hello Admin,\n A new member has applied. To approve/disapprove, kindly click the link: $link \n Thank You"); 
// 		$headers = array('Content-Type: text/html; charset=UTF-8');
      
// 	$send_email =wp_mail( $to, $subject, $body, $headers );
	
//  }
 if($results){
 	echo "data_save";
 }
 else{
 	echo "data_not_save";
 }

wp_die();
}
function login_failed() {
  $login_page  = home_url( '/login/' );
  wp_redirect( $login_page . '?login=failed' );
  exit;
}
add_action( 'wp_login_failed', 'login_failed' );
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

function logout_page() {
  $login_page  = home_url( '/login/' );
  wp_redirect( $login_page . "?login=false" );
  exit;
}
add_action('wp_logout','logout_page');

function my_login_redirect( $redirect_to, $request, $user ){
    //is there a user to check?
    global $user;
    if( isset( $user->roles ) && is_array( $user->roles ) ) {
        //check for admins
        if( in_array( "administrator", $user->roles ) ) {
            // redirect them to the default place
            return admin_url( 'edit.php?post_type=page' );
           
        } else {
             //user redirect url
        	 return home_url('/login'); //admin redirect url
        }
    }
    else {
        return $redirect_to;
    }
}
add_filter("login_redirect", "my_login_redirect", 10, 3);


if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'primary_menu' ),
	    	'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

add_action('wp_ajax_form_submit_ajax', 'form_submit_ajax_function');
add_action('wp_ajax_nopriv_form_submit_ajax', 'form_submit_ajax_function');
function form_submit_ajax_function()
{
		global $wpdb;

	if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
       }
//UPLOAD FOLDER FILTER FOR AVATAR
      function avatar_upload_dir( $dirs ) {
        // $dirs['subdir'] = '/avatars';
        $dirs['path'] = $dirs['basedir'] . '/payment_proof';
        $dirs['url'] = $dirs['baseurl'] . '/payment_proof';

        return $dirs;
         } 

add_filter( 'upload_dir', 'avatar_upload_dir' );

// $_FILES['your_image']['name'] = time() . '-' . $_FILES['your_image']['name'];

// $_FILES['your_image']['name'] = str_replace("  ", "-", $_FILES['your_image']['name']);

// $_FILES['your_image']['name'] = str_replace(" ", "-", $_FILES['your_image']['name']);

// $uploadedfile = $_FILES['your_image'];
// $upload_overrides = array(
// 	'test_form' => false
// );
// $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
//  //identity Image
// $_FILES['your_identity']['name'] = time() . '-' . $_FILES['your_identity']['name'];

// $_FILES['your_identity']['name'] = str_replace("  ", "-", $_FILES['your_identity']['name']);

// $_FILES['your_identity']['name'] = str_replace(" ", "-", $_FILES['your_identity']['name']);


// $uploadedfiles = $_FILES['your_identity'];
// $upload_overridess = array(
// 	'test_form' => false
// );
// $movefile = wp_handle_upload( $uploadedfiles, $upload_overridess );



// if (current_user_can( 'administrator' )){ 

// $payment_proof_image = $_POST['payment_proof'];
// }
// else{


$_FILES['payment_proof']['name'] = time() . '-' . $_FILES['payment_proof']['name'];

$_FILES['payment_proof']['name'] = str_replace("  ", "-", $_FILES['payment_proof']['name']);

$_FILES['payment_proof']['name'] = str_replace(" ", "-", $_FILES['payment_proof']['name']);


$uploadedfiless = $_FILES['payment_proof'];
$upload_overridesss = array(
	'test_form' => false
);
$movefile = wp_handle_upload( $uploadedfiless, $upload_overridesss );

echo $payment_proof_image = $uploadedfiless['name'];
// }

remove_filter( 'upload_dir', 'avatar_upload_dir' ); 

echo $username = $_POST['username'];

echo $phone = $_POST['number'];

echo $email = $_POST['email'];

echo $password = $_POST['password_custom'];

// $id = $wpdb->get_var( 'SELECT Id FROM ' . $wpdb->prefix . 'membership_userdata' . ' ORDER BY id DESC LIMIT 1');

// $new_id = $id+1;

$results= $wpdb->insert(
        'wp_new_registration',
       array('number' => $phone,'email' => $email, 'payment'=>$payment_proof_image,'image'=>'test.png', 'username'=>$username,'password'=>$password));

//  if($results){
//  	$to = "inderjeet07112000@gmail.com"; //sendto@example.com
// 	$subject = "A new member has applied";
// 	$link =  site_url()."/wp-admin/admin.php?page=new_details";
// 	$body = nl2br("Hello Admin,\n A new member has applied. To approve/disapprove, kindly click the link: $link \n Thank You"); 
// 		$headers = array('Content-Type: text/html; charset=UTF-8');
      
// 	$send_email =wp_mail( $to, $subject, $body, $headers );
	
//  }
 if($results){
 	echo "data_save";
 }
 else{
 	echo "data_not_save";
 }

wp_die();
}