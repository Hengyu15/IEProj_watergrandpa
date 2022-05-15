<?php
/**
 * Plugin Name: ReadAloud Widget
 * Plugin URI: https://www.readaloudwidget.com/wordpress-plugin/
 * Description: Speechify your website with the ReadAloud Text-to-Speech widget
 * Version: 1.4
 * Author: LSD Software LLC
 * Author URI: https://lsdsoftware.com/
 */
function sitespeaker_widget($content) {
	if (is_singular('post')) {
		$options = get_option('sitespeaker_settings');
		return $options['code'] . $content;
	}
	else return $content;
}

function sitespeaker_menu() {
	add_options_page('ReadAloud Widget', 'ReadAloud Widget', 'manage_options', 'sitespeaker_settings_page', 'sitespeaker_settings');
}

function sitespeaker_settings() {
?>
<div class="wrap">
	<h2>ReadAloud Widget</h2>
	<form action="options.php" method="post">
		<?php settings_fields('sitespeaker_settings'); ?>
		<?php do_settings_sections('sitespeaker_settings_page'); ?>
		<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>
</div>
<?php
}

function sitespeaker_admin() {
	register_setting( 'sitespeaker_settings', 'sitespeaker_settings', 'sitespeaker_settings_validate' );
	add_settings_section('sitespeaker_main_settings', 'Settings', 'sitespeaker_main_settings_section_text', 'sitespeaker_settings_page');
	add_settings_field('sitespeaker_key', 'API key', 'sitespeaker_settings_key', 'sitespeaker_settings_page', 'sitespeaker_main_settings');
	add_settings_field('sitespeaker_lang', 'Language', 'sitespeaker_settings_lang', 'sitespeaker_settings_page', 'sitespeaker_main_settings');
	add_settings_field('sitespeaker_voice', 'Voice', 'sitespeaker_settings_voice', 'sitespeaker_settings_page', 'sitespeaker_main_settings');
	add_settings_field('sitespeaker_code', 'Embedded Code', 'sitespeaker_settings_code', 'sitespeaker_settings_page', 'sitespeaker_main_settings');
}

function sitespeaker_main_settings_section_text() {
	echo "<p style='max-width: 60em;'>You can find your API key in your User Profile in the <a target='_blank' href='https://portal.readaloudwidget.com/?p=Login'>customer portal</a>.  " .
		"If you don't have an account, you can <a target='_blank' href='https://portal.readaloudwidget.com/?p=SignUp'>sign up</a> for free.  " .
		"<u>Note</u>: your site's domain must be whitelisted in the customer portal for the API key to work.</p>";

	$options = get_option('sitespeaker_settings');
	if (!empty($options['code'])) {
		echo "<p style='color: #080; font-weight: bold;'>Your widget is LIVE.</p>";
	}
	else {
		echo "<p style='max-width: 60em;'>Once you have generated the embedded code, a 'Listen to this article' button will automatically appear at the top of every post.  " .
			"You can modify the appearance of the button by editing the embedded code.</p>";
	}
}

function sitespeaker_settings_key() {
	$options = get_option('sitespeaker_settings');
	$api_key = isset($options['api_key']) ? $options['api_key'] : 'demo';
	echo "<input id='sitespeaker_key' name='sitespeaker_settings[api_key]' size='32' type='text' value='{$api_key}' />";
}


function sitespeaker_settings_lang() {
	$options = get_option('sitespeaker_settings');
	echo "<select id='sitespeaker_lang' name='sitespeaker_settings[lang]' data-value='{$options['lang']}'></select>";
}

function sitespeaker_settings_voice() {
	$options = get_option('sitespeaker_settings');
	echo "<select id='sitespeaker_voice' name='sitespeaker_settings[voice]' data-value='{$options['voice']}'></select> " .
		"<button id='sitespeaker_test' type='button' style='vertical-align: middle;'>Test</button>";
}

function sitespeaker_settings_code() {
	$options = get_option('sitespeaker_settings');
	$code = htmlspecialchars($options['code']);
	echo "<textarea id='sitespeaker_code' name='sitespeaker_settings[code]' cols='60' rows='8' placeholder='Please select all required parameters to see embed code'>{$code}</textarea>";
}

function sitespeaker_settings_validate($input) {
	$newinput['api_key'] = trim($input['api_key']);
	$newinput['lang'] = trim($input['lang']);
	$newinput['voice'] = trim($input['voice']);
	$newinput['code'] = trim($input['code']);
	
	if (!preg_match('/^\w+$/', $newinput['api_key'])) $newinput['api_key'] = '';
	if (!preg_match('/^[\w-]+$/', $newinput['lang'])) $newinput['lang'] = '';
	if (!preg_match('/^[\w -]+$/', $newinput['voice'])) $newinput['voice'] = '';

	return $newinput;
}

add_filter('the_content', 'sitespeaker_widget');
add_action('admin_menu', 'sitespeaker_menu');
add_action('admin_init', 'sitespeaker_admin');
wp_enqueue_script('main', plugin_dir_url(__FILE__) . 'main.js', array('jquery'), '1.4', true);
