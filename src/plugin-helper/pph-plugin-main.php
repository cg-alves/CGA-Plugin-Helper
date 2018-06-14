<?php
// This core function will be executed whenever the end user chooses to install plugins.
// It executes several other functions in order to install and activate the plugins.
function pph_main() {
    include ( './includes/class-wp-upgrader.php' );
    include_once ( './includes/class-plugin-upgrader.php' );
    ?>
        <div class='wrap'>
            <h1><?php echo esc_attr( __( 'Installing the selected plugins.', 'pragmatica-plugin-helper' ) ); ?></h1>
                <div id='output'>"
    <?php
        pph_plugin_installer();
    ?>
                <br />
                <br />
                <h1><?php echo esc_attr( __( 'Activating the installed plugins.', 'pragmatica-plugin-helper' ) ); ?></h1>
    <?php
        pph_plugin_activation();
    ?>
                </div>
            <br />
            <br />
            <h1 style='text-align:center'><?php echo esc_attr( __( 'The function has ended. If your plugins have installed correctly, you may delete this plugin.', 'pragmatica-plugin-helper' ) ); ?></h1>
            <br />
            <form style='text-align:center'>
                <a class='button' style='text-align:center' href='../../wp-admin/'><?php echo esc_attr( __( 'Return to the Main admin page', 'pragmatica-plugin-helper' ) ); ?></a>
                <a class='button' style='text-align:center' href='../../wp-admin/plugins.php'><?php echo esc_attr( __( 'Return to the Plugins page', 'pragmatica-plugin-helper' ) ); ?></a>
            </form>
        </div>
    <?php
}


// This function will recursively install all plugins based on whatever plugin data is in $_SESSION.
function pph_plugin_installer() {
    add_action('plugins_loaded','pph_session_starter');
    $plugins = get_transient( 'plugin' );
    ?>
        <br />
    <?php
    foreach ( $plugins as $each => $key ) {
        if ( $key['apply'] == '1' ) {
        ?>
            <br />
            <h2><?php echo esc_attr( __( 'Installing plugin:', 'pragmatica-plugin-helper' ) ); ?> "<?php echo esc_attr( $key['plugin_name'] ); ?>".</h2>"
        <?php
            $installer = ( new Plugin_Upgrader ) -> install( $key['plugin_uri'] );
        }
        if ( $key['apply'] == '0' ) {
            ?>
                <br />
                <h2><?php echo esc_attr( __( 'Skipping plugin:', 'pragmatica-plugin-helper' ) ); ?> "<?php echo esc_attr( $key['plugin_name'] ); ?>".</h2>
            <?php
        }
    }
}

// This function will activate all plugins installed by the previous functions.
function pph_plugin_activation() {
    add_action('plugins_loaded','pph_session_starter');
    $selected_plugins = get_transient( 'plugin' );
// Returns an array with all plugin information.
    $installed_plugins = get_plugins();
    ?>
        <br />
    <?php
    foreach ( $selected_plugins as $each_selected => $plugin_field ) {
        if ( $plugin_field['apply'] == '1' ) {
            ?>
                <br />
                <h2><?php echo esc_attr( __( 'Activating plugin:', 'pragmatica-plugin-helper' ) ); ?> "<?php echo esc_attr( $plugin_field['plugin_name'] ); ?>".</h2>
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
