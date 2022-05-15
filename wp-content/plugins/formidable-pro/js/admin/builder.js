( function() {

	function addEventListeners() {
		document.addEventListener( 'change', handleChangeEvent );
	}

	function handleChangeEvent( e ) {
		if ( 'INPUT' === e.target.nodeName && 'checkbox' === e.target.type ) {
			handleCheckboxToggleEvent( e );
		}
	}

	function handleCheckboxToggleEvent( e ) {
		const element = e.target;
		const name = element.name;

		if ( nameMatchesCurrenyOption( name ) ) {
			syncCalcBoxSettingVisibility( element.closest( '[id^="frm-calc-box-"]' ) );
		}
	}

	function nameMatchesCurrenyOption( name ) {
		return -1 !== name.indexOf( 'field_options[calc_type_' ) ||
			-1 !== name.indexOf( 'field_options[is_currency_' ) ||
			-1 !== name.indexOf( 'field_options[custom_currency_' );
	}

	function syncCalcBoxSettingVisibility( calcBox ) {
		const typeToggle = calcBox.querySelector( '[name^="field_options[calc_type_"]' );
		const isMathType = ! typeToggle.checked;
		const decimalPlacesWrapper = calcBox.querySelector( '.frm_calc_dec' ).closest( '.frm_form_field' );
		const formatAsCurrencyOption = calcBox.querySelector( '[name^="field_options[is_currency_"]' );
		const formatAsCurrencyWrapper = formatAsCurrencyOption.closest( '.frm_form_field' );
		const isCustomCurrencyCheckbox = calcBox.querySelector( '[name^="field_options[custom_currency_"]' );
		const isCustomCurrency = isCustomCurrencyCheckbox.checked;
		const customCurrencyCheckboxWrapper = isCustomCurrencyCheckbox.closest( '.frm_form_field' );
		const isCurrency = formatAsCurrencyOption.checked;
		const customCurrenyOptionsWrapper = calcBox.querySelector( '.frm_custom_currency_options_wrapper' );

		toggle( decimalPlacesWrapper, isMathType && ! isCurrency );
		toggle( formatAsCurrencyWrapper, isMathType && isMathType );
		toggle( customCurrencyCheckboxWrapper, isMathType && isCurrency );
		toggle( customCurrenyOptionsWrapper, isMathType && isCurrency && isCustomCurrency );
	}

	function toggle( element, on ) {
		jQuery( element ).stop();
		element.style.opacity = 1;

		if ( on ) {
			if ( element.classList.contains( 'frm_hidden' ) ) {
				element.style.opacity = 0;
				element.classList.remove( 'frm_hidden' );
				jQuery( element ).animate({ opacity: 1 });
			}
		} else if ( ! element.classList.contains( 'frm_hidden' ) ) {
			jQuery( element ).animate({ opacity: 0 }, function() {
				element.classList.add( 'frm_hidden' );
			});
		}
	}

	addEventListeners();
}() );
