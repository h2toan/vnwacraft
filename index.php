<?php
/*
 * Current Version 1.0.0 (27/12/18)
 * */
?>

<?php
get_header(); ?>
<div class="container head-section head-bg">
 <?php get_template_part( 'templates/navbar'); ?>
</div>
<div class="divider"></div>
<div class="container p-0">
  <div class="leaf-border">
    <div class="leaf-corner">
      <div class="news-section">
        <div class="row flex-row-reverse">
          <div class="col-md">
            <div class="row">
                 <?php 
				  // query tiêu điểm
				  $args_feature_news = array(
    				'post_type' => 'post',
					'posts_per_page' => 2,
				    'tax_query' => array(
						array(
							'taxonomy' => 'news',
							'field'    => 'slug',
							'terms'    => 'Tin tiêu điểm',
						),
					),
				  ); 
				  $query_feature_news = new WP_Query($args_feature_news); ?> 
				<?php if ( $query_feature_news->have_posts() ) : ?> 
    			<!-- the loop -->
    			<?php while ( $query_feature_news->have_posts() ) : $query_feature_news->the_post(); ?>
        		<div class="col-md-6 featured-post-section">	
				  <div class="featured-post-thumb"><a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {echo get_the_post_thumbnail( get_the_ID(), 'vnw-thumb', array( 'class' => 'fp-img' ) );}?></a></div>
                <div class="featured-post-headline">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <div class="featured-post-des">
                    <p><?php $ex = get_the_excerpt(); echo $ex; echo '...&nbsp;<a class="badge badge-primary" href="' . get_the_permalink() . '">Đọc bài</a>';?></p>
                  </div>
                </div>
				</div>  	
    			<?php endwhile; ?>
				<!-- end of the loop --> 
    			<?php wp_reset_postdata(); ?> 
				<?php else : ?>
    			<p><?php _e( 'Không có tin mới' ); ?></p>
				<?php endif; ?>                             
            </div>
            <div class="row mt-3">
                <?php 
				  // query tiêu điểm phụ
				  $args_feature_news_2 = array(
    				'post_type' => 'post',
					'posts_per_page' => 4,
				    'tax_query' => array(
						array(
							'taxonomy' => 'news',
							'field'    => 'slug',
							'terms'    => 'Tin tiêu điểm phụ',
						),
					),
				  ); 
				  $query_feature_news_2 = new WP_Query($args_feature_news_2); ?> 
				<?php if ( $query_feature_news_2->have_posts() ) : ?> 
    			<!-- the loop -->
    			<?php while ( $query_feature_news_2->have_posts() ) : $query_feature_news_2->the_post(); ?>
              	<div class="col-md featured-post-section-2">
                <div class="featured-post-2-thumb">
					<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {echo get_the_post_thumbnail( get_the_ID(), 'vnw-thumb', array( 'class' => 'fp-img' ) );}?></a></div>
                <div class="featured-post-2-headline">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
              	</div> 	
    			<?php endwhile; ?>
				<!-- end of the loop --> 
    			<?php wp_reset_postdata(); ?> 
				<?php else : ?>
    			<p><?php _e( 'Không có tin mới' ); ?></p>
				<?php endif; ?>
            </div>
            <div class="row mt-3">
				 <?php 
				  // query wiki post
				  $args_wiki = array(
    				'post_type' => 'wiki',
					'posts_per_page' => 1,
					'orderby' => 'rand',
					'order' => 'DESC',
				  ); 
				  $query_wiki = new WP_Query($args_wiki); ?> 
				<?php if ( $query_wiki->have_posts() ) : ?> 
    			<!-- the loop -->
    			<?php while ( $query_wiki->have_posts() ) : $query_wiki->the_post(); ?>
              <div class="col-md-4 featured-post-3-thumb"><a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {echo get_the_post_thumbnail( get_the_ID(), 'vnw-thumb', array( 'class' => 'fp-img' ) );}?></a></div>
              <div class="col-md">
                <div class="featured-post-3-headline">
                  <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                </div>
                <?php $categories = get_the_terms($post->ID,'wiki_category');
							if ( ! empty( $categories ) ) {
    						echo '<a href="' . esc_url( get_term_link( $categories[0]->term_id ) ) . '" class="badge badge-warning">' . esc_html( $categories[0]->name ) . '</a>';} ?>
                <div class="featured-post-3-des mt-1">
                  <p><?php $ex = get_the_excerpt(); echo $ex; echo '...&nbsp;<a class="badge badge-primary" href="' . get_the_permalink() . '">Đọc bài</a>';?></p>
                </div>
              </div>	
    			<?php endwhile; ?>
				<!-- end of the loop --> 
    			<?php wp_reset_postdata(); ?> 
				<?php else : ?>
    			<p><?php _e( 'Không có tin mới' ); ?></p>
				<?php endif; ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="news-col-section">
              <ul>
			 <?php 
				  // query tin cột trái
				  $args_news_col = array(
    				'post_type' => 'post',
					'posts_per_page' => 6,
				    'tax_query' => array(
						array(
							'taxonomy' => 'news',
							'field'    => 'slug',
							'terms'    => 'Tin cột trái',
						),
					),
				  ); 
				  $query_news_col = new WP_Query($args_news_col); ?> 
				<?php if ( $query_news_col->have_posts() ) : ?> 
    			<!-- the loop -->
    			<?php while ( $query_news_col->have_posts() ) : $query_news_col->the_post(); ?>
        			<li><?php $categories = get_the_category();
							if ( ! empty( $categories ) ) {
    						echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="badge badge-info">' . esc_html( $categories[0]->name ) . '</a>';} ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    			<?php endwhile; ?>
				<!-- end of the loop --> 
    			<?php wp_reset_postdata(); ?> 
				<?php else : ?>
    			<p><?php _e( 'Không có tin mới' ); ?></p>
				<?php endif; ?>                
              </ul>
            </div>
          </div>
        </div>        
      </div>
      <div class="news-divider"></div>
      <div class="video-section">
        <div class="video-gallery d-md-flex align-items-center">
          <div class="col-md-6 p-0">
            <?php
					$video_arg = array(
    				'post_type' => 'post',
					'posts_per_page' => 1,
				    'tax_query' => array(
						array(
							'taxonomy' => 'news',
							'field'    => 'slug',
							'terms'    => 'Video tiêu điểm',
						),
					),
				  );
				$video_query = new WP_Query( $video_arg );
					if ( $video_query->have_posts() ) :
						while ( $video_query->have_posts() ) : $video_query->the_post();
							$url = get_post_meta(get_the_ID(),'video-url');
						parse_str(parse_url($url[0],PHP_URL_QUERY),$vid_id);
						$vid_id = $vid_id[v]; ?>
			  <a class="video-youtube" href="<?php echo $url[0];?>"><img class="video-youtube-thumb" src="https://img.youtube.com/vi/<?php echo $vid_id;?>/maxresdefault.jpg" alt=""/></a>
				<?php endwhile;
			wp_reset_postdata();
			else : echo 'Không có tin';
			endif;?>			  
			</div>
          <div class="col-md-6">
             <div class="row">
				<?php
					$video_arg = array(
    				'post_type' => 'post',
					'posts_per_page' => 4,
				    'tax_query' => array(
						array(
							'taxonomy' => 'news',
							'field'    => 'slug',
							'terms'    => 'Video Side',
						),
					),
				  );
				$video_query = new WP_Query( $video_arg );
					if ( $video_query->have_posts() ) :
						while ( $video_query->have_posts() ) : $video_query->the_post();
							$url = get_post_meta(get_the_ID(),'video-url');
							parse_str(parse_url($url[0],PHP_URL_QUERY),$vid_id);
							$vid_id = $vid_id[v]; ?>
						<div class="col-md-6 side-video">
                		<a class="video-youtube-side" href="<?php echo $url[0];?>"><img class="video-youtube-thumb" src="https://img.youtube.com/vi/<?php echo $vid_id;?>/maxresdefault.jpg" alt=""/></a>                 	
						</div>
				<?php endwhile; ?>
			</div>            
				<?php wp_reset_postdata();
				else : echo 'Không có tin';
				endif;?>
            </div>
        </div>
      </div>
	</div>
 </div>
</div>	
<?php
get_footer(); ?>