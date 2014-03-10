<?php

	/* if uninstall not called from WordPress exit */
	
	if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
		exit ();
	
	/* Delete all existence of this plugin */

	global $wpdb;
	
	if ( !is_multisite() ) 
	{
		delete_option('wpdev_follow_us_version');
	} 
	else 
	{
	
		delete_site_option('wpdev_follow_us_version');
		
		/* Used to delete each option from each blog */
		
	    /*
$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
	
	    foreach ( $blog_ids as $blog_id ) 
	    {
	        switch_to_blog( $blog_id );
	        
	        //Delete site data here
	        // e.g. delete_option('wpdev_follow_us_version');
	        
	        restore_current_blog();
	    }
*/
	}
?>