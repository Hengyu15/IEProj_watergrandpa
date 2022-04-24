<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package NoriumPortfolio
 */

get_header();
?>


		<section class="error-404 not-found">
			<div class="page-breadcumb breadcum">
				<div class="container">
					<div class="row">
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="oliva-breadcum">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( '404 Error!', 'noriumportfolio' ); ?></h1>
								
							</header><!-- .page-header -->
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-xl-9 col-md-9">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'noriumportfolio' ); ?></h1>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'noriumportfolio' ); ?></p>
						</header><!-- .page-header -->
					</div>
					<div class="col-lg-3 col-xl-3 col-md-3">
						<div class="page-content">

								<?php

								the_widget( 'WP_Widget_Recent_Posts' );
								?>

								<div class="widget widget_categories">
									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'noriumportfolio' ); ?></h2>
									<ul>
										<?php
										wp_list_categories(
											array(
												'orderby'    => 'count',
												'order'      => 'DESC',
												'show_count' => 1,
												'title_li'   => '',
												'number'     => 10,
											)
										);
										?>
									</ul>
								</div><!-- .widget -->

								<?php
								/* translators: %1$s: smiley */
								$norium_portfolio_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'noriumportfolio' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$norium_portfolio_archive_content" );

								the_widget( 'WP_Widget_Tag_Cloud' );
								?>

						</div><!-- .page-content -->
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->



<?php
get_footer();
