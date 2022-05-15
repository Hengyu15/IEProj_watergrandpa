<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<tr>
	<td>
		<label for="frm_update_button_text"><?php esc_html_e( 'Update Button Text', 'formidable-pro' ); ?></label>
	</td>
	<td>
		<input id="frm_update_button_text" type="text" name="options[edit_value]" value="<?php echo esc_attr( $values['edit_value'] ); ?>" />
	</td>
</tr>

<?php if ( $page_field ) { ?>
<tr>
	<td>
		<label for="frm_previous_button_text"><?php esc_html_e( 'Previous Button Text', 'formidable-pro' ); ?></label>
	</td>
	<td>
		<input id="frm_previous_button_text" type="text" name="options[prev_value]" value="<?php echo esc_attr( $values['prev_value'] ); ?>" />
	</td>
</tr>
<?php } ?>

<tr id="frm_save_draft_label_wrapper" class="<?php echo $save_drafts ? '' : 'frm_hidden'; ?>">
	<td>
		<label for="frm_save_draft_label"><?php esc_html_e( 'Save Draft Text', 'formidable-pro' ); ?></label>
	</td>
	<td>
		<input id="frm_save_draft_label" type="text" name="options[draft_label]" value="<?php echo esc_attr( '' === $values['draft_label'] ? __( 'Save Draft', 'formidable-pro' ) : $values['draft_label'] ); ?>" />
	</td>
</tr>

<tr>
	<td>
		<label for="frm_submit_button_alignment"><?php esc_html_e( 'Submit Button Position', 'formidable-pro' ); ?></label>
	</td>
	<td>
		<select id="frm_submit_button_alignment" name="options[submit_align]">
			<option value=""><?php esc_html_e( 'Default', 'formidable-pro' ); ?></option>
			<option value="center" <?php selected( $values['submit_align'], 'center' ); ?>>
				<?php esc_html_e( 'Center', 'formidable-pro' ); ?>
			</option>
			<?php if ( version_compare( FrmAppHelper::plugin_version(), '5.0.17', '>=' ) ) { ?>
				<option value="full" <?php selected( $values['submit_align'], 'full' ); ?>>
					<?php esc_html_e( 'Full Width', 'formidable-pro' ); ?>
				</option>
			<?php } ?>
			<option value="inline" <?php selected( $values['submit_align'], 'inline' ); ?>>
				<?php esc_html_e( 'Inline', 'formidable-pro' ); ?>
			</option>
			<option value="none" <?php selected( $values['submit_align'], 'none' ); ?>>
				<?php esc_html_e( 'None', 'formidable-pro' ); ?>
			</option>
		</select>
	</td>
</tr>

<tr>
	<td colspan="2">
		<label>
			<input type="checkbox" id="logic_link_submit" <?php
			echo ( ! empty( $submit_conditions['hide_field'] ) && ( count( $submit_conditions['hide_field'] ) > 1 || reset( $submit_conditions['hide_field'] ) != '' ) ) ? ' checked="checked"' : '';
			?> />
			<?php esc_html_e( 'Add conditional logic to submit button', 'formidable-pro' ); ?>
		</label>
		<?php include FrmProAppHelper::plugin_path() . '/classes/views/frmpro-forms/_submit_conditional.php'; ?>
	</td>
</tr>
