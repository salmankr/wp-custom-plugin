<?php

/**
* @package customPlugin
*/

if (! defined('WP_UNINSTALL_PLUGIN')) {
	die();
}

global $wpdb;
$wpdb->query("DELETE FROM tbl_posts WHERE post_type = 'review-post'");
$wpdb->query("DELETE FROM tbl_postmeta WHERE post_id NOT IN (SELECT id FROM tbl_posts)");
$wpdb->query("DELETE FROM tbl_term_relationships WHERE object_id NOT IN (SELECT id FROM tbl_posts)");