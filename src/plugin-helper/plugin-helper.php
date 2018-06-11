<?php
/**
 * @package Pragmatica_Plugin_Helper
 * @version 1.0.0
 */
/*
Plugin Name: Pragmatica Plugin Helper
Plugin URI: https://github.com/cg-alves/Pragmatica-Plugin-Helper
Description: This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.
Author: Carlos Alves
Author URI: https://pragmatica.pt/
Version: 1.0.0
License: GPLv3
Text Domain: plugin-helper
Domain Path: /lang/
*/
error_reporting(E_ALL);
error_reporting(-1);

session_start();

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_menu', 'installer_menu' );

add_action('plugins_loaded', 'wan_load_textdomain' );
function wan_load_textdomain() {
	load_plugin_textdomain( 'plugin-helper', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

// Define the description and name as translatable strings.
__( 'Pragmatica Plugin Helper', 'plugin-helper' );
__( 'This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.', 'plugin-helper' );

function installer_menu() {
    add_menu_page( __( 'Plugin Helper', 'plugin-helper' ), __( 'Plugin Helper', 'plugin-helper' ), 'manage_options', 'plugin-installer', 'landing_page', 'dashicons-admin-generic', 200  );
    add_submenu_page( __( 'Installer', 'plugin-helper' ), __( 'Installer', 'plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-installer-sub', 'plugin_installer' );
    add_submenu_page( __( 'Plugin List', 'plugin-helper' ), __( 'Plugin List', 'plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-selector', 'plugin_selector' );
    add_submenu_page( __( 'Plugin Search', 'plugin-helper' ), __( 'Plugin Search', 'plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-searcher', 'plugin_searcher' );
    add_submenu_page( __( 'Installer', 'plugin-helper' ), __( 'Installer', 'plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-installer-main', 'main' );
    add_submenu_page( __( 'Plugin Export',  'plugin-helper' ), __( 'Plugin Export', 'plugin-helper' ), 'Whatever You Want','manage_options', 'plugin-exporter', 'export_plugins' );
}

// This function acts as a landing page, presenting the end user with an easy to navigate menu.
function landing_page(){
    ?>
        <div class='wrap'>
            <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Pragmatica Plugin Helper', 'plugin-helper' ) ); ?></h1>
            <hr class='wp-header-end'>
            <table class='wp-list-table widefat striped tags' style=' border-collapse: collapse;'>
                <caption>
                    <h3><?php echo esc_attr( __( 'Please choose your desired installation method.' , 'plugin-helper' ) ); ?></h3>
                </caption>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center; width:50%;'>
                            <h2><?php echo esc_attr( __( 'Curated Plugin List', 'plugin-helper' ) ); ?></h2>
                        </th>
                        <th class='manage-column column-author' style='text-align:center; width:50%;'>
                            <h2><?php echo esc_attr( __( 'Manual Search (Advanced)', 'plugin-helper' ) ); ?></h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='author column-author' style='text-align: center;width:50%;'>
                            <b><?php echo esc_attr( __( "Pragmatica's curated plugin list gives you easy access to several trusted plugins. Simply choose which plugins you want and their installation and activation will occur without any further action required. With this list, you can be sure that the plugins you're installing are trustworthy.", 'plugin-helper' ) ); ?></b>
                        </td>
                        <td class='author column-author' style='text-align:center; width:50%;'>
                            <b><?php echo esc_attr( __( "This search option is for more advanced users who want to automate the installation and deployment process. It allows you to name the plugins you want, and install and activate them in a single click.", 'plugin-helper' ) ); ?></b>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class='author column-author' style='text-align:center; width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-selector'><?php echo esc_attr( __( 'List', 'plugin-helper' ) ); ?></a>
                        </td>
                        <td class='author column-author' style='text-align:center; width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-searcher'><?php echo esc_attr( __( 'Search', 'plugin-helper' ) ); ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td class='author column-author' colspan='2' style='text-align:center; width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-exporter'><?php echo esc_attr( __( 'Export Active Plugins', 'plugin-helper' ) ); ?></a>
                        </td>
                    </tr>
                </tfoot>
            </div>
    <?php
}

// This core function will be executed whenever the end user chooses to install plugins.
// It executes several other functions in order to install and activate the plugins.
function main() {
    include ( './includes/class-wp-upgrader.php' );
    include_once ( './includes/class-plugin-upgrader.php' );
    ?>
        <div class='wrap'>
            <h1><?php echo esc_attr( __( 'Installing the selected plugins.', 'plugin-helper' ) ); ?></h1>
                <div id='output'>"
    <?php
        plugin_installer();
    ?>
                <br />
                <br />
                <h1><?php echo esc_attr( __( 'Activating the installed plugins.', 'plugin-helper' ) ); ?></h1>
    <?php
        plugin_activation();
    ?>
                </div>
            <br />
            <br />
            <h1 style='text-align:center'><?php echo esc_attr( __( 'The function has ended. If your plugins have installed correctly, you may delete this plugin.', 'plugin-helper' ) ); ?></h1>
            <br />
            <form style='text-align:center'>
                <a class='button' style='text-align:center' href='../../wp-admin/'><?php echo esc_attr( __( 'Return to the Main admin page', 'plugin-helper' ) ); ?></a>
                <a class='button' style='text-align:center' href='../../wp-admin/plugins.php'><?php echo esc_attr( __( 'Return to the Plugins page', 'plugin-helper' ) ); ?></a>
            </form>
        </div>
    <?php
}


// This function will recursively install all plugins based on whatever plugin data is in $_SESSION.
function plugin_installer() {
    $plugins =  ( $_SESSION['plugin'] );
    ?>
        <br />
    <?php
    foreach ( $plugins as $each => $key ) {
        if ( $key['apply'] == '1' ) {
        ?>
            <br />
            <h2><?php echo esc_attr( __( 'Installing plugin:', 'plugin-helper' ) ); ?> "<?php echo esc_attr( $key['plugin_name'] ); ?>".</h2>"
        <?php
            $installer = ( new Plugin_Upgrader ) -> install( $key['plugin_uri'] );
        }
        if ( $key['apply'] == '0' ) {
            ?>
                <br />
                <h2><?php echo esc_attr( __( 'Skipping plugin:', 'plugin-helper' ) ); ?> "<?php echo esc_attr( $key['plugin_name'] ); ?>".</h2>
            <?php
        }
    }
}

// This function will activate all plugins installed by the previous functions.
function plugin_activation() {
    $selected_plugins = ( $_SESSION['plugin'] );
// Returns an array with all plugin information.
    $installed_plugins = get_plugins();
    ?>
        <br />
    <?php
    foreach ( $selected_plugins as $each_selected => $plugin_field ) {
        if ( $plugin_field['apply'] == '1' ) {
            ?>
                <br />
                <h2><?php echo esc_attr( __( 'Activating plugin:', 'plugin-helper' ) ); ?> "<?php echo esc_attr( $plugin_field['plugin_name'] ); ?>".</h2>
            <?php
            foreach ( $installed_plugins as $each_installed => $installed_field ) {
// Recursively activates plugins if the name field matches between both arrays.
                if ( $installed_field['Name'] == $plugin_field['plugin_name'] ) {
                    $result = activate_plugin( $each_installed );
                }
            }
        }
    }
}

// This function exports every active plugin in a format that can be pasted directly into the searcher.
function export_plugins() {
    $installed_plugins = get_plugins();
    $active_plugins = get_option( 'active_plugins' );
    $i = 1;
    foreach ( $installed_plugins as $each_installed => $installed_field ) {
        foreach ( $active_plugins as $each_active ) {
            if ( $each_installed == $each_active ) {
                $exported_plugins[$i] = $installed_field['Name'];
                $i++;
            }
        }
    }
    ?>
        <div class='wrap'>
            <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Active Plugin Export', 'plugin-helper' ) ); ?></h1>
            <h2><?php echo esc_attr( __( 'Warning!', 'plugin-helper' ) ); ?></h2>
            <h3><?php echo esc_attr( __( "It's advised that you deactivate any custom plugins (those that don't come from the Wordpress store) before you export your active plugin list, as those may result in you importing unwanted plugins.", 'plugin-helper' ) ); ?></h3>
            <h3><?php echo esc_attr( __( "You can import plugins by simply copying the list in the text box bellow, and then pasting it in the 'Search' option on this plugin's homepage.", 'plugin-helper' ) ); ?></h3>
            <hr class='wp-header-end'>
            <table class='wp-list-table widefat striped tags' style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;'>
                            <b><?php echo esc_attr( __( "Plugin List", 'plugin-helper' ) ); ?></b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <textarea class='widefat' style='width:100% !important; height:400px !important; overflow:auto;'><?php echo esc_attr( '"'.implode('"'.PHP_EOL.'"',$exported_plugins).'"' );?></textarea>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class='author column-author' colspan='2' style='text-align:center;width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-installer'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'plugin-helper' ) ); ?></a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php
}

// A curated plugin list. You can edit this to suit your and your clients' needs. 
// If you add any categories, be sure to adjust for that in "function plugin_form ( $plugins )".
function curated_plugin_list() {
    $i=1;
    $curated_plugins = array(
    //SEO CATEGORY
        '1'=>array(
            "id"=>$i++,
            "plugin_name"=>'Yoast SEO',
            "plugin_uri"=>'https://downloads.wordpress.org/plugin/wordpress-seo.7.6.1.zip',
            "category"=>'SEO',
            "apply"=>'0',
        ),
        array(
            "id"=>$i++,
            "plugin_name"=>'Redirection',
            "plugin_uri"=>'https://downloads.wordpress.org/plugin/redirection.3.2.zip',
            "category"=>'SEO',
            "apply"=>'0',
        ),
        array(
            "id"=>$i++,
            "plugin_name"=>'MetaSlider',
            "plugin_uri"=>'https://downloads.wordpress.org/plugin/ml-slider.3.8.0.zip',
            "category"=>'SEO',
            "apply"=>'0',
        ),
        array(
            "id"=>$i++,
            "plugin_name"=>'All In One SEO Pack',
            "plugin_uri"=>'https://downloads.wordpress.org/plugin/all-in-one-seo-pack.zip',
            "category"=>'SEO',
            "apply"=>'0',
        ),
    //MANAGEMENT CATEGORY
        array(
            "id"=>$i++,
            "plugin_name"=>'Beaver Builder Plugin (Lite Version)',
            "plugin_uri"=>'https://downloads.wordpress.org/plugin/beaver-builder-lite-version.zip',
            "category"=>'Manage',
            "apply"=>'0'
        ),
    //MISCELLANEOUS CATEGORY
        array(
            "id"=>$i++,
            "plugin_name"=>'Hello Dolly',
            "plugin_uri"=>'https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip',
            "category"=>'Misc',
            "apply"=>'0',
        ),
    );
    
    return ( $curated_plugins );
}

//This function will search for the plugins in the WP store, save the result in an array, and store it to $_SESSION so it can later be used by the installer function.
function plugin_search( $search ) {
    include ( './includes/plugin-install.php' );
    $i = 1;
    
    foreach ( $search as $search_term ) {
        $each_search = plugins_api( 'query_plugins', $args = array(
                                                "search" => $search_term,
                                                "per_page" => 1,
                                                "page" => 1,
                                                "fields" => array(
                                                    'info' => false,
                                                    'short_description' => false,
                                                    'description' => false,
                                                    'sections' => false,
                                                    'ratings' => false,
                                                    'downnload_link' => true,
                                                    'homepage' => false,
                                                    'versions' => false,
                                                    )
                                                ) 
                        );

        foreach ( $each_search -> plugins as $each_plugin => $plugin_field){
            $plugins[$i] ['id'] = $i;
            $plugins[$i] ['plugin_name'] = $plugin_field -> name;
            $plugins[$i] ['plugin_uri'] = $plugin_field -> download_link;
            $plugins[$i] ['apply'] = '1';
        }

        $i++;
    }
    
    $_SESSION['plugin'] = $plugins;
    echo '<script>window.location.href="admin.php?page=plugin-installer-main"</script>'; //Workaround for redirecting within the wp-admin page.
}


// This function sets up manual searching of plugins.
// You can use it to install several plugins at once.
function plugin_searcher() {
    if ( isset ( $_POST['search'] ) ) {
        $tmp = stripslashes ( $_POST['search'] );
        $search = ( explode ( PHP_EOL, $tmp ) );
        plugin_search( $search );
    }
    
    ?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo esc_attr( __( "Plugin Search", 'plugin-helper' ) ); ?></h1>
            <a class='page-title-action' href='../../wp-admin/admin.php?page=plugin-installer'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'plugin-helper' ) ); ?></a>
            <hr class='wp-header-end'>
            <table class='wp-list-table widefat striped tags'>
                <caption>
                    <h3><?php echo esc_attr( __( "Please insert the name of the plugins you wish to install in the format bellow.", 'plugin-helper' ) ); ?></h3>
                </caption>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'>Plugins a Instalar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='manage-column column-author' colspan='2' style='text-align:center;'>
                        <form method='post' name='search'>
                            <textarea name='search' class='widefat' style='width:100% !important; height:300px !important; overflow:auto;' placeholder='<?php echo esc_attr( __( 'Insert the name of the plugins that you wish to install separated by either apostrophes or quotation marks and Return.&#10;&#10;Example:&#10;"yoast"&#10;"beaver builder"&#10;"tinymce"', 'plugin-helper' ) ); ?>'></textarea>
                        </td>
                    </tr>
                </tbody> 
                <tfoot>
                    <tr>
                        <td class='manage-column column-author' colspan='2' style='text-align:center;'>
                            <input class='button button-primary button-hero load-customize hide-if-no-customize' type='submit' name='plugin_select' value='<?php echo esc_attr( __( 'Install Plugins', 'plugin-helper' ) ); ?>'/>
                        </td>
                    </tr>
                </form>
                </tfoot>
            </table>
        </div>
    <?php
}

//This function allows the end user to select the plugins they wish to install.
//It takes the form data from $_POST and will store it in $_SESSION if the user ticked the selection box.
function plugin_selector() {
    $plugins = curated_plugin_list();
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
            <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Curated Plugin List', 'plugin-helper' ) ); ?></h1>
            <a class='page-title-action' href='../../wp-admin/admin.php?page=plugin-installer'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'plugin-helper' ) ); ?></a>
            <hr class='wp-header-end'>
    <?php
        plugin_form($plugins);
    ?>
        </div>
    <?php
}

