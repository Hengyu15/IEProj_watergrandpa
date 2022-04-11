<?php

/**
 * Displays posts from two categories in a two block layout.
 */

class PridMag_Dual_Category_Posts extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'pridmag_dual_category_posts', // Base ID
			esc_html__( 'TH: Magazine Posts (Style 3)', 'pridmag' ), // Name
			array( 'description' => esc_html__( 'Displays posts in a two column layout.', 'pridmag' ), ) // Args
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
			'title1'		=>	esc_html__( 'Latest Posts', 'pridmag' ),
			'category1'		=>	'',
			'number_posts1'	=> 4,
			'viewall_text1'	=> esc_html__( 'View All', 'pridmag' ),
			'title2'		=>	esc_html__( 'Latest Posts', 'pridmag' ),
			'category2'		=>	'',
			'number_posts2'	=> 4,	
			'viewall_text2'	=> esc_html__( 'View All', 'pridmag' )
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<!-- Form for category 1 -->
		<h3><?php esc_html_e( 'First Set of Posts', 'pridmag' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php esc_html_e( 'Title:', 'pridmag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo esc_attr($instance['title1']); ?>"/>
		</p>
		<p>
			<label><?php esc_html_e( 'Select a post category', 'pridmag' ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category1'), 'selected' => $instance['category1'], 'show_option_all' => esc_html__( 'Show latest posts', 'pridmag' ), 'class' => 'widefat' ) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number_posts1' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'pridmag' ); ?></label>
			<input type="number" class="tiny-text" id="<?php echo $this->get_field_id( 'number_posts1' ); ?>" name="<?php echo $this->get_field_name( 'number_posts1' ); ?>" value="<?php echo absint( $instance['number_posts1'] ); ?>" size="3"/> 
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'viewall_text1' ); ?>"><?php esc_html_e( 'View All Text:', 'pridmag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'viewall_text1' ); ?>" name="<?php echo $this->get_field_name( 'viewall_text1' ); ?>" value="<?php echo esc_attr( $instance['viewall_text1'] ); ?>"/>
		</p>
		<hr />
		<!-- Form for category 2 -->
		<h3><?php esc_html_e( 'Second Set of Posts', 'pridmag' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php esc_html_e( 'Title:', 'pridmag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo esc_attr($instance['title2']); ?>"/>
		</p>
		<p>
			<label><?php esc_html_e( 'Select a post category', 'pridmag' ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category2'), 'selected' => $instance['category2'], 'show_option_all' => esc_html__( 'Show latest posts', 'pridmag' ), 'class' => 'widefat' ) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number_posts2' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'pridmag' ); ?></label>
			<input type="number" class="tiny-text" id="<?php echo $this->get_field_id( 'number_posts2' ); ?>" name="<?php echo $this->get_field_name( 'number_posts2' ); ?>" value="<?php echo absint( $instance['number_posts2'] ); ?>" size="3"/> 
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'viewall_text2' ); ?>"><?php esc_html_e( 'View All Text:', 'pridmag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'viewall_text2' ); ?>" name="<?php echo $this->get_field_name( 'viewall_text2' ); ?>" value="<?php echo esc_attr( $instance['viewall_text2'] ); ?>"/>
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
		$instance[ 'title1' ] = sanitize_text_field( $new_instance[ 'title1' ] );	
		$instance[ 'category1' ]	= absint( $new_instance[ 'category1' ] );
		$instance[ 'number_posts1' ] = (int)$new_instance[ 'number_posts1' ];
		$instance[ 'viewall_text1' ] = sanitize_text_field( $new_instance[ 'viewall_text1' ] );
		$instance[ 'title2' ] = sanitize_text_field( $new_instance[ 'title2' ] );	
		$instance[ 'category2' ]	= absint( $new_instance[ 'category2' ] );
		$instance[ 'number_posts2' ] = (int)$new_instance[ 'number_posts2' ];
		$instance[ 'viewall_text2' ] = sanitize_text_field( $new_instance[ 'viewall_text2' ] );
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

		$title1 = ( ! empty( $instance['title1'] ) ) ? $instance['title1'] : '';
        $title1 = apply_filters( 'widget_title', $title1 , $instance, $this->id_base );
		$number_posts1 = ( ! empty( $instance['number_posts1'] ) ) ? absint( $instance['number_posts1'] ) : 4;
		$category1 = ( isset( $instance['category1'] ) ) ? absint( $instance['category1'] ) : '';
		$viewall_text1 = ( ! empty( $instance['viewall_text1'] ) ) ? $instance['viewall_text1'] : '';
		$title2 = ( ! empty( $instance['title2'] ) ) ? $instance['title2'] : '';
        $title2 = apply_filters( 'widget_title', $title2 , $instance, $this->id_base );
		$number_posts2 = ( ! empty( $instance['number_posts2'] ) ) ? absint( $instance['number_posts2'] ) : 4;
		$category2 = ( isset( $instance['category2'] ) ) ? absint( $instance['category2'] ) : '';
		$viewall_text2 = ( ! empty( $instance['viewall_text2'] ) ) ? $instance['viewall_text2'] : '';

		// Latest Posts 1
		$latest_posts1 = new WP_Query( 
			array(
				'cat'	                => $category1,
				'posts_per_page'	    => $number_posts1,
				'post_status'           => 'publish',
				'ignore_sticky_posts'   => 1,
				)
		);	

		// Latest Posts 2
		$latest_posts2 = new WP_Query( 
			array(
				'cat'	                => $category2,
				'posts_per_page'	    => $number_posts2,
				'post_status'           => 'publish',
				'ignore_sticky_posts'   => 1,
				)
		);	
	
    echo $before_widget; 

?>
		<!-- Category 1 -->
		<div class="th-dualc-left">
			<?php 
				if ( ! empty( $title1 ) ) {
					echo $before_title . $title1 . $after_title;
				}

				pridmag_viewall_link( $category1, $viewall_text2 );
			?>

            <?php $hmp_count = 1; ?>
            <?php 
                if ( $latest_posts1 -> have_posts() ) :
                    while ( $latest_posts1 -> have_posts() ) : $latest_posts1 -> the_post(); ?>
                    <?php if( $hmp_count == 1) { ?>
                        
                        <div class="thbd-post">
                            <?php if ( has_post_thumbnail() ) { ?>
								<div class="thb-thumb">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail( 'pridmag-featured' ); ?>
									</a>
								</div><!-- thb-thumb -->
                            <?php } ?>

                            <?php pridmag_category_list(); ?>

                            <?php the_title( '<h3 class="thb-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>						

                            <div class="thb-entry-meta">
								<?php 
									pridmag_posted_on(); 
									pridmag_posted_by();
									pridmag_comments_link();
								?>
                            </div><!-- .entry-meta -->

                            <div class="thb-entry-summary"><?php the_excerpt(); ?></div>
                        </div><!-- .thbd-post -->

                    <?php } else { ?>
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
                                <p class="ths-meta"><?php pridmag_posted_on(); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php $hmp_count++ ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

		</div><!-- .hm-dualc-left -->


		<!-- Category 2 -->

		<div class="th-dualc-right">
			<?php 
				if ( ! empty( $title2 ) ) {
					echo $before_title . $title2 . $after_title;
				}
				pridmag_viewall_link( $category2, $viewall_text2 );
			?>

			<?php $hmp_count = 1 ?>
				
            <?php 
            if ( $latest_posts2 -> have_posts() ) :				
                while ( $latest_posts2 -> have_posts() ) : $latest_posts2 -> the_post(); ?>
                <?php if( $hmp_count == 1 ) { ?>

                    <div class="thbd-post">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="thb-thumb">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'pridmag-featured' ); ?>
								</a>
							</div><!-- thb-thumb -->
                        <?php } ?>

                        <?php pridmag_category_list(); ?>

                        <?php the_title( '<h3 class="thb-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>						
                        
                        <div class="thb-entry-meta">
							<?php 
								pridmag_posted_on(); 
								pridmag_posted_by();
								pridmag_comments_link();
							?>
                        </div><!-- .entry-meta -->
                        <div class="thb-entry-summary"><?php the_excerpt(); ?></div>
                    </div><!-- .thbd-post -->
                    
                <?php } else { ?>

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
                            <p class="ths-meta"><?php pridmag_posted_on(); ?></p>
                        </div>
                    </div>

                <?php } ?>
                    <?php $hmp_count++ ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

		</div><!--.hm-dualc-right-->


<?php
	echo $after_widget;

	}

}

// register pridmag dual category posts widget
function pridmag_register_dual_category_posts() {
    register_widget( 'PridMag_Dual_Category_Posts' );
}
add_action( 'widgets_init', 'pridmag_register_dual_category_posts' );