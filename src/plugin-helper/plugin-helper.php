<?php
/**
 * @package Pragmatica_Plugin_Helper
 * @version 1.2.0
 */
/*
Plugin Name: Pragmatica Plugin Helper
Plugin URI: https://github.com/cg-alves/Pragmatica-Plugin-Helper
Description: This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.
Author: Carlos Alves
Author URI: https://pragmatica.pt/
Version: 1.2.0
License: GPLv3
Text Domain: pragmatica-plugin-helper
Domain Path: /lang/
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_menu', 'pph_installer_menu' );
add_action( 'plugins_loaded', 'pph_load_textdomain' );

//Loads translations
function pph_load_textdomain() {
	load_plugin_textdomain( 'pragmatica-plugin-helper', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
    // Define the description and name as translatable strings.
    __( 'Pragmatica Plugin Helper', 'pragmatica-plugin-helper' );
    __( 'This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.', 'pragmatica-plugin-helper' );
}

//Loads menu and pages
function pph_installer_menu() {
    include_once ( 'pph-landing-page.php' );
    include_once ( 'pph-plugin-select.php' );
    include_once ( 'pph-plugin-search.php' );
    include_once ( 'pph-plugin-export.php' );
    include_once ( 'pph-plugin-main.php' );
    add_menu_page( __( 'Plugin Helper', 'pragmatica-plugin-helper' ), __( 'Plugin Helper', 'pragmatica-plugin-helper' ), 'manage_options', 'plugin-installer', 'pph_landing_page', 'dashicons-admin-generic', 200  );
    add_submenu_page( __( 'Installer', 'pragmatica-plugin-helper' ), __( 'Installer', 'pragmatica-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-installer-sub', 'pph_plugin_installer' );
    add_submenu_page( __( 'Plugin List', 'pragmatica-plugin-helper' ), __( 'Plugin List', 'pragmatica-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-selector', 'pph_plugin_selector' );
    add_submenu_page( __( 'Plugin Search', 'pragmatica-plugin-helper' ), __( 'Plugin Search', 'pragmatica-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-searcher', 'pph_plugin_searcher' );
    add_submenu_page( __( 'Installer', 'pragmatica-plugin-helper' ), __( 'Installer', 'pragmatica-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-installer-main', 'pph_main' );
    add_submenu_page( __( 'Plugin Export',  'pragmatica-plugin-helper' ), __( 'Plugin Export', 'pragmatica-plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-exporter', 'pph_export_plugins' );
}
