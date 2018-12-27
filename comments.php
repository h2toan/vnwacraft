<h3 id="comments" class="comment">Bình luận</h3>
<?php
		  // Khai báo tham số để lấy comment. Chỉ lấy comment được approve của post đó 
			$id = get_the_ID();
		  	$args = array(
    			'status' => 'approve',
				'post_id' => $id,
			);
 
		  // Loop comment
		  	$comments_query = new WP_Comment_Query;
		  	$comments = $comments_query->query( $args );
	foreach ($comments as $comment) {
		if ($comment->comment_parent == "0") { ?>
			<!-- Phun comment ra -->
			<div class="media p-3">
				<!-- Avatar -->
				<img src="<?php echo get_avatar_url($comment);?>" alt="" class="mr-3" style="width:40px;">
				<div class="media-body">
					<!-- Name author -->
					<h4 class="cmt-name"><?php echo get_comment_author(); ?></h4>
					<!-- Post date -->
					<p class="cmt-stamp">Posted on <?php echo get_comment_date(); ?></p>
					<!-- Nội dung cmt -->
					<p class="cmt-content"><?php echo get_comment_text(); ?></p>
				<?php 
					// Lấy link để reply cmt
					$post_id = get_the_ID();
					$comment_id =get_comment_ID();
					//get the setting configured in the admin panel under settings discussions "Enable threaded (nested) comments  levels deep"  
					$max_depth = get_option('thread_comments_depth');
					//add max_depth to the array and give it the value from above and set the depth to 1
					$default = array(
    					'add_below'  => 'comment',
    					'respond_id' => 'respond',
    					'reply_text' => __('Trả lời'),
    					'login_text' => __('Đăng nhập để trả lời'),
    					'depth'      => 1,
    					'before'     => '',
    					'after'      => '',
    					'max_depth'  => $max_depth
							);
					// Gọi link comment reply
                    $a = get_comment_reply_link($default,$comment_id,$post_id);
					// Rồi phun ra
					echo '<button class="btn btn-outline-success btn-sm" role="button">'.$a.'</button>';?>
				<?php
					// Khai báo tham số gọi child cmt
					$arg_child = array (
						'parent' => $comment_id,
						'post_id' => get_the_ID(),
						);
					// Gọi mảng child cmt
					$childs = get_comments( $arg_child );
					// Loop mảng rồi phun child cmt ra với Avatar - Tên - Post date - Content
					foreach ($childs as $child) { 
						if ($child) { 
						$child_id = $child->comment_ID;?>
						<div class="media p-3">
							<img src="<?php echo get_avatar_url($child);?>" alt="" class="mr-3" style="width:40px;">
							<div class="media-body">
								<h4 class="cmt-name"><?php echo get_comment_author($child_id); ?></h4>
								<p class="cmt-stamp">Posted on <?php echo get_comment_date('',$child_id); ?></p>
								<p class="cmt-content"><?php echo get_comment_text($child_id); ?></p>
							</div>
						</div>
						<?php }
					} ?>
				</div>
	 		</div>
		<?php }		
	} ?>
<!-- Mục nhập bình luận -->
<?php
// Gọi mảng chứa các giá trị của user đang cmt
$commenter = wp_get_current_commenter();
// Gọi option bắt buộc name email
$req = get_option( 'require_name_email' );
// if else short hand
$aria_req = ( $req ? " aria-required='true'" : '' );
// Các trường nhập khi user chưa log in
$fields =  array(
  	'author' =>
    '<input type="text" class="form-control my-2" id="author" name="author" placeholder="Nickname">',	
	'email' =>
    '<input type="text" class="form-control my-2" id="email" name="email" placeholder="Email">',
	);
// Các tham số của hàm comment form
$comments_args = array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        // Đổi title nút submit
        'label_submit' => __( 'Voodoo', 'textdomain' ),
		'class_submit' => 'btn btn-outline-success my-2 my-md-2 float-right',
        // Đổi title khu vực bình luận
		  'must_log_in' => '<p class="must-log-in">' .
    		sprintf(
      			__( 'Bạn phải <a href="%s">đăng nhập</a> để bình luận.' ),
      			wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    			) . '</p>',
	  			'logged_in_as' => '<p class="logged-in-as">' .
    		sprintf(
    			__( 'Đang đăng nhập với tên <a href="%1$s">%2$s</a>. <a href="%3$s" title="Đăng xuất?">Đăng xuất?</a>' ),
      			admin_url( 'profile.php' ),
      			$user_identity,
      			wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    			) . '</p>',
        'title_reply' => __( '', 'textdomain' ),
		'title_reply_to' => __( '<span class="text-primary">Trả lời bình luận của %s </span>' ),
		'title_reply_before' => __( ''),
		'cancel_reply_link' => __( '<span class="text-danger">Hủy</span>' ),
		'comment_notes_before' => '<p class="comment-notes">' .
				__( 'Thông tin của bạn sẽ được bảo mật.' ) . ( $req ? $required_text : '' ) .
    			'</p>',
        // Xóa vùng "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Style lại vùng nhập cmt
        'comment_field' => '<textarea id="comment" name="comment" class="form-control my-2" rows="5" placeholder="Bình luận"></textarea>',		
);
// Hàm gọi comment form
comment_form( $comments_args ); ?>