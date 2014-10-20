<?php require_once('header.php'); ?>

	<div id="wpsite_plugin_content">

		<span class="pluginmessage"><?php _e('The settings below will apply to the ', self::$text_domain); ?><a href="widgets.php"><?php _e('widget', self::$text_domain); ?></a><?php _e('.', self::$text_domain); ?></span>

		<div id="wpsite_plugin_settings">

			<form method="post">

				<div id="tabs">
					<ul>
						<li><a href="#wpsite_div_twitter"><span class="wpsite_admin_panel_content_tabs"><?php _e('Twitter', self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_facebook"><span class="wpsite_admin_panel_content_tabs"><?php _e('Facebook',self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_google"><span class="wpsite_admin_panel_content_tabs"><?php _e('Google+',self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_linkedin"><span class="wpsite_admin_panel_content_tabs"><?php _e('LinkedIn',self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_pinterest"><span class="wpsite_admin_panel_content_tabs"><?php _e('Pinterest',self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_youtube"><span class="wpsite_admin_panel_content_tabs"><?php _e('YouTube',self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_tumblr"><span class="wpsite_admin_panel_content_tabs"><?php _e('Tumblr',self::$text_domain); ?></span></a></li>
						<li><a href="#wpsite_div_order"><span class="wpsite_admin_panel_content_tabs"><?php _e('Order',self::$text_domain); ?></span></a></li>
					</ul>

					<div id="wpsite_div_twitter">

							<h3><?php _e('General', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Active -->

									<tr>
										<th>
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_twitter_active" name="wpsite_follow_us_settings_twitter_active" type="checkbox" <?php echo isset($settings['twitter']['active']) && $settings['twitter']['active'] ? 'checked="checked"' : ''; ?> placeholder="your_username">
											</td>
										</th>
									</tr>

									<!-- User -->

									<tr>
										<th>
											<label><?php _e('Username', self::$text_domain); ?></label>
											<td>
												<input class="widefat" id="wpsite_follow_us_settings_twitter_user" name="wpsite_follow_us_settings_twitter_user" type="text" value="<?php echo esc_attr($settings['twitter']['user']); ?>"><br/>
												<em><label><?php _e('https://twitter.com/', self::$text_domain); ?></label><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>

								</tbody>
							</table>

							<h3><?php _e('Display', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Link Only -->

									<tr>
										<th>
											<label><?php _e('Link Only', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_twitter_args_link" name="wpsite_follow_us_settings_twitter_args_link" type="checkbox" <?php echo isset($settings['twitter']['args']['link']) && $settings['twitter']['args']['link'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Followers Count Display -->

									<tr>
										<th>
											<label><?php _e('Followers Count Display', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_twitter_args_followers_count_display" name="wpsite_follow_us_settings_twitter_args_followers_count_display" type="checkbox" <?php echo isset($settings['twitter']['args']['followers_count_display']) && $settings['twitter']['args']['followers_count_display'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Show Screen Name -->

									<tr>
										<th>
											<label><?php _e('Show Screen Name', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_twitter_args_show_screen_name" name="wpsite_follow_us_settings_twitter_args_show_screen_name" type="checkbox" <?php echo isset($settings['twitter']['args']['show_screen_name']) && $settings['twitter']['args']['show_screen_name'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Alignment -->

									<tr>
										<th>
											<label><?php _e('Alignment', self::$text_domain); ?></label>
											<td>
												<select id="wpsite_follow_us_settings_twitter_args_alignment" name="wpsite_follow_us_settings_twitter_args_alignment">
													<option value="left" <?php echo isset($settings['twitter']['args']['alignment']) && $settings['twitter']['args']['alignment'] == 'left' ? 'selected' : '' ;?>><?php _e('left', self::$text_domain); ?></option>
													<option value="right" <?php echo isset($settings['twitter']['args']['alignment']) && $settings['twitter']['args']['alignment'] == 'right' ? 'selected' : '' ;?>><?php _e('right', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>

									<!-- Width -->

									<tr>
										<th>
											<label><?php _e('Width', self::$text_domain); ?></label>
											<td>
												<input class="widefat" id="wpsite_follow_us_settings_twitter_args_width" name="wpsite_follow_us_settings_twitter_args_width" type="text" value="<?php echo esc_attr($settings['twitter']['args']['width']); ?>"><br/>
												<em><label><?php _e('Accepts px and % (e.g 100px or 100%)', self::$text_domain); ?></label></em>
											</td>
										</th>
									</tr>

									<!-- Size -->

									<tr>
										<th>
											<label><?php _e('Size', self::$text_domain); ?></label>
											<td>
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

							<table class="form-table">
								<tbody>

									<!-- Language -->

									<tr>
										<th>
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td>
												<select id="wpsite_follow_us_settings_twitter_args_language" name="wpsite_follow_us_settings_twitter_args_language">
													<?php foreach (self::$twitter_supported_languages as $lang) { ?>
													<option value="<?php echo $lang; ?>" <?php echo isset($settings['twitter']['args']['language']) && $settings['twitter']['args']['language'] == $lang ? 'selected' : '' ;?>><?php _e($lang, self::$text_domain); ?></option>
													<?php } ?>
												</select>
											</td>
										</th>
									</tr>

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

								</tbody>
							</table>

							<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://dev.twitter.com/docs/follow-button" target="_blank"><?php _e('Twitter Follow Button API Details', self::$text_domain); ?></a></p>
						</div>

					<div id="wpsite_div_facebook">

							<h3><?php _e('General', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Active -->

									<tr>
										<th>
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_facebook_active" name="wpsite_follow_us_settings_facebook_active" type="checkbox" <?php echo isset($settings['facebook']['active']) && $settings['facebook']['active'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- User -->

									<tr>
										<th>
											<?php _e('User ID', self::$text_domain); ?>
											<td>
												<input class="widefat" id="wpsite_follow_us_settings_facebook_user" name="wpsite_follow_us_settings_facebook_user" type="text" value="<?php echo esc_attr($settings['facebook']['user']); ?>" ><br/>
												<em><label><?php _e('https://www.facebook.com/', self::$text_domain); ?></label><strong><label><?php _e('"example"', self::$text_domain); ?></label></strong></em><br/>
												<em><label><?php _e('https://www.facebook.com/', self::$text_domain); ?></label><strong><label><?php _e('"pages/example/112233"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>

									<!-- Type -->

									<tr>
										<th>
											<?php _e('Type', self::$text_domain); ?>
											<td>
												<select id="wpsite_follow_us_settings_facebook_args_type" name="wpsite_follow_us_settings_facebook_args_type">
													<option value="like" <?php echo isset($settings['facebook']['args']['type']) && $settings['facebook']['args']['type'] == 'like' ? 'selected' : '' ;?>><?php _e('Like', self::$text_domain); ?></option>
													<option value="follow" <?php echo isset($settings['facebook']['args']['type']) && $settings['facebook']['args']['type'] == 'follow' ? 'selected' : '' ;?>><?php _e('Follow', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>

								</tbody>
							</table>

							<h3><?php _e('Display', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Link Only -->

									<tr>
										<th>
											<label><?php _e('Link Only', self::$text_domain); ?></label>
											<td class="wpsite_follow_us_admin_table_td">
												<input id="wpsite_follow_us_settings_facebook_args_link" name="wpsite_follow_us_settings_facebook_args_link" type="checkbox" <?php echo isset($settings['facebook']['args']['link']) && $settings['facebook']['args']['link'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Layout -->

									<tr>
										<th>
											<label><?php _e('Layout', self::$text_domain); ?></label>
											<td>
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
										<th>
											<label><?php _e('Action Type', self::$text_domain); ?></label>
											<td>
												<select id="wpsite_follow_us_settings_facebook_args_action_type" name="wpsite_follow_us_settings_facebook_args_action_type">
													<option value="like" <?php echo isset($settings['facebook']['args']['action_type']) && $settings['facebook']['args']['action_type'] == 'like' ? 'selected' : '' ;?>><?php _e('like', self::$text_domain); ?></option>
													<option value="recommend" <?php echo isset($settings['facebook']['args']['action_type']) && $settings['facebook']['args']['action_type'] == 'recommend' ? 'selected' : '' ;?>><?php _e('recommend', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>

									<!-- Color Scheme -->

									<tr>
										<th>
											<label><?php _e('Color Scheme', self::$text_domain); ?></label>
											<td>
												<select id="wpsite_follow_us_settings_facebook_args_colorscheme" name="wpsite_follow_us_settings_facebook_args_colorscheme">
													<option value="light" <?php echo isset($settings['facebook']['args']['colorscheme']) && $settings['facebook']['args']['colorscheme'] == 'light' ? 'selected' : '' ;?>><?php _e('light', self::$text_domain); ?></option>
													<option value="dark" <?php echo isset($settings['facebook']['args']['colorscheme']) && $settings['facebook']['args']['colorscheme'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
												</select>
											</td>
										</th>
									</tr>

									<!-- Show Friends Faces -->

									<tr>
										<th>
											<label><?php _e('Show Friends Faces', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_facebook_args_show_friends_faces" name="wpsite_follow_us_settings_facebook_args_show_friends_faces" type="checkbox" <?php echo isset($settings['facebook']['args']['show_friends_faces']) && $settings['facebook']['args']['show_friends_faces'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Include Share Button -->

									<tr>
										<th>
											<label><?php _e('Include Share Button', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_facebook_args_include_share_button" name="wpsite_follow_us_settings_facebook_args_include_share_button" type="checkbox" <?php echo isset($settings['facebook']['args']['include_share_button']) && $settings['facebook']['args']['include_share_button'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Width -->

									<tr>
										<th>
											<label><?php _e('Width', self::$text_domain); ?></label>
											<td>
												<input class="widefat" size="30" id="wpsite_follow_us_settings_facebook_args_width" name="wpsite_follow_us_settings_facebook_args_width" type="text" value="<?php echo esc_attr($settings['facebook']['args']['width']); ?>"><br/>
												<em><label><?php _e('Accepts px only', self::$text_domain); ?></label></em>
											</td>
										</th>
									</tr>

								</tbody>
							</table>

							<h3><?php _e('Advanced', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Language -->

									<tr>
										<th>
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td>
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

							<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developers.facebook.com/docs/plugins/like-button/" target="_blank"><?php _e('Facebook Like Button API Details', self::$text_domain); ?></a></p>
						</div>

					<div id="wpsite_div_google">

							<h3><?php _e('General', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Active -->

									<tr>
										<th>
											<label><?php _e('Active', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_google_active" name="wpsite_follow_us_settings_google_active" type="checkbox" <?php echo isset($settings['google']['active']) && $settings['google']['active'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- User -->

									<tr>
										<th>
											<label><?php _e('User ID', self::$text_domain); ?></label>
											<td>
												<input class="widefat" id="wpsite_follow_us_settings_google_user" name="wpsite_follow_us_settings_google_user" type="text" value="<?php echo esc_attr($settings['google']['user']); ?>"><br/>
												<em><label><?php _e('https://plus.google.com/u/0/', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong><label><?php _e('/posts', self::$text_domain); ?></label></em><br/>
												<em><label><?php _e('https://plus.google.com/', self::$text_domain); ?></label><strong><label><?php _e('"+112233"', self::$text_domain); ?></label></strong></em>
											</td>
										</th>
									</tr>

								</tbody>
							</table>

							<h3><?php _e('Display', self::$text_domain); ?></h3>

							<table class="form-table">
								<tbody>

									<!-- Link Only -->

									<tr>
										<th>
											<label><?php _e('Link Only', self::$text_domain); ?></label>
											<td>
												<input id="wpsite_follow_us_settings_google_args_link" name="wpsite_follow_us_settings_google_args_link" type="checkbox" <?php echo isset($settings['google']['args']['link']) && $settings['google']['args']['link'] ? 'checked="checked"' : ''; ?>>
											</td>
										</th>
									</tr>

									<!-- Size -->

									<tr>
										<th>
											<label><?php _e('Size', self::$text_domain); ?></label>
											<td>
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
										<th>
											<label><?php _e('Annotation', self::$text_domain); ?></label>
											<td>
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

							<table class="form-table">
								<tbody>

									<!-- Language -->

									<tr>
										<th>
											<label><?php _e('Language', self::$text_domain); ?></label>
											<td>
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

							<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developers.google.com/+/web/follow/" target="_blank"><?php _e('Google+ Button API Details', self::$text_domain); ?></a></p>
						</div>

					<div id="wpsite_div_linkedin">

						<h3><?php _e('General', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Active -->

								<tr>
									<th>
										<label><?php _e('Active', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_linkedin_active" name="wpsite_follow_us_settings_linkedin_active" type="checkbox" <?php echo isset($settings['linkedin']['active']) && $settings['linkedin']['active'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

								<!-- User -->

								<tr>
									<th>
										<label><?php _e('User ID', self::$text_domain); ?></label><br/>
										<a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><label><?php _e('Get your ID', self::$text_domain); ?></label></a>
										<td>
											<input class="widefat" id="wpsite_follow_us_settings_linkedin_user" name="wpsite_follow_us_settings_linkedin_user" type="text" value="<?php echo esc_attr($settings['linkedin']['user']); ?>"><br/>
											<em class="wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_company"><label><?php _e('http://www.linkedin.com/company/', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em>
											<em class="wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_person"><label><?php _e('http://www.linkedin.com/profile/view?id=', self::$text_domain); ?></label><strong><label><?php _e('"112233"', self::$text_domain); ?></label></strong></em>
											<em class="wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_group"><label><?php _e('https://www.linkedin.com/groups?gid=', self::$text_domain); ?></label><strong><label><?php _e('"154024"', self::$text_domain); ?></label></strong></em>
											<em class="wpsite_follow_us_settings_linkedin_args_user_type wpsite_follow_us_settings_linkedin_args_user_type_university"><label><?php _e('https://www.linkedin.com/edu/school?id=', self::$text_domain); ?></label><strong><label><?php _e('"18483"', self::$text_domain); ?></label></strong></em>
										</td>
									</th>
								</tr>

							</tbody>
						</table>

						<h3><?php _e('Display', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Link Only -->

								<tr>
									<th>
										<label><?php _e('Link Only', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_linkedin_args_link" name="wpsite_follow_us_settings_linkedin_args_link" type="checkbox" <?php echo isset($settings['linkedin']['args']['link']) && $settings['linkedin']['args']['link'] ? 'checked="checked"' : ''; ?>> <?php _e('for a', self::$text_domain); ?> <select id="wpsite_follow_us_settings_linkedin_args_type" name="wpsite_follow_us_settings_linkedin_args_type">
												<option value="company" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'company' ? 'selected' : ''; ?>><?php _e('company', self::$text_domain); ?></option>
												<option value="person" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'person' ? 'selected' : ''; ?>><?php _e('person', self::$text_domain); ?></option>
												<option value="group" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'group' ? 'selected' : ''; ?>><?php _e('group', self::$text_domain); ?></option>
												<option value="university" <?php echo isset($settings['linkedin']['args']['type']) && $settings['linkedin']['args']['type'] == 'university' ? 'selected' : ''; ?>><?php _e('university', self::$text_domain); ?></option>
											</select> <?php _e('account', self::$text_domain); ?>
										</td>
									</th>
								</tr>

								<!-- Count Mode -->

								<tr>
									<th>
										<label><?php _e('Count Mode', self::$text_domain); ?></label>
										<td>
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

						<table class="form-table">
							<tbody>

								<!-- Language -->

								<tr>
									<th>
										<label><?php _e('Language', self::$text_domain); ?></label>
										<td>
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

						<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developer.linkedin.com/plugins/follow-company" target="_blank"><?php _e('LinkedIn Button API Details', self::$text_domain); ?></a></p>
					</div>

					<div id="wpsite_div_pinterest">

						<h3><?php _e('General', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Active -->

								<tr>
									<th>
										<label><?php _e('Active', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_pinterest_active" name="wpsite_follow_us_settings_pinterest_active" type="checkbox" <?php echo isset($settings['pinterest']['active']) && $settings['pinterest']['active'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

								<!-- User URL -->

								<tr>
									<th>
										<label><?php _e('User URL', self::$text_domain); ?></label><br/>
										<td>
											<input class="widefat" id="wpsite_follow_us_settings_pinterest_user" name="wpsite_follow_us_settings_pinterest_user" type="url" value="<?php echo esc_url($settings['pinterest']['user']); ?>">
										</td>
									</th>
								</tr>

								<!-- Name -->

								<tr>
									<th>
										<label><?php _e('Name', self::$text_domain); ?></label><br/>
										<td>
											<input class="widefat" id="wpsite_follow_us_settings_pinterest_args_name" name="wpsite_follow_us_settings_pinterest_args_name" type="text" value="<?php echo esc_attr($settings['pinterest']['args']['name']); ?>">
										</td>
									</th>
								</tr>

								<!-- Link Only -->

								<tr>
									<th>
										<label><?php _e('Link Only', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_pinterest_args_link" name="wpsite_follow_us_settings_pinterest_args_link" type="checkbox" <?php echo isset($settings['pinterest']['args']['link']) && $settings['pinterest']['args']['link'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

							</tbody>
						</table>

						<p><?php _e('Reference:', self::$text_domain); ?> <a href="http://business.pinterest.com/en/widget-builder#do_follow_me_button" target="_blank"><?php _e('Pinterest Button API Details', self::$text_domain); ?></a></p>
					</div>

					<div id="wpsite_div_youtube">

						<h3><?php _e('General', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Active -->

								<tr>
									<th>
										<label><?php _e('Active', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_youtube_active" name="wpsite_follow_us_settings_youtube_active" type="checkbox" <?php echo isset($settings['youtube']['active']) && $settings['youtube']['active'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

								<!-- Channel ID -->

								<tr>
									<th>
										<label><?php _e('Channel ID', self::$text_domain); ?></label><br/>
										<td>
											<input class="widefat" id="wpsite_follow_us_settings_youtube_user" name="wpsite_follow_us_settings_youtube_user" type="text" value="<?php echo esc_attr($settings['youtube']['user']); ?>"><br/>
											<em><?php _e('Find your ID', self::$text_domain); ?></em> <a target="_blank" href="https://www.youtube.com/account_advanced"><?php _e('here', self::$text_domain); ?></a>
										</td>
									</th>
								</tr>

							</tbody>
						</table>

						<h3><?php _e('Display', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Link Only -->

								<tr>
									<th>
										<label><?php _e('Link Only', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_youtube_args_link" name="wpsite_follow_us_settings_youtube_args_link" type="checkbox" <?php echo isset($settings['youtube']['args']['link']) && $settings['youtube']['args']['link'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

								<!-- Layout -->

								<tr>
									<th>
										<label><?php _e('Layout', self::$text_domain); ?></label>
										<td>
											<select id="wpsite_follow_us_settings_youtube_args_layout" name="wpsite_follow_us_settings_youtube_args_layout">
												<option value="default" <?php echo isset($settings['youtube']['args']['layout']) && $settings['youtube']['args']['layout'] == 'default' ? 'selected' : '' ;?>><?php _e('default', self::$text_domain); ?></option>
												<option value="full" <?php echo isset($settings['youtube']['args']['layout']) && $settings['youtube']['args']['layout'] == 'full' ? 'selected' : '' ;?>><?php _e('full', self::$text_domain); ?></option>
											</select>
										</td>
									</th>
								</tr>

								<!-- Theme -->

								<tr>
									<th>
										<label><?php _e('Theme', self::$text_domain); ?></label>
										<td>
											<select id="wpsite_follow_us_settings_youtube_args_theme" name="wpsite_follow_us_settings_youtube_args_theme">
												<option value="default" <?php echo isset($settings['youtube']['args']['theme']) && $settings['youtube']['args']['theme'] == 'default' ? 'selected' : '' ;?>><?php _e('default', self::$text_domain); ?></option>
												<option value="dark" <?php echo isset($settings['youtube']['args']['theme']) && $settings['youtube']['args']['theme'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
											</select>
										</td>
									</th>
								</tr>

								<!-- Subscribers Count -->

								<tr>
									<th>
										<label><?php _e('Subscribers Count', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_youtube_args_count" name="wpsite_follow_us_settings_youtube_args_count" type="checkbox" <?php echo isset($settings['youtube']['args']['count']) && $settings['youtube']['args']['count'] ? 'checked="checked"' : ''; ?>><br/>
											<em><?php _e('Display the subcribers count.', self::$text_domain); ?></em>
										</td>
									</th>
								</tr>

							</tbody>
						</table>

						<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://developers.google.com/youtube/youtube_subscribe_button" target="_blank"><?php _e('YouTube Button API Details', self::$text_domain); ?></a></p>
					</div>

					<div id="wpsite_div_tumblr">

						<h3><?php _e('General', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Active -->

								<tr>
									<th>
										<label><?php _e('Active', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_tumblr_active" name="wpsite_follow_us_settings_tumblr_active" type="checkbox" <?php echo isset($settings['tumblr']['active']) && $settings['tumblr']['active'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

								<!-- User Name -->

								<tr>
									<th>
										<label><?php _e('User Name', self::$text_domain); ?></label><br/>
										<td>
											<input class="widefat" id="wpsite_follow_us_settings_tumblr_user" name="wpsite_follow_us_settings_tumblr_user" type="text" value="<?php echo esc_attr($settings['tumblr']['user']); ?>"><br/>
											<em><?php _e('http://', self::$text_domain); ?></em><strong><?php _e('staff', self::$text_domain); ?></strong><em><?php _e('.tumblr.com', self::$text_domain); ?></em>
										</td>
									</th>
								</tr>

							</tbody>
						</table>

						<h3><?php _e('Display', self::$text_domain); ?></h3>

						<table class="form-table">
							<tbody>

								<!-- Link Only -->

								<tr>
									<th>
										<label><?php _e('Link Only', self::$text_domain); ?></label>
										<td>
											<input id="wpsite_follow_us_settings_tumblr_args_link" name="wpsite_follow_us_settings_tumblr_args_link" type="checkbox" <?php echo isset($settings['tumblr']['args']['link']) && $settings['tumblr']['args']['link'] ? 'checked="checked"' : ''; ?>>
										</td>
									</th>
								</tr>

								<!-- Color -->

								<tr>
									<th>
										<label><?php _e('Color', self::$text_domain); ?></label>
										<td>
											<select id="wpsite_follow_us_settings_tumblr_args_color" name="wpsite_follow_us_settings_tumblr_args_color">
												<option value="dark" <?php echo isset($settings['tumblr']['args']['color']) && $settings['tumblr']['args']['color'] == 'dark' ? 'selected' : '' ;?>><?php _e('dark', self::$text_domain); ?></option>
												<option value="light" <?php echo isset($settings['tumblr']['args']['color']) && $settings['tumblr']['args']['color'] == 'light' ? 'selected' : '' ;?>><?php _e('light', self::$text_domain); ?></option>
											</select>
										</td>
									</th>
								</tr>

								<!-- Button -->

								<tr>
									<th>
										<label><?php _e('Button', self::$text_domain); ?></label>
										<td>
											<select id="wpsite_follow_us_settings_tumblr_args_button" name="wpsite_follow_us_settings_tumblr_args_button">
												<option value="1" <?php echo isset($settings['tumblr']['args']['button']) && $settings['tumblr']['args']['button'] == '1' ? 'selected' : '' ;?>><?php _e('1', self::$text_domain); ?></option>
												<option value="2" <?php echo isset($settings['tumblr']['args']['button']) && $settings['tumblr']['args']['button'] == '2' ? 'selected' : '' ;?>><?php _e('2', self::$text_domain); ?></option>
												<option value="3" <?php echo isset($settings['tumblr']['args']['button']) && $settings['tumblr']['args']['button'] == '3' ? 'selected' : '' ;?>><?php _e('3', self::$text_domain); ?></option>
											</select>
										</td>
									</th>
								</tr>

							</tbody>
						</table>

						<p><?php _e('Reference:', self::$text_domain); ?> <a href="https://www.tumblr.com/buttons" target="_blank"><?php _e('Tumblr Button API Details', self::$text_domain); ?></a></p>

					</div>

					<div id="wpsite_div_order">
						<h3><?php _e('Drag & Drop to Order', self::$text_domain); ?></h3>
						<table>
							<tbody>

								<!-- Sortables -->

								<ul id="sortable">

									<?php

									if (!isset($settings['order'])) {
										$settings['order'] = self::$default['order'];
									}

									foreach ($settings['order'] as $order) { ?>
										<li id="<?php echo $order; ?>" name="<?php echo $order; ?>" class="wpsite_follow_us_sort_item dragable"><?php _e($order, self::$text_domain); ?></li>
									<?php } ?>

								</ul>

							</tbody>
						</table>
					</div>

				</div>

				<?php wp_nonce_field('wpsite_follow_us_admin_settings'); ?>

				<?php submit_button(); ?>

			</form>

		</div>  <!-- /wpsite_plugin_settings -->

	<?php require_once('sidebar.php'); ?>

	</div> <!-- /wpsite_plugin_content -->
<?php require_once('footer.php'); ?>