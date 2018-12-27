<?php
/* 
 * Current Version: 1.0.0 (27/12/18)
 */ ?>

<?php
if ( ! isset( $content_width ) ) { //khai báo width tối đa
	$content_width = 620;
}
if ( ! function_exists( 'war3vn_theme_setup' ) ) { //khai báo các hàm chức năng mặc định của theme
	function war3vn_theme_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size ( 'vnw-thumb', 500, 500);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
add_action ( 'init', 'war3vn_theme_setup' );		
}
// Khai báo News Slot Taxonomy
function news_slot () {

	$labels = array(
		'name'                       => _x( 'Vị trí tin', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Vị trí tin', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Vị trí tin', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'				 => true,
	);
	register_taxonomy( 'news', array( 'post' ), $args );

}
add_action( 'init', 'news_slot', 0 );
// Khai báo Wiki Category
function wiki_category () {

	$labels = array(
		'name'                       => _x( 'Wiki Category', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Wiki Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Wiki Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'				 => true,
	);
	register_taxonomy( 'wiki_category', array( 'wiki' ), $args );

}
add_action( 'init', 'wiki_category', 0 );
// Register Wiki Post type
function wiki() {

	$labels = array(
		'name'                  => _x( 'Wiki', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Wiki', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Wiki', 'text_domain' ),
		'name_admin_bar'        => __( 'Wiki', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
		$rewrite = array(
		'slug'                  => 'wiki',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Wiki', 'text_domain' ),
		'description'           => __( 'Bài thuộc dạng Wiki', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'post_tag','wiki_tags' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-admin-site',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'               => $rewrite,
		'show_in_rest'          => true,
	);
	register_post_type( 'wiki', $args );
}
add_action( 'init', 'wiki', 0 );
function war3vn_style () { // Hook các css vào header
	wp_enqueue_style( 'main-style', get_stylesheet_uri() ); //style.css
	wp_enqueue_style( 'boot-trap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' ); //bootrap css
	wp_enqueue_style( 'font-Spectral', 'https://fonts.googleapis.com/css?family=Spectral+SC'); //font Spectral google
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
	wp_enqueue_style( 'font', get_stylesheet_directory_uri() . "/core/css/font.css"); //font Book Antiqua google
	wp_enqueue_style( 'magpop', get_stylesheet_directory_uri() . "/core/css/magnific-popup.css"); //mag popup plugin
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'war3vn_style' );

// Thay độ dài của excerpt
function new_excerpt_length($length) {
return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');
 
// Bỏ nút readmore mặc đinh của excerpt
function new_excerpt_more($more) {
return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Hàm check xem thư mục có thư mục con hay không
function have_child( $category_id ) {
	$args = array (
					'taxonomy' 	=> 'category',
					'parent'	=> $category_id,
					);
			$child_list = get_terms ( $args );
	
	return (!empty($child_list));
}
// Template tags tự động sinh ra 1 nav link cho thư mục
function nav_category ($cat_name) {
			$category_name = $cat_name;
			$category_id = get_cat_ID( $category_name );
			$category_link = get_category_link( $category_id );
			$args = array (
					'taxonomy' 	=> 'category',
					'parent'	=> $category_id,
					);
			$child_list = get_terms ( $args );			
			if (have_child($category_id) ) {
			echo '<li class="nav-item dropdown">';
			echo '<a title ="'.$category_name.'"class="nav-link dropdown-toggle" href="' . esc_url( $category_link ) . '" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $category_name . '</a>';
			echo '<ul class="bg-drop-down dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';
				foreach ($child_list as $child) {
					$child_id = $child->term_id;
					$child_name = $child->name;
					$child_link = get_category_link( $child_id );
					$args = array (
						'taxonomy' 	=> 'category',
						'parent'	=> $child_id,
						);
					$child_list = get_terms ( $args );	
					if (have_child ($child_id) ) {
						echo '<li class="dropdown-submenu">';
						echo '<a class="dropdown-item" href="'. esc_url( $child_link ).'">'.$child_name.'</a>';
						echo '<ul class="bg-drop-down dropdown-menu">';
							$args = array (
								'taxonomy' 	=> 'category',
								'parent'	=> $child_id,
								);
							$child2_list = get_terms ( $args );
							foreach ($child2_list as $child2) {
							$child2_id = $child2->term_id;
							$child2_name = $child2->name;
							$child2_link = get_category_link( $child2_id );
							if (have_child ($child2_id) ) {
								echo '<li class="dropdown-submenu">';
								echo '<a class="dropdown-item" href="'. esc_url( $child2_link ).'">'.$child2_name.'</a>';
								echo '<ul class="bg-drop-down dropdown-menu">';
									$args = array (
										'taxonomy' 	=> 'category',
										'parent'	=> $child2_id,
										);
									$child3_list = get_terms ( $args );									
									foreach ($child3_list as $child3) { 
										$child3_id = $child3->term_id;
										$child3_name = $child3->name;
										$child3_link = get_category_link( $child3_id );
										echo '<a class="dropdown-item" href="'. esc_url( $child3_link ).'">'.$child3_name.'</a>';
									}
								echo '</ul>';
								echo '</li>';
							}
							else {
								echo '<a class="dropdown-item" href="'. esc_url( $child2_link ).'">'.$child2_name.'</a>';
							}
							}
							echo '</ul>';
							echo '</li>';
					}
					else {
						echo '<a class="dropdown-item" href="'. esc_url( $child_link ).'">'.$child_name.'</a>';
					}
				}
				echo '</ul>';
				echo '</li>';
			}
			else {
				echo '<li class="nav-item">';
				echo '<a title ="'.$category_name.'"class="nav-link" href="' . esc_url( $category_link ) . '">' . $category_name . '</a>';
				echo '</li>';
			}
	}
?>