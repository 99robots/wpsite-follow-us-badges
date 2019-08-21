<div class="nnr-wrap">

	<?php require_once( 'header.php' ) ?>

	<div class="nnr-container">

		<h1 id="nnr-heading"><?php esc_html_e( 'Settings', 'wpsite-follow-us-badges' ) ?></h1>

		<div class="nnr-content">

			<form method="post">

				<div id="tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#wpsite_div_order" aria-controls="wpsite_div_order" role="tab" data-toggle="tab"><i class="fa fa-list-ol fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_twitter" aria-controls="wpsite_div_twitter" role="tab" data-toggle="tab"><i class="fa fa-twitter fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_facebook" aria-controls="wpsite_div_facebook" role="tab" data-toggle="tab"><i class="fa fa-facebook fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_linkedin" aria-controls="wpsite_div_linkedin" role="tab" data-toggle="tab"><i class="fa fa-linkedin fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_pinterest" aria-controls="wpsite_div_pinterest" role="tab" data-toggle="tab"><i class="fa fa-pinterest fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_youtube" aria-controls="wpsite_div_youtube" role="tab" data-toggle="tab"><i class="fa fa-youtube fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_tumblr" aria-controls="wpsite_div_tumblr" role="tab" data-toggle="tab"><i class="fa fa-tumblr fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_shortcode" aria-controls="wpsite_div_shortcode" role="tab" data-toggle="tab"><i class="fa fa-code fa-2x"></i></a></li>
					</ul>

					<div class="tab-content">

						<div role="tabpanel" class="tab-pane" id="wpsite_div_twitter">

							<h3 class="page-header"><?php esc_html_e( 'General', 'wpsite-follow-us-badges' ) ?></h3>

							<div>

								<!-- Active -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_twitter_active" class="col-sm-3 control-label"><?php esc_html_e( 'Active', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_twitter_active" name="<?php echo self::$prefix ?>settings_twitter_active" type="checkbox" <?php echo isset( $settings['twitter']['active'] ) && $settings['twitter']['active'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_twitter_active">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the social icon on your site.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- User -->

								<div class="form-group tw-hideable">
									<label for="<?php echo self::$prefix ?>settings_twitter_user" class="col-sm-3 control-label"><?php esc_html_e( 'Username', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_twitter_user" name="wpsite_follow_us_settings_twitter_user" type="text" value="<?php echo esc_attr( $settings['twitter']['user'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'https://twitter.com/', 'wpsite-follow-us-badges' ) ?><strong><label><?php esc_html_e( '"example"', 'wpsite-follow-us-badges' ) ?></label></strong></em>
									</div>
								</div>



							</div>

							<h3 class="page-header tw-hideable"><?php esc_html_e( 'Display', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="tw-hideable">

								<!-- Link Only -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_link" class="col-sm-3 control-label"><?php esc_html_e( 'Link Only', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_twitter_args_link" name="<?php echo self::$prefix ?>settings_twitter_args_link" type="checkbox" <?php echo isset( $settings['twitter']['args']['link'] ) && $settings['twitter']['args']['link'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_twitter_args_link">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the large button style that only the links to your social page..', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>


								<!-- Followers Count Display -->

								<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_followers_count_display" class="col-sm-3 control-label"><?php esc_html_e( 'Followers Count Display', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_twitter_args_followers_count_display" name="<?php echo self::$prefix ?>settings_twitter_args_followers_count_display" type="checkbox" <?php echo isset( $settings['twitter']['args']['followers_count_display'] ) && $settings['twitter']['args']['followers_count_display'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_twitter_args_followers_count_display">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show follower count.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Show Screen Name -->

								<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_show_screen_name" class="col-sm-3 control-label"><?php esc_html_e( 'Show Screen Name', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_twitter_args_show_screen_name" name="<?php echo self::$prefix ?>settings_twitter_args_show_screen_name" type="checkbox" <?php echo isset( $settings['twitter']['args']['show_screen_name'] ) && $settings['twitter']['args']['show_screen_name'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_twitter_args_show_screen_name">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show screen name.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Alignment -->

								<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_alignment" class="col-sm-3 control-label"><?php esc_html_e( 'Alignment', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_twitter_args_alignment" name="wpsite_follow_us_settings_twitter_args_alignment">
											<option value="left" <?php echo isset( $settings['twitter']['args']['alignment'] ) && 'left' === $settings['twitter']['args']['alignment'] ? 'selected' : '' ;?>><?php esc_html_e( 'left', 'wpsite-follow-us-badges' ) ?></option>
											<option value="right" <?php echo isset( $settings['twitter']['args']['alignment'] ) && 'right' === $settings['twitter']['args']['alignment'] ? 'selected' : '' ;?>><?php esc_html_e( 'right', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the alignment.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Width -->

								<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_width" class="col-sm-3 control-label"><?php esc_html_e( 'Width', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_twitter_args_width" name="wpsite_follow_us_settings_twitter_args_width" type="text" value="<?php echo esc_attr( $settings['twitter']['args']['width'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'Accepts px and % (e.g 100px or 100%)', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Size -->

								<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_size" class="col-sm-3 control-label"><?php esc_html_e( 'Size', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_twitter_args_size" name="wpsite_follow_us_settings_twitter_args_size">
											<option value="medium" <?php echo isset( $settings['twitter']['args']['size'] ) && 'medium' === $settings['twitter']['args']['size'] ? 'selected' : '' ;?>><?php esc_html_e( 'medium', 'wpsite-follow-us-badges' ) ?></option>
											<option value="large" <?php echo isset( $settings['twitter']['args']['size'] ) && 'large' === $settings['twitter']['args']['size'] ? 'selected' : '' ;?>><?php esc_html_e( 'large', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the size.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>


							</div>

							<h3 class="page-header tw-hideable"><?php esc_html_e( 'Advanced', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="tw-hideable">

								<!-- Language -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_twitter_args_size" class="col-sm-3 control-label"><?php esc_html_e( 'Language', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_twitter_args_language" name="wpsite_follow_us_settings_twitter_args_language">
											<?php foreach ( self::$twitter_supported_languages as $lang ) { ?>
											<option value="<?php echo $lang; ?>" <?php echo isset( $settings['twitter']['args']['language'] ) && $settings['twitter']['args']['language'] === $lang ? 'selected' : '' ;?>><?php echo $lang ?></option>
											<?php } ?>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the language.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<p><?php esc_html_e( 'Reference:', 'wpsite-follow-us-badges' ) ?> <a href="https://developer.twitter.com/en/docs/twitter-for-websites/follow-button/overview.html" target="_blank"><?php esc_html_e( 'Twitter Follow Button API Details', 'wpsite-follow-us-badges' ) ?></a></p>
						</div>

						<div role="tabpanel" class="tab-pane" id="wpsite_div_facebook">

							<h3 class="page-header"><?php esc_html_e( 'General', 'wpsite-follow-us-badges' ) ?></h3>

							<div>

								<!-- Active -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_facebook_active" class="col-sm-3 control-label"><?php esc_html_e( 'Active', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_facebook_active" name="<?php echo self::$prefix ?>settings_facebook_active" type="checkbox" <?php echo isset( $settings['facebook']['active'] ) && $settings['facebook']['active'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_facebook_active">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the social icon on your site.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- User -->

								<div class="form-group fb-hideable">
									<label for="<?php echo self::$prefix ?>settings_facebook_user" class="col-sm-3 control-label"><?php esc_html_e( 'User ID', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_facebook_user" name="wpsite_follow_us_settings_facebook_user" type="text" value="<?php echo esc_attr( $settings['facebook']['user'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'https://facebook.com/', 'wpsite-follow-us-badges' ) ?><strong><label><?php esc_html_e( '"example"', 'wpsite-follow-us-badges' ) ?></label></strong></em>
										<em class="help-block"><?php esc_html_e( 'https://facebook.com/', 'wpsite-follow-us-badges' ) ?><strong><label><?php esc_html_e( '"pages/example/112233"', 'wpsite-follow-us-badges' ) ?></label></strong></em>

									</div>
								</div>

								<!-- Type -->

								<div class="form-group fb-hideable">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_type" class="col-sm-3 control-label"><?php esc_html_e( 'Type', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_facebook_args_type" name="wpsite_follow_us_settings_facebook_args_type">
											<option value="like" <?php echo isset( $settings['facebook']['args']['type'] ) && 'like' === $settings['facebook']['args']['type'] ? 'selected' : '' ;?>><?php esc_html_e( 'Like', 'wpsite-follow-us-badges' ) ?></option>
											<option value="follow" <?php echo isset( $settings['facebook']['args']['type'] ) && 'follow' === $settings['facebook']['args']['type'] ? 'selected' : '' ;?>><?php esc_html_e( 'Follow', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the button type.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<h3 class="page-header fb-hideable"><?php esc_html_e( 'Display', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="fb-hideable">

								<!-- Link Only -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_link" class="col-sm-3 control-label"><?php esc_html_e( 'Link Only', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_facebook_args_link" name="<?php echo self::$prefix ?>settings_facebook_args_link" type="checkbox" <?php echo isset( $settings['facebook']['args']['link'] ) && $settings['facebook']['args']['link'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_facebook_args_link">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the large button style that only the links to your social page..', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Layout -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_layout" class="col-sm-3 control-label"><?php esc_html_e( 'Layout', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_facebook_args_layout" name="wpsite_follow_us_settings_facebook_args_layout">
											<option value="standard" <?php echo isset( $settings['facebook']['args']['layout'] ) && 'standard' === $settings['facebook']['args']['layout'] ? 'selected' : '' ;?>><?php esc_html_e( 'standard', 'wpsite-follow-us-badges' ) ?></option>
											<option value="box_count" <?php echo isset( $settings['facebook']['args']['layout'] ) && 'box_count' === $settings['facebook']['args']['layout'] ? 'selected' : '' ;?>><?php esc_html_e( 'box_count', 'wpsite-follow-us-badges' ) ?></option>
											<option value="button_count" <?php echo isset( $settings['facebook']['args']['layout'] ) && 'button_count' === $settings['facebook']['args']['layout'] ? 'selected' : '' ;?>><?php esc_html_e( 'button_count', 'wpsite-follow-us-badges' ) ?></option>
											<option value="button" <?php echo isset( $settings['facebook']['args']['layout'] ) && 'button' === $settings['facebook']['args']['layout'] ? 'selected' : '' ;?>><?php esc_html_e( 'button', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the layout type.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Action Type -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_action_type" class="col-sm-3 control-label"><?php esc_html_e( 'Action Type', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_facebook_args_action_type" name="wpsite_follow_us_settings_facebook_args_action_type">
											<option value="like" <?php echo isset( $settings['facebook']['args']['action_type'] ) && 'like' === $settings['facebook']['args']['action_type'] ? 'selected' : '' ;?>><?php esc_html_e( 'like', 'wpsite-follow-us-badges' ) ?></option>
											<option value="recommend" <?php echo isset( $settings['facebook']['args']['action_type'] ) && 'recommend' === $settings['facebook']['args']['action_type'] ? 'selected' : '' ;?>><?php esc_html_e( 'recommend', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the action type.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Color Scheme -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_colorscheme" class="col-sm-3 control-label"><?php esc_html_e( 'Color Scheme', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_facebook_args_colorscheme" name="wpsite_follow_us_settings_facebook_args_colorscheme">
											<option value="light" <?php echo isset( $settings['facebook']['args']['colorscheme'] ) && 'light' === $settings['facebook']['args']['colorscheme'] ? 'selected' : '' ;?>><?php esc_html_e( 'light', 'wpsite-follow-us-badges' ) ?></option>
											<option value="dark" <?php echo isset( $settings['facebook']['args']['colorscheme'] ) && 'dark' === $settings['facebook']['args']['colorscheme'] ? 'selected' : '' ;?>><?php esc_html_e( 'dark', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the color scheme.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Show Friends Faces -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_show_friends_faces" class="col-sm-3 control-label"><?php esc_html_e( 'Show Friends Faces', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_facebook_args_show_friends_faces" name="<?php echo self::$prefix ?>settings_facebook_args_show_friends_faces" type="checkbox" <?php echo isset( $settings['facebook']['args']['show_friends_faces'] ) && $settings['facebook']['args']['show_friends_faces'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_facebook_args_show_friends_faces">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show friends faces.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Include Share Button -->

								 <div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_include_share_button" class="col-sm-3 control-label"><?php esc_html_e( 'Include Share Button', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_facebook_args_include_share_button" name="<?php echo self::$prefix ?>settings_facebook_args_include_share_button" type="checkbox" <?php echo isset( $settings['facebook']['args']['include_share_button'] ) && $settings['facebook']['args']['include_share_button'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_facebook_args_include_share_button">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show a share button.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Width -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_width" class="col-sm-3 control-label"><?php esc_html_e( 'Width', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_facebook_args_width" name="wpsite_follow_us_settings_facebook_args_width" type="text" value="<?php echo esc_attr( $settings['facebook']['args']['width'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'Accepts px only', 'wpsite-follow-us-badges' ) ?></em>

									</div>
								</div>

							</div>

							<h3 class="page-header fb-hideable"><?php esc_html_e( 'Advanced', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="fb-hideable">
								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_facebook_args_language" class="col-sm-3 control-label"><?php esc_html_e( 'Language', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_facebook_args_language" name="wpsite_follow_us_settings_facebook_args_language">
											<?php foreach ( self::$facebook_supported_languages as $lang ) { ?>
											<option value="<?php echo $lang; ?>" <?php echo isset( $settings['facebook']['args']['language'] ) && $settings['facebook']['args']['language'] == $lang ? 'selected' : '' ;?>><?php echo $lang ?></option>
											<?php } ?>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the language.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>
							</div>

							<p><?php esc_html_e( 'Reference:', 'wpsite-follow-us-badges' ) ?> <a href="https://developers.facebook.com/docs/plugins/like-button/" target="_blank"><?php esc_html_e( 'Facebook Like Button API Details', 'wpsite-follow-us-badges' ) ?></a></p>
						</div>

						<div role="tabpanel" class="tab-pane" id="wpsite_div_linkedin">

							<h3 class="page-header"><?php esc_html_e( 'General', 'wpsite-follow-us-badges' ) ?></h3>

							<div>

								<!-- Active -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_linkedin_active" class="col-sm-3 control-label"><?php esc_html_e( 'Active', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_linkedin_active" name="<?php echo self::$prefix ?>settings_linkedin_active" type="checkbox" <?php echo isset( $settings['linkedin']['active'] ) && $settings['linkedin']['active'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_linkedin_active">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the social icon on your site.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- User -->

								<div class="form-group li-hideable">
									<label for="<?php echo self::$prefix ?>settings_linkedin_user" class="col-sm-3 control-label"><?php esc_html_e( 'User ID', 'wpsite-follow-us-badges' ) ?> <small><a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><label><?php esc_html_e( '(Get your ID)', 'wpsite-follow-us-badges' ) ?></label></a></small>
</label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_linkedin_user" name="wpsite_follow_us_settings_linkedin_user" type="text" value="<?php echo esc_attr( $settings['linkedin']['user'] ) ?>">
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_company"><span><?php esc_html_e( 'http://www.linkedin.com/company/', 'wpsite-follow-us-badges' ) ?></span><strong><label><?php esc_html_e( '"112233"', 'wpsite-follow-us-badges' ) ?></label></strong></em>
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_person"><span><?php esc_html_e( 'http://www.linkedin.com/profile/view?id=', 'wpsite-follow-us-badges' ) ?></span><strong><label><?php esc_html_e( '"112233"', 'wpsite-follow-us-badges' ) ?></label></strong></em>
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_group"><span><?php esc_html_e( 'https://www.linkedin.com/groups?gid=', 'wpsite-follow-us-badges' ) ?></span><strong><label><?php esc_html_e( '"154024"', 'wpsite-follow-us-badges' ) ?></label></strong></em>
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_university"><span><?php esc_html_e( 'https://www.linkedin.com/edu/school?id=', 'wpsite-follow-us-badges' ) ?></span><strong><label><?php esc_html_e( '"18483"', 'wpsite-follow-us-badges' ) ?></label></strong></em>

									</div>
								</div>

								<!-- User Type -->

								<div class="form-group li-hideable">
									<label for="<?php echo self::$prefix ?>settings_linkedin_args_type" class="col-sm-3 control-label"><?php esc_html_e( 'User Type', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_linkedin_args_type" name="wpsite_follow_us_settings_linkedin_args_type">
											<option value="company" <?php echo isset( $settings['linkedin']['args']['type'] ) && 'company' === $settings['linkedin']['args']['type'] ? 'selected' : ''; ?>><?php esc_html_e( 'company', 'wpsite-follow-us-badges' ) ?></option>
											<option value="person" <?php echo isset( $settings['linkedin']['args']['type'] ) && 'person' === $settings['linkedin']['args']['type'] ? 'selected' : ''; ?>><?php esc_html_e( 'person', 'wpsite-follow-us-badges' ) ?></option>
											<option value="group" <?php echo isset( $settings['linkedin']['args']['type'] ) && 'group' === $settings['linkedin']['args']['type'] ? 'selected' : ''; ?>><?php esc_html_e( 'group', 'wpsite-follow-us-badges' ) ?></option>
											<option value="university" <?php echo isset( $settings['linkedin']['args']['type'] ) && 'university' === $settings['linkedin']['args']['type'] ? 'selected' : ''; ?>><?php esc_html_e( 'university', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the account type.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<h3 class="page-header li-hideable"><?php esc_html_e( 'Display', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="li-hideable">

								<!-- Link Only -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_linkedin_args_link" class="col-sm-3 control-label"><?php esc_html_e( 'Link Only', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_linkedin_args_link" name="<?php echo self::$prefix ?>settings_linkedin_args_link" type="checkbox" <?php echo isset( $settings['linkedin']['args']['link'] ) && $settings['linkedin']['args']['link'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_linkedin_args_link">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the large button style that only the links to your social page..', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Count Mode -->

								<div class="form-group li-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_linkedin_args_count_mode" class="col-sm-3 control-label"><?php esc_html_e( 'Count Mode', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_linkedin_args_count_mode" name="wpsite_follow_us_settings_linkedin_args_count_mode">
											<option value="right" <?php echo isset( $settings['linkedin']['args']['count_mode'] ) && 'right' === $settings['linkedin']['args']['count_mode'] ? 'selected' : '' ;?>><?php esc_html_e( 'right', 'wpsite-follow-us-badges' ) ?></option>
											<option value="top" <?php echo isset( $settings['linkedin']['args']['count_mode'] ) && 'top' === $settings['linkedin']['args']['count_mode'] ? 'selected' : '' ;?>><?php esc_html_e( 'top', 'wpsite-follow-us-badges' ) ?></option>
											<option value="none" <?php echo isset( $settings['linkedin']['args']['count_mode'] ) && 'none' === $settings['linkedin']['args']['count_mode'] ? 'selected' : '' ;?>><?php esc_html_e( 'none', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the count mode.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<h3 class="page-header li-hideable"><?php esc_html_e( 'Advanced', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="li-hideable">

								<!-- Language -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_linkedin_args_language" class="col-sm-3 control-label"><?php esc_html_e( 'Select Language', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_linkedin_args_language" name="wpsite_follow_us_settings_linkedin_args_language">
											<?php foreach ( self::$linkedin_supported_languages as $lang ) { ?>
											<option value="<?php echo $lang ?>" <?php echo isset( $settings['linkedin']['args']['language'] ) && $settings['linkedin']['args']['language'] === $lang ? 'selected' : '' ;?>><?php echo $lang ?></option>
											<?php } ?>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the language.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<p><?php esc_html_e( 'Reference:', 'wpsite-follow-us-badges' ) ?> <a href="https://docs.microsoft.com/en-us/linkedin/consumer/integrations/self-serve/plugins/follow-company-plugin" target="_blank"><?php esc_html_e( 'LinkedIn Button API Details', 'wpsite-follow-us-badges' ) ?></a></p>

							</div>

						</div>

						<div role="tabpanel" class="tab-pane" id="wpsite_div_pinterest">

							<h3 class="page-header"><?php esc_html_e( 'General', 'wpsite-follow-us-badges' ) ?></h3>

							<div>

								<!-- Active -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_pinterest_active" class="col-sm-3 control-label"><?php esc_html_e( 'Active', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_pinterest_active" name="<?php echo self::$prefix ?>settings_pinterest_active" type="checkbox" <?php echo isset( $settings['pinterest']['active'] ) && $settings['pinterest']['active'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_pinterest_active">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the social icon on your site.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- User URL -->

								<div class="form-group pt-hideable">
									<label for="<?php echo self::$prefix ?>settings_pinterest_user" class="col-sm-3 control-label"><?php esc_html_e( 'User URL', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_pinterest_user" name="wpsite_follow_us_settings_pinterest_user" type="text" value="<?php echo esc_attr( $settings['pinterest']['user'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'Set the user URL.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Name -->

								<div class="form-group pt-hideable">
									<label for="<?php echo self::$prefix ?>settings_pinterest_args_name" class="col-sm-3 control-label"><?php esc_html_e( 'Name', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_pinterest_args_name" name="wpsite_follow_us_settings_pinterest_args_name" type="text" value="<?php echo esc_attr( $settings['pinterest']['args']['name'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'Set the User Name.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Link Only -->

								<div class="form-group pt-hideable">
									<label for="<?php echo self::$prefix ?>settings_pinterest_args_link" class="col-sm-3 control-label"><?php esc_html_e( 'Link Only', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_pinterest_args_link" name="<?php echo self::$prefix ?>settings_pinterest_args_link" type="checkbox" <?php echo isset( $settings['pinterest']['args']['link'] ) && $settings['pinterest']['args']['link'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_pinterest_args_link">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the large button style that only the links to your social page..', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<p><?php esc_html_e( 'Reference:', 'wpsite-follow-us-badges' ) ?> <a href="http://business.pinterest.com/en/widget-builder#do_follow_me_button" target="_blank"><?php esc_html_e( 'Pinterest Button API Details', 'wpsite-follow-us-badges' ) ?></a></p>

							</div>

						</div>

						<div role="tabpanel" class="tab-pane" id="wpsite_div_youtube">

							<h3 class="page-header"><?php esc_html_e( 'General', 'wpsite-follow-us-badges' ) ?></h3>

							<div>

								<!-- Active -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_youtube_active" class="col-sm-3 control-label"><?php esc_html_e( 'Active', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_youtube_active" name="<?php echo self::$prefix ?>settings_youtube_active" type="checkbox" <?php echo isset( $settings['youtube']['active'] ) && $settings['youtube']['active'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_youtube_active">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the social icon on your site.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- User URL -->

								<div class="form-group yt-hideable">
									<label for="<?php echo self::$prefix ?>settings_youtube_user" class="col-sm-3 control-label"><?php esc_html_e( 'Channel ID', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_youtube_user" name="wpsite_follow_us_settings_youtube_user" type="text" value="<?php echo esc_attr( $settings['youtube']['user'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'Set the Channel ID', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<h3 class="page-header yt-hideable"><?php esc_html_e( 'Display', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="yt-hideable">

								<!-- Link Only -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_youtube_args_link" class="col-sm-3 control-label"><?php esc_html_e( 'Link Only', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_youtube_args_link" name="<?php echo self::$prefix ?>settings_youtube_args_link" type="checkbox" <?php echo isset( $settings['youtube']['args']['link'] ) && $settings['youtube']['args']['link'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_youtube_args_link">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the large button style that only the links to your social page..', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Layout -->

								<div class="form-group yt-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_youtube_args_layout" class="col-sm-3 control-label"><?php esc_html_e( 'Layout', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_youtube_args_layout" name="wpsite_follow_us_settings_youtube_args_layout">
											<option value="default" <?php echo isset( $settings['youtube']['args']['layout'] ) && 'default' === $settings['youtube']['args']['layout'] ? 'selected' : '' ;?>><?php esc_html_e( 'default', 'wpsite-follow-us-badges' ) ?></option>
											<option value="full" <?php echo isset( $settings['youtube']['args']['layout'] ) && 'full' === $settings['youtube']['args']['layout'] ? 'selected' : '' ;?>><?php esc_html_e( 'full', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the layout.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Theme -->

								<div class="form-group yt-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_youtube_args_theme" class="col-sm-3 control-label"><?php esc_html_e( 'Theme', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_youtube_args_theme" name="wpsite_follow_us_settings_youtube_args_theme">
											<option value="default" <?php echo isset( $settings['youtube']['args']['theme'] ) && 'default' === $settings['youtube']['args']['theme'] ? 'selected' : '' ;?>><?php esc_html_e( 'default', 'wpsite-follow-us-badges' ) ?></option>
											<option value="dark" <?php echo isset( $settings['youtube']['args']['theme'] ) && 'dark' === $settings['youtube']['args']['theme'] ? 'selected' : '' ;?>><?php esc_html_e( 'dark', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the theme.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Subscribers Count -->

								<div class="form-group yt-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_youtube_args_count" class="col-sm-3 control-label"><?php esc_html_e( 'Subscribers Count', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_youtube_args_count" name="<?php echo self::$prefix ?>settings_youtube_args_count" type="checkbox" <?php echo isset( $settings['youtube']['args']['count'] ) && $settings['youtube']['args']['count'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_youtube_args_count">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to display the subcribers count', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<p><?php esc_html_e( 'Reference:', 'wpsite-follow-us-badges' ) ?> <a href="https://developers.google.com/youtube/youtube_subscribe_button" target="_blank"><?php esc_html_e( 'YouTube Button API Details', 'wpsite-follow-us-badges' ) ?></a></p>

							</div>

						</div>

						<div role="tabpanel" class="tab-pane" id="wpsite_div_tumblr">

							<h3 class="page-header"><?php esc_html_e( 'General', 'wpsite-follow-us-badges' ) ?></h3>

							<div>

								<!-- Active -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_tumblr_active" class="col-sm-3 control-label"><?php esc_html_e( 'Active', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_tumblr_active" name="<?php echo self::$prefix ?>settings_tumblr_active" type="checkbox" <?php echo isset( $settings['tumblr']['active'] ) && $settings['tumblr']['active'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_tumblr_active">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the social icon on your site.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- User -->

								<div class="form-group tb-hideable">
									<label for="<?php echo self::$prefix ?>settings_tumblr_user" class="col-sm-3 control-label"><?php esc_html_e( 'User Name', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="wpsite_follow_us_settings_tumblr_user" name="wpsite_follow_us_settings_tumblr_user" type="text" value="<?php echo esc_attr( $settings['tumblr']['user'] ) ?>">
										<em class="help-block"><?php esc_html_e( 'http://', 'wpsite-follow-us-badges' ) ?><strong><label><?php esc_html_e( 'staff', 'wpsite-follow-us-badges' ) ?></label></strong><?php esc_html_e( '.tumblr.com', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<h3 class="page-header tb-hideable"><?php esc_html_e( 'Display', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="tb-hideable">

								<!-- Link Only -->

								<div class="form-group">
									<label for="<?php echo self::$prefix ?>settings_tumblr_args_link" class="col-sm-3 control-label"><?php esc_html_e( 'Link Only', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<input class="form-control" id="<?php echo self::$prefix ?>settings_tumblr_args_link" name="<?php echo self::$prefix ?>settings_tumblr_args_link" type="checkbox" <?php echo isset( $settings['tumblr']['args']['link'] ) && $settings['tumblr']['args']['link'] ? 'checked="checked"' : ''; ?>/>
										<label for="<?php echo self::$prefix ?>settings_tumblr_args_link">
											<span class="fa-stack fa-lg">
												<i class="fa fa-square-o fa-stack-1x"></i>
												<i class="fa fa-check fa-stack-1x"></i>
											</span>
										</label>
										<em class="help-block"><?php esc_html_e( 'Check this to show the large button style that only the links to your social page..', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Color -->

								<div class="form-group tb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_tumblr_args_color" class="col-sm-3 control-label"><?php esc_html_e( 'Color', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_tumblr_args_color" name="wpsite_follow_us_settings_tumblr_args_color">
											<option value="dark" <?php echo isset( $settings['tumblr']['args']['color'] ) && 'dark' === $settings['tumblr']['args']['color'] ? 'selected' : '' ;?>><?php esc_html_e( 'dark', 'wpsite-follow-us-badges' ) ?></option>
											<option value="light" <?php echo isset( $settings['tumblr']['args']['color'] ) && 'light' === $settings['tumblr']['args']['color'] ? 'selected' : '' ;?>><?php esc_html_e( 'light', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the color.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

								<!-- Button -->

								<div class="form-group tb-hideable-link-only">
									<label for="<?php echo self::$prefix ?>settings_tumblr_args_button" class="col-sm-3 control-label"><?php esc_html_e( 'Button', 'wpsite-follow-us-badges' ) ?></label>
									<div class="col-sm-9">
										<select id="wpsite_follow_us_settings_tumblr_args_button" name="wpsite_follow_us_settings_tumblr_args_button">
											<option value="1" <?php echo isset( $settings['tumblr']['args']['button'] ) && '1' === $settings['tumblr']['args']['button'] ? 'selected' : '' ?>><?php esc_html_e( 'Classic Tumblr Button', 'wpsite-follow-us-badges' ) ?></option>
											<option value="2" <?php echo isset( $settings['tumblr']['args']['button'] ) && '2' === $settings['tumblr']['args']['button'] ? 'selected' : '' ?>><?php esc_html_e( '"Follow on Tumblr"', 'wpsite-follow-us-badges' ) ?></option>
											<option value="3" <?php echo isset( $settings['tumblr']['args']['button'] ) && '3' === $settings['tumblr']['args']['button'] ? 'selected' : '' ?>><?php esc_html_e( 'Icon', 'wpsite-follow-us-badges' ) ?></option>
										</select>
										<em class="help-block"><?php esc_html_e( 'Select the button type.', 'wpsite-follow-us-badges' ) ?></em>
									</div>
								</div>

							</div>

							<p><?php esc_html_e( 'Reference:', 'wpsite-follow-us-badges' ) ?> <a href="https://www.tumblr.com/buttons" target="_blank"><?php esc_html_e( 'Tumblr Button API Details', 'wpsite-follow-us-badges' ) ?></a></p>

						</div>

						<div role="tabpanel" class="tab-pane active" id="wpsite_div_order">

							<h3 class="page-header"><?php esc_html_e( 'Drag & Drop to Order', 'wpsite-follow-us-badges' ) ?></h3>

							<table>
								<tbody>

									<!-- Sortables -->

									<ul id="sortable">

										<?php

										if ( ! isset( $settings['order'] ) ) {
											$settings['order'] = self::$default['order'];
										}

										foreach ( $settings['order'] as $order ) { ?>
											<li id="<?php echo $order; ?>" name="<?php echo $order; ?>" class="wpsite_follow_us_sort_item dragable"><i class="fa fa-2x fa-<?php echo $order ?>"></i></li>
										<?php } ?>

									</ul>

								</tbody>
							</table>
						</div>

						<div role="tabpanel" class="tab-pane" id="wpsite_div_shortcode" class="metabox-holder">

							<h3 class="page-header"><?php esc_html_e( 'Examples', 'wpsite-follow-us-badges' ) ?></h3>

							<div class="inside">

								<ol>
									<li><code><?php esc_html_e( '[wpsite_follow_us_badges twitter="99Robots"]', 'wpsite-follow-us-badges' ) ?></code></li>
									<li><code><?php esc_html_e( '&lt;?php do_shortcode(\'[wpsite_follow_us_badges twitter="99Robots"]\'); ?&gt;', 'wpsite-follow-us-badges' ) ?></code></li>
									<li><code><?php esc_html_e( '[wpsite_follow_us_badges title="Follow Us" twitter="99Robots" facebook="99robots" order="facebook,twitter" twitter_followers_count_display=false twitter_link=true]', 'wpsite-follow-us-badges' ) ?></code></li>
								</ol>

								<p><?php esc_html_e( 'Go to', 'wpsite-follow-us-badges' ) ?> <a href="https://github.com/kjbenk/wpsite-follow-us-badges#shortcode-parameters" target="_blank">Github</a> <?php esc_html_e( 'page for full parameter list.', 'wpsite-follow-us-badges' ) ?></p>
							</div>
						</div>

					</div>

				</div>

				<?php wp_nonce_field( 'wpsite_follow_us_admin_settings' ) ?>

				<p class="submit"><button type="submit" name="submit" id="submit" class="btn btn-info" value="Save Settings"><i class="fa fa-download"></i> Save</button></p>

				<small style="color:#aaa;"><?php esc_html_e( '* These settings will apply to the ', 'wpsite-follow-us-badges' ) ?><a href="widgets.php"><?php esc_html_e( 'widget', 'wpsite-follow-us-badges' ) ?></a><?php esc_html_e( '.', 'wpsite-follow-us-badges' ) ?></small>

			</form>

		</div>

		<?php require_once( 'sidebar.php' ) ?>

	</div>

	<?php require_once( 'footer.php' ) ?>

</div>
