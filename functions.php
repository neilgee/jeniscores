<?php
/**
 * jeniscores functions and definitions
 *
 * @package jeniscores
 */

if ( ! function_exists( 'jeniscores_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jeniscores_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jeniscores, use a find and replace
	 * to change 'jeniscores' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jeniscores', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'jeniscores' ),
		'secondary' => esc_html__( 'Secondary Menu', 'jeniscores' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		//'image',
		//'video',
		//'quote',
		//'link',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'jeniscores_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	//Allow shortcode in widgets
	add_filter( 'widget_text', 'do_shortcode' );	

	//Remove comment HTML tags
	add_filter( 'comment_form_defaults', 'jeniscores_comment_form_defaults' );
	add_filter( 'comment_form_defaults', 'jeniscores_remove_comment_form_allowed_tags' );

	//Allow PHP in widgets
	add_filter( 'widget_text','jeniscores_execute_php_widgets' );

	//Image sizes
	add_image_size( 'feature-blog', 300, 200, true);


}
endif; // jeniscores_setup
add_action( 'after_setup_theme', 'jeniscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jeniscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jeniscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'jeniscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jeniscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Pre-Header', 'jeniscores' ),
		'id'            => 'preheader',
		'description'   => 'This is the preheader area', 'jeniscores',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right', 'jeniscores' ),
		'id'            => 'header-right',
		'description'   => 'Header Right Area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jeniscores' ),
		'id'            => 'sidebar-1',
		'description'   => 'The Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'After Entry', 'jeniscores' ),
		'id'            => 'after-entry',
		'description'   => 'After Entry widget area',
		'before_widget' => '<aside id="%1$s" class="after-entry widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'jeniscores' ),
		'id'            => 'footer1',
		'description'   => 'Footer 1 Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'jeniscores' ),
		'id'            => 'footer2',
		'description'   => 'Footer 2 Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'jeniscores' ),
		'id'            => 'footer3',
		'description'   => 'Footer 3 Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'jeniscores' ),
		'id'            => 'footer',
		'description'   => 'Footer Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Home Hero', 'jeniscores' ),
		'id'            => 'home-hero',
		'description'   => 'Home Hero Area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Home Optin', 'jeniscores' ),
		'id'            => 'home-optin',
		'description'   => 'Home Optin Area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Home Top', 'jeniscores' ),
		'id'            => 'home-top',
		'description'   => 'Home Top Area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Home Middle', 'jeniscores' ),
		'id'            => 'home-middle',
		'description'   => 'Home Middle Area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Home Bottom', 'jeniscores' ),
		'id'            => 'home-bottom',
		'description'   => 'Home Bottom Area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	) );
}
add_action( 'widgets_init', 'jeniscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jeniscores_scripts() {
	wp_enqueue_script( 'jeniscores-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style ( 'fontawesome' , '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', '' , '4.3.0', 'all' );
	//wp_enqueue_style( 'dashicons' ); //Uncomment if DashIcons required in front end

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jeniscores_scripts' );

/**
 * Enqueue theme style trump.
 */
function jeniscores_main_style() {
	wp_enqueue_style( 'jeniscores-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'jeniscores_main_style', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * TGM-Plugin-Activation
 */
require_once  get_template_directory() . '/plugins.php';


//get me some numeric navigation
//http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/ May 2013
//Amended to have Genesis pagination CSS classes
function jeniscores_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="archive-pagination pagination"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

//Amend Search text
//http://wordpress.stackexchange.com/questions/50321/putting-text-in-the-search-box-eg-search-my-site
//Amended to have no value and use a placeholder attribute instead
function jeniscores_alter_search_form( $form ){
    return '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
    <input type="text"  name="s" id="s" placeholder="Search this website..." />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
}
add_filter( 'get_search_form', 'jeniscores_alter_search_form', 99999 );

//Change the comments header
function jeniscores_comment_form_defaults( $defaults ) {
	$defaults['title_reply'] = __( 'Leave a Comment' );
	return $defaults;
}

//Remove comment form HTML tags and attributes
function jeniscores_remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}

//Allow PHP to run in Widgets
function jeniscores_execute_php_widgets( $html ) {
	if ( strpos( $html, "<" . "?php" ) !==false ) {
	ob_start();
	eval( "?".">".$html );
	$html=ob_get_contents();
	ob_end_clean();
		}
	return $html;
}
