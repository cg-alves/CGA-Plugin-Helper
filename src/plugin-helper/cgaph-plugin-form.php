<?php

//Prints a tabled form with all curated plugins.
//You must edit this function if you've added any categories in "function curated_plugin_list()".

function cgaph_plugin_form( $plugins ) {
        ?>
            <table class='wp-list-table widefat striped tags'>
                <caption><h3><?php echo esc_attr( __( 'Please select the plugins you wish to install.', 'cga-plugin-helper' ) ); ?></h3></caption>
        <?php
//Code for the SEO Category
        ?>
                <thead>
                    <tr>
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Search Engine Optimization', 'cga-plugin-helper' ) ); ?></h2></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'><h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3></th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'><h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3></th>
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
                        <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Design', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='design' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Marketing', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='market' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Management', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='manage' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Analytics', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='analytics' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Social', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='social' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Performance', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='performance' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Security', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category']=='security' )  {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b>"<?php echo esc_attr( $key['plugin_name'] ); ?>"</b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                        <th class='manage-column column-author' colspan='2' style='text-align:center;'> <h2><?php echo esc_attr( __( 'Miscellaneous', 'cga-plugin-helper' ) ); ?></h2> </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Plugin Name', 'cga-plugin-helper' ) ); ?></h3> </th>
                        <th class='manage-column column-author' style='text-align:center;width:50%;'> <h3><?php echo esc_attr( __( 'Selection', 'cga-plugin-helper' ) ); ?></h3> </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $plugins as $each => $key ) {
            if ( $key['category'] == 'misc' ) {
            ?>
                <tr>
                    <td class='author column-author' style='text-align:center;'> <b> "<?php echo esc_attr( $key['plugin_name'] ); ?>" </b> </td>
                    <td class='author column-author' style='text-align:center;'> <input type='hidden' value='0' name="<?php echo esc_attr( $key['id'] ); ?>"> <input type='checkbox' name="<?php echo esc_attr( $key['id'] ); ?>" value='1'> </input> </td>
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
                            <input class='button button-primary button-hero load-customize hide-if-no-customize' type='submit' name='plugin_select' value='<?php echo esc_attr( __( 'Install Plugins', 'cga-plugin-helper' ) ); ?>'/> </input>
                        </td>
                    </tr>
                </form>
                </tfoot>
            </table>
        <?php
}
