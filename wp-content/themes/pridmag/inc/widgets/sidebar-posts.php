<?php

/**
 * Displays latest or category wised posts list.
 *
 */

class PridMag_Sidebar_Posts extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'pridmag_sidebar_posts', // Base ID
			esc_html__( 'TH: Sidebar Posts', 'pridmag' ), // Name
			array( 'description' => esc_html__( 'Displays latest posts or posts from a choosen category. Use this widget in the main sidebar or footer sidebars.', 'pridmag' ), ) // Args
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {
		//print_r($instance);
		$defaults = array(
			'title'		=>	esc_html__( 'Latest Posts', 'pridmag' ),
			'category'	=>	'all',
			'number_posts'	=> 5,
			'viewall_text'	=> esc_html__( 'View All', 'pridmag' )
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pridmag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label><?php esc_html_e( 'Select a post category', 'pridmag' ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => esc_html__( 'Show latest posts', 'pridmag' ) ) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number of posts:', 'pridmag' ); ?></label>
			<input type="number" class="tiny-text" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' );?>" value="<?php echo absint( $instance['number_posts'] ) ?>" size="3"/> 
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'viewall_text' ); ?>"><?php esc_html_e( 'View All Text:', 'pridmag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'viewall_text' ); ?>" name="<?php echo $this->get_field_name( 'viewall_text' ); ?>" value="<?php echo esc_attr( $instance['viewall_text'] ); ?>"/>
		</p>

	<?php

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );	
		$instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
		$instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
		$instance[ 'viewall_text' ] = sanitize_text_field( $new_instance[ 'viewall_text' ] );
		return $instance;
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	
	public function widget( $args, $instance ) {
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';	
        $title = apply_filters( 'widget_title', $title , $instance, $this->id_base );
		$category = ( ! empty( $instance['category'] ) ) ? absint( $instance['category'] ) : 0;
		$number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 5;
		$viewall_text = ( ! empty( $instance['viewall_text'] ) ) ? $instance['viewall_text'] : '';

		// Latest Posts
		$latest_posts = new WP_Query( 
			array(
				'cat' 					=>	$category,
				'posts_per_page' 		=>	$number_posts,
				'post_status'			=>	'publish',
				'ignore_sticky_posts' 	=>  1
			)
		);	

		echo $before_widget; ?>
		<div class="pridmag-category-posts">
		<?php
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			pridmag_viewall_link( $category, $viewall_text );

		?>

		
		<?php if( $latest_posts -> have_posts() ) : ?>	
			<?php while ( $latest_posts -> have_posts() ) : $latest_posts -> the_post(); ?>
					<div class="ths-post">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="ths-thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">	
									<?php the_post_thumbnail( 'pridmag-thumbnail' ); ?>
								</a>
							</div>
						<?php } ?>
						<div class="ths-details">
							<?php the_title( sprintf( '<h3 class="ths-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
							<p class="ths-meta">
								<?php pridmag_posted_on(); ?>
							</p>
						</div>
					</div><!-- .ths-post -->
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
        
        </div><!-- .pridmag-category-posts -->


	<?php
		echo $after_widget;
	}

}

// Register single category posts widget
function pridmag_register_sidebar_posts() {
    register_widget( 'PridMag_Sidebar_Posts' );
}
add_action( 'widgets_init', 'pridmag_register_sidebar_posts' );