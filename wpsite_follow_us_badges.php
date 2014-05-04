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
		'twitter'	=> array(
			'active'	=> false,
			'user'		=> 'WPsite'
		),
		'facebook'	=> array(
			'active'	=> false,
			'user'		=> 'WPsite'
		),
		'google'	=> array(
			'active'	=> false,
			'user'		=> '106771475441130344412'
		),
		'linkedin'	=> array(
			'active'	=> false,
			'user'		=> '2839460'
		)
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
				'twitter'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_twitter_active']) && $_POST['wpsite_follow_us_settings_twitter_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_twitter_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_twitter_user'])) : ''
				),
				'facebook'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_facebook_active']) && $_POST['wpsite_follow_us_settings_facebook_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_facebook_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_facebook_user'])) : ''
				),
				'google'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_google_active']) && $_POST['wpsite_follow_us_settings_google_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_google_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_google_user'])) : ''
				),
				'linkedin'	=> array(
					'active'	=> isset($_POST['wpsite_follow_us_settings_linkedin_active']) && $_POST['wpsite_follow_us_settings_linkedin_active'] ? true : false,
					'user'		=> isset($_POST['wpsite_follow_us_settings_linkedin_user']) ?stripcslashes(sanitize_text_field($_POST['wpsite_follow_us_settings_linkedin_user'])) : ''
				)
			);
			
			update_option('wpsite_follow_us_settings', $settings);
		}
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_style('wpsite-jquery-ui', self::$jquery_ui_css);
		?>
		
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$( "#tabs" ).tabs();
		});
		</script>
		
		<div class="wrap wpsite_admin_panel">
			<div class="wpsite_admin_panel_banner">
				<h1><?php _e('WPsite Follow Us Badges Settings Page', self::$text_domain); ?></h1>
			</div>
			
			<div id="wpsite_admin_panel_settings" class="wpsite_admin_panel_content">
			
				<form method="post">
				
					<div id="tabs">
						<ul>
							<li><a href="#wpsite_div_twitter"><?php _e('Twitter',self::$text_domain); ?></a></li>
							<li><a href="#wpsite_div_facebook"><?php _e('Facebook',self::$text_domain); ?></a></li>
							<li><a href="#wpsite_div_google"><?php _e('Google+',self::$text_domain); ?></a></li>
							<li><a href="#wpsite_div_linkedin"><?php _e('LinkedIn',self::$text_domain); ?></a></li>
							<li><a href="#wpsite_div_order"><?php _e('Order',self::$text_domain); ?></a></li>
						</ul>
						
						<div id="wpsite_div_twitter">
							<table>
								<tbody>
								
									<!-- Active -->
								
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<a href="https://dev.twitter.com/docs/follow-button" target="_blank"><label><?php _e('Twitter', self::$text_domain); ?></label></a>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_twitter_active" name="wpsite_follow_us_settings_twitter_active" type="checkbox" <?php echo isset($settings['twitter']['active']) && $settings['twitter']['active'] ? 'checked="checked"' : ''; ?> placeholder="your_username">
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_twitter_user" name="wpsite_follow_us_settings_twitter_user" type="text" value="<?php echo esc_attr($settings['twitter']['user']); ?>"><br/>
												<em><label><?php _e('https://twitter.com/', self::$text_domain); ?></label><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
						</div>
						
						<div id="wpsite_div_facebook">
							<table>
								<tbody>
								
									<!-- Active -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<a href="https://developers.facebook.com/docs/plugins/like-button/" target="_blank"><label><?php _e('Facebook', self::$text_domain); ?></label></a>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_facebook_active" name="wpsite_follow_us_settings_facebook_active" type="checkbox" <?php echo isset($settings['facebook']['active']) && $settings['facebook']['active'] ? 'checked="checked"' : ''; ?> placeholder="pages/your_page_name/your_pageid">
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_facebook_user" name="wpsite_follow_us_settings_facebook_user" type="text" value="<?php echo esc_attr($settings['facebook']['user']); ?>"><br/>
												<em><label><?php _e('https://www.facebook.com/', self::$text_domain); ?></label><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em><br/>
												<em><label><?php _e('https://www.facebook.com/', self::$text_domain); ?></label><strong><label><?php _e('"pages/example/112233"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
						</div>
						
						<div id="wpsite_div_google">
							<table>
								<tbody>
								
									<!-- Active -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<a href="https://developers.google.com/+/web/follow/" target="_blank"><label><?php _e('Google+', self::$text_domain); ?></label></a>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_google_active" name="wpsite_follow_us_settings_google_active" type="checkbox" <?php echo isset($settings['google']['active']) && $settings['google']['active'] ? 'checked="checked"' : ''; ?> placeholder="Your ID">
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_google_user" name="wpsite_follow_us_settings_google_user" type="text" value="<?php echo esc_attr($settings['google']['user']); ?>"><br/>
												<em><label><?php _e('https://plus.google.com/u/0/', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong><label><?php _e('/posts', self::$text_domain); ?></label></em>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
						</div>
						
						<div id="wpsite_div_linkedin">
							<table>
								<tbody>
								
									<!-- Active -->	
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><label><?php _e('LinkedIn', self::$text_domain); ?></label></a>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_linkedin_active" name="wpsite_follow_us_settings_linkedin_active" type="checkbox" <?php echo isset($settings['linkedin']['active']) && $settings['linkedin']['active'] ? 'checked="checked"' : ''; ?> placeholder="Your ID">
											</td>
										</th>
									</tr>
									
									<!-- User -->
									
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<td class="wpsite_follow_us_admin_table_td">
												<input size="30" id="wpsite_follow_us_settings_linkedin_user" name="wpsite_follow_us_settings_linkedin_user" type="text" value="<?php echo esc_attr($settings['linkedin']['user']); ?>"><br/>
												<em><label><?php _e('http://www.linkedin.com/profile/view?id=', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em><br/>
												<em><label><?php _e('http://www.linkedin.com/company/', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
						</div>
						
						<div id="wpsite_div_order">
							<table>
								<tbody>
								
									<!-- Order -->
								
									<tr>
										<th class="wpsite_follow_us_admin_table_th">
											<label><?php _e('Size', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_size" name="wpsite_follow_us_settings_size" type="text" size="60" value="<?php echo esc_attr($settings['size']); ?>">
											</td>
										</th>
									</tr>
								
								</tbody>
							</table>
						</div>
						
					</div>
					
					<?php wp_nonce_field('wpsite_follow_us_admin_settings'); ?>
				
					<?php submit_button(); ?>
					
				</form>
			
			</div>
			
			<div id="wpsite_admin_panel_sidebar" class="wpsite_admin_panel_content">
				<img src="http://www.wpsite.net/wp-content/uploads/2011/10/logo-only-100h.png">
			</div>
		</div>
		<?php
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
		
		if (isset($settings['twitter']['active']) && $settings['twitter']['active']) {
			$content .= '
			<div class="wpsite_follow_us_div"><a href="https://twitter.com/' . $settings['twitter']['user'] . '" class="twitter-follow-button" data-show-count="true" data-size="small" data-show-screen-name="false" data-lang="en">Follow</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
			';
		}
		
		if (isset($settings['facebook']['active']) && $settings['facebook']['active']) {
			$content .= '
				<div class="wpsite_follow_us_div">
				<div class="fb-like" data-href="https://facebook.com/' . $settings['facebook']['user'] . '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
				
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, "script", "facebook-jssdk"));</script></div>
			';
		}
		
		if (isset($settings['google']['active']) && $settings['google']['active']) {
			$content .= '
				<div class="wpsite_follow_us_div"><div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/' . $settings['google']['user'] . '" data-rel="publisher"></div>
				
				<!-- Place this tag after the last widget tag. -->
				<script type="text/javascript">
				  (function() {
				    var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
				    po.src = "https://apis.google.com/js/platform.js";
				    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script></div>';
		}
		
		if (isset($settings['linkedin']['active']) && $settings['linkedin']['active']) {
			$content .= '<div class="wpsite_follow_us_div"><script src="//platform.linkedin.com/in.js" type="text/javascript">
					lang: en_US
					</script>
					<script type="IN/FollowCompany" data-id="' . $settings['linkedin']['user'] . '" data-counter="right"></script><div>';
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
