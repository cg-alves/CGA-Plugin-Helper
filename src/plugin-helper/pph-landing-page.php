<?php

// This function acts as a landing page, presenting the end user with an easy to navigate menu.
function pph_landing_page() {
    ?>
        <div class='wrap'>
            <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Pragmatica Plugin Helper', 'pragmatica-plugin-helper' ) ); ?></h1>
            <hr class='wp-header-end'>
            <table class='wp-list-table widefat striped tags' style=' border-collapse: collapse;'>
                <caption>
                    <h3><?php echo esc_attr( __( 'Please choose your desired installation method.' , 'pragmatica-plugin-helper' ) ); ?></h3>
                </caption>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center; width:50%;'>
                            <h2><?php echo esc_attr( __( 'Curated Plugin List', 'pragmatica-plugin-helper' ) ); ?></h2>
                        </th>
                        <th class='manage-column column-author' style='text-align:center; width:50%;'>
                            <h2><?php echo esc_attr( __( 'Manual Search (Advanced)', 'pragmatica-plugin-helper' ) ); ?></h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='author column-author' style='text-align: center;width:50%;'>
                            <b><?php echo esc_attr( __( "Pragmatica's curated plugin list gives you easy access to several trusted plugins. Simply choose which plugins you want and their installation and activation will occur without any further action required. With this list, you can be sure that the plugins you're installing are trustworthy.", 'pragmatica-plugin-helper' ) ); ?></b>
                        </td>
                        <td class='author column-author' style='text-align:center; width:50%;'>
                            <b><?php echo esc_attr( __( "This search option is for more advanced users who want to automate the installation and deployment process. It allows you to name the plugins you want, and install and activate them in a single click.", 'pragmatica-plugin-helper' ) ); ?></b>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class='author column-author' style='text-align:center; width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-selector'><?php echo esc_attr( __( 'List', 'pragmatica-plugin-helper' ) ); ?></a>
                        </td>
                        <td class='author column-author' style='text-align:center; width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-searcher'><?php echo esc_attr( __( 'Search', 'pragmatica-plugin-helper' ) ); ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td class='author column-author' colspan='2' style='text-align:center; width:50%;'>
                            <a class='button button-primary button-hero load-customize hide-if-no-customize' href='../wp-admin/admin.php?page=plugin-exporter'><?php echo esc_attr( __( 'Export Active Plugins', 'pragmatica-plugin-helper' ) ); ?></a>
                        </td>
                    </tr>
                </tfoot>
            </div>
    <?php
}
