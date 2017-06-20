<?php if ( is_front_page() ) { ?>
<div id="featured-sidebar">
<div id="sidebar-top-left">
<?php
global $data;
 query_posts('category_name='. $data['h_b_c'] .'&showposts=1'); 
if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="asman"><h2><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h2></div>
	  <div class="selected_thumbnail"><?php the_post_thumbnail('grid-post-image'); ?></div>
	<div class="guru"><?php the_excerpt(); ?></div>	
<div id="s-dva">
<div id="s-ava">
 	<?php echo get_avatar( get_the_author_meta('email'), '50' ); ?>
	</div>

<span class="ftit">  <?php _e( 'Author', 'techtunes' ); ?> : <?php the_author_posts_link(); ?><br/>  <?php _e( 'Category', 'techtunes' ); ?> : <?php the_category(', ');?><br/>  <?php _e( 'Date', 'techtunes' ); ?> : <?php the_time( get_option( 'date_format' ) ); ?></span></br>
  </div>
 
<?php endwhile; ?> <?php wp_reset_query(); ?>
</div>
<div id="sidebar-top-right">
<span class="ads-lebel2"><?php _e(' Advertisement space', 'techtunes'); ?></span>
<?php dynamic_sidebar( 'top-right_Sidebar' ); ?></div>
<?php } ?>
</div>