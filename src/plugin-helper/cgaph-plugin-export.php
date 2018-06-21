<?php

// This function exports every active plugin in a format that can be pasted directly into the searcher.
function cgaph_export_plugins() {
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
            <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Active Plugin Export', 'cga-plugin-helper' ) ); ?></h1>
            <h2><?php echo esc_attr( __( 'Warning!', 'cga-plugin-helper' ) ); ?></h2>
            <h3><?php echo esc_attr( __( "It's advised that you deactivate any custom plugins (those that don't come from the Wordpress store) before you export your active plugin list, as those may result in you importing unwanted plugins.", 'cga-plugin-helper' ) ); ?></h3>
            <h3><?php echo esc_attr( __( "You can import plugins by simply copying the list in the text box bellow, and then pasting it in the 'Search' option on this plugin's homepage.", 'cga-plugin-helper' ) ); ?></h3>
            <hr class='wp-header-end'>
            <table class='wp-list-table widefat striped tags' style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;'>
                            <b><?php echo esc_attr( __( "Plugin List", 'cga-plugin-helper' ) ); ?></b>
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
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='admin.php?page=plugin-helper'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'cga-plugin-helper' ) ); ?></a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php
}
