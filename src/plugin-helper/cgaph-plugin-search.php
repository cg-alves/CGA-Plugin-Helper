<?php

// This function sets up manual searching of plugins.
// You can use it to install several plugins at once.
function cgaph_plugin_searcher() {

    if ( isset ( $_POST['search'] ) ) {
        $tmp = stripslashes ( $_POST['search'] );
        $search = ( explode ( PHP_EOL, $tmp ) );
        cgaph_plugin_search( $search );
    }
    
    ?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo esc_attr( __( "Plugin Search", 'cga-plugin-helper' ) ); ?></h1>
            <a class='page-title-action' href='admin.php?page=plugin-helper'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'cga-plugin-helper' ) ); ?></a>
            <hr class='wp-header-end'>
            <table class='wp-list-table widefat striped tags'>
                <caption>
                    <h3><?php echo esc_attr( __( "Please insert the name of the plugins you wish to install in the format bellow.", 'cga-plugin-helper' ) ); ?></h3>
                </caption>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'><?php echo esc_attr( __( "Plugins to Install", 'cga-plugin-helper' ) ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='manage-column column-author' colspan='2' style='text-align:center;'>
                        <form method='post' name='search'>
                            <textarea name='search' class='widefat' style='width:100% !important; height:300px !important; overflow:auto;' placeholder='<?php echo esc_attr( __( 'Insert the name of the plugins that you wish to install separated by either apostrophes or quotation marks and Return.&#10;&#10;Example:&#10;"yoast"&#10;"beaver builder"&#10;"tinymce"', 'cga-plugin-helper' ) ); ?>'></textarea>
                        </td>
                    </tr>
                </tbody> 
                <tfoot>
                    <tr>
                        <td class='manage-column column-author' colspan='2' style='text-align:center;'>
                            <input class='button button-primary button-hero load-customize hide-if-no-customize' type='submit' name='plugin_select' value='<?php echo esc_attr( __( 'Install Plugins', 'cga-plugin-helper' ) ); ?>'/>
                        </td>
                    </tr>
                </form>
                </tfoot>
            </table>
        </div>
    <?php
}

//This function will search for the plugins in the WP store, save the result in an array, and store it to a transient so it can later be used by the installer function.
function cgaph_plugin_search( $search ) {
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
    
    set_transient( 'plugin', $plugins, 30 * MINUTE_IN_SECONDS );
    echo '<script>window.location.href="admin.php?page=plugin-installer-main"</script>'; //Workaround for redirecting within the wp-admin page.
}
