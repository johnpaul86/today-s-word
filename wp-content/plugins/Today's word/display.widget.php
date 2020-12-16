<?php
add_action("wp_ajax_tw_display_word", "tw_display_word");
add_action("wp_ajax_nopriv_tw_display_word", "tw_display_word");

function tw_display_word(){
	/**
	 * Setup query to show the ‘word’ post type with ‘1’ post.
	 * Output the title.
	 */
	$args_ = array(  
		'post_type' => 'word',
		'post_status' => 'publish',
		'posts_per_page' => 1, 
		'orderby' => 'ID', 
		'order' => 'DESC', 
	);
	$word = '';

	$loop = new WP_Query( $args_ ); 
		
	while ( $loop->have_posts() ) : $loop->the_post();
		$word = get_the_title();
	endwhile;

	wp_reset_postdata();
	
	echo $word;
	exit;
	
}
add_action("wp_ajax_tw_fetch_word", "tw_fetch_word");
add_action("wp_ajax_nopriv_tw_fetch_word", "tw_fetch_word");

function tw_fetch_word(){
	/**
	 * Setup query to show the ‘word’ post type with ‘1’ post.
	 * Output the title.
	 */

	$args_ = array(  
		'post_type' => 'word',
		'post_status' => 'publish',
		'posts_per_page' => 5, 
		'orderby' => 'ID', 
		'order' => 'DESC',
		's' => $_POST['word']
	);
	$word = '';

	$loop = new WP_Query( $args_ ); 
		
	while ( $loop->have_posts() ) : $loop->the_post();
		echo '<p>'. the_title() .'</p>';
	endwhile;

	wp_reset_postdata();
	exit;
	
}
?>
