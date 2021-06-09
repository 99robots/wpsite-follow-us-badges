<?php
/**
 * Plugin Name: Follow Us Badges
 * Plugin URI:	https://draftpress.com/follow-us-badges/
 * Description: The DraftPress Follow Us Badges showcases your Facebook, Twitter, LinkedIn and other social media badges.
 * Version: 3.1.7
 * Author: DraftPress
 * Author URI: https://www.draftpress.com/
 * License: GPL2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpsite-follow-us-badges
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Global Definitions
 */

// Store URL
if ( ! defined( 'WPSITE_FOLLOW_US_STORE_URL' ) ) {
    define( 'WPSITE_FOLLOW_US_STORE_URL', 'https://draftpress.com' );
}

// Plugin Name
if ( ! defined( 'WPSITE_FOLLOW_US_PLUGIN_NAME' ) ) {
    define( 'WPSITE_FOLLOW_US_PLUGIN_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/') );
}

// Plugin Directory
if ( ! defined( 'WPSITE_FOLLOW_US_PLUGIN_DIR' ) ) {
    define( 'WPSITE_FOLLOW_US_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . WPSITE_FOLLOW_US_PLUGIN_NAME );
}

// Plugin URL
if ( ! defined( 'WPSITE_FOLLOW_US_PLUGIN_URL' ) ) {
    define( 'WPSITE_FOLLOW_US_PLUGIN_URL', WP_PLUGIN_URL . '/' . WPSITE_FOLLOW_US_PLUGIN_NAME );
}

// Plugin Version
if ( ! defined( 'WPSITE_FOLLOW_US_VERSION_NUM' ) ) {
    define( 'WPSITE_FOLLOW_US_VERSION_NUM', '3.1.7' );
}

/**
 * Activatation / Deactivation
 */
register_activation_hook( __FILE__, array( 'WPsiteFollowUs', 'register_activation' ) );
add_action( 'widgets_init', array( 'WPsiteFollowUs', 'wpsite_register_widget' ) );

/**
 * Hooks / Filter
 */
add_action( 'init', array( 'WPsiteFollowUs', 'load_textdoamin' ) );
add_action( 'admin_menu', array( 'WPsiteFollowUs', 'add_menu_page' ) );

/**
 * AJAX
 */
add_action( 'wp_ajax_wpsite_save_order', array( 'WPsiteFollowUs', 'save_order' ) );

$plugin = plugin_basename(__FILE__);
add_filter( "plugin_action_links_$plugin", array( 'WPsiteFollowUs', 'wpsite_follow_us_badges_settings_link' ) );

/**
 *  WPsiteFollowUs main class
 *
 * @since 1.0.0
 * @using Wordpress 3.8
 */
class WPsiteFollowUs extends WP_Widget {

	/**
	 * prefix
	 *
	 * (default value: 'wpsite_follow_us_')
	 *
	 * @var string
	 * @access private
	 * @static
	 */
	private static $prefix = 'wpsite_follow_us_';

	/**
	 * settings_page
	 *
	 * (default value: 'wpsite-follow-us-badges-settings')
	 *
	 * @var string
	 * @access private
	 * @static
	 */
	private static $settings_page = 'wpsite-follow-us-badges-settings';

	/**
	 * default
	 *
	 * @var mixed
	 * @access private
	 * @static
	 */
	public static $default = array(
		'order'		=> array('twitter', 'facebook', 'linkedin', 'pinterest', 'youtube', 'tumblr'),
		'twitter'	=> array(
			'active'	=> true,
			'user'		=> '99Robots',
			'args'		=> array(
				'link'						=> false,
				'followers_count_display' 	=> true,
				'language'					=> 'en',
				'width'						=> '100%',
				'alignment'					=> 'left',
				'show_screen_name'			=> false,
				'size'						=> 'medium'
				//'opt_out'					=> false
			)
		),
		'facebook'	=> array(
			'active'	=> true,
			'user'		=> '99Robots',
			'args'		=> array(
				'type'					=> 'like',
				'link'					=> false,
				'width'					=> '',
				'language'				=> 'en_US',
				'layout'				=> 'standard',
				'action_type'			=> 'like',
				'colorscheme'			=> 'light',
				'show_friends_faces'	=> false,
				'include_share_button'	=> false
			)
		),
		'linkedin'	=> array(
			'active'	=> false,
			'user'		=> '99-robots',
			'args'		=> array(
				'link'			=> false,
				'type'			=> 'company',
				'count_mode'	=> 'right',
				'language'		=> 'en_US'
			)
		),
		'pinterest'	=> array(
			'active'	=> false,
			'user'		=> 'http://www.pinterest.com/99robots/',
			'args'		=> array(
				'link'	=> false,
				'name'	=> 'WPsite'
			)
		),
		'youtube'	=> array(
			'active'	=> false,
			'user'		=> 'UCS_IvbhoIdDXn87y_HwQf_g',
			'args'		=> array(
				'link'		=> false,
				'layout'	=> 'default',
				'theme'		=> 'default',
				'count'		=> true,
			)
		),
		'tumblr'	=> array(
			'active'	=> false,
			'user'		=> 'staff',
			'args'		=> array(
				'link'		=> false,
				'color'		=> 'dark',
				'button'	=> '2',
			)
		)
	);

	/**
	 * twitter_supported_languages
	 *
	 * @var mixed
	 * @access private
	 * @static
	 */
	private static $twitter_supported_languages = array(
		'en',
		'fr',
		'de',
		'it',
		'es',
		'ko',
		'ja'
	);

	/**
	 * facebook_supported_languages
	 *
	 * @var mixed
	 * @access private
	 * @static
	 */
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

	/**
	 * google_supported_languages
	 *
	 * @var mixed
	 * @access private
	 * @static
	 */
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
		'it',
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

	/**
	 * linkedin_supported_languages
	 *
	 * @var mixed
	 * @access private
	 * @static
	 */
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

		// Check if multisite, if so then save as site option
		if ( is_multisite() ) {
			add_site_option( 'wpsite_follow_us_badges_version', WPSITE_FOLLOW_US_VERSION_NUM );
		} else {
			add_option( 'wpsite_follow_us_badges_version', WPSITE_FOLLOW_US_VERSION_NUM );
		}

		$settings = get_option( 'wpsite_follow_us_settings' );

		// Default values
		if ( false === $settings ) {
			$settings = self::$default;
		}

		// Add youtube after 1.2.1
		if ( ! in_array( 'youtube', $settings['order'] ) ) {
			$settings['order'][] = 'youtube';
		}

		// Add tumblr after 1.3
		if ( ! in_array( 'tumblr', $settings['order'] ) ) {
			$settings['order'][] = 'tumblr';
		}

		update_option( 'wpsite_follow_us_settings', $settings );
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
		load_plugin_textdomain( 'wpsite-follow-us-badges', false, WPSITE_FOLLOW_US_PLUGIN_DIR . '/languages' );
	}

	/**
	 * Hooks to 'admin_menu'
	 *
	 * @since 1.0.0
	 */
	static function add_menu_page() {

		/* Cast the first sub menu to the top menu */

	    $settings_page_load = add_submenu_page(
	    	'options-general.php',
	    	esc_html__( '99 Robots Follow Us', 'wpsite-follow-us-badges' ),
	    	esc_html__( 'Follow Us Badges', 'wpsite-follow-us-badges' ),
	    	'manage_options',
	    	self::$settings_page,
	    	array( 'WPsiteFollowUs', 'wpsite_follow_us_admin_settings' )
	    );
	    add_action( "load-$settings_page_load", array( 'WPsiteFollowUs', 'wpsite_follow_us_include_admin_scripts' ) );
	}

	/**
	 * Hooks to 'plugin_action_links_' filter
	 *
	 * @since 1.0.0
	 */
	static function wpsite_follow_us_badges_settings_link($links) {

		$settings_link = '<a href="options-general.php?page=' . self::$settings_page . '">Settings</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Hooks to 'admin_print_scripts-$page'
	 *
	 * @since 1.0.0
	 */
	static function wpsite_follow_us_include_admin_scripts() {

		// CSS
		wp_register_style( 'wpsite_follow_us_settings_css', WPSITE_FOLLOW_US_PLUGIN_URL . '/admin/css/settings.css') ;
		wp_enqueue_style( 'wpsite_follow_us_settings_css' );

		wp_register_style( 'nnr_bootstrap_css', WPSITE_FOLLOW_US_PLUGIN_URL . '/admin/css/nnr-bootstrap.min.css' );
		wp_enqueue_style( 'nnr_bootstrap_css' );

		wp_register_style( 'wpsite_follow_us_sortables_css', WPSITE_FOLLOW_US_PLUGIN_URL . '/admin/css/sortables.css' );
		wp_enqueue_style( 'wpsite_follow_us_sortables_css' );

		wp_register_style( 'wpsite_follow_us_fontawesome', WPSITE_FOLLOW_US_PLUGIN_URL . '/admin/fonts/font-awesome.min.css' );
		wp_enqueue_style( 'wpsite_follow_us_fontawesome' );

		// Scripts
		wp_enqueue_script( self::$prefix . 'bootstrap_js', WPSITE_FOLLOW_US_PLUGIN_URL . '/admin/js/bootstrap.js', array( 'jquery' ) );
		wp_enqueue_script( self::$prefix . 'admin_js', WPSITE_FOLLOW_US_PLUGIN_URL . '/admin/js/admin.js', array( 'jquery' ) );
	}

	/**
	 * Displays the HTML for the 'general-admin-menu-settings' admin page
	 *
	 * @since 1.0.0
	 */
	static function wpsite_follow_us_admin_settings() {

		$settings = get_option( 'wpsite_follow_us_settings' );

		// Default values
		if ( false === $settings ) {
			$settings = self::$default;
		}

		// Save data nd check nonce
		if ( isset( $_POST['submit'] ) && check_admin_referer( 'wpsite_follow_us_admin_settings' ) ) {

			$settings = array(
				'order'		=> $settings['order'],
				'twitter'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_twitter_active']) && $_POST['wpsite_follow_us_settings_twitter_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_twitter_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_twitter_user'])) : '',
					'args'		=> array(
						'link' 	=> isset($_POST['wpsite_follow_us_settings_twitter_args_link']) && $_POST['wpsite_follow_us_settings_twitter_args_link'] ? true : false,
						'followers_count_display' 	=> isset($_POST['wpsite_follow_us_settings_twitter_args_followers_count_display']) && $_POST['wpsite_follow_us_settings_twitter_args_followers_count_display'] ? true : false,
						'language'					=> $_POST['wpsite_follow_us_settings_twitter_args_language'],
						'width'						=> isset($_POST['wpsite_follow_us_settings_twitter_args_width']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_twitter_args_width'])) : '',
						'alignment'					=> $_POST['wpsite_follow_us_settings_twitter_args_alignment'],
						'show_screen_name'			=> isset($_POST['wpsite_follow_us_settings_twitter_args_show_screen_name']) && $_POST['wpsite_follow_us_settings_twitter_args_show_screen_name'] ? true : false,
						'size'						=> $_POST['wpsite_follow_us_settings_twitter_args_size']
						//'opt_out'					=> isset($_POST['wpsite_follow_us_settings_twitter_args_opt_out']) && $_POST['wpsite_follow_us_settings_twitter_args_opt_out'] ? true : false
					)
				),
				'facebook'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_facebook_active']) && $_POST['wpsite_follow_us_settings_facebook_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_facebook_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_facebook_user'])) : '',
					'args'		=> array(
						'type'					=> $_POST['wpsite_follow_us_settings_facebook_args_type'],
						'link' 	=> isset($_POST['wpsite_follow_us_settings_facebook_args_link']) && $_POST['wpsite_follow_us_settings_facebook_args_link'] ? true : false,
						'width'					=> isset($_POST['wpsite_follow_us_settings_facebook_args_width']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_facebook_args_width'])) : '',
						'layout'				=> $_POST['wpsite_follow_us_settings_facebook_args_layout'],
						'language'				=> $_POST['wpsite_follow_us_settings_facebook_args_language'],
						'action_type'			=> $_POST['wpsite_follow_us_settings_facebook_args_action_type'],
						'colorscheme'			=> $_POST['wpsite_follow_us_settings_facebook_args_colorscheme'],
						'show_friends_faces'	=> isset($_POST['wpsite_follow_us_settings_facebook_args_show_friends_faces']) && $_POST['wpsite_follow_us_settings_facebook_args_show_friends_faces'] ? true : false,
						'include_share_button'	=> isset($_POST['wpsite_follow_us_settings_facebook_args_include_share_button']) && $_POST['wpsite_follow_us_settings_facebook_args_include_share_button'] ? true : false
					)
				),
				'linkedin'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_linkedin_active']) && $_POST['wpsite_follow_us_settings_linkedin_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_linkedin_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_linkedin_user'])) : '',
					'args'		=> array(
						'link' 	=> isset($_POST['wpsite_follow_us_settings_linkedin_args_link']) && $_POST['wpsite_follow_us_settings_linkedin_args_link'] ? true : false,
						'type'			=> $_POST['wpsite_follow_us_settings_linkedin_args_type'],
						'count_mode'	=> $_POST['wpsite_follow_us_settings_linkedin_args_count_mode'],
						'language'		=> $_POST['wpsite_follow_us_settings_linkedin_args_language'],
					)
				),
				'pinterest'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_pinterest_active']) && $_POST['wpsite_follow_us_settings_pinterest_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_pinterest_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_pinterest_user'])) : '',
					'args'		=> array(
						'link' 	=> isset($_POST['wpsite_follow_us_settings_pinterest_args_link']) && $_POST['wpsite_follow_us_settings_pinterest_args_link'] ? true : false,
						'name'	=> isset($_POST['wpsite_follow_us_settings_pinterest_args_name']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_pinterest_args_name'])) : '',
					)
				),
				'youtube'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_youtube_active']) && $_POST['wpsite_follow_us_settings_youtube_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_youtube_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_youtube_user'])) : '',
					'args'		=> array(
						'link' 		=> isset($_POST['wpsite_follow_us_settings_youtube_args_link']) && $_POST['wpsite_follow_us_settings_youtube_args_link'] ? true : false,
						'layout'	=> $_POST['wpsite_follow_us_settings_youtube_args_layout'],
						'theme'		=> $_POST['wpsite_follow_us_settings_youtube_args_theme'],
						'count'		=> isset($_POST['wpsite_follow_us_settings_youtube_args_count']) && $_POST['wpsite_follow_us_settings_youtube_args_count'] ? true : false,
					)
				),
				'tumblr'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_tumblr_active']) && $_POST['wpsite_follow_us_settings_tumblr_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_tumblr_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_tumblr_user'])) : '',
					'args'		=> array(
						'link' 		=> isset($_POST['wpsite_follow_us_settings_tumblr_args_link']) && $_POST['wpsite_follow_us_settings_tumblr_args_link'] ? true : false,
						'color'		=> $_POST['wpsite_follow_us_settings_tumblr_args_color'],
						'button'	=> $_POST['wpsite_follow_us_settings_tumblr_args_button'],
					)
				)
			);

			update_option( 'wpsite_follow_us_settings', $settings );
		}

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-sortable' );

		require_once( 'admin/settings.php' );
	}

	/**
	 * AJAX with action 'wpsite_save_order'
	 *
	 * @since 1.0.0
	 */
	static function save_order() {

		$settings = get_option( 'wpsite_follow_us_settings' );

		// Default values

		if ( false === $settings ) {
			$settings = self::$default;
		}

		$settings['order'] = $_POST['order'];

		update_option( 'wpsite_follow_us_settings', $settings );

		die();
	}

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wpsite_follow_us_badges',
			esc_html__( 'Follow Us Badges', 'wpsite-follow-us-badges' ),
			array( 'description' => __( 'Add follow buttons to your sidebar', 'wpsite-follow-us-badges' ) )
		);
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

		wp_enqueue_style( 'wpsite_follow_us_badges_widget_css', plugins_url( '/css/wpsite-follow-us-badges.css', __FILE__ ) );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$settings = get_option( 'wpsite_follow_us_settings' );

		// Default values
		if ( false === $settings ) {
			$settings = self::$default;
		}

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$content = '';
		foreach ( $settings['order'] as $order ) {

			// Twitter
			if ( 'twitter' === $order ) {
				if (isset($settings['twitter']['active']) && $settings['twitter']['active']) {

					if (isset($settings['twitter']['args']['link']) && $settings['twitter']['args']['link']) {
						$content .= '<div class="wpsite_follow_us_div_link"><a class="twitter" href="https://twitter.com/' . $settings['twitter']['user'] . '" target="_blank">Twitter</a></div>';
					} else {
						$content .= '<div class="wpsite_follow_us_div twitterbox"><a href="https://twitter.com/' . $settings['twitter']['user'] . '" class="twitter-follow-button"';

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
				}
			}

			// Facebook
			else if ( 'facebook' === $order ) {
				if (isset($settings['facebook']['active']) && $settings['facebook']['active']) {

					if (isset($settings['facebook']['args']['link']) && $settings['facebook']['args']['link']) {
						$content .= '<div class="wpsite_follow_us_div_link"><a class="facebook" href="https://facebook.com/' . $settings['facebook']['user'] . '" target="_blank">Facebook</a></div>';
					} else {
						$content .= '<div class="wpsite_follow_us_div facebookbox"><div class="fb-' . $settings['facebook']['args']['type'] . '" data-href="https://facebook.com/' . $settings['facebook']['user'] . '"';

						if ($settings['facebook']['args']['type'] == 'like') {
							if (isset($settings['facebook']['args']['include_share_button']) && $settings['facebook']['args']['include_share_button']) {
								$content .= ' data-share="true"';
							} else {
								$content .= ' data-share="false"';
							}

							if (isset($settings['facebook']['args']['action_type'])) {
								$content .= ' data-action="' . $settings['facebook']['args']['action_type'] .'"';
							}
						}

						if (isset($settings['facebook']['args']['show_friends_faces']) && $settings['facebook']['args']['show_friends_faces']) {
							$content .= ' data-show-faces="true"';
						} else {
							$content .= ' data-show-faces="false"';
						}

						if (isset($settings['facebook']['args']['layout'])) {
							$content .= ' data-layout="' . $settings['facebook']['args']['layout'] .'"';
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
				}
			}

			// LinkedIn
			else if ( 'linkedin' === $order ) {
				if (isset($settings['linkedin']['active']) && $settings['linkedin']['active']) {

					if (isset($settings['linkedin']['args']['link']) && $settings['linkedin']['args']['link']) {

						if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'person') {
							$content .= '<div class="wpsite_follow_us_div_link"><a class="linkedin" href="https://www.linkedin.com/profile/view?id=' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
						} else if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'company') {
							$content .= '<div class="wpsite_follow_us_div_link"><a class="linkedin" href="https://www.linkedin.com/company/' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
						} else if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'group') {
							$content .= '<div class="wpsite_follow_us_div_link"><a class="linkedin" href="https://www.linkedin.com/groups?gid=' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
						} else if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'university') {
							$content .= '<div class="wpsite_follow_us_div_link"><a class="linkedin" href="https://www.linkedin.com/edu/school?id=' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
						}

					} else {
						$content .= '<div class="wpsite_follow_us_div linkedinbox"><script src="//platform.linkedin.com/in.js" type="text/javascript">';

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

			// Pinterest
			else if ( 'pinterest' === $order ) {
				if (isset($settings['pinterest']['active']) && $settings['pinterest']['active']) {

					if (isset($settings['pinterest']['args']['link']) && $settings['pinterest']['args']['link']) {
						$content .= '<div class="wpsite_follow_us_div_link"><a class="pinterest" href="' . $settings['pinterest']['user'] . '" target="_blank">Pinterest</a></div>';
					} else {
						$content .= '<div class="wpsite_follow_us_div pinterestbox"><a data-pin-do="buttonFollow" href="' . $settings['pinterest']['user'] . '" >';

						if (isset($settings['pinterest']['args']['name'])) {
							$content .= $settings['pinterest']['args']['name'];
						}

						$content .= '</a><!-- Please call pinit.js only once per page --><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script></div>';
					}
				}
			}

			// YouTube
			else if ( 'youtube' === $order ) {
				if (isset($settings['youtube']['active']) && $settings['youtube']['active']) {

					if (isset($settings['youtube']['args']['link']) && $settings['youtube']['args']['link']) {
						$content .= '<div class="wpsite_follow_us_div_link"><a class="youtube" href="https://www.youtube.com/channel/' . $settings['youtube']['user'] . '" target="_blank">YouTube</a></div>';
					} else {
						$content .= '<div class="wpsite_follow_us_div youtubebox"><div class="g-ytsubscribe" data-channelid="'. $settings['youtube']['user'] . '"';

						if (isset($settings['youtube']['args']['layout'])) {
							$content .= ' data-layout="' . $settings['youtube']['args']['layout'] .'"';
						}

						if (isset($settings['youtube']['args']['theme'])) {
							$content .= ' data-theme="' . $settings['youtube']['args']['theme'] .'"';
						}

						if (isset($settings['youtube']['args']['count'])) {
							$content .= ' data-count="' . $settings['youtube']['args']['count'] .'"';
						}

						$content .= '></div><script src="https://apis.google.com/js/platform.js"></script></div>';
					}
				}
			}

			// Tumblr
			else if ( 'tumblr' === $order ) {
				if (isset($settings['tumblr']['active']) && $settings['tumblr']['active']) {

					if (isset($settings['tumblr']['args']['link']) && $settings['tumblr']['args']['link']) {
						$content .= '<div class="wpsite_follow_us_div_link"><a class="tumblr" href="http://' . $settings['tumblr']['user'] . '.tumblr.com" target="_blank">tumblr</a></div>';
					} else {
						$content .= '<iframe class="btn wpsite_follow_us_div tumblrbox" height="25" frameborder="0" border="0" scrolling="no" allowtransparency="true" src="http://platform.tumblr.com/v1/follow_button.html?';

						if (isset($settings['tumblr']['args']['button'])) {
							$content .= 'button_type=' . $settings['tumblr']['args']['button'];
						}

						if (isset($settings['tumblr']['user'])) {
							$content .= '&tumblelog=' . $settings['tumblr']['user'];
						}

						if (isset($settings['tumblr']['args']['color'])) {
							$content .= '&color_scheme=' . $settings['tumblr']['args']['color'];
						}

						$content .= '"></iframe>';
					}
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'Follow Us', 'wpsite-follow-us-badges' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php esc_html_e( 'Title:' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ) ?>" name="<?php echo $this->get_field_name( 'title' ) ?>" type="text" value="<?php echo esc_attr( $title ) ?>">
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

// Shortcode
add_shortcode( 'wpsite_follow_us_badges', 'wpsite_follow_us_badges_shortcode' );
/**
 * Create the shortcode for this plugin.  All features are included in the shortcode
 *
 * @access public
 * @param mixed $atts
 * @return void
 */
function wpsite_follow_us_badges_shortcode( $atts ) {

	wp_enqueue_style('wpsite_follow_us_badges_widget_css', plugins_url('/css/wpsite-follow-us-badges.css', __FILE__));

	$args = shortcode_atts( array(
		'title'								=> '',
		'inline'							=> 'false',
		'order'								=> "twitter,facebook,linkedin,pinterest,youtube,tumblr",
		'twitter'							=> null,
		'twitter_link'						=> 'false',
		'twitter_followers_count_display' 	=> 'true',
		'twitter_language'					=> 'en',
		'twitter_width'						=> '100%',
		'twitter_alignment'					=> 'left',
		'twitter_show_screen_name'			=> 'false',
		'twitter_size'						=> 'medium',
		'facebook'							=> null,
		'facebook_type'						=> 'like',
		'facebook_link'						=> 'false',
		'facebook_width'					=> '',
		'facebook_language'					=> 'en_US',
		'facebook_layout'					=> 'standard',
		'facebook_action_type'				=> 'like',
		'facebook_colorscheme'				=> 'light',
		'facebook_show_friends_faces'		=> 'false',
		'facebook_include_share_button'		=> 'false',
		'google_link'						=> 'false',
		'google'							=> null,
		'google_size'						=> '20',
		'google_annotation'					=> 'bubble',
		'google_language'					=> 'en-US',
		'google_asynchronous' 				=> 'true',
		'google_parse_tags'					=> 'default',
		'linkedin'							=> null,
		'linkedin_link'						=> 'false',
		'linkedin_type'						=> 'company',
		'linkedin_count_mode'				=> 'right',
		'linkedin_language'					=> 'en_US',
		'pinterest'							=> null,
		'pinterest_link'					=> 'false',
		'pinterest_name'					=> 'WPsite',
		'youtube'							=> null,
		'youtube_link'						=> 'false',
		'youtube_layout'					=> 'default',
		'youtube_theme'						=> 'default',
		'youtube_count'						=> 'true',
		'tumblr'							=> null,
		'tumblr_link'						=> 'false',
		'tumblr_color'						=> 'dark',
		'tumblr_button'						=> '2',
	), $atts );

	// Re-create args array so our code can understand the data
	$settings = array(
		'title'		=> $args['title'],
		'inline'	=> $args['inline'] === 'true' ? true : false,
		'order'		=> explode(',', str_replace(' ', '', $args['order'])),
		'twitter'	=> array(
			'active'	=> isset($args['twitter']) ? true : false,
			'user'		=> $args['twitter'],
			'args'		=> array(
				'link'						=> $args['twitter_link'] === 'true' ? true : false,
				'followers_count_display' 	=> $args['twitter_followers_count_display'] === 'true' ? true : false,
				'language'					=> $args['twitter_language'],
				'width'						=> $args['twitter_width'],
				'alignment'					=> $args['twitter_alignment'],
				'show_screen_name'			=> $args['twitter_show_screen_name'] === 'true' ? true : false,
				'size'						=> $args['twitter_size']
			)
		),
		'facebook'	=> array(
			'active'	=> isset($args['facebook']) ? true : false,
			'user'		=> $args['facebook'],
			'args'		=> array(
				'type'					=> $args['facebook_type'],
				'link'					=> $args['facebook_link'] === 'true' ? true : false,
				'width'					=> $args['facebook_width'],
				'language'				=> $args['facebook_language'],
				'layout'				=> $args['facebook_layout'],
				'action_type'			=> $args['facebook_action_type'],
				'colorscheme'			=> $args['facebook_colorscheme'],
				'show_friends_faces'	=> $args['facebook_show_friends_faces'] === 'true' ? true : false,
				'include_share_button'	=> $args['facebook_include_share_button'] === 'true' ? true : false,
			)
		),
		'linkedin'	=> array(
			'active'	=> isset($args['linkedin']) ? true : false,
			'user'		=> $args['linkedin'],
			'args'		=> array(
				'link'			=> $args['linkedin_link'] === 'true' ? true : false,
				'type'			=> $args['linkedin_type'],
				'count_mode'	=> $args['linkedin_count_mode'],
				'language'		=> $args['linkedin_language']
			)
		),
		'pinterest'	=> array(
			'active'	=> isset($args['pinterest']) ? true : false,
			'user'		=> $args['pinterest'],
			'args'		=> array(
				'link'	=> $args['pinterest_link'] === 'true' ? true : false,
				'name'	=> $args['pinterest_name']
			)
		),
		'youtube'	=> array(
			'active'	=> isset($args['youtube']) ? true : false,
			'user'		=> $args['youtube'],
			'args'		=> array(
				'link'		=> $args['youtube_link'] === 'true' ? true : false,
				'layout'	=> $args['youtube_layout'],
				'theme'		=> $args['youtube_theme'],
				'count'		=> $args['youtube_count'] === 'true' ? true : false,
			)
		),
		'tumblr'	=> array(
			'active'	=> isset($args['tumblr']) ? true : false,
			'user'		=> $args['tumblr'],
			'args'		=> array(
				'link'		=> $args['tumblr_link'] === 'true' ? true : false,
				'color'		=> $args['tumblr_color'],
				'button'	=> $args['tumblr_button'],
			)
		)
	);

	// Create class for inline elements
	$inline_class = '';
	if ( $settings['inline'] ) {
		$inline_class = 'wpsite_follow_us_div_inline';
	}

	$content = '<div class="wpsite_follow_us_badges_shortcode">';

	if ( isset( $settings['title'] ) && '' !== $settings['title'] ) {

		if ( $settings['inline'] ) {
			$content .= '<span>' . $settings['title'] . '</span>';
		} else {
			$content .= '<h3>' . $settings['title'] . '</h3>';
		}
	}

	foreach ( $settings['order'] as $order ) {

		// Twitter
		if ( 'twitter' === $order ) {
			if (isset($settings['twitter']['active']) && $settings['twitter']['active']) {

				if (isset($settings['twitter']['args']['link']) && $settings['twitter']['args']['link']) {
					$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="twitter" href="https://twitter.com/' . $settings['twitter']['user'] . '" target="_blank">Twitter</a></div>';
				} else {
					$content .= '<div class="wpsite_follow_us_div twitterbox ' . $inline_class . '"><a href="https://twitter.com/' . $settings['twitter']['user'] . '" class="twitter-follow-button"';

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
			}
		}

		// Facebook
		else if ( 'facebook' === $order ) {
			if (isset($settings['facebook']['active']) && $settings['facebook']['active']) {

				if (isset($settings['facebook']['args']['link']) && $settings['facebook']['args']['link']) {
					$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="facebook" href="https://facebook.com/' . $settings['facebook']['user'] . '" target="_blank">Facebook</a></div>';
				} else {
					$content .= '<div class="wpsite_follow_us_div facebookbox ' . $inline_class . '"><div class="fb-' . $settings['facebook']['args']['type'] . '" data-href="https://facebook.com/' . $settings['facebook']['user'] . '"';

					if ($settings['facebook']['args']['type'] == 'like') {
						if (isset($settings['facebook']['args']['include_share_button']) && $settings['facebook']['args']['include_share_button']) {
							$content .= ' data-share="true"';
						} else {
							$content .= ' data-share="false"';
						}

						if (isset($settings['facebook']['args']['action_type'])) {
							$content .= ' data-action="' . $settings['facebook']['args']['action_type'] .'"';
						}
					}

					if (isset($settings['facebook']['args']['show_friends_faces']) && $settings['facebook']['args']['show_friends_faces']) {
						$content .= ' data-show-faces="true"';
					} else {
						$content .= ' data-show-faces="false"';
					}

					if (isset($settings['facebook']['args']['layout'])) {
						$content .= ' data-layout="' . $settings['facebook']['args']['layout'] .'"';
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
			}
		}

		// LinkedIn
		else if ( 'linkedin' === $order ) {
			if (isset($settings['linkedin']['active']) && $settings['linkedin']['active']) {

				if (isset($settings['linkedin']['args']['link']) && $settings['linkedin']['args']['link']) {

					if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'person') {
						$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="linkedin" href="https://www.linkedin.com/profile/view?id=' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
					} else if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'company') {
						$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="linkedin" href="https://www.linkedin.com/company/' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
					} else if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'group') {
						$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="linkedin" href="https://www.linkedin.com/groups?gid=' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
					} else if (isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'university') {
						$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="linkedin" href="https://www.linkedin.com/edu/school?id=' . $settings['linkedin']['user'] . '" target="_blank">LinkedIn</a></div>';
					}

				} else {
					$content .= '<div class="wpsite_follow_us_div linkedinbox ' . $inline_class . '"><script src="//platform.linkedin.com/in.js" type="text/javascript">';

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
		// Pinterest
		else if ( 'pinterest' === $order ) {
			if (isset($settings['pinterest']['active']) && $settings['pinterest']['active']) {

				if (isset($settings['pinterest']['args']['link']) && $settings['pinterest']['args']['link']) {
					$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="pinterest" href="' . $settings['pinterest']['user'] . '" target="_blank">Pinterest</a></div>';
				} else {
					$content .= '<div class="wpsite_follow_us_div pinterestbox ' . $inline_class . '"><a data-pin-do="buttonFollow" href="' . $settings['pinterest']['user'] . '" >';

					if (isset($settings['pinterest']['args']['name'])) {
						$content .= $settings['pinterest']['args']['name'];
					}

					$content .= '</a><!-- Please call pinit.js only once per page --><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script></div>';
				}
			}
		}
		// YouTube
		else if ( 'youtube' === $order ) {
			if (isset($settings['youtube']['active']) && $settings['youtube']['active']) {

				if (isset($settings['youtube']['args']['link']) && $settings['youtube']['args']['link']) {
					$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="youtube" href="https://www.youtube.com/channel/' . $settings['youtube']['user'] . '" target="_blank">YouTube</a></div>';
				} else {
					$content .= '<div class="wpsite_follow_us_div youtubebox ' . $inline_class . '"><div class="g-ytsubscribe" data-channelid="'. $settings['youtube']['user'] . '"';

					if (isset($settings['youtube']['args']['layout'])) {
						$content .= ' data-layout="' . $settings['youtube']['args']['layout'] .'"';
					}

					if (isset($settings['youtube']['args']['theme'])) {
						$content .= ' data-theme="' . $settings['youtube']['args']['theme'] .'"';
					}

					if (isset($settings['youtube']['args']['count'])) {
						$content .= ' data-count="' . $settings['youtube']['args']['count'] .'"';
					}

					$content .= '></div><script src="https://apis.google.com/js/platform.js"></script></div>';
				}
			}
		}
		// Tumblr
		else if ( 'tumblr' === $order ) {
			if (isset($settings['tumblr']['active']) && $settings['tumblr']['active']) {

				if (isset($settings['tumblr']['args']['link']) && $settings['tumblr']['args']['link']) {
					$content .= '<div class="wpsite_follow_us_div_link ' . $inline_class . '"><a class="tumblr" href="http://' . $settings['tumblr']['user'] . '.tumblr.com" target="_blank">tumblr</a></div>';
				} else {
					$content .= '<iframe class="btn wpsite_follow_us_div tumblrbox ' . $inline_class . '" height="25" width="117" frameborder="0" border="0" scrolling="no" allowtransparency="true" src="http://platform.tumblr.com/v1/follow_button.html?';

					if (isset($settings['tumblr']['args']['button'])) {
						$content .= 'button_type=' . $settings['tumblr']['args']['button'];
					}

					if (isset($settings['tumblr']['user'])) {
						$content .= '&tumblelog=' . $settings['tumblr']['user'];
					}

					if (isset($settings['tumblr']['args']['color'])) {
						$content .= '&color_scheme=' . $settings['tumblr']['args']['color'];
					}

					$content .= '"></iframe>';
				}
			}
		}
	}

	return $content . "</div>";
}
