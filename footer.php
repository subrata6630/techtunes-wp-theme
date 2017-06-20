<div id="footer-wrap">
<div id="footer-bottom">
<div class="fotter-sub-menu">
<li><?php _e("Designed by", "techtunes"); ?></li>
<li><a href="http://wordpress.org" title="Powered by"><?php _e("WordPress", "techtunes"); ?></a></li>
<li><?php _e("Theme", "techtunes"); ?></li>
<li><?php _e("Techtunes", "techtunes"); ?></li>
</div>            
<div class="copyright">
&copy; <?php echo date('Y'); ?> <?php _e(' All right resarved', 'techtunes'); ?>
</div>
<!-- END copyright -->
<a href="http://carifahmad.blogspot.com" title="Desinged by">
<div class="fotter-logo">
</div></a>
<!-- END Footer Logo -->    	
<div class="clear"></div>
</div>
<!-- END footer-bottom -->

</div>
<!-- END irb-footer-wrap -->

</div>
<?php global $data; ?>
<?php if ($data ['top']): ?>
<!-- END footer -->
<a href="#" class="go-top"><?php _e('&#8593; Top', 'techtunes'); ?> </a>
 <?php endif; ?>
</div> <!-- footer -->
<?php echo $data['google_analytics']; ?>
<!-- WP Footer -->
<?php wp_footer(); ?>
</body>
</html>