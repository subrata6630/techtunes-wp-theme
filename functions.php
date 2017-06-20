<?php
/**
 * Slightly Modified Options Framework
 */
  $data = '';
require_once ('admin/index.php');
//functions for language file
function techtunes_lang_setup(){
    load_theme_textdomain('techtunes', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'techtunes_lang_setup');
//JS
function techtunes_jv_scripts() {
wp_enqueue_script( 'techtunes-menu-style', get_template_directory_uri(). '/js/menu.js', array('jquery'), false, false );
}
add_action( 'wp_enqueue_scripts', 'techtunes_jv_scripts' );
// Change the default Excerpt length
    function techthunes_excerpt_length( $length ) {
        return 40;
    }
    add_filter( 'excerpt_length', 'techthunes_excerpt_length', 999 );
//Seo Friendly Title
function techtunes_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', 'techtunes' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}
add_filter( 'wp_title', 'techtunes_wp_title' );
//comment and main style
function techtunes_scripts() {
wp_enqueue_style( 'techtunes', get_stylesheet_uri() );
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'techtunes_scripts' );

// LogIn - LogOut - Register 
 function techtunes_loginout_link( $items, $args ) {

    global $current_user;
    get_currentuserinfo();

        if (is_user_logged_in() && $args->theme_location == 'primary') {
$items .= '<li><a href="' . wp_logout_url( home_url() ) . '" title="'.__( 'Logout now', 'techtunes' ) .'">'.__( 'Logout', 'techtunes' ) .'</a></li>';
$items .= '  <li><a href="/wp-admin" title="'.__( 'Go to dashboard', 'techtunes' ) .'"><menu-red>'.__( 'Welcome', 'techtunes' ) .'</menu-red>, '.$current_user->display_name.' !</a></li>   '; 
        }
        elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
$items .= '<li><a href="'. site_url('wp-login.php?action=register') .'" title="'.__( 'Register now', 'techtunes' ) .'">'.__( 'Register', 'techtunes' ) .'</a></li>';            
$items .= '<li><a href="'. site_url('wp-login.php?') .'" title="'.__( 'Login now', 'techtunes' ) .'">'.__( 'Login', 'techtunes' ) .'</a></li>';   
        }
        return $items;
    }
add_filter( 'wp_nav_menu_items', 'techtunes_loginout_link', 10, 2 );
//Logo section

function techtunes_custom_header_setup() {
	$args = array(
// height and width
		'height'                 => 90,
		'width'                  => 300,
		'max-width'              => 300,
         'header-text'            => false,

		//lexible height and width.
		'flex-height'            => false,
		'flex-width'             => false,

		// Random image rotation off .
		'random-default'         => false,
        'uploads'                => true,
	    'wp-head-callback'       => '',
	    'admin-head-callback'    => '',
	     'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'techtunes_custom_header_setup' );
function techtunes_widgets_init() {
//sidebars
register_sidebar(array(
'name'=>'head_Sidebar',
'id'        => 'head_Sidebar',
'description' => __( 'Use ad code or image for 568px height and 60px width ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>
',
));
register_sidebar(array(
'name'=>'Blim_Sidebar',
'id'        => 'blim_Sidebar',
'description' => __( 'This section is under search box and upon post and right sidebar in homepage ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>
',
));
register_sidebar(array(
'name'=>'right_Sidebar',
'id'        => 'right_Sidebar',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>
',
));
register_sidebar(array(
'name'=>'top-right_Sidebar',
'id'        => 'top-right_Sidebar',
'description' => __( 'This is ad section near featured post, you can use google adsense or any ad here by using text widget 300*300 ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>
',
));
register_sidebar(array(
'name'=>'slim_Sidebar',
'id'        => 'slim_Sidebar',
'description' => __( 'This is ad section over footer column area ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>
',
));
register_sidebar(array(
'name' => 'Footer Widget 1',
'id'        => 'footer-1',
'description' => __( 'First footer widget area ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 2',
'id'        => 'footer-2',
'description' => __( 'Second footer widget area ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 3',
'id'        => 'footer-3',
'description' => __( 'Third footer widget area ', 'techtunes' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
}
add_action( 'widgets_init', 'techtunes_widgets_init' );

/* function page navi -  */

function techtunes_pagenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 4;
  $args['end_size'] = 1;
  $args['prev_text'] = '&laquo;';
  $args['next_text'] = '&raquo;';
 
  if ($max > 1) echo '</pre>
<div class="wp-pagenavi">';
 if ($total == 1 && $max > 1) $pages = '<span class="pages">'.__( 'page', 'techtunes' ) .'  ' . $current . ' of ' . $max . '</span>';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>
';
}
add_action( 'after_setup_theme', 'techtunes_pagenavi' );

// 	Functions for adding script
function techtunes_setup() {
    add_theme_support( 'custom-background' );
    add_theme_support( 'automatic-feed-links' );
//Thumbnail
add_theme_support( "post-thumbnails" );

// Disable WordPress Admin Bar for all users
if ( ! isset( $content_width ) ) $content_width = 960;
}
add_action( 'after_setup_theme', 'techtunes_setup' );
/* related post */
function techtunes_related_post(){
	$post_id = get_the_ID();
		$args = array(
   			'orderby' => 'rand',
   			'posts_per_page' => 5,
   			'post__not_in' => array( $post_id ),
			'post__not_in' => get_option('sticky_posts'),
		);
	$rand_query = new WP_Query( $args ); ?>
		<ul class="related-post-main">
        <h3><?php _e( 'More articles', 'techtunes' ); ?> </h3>
			<?php while ( $rand_query->have_posts() ) : $rand_query->the_post(); ?>
   			<li>
                 <div class="related-post-rand-img">
				 <?php if ( has_post_thumbnail()) : ?>
                 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('post_thumbnail', array('class' => 'postimg')); ?></a>			
                 <?php else : ?>
                 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default.gif"></a>
                 <?php endif; ?>
                 <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"> <h4><?php the_title() ?></h4></a>
                 </div>
                 </li>
			<?php endwhile; ?>
		</ul>
	<?php wp_reset_postdata();
}
// menu fallback
function techtunes_default_menu() {
	require_once (get_template_directory() . '/includes/default-menu.php');
}
// Register Navigation Menus
function techtunes_register_menus() {
  register_nav_menus(
	array(
	'primary'=>__('Menu', 'techtunes'),
	)
);
}
//register menus
add_action( 'init', 'techtunes_register_menus' );
?>