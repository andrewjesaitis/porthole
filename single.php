<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php 		$gallery = get_post_custom_values(gallery);
			if ($gallery[0] == "yes") : //checks if its a gallery post ?>

<div id="mid">
		<div class="scroll">
			<div class="scrollContainer">

	<!-- Start slider -->	
			<?php
			//setup the attachment array
				$att_array = array(
					'post_parent' => $post->ID,
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'order_by' => 'menu_order'
				);

				//get the post attachments
				$attachments = get_children($att_array);
			?>
									
				<?php foreach($attachments as $att) : //loop through them and count ?>
						
					
							<?php

										//find the one we want based on its characteristics
										if ( $att->menu_order == 0) :
											$image_src_array = wp_get_attachment_image_src($att->ID, true);
											$size = getimagesize($image_src_array[0]);
											
											//get url - 1 and 2 are the x and y dimensions
											$url = $image_src_array[0];
											$caption = $att->post_excerpt;
											$image_html = '<img src="%s" alt="%s" width="%s" height="%spx"/>';
							
		
											//combine the data
											$html = sprintf($image_html,$url,$caption,$size[0],$size[1]);
											if ($size[1] > 200) : 
							?>				
							
											<div class="panel"> 
												  <div class="panel-wrapper">
							<?php 
											//echo the result
											echo $html;
															
							?>
												</div>
												<div class="fade-title-margin">
													<a class="close" href="#">X</a>				
													<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><div class="date"><?php echo get_the_time('d'); ?></div><div class="month"><?php echo get_the_time('M'); ?></div>					
												</div>
											</div>
								
				<?php 
				endif; //closing archive image exclusion
				endif; //closing if execution statement for attachment array
				++$i;
				endforeach; ?>
		</div>
	</div>
</div><!-- .mid -->
<!-- End of Gallery -->

<?php else :  //else display post title display for posts without a gallery ?>
				<div id="mid" class="single">
					<div class="panel-single" id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
						<div class="panel-wrapper">
							<?php $image = get_post_meta($post->ID, 'single_image', true); if ($image=="") { $image = get_post_meta($post->ID, 'lead_image', true); }
							$media_type = get_post_meta($post->ID, 'lead_type', true);
						    if ($media_type != 'flash') { ?>
									<img src="<?php echo $image; ?>" alt="" width="940" height="300" />
							<? } ?>
							<div class="post-title-margin">						
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><div class="date"><?php echo get_the_time('d'); ?></div><div class="month"><?php echo get_the_time('M'); ?></div>					
							</div>				
						</div>
					</div>
				</div>
			<?php endif; ?>
	
	<div id="content">
			<div id="thepost">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
					
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<br/>
				<?php the_tags( '<p>Filed under: ', ', ', '</p>'); ?>
			</div>
			<div id="thecomments">
				<?php comments_template(); ?>
			</div>
			
		</div>
		<div class="clearer"></div>
	</div>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