//Prints a tabled form with all curated plugins.
//You must edit this function if you've added any categories in "function curated_plugin_list()".
function plugin_form( $plugins ) {
        ?>
            <table class='wp-list-table widefat striped tags'>
                <caption><h3><?php echo esc_attr( __( 'Please select the plugins you wish to install.', 'plugin-helper' ) ); ?></h3></caption>
        <?php
//Code for the SEO Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Search Engine Optimization', 'plugin-helper' ) ); ?></h2></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'><h3><?php echo esc_attr( __( 'Plugin Name', 'plugin-helper' ) ); ?></h3></th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'><h3><?php echo esc_attr( __( 'Selection', 'plugin-helper' ) ); ?></h3></th>
                    </tr>
                </thead>
                <tbody>
                    <form method='post' style='text-align:center' name='plugin_select'>
        <?php
    foreach ( $plugins as $each => $key ) {
            if ( $key['category'] == 'SEO' ) {
                ?>
                    <tr>
                        <td class='author column-author' style='text-align:center;'> <b> "<?php echo esc_attr( $key['plugin_name'] ); ?>" </b> </td>
                        <td class='author column-author' style='text-align:center;'> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
                    </tr>
                <?php
            }
        }
        ?>
                </tbody>
        <?php    
//Code for the Management Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Management', 'plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='Manage' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
                </tr>
            <?php
            }
        }
        ?>
                </tbody>
        <?php  
//Code for the Misc Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Miscellaneous', 'plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category'] == 'Misc' ) {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b> "<?php echo esc_attr( $key['plugin_name'] ); ?>" </b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
                </tr>
            <?php
            }
        }
        ?>
                </tbody>
        <?php
//End of the table
        ?>
                <tfoot>
                    <tr>
                        <td class='manage-column column-author' colspan='2' style='text-align:center;'>
                            <input class='button button-primary button-hero load-customize hide-if-no-customize' type='submit' name='plugin_select' value='<?php echo esc_attr( __( 'Install Plugins', 'plugin-helper' ) ); ?>'/> </input>
                        </td>
                    </tr>
                </form>
                </tfoot>
            </table>
        <?php
}
