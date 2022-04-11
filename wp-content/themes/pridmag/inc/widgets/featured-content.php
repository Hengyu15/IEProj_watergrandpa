<?php

/**
 * Displays latest, category wised posts.
 *
 */

class PridMag_Featured_Content extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'pridmag_featured_content', // Base ID
			esc_html__( 'TH: Featured Content', 'pridmag' ), // Name
			array( 'description' => esc_html__( 'Displays posts in style.', 'pridmag' ), ) // Args
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
		$defaults = array(
			'category'		=>	'all'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

	<p>
		<label><?php esc_html_e( 'Select a post category', 'pridmag' ); ?></label>
		<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => esc_html__( 'Show latest posts', 'pridmag' ), 'class' => 'widefat' ) ); ?>
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
		$instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
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
		$category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
		$latest_posts = new WP_Query( 
			array(
                'cat'					=>	$category,
                'ignore_sticky_posts' 	=>	true,
				'posts_per_page'		=>	5,
				'post_status'			=>	'publish'
			)
		);	

		echo $before_widget;
		
		?>

		<div class="pridmag-featured-content">
			<?php $thp_count = 1; ?>
			<?php 
				if ( $latest_posts -> have_posts() ) :
				
				while ( $latest_posts -> have_posts() ) : $latest_posts -> the_post();

					if ( $thp_count === 1 ) { ?>
					
					<div class="pmf-big-post-container">

						<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'pridmag-featured' ); ?></a>
						<?php } else { ?>
							<?php $pridmag_default_image = get_template_directory_uri() . '/images/featured-big.png'; ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url( $pridmag_default_image ); ?>"></a>
						<?php } ?>

                        <div class="pmfb-details">
                            <?php the_title( '<h3 class="pmfb-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        </div><!-- .pmfb-details -->
					</div><!-- .pmf-big-post-container -->

					<div class="pmf-small-posts-container">

				<?php } else { ?>

					<div class="pm-featured-small">
						<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'pridmag-grid' ); ?></a>
						<?php } else { ?>
							<?php $pridmag_default_image = get_template_directory_uri() . '/images/featured-small.png'; ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url( $pridmag_default_image ); ?>"></a>
						<?php } ?>
						<div class="pmfs-details">
							<?php the_title( sprintf( '<h3 class="pmfs-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						</div>
					</div>

					<?php
						if( $thp_count === 3 ) {
							echo '<div class="th-seperator"></div>';
						} // endif;
					?>

				<?php } // endif;
				
				$thp_count++; 
			endwhile;
			wp_reset_postdata(); ?>

			</div><!-- .pmf-small-posts-container -->

			<?php endif; ?>
		
			</div><!-- .pridmag-featured-content -->

	<?php
		echo $after_widget;
	}

}

// Register single category posts widget
function pridmag_register_featured_content() {
    register_widget( 'PridMag_Featured_Content' );
}
add_action( 'widgets_init', 'pridmag_register_featured_content' );