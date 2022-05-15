<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<div id="form_reports_page" class="frm_wrap frm_charts">
	<div class="frm_page_container">
	<?php
	FrmAppHelper::get_admin_header( array(
		'label' => __( 'Reports', 'formidable-pro' ),
		'form'  => $form,
		'close' => remove_query_arg( 'frm-full' ),
	) );

	$class = 'odd';
	?>
	<div class="frm-inner-content wrap">
		<div class="frmcenter">
		<div class="postbox">
			<div class="inside">
				<h3><?php esc_html_e( 'Submissions', 'formidable-pro' ); ?></h3>
				<b><?php echo count( $entries ); ?></b>
			</div>
		</div>
		<?php if ( isset( $submitted_user_ids ) ) { ?>
			<div class="postbox">
				<div class="inside">
					<h3><?php esc_html_e( 'Users Submitted', 'formidable-pro' ); ?></h3>
					<b><?php echo count( $submitted_user_ids ); ?> (<?php echo round( ( count( $submitted_user_ids ) / count( $user_ids ) ) * 100, 2 ); ?>%)</b>
				</div>
			</div>
		<?php } ?>
		<div class="clear"></div>
		</div>

        <?php
		if ( isset( $data['time'] ) ) {
			?>
			<h2 class="frm-h2">
				<?php esc_html_e( 'Responses Over Time', 'formidable-pro' ); ?>
			</h2>
			<?php
			echo $data['time'];
        }

        foreach ( $fields as $field ) {
			if ( ! isset( $data[ $field->id ] ) ) {
                continue;
            }

			$post_boxes = self::get_field_boxes( compact( 'field', 'entries' ) );
			if ( empty( $post_boxes ) ) {
				continue;
			}
            ?>
			<div class="frm_report_box pg_<?php echo esc_attr( $class ); ?>" data-ftype="<?php echo esc_attr( $field->type ); ?>">
				<h2 class="frm-h2">
					<?php echo esc_html( $field->name ); ?>
				</h2>
				<?php echo $data[ $field->id ]; ?>

				<?php if ( isset( $data[ $field->id . '_table' ] ) ) { ?>
					<br/>
					<?php echo $data[ $field->id . '_table' ]; ?>
				<?php } ?>

				<div class="frmcenter" style="margin-top:20px;">
				<?php foreach ( $post_boxes as $box ) { ?>
				<div class="postbox">
					<div class="inside">
						<h3><?php echo esc_html( $box['label'] ); ?></h3>
						<?php echo esc_html( $box['stat'] ); ?>
					</div>
				</div>
				<?php } ?>

				<?php
				/**
				 * Fires after the field report.
				 *
				 * @since 5.0.02
				 *
				 * @param array $args The arguments. Contains `field`..
				 */
				do_action( 'frm_pro_after_field_report', compact( 'field' ) );
				?>
			</div>

            <div class="clear"></div>
            </div>
        <?php
			$class = ( $class == 'odd' ) ? 'even' : 'odd';
            unset($field);
        }

        if ( isset($data['month']) ) {
            echo $data['month'];
        }
?>
	</div>
	</div>
</div>
