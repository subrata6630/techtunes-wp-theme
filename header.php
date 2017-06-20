<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="viewport" content="width=device-width">
<!-- Favicon -->
    <link rel="shortcut icon" href="
					<?php global $data; ?>
					<?php if($data['favicon']): ?>
					<?php echo esc_url( $data['favicon'] ); ?>
					<?php else: ?>
					<?php echo get_template_directory_uri(); ?>/images/favicon.ico
					<?php endif; ?>">
<?php echo $data['code_head']; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container">

<div id="header">
<?php if ( get_header_image() ) : ?>
    <div class='site-logo'>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a></div>

<?php else : ?>
        <div class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a>
    </div>

<?php endif; ?>

<div id="search">
<div id="header-widget">
<?php dynamic_sidebar( 'head_Sidebar' ); ?> 
  </div>

         </div>

</div>



</div>

    <div id="navigation-wrap">

    	<div id="navigation" class="clearfix">

			<?php wp_nav_menu( array(

			'theme_location' => 'primary',

			'sort_column' => 'menu_order',

			'menu_class' => 'sf-menu',

            'fallback_cb' => 'techtunes_default_menu'

			)); ?>

      	</div>

        <!-- END navigation -->

    </div>

    <!-- END navigation-wrap -->

<div id="wrapper">