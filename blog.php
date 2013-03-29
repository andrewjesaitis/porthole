<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

	<div id="mid" class="index">
		
		<!-- Start slider -->
			
			
			<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
			
				<div class="panel" id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
					<div class="panel-wrapper">
						<?php
							$media = get_post_meta($post->ID, 'lead_image', true);
							   
							   	/* Else default behaviour is to display image */ ?>
							   	<?php $size = getimagesize($media);
											
											$image_html = '<img src="%s" alt="" width="%s" height="%s"/>';
							
											//combine the data
											$html = sprintf($image_html,$media,$size[0],$size[1]);
											
											echo $html;
								?>
								
							<? }
						?>
						
						<div class="post-title-margin">						
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><div class="date"><?php echo get_the_time('d'); ?></div><div class="month"><?php echo get_the_time('M'); ?></div>				
						</div>
						<div class="entry">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				
				<?php endwhile; ?>
				//Display Where next slide
				<div class="panel" id="nav-panel">
					<div class="panel-wrapper">
						<img src="<?php echo get_wherenext_image(); ?>" alt="" width="940" height="600" />
						<div class="post-title">
							<a href="<?php bloginfo('rss2_url'); ?>">Where next?</a>
						</div>
						<div class="entry">
							<span class="big"><a href="<?php bloginfo('comments_rss2_url'); ?>" class="rss-big">Recent Comments</a></span>
							<ul><li></li><?php dp_recent_comments(5); ?></ul>
							<span class="big"><span class="left"><?php previous_posts_link('&laquo; Newer Entries') ?></span>
							<span class="right"><?php next_posts_link('Older Entries &raquo;') ?></span></span>
						</div>
					</div>
				</div>
				
			<?php else : ?>
		
			<?php endif; ?>
		
	</div><!-- .mid -->

<?php get_footer(); ?>