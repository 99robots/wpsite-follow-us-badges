<?php
/**
 * Sidebar File for the WPSite Follow Us Badges Plugin.
 *
 * This file contains the sidebar section for the WPSite Follow Us Badges 
 * plugin's admin interface. 
 *
 * PHP version 7.2.10
 * 
 * @category Plugin
 * @package  WPSite_Follow_Us_Badges
 * @author   DraftPress <support@draftpress.com>
 * @license  GPL-2.0+ <https://www.gnu.org/licenses/gpl-2.0.html>
 * @link     https://draftpress.com/products/
 */

?>

    <div class="nnr-sidebar">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                <?php
                $message1 = "Signup now to get notified of plugin updates, " .
                    "awesome themes, and more. Over 10,000+ already have:";
                esc_html_e($message1, "wpsite-follow-us-badges");
                ?>
            </h3>
            </div>
            <div class="panel-body">
                <div id="mc_embed_signup">
                    <form action="//wpsite.us5.list-manage.com/subscribe/
                    post?u=82c2341134bbdc37714642adb&amp;id=642b18616e" 
                    method="post" 
                    id="mc-embedded-subscribe-form" 
                    name="mc-embedded-subscribe-form" 
                    class="validate" target="_blank" 
                    novalidate style="padding-left: 0;">
                        <div id="mc_embed_signup_scroll">
                            <div style="margin-bottom: 20px;">
                                <input type="email" value="" name="EMAIL" 
                                class="required email form-control" id="mce-EMAIL" 
                                placeholder="<?php esc_html_e(
                                    "Email Address",
                                    "wpsite-follow-us-badges"
                                ); ?>">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" 
                                style="display:none"></div>
                                <div class "response" id="mce-success-response" 
                                style="display:none"></div>
                            </div>
                            <!-- real people should not fill this in and expect good 
                            things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;">
                                <input type="text" 
                                name="b_82c2341134bbdc37714642adb_642b18616e" 
                                tabindex="-1" value="">
                            </div>
                            <div>
                                <input style="width:100%;" type="submit" 
                                value="Subscribe" name="subscribe" 
                                class="btn btn-default">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End mc_embed_signup -->
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php esc_html_e(
                    "Must-Read Articles",
                    "wpsite-follow-us-badges"
                ); ?></h3>
            </div>
            <div class="panel-body">
                <div class="wpsite_feed">
                    <script src="http://feeds.feedburner.com/
                    99robots?format=sigpro" 
                    type="text/javascript"></script>
                    <noscript>
                        <p>
                            <?php esc_html_e(
                                "Subscribe to 99 Robots Feed:",
                                "wpsite-follow-us-badges"
                            ); ?>
                                <a href="http://feeds.feedburner.com/99robots"></a>
                                <br/>
                                <?php esc_html_e(
                                    "Powered by FeedBurner",
                                    "wpsite-follow-us-badges"
                                ); ?>
                        </p>
                    </noscript>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php esc_html_e(
                    "Need a Plugin or Theme Developed?",
                    "wpsite-follow-us-badges"
                ); ?></h3>
            </div>
            <div class="panel-body">
                <a class="nnr-sidebar-image-link" 
                href="https://draftpress.com/contact
                ?utm_medium=sidebar&utm_campaign=plugin-request-banner" 
                target="_blank">
                <img class="nnr-sidebar-image" src="
                <?php echo WPSITE_FOLLOW_US_PLUGIN_URL .
                    "/img/ad-plugin-request.png"; ?>">
                </a>
            </div>
        </div>
    </div>