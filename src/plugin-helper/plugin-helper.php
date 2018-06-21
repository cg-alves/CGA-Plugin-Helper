<?php
/**
 * @package CGA_Plugin_Helper
 * @version 1.3.1
 */
/*
Plugin Name: CGA Plugin Helper
Plugin URI: https://github.com/cg-alves/CGA-Plugin-Helper
Description: This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.
Author: Carlos Alves
Author URI: https://masto.pt/@carlosalves
Version: 1.3.1
License: GPLv3
Text Domain: cga-plugin-helper
Domain Path: /lang/
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_menu', 'cgaph_installer_menu' );
add_action( 'plugins_loaded', 'cgaph_load_textdomain' );

//Loads translations
function cgaph_load_textdomain() {
	load_plugin_textdomain( 'cga-plugin-helper', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
    // Define the description and name as translatable strings.
    __( 'CGA Plugin Helper', 'cga-plugin-helper' );
    __( 'This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.', 'cga-plugin-helper' );
}

//Loads menu and pages
function cgaph_installer_menu() {
    include_once ( 'cgaph-landing-page.php' );
    include_once ( 'cgaph-plugin-select.php' );
    include_once ( 'cgaph-plugin-search.php' );
    include_once ( 'cgaph-plugin-export.php' );
    include_once ( 'cgaph-install-plugin.php' );
    include_once ( 'cgaph-activate-plugin.php' );
    include_once ( 'cgaph-upgrade-plugin.php' );
    include_once ( 'cgaph-install-done.php' );
    add_menu_page( __( 'Plugin Helper', 'cga-plugin-helper' ), __( 'Plugin Helper', 'cga-plugin-helper' ), 'manage_options', 'plugin-helper', 'cgaph_landing_page', 'dashicons-admin-generic', 200  );
    add_submenu_page( __( 'Installer', 'cga-plugin-helper' ), __( 'Installer', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-installer-sub', 'cgaph_plugin_installer' );
    add_submenu_page( __( 'Plugin List', 'cga-plugin-helper' ), __( 'Plugin List', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-selector', 'cgaph_plugin_selector' );
    add_submenu_page( __( 'Plugin Search', 'cga-plugin-helper' ), __( 'Plugin Search', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-searcher', 'cgaph_plugin_searcher' );
    add_submenu_page( __( 'Installer', 'cga-plugin-helper' ), __( 'Installer', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-installer-main', 'cgaph_main' );
    add_submenu_page( __( 'Plugin Export',  'cga-plugin-helper' ), __( 'Plugin Export', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-exporter', 'cgaph_export_plugins' );
    add_submenu_page( __( 'Plugin Activation',  'cga-plugin-helper' ), __( 'Plugin Activation', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-activate', 'cgaph_activate_plugins' );
    add_submenu_page( __( 'Plugin Upgrade',  'cga-plugin-helper' ), __( 'Plugin Upgrade', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-upgrade', 'cgaph_upgrade_plugins' );
    add_submenu_page( __( 'Done',  'cga-plugin-helper' ), __( 'Done', 'cga-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-done', 'cgaph_install_done' );
}
