<?php
/*
Template Name: Portfolio
*/
?>


<?php get_header(); ?>


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
												<div class="fade-title">
													<a class="close" href="#">X</a>				
													<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>					
												</div>
											</div>
								
				<?php 
				endif; //closing archive image exclusion
				endif; //closing if execution statement for attachment array
				++$i;
				endforeach; ?>
			</div><!-- .scrollcontainer -->
		</div><!--.scroll -->
</div><!-- .mid -->
<!-- End of Gallery -->

<?php get_footer(); ?>
