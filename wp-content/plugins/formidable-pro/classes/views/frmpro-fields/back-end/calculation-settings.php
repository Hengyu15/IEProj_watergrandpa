<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<div class="frm_grid_container">
	<div class="frm6 frm_form_field">
		<label class="frm_primary_label">&nbsp;
			<?php esc_html_e( 'Type', 'formidable-pro' ); ?>
			<span class="frm_help frm_icon_font frm_tooltip_icon" data-placement="right" title="<?php esc_attr_e( 'Text calculations are combined literally, as is. Math calculations only use numbers in the calculation, and any included math operations will be applied.', 'formidable-pro' ); ?>"></span>
		</label>
		<label for="calc_type_<?php echo esc_attr( $field['id'] ); ?>" class="frm_toggle frm_toggle_long">
			<input type="checkbox" value="text" name="field_options[calc_type_<?php echo esc_attr( $field['id'] ); ?>]" id="calc_type_<?php echo esc_attr( $field['id'] ); ?>" <?php checked( $field['calc_type'], 'text' ); ?> />
			<span class="frm_toggle_slider"></span>
			<span class="frm_toggle_on">
				<?php esc_html_e( 'Text', 'formidable-pro' ); ?>
			</span>
			<span class="frm_toggle_off">
				<?php esc_html_e( 'Math', 'formidable-pro' ); ?>
			</span>
		</label>
	</div>
	<div class="frm6 frm_form_field <?php echo esc_attr( $field['calc_type'] === 'text' || $field['is_currency'] ? 'frm_hidden' : '' ); ?>">
		<label for="frm_calc_dec_<?php echo esc_attr( $field['id'] ); ?>" class="frm_primary_label">
			<?php esc_html_e( 'Decimal Places', 'formidable-pro' ); ?>
		</label>
		<input type="text" id="frm_calc_dec_<?php echo esc_attr( $field['id'] ); ?>" class="frm_calc_dec" name="field_options[calc_dec_<?php echo esc_attr( $field['id'] ); ?>]" value="<?php echo esc_attr( $field['calc_dec'] ); ?>" />
	</div>
</div>

<div class="<?php echo esc_attr( $field['calc_type'] === 'text' ? 'frm_hidden' : '' ); ?>">
	<p class="frm_form_field">
		<label class="frm_primary_label">
			<input type="checkbox" value="1" name="field_options[is_currency_<?php echo esc_attr( $field['id'] ); ?>]" <?php checked( $field['is_currency'], 1 ); ?> />
			<?php esc_html_e( 'Format calculation as currency', 'formidable-pro' ); ?>
		</label>
	</p>

	<p class="frm_form_field <?php echo esc_attr( empty( $field['is_currency'] ) ? 'frm_hidden' : '' ); ?>">
		<label class="frm_primary_label">
			<input type="checkbox" value="1" name="field_options[custom_currency_<?php echo esc_attr( $field['id'] ); ?>]" <?php checked( isset( $field['custom_currency'] ) ? $field['custom_currency'] : 0, 1 ); ?> />
			<?php esc_html_e( 'Use custom currency format', 'formidable-pro' ); ?>
		</label>
	</p>

	<div class="<?php echo esc_attr( empty( $field['custom_currency'] ) ? 'frm_hidden' : '' ); ?> frm_grid_container frm_custom_currency_options_wrapper">

		<p class="frm_form_field frm6">
			<label class="frm_primary_label">
				<input type="text" value="<?php echo isset( $field['custom_thousand_separator'] ) ? esc_attr( $field['custom_thousand_separator'] ) : ''; ?>" name="field_options[custom_thousand_separator_<?php echo esc_attr( $field['id'] ); ?>]" />
				<?php esc_html_e( 'Thousand separator', 'formidable-pro' ); ?>
			</label>
		</p>

		<p class="frm_form_field frm6">
			<label class="frm_primary_label">
				<input type="text" value="<?php echo isset( $field['custom_decimal_separator'] ) ? esc_attr( $field['custom_decimal_separator'] ) : ''; ?>" name="field_options[custom_decimal_separator_<?php echo esc_attr( $field['id'] ); ?>]" />
				<?php esc_html_e( 'Decimal separator', 'formidable-pro' ); ?>
			</label>
		</p>

		<p class="frm_form_field frm4">
			<label class="frm_primary_label">
				<select name="field_options[custom_decimals_<?php echo esc_attr( $field['id'] ); ?>]">
					<option value="0" <?php selected( isset( $field['custom_decimals'] ) ? $field['custom_decimals'] : 0, 0 ); ?>>0</option>
					<option value="2" <?php selected( isset( $field['custom_decimals'] ) ? $field['custom_decimals'] : 0, 2 ); ?>>2</option>
				</select>

				<?php esc_html_e( 'Decimals', 'formidable-pro' ); ?>
			</label>
		</p>

		<p class="frm_form_field frm4">
			<label class="frm_primary_label">
				<input type="text" value="<?php echo isset( $field['custom_symbol_left'] ) ? esc_attr( $field['custom_symbol_left'] ) : ''; ?>" name="field_options[custom_symbol_left_<?php echo esc_attr( $field['id'] ); ?>]" />
				<?php esc_html_e( 'Left symbol', 'formidable-pro' ); ?>
			</label>
		</p>

		<p class="frm_form_field frm4">
			<label class="frm_primary_label">
				<input type="text" value="<?php echo isset( $field['custom_symbol_right'] ) ? esc_attr( $field['custom_symbol_right'] ) : ''; ?>" name="field_options[custom_symbol_right_<?php echo esc_attr( $field['id'] ); ?>]" />
				<?php esc_html_e( 'Right symbol', 'formidable-pro' ); ?>
			</label>
		</p>
	</div>
</div>

<h4 class="frm-with-line">
	<span><?php esc_html_e( 'Field List', 'formidable-pro' ); ?></span>
</h4>

<?php
FrmAppHelper::show_search_box(
	array(
		'input_id'    => 'frm_calc_' . $field['id'],
		'placeholder' => __( 'Search Fields', 'formidable-pro' ),
		'tosearch'    => 'frm-field-list-' . $field['id'],
	)
);
?>

<ul class="frm_code_list frm-full-hover frm-short-list" data-exclude="<?php echo esc_html( json_encode( FrmProField::exclude_from_calcs() ) ); ?>" id="frm-calc-list-<?php echo esc_attr( $field['id'] ); ?>"></ul>

<p class="howto frm_no_bottom_margin">
	<?php esc_html_e( 'Click fields from the field list above to include them in your calculation. Example: [12]+[13]', 'formidable-pro' ); ?>
</p>
