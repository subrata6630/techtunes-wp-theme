<?php get_header(); ?>
 <div id="main">
  <?php get_sidebar ('featured') ; ?>

<!-------------------------search Bar ------------------------------------------------------->
<div id="farch">
<?php get_search_form(); ?>
</div>
<!--------------------------- End S b ------------------------------------------------->
       
 
	<div id="content_rss">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post-entry-date">

    <div class="tha">
<?php echo get_avatar( get_the_author_meta('email'), '60' ); ?>
	</div>
    <div class="tha-1">
	<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'techtunes'); ?>
	
	</br>
	<?php _e( 'Author', 'techtunes' ); ?> :  <?php the_author_posts_link(); ?>
</br>
        <span id="wppvp_tv_2983">
<?php _e( 'Date', 'techtunes' ); ?> : <?php the_time( get_option( 'date_format' ) ); ?>
        </span>
	</div>
    <div class="tha-2">
<?php _e( 'Category', 'techtunes' ); ?> : <?php the_category(',');?>
</br>
 <?php _e( 'Comment', 'techtunes' ); ?> : 	<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'techtunes' ) . '</span>', __( '1 Reply', 'techtunes' ), __( '% Replies', 'techtunes' ) ); ?>
       </br>
	  <?php _e( 'Edit', 'techtunes' ); ?> : | <?php edit_post_link( __( 'Edit', 'techtunes' ), '<span class="edit-link">', '</span>' ); ?> |
</div>
</div>
        	 <h3><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h3>
       			   
        <div class="excerpt_thumbnail">
			<a href="<?php the_permalink(' ') ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('shadows-post-image'); ?></a>
        </div>
        <!-- END post-entry-featured-image -->

    <div class="post-entry-content">
						<?php the_excerpt(); ?>
						</div>
</div>
			<hr>	
      
    <?php endwhile; ?>
<?php else : ?>
    <?php _e('Sorry, no posts matched your criteria.','techtunes'); ?>
    <?php endif; ?>
<?php techtunes_pagenavi(); ?>  
	</div>
	 <?php get_sidebar('right'); ?>
	 <div id="slim">
	 <?php dynamic_sidebar( 'slim_Sidebar' ); ?> </div>
<div id="delimiter"> </div>  </div></div>
<?php get_footer(); ?>