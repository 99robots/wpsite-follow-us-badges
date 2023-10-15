<?php
/**
 * Uninstall script for the plugin.
 *
 * PHP version 7.2.10
 * 
 * @category Plugins
 * @package  Follow_Us_Badges
 * @author   Draft <contact@draftpress.com>
 * @license  GNU General Public License 2 
 * (https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
 * @link     https://draftpress.com/products/
 * @since    1.0 (PHP 7.2)
 */

if (!defined("WP_UNINSTALL_PLUGIN")) {
    exit();
}

/* Delete all existence of this plugin */

global $wpdb;

$blog_option_name = "wpsite_follow_us_settings";
$version_option_name = "wpsite_follow_us_badges_version";

if (!is_multisite()) {
    delete_option($version_option_name);
} else {
    delete_site_option($version_option_name);

    /* Used to delete each option from each blog */

    $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");

    foreach ($blog_ids as $blog_id) {
        switch_to_blog($blog_id);

        /* Delete blog option */

        delete_option($blog_option_name);
    }

    restore_current_blog();
}
