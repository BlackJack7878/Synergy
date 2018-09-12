<?php 

add_action('wp_enqueue_scripts', 'en_frontend_enqueue');

function en_frontend_enqueue() {
	// CSS
	wp_enqueue_style('style_css', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600|Raleway:300,300i,400,600');
	// Javascript Files
	wp_enqueue_script('jquery');

	wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/7ad8b7c6ab.js', '', true);
	wp_enqueue_script('numbers-js', get_template_directory_uri() . '/assets/js/jquery.animateNumber.js', array(), false);
	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), false);
	wp_enqueue_script('waypoints-js', get_template_directory_uri() . '/assets/js/waypoints.js', array(), false);
	wp_enqueue_script('frontend-js', get_template_directory_uri() . '/assets/js/main.js', array(), false);
}

add_theme_support('menus');
add_action('init', 'en_register_theme_menus');

function en_register_theme_menus() {
	register_nav_menus(array(
		'header-menu' => 'Header menu',
		'footer-menu' => 'Footer menu'
		)); 
}

function en_header_menu() {
	wp_nav_menu(array(
		'theme_location'  => 'header-menu',
		'menu'            => '', 
		'container'       => false, 
		'container_class' => '', 
		'container_id'    => '',
		'menu_class'      => '', 
		'menu_id'         => '',
		'echo'            => 1,
		'fallback_cb'     => '__return_false',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0
		));
}

function en_footer_menu() {
	wp_nav_menu(array(
		'theme_location'  => 'footer-menu',
		'menu'            => '', 
		'container'       => '', 
		'container_class' => '', 
		'container_id'    => '',
		'menu_class'      => '', 
		'menu_id'         => '',
		'echo'            => 1,
		'fallback_cb'     => '__return_false',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0
		));
}

function misha_my_load_more_scripts() {

	global $wp_query; 

	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/assets/js/myloadmore.js', array('jquery'), '', true );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	// wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
	// 	'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
	// 	'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
	// 	'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
	// 	'max_page' => $wp_query->max_num_pages
	// ) );

	wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$tests = array();
	$i = 1;

	query_posts( $args );
	if( have_posts() ) :

		while( have_posts() ): the_post();

			$tests[$i]['num'] = $the_query->current_post;
			$tests[$i]['content'] = get_the_content();
			$tests[$i]['author'] = get_field('test_author');
			$i++;

		endwhile;
	endif;
	echo json_encode($tests);
	die;
}
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

?>