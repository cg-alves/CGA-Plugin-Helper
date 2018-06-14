<?php
/**
 * @package Pragmatica_Plugin_Helper
 * @version 1.1.0
 */
/*
Plugin Name: Pragmatica Plugin Helper
Plugin URI: https://github.com/cg-alves/Pragmatica-Plugin-Helper
Description: This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.
Author: Carlos Alves
Author URI: https://pragmatica.pt/
Version: 1.1.0
License: GPLv3
Text Domain: pragmatica-plugin-helper
Domain Path: /lang/
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_menu', 'pph_installer_menu' );
add_action( 'plugins_loaded', 'pph_load_textdomain' );
add_action( 'init', 'pph_session_starter', 1 );
add_action( 'wp_logout', 'pph_session_ender' );
add_action( 'wp_login', 'pph_session_ender' );

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

function pph_session_starter(){
    if(!session_id()) {
        session_start();
    }
}

function pph_session_ender(){
    session_destroy ();
}

// A curated plugin list.
// You can provide your clients with a custom .php file containing a modified array in the style of the one included in the "else" bellow. This must then be added to obvious path listed in the "if" statement. Future versions of this plugin will likely include additional categories, so be sure to read the patch notes when updating.
// If you decide to add any categories in the mean time, be sure to adjust for that in "function plugin_form ( $plugins )".
function pph_curated_plugin_list() {
    $uploads_dir = wp_upload_dir();
    $pph_curated_plugins_dir = ( $uploads_dir['basedir'].'/pragmatica-plugin-helper' );
    
    //Checks if the required upload directory exists, and creates it if it doesn't.
    if ( !file_exists ( $pph_curated_plugins_dir ) && !is_dir( $pph_curated_plugins_dir ) ) {
        mkdir ( $pph_curated_plugins_dir );
    } 
    
    if ( file_exists ( $pph_curated_plugins_dir.'/custom-curated-plugin-list.php' ) ) {
        include ( $pph_curated_plugins_dir.'/custom-curated-plugin-list.php' );
    }
        
    else{
        include ( 'pph-curated-plugin-list.php' );
    }
    return ( $curated_plugins );
}

//This function allows the end user to select the plugins they wish to install.
//It takes the form data from $_POST and will store it in $_SESSION if the user ticked the selection box.
function pph_plugin_selector() {
    $plugins = pph_curated_plugin_list();
    if ( isset ( $_POST['plugin_select'] ) ) {
        foreach ( $plugins as $each_plugin => $plugin_field ) {
            if ( $_POST[$plugin_field['id']] == '1' ) {
                $plugins[$plugin_field['id']] [ 'apply' ] = '1' ;
                }
            else {
                $plugins[$plugin_field['id']] [ 'apply' ] = '0' ;
            }
        }
        $_SESSION['plugin'] = $plugins;
		echo '<script>window.location.href="admin.php?page=plugin-installer-main"</script>'; //Workaround for redirecting within the wp-admin page.
    }
    ?>
    <div class='wrap'>
            <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Curated Plugin List', 'pragmatica-plugin-helper' ) ); ?></h1>
            <a class='page-title-action' href='../../wp-admin/admin.php?page=plugin-installer'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'pragmatica-plugin-helper' ) ); ?></a>
            <hr class='wp-header-end'>
    <?php
        include_once ('pph-plugin-form.php');
        pph_plugin_form( $plugins );
    ?>
        </div>
    <?php
}
