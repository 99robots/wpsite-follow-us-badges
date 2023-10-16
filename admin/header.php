<?php
/**
 * Header File for the WPSite Follow Us Badges Plugin.
 *
 * This file contains the header section for the WPSite Follow Us Badges 
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

<div class="nnr-header">

    <div class="nnr-logo"></div>

    <div class="nnr-product-details">
        <span class="nnr-product-name"><?php esc_html_e(
            "Follow Us Badges",
            "wpsite-follow-us-badges"
        ); ?></span>
        <span class="nnr-product-version">
            <?php echo WPSITE_FOLLOW_US_VERSION_NUM; ?>
        </span>
    </div>

    <a href="http://draftpress.com/products" target="_blank">
        <button class="nnr-header-button pull-right"><?php esc_html_e(
            "More Products",
            "wpsite-follow-us-badges"
        ); ?></button>
    </a>

</div>
