<?php
/*
 * Current Version 1.0.0 (27/12/18)
 * */
?>
<!-- Lấy ảnh đại diện làm ảnh cover của post -->
<div class="container head-section head-cover-post" style="background-image:url(<?php echo ( has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(),'full') : get_stylesheet_directory_uri().'/assets/img/BattleCry-Panoramic.jpg' ); ?>);">
<div class="post-head-info">
	<h1 class="post-title"><?php the_title(); ?></h1>
	<p class="post-description"><?php $ex = get_the_excerpt(); echo $ex;?></p></div>  
	<?php get_template_part( 'templates/navbar'); ?>
</div>
<div class="divider"></div>
<div class="container p-0">
  <div class="leaf-border">
    <div class="leaf-corner">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
          <div class="post-content col">		
            <div class="post-body">
              <?php the_content(); ?>
            </div>
          </div>
  </div>
		<div class="post-info">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="post-author col-md"><?php the_author(); ?></a>
			<a href="<?php
					 $archive_year  = get_the_time('Y');
					 $archive_month = get_the_time('m');
					 $archive_day   = get_the_time('d');?>
					 <?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>" class="post-date col-md"><?php echo get_the_date(); ?></a>
			<?php $categories = get_the_category();
				if ( ! empty( $categories ) ) {
    			echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="post-category col-md">' . esc_html( $categories[0]->name ) . '</a>';
				} ?>
			<a href="<?php comments_link(); ?>" class="post-leave-cmt col-md">Bình luận</a>
		</div>
		<?php 	$tags = get_the_tags();
				$html = '<div class="tag mt-2"><span>Tags: </span>';
		  if (is_array($tags) || is_object($tags)) {
				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );			
					$html .= "<a href='{$tag_link}' title='{$tag->name}' class='badge badge-success'>";
					$html .= "{$tag->name}</a>&nbsp";
					} }
				$html .= '</div>';
				echo $html;?>		  
          <div class="news-divider"></div>
<div class="form-group col-7 p-0 clearfix">
	<?php // If comments are open or we have at least one comment, load up the comment template.
 if ( comments_open() || get_comments_number() ) :
     comments_template();	
 endif; ?>
</div>
		</div>
	  </div>
</div>