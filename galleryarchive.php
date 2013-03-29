<?php
/*
Template Name: Gallery Archive
*/
?>

<?php get_header(); ?>

<?php $parent = $post->ID; ?>
<?php query_posts('post_type=page&post_parent='.$parent); //make new call to sql db to get posts ?> 

	<div id="mid" class="archive">
		
		<!-- Start slider -->
		<div class="scroll">
			<div class="scrollContainer">
			
			<?php if (have_posts()) : ?>
				<?php $c=0; ?>
				
				<?php while (have_posts()) : the_post(); ?>
			
				<?php if ($c==0) : ?>
					<div class="panel">
				<?php endif; ?>
				
				<div class="panel-wrapper-archive">
					<?php $image = get_post_meta($post->ID, 'archive_image', true); if ($image=="") { $image = get_post_meta($post->ID, 'lead_image', true); } ?>
					<img src="<?php echo $image; ?>" alt="" height="172" />
					<div class="post-title-margin">						
						<a class="galleryarchive" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>				
					</div>
					
				</div>
				
				<?php $c++; if ($c==7){ $c=0; ?>
					</div>
				<?php } ?>
				<?php endwhile; ?>
				<?php if ($c!=0) : ?>
				</div>
				<?php endif; ?>
				
			<?php else : ?>
		
			<?php endif; ?>
	
			</div>
		</div>
		
	</div><!-- .mid -->
<?php get_footer(); ?>