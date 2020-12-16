<?php

// Creating the widget 
class jp_widget extends WP_Widget {
	  
	function __construct() {

		parent::__construct(
		  
			// Base ID of your widget
			'jp_widget', 
			  
			// Widget name will appear in UI
			__("Today's Word", 'jp_assignment'), 
			  
			// Widget override_wordription
			array( 'override_wordription' => __( "This widget will appear with a title, and pulls the word from 'word' post type ", 'jp_assignment' ), )
		
		);
		
	}
	  
	// Creating widget front-end
	  
	public function widget( $args, $instance ) {
			
		$title = apply_filters( 'widget_title', $instance['title'] );
		$override_word = apply_filters( 'widget_override_word', $instance['override_word'] );
		  
		// before and after widget arguments are defined by themes
		
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		  
		// This is where you run the code and display the output
		$override_word = apply_filters('the_content', $override_word);
		$override_word = str_replace( ']]>', ']]&gt;', $override_word );
		if(!empty($override_word)){
			
			echo '<div class="word-box">'.__( $override_word, 'jp_assignment' ).'</div>';
			
		}else{
			
			echo '<div class="word-box load-todays-word">
			<img src="'.plugin_dir_url( __FILE__ ).'/images/loader.gif"/>
			</div>';
			
		}
		
		?>
		<div class="tw_searchBox">
			<input type="text" placeholder="Find a Word"/>
			<span>X</span>
		</div>
		<?php
		
		echo $args['after_widget'];
		
	}
			  
	// Widget Backend 
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'jp_assignment' );
		}
		if ( isset( $instance[ 'override_word' ] ) ) {
			$override_word = $instance[ 'override_word' ];
		}
		else {
			$override_word = __( '', 'jp_assignment' );
		}

		// Widget admin form
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'override_word' ); ?>"><?php _e( 'Word Override:' ); ?></label> 
		<textarea class="widefat mceEditor" id="<?php echo $this->get_field_id( 'override_word' ); ?>" name="<?php echo $this->get_field_name( 'override_word' ); ?>" /><?php echo esc_attr( $override_word ); ?></textarea>
		</p>
		
	<?php 
	}
		  
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['override_word'] = ( ! empty( $new_instance['override_word'] ) ) ? strip_tags( $new_instance['override_word'] ) : '';
		return $instance;
	
	}
	 
// Class wpb_widget ends here
}

// Register and load the widget and registering sidebar
function jp_load_widget() {
	register_widget( 'jp_widget' );
}
add_action( 'widgets_init', 'jp_load_widget' );
?>