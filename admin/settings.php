<div class="nnr-wrap">

	<?php require_once('header.php'); ?>

	<div class="nnr-container">

    	<h1 id="nnr-heading"><?php _e('Settings', self::$text_domain); ?></h1>

		<div id="wpsite_plugin_settings" class="col-md-9">

			<form method="post">

				<div id="tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#wpsite_div_order" aria-controls="wpsite_div_order" role="tab" data-toggle="tab"><i class="fa fa-list-ol fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_twitter" aria-controls="wpsite_div_twitter" role="tab" data-toggle="tab"><i class="fa fa-twitter fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_facebook" aria-controls="wpsite_div_facebook" role="tab" data-toggle="tab"><i class="fa fa-facebook fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_google" aria-controls="wpsite_div_google" role="tab" data-toggle="tab"><i class="fa fa-google-plus fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_linkedin" aria-controls="wpsite_div_linkedin" role="tab" data-toggle="tab"><i class="fa fa-linkedin fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_pinterest" aria-controls="wpsite_div_pinterest" role="tab" data-toggle="tab"><i class="fa fa-pinterest fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_youtube" aria-controls="wpsite_div_youtube" role="tab" data-toggle="tab"><i class="fa fa-youtube fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_tumblr" aria-controls="wpsite_div_tumblr" role="tab" data-toggle="tab"><i class="fa fa-tumblr fa-2x"></i></a></li>
						<li role="presentation"><a href="#wpsite_div_shortcode" aria-controls="wpsite_div_shortcode" role="tab" data-toggle="tab"><i class="fa fa-code fa-2x"></i></a></li>
					</ul>

					<div class="tab-content">

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_twitter">

							<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

							<div>

                                <!-- Active -->

								<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_twitter_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_twitter_active" name="<?php echo self::$prefix; ?>settings_twitter_active" type="checkbox" <?php echo isset($settings['twitter']['active']) && $settings['twitter']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_twitter_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User -->

								<div class="form-group tw-hideable">
									<label for="<?php echo self::$prefix; ?>settings_twitter_user" class="col-sm-3 control-label"><?php _e('Username', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_twitter_user" name="wpsite_follow_us_settings_twitter_user" type="text" value="<?php echo esc_attr($settings['twitter']['user']); ?>">
    									<em class="help-block"><?php _e('https://twitter.com/', self::$text_domain); ?><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em>
									</div>
								</div>



							</div>

							<h3 class="page-header tw-hideable"><?php _e('Display', self::$text_domain); ?></h3>

							<div class="tw-hideable">

    							<!-- Link Only -->

    							<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_twitter_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_twitter_args_link" name="<?php echo self::$prefix; ?>settings_twitter_args_link" type="checkbox" <?php echo isset($settings['twitter']['args']['link']) && $settings['twitter']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_twitter_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>


                                <!-- Followers Count Display -->

                                <div class="form-group tw-hideable-link-only">
                            		<label for="<?php echo self::$prefix; ?>settings_twitter_args_followers_count_display" class="col-sm-3 control-label"><?php _e('Followers Count Display', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_twitter_args_followers_count_display" name="<?php echo self::$prefix; ?>settings_twitter_args_followers_count_display" type="checkbox" <?php echo isset($settings['twitter']['args']['followers_count_display']) && $settings['twitter']['args']['followers_count_display'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_twitter_args_followers_count_display">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show follower count.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Show Screen Name -->

                            	<div class="form-group tw-hideable-link-only">
                            		<label for="<?php echo self::$prefix; ?>settings_twitter_args_show_screen_name" class="col-sm-3 control-label"><?php _e('Show Screen Name', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_twitter_args_show_screen_name" name="<?php echo self::$prefix; ?>settings_twitter_args_show_screen_name" type="checkbox" <?php echo isset($settings['twitter']['args']['show_screen_name']) && $settings['twitter']['args']['show_screen_name'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_twitter_args_show_screen_name">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show screen name.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Alignment -->

								<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_twitter_args_alignment" class="col-sm-3 control-label"><?php _e('Alignment', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_twitter_args_alignment" name="wpsite_follow_us_settings_twitter_args_alignment">
											<option value="left" <?php echo isset($settings['twitter']['args']['alignment']) && $settings['twitter']['args']['alignment'] == 'left' ? 'selected' : '' ;?>><?php _e('left', self::$text_domain); ?></option>
											<option value="right" <?php echo isset($settings['twitter']['args']['alignment']) && $settings['twitter']['args']['alignment'] == 'right' ? 'selected' : '' ;?>><?php _e('right', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the alignment.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Width -->

								<div class="form-group tw-hideable-link-only">
                            		<label for="<?php echo self::$prefix; ?>settings_twitter_args_width" class="col-sm-3 control-label"><?php _e('Width', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="wpsite_follow_us_settings_twitter_args_width" name="wpsite_follow_us_settings_twitter_args_width" type="text" value="<?php echo esc_attr($settings['twitter']['args']['width']); ?>">
										<em class="help-block"><?php _e('Accepts px and % (e.g 100px or 100%)', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Size -->

                            	<div class="form-group tw-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_twitter_args_size" class="col-sm-3 control-label"><?php _e('Size', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_twitter_args_size" name="wpsite_follow_us_settings_twitter_args_size">
											<option value="medium" <?php echo isset($settings['twitter']['args']['size']) && $settings['twitter']['args']['size'] == 'medium' ? 'selected' : '' ;?>><?php _e('medium', self::$text_domain); ?></option>
											<option value="large" <?php echo isset($settings['twitter']['args']['size']) && $settings['twitter']['args']['size'] == 'large' ? 'selected' : '' ;?>><?php _e('large', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the size.', self::$text_domain); ?></em>
									</div>
								</div>


							</div>

							<h3 class="page-header tw-hideable"><?php _e('Advanced', self::$text_domain); ?></h3>

							<div class="tw-hideable">

								<!-- Language -->

								<div class="form-group">
									<label for="<?php echo self::$prefix; ?>settings_twitter_args_size" class="col-sm-3 control-label"><?php _e('Language', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_twitter_args_language" name="wpsite_follow_us_settings_twitter_args_language">
											<?php foreach (self::$twitter_supported_languages as $lang) { ?>
											<option value="<?php echo $lang; ?>" <?php echo isset($settings['twitter']['args']['language']) && $settings['twitter']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
											<?php } ?>
										</select>
    									<em class="help-block"><?php _e('Select the language.', self::$text_domain); ?></em>
									</div>
								</div>

									<!-- Opt Out -->

									<!--
<tr>
										<th>
											<label><?php _e('Opt Out', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_twitter_args_opt_out" name="wpsite_follow_us_settings_twitter_args_opt_out" type="checkbox" <?php echo isset($settings['twitter']['args']['opt_out']) && $settings['twitter']['args']['opt_out'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>
-->

							</div>

							<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://dev.twitter.com/docs/follow-button" target="_blank"><?php _e('Twitter Follow Button API Details', self::$text_domain); ?></a></p>
						</div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_facebook">

							<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

							<div>

							    <!-- Active -->

								<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_facebook_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_facebook_active" name="<?php echo self::$prefix; ?>settings_facebook_active" type="checkbox" <?php echo isset($settings['facebook']['active']) && $settings['facebook']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_facebook_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User -->

								<div class="form-group fb-hideable">
									<label for="<?php echo self::$prefix; ?>settings_facebook_user" class="col-sm-3 control-label"><?php _e('User ID', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_facebook_user" name="wpsite_follow_us_settings_facebook_user" type="text" value="<?php echo esc_attr($settings['facebook']['user']); ?>">
    									<em class="help-block"><?php _e('https://facebook.com/', self::$text_domain); ?><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em>
                                        <em class="help-block"><?php _e('https://facebook.com/', self::$text_domain); ?><strong><label><?php _e('"pages/example/112233"', self::$text_domain); ?></label></strong></em>

									</div>
								</div>

								<!-- Type -->

								<div class="form-group fb-hideable">
									<label for="<?php echo self::$prefix; ?>settings_facebook_args_type" class="col-sm-3 control-label"><?php _e('Type', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_facebook_args_type" name="wpsite_follow_us_settings_facebook_args_type">
											<option value="like" <?php echo isset($settings['facebook']['args']['type']) && $settings['facebook']['args']['type'] == 'like' ? 'selected' : '' ;?>><?php _e('Like', self::$text_domain); ?></option>
											<option value="follow" <?php echo isset($settings['facebook']['args']['type']) && $settings['facebook']['args']['type'] == 'follow' ? 'selected' : '' ;?>><?php _e('Follow', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the button type.', self::$text_domain); ?></em>
									</div>
								</div>

							</div>

							<h3 class="page-header fb-hideable"><?php _e('Display', self::$text_domain); ?></h3>

							<div class="fb-hideable">

                                <!-- Link Only -->

								<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_facebook_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_facebook_args_link" name="<?php echo self::$prefix; ?>settings_facebook_args_link" type="checkbox" <?php echo isset($settings['facebook']['args']['link']) && $settings['facebook']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_facebook_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Layout -->

                            	<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_facebook_args_layout" class="col-sm-3 control-label"><?php _e('Layout', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_facebook_args_layout" name="wpsite_follow_us_settings_facebook_args_layout">
											<option value="standard" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'standard' ? 'selected' : '' ;?>><?php _e('standard', self::$text_domain); ?></option>
											<option value="box_count" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'box_count' ? 'selected' : '' ;?>><?php _e('box_count', self::$text_domain); ?></option>
											<option value="button_count" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'button_count' ? 'selected' : '' ;?>><?php _e('button_count', self::$text_domain); ?></option>
											<option value="button" <?php echo isset($settings['facebook']['args']['layout']) && $settings['facebook']['args']['layout'] == 'button' ? 'selected' : '' ;?>><?php _e('button', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the layout type.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Action Type -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_facebook_args_action_type" class="col-sm-3 control-label"><?php _e('Action Type', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_facebook_args_action_type" name="wpsite_follow_us_settings_facebook_args_action_type">
											<option value="like" <?php echo isset($settings['facebook']['args']['action_type']) && $settings['facebook']['args']['action_type'] == 'like' ? 'selected' : '' ;?>><?php _e('like', self::$text_domain); ?></option>
											<option value="recommend" <?php echo isset($settings['facebook']['args']['action_type']) && $settings['facebook']['args']['action_type'] == 'recommend' ? 'selected' : '' ;?>><?php _e('recommend', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the action type.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Color Scheme -->

								<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_facebook_args_colorscheme" class="col-sm-3 control-label"><?php _e('Color Scheme', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_facebook_args_colorscheme" name="wpsite_follow_us_settings_facebook_args_colorscheme">
											<option value="light" <?php echo isset($settings['facebook']['args']['colorscheme']) && $settings['facebook']['args']['colorscheme'] == 'light' ? 'selected' : '' ;?>><?php _e('light', self::$text_domain); ?></option>
											<option value="dark" <?php echo isset($settings['facebook']['args']['colorscheme']) && $settings['facebook']['args']['colorscheme'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the color scheme.', self::$text_domain); ?></em>
									</div>
								</div>

                                <!-- Show Friends Faces -->

                                <div class="form-group fb-hideable-link-only">
                            		<label for="<?php echo self::$prefix; ?>settings_facebook_args_show_friends_faces" class="col-sm-3 control-label"><?php _e('Show Friends Faces', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_facebook_args_show_friends_faces" name="<?php echo self::$prefix; ?>settings_facebook_args_show_friends_faces" type="checkbox" <?php echo isset($settings['facebook']['args']['show_friends_faces']) && $settings['facebook']['args']['show_friends_faces'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_facebook_args_show_friends_faces">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show friends faces.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Include Share Button -->

                            	 <div class="form-group fb-hideable-link-only">
                            		<label for="<?php echo self::$prefix; ?>settings_facebook_args_include_share_button" class="col-sm-3 control-label"><?php _e('Include Share Button', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_facebook_args_include_share_button" name="<?php echo self::$prefix; ?>settings_facebook_args_include_share_button" type="checkbox" <?php echo isset($settings['facebook']['args']['include_share_button']) && $settings['facebook']['args']['include_share_button'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_facebook_args_include_share_button">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show a share button.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Width -->

                            	<div class="form-group fb-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_facebook_args_width" class="col-sm-3 control-label"><?php _e('Width', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_facebook_args_width" name="wpsite_follow_us_settings_facebook_args_width" type="text" value="<?php echo esc_attr($settings['facebook']['args']['width']); ?>">
    									<em class="help-block"><?php _e('Accepts px only', self::$text_domain); ?></em>

									</div>
								</div>

							</div>

							<h3 class="page-header fb-hideable"><?php _e('Advanced', self::$text_domain); ?></h3>

							<div class="fb-hideable">
    							<div class="form-group">
									<label for="<?php echo self::$prefix; ?>settings_facebook_args_language" class="col-sm-3 control-label"><?php _e('Language', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_facebook_args_language" name="wpsite_follow_us_settings_facebook_args_language">
											<?php foreach (self::$facebook_supported_languages as $lang) { ?>
											<option value="<?php echo $lang; ?>" <?php echo isset($settings['facebook']['args']['language']) && $settings['facebook']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
											<?php } ?>
										</select>
    									<em class="help-block"><?php _e('Select the language.', self::$text_domain); ?></em>
									</div>
								</div>
							</div>

							<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developers.facebook.com/docs/plugins/like-button/" target="_blank"><?php _e('Facebook Like Button API Details', self::$text_domain); ?></a></p>
						</div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_google">

    						<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

    						<div>

        						<!-- Active -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_google_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_google_active" name="<?php echo self::$prefix; ?>settings_google_active" type="checkbox" <?php echo isset($settings['google']['active']) && $settings['google']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_google_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User -->

								<div class="form-group g-hideable">
									<label for="<?php echo self::$prefix; ?>settings_google_user" class="col-sm-3 control-label"><?php _e('User ID', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_google_user" name="wpsite_follow_us_settings_google_user" type="text" value="<?php echo esc_attr($settings['google']['user']); ?>">
    									<em class="help-block"><?php _e('https://plus.google.com/u/0/', self::$text_domain); ?><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong><?php _e('/posts', self::$text_domain); ?></em>
                                        <em class="help-block"><?php _e('https://plus.google.com/', self::$text_domain); ?><strong><label><?php _e('"+112233"', self::$text_domain); ?></label></strong></em>

									</div>
								</div>

    						</div>

    						<h3 class="page-header g-hideable"><?php _e('Display', self::$text_domain); ?></h3>

    						<div class="g-hideable">

        						<!-- Link Only -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_google_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_google_args_link" name="<?php echo self::$prefix; ?>settings_google_args_link" type="checkbox" <?php echo isset($settings['google']['args']['link']) && $settings['google']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_google_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Size -->

                            	<div class="form-group g-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_google_args_size" class="col-sm-3 control-label"><?php _e('Size', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_google_args_size" name="wpsite_follow_us_settings_google_args_size">
											<option value="15" <?php echo isset($settings['google']['args']['size']) && $settings['google']['args']['size'] == '15' ? 'selected' : '' ;?>><?php _e('small', self::$text_domain); ?></option>
											<option value="20" <?php echo isset($settings['google']['args']['size']) && $settings['google']['args']['size'] == '20' ? 'selected' : '' ;?>><?php _e('medium', self::$text_domain); ?></option>
											<option value="24" <?php echo isset($settings['google']['args']['size']) && $settings['google']['args']['size'] == '24' ? 'selected' : '' ;?>><?php _e('large', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the size.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Annotation -->

								<div class="form-group g-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_google_args_annotation" class="col-sm-3 control-label"><?php _e('Annotation', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_google_args_annotation" name="wpsite_follow_us_settings_google_args_annotation">
											<option value="bubble" <?php echo isset($settings['google']['args']['annotation']) && $settings['google']['args']['annotation'] == 'bubble' ? 'selected' : '' ;?>><?php _e('Bubble Horizontal', self::$text_domain); ?></option>
											<option value="vertical-bubble" <?php echo isset($settings['google']['args']['annotation']) && $settings['google']['args']['annotation'] == 'vertical-bubble' ? 'selected' : '' ;?>><?php _e('Bubble Vertical', self::$text_domain); ?></option>
											<option value="none" <?php echo isset($settings['google']['args']['annotation']) && $settings['google']['args']['annotation'] == 'none' ? 'selected' : '' ;?>><?php _e('none', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the annotation style.', self::$text_domain); ?></em>
									</div>
								</div>

    						</div>

                            <h3 class="page-header g-hideable"><?php _e('Advanced', self::$text_domain); ?></h3>

                            <div class="g-hideable">

                                <!-- Language -->

								<div class="form-group">
									<label for="<?php echo self::$prefix; ?>settings_google_args_language" class="col-sm-3 control-label"><?php _e('Language', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_google_args_language" name="wpsite_follow_us_settings_google_args_language">
											<?php foreach (self::$google_supported_languages as $lang) { ?>
											<option value="<?php echo $lang; ?>" <?php echo isset($settings['google']['args']['language']) && $settings['google']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
											<?php } ?>
										</select>
    									<em class="help-block"><?php _e('Select the language.', self::$text_domain); ?></em>
									</div>
								</div>

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
                                <p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developers.google.com/+/web/follow/" target="_blank"><?php _e('Google+ Button API Details', self::$text_domain); ?></a></p>

    						</div>

                        </div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_linkedin">

    						<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

    						<div>

        						<!-- Active -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_linkedin_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_linkedin_active" name="<?php echo self::$prefix; ?>settings_linkedin_active" type="checkbox" <?php echo isset($settings['linkedin']['active']) && $settings['linkedin']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_linkedin_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User -->

								<div class="form-group li-hideable">
									<label for="<?php echo self::$prefix; ?>settings_linkedin_user" class="col-sm-3 control-label"><?php _e('User ID', self::$text_domain); ?> <small><a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><label><?php _e('(Get your ID)', self::$text_domain); ?></label></a></small>
</label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_linkedin_user" name="wpsite_follow_us_settings_linkedin_user" type="text" value="<?php echo esc_attr($settings['linkedin']['user']); ?>">
    									<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_company"><span><?php _e('http://www.linkedin.com/company/', self::$text_domain); ?></span><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em>
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_person"><span><?php _e('http://www.linkedin.com/profile/view?id=', self::$text_domain); ?></span><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em>
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_group"><span><?php _e('https://www.linkedin.com/groups?gid=', self::$text_domain); ?></span><strong><label><?php _e('"154024"', self::$text_domain); ?></label></strong></em>
										<em class="help-block wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_university"><span><?php _e('https://www.linkedin.com/edu/school?id=', self::$text_domain); ?></span><strong><label><?php _e('"18483"', self::$text_domain); ?></label></strong></em>

									</div>
								</div>

								<!-- User Type -->

								<div class="form-group li-hideable">
									<label for="<?php echo self::$prefix; ?>settings_linkedin_args_type" class="col-sm-3 control-label"><?php _e('User Type', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_linkedin_args_type" name="wpsite_follow_us_settings_linkedin_args_type">
											<option value="company" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'company' ? 'selected' : ''; ?>><?php _e('company', self::$text_domain); ?></option>
											<option value="person" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'person' ? 'selected' : ''; ?>><?php _e('person', self::$text_domain); ?></option>
											<option value="group" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'group' ? 'selected' : ''; ?>><?php _e('group', self::$text_domain); ?></option>
											<option value="university" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'university' ? 'selected' : ''; ?>><?php _e('university', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the account type.', self::$text_domain); ?></em>
									</div>
								</div>

    						</div>

    						<h3 class="page-header li-hideable"><?php _e('Display', self::$text_domain); ?></h3>

    						<div class="li-hideable">

        						<!-- Link Only -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_linkedin_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_linkedin_args_link" name="<?php echo self::$prefix; ?>settings_linkedin_args_link" type="checkbox" <?php echo isset($settings['linkedin']['args']['link']) && $settings['linkedin']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_linkedin_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Count Mode -->

                            	<div class="form-group li-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_linkedin_args_count_mode" class="col-sm-3 control-label"><?php _e('Count Mode', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_linkedin_args_count_mode" name="wpsite_follow_us_settings_linkedin_args_count_mode">
											<option value="right" <?php echo isset($settings['linkedin']['args']['count_mode']) && $settings['linkedin']['args']['count_mode'] == 'right' ? 'selected' : '' ;?>><?php _e('right', self::$text_domain); ?></option>
											<option value="top" <?php echo isset($settings['linkedin']['args']['count_mode']) && $settings['linkedin']['args']['count_mode'] == 'top' ? 'selected' : '' ;?>><?php _e('top', self::$text_domain); ?></option>
											<option value="none" <?php echo isset($settings['linkedin']['args']['count_mode']) && $settings['linkedin']['args']['count_mode'] == 'none' ? 'selected' : '' ;?>><?php _e('none', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the count mode.', self::$text_domain); ?></em>
									</div>
								</div>

    						</div>

    						<h3 class="page-header li-hideable"><?php _e('Advanced', self::$text_domain); ?></h3>

    						<div class="li-hideable">

        						<!-- Language -->

        						<div class="form-group">
									<label for="<?php echo self::$prefix; ?>settings_linkedin_args_language" class="col-sm-3 control-label"><?php _e('Select Language', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_linkedin_args_language" name="wpsite_follow_us_settings_linkedin_args_language">
											<?php foreach (self::$linkedin_supported_languages as $lang) { ?>
											<option value="<?php echo $lang; ?>" <?php echo isset($settings['linkedin']['args']['language']) && $settings['linkedin']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
											<?php } ?>
										</select>
    									<em class="help-block"><?php _e('Select the language.', self::$text_domain); ?></em>
									</div>
								</div>

								<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><?php _e('LinkedIn Button API Details', self::$text_domain); ?></a></p>

    						</div>

    					</div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_pinterest">

    						<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

    						<div>

        						<!-- Active -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_pinterest_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_pinterest_active" name="<?php echo self::$prefix; ?>settings_pinterest_active" type="checkbox" <?php echo isset($settings['pinterest']['active']) && $settings['pinterest']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_pinterest_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User URL -->

								<div class="form-group pt-hideable">
									<label for="<?php echo self::$prefix; ?>settings_pinterest_user" class="col-sm-3 control-label"><?php _e('User URL', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_pinterest_user" name="wpsite_follow_us_settings_pinterest_user" type="text" value="<?php echo esc_attr($settings['pinterest']['user']); ?>">
                                        <em class="help-block"><?php _e('Set the user URL.', self::$text_domain); ?></em>
									</div>
								</div>

                                <!-- Name -->

                                <div class="form-group pt-hideable">
									<label for="<?php echo self::$prefix; ?>settings_pinterest_args_name" class="col-sm-3 control-label"><?php _e('Name', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_pinterest_args_name" name="wpsite_follow_us_settings_pinterest_args_name" type="text" value="<?php echo esc_attr($settings['pinterest']['args']['name']); ?>">
                                        <em class="help-block"><?php _e('Set the User Name.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Link Only -->

								<div class="form-group pt-hideable">
                            		<label for="<?php echo self::$prefix; ?>settings_pinterest_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_pinterest_args_link" name="<?php echo self::$prefix; ?>settings_pinterest_args_link" type="checkbox" <?php echo isset($settings['pinterest']['args']['link']) && $settings['pinterest']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_pinterest_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                                <p><?php _e('Reference:', self::$text_domain); ?> <a href="http://business.pinterest.com/en/widget-builder#do_follow_me_button" target="_blank"><?php _e('Pinterest Button API Details', self::$text_domain); ?></a></p>

    						</div>

    					</div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_youtube">

    						<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

    						<div>

        						<!-- Active -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_youtube_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_youtube_active" name="<?php echo self::$prefix; ?>settings_youtube_active" type="checkbox" <?php echo isset($settings['youtube']['active']) && $settings['youtube']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_youtube_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User URL -->

								<div class="form-group yt-hideable">
									<label for="<?php echo self::$prefix; ?>settings_youtube_user" class="col-sm-3 control-label"><?php _e('Channel ID', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_youtube_user" name="wpsite_follow_us_settings_youtube_user" type="text" value="<?php echo esc_attr($settings['youtube']['user']); ?>">
                                        <em class="help-block"><?php _e('Set the Channel ID', self::$text_domain); ?></em>
									</div>
								</div>

    						</div>

    						<h3 class="page-header yt-hideable"><?php _e('Display', self::$text_domain); ?></h3>

    						<div class="yt-hideable">

        						<!-- Link Only -->

								<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_youtube_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_youtube_args_link" name="<?php echo self::$prefix; ?>settings_youtube_args_link" type="checkbox" <?php echo isset($settings['youtube']['args']['link']) && $settings['youtube']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_youtube_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Layout -->

        						<div class="form-group yt-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_youtube_args_layout" class="col-sm-3 control-label"><?php _e('Layout', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_youtube_args_layout" name="wpsite_follow_us_settings_youtube_args_layout">
											<option value="default" <?php echo isset($settings['youtube']['args']['layout']) && $settings['youtube']['args']['layout'] == 'default' ? 'selected' : '' ;?>><?php _e('default', self::$text_domain); ?></option>
											<option value="full" <?php echo isset($settings['youtube']['args']['layout']) && $settings['youtube']['args']['layout'] == 'full' ? 'selected' : '' ;?>><?php _e('full', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the layout.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Theme -->

								<div class="form-group yt-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_youtube_args_theme" class="col-sm-3 control-label"><?php _e('Theme', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_youtube_args_theme" name="wpsite_follow_us_settings_youtube_args_theme">
											<option value="default" <?php echo isset($settings['youtube']['args']['theme']) && $settings['youtube']['args']['theme'] == 'default' ? 'selected' : '' ;?>><?php _e('default', self::$text_domain); ?></option>
											<option value="dark" <?php echo isset($settings['youtube']['args']['theme']) && $settings['youtube']['args']['theme'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the theme.', self::$text_domain); ?></em>
									</div>
								</div>

                                <!-- Subscribers Count -->

                                <div class="form-group yt-hideable-link-only">
                            		<label for="<?php echo self::$prefix; ?>settings_youtube_args_count" class="col-sm-3 control-label"><?php _e('Subscribers Count', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_youtube_args_count" name="<?php echo self::$prefix; ?>settings_youtube_args_count" type="checkbox" <?php echo isset($settings['youtube']['args']['count']) && $settings['youtube']['args']['count'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_youtube_args_count">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to display the subcribers count', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developers.google.com/youtube/youtube_subscribe_button" target="_blank"><?php _e('YouTube Button API Details', self::$text_domain); ?></a></p>

    						</div>

    					</div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_tumblr">

    						<h3 class="page-header"><?php _e('General', self::$text_domain); ?></h3>

    						<div>

        						<!-- Active -->

        						<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_tumblr_active" class="col-sm-3 control-label"><?php _e('Active', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_tumblr_active" name="<?php echo self::$prefix; ?>settings_tumblr_active" type="checkbox" <?php echo isset($settings['tumblr']['active']) && $settings['tumblr']['active'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_tumblr_active">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the social icon on your site.', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- User -->

								<div class="form-group tb-hideable">
									<label for="<?php echo self::$prefix; ?>settings_tumblr_user" class="col-sm-3 control-label"><?php _e('User Name', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<input class="form-control" id="wpsite_follow_us_settings_tumblr_user" name="wpsite_follow_us_settings_tumblr_user" type="text" value="<?php echo esc_attr($settings['tumblr']['user']); ?>">
                                        <em class="help-block"><?php _e('http://', self::$text_domain); ?><strong><label><?php _e('staff', self::$text_domain); ?></label></strong><?php _e('.tumblr.com', self::$text_domain); ?></em>
									</div>
								</div>

    						</div>

    						<h3 class="page-header tb-hideable"><?php _e('Display', self::$text_domain); ?></h3>

    						<div class="tb-hideable">

        						<!-- Link Only -->

								<div class="form-group">
                            		<label for="<?php echo self::$prefix; ?>settings_tumblr_args_link" class="col-sm-3 control-label"><?php _e('Link Only', self::$text_domain); ?></label>
                            		<div class="col-sm-9">
                            			<input class="form-control" id="<?php echo self::$prefix; ?>settings_tumblr_args_link" name="<?php echo self::$prefix; ?>settings_tumblr_args_link" type="checkbox" <?php echo isset($settings['tumblr']['args']['link']) && $settings['tumblr']['args']['link'] ? 'checked="checked"' : ''; ?>/>
                            			<label for="<?php echo self::$prefix; ?>settings_tumblr_args_link">
                        		        	<span class="fa-stack fa-lg">
                    		            		<i class="fa fa-square-o fa-stack-1x"></i>
                    		            		<i class="fa fa-check fa-stack-1x"></i>
                        		        	</span>
                        		    	</label>
                            			<em class="help-block"><?php _e('Check this to show the large button style that only the links to your social page..', self::$text_domain); ?></em>
                            		</div>
                            	</div>

                            	<!-- Color -->

								<div class="form-group tb-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_tumblr_args_color" class="col-sm-3 control-label"><?php _e('Color', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_tumblr_args_color" name="wpsite_follow_us_settings_tumblr_args_color">
											<option value="dark" <?php echo isset($settings['tumblr']['args']['color']) && $settings['tumblr']['args']['color'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
											<option value="light" <?php echo isset($settings['tumblr']['args']['color']) && $settings['tumblr']['args']['color'] == 'light' ? 'selected' : '' ;?>><?php _e('light', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the color.', self::$text_domain); ?></em>
									</div>
								</div>

								<!-- Button -->

								<div class="form-group tb-hideable-link-only">
									<label for="<?php echo self::$prefix; ?>settings_tumblr_args_button" class="col-sm-3 control-label"><?php _e('Button', self::$text_domain); ?></label>
									<div class="col-sm-9">
    									<select id="wpsite_follow_us_settings_tumblr_args_button" name="wpsite_follow_us_settings_tumblr_args_button">
											<option value="1" <?php echo isset($settings['tumblr']['args']['button']) && $settings['tumblr']['args']['button'] == '1' ? 'selected' : '' ;?>><?php _e('Classic Tumblr Button', self::$text_domain); ?></option>
											<option value="2" <?php echo isset($settings['tumblr']['args']['button']) && $settings['tumblr']['args']['button'] == '2' ? 'selected' : '' ;?>><?php _e('"Follow on Tumblr"', self::$text_domain); ?></option>
											<option value="3" <?php echo isset($settings['tumblr']['args']['button']) && $settings['tumblr']['args']['button'] == '3' ? 'selected' : '' ;?>><?php _e('Icon', self::$text_domain); ?></option>
										</select>
    									<em class="help-block"><?php _e('Select the button type.', self::$text_domain); ?></em>
									</div>
								</div>

    						</div>

    						<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://www.tumblr.com/buttons" target="_blank"><?php _e('Tumblr Button API Details', self::$text_domain); ?></a></p>

    					</div>

    					<div role="tabpanel" class="tab-pane active" id="wpsite_div_order">

    						<h3 class="page-header"><?php _e('Drag & Drop to Order', self::$text_domain); ?></h3>

    						<table>
    							<tbody>

    								<!-- Sortables -->

    								<ul id="sortable">

    									<?php

    									if (!isset($settings['order'])) {
    										$settings['order'] = self::$default['order'];
    									}

    									foreach ($settings['order'] as $order) { ?>
    										<li id="<?php echo $order; ?>" name="<?php echo $order; ?>" class="wpsite_follow_us_sort_item dragable"><i class="fa fa-2x fa-<?php _e($order, self::$text_domain); ?>"></i><!-- <span><?php _e($order, self::$text_domain); ?></span> --></li>
    									<?php } ?>

    								</ul>

    							</tbody>
    						</table>
    					</div>

    					<div role="tabpanel" class="tab-pane" id="wpsite_div_shortcode" class="metabox-holder">

							<h3 class="page-header"><?php _e('Examples', self::$text_domain); ?></h3>

							<div class="inside">

								<ol>
									<li><code><?php _e('[wpsite_follow_us_badges twitter="99Robots"]', self::$text_domain); ?></code></li>
									<li><code><?php _e('&lt;?php do_shortcode(\'[wpsite_follow_us_badges twitter="99Robots"]\'); ?&gt;', self::$text_domain); ?></code></li>
									<li><code><?php _e('[wpsite_follow_us_badges title="Follow Us" twitter="99Robots" facebook="99robots" order="facebook,twitter" twitter_followers_count_display=false twitter_link=true]', self::$text_domain); ?></code></li>
								</ol>

								<p><?php _e('Go to', self::$text_domain); ?> <a href="https://github.com/kjbenk/wpsite-follow-us-badges#shortcode-parameters" target="_blank">Github</a> <?php _e('page for full parameter list.', self::$text_domain); ?></p>
							</div>
    					</div>

					</div>

				</div>

				<?php wp_nonce_field('wpsite_follow_us_admin_settings'); ?>

				<p class="submit"><button type="submit" name="submit" id="submit" class="btn btn-info" value="Save Settings"><i class="fa fa-download"></i> Save</button></p>

                <small style="color:#aaa;"><?php _e('* These settings will apply to the ', self::$text_domain); ?><a href="widgets.php"><?php _e('widget', self::$text_domain); ?></a><?php _e('.', self::$text_domain); ?></small>

			</form>

		</div>  <!-- /wpsite_plugin_settings -->

	<?php require_once('sidebar.php'); ?>

	</div>

	<?php require_once('footer.php'); ?>

</div>