<?php
/*
Plugin Name: My Sugar

*/



define('SK_PLUGIN_NAME', 'My Sugar');
define('SYNC_SUGARCRM_USERS_PATH', dirname(__FILE__));

require_once SYNC_SUGARCRM_USERS_PATH.'/class/Sync_SugarCRM_Users.php';
if (class_exists("Sync_SugarCRM_Users")) {
	$sync_sugarcrm_users = new Sync_SugarCRM_Users();
}
require_once SYNC_SUGARCRM_USERS_PATH.'/class/SugarCRM.php';
if (class_exists("Sync_SugarCRM")) {
	$sync_sugarcrm = new Sync_SugarCRM($sync_sugarcrm_users);
}
require_once SYNC_SUGARCRM_USERS_PATH.'/class/WordPress.php';
if (class_exists("Sync_WordPress")) {
	$sync_wordpress = new Sync_WordPress($sync_sugarcrm_users);
}

$sync_sugarcrm_users->set_sugarcrm($sync_sugarcrm);
$sync_sugarcrm_users->set_wordpress($sync_wordpress);

//Initialize the admin panel
if (!function_exists("sync_sugarcrm_users_ap")) {
	function sync_sugarcrm_users_ap() {
		global $sync_sugarcrm_users;
		if (!isset($sync_sugarcrm_users)) {
			return;
		}

    add_menu_page('Sync CRM Users', 'My Sugar', 10, basename(__FILE__).'_config', array(&$sync_sugarcrm_users, 'syncPage'),plugins_url( '/My Sugar/images1.jpg' ));
    // add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
   // add_submenu_page(basename(__FILE__), 'Sync to WP', 'Sync to WP', 10, basename(__FILE__).'_to_WP', array(&$sync_sugarcrm_users, 'syncUsersToWPPage'));
   // add_submenu_page(basename(__FILE__), 'Sync to SugarCRM', 'Sync to SugarCRM', 10, basename(__FILE__).'_wordpress_sync', array(&$sync_sugarcrm_users, 'printWordPressUsersSelectForm'));
   // add_submenu_page(basename(__FILE__), 'SugarCRM', 'SugarCRM', 10, basename(__FILE__).'_view_sugarcrm', array(&$sync_sugarcrm_users, 'printViewSugarCRM'));
    add_submenu_page(basename(__FILE__), 'Setting', 'Setting', 10, basename(__FILE__).'_config', array(&$sync_sugarcrm_users, 'printConfigPage'));
	}
}

//Actions and Filters	
if (isset($sync_sugarcrm_users)) {
	//Actions
	add_action('admin_menu', 'sync_sugarcrm_users_ap');
	add_action('user_register', array(&$sync_sugarcrm_users, 'sync_sugarcrm_user_register') );
	add_action('profile_update', array(&$sync_sugarcrm_users, 'sync_sugarcrm_user_edit') );
	//add_action('activate_sync-sugarcrm-users.php/sync-sugarcrm-users.php',  array(&$sync_sugarcrm_users, 'init'));
  register_activation_hook( __FILE__, array(&$sync_sugarcrm_users, 'init') );
  register_deactivation_hook( __FILE__, array(&$sync_sugarcrm_users, 'deactivate') );
}



