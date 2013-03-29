<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="mid" class="single">
		<div class="panel-single" id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
			<div class="panel-wrapper">
				<?php $image = get_post_meta($post->ID, 'single_image', true); if ($image=="") { $image = get_post_meta($post->ID, 'lead_image', true); }
				$media_type = get_post_meta($post->ID, 'lead_type', true);
				if ($media_type != 'flash') { ?>
					<img src="<?php echo $image; ?>" alt="" width="940" height="300" />
				<? } ?>
				<div class="post-title">
					<a style="margin: 0px" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
			<div id="thepost">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
					
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<br/>
				<?php the_tags( '<p>Filled under: ', ', ', '</p>'); ?>
			</div>			
		</div>
		<div class="clearer"></div>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
