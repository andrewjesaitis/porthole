<?php
/*
Template Name: Splash
*/
?>
<?php get_header(); ?>
<div id="mid">
	<div id="slideshow">
		<?php if (have_posts()) : ?>
			<div class="preloader"></div>
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
				
				<?php if (is_array($attachments)) : //make sure there are attachments ?>
					
					<?php foreach($attachments as $att) : //loop through them ?>
				
		
					<?php
								//find the one we want based on its characteristics
								if ( $att->menu_order == 0){
									$image_src_array = wp_get_attachment_image_src($att->ID, true);

									//get url - 1 and 2 are the x and y dimensions
									$url = $image_src_array[0];
									$caption = $att->post_excerpt;
									$image_html = '<img src="%s" alt="%s"/>';

									//combine the data
									$html = sprintf($image_html,$url,$caption,$class);

									//echo the result
									echo $html;
								}				
					?>

			
			<?php endforeach; ?>
			<?php endif; ?>
			
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>