<?php get_header(); ?>

	<div id="mid" class="archive">
		
		<!-- Start slider -->
		<div class="coda-slider-panel-wrapper">
			<div class="coda-slider preload" id="coda-slider-1">
			
			<?php if (have_posts()) : ?>
				<?php $c=0; ?>
				
				<?php while (have_posts()) : the_post(); ?>
			
				<?php if ($c==0) : ?>
					<div class="panel">
				<?php endif; ?>
				
				<div class="panel-wrapper-archive">
					<?php $image = get_post_meta($post->ID, 'archive_image', true); if ($image=="") { $image = get_post_meta($post->ID, 'lead_image', true); } ?>
					<img src="<?php echo $image; ?>" alt="" width="270" height="172" />
					<div class="post-title-margin">						
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><div class="date"><?php echo get_the_time('d'); ?></div><div class="month"><?php echo get_the_time('M'); ?></div>				
					</div>
					<div class="postmetadata-archive">
					Filed under: <?php the_category(', ') ?> | 
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
					</div>
					
				</div>
				
				<?php $c++; if ($c==6){ $c=0; ?>
					</div>
				<?php } ?>
				<?php endwhile; ?>
				<?php if ($c!=0) : ?>
				</div>
				<?php endif; ?>
				
			<?php else : ?>
			
				<h2>No posts matched your criteria.</h2>
		
			<?php endif; ?>
	
			</div><!-- .panelContainer -->
		</div><!--.coda-slider-panel-wrapper -->
		
	</div><!-- .mid -->
	<?php if (have_posts()) : ?>
		<div class="stripNavL" id="stripNavL0">&laquo;</a></div>
		<div class="stripNavR" id="stripNavR0">&raquo;</a></div>
	<?php endif; ?>
<?php get_footer(); ?>