<?php
/*
Plugin Name: WPsite Follow Us Badges
plugin URI: wpsite-follow-us-badges
Description:
version: 0.9
Author: Kyle Benk
Author URI: http://kylebenkapps.com
License: GPL2
*/

/** 
 * Global Definitions 
 */

/* Plugin Name */

if (!defined('WPSITE_FOLLOW_US_PLUGIN_NAME'))
    define('WPSITE_FOLLOW_US_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

/* Plugin directory */

if (!defined('WPSITE_FOLLOW_US_PLUGIN_DIR'))
    define('WPSITE_FOLLOW_US_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . WPSITE_FOLLOW_US_PLUGIN_NAME);

/* Plugin url */

if (!defined('WPSITE_FOLLOW_US_PLUGIN_URL'))
    define('WPSITE_FOLLOW_US_PLUGIN_URL', WP_PLUGIN_URL . '/' . WPSITE_FOLLOW_US_PLUGIN_NAME);
  
/* Plugin verison */

if (!defined('WPSITE_FOLLOW_US_VERSION_NUM'))
    define('WPSITE_FOLLOW_US_VERSION_NUM', '0.9.0');
 
 
/** 
 * Activatation / Deactivation 
 */  

register_activation_hook( __FILE__, array('WPsiteFollowUs', 'register_activation'));
add_action('widgets_init', array('WPsiteFollowUs', 'wpsite_register_widget'));

/** 
 * Hooks / Filter 
 */
 
add_action('init', array('WPsiteFollowUs', 'load_textdoamin'));
add_action('admin_menu', array('WPsiteFollowUs', 'add_menu_page'));
add_action('wp_enqueue_scripts', array('WPsiteFollowUs', 'include_styles_scripts'));

/** 
 * AJAX 
 */

add_action('wp_ajax_wpsite_save_order', array('WPsiteFollowUs', 'save_order'));

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", array('WPsiteFollowUs', 'wpsite_follow_us_badges_settings_link'));

/** 
 *  WPsiteFollowUs main class
 *
 * @since 1.0.0
 * @using Wordpress 3.8
 */

class WPsiteFollowUs extends WP_Widget {

	/* Properties */
	
	private static $text_domain = 'wpsite-follow-us';
	
	private static $prefix = 'wpsite_follow_us_';
	
	private static $settings_page = 'wpsite-follow-us-badges-settings';
	
	private static $jquery_ui_css = '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
	
	private static $default = array(
		'order'		=> array('twitter', 'facebook', 'google', 'linkedin'),
		'twitter'	=> array(
			'active'	=> false,
			'user'		=> 'WPsite',
			'args'		=> array(
				'followers_count_display' 	=> true,
				'language'					=> 'en',
				'width'						=> '100%',
				'alignment'					=> 'left',
				'show_screen_name'			=> false,
				'size'						=> 'medium',
				'opt_out'					=> false
			)
		),
		'facebook'	=> array(
			'active'	=> false,
			'user'		=> 'WPsite',
			'args'		=> array(
				'width'					=> '',
				'language'				=> 'en_US',
				'layout'				=> 'standard',
				'action_type'			=> 'like',
				'colorscheme'			=> 'light',
				'show_friends_faces'	=> false,
				'include_share_button'	=> false
			)
		),
		'google'	=> array(
			'active'	=> false,
			'user'		=> '106771475441130344412',
			'args'		=> array(
				'size'			=> '20',
				'annotation'	=> 'bubble',
				'language'		=> 'en-US',
				'asynchronous' 	=> true,
				'parse_tags'	=> 'default'
			)
		),
		'linkedin'	=> array(
			'active'	=> false,
			'user'		=> '2839460',
			'args'		=> array(
				'count_mode'	=> 'right',
				'language'		=> 'en_US'
			)
		)
	);
	
	private static $twitter_supported_languages = array(
		'en',
		'fr',
		'de',
		'it',
		'es',
		'ko',
		'ja'
	);
	
	private static $facebook_supported_languages = array(
		'af_ZA',
		'ar_AR',
		'az_AZ',
		'be_BY',
		'bg_BG',
		'bn_IN',
		'bs_BA',
		'ca_ES',
		'cs_CZ',
		'cx_PH',
		'cy_GB',
		'da_DK',
		'de_DE',
		'el_GR',
		'en_GB',
		'en_PI',
		'en_UD',
		'en_US',
		'eo_EO',
		'es_ES',
		'es_LA',
		'et_EE',
		'eu_ES',
		'fa_IR',
		'fb_LT',
		'fi_FI',
		'fo_FO',
		'fr_CA',
		'fr_FR',
		'fy_NL',
		'ga_IE',
		'gl_ES',
		'gn_PY',
		'he_IL',
		'hi_IN',
		'hr_HR',
		'hu_HU',
		'hy_AM',
		'id_ID',
		'is_IS',
		'it_IT',
		'ja_JP',
		'ka_GE',
		'km_KH',
		'ko_KR',
		'ku_TR',
		'la_VA',
		'lt_LT',
		'lv_LV',
		'mk_MK',
		'ml_IN',
		'ms_MY',
		'nb_NO',
		'ne_NP',
		'nl_NL',
		'nn_NO',
		'pa_IN',
		'pl_PL',
		'ps_AF',
		'pt_BR',
		'pt_PT',
		'ro_RO',
		'ru_RU',
		'sk_SK',
		'sl_SI',
		'sq_AL',
		'sr_RS',
		'sv_SE',
		'sw_KE',
		'ta_IN',
		'te_IN',
		'th_TH',
		'tl_PH',
		'tr_TR',
		'uk_UA',
		'ur_PK',
		'vi_VN',
		'zh_CN',
		'zh_HK',
		'zh_TW'
	);
	
	private static $google_supported_languages = array(
		'af', 
		'am', 
		'ar',
		'eu',
		'bn',
		'bg',
		'ca',
		'zh-HK',
		'zh-CN',
		'zh-TW',
		'hr',
		'cs',
		'da',
		'nl',
		'en-GB',
		'en-US',
		'et',
		'fil',
		'fi',
		'fr',
		'fr-CA',
		'gl',
		'de',
		'el',
		'gu',
		'iw',
		'hi',
		'hu',
		'is',
		'id',
		'id',
		'ja',
		'kn',
		'ko',
		'lv',
		'lt',
		'ms',
		'ml',
		'mr',
		'no',
		'fa',
		'pl',
		'pt-BR',
		'pt-PT',
		'ro',
		'ru',
		'sr',
		'sk',
		'sl',
		'es',
		'es-419',
		'sw',
		'sv',
		'ta',
		'te',
		'th',
		'tr',
		'uk',
		'ur',
		'vi',
		'zu'
	);
	
	private static $linkedin_supported_languages = array(
		'en_US',
		'fr_FR',
		'es_ES',
		'ru_RU',
		'de_DE',
		'it_IT',
		'pt_BR',
		'ro_RO',
		'tr_TR',
		'jp_JP',
		'in_ID',
		'ms_MY',
		'ko_KR',
		'sv_SE',
		'cs_CZ',
		'nl_NL',
		'pl_PL',
		'no_NO',
		'da_DK'
	);
	
	/**
	 * Hooks to 'register_activation_hook' 
	 * 
	 * @since 1.0.0
	 */
	static function register_activation() {
	
		/* Check if multisite, if so then save as site option */
		
		if (is_multisite()) {
			add_site_option('wpsite_follow_us_badges_version', WPSITE_FOLLOW_US_VERSION_NUM);
		} else {
			add_option('wpsite_follow_us_badges_version', WPSITE_FOLLOW_US_VERSION_NUM);
		}
	}
	
	/**
	 * Register the Widget 
	 * 
	 * @since 1.0.0
	 */
	static function wpsite_register_widget() {
	    register_widget( 'WPsiteFollowUs' );
	}
	
	/**
	 * Load the text domain 
	 * 
	 * @since 1.0.0
	 */
	static function load_textdoamin() {
		load_plugin_textdomain(self::$text_domain, false, WPSITE_FOLLOW_US_PLUGIN_DIR . '/languages');
	}
	
	/**
	 * Hooks to 'admin_menu' 
	 * 
	 * @since 1.0.0
	 */
	static function add_menu_page() {
		
		/* Cast the first sub menu to the top menu */
	    
	    $settings_page_load = add_submenu_page(
	    	'tools.php', 										// parent slug
	    	__('WPsite Follow Us', self::$text_domain), 				// Page title
	    	__('WPsite Follow Us', self::$text_domain), 				// Menu name
	    	'manage_options', 											// Capabilities
	    	self::$settings_page, 										// slug
	    	array('WPsiteFollowUs', 'wpsite_follow_us_admin_settings')	// Callback function
	    );
	    add_action("admin_print_scripts-$settings_page_load", array('WPsiteFollowUs', 'wpsite_follow_us_include_admin_scripts'));
	}
	
	/**
	 * Hooks to 'plugin_action_links_' filter 
	 * 
	 * @since 1.0.0
	 */
	static function wpsite_follow_us_badges_settings_link($links) { 
		$settings_link = '<a href="tools.php?page=' . self::$settings_page . '">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}
	
	/**
	 * Hooks to 'admin_print_scripts-$page' 
	 * 
	 * @since 1.0.0
	 */
	static function wpsite_follow_us_include_admin_scripts() {
		
		/* CSS */
		
		wp_register_style('wpsite_follow_us_admin_css', WPSITE_FOLLOW_US_PLUGIN_URL . '/include/css/wpsite_follow_us_admin.css');
		wp_enqueue_style('wpsite_follow_us_admin_css');
	
		/* Javascript */
		
		/*
wp_register_script('wpsite_follow_us_admin_js', WPSITE_FOLLOW_US_PLUGIN_URL . '/include/js/wpsite_follow_us_admin.js');
		wp_enqueue_script('wpsite_follow_us_admin_js');
*/	
	}
	
	/**
	 * Displays the HTML for the 'general-admin-menu-settings' admin page
	 * 
	 * @since 1.0.0
	 */
	static function wpsite_follow_us_admin_settings() {
		
		$settings = get_option('wpsite_follow_us_settings');
			
		/* Default values */
		
		if ($settings === false) {
			$settings = self::$default;
		}
		
		/* Save data nd check nonce */
		
		if (isset($_POST['submit']) && check_admin_referer('wpsite_follow_us_admin_settings')) {
			
			$settings = get_option('wpsite_follow_us_settings');
			
			/* Default values */
			
			if ($settings === false) {
				$settings = self::$default;
			}
				
			$settings = array(
				'order'		=> $settings['order'],
				'twitter'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_twitter_active']) && $_POST['wpsite_follow_us_settings_twitter_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_twitter_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_twitter_user'])) : '',
					'args'		=> array(
						'followers_count_display' 	=> isset($_POST['wpsite_follow_us_settings_twitter_args_followers_count_display']) && $_POST['wpsite_follow_us_settings_twitter_args_followers_count_display'] ? true : false,
						'language'					=> $_POST['wpsite_follow_us_settings_twitter_args_language'],
						'width'						=> isset($_POST['wpsite_follow_us_settings_twitter_args_width']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_twitter_args_width'])) : '',
						'alignment'					=> $_POST['wpsite_follow_us_settings_twitter_args_alignment'],
						'show_screen_name'			=> isset($_POST['wpsite_follow_us_settings_twitter_args_show_screen_name']) && $_POST['wpsite_follow_us_settings_twitter_args_show_screen_name'] ? true : false,
						'size'						=> $_POST['wpsite_follow_us_settings_twitter_args_size'],
						'opt_out'					=> isset($_POST['wpsite_follow_us_settings_twitter_args_opt_out']) && $_POST['wpsite_follow_us_settings_twitter_args_opt_out'] ? true : false
					)
				),
				'facebook'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_facebook_active']) && $_POST['wpsite_follow_us_settings_facebook_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_facebook_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_facebook_user'])) : '',
					'args'		=> array(
						'width'					=> isset($_POST['wpsite_follow_us_settings_facebook_args_width']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_facebook_args_width'])) : '',
						'layout'				=> $_POST['wpsite_follow_us_settings_facebook_args_layout'],
						'language'				=> $_POST['wpsite_follow_us_settings_facebook_args_language'],
						'action_type'			=> $_POST['wpsite_follow_us_settings_facebook_args_action_type'],
						'colorscheme'			=> $_POST['wpsite_follow_us_settings_facebook_args_colorscheme'],
						'show_friends_faces'	=> isset($_POST['wpsite_follow_us_settings_facebook_args_show_friends_faces']) && $_POST['wpsite_follow_us_settings_facebook_args_show_friends_faces'] ? true : false,
						'include_share_button'	=> isset($_POST['wpsite_follow_us_settings_facebook_args_include_share_button']) && $_POST['wpsite_follow_us_settings_facebook_args_include_share_button'] ? true : false
					)
				),
				'google'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_google_active']) && $_POST['wpsite_follow_us_settings_google_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_google_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_google_user'])) : '',
					'args' 		=> array(
						'size'			=> $_POST['wpsite_follow_us_settings_google_args_size'],
						'annotation'	=> $_POST['wpsite_follow_us_settings_google_args_annotation'],
						'language'		=> $_POST['wpsite_follow_us_settings_google_args_language'],
						//'asynchronous' 	=> isset($_POST['wpsite_follow_us_settings_google_asynchronous']) && $_POST['wpsite_follow_us_settings_google_asynchronous'] ? true : false,
						//'parse_tags'	=> $_POST['wpsite_follow_us_settings_google_args_parse_tags']
					)
				),
				'linkedin'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_linkedin_active']) && $_POST['wpsite_follow_us_settings_linkedin_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_linkedin_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_linkedin_user'])) : '',
					'args'		=> array(
						'count_mode'	=> $_POST['wpsite_follow_us_settings_linkedin_args_count_mode'],
						'language'		=> $_POST['wpsite_follow_us_settings_linkedin_args_language'],
					)
				)
			);
			
			update_option('wpsite_follow_us_settings', $settings);
		}
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-sortable');
		//wp_enqueue_style('wpsite-jquery-ui', self::$jquery_ui_css);
		?>
		
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$( "#tabs" ).tabs();
			
			
			$("#sortable").sortable({
				revert: true,
				update: function (event, ui) {
			        
			        var data = {
						action: 'wpsite_save_order',
						order: $(this).sortable('toArray')
					};
			
			        // POST to server using $.post or $.ajax
			        $.post(ajaxurl, data, function(response) {});
			    }
			});
		});
		</script>
		
		<div class="wrap wpsite_admin_panel">
			<div class="wpsite_admin_panel_banner">
				<h1><?php _e('WPsite Follow Us Badges Settings Page', self::$text_domain); ?></h1>
			</div>
			
			<div id="wpsite_admin_panel_settings" class="wpsite_admin_panel_content">
			
				<span><?php _e('These are the settings for the ', self::$text_domain); ?><a href="widgets.php"><?php _e('widget', self::$text_domain); ?></a><?php _e('.', self::$text_domain); ?></span>
			
				<form method="post">
				
					<div id="tabs">
						<ul>
							<li><a href="#wpsite_div_twitter"><span class="wpsite_admin_panel_content_tabs"><?php _e('Twitter', self::$text_domain); ?></span></a></li>
							<li><a href="#wpsite_div_facebook"><span class="wpsite_admin_panel_content_tabs"><?php _e('Facebook',self::$text_domain); ?></span></a></li>
							<li><a href="#wpsite_div_google"><span class="wpsite_admin_panel_content_tabs"><?php _e('Google+',self::$text_domain); ?></span></a></li>
							<li><a href="#wpsite_div_linkedin"><span class="wpsite_admin_panel_content_tabs"><?php _e('LinkedIn',self::$text_domain); ?></span></a></li>
							<li><a href="#wpsite_div_order"><span class="wpsite_admin_panel_content_tabs"><?php _e('Order',self::$text_domain); ?></span></a></li>
						</ul>
						
						<div id="wpsite_div_twitter">
						
							<h3><?php _e('General', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
								
									<!-- Active -->
								
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_twitter_active" name="wpsite_follow_us_settings_twitter_active" type="checkbox" <?php echo isset($settings['twitter']['active']) && $settings['twitter']['active'] ? 'checked="checked"' : ''; ?> placeholder="your_username">
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Username', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_twitter_user" name="wpsite_follow_us_settings_twitter_user" type="text" value="<?php echo esc_attr($settings['twitter']['user']); ?>"><br/>
												<em><label><?php _e('https://twitter.com/', self::$text_domain); ?></label><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<h3><?php _e('Display', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
								
									<!-- Followers Count Display -->
								
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Followers Count Display', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_twitter_args_followers_count_display" name="wpsite_follow_us_settings_twitter_args_followers_count_display" type="checkbox" <?php echo isset($settings['twitter']['args']['followers_count_display']) && $settings['twitter']['args']['followers_count_display'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
								
									<!-- Show Screen Name -->
								
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Show Screen Name', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_twitter_args_show_screen_name" name="wpsite_follow_us_settings_twitter_args_show_screen_name" type="checkbox" <?php echo isset($settings['twitter']['args']['show_screen_name']) && $settings['twitter']['args']['show_screen_name'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
								
									<!-- Alignment -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Alignment', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_twitter_args_alignment" name="wpsite_follow_us_settings_twitter_args_alignment">
													<option value="left" <?php echo isset($settings['twitter']['args']['alignment']) && $settings['twitter']['args']['alignment'] == 'left' ? 'selected' : '' ;?>><?php _e('left', self::$text_domain); ?></option>
													<option value="right" <?php echo isset($settings['twitter']['args']['alignment']) && $settings['twitter']['args']['alignment'] == 'right' ? 'selected' : '' ;?>><?php _e('right', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
								
									<!-- Width -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Width', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_twitter_args_width" name="wpsite_follow_us_settings_twitter_args_width" type="text" value="<?php echo esc_attr($settings['twitter']['args']['width']); ?>"><br/>
												<em><label><?php _e('Accepts px and % (e.g 100px or 100%)', self::$text_domain); ?></label></em>
											</td>
										</th>
									</tr>
									
									<!-- Size -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Size', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_twitter_args_size" name="wpsite_follow_us_settings_twitter_args_size">
													<option value="medium" <?php echo isset($settings['twitter']['args']['size']) && $settings['twitter']['args']['size'] == 'medium' ? 'selected' : '' ;?>><?php _e('medium', self::$text_domain); ?></option>
													<option value="large" <?php echo isset($settings['twitter']['args']['size']) && $settings['twitter']['args']['size'] == 'large' ? 'selected' : '' ;?>><?php _e('large', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
							
							<h3><?php _e('Advanced', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
								
									<!-- Language -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_twitter_args_language" name="wpsite_follow_us_settings_twitter_args_language">
													<?php foreach (self::$twitter_supported_languages as $lang) { ?>
													<option value="<?php echo $lang; ?>" <?php echo isset($settings['twitter']['args']['language']) && $settings['twitter']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
													<?php } ?>
												</select>
											</td>
										</th>
									</tr>
									
									<!-- Opt Out -->
								
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Opt Out', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_twitter_args_opt_out" name="wpsite_follow_us_settings_twitter_args_opt_out" type="checkbox" <?php echo isset($settings['twitter']['args']['opt_out']) && $settings['twitter']['args']['opt_out'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
							
							<a href="https://dev.twitter.com/docs/follow-button" target="_blank"><label><?php _e('Twitter Follow Button Details', self::$text_domain); ?></label></a>
						</div>
						
						<div id="wpsite_div_facebook">
						
							<h3><?php _e('General', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
								
									<!-- Active -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_facebook_active" name="wpsite_follow_us_settings_facebook_active" type="checkbox" <?php echo isset($settings['facebook']['active']) && $settings['facebook']['active'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<?php _e('User ID', self::$text_domain); ?>
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_facebook_user" name="wpsite_follow_us_settings_facebook_user" type="text" value="<?php echo esc_attr($settings['facebook']['user']); ?>" ><br/>
												<em><label><?php _e('https://www.facebook.com/', self::$text_domain); ?></label><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em><br/>
												<em><label><?php _e('https://www.facebook.com/', self::$text_domain); ?></label><strong><label><?php _e('"pages/example/112233"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<h3><?php _e('Display', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
									
									<!-- Layout -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Layout', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_facebook_args_layout" name="wpsite_follow_us_settings_facebook_args_layout">
													<option value="standard" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'standard' ? 'selected' : '' ;?>><?php _e('standard', self::$text_domain); ?></option>
													<option value="box_count" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'box_count' ? 'selected' : '' ;?>><?php _e('box_count', self::$text_domain); ?></option>
													<option value="button_count" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'button_count' ? 'selected' : '' ;?>><?php _e('button_count', self::$text_domain); ?></option>
													<option value="button" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'button' ? 'selected' : '' ;?>><?php _e('button', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
									
									<!-- Action Type -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Action Type', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_facebook_args_action_type" name="wpsite_follow_us_settings_facebook_args_action_type">
													<option value="like" <?php echo isset($settings['facebook']['args']['action_type']) && $settings['facebook']['args']['action_type'] == 'like' ? 'selected' : '' ;?>><?php _e('like', self::$text_domain); ?></option>
													<option value="recommend" <?php echo isset($settings['facebook']['args']['action_type']) && $settings['facebook']['args']['action_type'] == 'recommend' ? 'selected' : '' ;?>><?php _e('recommend', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
									
									<!-- Color Scheme -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Color Scheme', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_facebook_args_colorscheme" name="wpsite_follow_us_settings_facebook_args_colorscheme">
													<option value="light" <?php echo isset($settings['facebook']['args']['colorscheme']) && $settings['facebook']['args']['colorscheme'] == 'light' ? 'selected' : '' ;?>><?php _e('light', self::$text_domain); ?></option>
													<option value="dark" <?php echo isset($settings['facebook']['args']['colorscheme']) && $settings['facebook']['args']['colorscheme'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
									
									<!-- Show Friends Faces -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Show Friends Faces', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_facebook_args_show_friends_faces" name="wpsite_follow_us_settings_facebook_args_show_friends_faces" type="checkbox" <?php echo isset($settings['facebook']['args']['show_friends_faces']) && $settings['facebook']['args']['show_friends_faces'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
									
									<!-- Include Share Button -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Include Share Button', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_facebook_args_include_share_button" name="wpsite_follow_us_settings_facebook_args_include_share_button" type="checkbox" <?php echo isset($settings['facebook']['args']['include_share_button']) && $settings['facebook']['args']['include_share_button'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
									
									<!-- Width -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Width', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_facebook_args_width" name="wpsite_follow_us_settings_facebook_args_width" type="text" value="<?php echo esc_attr($settings['facebook']['args']['width']); ?>"><br/>
												<em><label><?php _e('Accepts px only', self::$text_domain); ?></label></em>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
							
							<h3><?php _e('Advanced', self::$text_domain); ?></h3>
							
							<table>
								<tbody>	
									
									<!-- Language -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_facebook_args_language" name="wpsite_follow_us_settings_facebook_args_language">
													<?php foreach (self::$facebook_supported_languages as $lang) { ?>
													<option value="<?php echo $lang; ?>" <?php echo isset($settings['facebook']['args']['language']) && $settings['facebook']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
													<?php } ?>
												</select>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<a href="https://developers.facebook.com/docs/plugins/like-button/" target="_blank"><label><?php _e('Facebook Like Button Details', self::$text_domain); ?></label></a>
						</div>
						
						<div id="wpsite_div_google">
						
							<h3><?php _e('General', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
								
									<!-- Active -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_google_active" name="wpsite_follow_us_settings_google_active" type="checkbox" <?php echo isset($settings['google']['active']) && $settings['google']['active'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('User ID', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_google_user" name="wpsite_follow_us_settings_google_user" type="text" value="<?php echo esc_attr($settings['google']['user']); ?>"><br/>
												<em><label><?php _e('https://plus.google.com/u/0/', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong><label><?php _e('/posts', self::$text_domain); ?></label></em>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<h3><?php _e('Display', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
									
									<!-- Size -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Size', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_google_args_size" name="wpsite_follow_us_settings_google_args_size">
													<option value="15" <?php echo isset($settings['google']['args']['size']) && $settings['google']['args']['size'] == '15' ? 'selected' : '' ;?>><?php _e('small', self::$text_domain); ?></option>
													<option value="20" <?php echo isset($settings['google']['args']['size']) && $settings['google']['args']['size'] == '20' ? 'selected' : '' ;?>><?php _e('medium', self::$text_domain); ?></option>
													<option value="24" <?php echo isset($settings['google']['args']['size']) && $settings['google']['args']['size'] == '24' ? 'selected' : '' ;?>><?php _e('large', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
									
									<!-- Annotation -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Annotation', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_google_args_annotation" name="wpsite_follow_us_settings_google_args_annotation">
													<option value="bubble" <?php echo isset($settings['google']['args']['annotation']) && $settings['google']['args']['annotation'] == 'bubble' ? 'selected' : '' ;?>><?php _e('Bubble Horizontal', self::$text_domain); ?></option>
													<option value="vertical-bubble" <?php echo isset($settings['google']['args']['annotation']) && $settings['google']['args']['annotation'] == 'vertical-bubble' ? 'selected' : '' ;?>><?php _e('Bubble Vertical', self::$text_domain); ?></option>
													<option value="none" <?php echo isset($settings['google']['args']['annotation']) && $settings['google']['args']['annotation'] == 'none' ? 'selected' : '' ;?>><?php _e('none', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<h3><?php _e('Advanced', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
									
									<!-- Language -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_google_args_language" name="wpsite_follow_us_settings_google_args_language">
													<?php foreach (self::$google_supported_languages as $lang) { ?>
													<option value="<?php echo $lang; ?>" <?php echo isset($settings['google']['args']['language']) && $settings['google']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
													<?php } ?>
												</select><br/>
												<a href="https://developers.google.com/+/web/api/supported-languages" target="_blank"><label><?php _e('Supported Languages', self::$text_domain); ?></label></a>
											</td>
										</th>
									</tr>
									
									<!-- Asynchronous -->	
									
									<!--
<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Asynchronous', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_google_asynchronous" name="wpsite_follow_us_settings_google_asynchronous" type="checkbox" <?php echo isset($settings['google']['args']['asynchronous']) && $settings['google']['args']['asynchronous'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
-->
									
									<!-- Paresd Tags -->
									
									<!--
<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Paresd Tags', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_google_args_parse_tags" name="wpsite_follow_us_settings_google_args_parse_tags">
													<option value="default" <?php echo isset($settings['google']['args']['parse_tags']) && $settings['google']['args']['parse_tags'] == 'default' ? 'selected' : '' ;?>><?php _e('Default (on load)', self::$text_domain); ?></option>
													<option value="explicit" <?php echo isset($settings['google']['args']['parse_tags']) && $settings['google']['args']['parse_tags'] == 'explicit' ? 'selected' : '' ;?>><?php _e('Explicit', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
-->
								</tbody>
							</table>
							
							<a href="https://developers.google.com/+/web/follow/" target="_blank"><label><?php _e('Google+ Button Details', self::$text_domain); ?></label></a>
						</div>
						
						<div id="wpsite_div_linkedin">
						
							<h3><?php _e('General', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
								
									<!-- Active -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_linkedin_active" name="wpsite_follow_us_settings_linkedin_active" type="checkbox" <?php echo isset($settings['linkedin']['active']) && $settings['linkedin']['active'] ? 'checked="checked"' : ''; ?> placeholder="Your ID">
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('User ID', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_linkedin_user" name="wpsite_follow_us_settings_linkedin_user" type="text" value="<?php echo esc_attr($settings['linkedin']['user']); ?>"><br/>
												<em><label><?php _e('http://www.linkedin.com/profile/view?id=', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em><br/>
												<em><label><?php _e('http://www.linkedin.com/company/', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<h3><?php _e('Display', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
									
									<!-- Count Mode -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Count Mode', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_linkedin_args_count_mode" name="wpsite_follow_us_settings_linkedin_args_count_mode">
													<option value="right" <?php echo isset($settings['linkedin']['args']['count_mode']) && $settings['linkedin']['args']['count_mode'] == 'right' ? 'selected' : '' ;?>><?php _e('right', self::$text_domain); ?></option>
													<option value="top" <?php echo isset($settings['linkedin']['args']['count_mode']) && $settings['linkedin']['args']['count_mode'] == 'top' ? 'selected' : '' ;?>><?php _e('top', self::$text_domain); ?></option>
													<option value="none" <?php echo isset($settings['linkedin']['args']['count_mode']) && $settings['linkedin']['args']['count_mode'] == 'none' ? 'selected' : '' ;?>><?php _e('none', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>
									
								</tbody>
							</table>
							
							<h3><?php _e('Advanced', self::$text_domain); ?></h3>
							
							<table>
								<tbody>
									
									<!-- Language -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<select id="wpsite_follow_us_settings_linkedin_args_language" name="wpsite_follow_us_settings_linkedin_args_language">
													<?php foreach (self::$linkedin_supported_languages as $lang) { ?>
													<option value="<?php echo $lang; ?>" <?php echo isset($settings['linkedin']['args']['language']) && $settings['linkedin']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
													<?php } ?>
												</select>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
							
							<a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><label><?php _e('LinkedIn', self::$text_domain); ?></label></a>
						</div>
						
						<div id="wpsite_div_order">
							<table>
								<tbody>
								
									<!-- Sortables -->
									
									<ul id="sortable">
									
										<?php 
										
										if (!isset($settings['order'])) {
											$settings['order'] = self::$default['order'];
										}
										
										foreach ($settings['order'] as $order) { ?>
											<li id="<?php echo $order; ?>" name="<?php echo $order; ?>" class="wpsite_follow_us_sort_item"><?php _e($order, self::$text_domain); ?></li>
										<?php } ?>
										
									</ul>
								
								</tbody>
							</table>
						</div>
						
					</div>
					
					<?php wp_nonce_field('wpsite_follow_us_admin_settings'); ?>
				
					<?php submit_button(); ?>
					
				</form>
			
			</div>
			
			<div id="wpsite_admin_panel_sidebar" class="wpsite_admin_panel_content">
				<div class="wpsite_admin_panel_sidebar_img">
					<a target="_blank" href="http://wpsite.net"><img src="http://www.wpsite.net/wp-content/uploads/2011/10/logo-only-100h.png"></a>
				</div>
			</div>
		</div>
		<?php
	}
	
	/**
	 * AJAX with action 'wpsite_save_order' 
	 * 
	 * @since 1.0.0
	 */
	static function save_order() {
	
		$settings = get_option('wpsite_follow_us_settings');
			
		/* Default values */
		
		if ($settings === false) {
			$settings = self::$default;
		}
		
		$settings['order'] = $_POST['order'];
		
		update_option('wpsite_follow_us_settings', $settings);
		
		die(); // this is required to return a proper result
	}
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wpsite_follow_us_badges', // Base ID
			__('WPsite Follow Us Badges', self::$text_domain), // Name
			array( 'description' => __( 'Add follow buttons to your sidebar', self::$text_domain), ) // Args
		);
	}
	
	/**
	 * Hooks to 'wp_enqueue_scripts' 
	 * 
	 * @since 1.0.0
	 */
	static function include_styles_scripts() {
	
		/* CSS */
		
		wp_register_style('wpsite_follow_us_admin_css', WPSITE_FOLLOW_US_PLUGIN_URL . '/include/css/wpsite_follow_us_admin.css');
		wp_enqueue_style('wpsite_follow_us_admin_css');
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
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$settings = get_option('wpsite_follow_us_settings');
			
		/* Default values */
		
		if ($settings === false) {
			$settings = self::$default;
		}

		echo $args['before_widget'];
		
		if (!empty( $title ))
			echo $args['before_title'] . $title . $args['after_title'];
			
		$content = '';
		
		foreach ($settings['order'] as $order) {
			if ($order == 'twitter') {
				if (isset($settings['twitter']['active']) && $settings['twitter']['active']) {
					$content .= '<div class="wpsite_follow_us_div"><a href="https://twitter.com/' . $settings['twitter']['user'] . '" class="twitter-follow-button"';
					
					if (isset($settings['twitter']['args']['followers_count_display']) && $settings['twitter']['args']['followers_count_display']) {
						$content .=  ' data-show-count="true"';
					} else {
						$content .=  ' data-show-count="false"';
					}
					
					if (isset($settings['twitter']['args']['opt_out']) && $settings['twitter']['args']['opt_out']) {
						$content .= ' data-dnt="true"';
					} else {
						$content .= ' data-dnt="false"';
					}
					
					if (isset($settings['twitter']['args']['show_screen_name']) && $settings['twitter']['args']['show_screen_name']) {
						$content .= ' data-show-screen-name="true"';
					} else {
						$content .= ' data-show-screen-name="false"';
					}
					
					if (isset($settings['twitter']['args']['size'])) {
						$content .= ' data-size="' . $settings['twitter']['args']['size'] .'"';
					}
					
					if (isset($settings['twitter']['args']['language'])) {
						$content .= ' data-lang="' . $settings['twitter']['args']['language'] .'"';
					}
					
					if (isset($settings['twitter']['args']['alignment'])) {
						$content .= ' data-align="' . $settings['twitter']['args']['alignment'] .'"';
					}
					
					if (isset($settings['twitter']['args']['width']) && $settings['twitter']['args']['width'] != '') {
						$content .= ' data-width="' . $settings['twitter']['args']['width'] .'"';
					}
					
					$content .= '></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
					';
				}
			} else if ($order == 'facebook') {
				if (isset($settings['facebook']['active']) && $settings['facebook']['active']) {
					$content .= '<div class="wpsite_follow_us_div"><div class="fb-like" data-href="https://facebook.com/' . $settings['facebook']['user'] . '"';
					
					if (isset($settings['facebook']['args']['include_share_button']) && $settings['facebook']['args']['include_share_button']) {
						$content .= ' data-share="true"';
					} else {
						$content .= ' data-share="false"';
					}
					
					if (isset($settings['facebook']['args']['show_friends_faces']) && $settings['facebook']['args']['show_friends_faces']) {
						$content .= ' data-show-faces="true"';
					} else {
						$content .= ' data-show-faces="false"';
					}
					
					if (isset($settings['facebook']['args']['layout'])) {
						$content .= ' data-layout="' . $settings['facebook']['args']['layout'] .'"';
					}
					
					if (isset($settings['facebook']['args']['action_type'])) {
						$content .= ' data-action="' . $settings['facebook']['args']['action_type'] .'"';
					}
					
					if (isset($settings['facebook']['args']['colorscheme'])) {
						$content .= ' data-colorscheme="' . $settings['facebook']['args']['colorscheme'] .'"';
					}
					
					if (isset($settings['facebook']['args']['width']) && $settings['facebook']['args']['width'] != '') {
						$content .= ' data-width="' . $settings['facebook']['args']['width'] .'"';
					}
					 
					$content .= '></div>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/';
						  
					if (isset($settings['facebook']['args']['language'])) {
						$content .= $settings['facebook']['args']['language'];
					}
					
					$content .= '/all.js#xfbml=1";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "facebook-jssdk"));</script></div>
					';
				}
			} else if ($order == 'google') {
					if (isset($settings['google']['active']) && $settings['google']['active']) {
			
					$content .= '<div class="wpsite_follow_us_div"><div class="g-follow" data-href="//plus.google.com/' . $settings['google']['user'] . '" data-rel="publisher"';
					
					if (isset($settings['google']['args']['annotation'])) {
						$content .= ' data-annotation="' . $settings['google']['args']['annotation'] .'"';
					}
					
					if (isset($settings['google']['args']['size'])) {
						$content .= ' data-height="' . $settings['google']['args']['size'] .'"';
					} 
					
					$content .= '></div><!-- Place this tag after the last widget tag. -->
						<script type="text/javascript">';
					
					if (isset($settings['google']['args']['language'])) {
						$content .= 'window.___gcfg = {lang: "' . $settings['google']['args']['language'] . '"};';
					}
							
					$content .= '(function() {
						    var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
						    po.src = "https://apis.google.com/js/platform.js";
						    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
						  })();
						</script></div>';
					
				}
			} else if ($order == 'linkedin') {
				if (isset($settings['linkedin']['active']) && $settings['linkedin']['active']) {
					$content .= '<div class="wpsite_follow_us_div"><script src="//platform.linkedin.com/in.js" type="text/javascript">';
					
					if (isset($settings['linkedin']['args']['language'])) {
						$content .= 'lang: ' . $settings['linkedin']['args']['language'];
					} 
							
					$content .= '</script>
							<script type="IN/FollowCompany" data-id="' . $settings['linkedin']['user'] . '"';
							
					if (isset($settings['linkedin']['args']['count_mode'])) {
						$content .= ' data-counter="' . $settings['linkedin']['args']['count_mode'] .'"';
					} 
					
					$content .= '></script></div>';
				}
			}
		}
		
		echo $content;
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	
		// Title
		
		if (isset( $instance[ 'title' ]))
			$title = $instance[ 'title' ];
		else
			$title = __('Follow Us', self::$text_domain);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}
