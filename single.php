<?php get_header(); ?>
 
<div id="main">
  
  <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 	   <h1><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h1>
		              <!--BEGIN .author-bio-->

<div class="author-bio">
<div class="cava">
			<?php echo get_avatar( get_the_author_meta('email'), '75' ); ?>
	  </div>
			<div class="author-info">
				<?php
				// could be
printf( '<h1 class="author-title">' . __( 'Written by: <a href="%s">%s</a>', 'techtunes' ) . '</h1>', 
        esc_url( get_author_posts_url( get_the_author_meta( 'id' ) ) ), 
        get_the_author_meta( 'nicename' ) 
);
?>
				<br/>
				<p class="author-description"><b><?php _e( 'About', 'techtunes' ); ?> : </b> <?php the_author_meta('description'); if(!get_the_author_meta('description')) _e('This author may not interusted to share anything with others','techtunes'); ?></p>
							
			</div>
<!--END .author-bio--> </div>
 	  <span> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'techtunes'); ?> | <?php _e( 'Date', 'techtunes' ); ?> : <?php the_time( get_option( 'date_format' ) ); ?> | <?php _e( 'Category', 'techtunes' ); ?> : <?php the_category(',');?> </span> | <?php _e( 'Comment', 'techtunes' ); ?> : 	<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'techtunes' ) . '</span>', __( '1 Reply', 'techtunes' ), __( '% Replies', 'techtunes' ) ); ?> | <?php edit_post_link( __( 'Edit', 'techtunes' ), '<span class="edit-link">', '</span>' ); ?>
<div id="sinup">
<?php global $data; echo $data ['logo_ads']; ?></div>
<?php the_content(); ?>	
<div id="sinup">
<?php global $data; echo $data ['bogo_ads']; ?></div>
<?php the_tags( '<p> tags: ',',','</p> '); ?>
<?php wp_link_pages(); ?>
<div class="clearfix post-navigation">
<?php previous_post_link('<span class="nav-previous">%link</span>',__( '&larr; previous article', 'techtunes' ) ); ?>
<?php next_post_link('<span class="nav-next">%link</span>',__( 'next article &rarr;', 'techtunes'  ) ); ?>
</div> <!-- .post-navigation -->
<?php if ($data ['relatopo']): ?>
<?php techtunes_related_post(); ?>
 <?php endif; ?>
 <?php if ($data ['enable_disable_blog_comments']): ?>
			<?php comments_template(); ?>
			      <?php endif; ?>
    <hr>
    <?php endwhile; else: ?>
    <?php _e('Sorry, no posts matched your criteria.','techtunes'); ?>
    <?php endif; ?>
  </div>
<div id="delimiter"></div></div></div>
<?php get_footer(); ?>