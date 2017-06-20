<?php get_header(); ?>
 
<div id="main">
   
  
  <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 	  <h3><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h3>
		    <?php the_content(); ?>
			<?php wp_link_pages(); ?>
		 <?php if ($data ['enable_disable_page_comments']): ?>
		<?php comments_template(); ?>
	 <?php endif; ?>
    <hr>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.', 'techtunes'); ?></p>
    <?php endif; ?>
  </div>
<div id="delimiter"></div></div></div>
<?php get_footer(); ?>