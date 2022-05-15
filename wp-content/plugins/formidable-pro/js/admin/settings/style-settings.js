( function() {
	function setupEventListeners() {
		jQuery( document ).on( 'change', 'input.frm_image_id[name="frm_style_setting[post_content][bg_image_id]"]', onBgImageUpload );

		const frmFieldset = document.getElementById( 'frm_fieldset' );
		if ( frmFieldset ) {
			jQuery( frmFieldset ).on( 'change', handleReset );
		}

		jQuery( 'select[name$="[theme_selector]"]' ).on( 'change', handleThemeChange ).trigger( 'change' );
	}

	function maybeAddWithBgImageClass() {
		if ( backgroundImageIsSet() ) {
			toggleSampleFormClass( 'frm_with_bg_image', true );
		}
	}

	function toggleSampleFormClass( className, toggleOn ) {
		const form = getSampleForm();
		if ( ! form ) {
			return;
		}
		form.classList.toggle( className, toggleOn );
	}

	function backgroundImageIsSet() {
		const bgImageInput = document.querySelector( 'input[name="frm_style_setting[post_content][bg_image_id]"]' );
		return bgImageInput && '' !== bgImageInput.value;
	}

	function getSampleForm() {
		const container = document.getElementById( 'post-body-content' );
		if ( ! container ) {
			return false;
		}

		const form = container.querySelector( '.frm_forms.frm_pro_form.with_frm_style' );
		if ( ! form ) {
			return false;
		}

		return form;
	}

	function onBgImageUpload() {
		const fileId = parseInt( this.value );
		const show = 0 !== fileId;
		toggleSampleFormClass( 'frm_with_bg_image', show );
		toggleAdditionalBgImageSettings( show );
	}

	function toggleAdditionalBgImageSettings( show ) {
		document.querySelectorAll( '.frm_bg_image_additional_settings' ).forEach(
			function( setting ) {
				setting.classList.toggle( 'frm_hidden', ! show );
			}
		);
	}

	function handleReset() {
		var bgImageIdField = document.querySelector( 'input.frm_image_id[name="frm_style_setting[post_content][bg_image_id]"]' );
		if ( bgImageIdField && '' === bgImageIdField.value ) {
			bgImageIdField.nextElementSibling.querySelector( '.frm_remove_image_option' ).click();
			toggleAdditionalBgImageSettings( false );
			toggleSampleFormClass( 'frm_with_bg_image', false );
		}
	}

	function handleThemeChange() {
		var themeVal, css;

		themeVal = jQuery( this ).val();
		css = themeVal;
		if ( themeVal !== -1 ) {
			if ( themeVal === 'ui-lightness' && frm_admin_js.pro_url !== '' ) {
				css = frm_admin_js.pro_url + '/css/ui-lightness/jquery-ui.css';
				jQuery( '.frm_date_color' ).show();
			} else {
				css = frm_admin_js.jquery_ui_url + '/themes/' + themeVal + '/jquery-ui.css';
				jQuery( '.frm_date_color' ).hide();
			}
		}

		updateUICSS( css );
		document.getElementById( 'frm_theme_css' ).value = themeVal;
		return false;
	}

	// function to append a new theme stylesheet with the new style changes
	function updateUICSS( locStr ) {
		var $cssLink, $link;

		if ( locStr == -1 ) {
			jQuery( 'link.ui-theme' ).remove();
			return false;
		}

		$cssLink = jQuery( '<link href="' + locStr + '" type="text/css" rel="Stylesheet" class="ui-theme" />' );
		jQuery( 'head' ).append( $cssLink );

		$link = jQuery( 'link.ui-theme' );
		if ( $link.length > 1 ) {
			$link.first().remove();
		}
	}

	maybeAddWithBgImageClass();
	jQuery( document ).ready( setupEventListeners );
}() );
