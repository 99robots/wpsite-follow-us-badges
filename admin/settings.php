<?php
$nnr_follow_us_badges_tab = "list";
$nnr_follow_us_badges_tab_active_class = [
    "list" => "",
    "twitter" => "",
    "facebook" => "",
    "youtube" => "",
    "linkedin" => "",
    "pinterest" => "",
    "tumblr" => "",
    "code" => "",
];
$tab_classes = [
    "list" => "nnr-hide",
    "twitter" => "nnr-hide",
    "facebook" => "nnr-hide",
    "youtube" => "nnr-hide",
    "linkedin" => "nnr-hide",
    "pinterest" => "nnr-hide",
    "tumblr" => "nnr-hide",
    "code" => "nnr-hide",
];
if (!empty($_GET["tab"])) {
    $nnr_follow_us_badges_tab = sanitize_text_field($_GET["tab"]);
    if (empty($nnr_follow_us_badges_tab)) {
        $nnr_follow_us_badges_tab = "list";
    }
    if (
        isset($nnr_follow_us_badges_tab_active_class[$nnr_follow_us_badges_tab])
    ) {
        $nnr_follow_us_badges_tab_active_class[$nnr_follow_us_badges_tab] =
            "active";
    } else {
        $nnr_follow_us_badges_tab_active_class["list"] = "active";
    }
    if (isset($tab_classes[$nnr_follow_us_badges_tab])) {
        $tab_classes[$nnr_follow_us_badges_tab] = "";
    } else {
        $tab_classes["list"] = "";
    }
}
?>
<div class="nnr-wrap">

    <?php require_once "header.php"; ?>
   
    <div class="nnr-container">

        <h1 id="nnr-heading"><?php esc_html_e(
            "Settings",
            "wpsite-follow-us-badges"
        ); ?></h1>

        <div class="nnr-content">

            <div class="nnr-follow-us-badges-tabs-header">
                <nav class="nnr-follow-us-badges-tabs" aria-label="Follow us menu">
                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=list"
                    ); ?>"
                       class="privacy-settings-tab <?php echo $nnr_follow_us_badges_tab_active_class[
                           "list"
                       ]; ?>">
                        <i class="fa fa-list-ol fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=twitter"
                    ); ?>"
                       class="privacy-settings-tab <?php echo $nnr_follow_us_badges_tab_active_class[
                           "twitter"
                       ]; ?>">
                        <i class="fa fa-twitter fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=facebook"
                    ); ?>"
                       class="privacy-settings-tab  <?php echo $nnr_follow_us_badges_tab_active_class[
                           "facebook"
                       ]; ?>">
                        <i class="fa fa-facebook fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=linkedin"
                    ); ?>"
                       class="privacy-settings-tab <?php echo $nnr_follow_us_badges_tab_active_class[
                           "linkedin"
                       ]; ?>">
                        <i class="fa fa-linkedin fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=pinterest"
                    ); ?>"
                       class="privacy-settings-tab  <?php echo $nnr_follow_us_badges_tab_active_class[
                           "pinterest"
                       ]; ?>">
                        <i class="fa fa-pinterest fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=youtube"
                    ); ?>"
                       class="privacy-settings-tab  <?php echo $nnr_follow_us_badges_tab_active_class[
                           "youtube"
                       ]; ?>">
                        <i class="fa fa-youtube fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=tumblr"
                    ); ?>"
                       class="privacy-settings-tab  <?php echo $nnr_follow_us_badges_tab_active_class[
                           "tumblr"
                       ]; ?>">
                        <i class="fa fa-tumblr fa-2x"></i>
                    </a>

                    <a href="<?php echo admin_url(
                        "options-general.php?page=" .
                            WPsiteFollowUs::$settings_page .
                            "&tab=code"
                    ); ?>"
                       class="privacy-settings-tab  <?php echo $nnr_follow_us_badges_tab_active_class[
                           "code"
                       ]; ?>">
                        <i class="fa fa-code fa-2x"></i>
                    </a>
                </nav>
            </div>

            <form method="post">

                <div id="tabs">
                    <div class="tab-content">
                        <div role="tabpanel" class="nnr-tab-pane tab-pane <?php echo $tab_classes[
                            "twitter"
                        ]; ?>" id="wpsite_div_twitter">
                            <h3 class="nnr-page-header"><?php esc_html_e(
                                "General",
                                "wpsite-follow-us-badges"
                            ); ?></h3>
                            <div>
                                <!-- Active -->
                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_active"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Active",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>settings_twitter_active"
                                               name="<?php echo self::$_prefix; ?>settings_twitter_active"
                                               type="checkbox" <?php echo !empty(
                                                   $settings["twitter"][
                                                       "active"
                                                   ]
                                               )
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <label for="<?php echo self::$_prefix; ?>settings_twitter_active">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o fa-stack-1x"></i>
                                                <i class="fa fa-check fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the social icon on your site.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- User -->

                                <div class="nnr-form-group nnr-row tw-hideable">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_user"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Username",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="wpsite_follow_us_settings_twitter_user"
                                               name="wpsite_follow_us_settings_twitter_user" type="text"
                                               value="<?php echo esc_attr(
                                                   $settings["twitter"]["user"]
                                               ); ?>">
                                        <em class="help-block"><?php esc_html_e(
                                            "https://twitter.com/",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                            <strong><label><?php esc_html_e(
                                                '"example"',
                                                "wpsite-follow-us-badges"
                                            ); ?></label></strong></em>
                                    </div>
                                </div>


                            </div>

                            <h3 class="nnr-page-header tw-hideable"><?php esc_html_e(
                                "Display",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="tw-hideable">

                                <!-- Link Only -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_link"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Link Only",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>settings_twitter_args_link"
                                               name="<?php echo self::$_prefix; ?>settings_twitter_args_link"
                                               type="checkbox" <?php echo !empty(
                                                   $settings["twitter"]["args"][
                                                       "link"
                                                   ]
                                               )
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <label for="<?php echo self::$_prefix; ?>settings_twitter_args_link">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o fa-stack-1x"></i>
                                                <i class="fa fa-check fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the large button style that only the links to your social page..",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>


                                <!-- Followers Count Display -->

                                <div class="nnr-form-group nnr-row tw-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_followers_count_display"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Followers Count Display",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>settings_twitter_args_followers_count_display"
                                               name="<?php echo self::$_prefix; ?>settings_twitter_args_followers_count_display"
                                               type="checkbox" <?php echo !empty(
                                                   $settings["twitter"]["args"][
                                                       "followers_count_display"
                                                   ]
                                               )
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <label for="<?php echo self::$_prefix; ?>settings_twitter_args_followers_count_display">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o fa-stack-1x"></i>
                                                <i class="fa fa-check fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show follower count.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Show Screen Name -->

                                <div class="nnr-form-group nnr-row tw-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_show_screen_name"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Show Screen Name",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>settings_twitter_args_show_screen_name"
                                               name="<?php echo self::$_prefix; ?>settings_twitter_args_show_screen_name"
                                               type="checkbox" <?php echo !empty(
                                                   $settings["twitter"]["args"][
                                                       "show_screen_name"
                                                   ]
                                               )
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <label for="<?php echo self::$_prefix; ?>settings_twitter_args_show_screen_name">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o fa-stack-1x"></i>
                                                <i class="fa fa-check fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show screen name.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Alignment -->

                                <div class="nnr-form-group nnr-row tw-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_alignment"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Alignment",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_twitter_args_alignment"
                                                name="wpsite_follow_us_settings_twitter_args_alignment">
                                            <option value="left" <?php echo !empty(
                                                $settings["twitter"]["args"][
                                                    "alignment"
                                                ]
                                            ) &&
                                            "left" ===
                                                $settings["twitter"]["args"][
                                                    "alignment"
                                                ]
                                                ? "selected"
                                                : ""; ?>><?php esc_html_e(
    "left",
    "wpsite-follow-us-badges"
); ?></option>
                                            <option value="right" <?php echo !empty(
                                                $settings["twitter"]["args"][
                                                    "alignment"
                                                ]
                                            ) &&
                                            "right" ===
                                                $settings["twitter"]["args"][
                                                    "alignment"
                                                ]
                                                ? "selected"
                                                : ""; ?>><?php esc_html_e(
    "right",
    "wpsite-follow-us-badges"
); ?></option>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the alignment.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Width -->

                                <div class="nnr-form-group nnr-row tw-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_width"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Width",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="wpsite_follow_us_settings_twitter_args_width"
                                               name="wpsite_follow_us_settings_twitter_args_width" type="text"
                                               value="<?php echo esc_attr(
                                                   $settings["twitter"]["args"][
                                                       "width"
                                                   ]
                                               ); ?>">
                                        <em class="help-block"><?php esc_html_e(
                                            "Accepts px and % (e.g 100px or 100%)",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Size -->

                                <div class="nnr-form-group nnr-row tw-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_size"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Size",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_twitter_args_size"
                                                name="wpsite_follow_us_settings_twitter_args_size">
                                            <option value="medium" <?php echo !empty(
                                                $settings["twitter"]["args"][
                                                    "size"
                                                ]
                                            ) &&
                                            "medium" ===
                                                $settings["twitter"]["args"][
                                                    "size"
                                                ]
                                                ? "selected"
                                                : ""; ?>><?php esc_html_e(
    "medium",
    "wpsite-follow-us-badges"
); ?></option>
                                            <option value="large" <?php echo !empty(
                                                $settings["twitter"]["args"][
                                                    "size"
                                                ]
                                            ) &&
                                            "large" ===
                                                $settings["twitter"]["args"][
                                                    "size"
                                                ]
                                                ? "selected"
                                                : ""; ?>><?php esc_html_e(
    "large",
    "wpsite-follow-us-badges"
); ?></option>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the size.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>


                            </div>

                            <h3 class="nnr-page-header tw-hideable"><?php esc_html_e(
                                "Advanced",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="tw-hideable">

                                <!-- Language -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>settings_twitter_args_size"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Language",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_twitter_args_language"
                                                name="wpsite_follow_us_settings_twitter_args_language">
                                            <?php foreach (
                                                self::$_twitter_supported_languages
                                                as $lang
                                            ) { ?>
                                                <option value="<?php echo esc_attr(
                                                    $lang
                                                ); ?>" <?php echo !empty(
    $settings["twitter"]["args"]["language"]
) && $settings["twitter"]["args"]["language"] === $lang
    ? "selected"
    : ""; ?>><?php esc_html_e($lang, "wpsite-follow-us-badges"); ?></option>
                                            <?php } ?>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the language.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                            </div>

                            <p><?php esc_html_e(
                                "Reference:",
                                "wpsite-follow-us-badges"
                            ); ?> <a
                                        href="https://developer.twitter.com/en/docs/twitter-for-websites/follow-button/overview.html"
                                        target="_blank"><?php esc_html_e(
                                            "Twitter Follow Button API Details",
                                            "wpsite-follow-us-badges"
                                        ); ?></a>
                            </p>
                        </div>

                        <div role="tabpanel" class="nnr-tab-pane tab-pane <?php echo $tab_classes[
                            "facebook"
                        ]; ?>" id="wpsite_div_facebook">

                            <h3 class="nnr-page-header"><?php esc_html_e(
                                "General",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div>

                                <!-- Active -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>settings_facebook_active"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Active",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>settings_facebook_active"
                                               name="<?php echo self::$_prefix; ?>settings_facebook_active"
                                               type="checkbox" <?php echo !empty(
                                                   $settings["facebook"][
                                                       "active"
                                                   ]
                                               )
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <label for="<?php echo self::$_prefix; ?>settings_facebook_active">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o fa-stack-1x"></i>
                                                <i class="fa fa-check fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the social icon on your site.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- User -->

                                <div class="nnr-form-group nnr-row fb-hideable">
                                    <label for="<?php echo self::$_prefix; ?>settings_facebook_user"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "User ID",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="wpsite_follow_us_settings_facebook_user"
                                               name="wpsite_follow_us_settings_facebook_user" type="text"
                                               value="<?php echo esc_attr(
                                                   $settings["facebook"]["user"]
                                               ); ?>">
                                        <em class="help-block"><?php esc_html_e(
                                            "https://facebook.com/",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                            <strong><label><?php esc_html_e(
                                                '"example"',
                                                "wpsite-follow-us-badges"
                                            ); ?></label></strong></em>
                                        <em class="help-block"><?php esc_html_e(
                                            "https://facebook.com/",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                            <strong><label><?php esc_html_e(
                                                '"pages/example/112233"',
                                                "wpsite-follow-us-badges"
                                            ); ?></label></strong></em>

                                    </div>
                                </div>

                                <!-- Type -->

                                <div class="nnr-form-group nnr-row fb-hideable">
                                    <label for="<?php echo self::$_prefix; ?>settings_facebook_args_type"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Type",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_facebook_args_type"
                                                name="wpsite_follow_us_settings_facebook_args_type">
                                            <option value="like" <?php echo !empty(
                                                $settings["facebook"]["args"][
                                                    "type"
                                                ]
                                            ) &&
                                            "like" ===
                                                $settings["facebook"]["args"][
                                                    "type"
                                                ]
                                                ? "selected"
                                                : ""; ?>><?php esc_html_e(
    "Like",
    "wpsite-follow-us-badges"
); ?></option>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the button type.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                            </div>

                            <h3 class="nnr-page-header fb-hideable"><?php esc_html_e(
                                "Display",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="fb-hideable">

                                <!-- Link Only -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>settings_facebook_args_link"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Link Only",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>settings_facebook_args_link"
                                               name="<?php echo self::$_prefix; ?>settings_facebook_args_link"
                                               type="checkbox" <?php echo !empty(
                                                   $settings["facebook"][
                                                       "args"
                                                   ]["link"]
                                               )
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <label for="<?php echo self::$_prefix; ?>settings_facebook_args_link">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o fa-stack-1x"></i>
                                                <i class="fa fa-check fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the large button style that only the links to your social page..",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Layout -->

                                <div class="nnr-form-group nnr-row fb-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_facebook_args_layout"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Layout",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    <?php
                                    $settingsFAL 
                                        = $settings["facebook"]["args"]["layout"];
                                    ?>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_facebook_args_layout" 
                                        name="wpsiteFollowUsSettingsFacebookArgsLayout">
                                            <option value="standard" <?php echo !empty($settingsFAL) 
                                            && $settingsFAL === "standard" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e("standard", "wpsite-follow-us-badges"); ?>
                                            </option>
                                            <option value="box_count" 
                                            <?php echo !empty($settingsFAL) 
                                            && $settingsFAL === "box_count" 
                                            ? "selected" : ""; ?>>
                                                <?php 
                                                    esc_html_e(
                                                        "box_count", 
                                                        "wpsite-follow-us-badges"
                                                    ); ?>
                                            </option>
                                            <option value="button_count" <?php echo !empty($settingsFAL) 
                                            && $settingsFAL === "button_count" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "button_count", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="button" 
                                            <?php echo !empty($settingsFAL) 
                                            && $settingsFAL === "button" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "button", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                        </select>

                                        <em class="help-block"><?php esc_html_e(
                                            "Select the layout type.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Action Type -->

                                <div class="nnr-form-group nnr-row fb-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>settings_facebook_args_action_type"
                                           class="col-sm-3 control-label"><?php esc_html_e(
                                               "Action Type",
                                               "wpsite-follow-us-badges"
                                           ); ?></label>
                                    
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_facebook_args_action_type" name="wpsiteFollowUsSettingsFacebookArgsActionType">
                                            <option value="like" 
                                            <?php echo !empty($settings["facebook"]["args"]["action_type"]) && $settings["facebook"]["args"]["action_type"] === "like" ? "selected" : ""; ?>>
                                                <?php esc_html_e("like", "wpsite-follow-us-badges"); ?>
                                            </option>
                                            <option value="recommend" <?php echo !empty($settings["facebook"]["args"]["action_type"]) && $settings["facebook"]["args"]["action_type"] === "recommend" ? "selected" : ""; ?>>
                                                <?php esc_html_e("recommend", "wpsite-follow-us-badges"); ?>
                                            </option>
                                        </select>

                                        <em class="help-block"><?php esc_html_e(
                                            "Select the action type.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Color Scheme -->

                                <div class="nnr-form-group nnr-row 
                                fb-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_facebook_args_colorscheme"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Color Scheme",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php
                                    $settingsFACS 
                                        = $settings["facebook"]["args"];
                                    $settingsFACSC
                                        = $settingsFACS["colorscheme"];
                                    ?>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings
                                        _facebook_args_colorscheme" 
                                        name="wpsiteFollowUsSettingsFacebook
                                        ArgsColorscheme">
                                            <option value="light" 
                                            <?php echo !empty($settingsFACSC) 
                                            && $settingsFACSC === "light" 
                                            ? "selected" : ""; ?>>
                                                <?php 
                                                esc_html_e(
                                                    "light", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="dark" 
                                            <?php echo !empty($settingsFACSC) 
                                            && $settingsFACSC === "dark" 
                                            ? "selected" : ""; ?>>
                                                <?php 
                                                esc_html_e(
                                                    "dark", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the color scheme.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Show Friends Faces -->

                                <div class="nnr-form-group nnr-row 
                                fb-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_facebook_args_show_friends_faces"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Show Friends Faces",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php
                                    $settingsFAFF 
                                        = $settings["facebook"]["args"];
                                    $settingsFAFFF 
                                        = $settingsFAFF["show_friends_faces"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_facebook_args_show_friends_
                                            faces"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_facebook_args_show_friends_
                                            faces"
                                            type="checkbox"
                                            <?php echo !empty($settingsFAFF) ? 
                                            'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        ssettings_facebook_args_show_friends_faces">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show friends faces.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Include Share Button -->

                                <div class="nnr-form-group nnr-row 
                                fb-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_facebook_args_include_share_button"
                                           class="col-sm-3 control-label">
                                           <?php 
                                            esc_html_e(
                                                "Include Share Button",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php
                                    $fb_settings 
                                        = $settings["facebook"];
                                    $includeSBtn 
                                        = $fb_settings["args"];
                                    $includeSB  
                                        = $includeSBtn["include_share_button"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_facebook_args_include_
                                            share_button"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_facebook_args_include_
                                            share_button"
                                            type="checkbox"
                                            <?php echo !empty($includeSB) 
                                            ? 'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_facebook_args_include_share_button">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show a share button.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Width -->

                                <div class="nnr-form-group nnr-row 
                                fb-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_facebook_args_width"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Width",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php 
                                    $settingsFAW
                                        = $settings["facebook"]["args"]["width"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control" 
                                        id="wpsite_follow_us_settings
                                        _facebook_args_width"
                                               name="wpsite_follow_us_settings
                                               _facebook_args_width" type="text"
                                               value="<?php 
                                                    echo esc_attr($settingsFAW); ?>">
                                        <em class="help-block"><?php esc_html_e(
                                            "Accepts px only",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>

                                    </div>
                                </div>

                            </div>

                            <h3 class="nnr-page-header fb-hideable"><?php esc_html_e(
                                "Advanced",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="fb-hideable">
                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_facebook_args_language"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Language",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                    </label>
                                    <?php
                                    $settingsFAL 
                                        = $settings["facebook"]["args"]["language"];
                                    $_varFSL 
                                        = self::$_facebook_supported_languages
                                    ?>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings
                                        _facebook_args_language" name="wpsiteFollow
                                        UsSettingsFacebookArgsLanguage">
                                            <?php foreach ($_varFSL as $lang) { ?>
                                            <option 
                                            value="<?php echo esc_attr($lang); ?>"
                                                    <?php echo !empty($settingsFAL) 
                                                    && $settingsFAL === $lang
                                                    ? "selected"
                                                    : ""; ?>>
                                                    <?php 
                                                    esc_html_e(
                                                        $lang, 
                                                        "wpsite-follow-us-badges"
                                                    ); ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <em class="help-block"><?php esc_html_e(
                                            "Select the language.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>
                            </div>

                            <p><?php esc_html_e(
                                "Reference:",
                                "wpsite-follow-us-badges"
                            ); ?> <a
                                        href="https://developers.facebook.com/
                                        docs/plugins/like-button/"
                                        target="_blank"><?php esc_html_e(
                                            "Facebook Like Button API Details",
                                            "wpsite-follow-us-badges"
                                        ); ?></a>
                            </p>
                        </div>

                        <div role="tabpanel" class="nnr-tab-pane tab-pane 
                        <?php 
                        echo $tab_classes[
                            "linkedin"
                        ]; ?>" id="wpsite_div_linkedin">

                            <h3 class="nnr-page-header"><?php esc_html_e(
                                "General",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div>

                                <!-- Active -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_linkedin_active"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Active",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php 
                                    $settingsLA
                                        = $settings["linkedin"]["active"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_linkedin_active"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_linkedin_active"
                                            type="checkbox"
                                            <?php 
                                            echo !empty($settingsLA) 
                                            ? 'checked="checked"' : ""; 
                                            ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_linkedin_active">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the social 
                                            icon on your site.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- User -->

                                <div class="nnr-form-group nnr-row li-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_linkedin_user"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "User ID",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        <small><a href="https://docs.microsoft.com
                                        /en-us/linkedin/consumer/integrations/
                                        self-serve/plugins/follow-company-plugin"
                                                  target="_blank"><label>
                                                    <?php esc_html_e(
                                                        "(Get your ID)",
                                                        "wpsite-follow-us-badges"
                                                    ); ?></label></a></small>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="wpsite_follow
                                        _us_settings_linkedin_user"
                                               name="wpsite_follow_us_settings
                                               _linkedin_user" type="text"
                                               value="<?php 
                                                esc_attr(
                                                    $settings["linkedin"]["user"]
                                                ); 
                                                ?>">
                                        <em class="help-block wpsite_follow_us_
                                        settings_linkedin_args_user_type wpsite_
                                        follow_us_settings_linkedin_args_user_
                                        type_company">
                                            <span>
                                            <?php 
                                            esc_html_e(
                                                "http://www.linkedin.com/company/", 
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                            </span>
                                            <strong>
                                            <label>
                                            <?php 
                                            esc_html_e(
                                                '"112233"', 
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                            </label>
                                            </strong>
                                        </em>
                                        <em class="help-block wpsite_follow_us_
                                        settings_linkedin_args_user_type wpsite_
                                        follow_us_settings_linkedin_args_
                                        user_type_person">
                                            <span>
                                            <?php 
                                            esc_html_e(
                                                "http://www.linkedin.com/
                                                profile/view?id=", 
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                            </span>
                                            <strong><label>
                                                <?php 
                                                esc_html_e(
                                                    '"112233"', 
                                                    "wpsite-follow-us-badges"
                                                ); ?></label></strong>
                                        </em>
                                        <em class="help-block wpsite_follow_us_
                                        settings_linkedin_args_user_type wpsite
                                        _follow_us_settings_linkedin_args_user_
                                        type_group">
                                            <span>
                                            <?php 
                                            esc_html_e(
                                                "https://www.linkedin.com/
                                            groups?gid=", 
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                            </span>
                                            <strong>
                                                <label>
                                                <?php 
                                                esc_html_e(
                                                    '"154024"', 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                                </label>
                                            </strong>
                                        </em>
                                        <em class="help-block wpsite_follow_us_
                                        settings_linkedin_args_user_type wpsite
                                        _follow_us_settings_linkedin_args_user
                                        _type_university">
                                            <span>
                                                <?php 
                                                esc_html_e(
                                                    "https://www.linkedin.com/
                                                    edu/school?id=", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </span>
                                            <strong>
                                                <label>
                                                <?php 
                                                esc_html_e(
                                                    '"18483"', 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                                </label>
                                            </strong>
                                        </em>

                                    </div>
                                </div>

                                <!-- User Type -->

                                <div class="nnr-form-group nnr-row li-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_linkedin_args_type"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "User Type",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php 
                                    $settingsLAT 
                                        = $settings["linkedin"]["args"]["type"];
                                    ?>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_
                                        linkedin_args_type" 
                                        name="wpsite_follow_us_settings_
                                        linkedin_args_type">
                                            <option value="company" 
                                            <?php echo !empty($settingsLAT) 
                                            && $settingsLAT === "company" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "company", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="person" 
                                            <?php echo !empty($settingsLAT)
                                            && $settingsLAT === "person" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "person", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="group" 
                                            <?php echo !empty($settingsLAT) 
                                            && $settingsLAT === "group" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "group", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="university" 
                                            <?php echo !empty($settingsLAT)
                                            && $settingsLAT === "university" 
                                            ? "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "university", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the account type.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                            </div>

                            <h3 class="nnr-page-header li-hideable"><?php esc_html_e(
                                "Display",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="li-hideable">

                                <!-- Link Only -->
                                <?php
                                $settingsLAL
                                    = $settings["linkedin"]["args"]["link"];
                                ?>
                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_linkedin_args_link"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Link Only",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_linkedin_args_link"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_linkedin_args_link"
                                            type="checkbox"
                                            <?php echo !empty($settingsLAL) ? 
                                            'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_linkedin_args_link">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the large button 
                                            style that only the links to your 
                                            social page..",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Count Mode -->

                                <div class="nnr-form-group nnr-row 
                                li-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_linkedin_args_count_mode"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Count Mode",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php 
                                    $settingsLACM 
                                        =$settings["linkedin"]["args"]["count_mode"];
                                    ?>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings
                                        _linkedin_args_count_mode" 
                                        name="wpsite_follow_us_settings_linkedin
                                        _args_count_mode">
                                            <option value="right" 
                                            <?php echo !empty($settingsLACM) && 
                                            $settingsLACM === "right" ? 
                                            "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "right", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="top" 
                                            <?php echo !empty($settingsLACM) && 
                                            $settingsLACM === "top" ? 
                                            "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "top", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="none" 
                                            <?php echo !empty($settingsLACM) && 
                                            $settingsLACM === "none" ? 
                                            "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "none", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                        </select>

                                        <em class="help-block"><?php esc_html_e(
                                            "Select the count mode.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                            </div>

                            <h3 class="nnr-page-header li-hideable"><?php esc_html_e(
                                "Advanced",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="li-hideable">

                                <!-- Language -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_linkedin_args_language"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Select Language",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php
                                    $settingsLAL 
                                        = $settings["linkedin"]["args"]["language"];
                                    $_lSL 
                                        = self::$_linkedin_supported_languages;
                                    ?>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_
                                        linkedin_args_language" 
                                        name="wpsite_follow_us_settings_linkedin_
                                        args_language">
                                    <?php foreach ($_lSL as $lang) { ?>
                                            <option value=
                                            "<?php echo esc_attr($lang); ?>"
                                            <?php echo !empty($settingsLAL) 
                                                && $settingsLAL === $lang
                                                ? "selected"
                                                : ""; ?>>
                                                <?php esc_html_e(
                                                    $lang, 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>

                                    <?php } ?>
                                        </select>
                                        <em class="help-block"><?php esc_html_e(
                                            "Select the language.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <p><?php esc_html_e(
                                    "Reference:",
                                    "wpsite-follow-us-badges"
                                ); ?> <a
                                        href="https://docs.microsoft.com/en-us/
                                        linkedin/consumer/integrations/self-serve/
                                        plugins/follow-company-plugin"
                                        target="_blank">
                                        <?php esc_html_e(
                                            "LinkedIn Button API Details",
                                            "wpsite-follow-us-badges"
                                        ); ?></a>
                                </p>

                            </div>

                        </div>

                        <div role="tabpanel" class="nnr-tab-pane tab-pane 
                        <?php echo $tab_classes[
                            "pinterest"
                        ]; ?>" id="wpsite_div_pinterest">

                            <h3 class="nnr-page-header"><?php esc_html_e(
                                "General",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div>

                                <!-- Active -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_pinterest_active"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Active",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <?php
                                    $settingsPA 
                                        = $settings["pinterest"]["active"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_pinterest_active"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_pinterest_active"
                                            type="checkbox"
                                            <?php echo !empty($settingsPA) ? 
                                            'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_pinterest_active">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the social icon on 
                                            your site.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- User URL -->

                                <div class="nnr-form-group nnr-row pt-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_pinterest_user"
                                           class="col-sm-3 control-label">
                                           <?php 
                                            esc_html_e(
                                                "User URL",
                                                "wpsite-follow-us-badges"
                                            ); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="wpsite_follow_us_settings_
                                            pinterest_user"
                                            name="wpsite_follow_us_settings_
                                            pinterest_user"
                                            type="text"
                                            value="<?php 
                                            echo esc_attr(
                                                $settings["pinterest"]["user"]
                                            ); ?>"
                                        />
                                        <em class="help-block"><?php esc_html_e(
                                            "Set the user URL.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Name -->

                                <div class="nnr-form-group nnr-row pt-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_pinterest_args_name" class="col-sm-3 
                                    control-label">
                                    <?php esc_html_e(
                                        "Name",
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                    </label>
                                    <?php 
                                        $settingsPAN
                                            = $settings["pinterest"]["args"]["name"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                        id="wpsite_follow_us_settings_pinterest_args
                                        _name"
                                        name="wpsite_follow_us_settings_pinterest
                                        _args_name"
                                        type="text"
                                        value="<?php echo esc_attr($settingsPAN); ?>"
                                        />
                                        <em class="help-block"><?php esc_html_e(
                                            "Set the User Name.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Link Only -->

                                <div class="nnr-form-group nnr-row pt-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_pinterest_args_link"
                                           class="col-sm-3 control-label">
                                        <?php esc_html_e(
                                            "Link Only",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                    </label>
                                    <?php
                                    $settingsPAL 
                                        = $settings["pinterest"]["args"]["link"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_pinterest_args_link"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_pinterest_args_link"
                                            type="checkbox"
                                            <?php echo !empty($settingsPAL) ? 
                                            'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_pinterest_args_link">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the large 
                                            button style that only the 
                                            links to your social page..",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <p><?php esc_html_e(
                                    "Reference:",
                                    "wpsite-follow-us-badges"
                                ); ?> <a
                                            href="http://business.pinterest.com/en/
                                            widget-builder#do_follow_me_button"
                                            target="_blank"><?php esc_html_e(
                                                "Pinterest Button API Details",
                                                "wpsite-follow-us-badges"
                                            ); ?></a>
                                </p>

                            </div>

                        </div>

                        <div role="tabpanel" class="nnr-tab-pane tab-pane 
                        <?php 
                            echo $tab_classes[
                                "youtube"
                            ]; ?>" 
                        id="wpsite_div_youtube">

                            <h3 class="nnr-page-header"><?php esc_html_e(
                                "General",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div>

                                <!-- Active -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_youtube_active" class="col-sm-3 
                                    control-label">
                                    <?php 
                                        esc_html_e(
                                            "Active",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                    </label>
                                    <?php 
                                    $settingsYA 
                                        = $settings["youtube"]["active"];
                                    ?>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_youtube_active"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_youtube_active"
                                            type="checkbox"
                                            <?php echo !empty($settingsYA) ? 
                                            'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_youtube_active">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block">
                                            <?php esc_html_e(
                                                "Check this to show the social 
                                                icon on your site.",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                                <!-- User URL -->

                                <div class="nnr-form-group nnr-row yt-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_youtube_user" 
                                    class="col-sm-3 control-label">
                                        <?php esc_html_e(
                                            "Channel ID",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" 
                                        id="wpsite_follow_us_
                                        settings_youtube_user" 
                                        name="wpsite_follow_us_settings_youtube
                                        _user" 
                                        type="text" 
                                        value="<?php 
                                        echo esc_attr($settings["youtube"]["user"]);
                                        ?>">
                                        <em class="help-block">
                                        <?php esc_html_e(
                                            "Set the Channel ID",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                        </em>
                                    </div>
                                </div>

                            </div>

                            <h3 class="nnr-page-header yt-hideable"><?php esc_html_e(
                                "Display",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="yt-hideable">

                                <!-- Link Only -->
                                <?php
                                $settingsYAL 
                                    = $settings["youtube"]["args"]["link"];
                                ?>
                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_youtube_args_link" class="col-sm-3
                                     control-label">
                                            <?php esc_html_e(
                                                "Link Only",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               id="<?php echo self::$_prefix; ?>
                                               settings_youtube_args_link"
                                               name="<?php echo self::$_prefix; ?>
                                               settings_youtube_args_link"
                                               type="checkbox" 
                                               <?php echo !empty($settingsYAL)
                                                   ? 'checked="checked"'
                                                   : ""; ?>/>
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_youtube_args_link"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_youtube_args_link"
                                            type="checkbox"
                                            <?php echo !empty($settingsYAL) ? 
                                            'checked="checked"' : ""; ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_youtube_args_link">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block"><?php esc_html_e(
                                            "Check this to show the large button
                                             style that only the links to 
                                             your social page..",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Layout -->
                                <?php
                                $settingsYAL 
                                    = $settings["youtube"]["args"]["layout"];
                                ?>

                                <div class="nnr-form-group nnr-row 
                                yt-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_youtube_args_layout"
                                           class="col-sm-3 control-label">
                                           <?php 
                                            esc_html_e(
                                                "Layout",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="wpsite_follow_us_settings_
                                        youtube_args_layout" name="wpsite_follow_us_
                                        settings_youtube_args_layout">
                                            <option value="default" 
                                            <?php echo !empty($settingsYAL) && 
                                            $settingsYAL === "default" ? 
                                            "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "default", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="full" 
                                            <?php echo !empty($settingsYAL) && 
                                                $settingsYAL === "full" ? 
                                                "selected" : ""; ?>>
                                                <?php esc_html_e(
                                                    "full", 
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                        </select>
                                        <em class="help-block">
                                            <?php esc_html_e(
                                                "Select the layout.",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                                <!-- Theme -->

                                <div class="nnr-form-group nnr-row 
                                yt-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_youtube_args_theme"
                                           class="col-sm-3 control-label">
                                           <?php 
                                            esc_html_e(
                                                "Theme",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                    <select 
                                    id="wpsite_follow_us_settings_
                                    youtube_args_theme" 
                                    name="wpsite_follow_us_settings_
                                    youtube_args_theme">
                                        <option value="default" <?php echo !empty(
                                            $settings["youtube"]["args"]["theme"]
                                        ) && $settings["youtube"]["args"]["theme"]
                                        === "default" ? "selected" : ""; ?>>
                                        <?php esc_html_e(
                                            "default", 
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                        </option>
                                        <option value="dark" <?php echo !empty(
                                            $settings["youtube"]["args"]["theme"]
                                        ) && $settings["youtube"]["args"]["theme"]
                                        === "dark" ? "selected" : ""; ?>>
                                        <?php esc_html_e(
                                            "dark", 
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                        </option>
                                    </select>

                                        <em class="help-block"><?php esc_html_e(
                                            "Select the theme.",
                                            "wpsite-follow-us-badges"
                                        ); ?></em>
                                    </div>
                                </div>

                                <!-- Subscribers Count -->

                                <div class="nnr-form-group nnr-row 
                                yt-hideable-link-only">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_youtube_args_count"
                                           class="col-sm-3 control-label">
                                            <?php esc_html_e(
                                                "Subscribers Count",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_youtube_args_count"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_youtube_args_count"
                                            type="checkbox"
                                            <?php echo !empty(
                                                $settings["youtube"]["args"]["count"]
                                            ) ? 'checked="checked"' : ""; ?>
                                        />

                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_youtube_args_count">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block">
                                            <?php esc_html_e(
                                                "Check this to display the
                                                 subcribers count",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                                <p>
                                    <?php esc_html_e(
                                        "Reference:", 
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                    <a href="https://developers.google.com/
                                    youtube/youtube_subscribe_button" 
                                    target="_blank">
                                        <?php esc_html_e(
                                            "YouTube Button API Details", 
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                    </a>
                                </p>


                            </div>

                        </div>  

                        <div role="tabpanel" 
                        class="nnr-tab-pane tab-pane 
                        <?php echo $tab_classes["tumblr"]; ?>" 
                        id="wpsite_div_tumblr">
                            <h3 class="nnr-page-header"><?php esc_html_e(
                                "General",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div>

                                <!-- Active -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_tumblr_active"
                                    class="col-sm-3 control-label">
                                    <?php esc_html_e(
                                        "Active",
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_tumblr_active"
                                            name="<?php echo self::$_prefix; ?>
                                            settings_tumblr_active"
                                            type="checkbox"
                                            <?php 
                                                echo !empty(
                                                    $settings["tumblr"]["active"]
                                                ) ? 'checked="checked"' : ""; 
                                                ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_tumblr_active">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-square-o 
                                                fa-stack-1x"></i>
                                                <i class="fa fa-check 
                                                fa-stack-1x"></i>
                                            </span>
                                        </label>
                                        <em class="help-block">
                                            <?php esc_html_e(
                                                "Check this to show the social 
                                                icon on your site.",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                                <!-- User -->

                                <div class="nnr-form-group nnr-row tb-hideable">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_tumblr_user"
                                    class="col-sm-3 control-label">
                                    <?php esc_html_e(
                                        "User Name",
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id=
                                            "wpsite_follow_us_settings_tumblr_user"
                                            name=
                                            "wpsite_follow_us_settings_tumblr_user"
                                            type="text"
                                            value=
                                            "<?php echo esc_attr(
                                                $settings["tumblr"]["user"]
                                            ); ?>"
                                        />

                                        <em class="help-block"><?php esc_html_e(
                                            "http://",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                            <strong><label><?php esc_html_e(
                                                "staff",
                                                "wpsite-follow-us-badges"
                                            ); ?></label></strong><?php esc_html_e(
                                                ".tumblr.com",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                            </div>

                            <h3 class="nnr-page-header tb-hideable"><?php esc_html_e(
                                "Display",
                                "wpsite-follow-us-badges"
                            ); ?></h3>

                            <div class="tb-hideable">

                                <!-- Link Only -->

                                <div class="nnr-form-group nnr-row">
                                    <label for="<?php echo self::$_prefix; ?>
                                    settings_tumblr_args_link"
                                           class="col-sm-3 control-label">
                                           <?php 
                                            esc_html_e(
                                                "Link Only",
                                                "wpsite-follow-us-badges"
                                            ); 
                                            ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                            id="<?php echo self::$_prefix; ?>
                                            settings_tumblr_args_link"
                                            name=
                                            "<?php echo self::$_prefix; ?>
                                            settings_tumblr_args_link"
                                            type="checkbox"
                                            <?php 
                                            echo !empty(
                                                $settings["tumblr"]["args"]["link"]
                                            )
                                            ? 'checked="checked"'
                                            : ""; 
                                            ?>
                                        />
                                        <label for="<?php echo self::$_prefix; ?>
                                        settings_tumblr_args_link">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-square-o 
                                            fa-stack-1x"></i>
                                            <i class="fa fa-check 
                                            fa-stack-1x"></i>
                                        </span>
                                        </label>
                                        <em class="help-block">
                                        <?php
                                        $strMessage = "Check this to ";
                                        $strMessage .= "show the large ";
                                        $strMessage .=
                                            "button style that only the";
                                        $strMessage .= " links to your";
                                        $strMessage .= " social page..";
                                        esc_html_e($strMessage);
                                        ?>
                                        </em>
                                    </div>
                                </div>

                                <!-- Color -->
                                <?php
                                $classNnr 
                                    = "nnr-form-group nnr-row tb-hideable-link-only";
                                $labelNnrBtn 
                                    = self::$_prefix ."settings_tumblr_args_button";
                                $labelNnrColor 
                                    = self::$_prefix ."settings_tumblr_args_color";
                                ?>

                                <div class="<?php echo $classNnr; ?>">
                                    <label for="<?php echo $labelNnrColor; ?>" 
                                            class="col-sm-3 control-label">
                                        <?php esc_html_e(
                                            "Color",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                        $settingTBC 
                                            = $settings["tumblr"]["args"]["color"]; 
                                        ?>
                                        <select 
                                        id="wpsiteFollowUsSettingsTumblrArgsColor"
                                        name="wpsiteFollowUsSettingsTumblrArgsColor">
                                            <option value="dark" 
                                            <?php echo !empty($settingTBC) &&
                                            "dark" === $settingTBC
                                                ? "selected"
                                                : ""; ?>>
                                                <?php esc_html_e(
                                                    "dark",
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="light" 
                                            <?php echo !empty($settingTB) &&
                                            "light" === $settingTB
                                                ? "selected"
                                                : ""; ?>>
                                                <?php esc_html_e(
                                                    "light",
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>                               
                                        </select>
                                        <em class="help-block">
                                            <?php esc_html_e(
                                                "Select the color.",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                                <!-- Button -->
                                
                                <div class="<?php echo $classNnr; ?>">
                                    <label for="<?php echo $labelNnrBtn; ?>" 
                                            class="col-sm-3 control-label">
                                        <?php esc_html_e(
                                            "Button",
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                        $settingTB 
                                            = $settings["tumblr"]["args"]["button"]; 
                                        ?>
                                        <select 
                                        id="wpsiteFollowUSettingsTumblrArgsButton"
                                        name="wpsiteFollowUSettingsTumblrArgsButton">
                                            <option value="1" 
                                            <?php echo !empty($settingTB) &&
                                            "1" === $settingTB
                                                ? "selected"
                                                : ""; ?>>
                                                <?php esc_html_e(
                                                    "Classic Tumblr Button",
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="2" 
                                            <?php echo !empty($settingTB) &&
                                            "2" === $settingTB
                                                ? "selected"
                                                : ""; ?>>
                                                <?php esc_html_e(
                                                    "Follow on Tumblr",
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>
                                            <option value="3" 
                                            <?php echo !empty($settingTB) &&
                                            "3" === $settingTB
                                                ? "selected"
                                                : ""; ?>>
                                                <?php esc_html_e(
                                                    "Follow on Tumblr",
                                                    "wpsite-follow-us-badges"
                                                ); ?>
                                            </option>                                
                                        </select>
                                        <em class="help-block">
                                            <?php esc_html_e(
                                                "Select the button type.",
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </em>
                                    </div>
                                </div>

                            </div>

                            <p>
                                <?php esc_html_e(
                                    "Reference:",
                                    "wpsite-follow-us-badges"
                                ); ?> 
                                <a
                                    href="https://www.tumblr.com/buttons"
                                    target="_blank">
                                    <?php esc_html_e(
                                        "Tumblr Button API Details",
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                </a>
                            </p>

                        </div>
                        <?php
                        $cTIFirst = "nnr-tab-pane tab-pane ";
                        $cTI = $tab_classes["list"];
                        $CTIMixed = $cTIFirst . " " . $cTI;
                        ?>
                        <div role="tabpanel" class="<?php echo $CTIMixed; ?>" 
                        id="wpsite_div_order">

                            <h3 class="nnr-page-header">
                                <?php esc_html_e(
                                    "Drag & Drop to Order",
                                    "wpsite-follow-us-badges"
                                ); ?>
                            </h3>

                            <table>
                                <tbody>

                                <!-- Sortables -->

                                <ul id="sortable">

                                    <?php
                                    if (!isset($settings["order"])) {
                                        $settings["order"] 
                                            = self::$default["order"];
                                    }

                                    $wpSiteSort 
                                        = "wpsite_follow_us_sort_item dragable";
                                    foreach ($settings["order"] as $order) { ?>
                                        <li id="<?php echo esc_attr($order); ?>"
                                            name="<?php echo esc_attr($order); ?>"
                                            class="<?php echo $wpSiteSort; ?>">
                                            <i class=
                                            "fa fa-2x 
                                            fa-<?php echo esc_attr($order); ?>">
                                            </i>
                                        </li>
                                    <?php }
                                    ?>

                                </ul>

                                </tbody>
                            </table>
                        </div>
                        <?php
                        $cTCFirst = "metabox-holder nnr-tab-pane tab-pane";
                        $cTC = $tab_classes["code"];
                        ?>
                        <div role="tabpanel"
                        class="<?php echo $cTCFirst . " " . $cTC; ?>"
                        id="wpsite_div_shortcode">
                            <h3 class="nnr-page-header">
                                <?php esc_html_e(
                                    "Examples",
                                    "wpsite-follow-us-badges"
                                ); ?>
                            </h3>

                            <div class="inside">

                                <ol>
                                    <li>
                                        <code>
                                        <?php esc_html_e(
                                            "[wpsite_follow_us_badges " .
                                                'twitter="99Robots"]',
                                            "wpsite-follow-us-badges"
                                        ); ?>
                                        </code>

                                    </li>
                                    <li>
                                        <code>
                                            <?php esc_html_e(
                                                '&lt;?php'. 
                                                'do_shortcode(\'
                                                [wpsite_follow_us_badges' .
                                                    'twitter="99Robots"]\');'. 
                                                '?&gt;',
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </code>
                                    </li>
                                    <li>
                                        <code>
                                            <?php esc_html_e(
                                                '[wpsite_follow_us_badges
                                                title="Follow Us"
                                                twitter="99Robots"
                                                facebook="99robots"
                                                order="facebook,twitter"
                                                twitter_followers_count_display=false
                                                twitter_link=true]',
                                                "wpsite-follow-us-badges"
                                            ); ?>
                                        </code>
                                    </li>
                                </ol>

                                <p>
                                    <?php esc_html_e(
                                        "Go to",
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                    <a href="https://github.com/99robots/
wpsite-follow-us-badges#shortcode-parameters" 
target="_blank">                                  
                                        Github
                                    </a>
                                    <?php esc_html_e(
                                        "page for the full list of parameters.",
                                        "wpsite-follow-us-badges"
                                    ); ?>
                                </p>

                            </div>
                        </div>

                    </div>

                </div>

                <?php wp_nonce_field("wpsiteFollowUsAdminSettings"); ?>

                <p class="nnr-submit">
                    <button type="submit" name="submit" id="submit" 
                    class="button button-primary button-large" value="Save Settings">
                        <i class="fa fa-download"></i> Save
                    </button>
                </p>

                <small style="color:#aaa;">
                    <?php esc_html_e(
                        "* These settings will apply to the ",
                        "wpsite-follow-us-badges"
                    ); ?>
                    <a href="widgets.php">
                        <?php esc_html_e(
                            "widget",
                            "wpsite-follow-us-badges"
                        ); ?>
                    </a>
                    <?php esc_html_e(".", "wpsite-follow-us-badges"); ?>
                </small>

            </form>

        </div>

        <?php require_once "sidebar.php"; ?>

    </div>

    <?php require_once "footer.php"; ?>

</div>
