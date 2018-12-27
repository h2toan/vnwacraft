<div class="gallery-section">
        <div class="gallery d-md-flex align-items-stretch">
			<?php 
			$galley_args = array(
					'post_parent' 		=> 0,
					'post_type'   		=> 'attachment',
					'post_mime_type' 	=> 'image',
					'posts_per_page' 	=> 5,
					'post_status' 		=> 'any',
					'orderby' 			=> 'rand',
					'order' 			=> 'DESC',
					);
			$galley_query = new WP_Query($galley_args);?>
				<?php if ( $galley_query->have_posts() ) : ?> 
    			<!-- the loop -->
    			<?php while ( $galley_query->have_posts() ) : $galley_query->the_post(); ?>
				<div class="col p-1 gallery-item"><a href="<?php echo wp_get_attachment_url(); ?>"><img class="gallery-thumb" src="<?php echo wp_get_attachment_url(); ?>" alt=""/></a></div>
    			<?php endwhile; ?>
				<!-- end of the loop --> 
    			<?php wp_reset_postdata(); ?> 
				<?php else : ?>
    			<p><?php _e( 'Không có tin mới' ); ?></p>
				<?php endif; ?> 
			</div>
			<div class="news-divider"></div>
		</div>