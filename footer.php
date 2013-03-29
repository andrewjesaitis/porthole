<div id="footer">
<?php if(is_page('archive') || is_home() || is_single()) : ?>
<span id="siteinfo">
		<a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>  |  <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a><br />
</span>
<?php endif; ?>

</div>

<?php wp_footer(); ?>
</div><!--Closing id="container"-->
</div> <!--Closing id="centercontent"-->
</div> <!--Closing id="page"-->
</body>
<!-- Load Scripts-->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/menu.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.hoverIntent.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.tabSlideOut.v1.3.js" type="text/javascript"> </script>

<script>
$(document).ready(function(){
	$('.slide-out-div').tabSlideOut({
    tabHandle: '.handle',                              //class of the element that will be your tab
    pathToTabImage: '<?php bloginfo('template_directory'); ?>/images/twittertab.png',          //path to the image for the tab *required*
    imageHeight: '80px',                               //height of tab image *required*
    imageWidth: '40px',                               //width of tab image *required*    
	});
	});
</script>

<!--Load JS Slider Scripts if needed-->
<?php if(is_page('archive') || is_home() || in_category('Gallery') || is_page_template('portfolio.php')) : ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo-1.4.2-min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.serialScroll-1.2.2-min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/slider.js" type="text/javascript"></script>
<?php endif; ?>

<!--Load JS slide show for splash-->
<?php if(is_page('Splash')) : ?>
<script src="<?php bloginfo('template_directory'); ?>/js/slideswitch.js" type="text/javascript"></script>
<?php endif; ?>

</html>
