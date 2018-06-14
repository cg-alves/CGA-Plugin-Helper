<?php

function pph_plugin_form( $plugins ) {
        ?>
            <table class='wp-list-table widefat striped tags'>
                <caption><h3><?php echo esc_attr( __( 'Please select the plugins you wish to install.', 'pragmatica-plugin-helper' ) ); ?></h3></caption>
        <?php
//Code for the SEO Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Search Engine Optimization', 'pragmatica-plugin-helper' ) ); ?></h2></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'><h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3></th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'><h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3></th>
                    </tr>
                </thead>
                <tbody>
                    <form method='post' style='text-align:center' name='plugin_select'>
        <?php
    foreach ( $plugins as $each => $key ) {
            if ( $key['category'] == 'seo' ) {
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
//Code for the Design Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Design', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='design' )  {
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
//Code for the Marketing Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Marketing', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='market' )  {
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
//Code for the Management Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Management', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='manage' )  {
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
//Code for the Analytics Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Analytics', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='analytics' )  {
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
//Code for the Social Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Social', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='social' )  {
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
//Code for the Performance Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Performance', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='performance' )  {
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
//Code for the Security Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Security', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='security' )  {
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Miscellaneous', 'pragmatica-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'pragmatica-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category'] == 'misc' ) {
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
                            <input class='button button-primary button-hero load-customize hide-if-no-customize' type='submit' name='plugin_select' value='<?php echo esc_attr( __( 'Install Plugins', 'pragmatica-plugin-helper' ) ); ?>'/> </input>
                        </td>
                    </tr>
                </form>
                </tfoot>
            </table>
        <?php
}
