<?php
/*
 * Current Version: 1.0.0 (27/12/18)
 * */
?>

<?php // Gọi Header
get_header(); ?>
<!-- Phần ảnh Cover và Title -->
<div class="container head-section head-bg">
  <!-- Gọi Navbar -->
	<?php get_template_part( 'templates/navbar'); ?>
</div>
<div class="divider"></div>
<!-- Phần nội dung -->
<div class="container p-0">
  <div class="leaf-border">
    <div class="leaf-corner">
		<!-- Phần tiêu điểm -->
		<div class="news-section">
		  <div class="row">
		    <!-- Post tiêu điểm chính -->
		    <div class="col-md-6">
		      <?php
				$cat_arg = array(
    				'post_type' => 'post',
					'posts_per_page' => 1, // Lấy 1 post tiêu điểm mới nhất
				    'category_name' => $wp_query->query[category_name], // Thuộc category đang duyệt
				  );
				$cat_query = new WP_Query($cat_arg);											 
			?>
		      <?php if ( $cat_query->have_posts() ) : // Nếu có post thì
					while ( $cat_query->have_posts() ) : $cat_query->the_post(); // Bắt đầu loop lấy bài?> 
		      <!-- Ảnh đại diện của bài -->
		      <div class="top-fap-thumb"><a href="<?php the_permalink(); ?>"><img class="fp-img" src="<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url( 'full' );} else { ?><?php echo get_stylesheet_directory_uri(); ?>/assets/img/BattleCry-Panoramic.jpg<?php } ?>" alt=""/></a></div>
		      <!-- Headline của bài -->
		      <div class="featured-post-headline">
		        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		        <!-- Summary của bài -->
		        <div class="featured-post-des">
		          <p><?php $ex = get_the_excerpt(); echo $ex;?></p>
	            </div>
		        <!-- Button đọc thêm -->
		        </div>
		      <?php endwhile; // Hết loop ?>
		      <?php wp_reset_postdata(); // Đưa các giá trị trở về main loop (không cần thiết) ?>
		      </div>
		    <!-- Post tiêu điểm phụ -->
		    <div class="col-md-6">
		      <?php 
				$cat_arg = array( // Khai báo tham số thứ 2 để loop tiếp
    				'post_type' => 'post',
					'posts_per_page' => 4, 
				    'category_name' => $wp_query->query[category_name],
					'offset' => 1, // Lấy 4 bài tiếp theo tính từ bài đầu tiên
				  );
				$cat_query = new WP_Query($cat_arg); ?>
		      <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); // Bắt đầu loop ?>
		      <!-- Xoay ngang nội dung -->
		      <div class="d-flex mb-3">
		        <!-- Thumb của bài -->
		        <div class="side-fap-thumb col-4 p-0"><a href="<?php the_permalink(); ?>"><img class="fp-img" src="<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url( 'full' );} else { ?><?php echo get_stylesheet_directory_uri(); ?>/assets/img/BattleCry-Panoramic.jpg<?php } ?>" alt=""/></a></div>
		        <!-- Tiêu đề -->
		        <div class="col-8">
		          <h2 class="side-fap-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		          <div class="fap-post-des">
		            <p><?php $ex = get_the_excerpt(); echo $ex;?></p>
		            </div>
		          <!-- và button xem thêm -->
		          </div>
		        </div>
		      <?php endwhile; // Hết loop ?>
		      <?php wp_reset_postdata(); // Đưa giá trị về main loop (vẫn không cần thiết) ?>
		      </div>
		    </div>
		  <div class="news-divider"></div>
		  <!-- Phần duyệt post -->
		  <div class="row">
		    <!-- Cột nội dung các post -->
		    <div class="col">
		      <?php			  	
			  	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Gán giá trị thứ tự trang. Gán = 1 khi đang ở trang đầu tiên
			  	$offset = $paged * 5; // Bắt đầu từ bài số (trang * 5) để tránh trùng bài.
				$cat_arg = array(
    				'post_type' => 'post',
					'posts_per_page' => 5,
				    'category_name' => $wp_query->query[category_name],
					'paged' => $paged,
					'offset' => $offset,
				  );
				$cat_query = new WP_Query($cat_arg);
			  	$max_page = $cat_query->max_num_pages - 1; // Gán giá trị số trang tối đa
				?>
		      <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); // Bắt đầu loop ?>
		      <div class="d-flex mb-3">
		        <!-- Ảnh thumb của bài -->
		        <div class="col-4 p-0"><a href="<?php the_permalink(); ?>"><img class="fp-img" src="<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url( 'full' );} else { ?><?php echo get_stylesheet_directory_uri(); ?>/assets/img/BattleCry-Panoramic.jpg<?php } ?>" alt=""/></a></div>
		        <!-- Headline của bài -->
		        <div class="fap-post-headline col-8">
		          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		          <!-- Mô tả của bài -->
		          <div class="fap-post-des">
		            <p><?php $ex = get_the_excerpt(); echo $ex; echo '...&nbsp;<a class="badge badge-primary" href="' . get_the_permalink() . '">Đọc bài</a>';?></p>
	              </div>
	            </div>
	          </div>
		      <?php endwhile; // Hết loop ?>
		      <?php wp_reset_postdata(); // Trả các biến về giá trị của main loop (Vẫn không cần thiết) ?>
		      <!-- Phần pagination -->
		      <ul class="pagination justify-content-center mt-3">
		        <!-- Button trang đầu. Nếu đang ở trang đầu thì disabled -->
		        <li class="page-item <?php $prev = $paged - 1; if ($prev == 0) {echo disabled;} ?>"><a class="pagi-link page-link" href="<?php echo get_category_link($wp_query->query_vars[cat]); ?>">Trang đầu</a></li>
		        <!-- Button trang -2. Nếu ở trang đầu hoặc trang 2 thì hidden -->
		        <li class="page-item <?php $prev = $paged - 2; if ($prev < 1) {echo hidden;} ?>"><a class="pagi-link page-link" href="<?php echo get_category_link($wp_query->query_vars[cat]).'page/'.$prev; ?>"><?php echo $prev;?></a></li>
		        <!-- Button trang -1. Nếu ở trang đầu thì hidden -->
		        <li class="page-item <?php $prev = $paged - 1; if ($prev == 0) {echo hidden;} ?>"><a class="pagi-link page-link" href="<?php echo get_category_link($wp_query->query_vars[cat]).'page/'.$prev; ?>"><?php echo $prev;?></a></li>
		        <!-- Button trang hiện tại -->
		        <li class="page-item disabled"><a class="pagi-link page-link" href="#"><?php echo $paged;?></a></li>
		        <!-- Button trang +1. Nếu ở trang cuối thì hidden -->
		        <li class="page-item <?php $next = $paged + 1; if ($next > $max_page) {echo hidden;} ?>"><a class="pagi-link page-link" href="<?php echo get_category_link($wp_query->query_vars[cat]).'page/'.$next; ?>"><?php echo $next;?></a></li>
		        <!-- Button trang +2. Nếu ở trang áp cuối thì hidden -->
		        <li class="page-item <?php $next = $paged + 2; if ($next > $max_page) {echo hidden;} ?>"><a class="pagi-link page-link" href="<?php echo get_category_link($wp_query->query_vars[cat]).'page/'.$next; ?>"><?php echo $next;?></a></li>
		        <!-- Button trang cuối. Nếu ở trang cuối thì hidden -->
		        <li class="page-item <?php if ($max_page == $paged or $max_page < 0) {echo disabled;} ?>"><a class="pagi-link page-link" href="<?php echo get_category_link($wp_query->query_vars[cat]).'page/'.$max_page; ?>">Trang cuối</a></li>
	          </ul>
		      </div>
			  <!-- Phần banner cột phải (nếu có) -->
		    <div class="archive-banner col-3"></div>
		    </div>
	  </div>
		<?php else : ?>
   	  <p><?php _e( 'Không có tin mới' ); // Nếu không có bài thì echo ?></p>
		<?php endif; ?>
    </div>
  </div>
</div>
<?php // Gọi Footer
get_footer(); ?>