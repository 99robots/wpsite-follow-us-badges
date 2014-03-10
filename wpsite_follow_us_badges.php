<?php
/*
Plugin Name: WPsite Follow Us Badges
plugin URI: wpsite-follow-us-badges
Description:
version: 1.0
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
    define('WPSITE_FOLLOW_US_VERSION_NUM', '1.0.0');
 
 
/** 
 * Activatation / Deactivation 
 */ 
add_action('widgets_init', array('WPsiteFollowUs', 'wpsite_register_widget'));

/** 
 * Hooks / Filter 
 */
 
add_action('init', array('WPsiteFollowUs', 'load_textdoamin'));
add_action('wp_enqueue_scripts', array('WPsiteFollowUs', 'include_styles_scripts'));

/** 
 *  WPsiteFollowUs main class
 *
 * @since 1.0.0
 * @using Wordpress 3.8
 */

class WPsiteFollowUs extends WP_Widget {

	/* Properties */
	
	private static $jquery_latest = 'http://code.jquery.com/jquery-latest.min.js';
	
	private static $text_domain = 'wpsite-follow-us';
	
	private static $prefix = 'wpsite_follow_us_';
	
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
	 * Hooks to 'wp_enqueue_scripts' 
	 * 
	 * @since 1.0.0
	 */
	static function include_styles_scripts() {
		wp_enqueue_style('wpsite_follow_us_css', WPSITE_FOLLOW_US_PLUGIN_URL . '/include/css/wpsite_follow_us.css');
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
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$twitter_user = $instance['twitter_user'];
		$twitter = $instance['twitter'];
		$facebook_user = $instance['facebook_user'];
		$facebook = $instance['facebook'];
		$google_user = $instance['google_user'];
		$google = $instance['google'];
		$linkedin_user = $instance['linkedin_user'];
		$linkedin = $instance['linkedin'];

		echo $args['before_widget'];
		
		if (!empty( $title ))
			echo $args['before_title'] . $title . $args['after_title'];
			
		$content = '';
		
		if ($twitter) {
			$content .= '
			<div class="wpsite_follow_us_div"><a href="https://twitter.com/' . $twitter_user . '" class="twitter-follow-button" data-show-count="true" data-size="small" data-show-screen-name="false" data-lang="en">Follow</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
			';
		}
		
		if ($facebook) {
			$content .= '
				<div class="wpsite_follow_us_div">
				<div class="fb-like" data-href="https://facebook.com/' . $facebook_user . '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
				
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
		
		if ($google) {
			$content .= '
				<div class="wpsite_follow_us_div"><div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/' . $google_user . '" data-rel="publisher"></div>
				
				<!-- Place this tag after the last widget tag. -->
				<script type="text/javascript">
				  (function() {
				    var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
				    po.src = "https://apis.google.com/js/platform.js";
				    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script></div>';
		}
		
		if ($linkedin) {
			$content .= '<div class="wpsite_follow_us_div"><script src="//platform.linkedin.com/in.js" type="text/javascript">
					lang: en_US
					</script>
					<script type="IN/FollowCompany" data-id="' . $linkedin_user . '" data-counter="right"></script><div>';
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
		if (isset( $instance[ 'title' ]))
			$title = $instance[ 'title' ];
		else
			$title = __('title', self::$text_domain);
			
		/* Twitter */
			
		if (isset( $instance[ 'twitter_user' ]))
			$twitter_user = $instance[ 'twitter_user' ];
		else
			$twitter_user = __('', self::$text_domain);
			
		if (isset( $instance[ 'twitter' ]))
			$twitter = $instance[ 'twitter' ];
		else
			$twitter = false;
			
		/* Facebook */
			
		if (isset( $instance[ 'facebook_user' ]))
			$facebook_user = $instance[ 'facebook_user' ];
		else
			$facebook_user = __('', self::$text_domain);
			
		if (isset( $instance[ 'facebook' ]))
			$facebook = $instance[ 'facebook' ];
		else
			$facebook = false;
			
		/* Google+ */
			
		if (isset( $instance[ 'google_user' ]))
			$google_user = $instance[ 'google_user' ];
		else
			$google_user = __('', self::$text_domain);
			
		if (isset( $instance[ 'google' ]))
			$google = $instance[ 'google' ];
		else
			$google = false;
			
		/* Linkedin */
			
		if (isset( $instance[ 'linkedin_user' ]))
			$linkedin_user = $instance[ 'linkedin_user' ];
		else
			$linkedin_user = __('', self::$text_domain);
			
		if (isset( $instance[ 'linkedin' ]))
			$linkedin = $instance[ 'linkedin' ];
		else
			$linkedin = false;
		
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		
		<!-- Twitter -->
		
		<p>
			<a href="https://dev.twitter.com/docs/follow-button" target="_blank"><label><?php _e( 'Twitter' ); ?></label></a><br/>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="checkbox" <?php echo isset($twitter) && $twitter ? 'checked="checked"' : ''; ?> placeholder="your_username">
			<input size="30" id="<?php echo $this->get_field_id('twitter_user'); ?>" name="<?php echo $this->get_field_name('twitter_user'); ?>" type="text" value="<?php echo esc_attr( $twitter_user ); ?>"><br/>
			<em><label><?php _e( 'https://twitter.com/' ); ?></label><strong><label><?php _e( '"example"' ); ?></label></strong></em>
		</p>
		
		<!-- Facebook -->
		
		<p>
			<a href="https://developers.facebook.com/docs/plugins/like-button/" target="_blank"><label><?php _e( 'Facebook' ); ?></label></a><br/>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="checkbox" <?php echo isset($facebook) && $facebook ? 'checked="checked"' : ''; ?> placeholder="pages/your_page_name/your_pageid">
			<input size="30" id="<?php echo $this->get_field_id( 'facebook_user' ); ?>" name="<?php echo $this->get_field_name( 'facebook_user' ); ?>" type="text" value="<?php echo esc_attr( $facebook_user ); ?>"><br/>
			<em><label><?php _e( 'https://www.facebook.com/' ); ?></label><strong><label><?php _e( '"example"' ); ?></label></strong></em><br/>
			<em><label><?php _e( 'https://www.facebook.com/' ); ?></label><strong><label><?php _e( '"pages/example/112233"' ); ?></label></strong></em><br/>
		</p>
		
		<!-- Google+ -->
		
		<p>
			<a href="https://developers.google.com/+/web/follow/" target="_blank"><label><?php _e( 'Google' ); ?></label></a><br/>
			<input id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" type="checkbox" <?php echo isset($google) && $google ? 'checked="checked"' : ''; ?> placeholder="Your ID">
			<input size="30" id="<?php echo $this->get_field_id( 'google_user' ); ?>" name="<?php echo $this->get_field_name( 'google_user' ); ?>" type="text" value="<?php echo esc_attr( $google_user ); ?>"><br/>
			<em><label><?php _e( 'https://plus.google.com/u/0/'); ?></label><strong><label><?php _e('"112233"' ); ?></label></strong><label><?php _e('/posts' ); ?></label></em>
		</p>
		
		<!-- Linkedin -->
		
		<p>
			<a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><label><?php _e( 'LinkedIn' ); ?></label></a><br/>
			<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="checkbox" <?php echo isset($linkedin) && $linkedin ? 'checked="checked"' : ''; ?> placeholder="Your ID">
			<input size="30" id="<?php echo $this->get_field_id( 'linkedin_user' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_user' ); ?>" type="text" value="<?php echo esc_attr( $linkedin_user ); ?>"><br/>
			<em><label><?php _e( 'http://www.linkedin.com/profile/view?id=' ); ?></label><strong><label><?php _e( '"112233"' ); ?></label></strong></em><br/>
			<em><label><?php _e( 'http://www.linkedin.com/company/' ); ?></label><strong><label><?php _e( '"112233"' ); ?></label></strong></em>
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
		$instance['twitter_user'] = ( ! empty( $new_instance['twitter_user'] ) ) ? strip_tags( $new_instance['twitter_user'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['facebook_user'] = ( ! empty( $new_instance['facebook_user'] ) ) ? strip_tags( $new_instance['facebook_user'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['google_user'] = ( ! empty( $new_instance['google_user'] ) ) ? strip_tags( $new_instance['google_user'] ) : '';
		$instance['google'] = ( ! empty( $new_instance['google'] ) ) ? strip_tags( $new_instance['google'] ) : '';
		$instance['linkedin_user'] = ( ! empty( $new_instance['linkedin_user'] ) ) ? strip_tags( $new_instance['linkedin_user'] ) : '';
		$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';

		return $instance;
	}
}
