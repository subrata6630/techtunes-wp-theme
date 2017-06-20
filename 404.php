<?php
/**
techtunes Standard 404 page 
 */
?>
<?php get_header(); ?>
<div id="error-page" class="post full-width">	
	<h1 id="error-p-title">404</h1>			
	<p id="error-p-text"><?php _e('Unfortunately, the page you tried accessing could not be found. Please visit the','techtunes'); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e('homepage','techtunes'); ?></a>.</p>
</div>
<!-- /error-page -->
<?php get_footer(); ?> 