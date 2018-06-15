<?php
// This core function will be executed whenever the end user chooses to install plugins.
// It executes several other functions in order to install and activate the plugins.
function cgaph_main() {
    include ( './includes/class-wp-upgrader.php' );
    include_once ( './includes/class-plugin-upgrader.php' );
    ?>
        <div class='wrap'>
            <h1><?php echo esc_attr( __( 'Installing the selected plugins.', 'cga-plugin-helper' ) ); ?></h1>
                <div id='output'>"
    <?php
        cgaph_plugin_installer();
    ?>
                <br />
                <br />
                <h1><?php echo esc_attr( __( 'Activating the installed plugins.', 'cga-plugin-helper' ) ); ?></h1>
    <?php
        cgaph_plugin_activation();
    ?>
                </div>
            <br />
            <br />
            <h1 style='text-align:center'><?php echo esc_attr( __( 'The function has ended. If your plugins have installed correctly, you may delete this plugin.', 'cga-plugin-helper' ) ); ?></h1>
            <br />
            <form style='text-align:center'>
                <a class='button' style='text-align:center' href='../../wp-admin/'><?php echo esc_attr( __( 'Return to the Main admin page', 'cga-plugin-helper' ) ); ?></a>
                <a class='button' style='text-align:center' href='../../wp-admin/plugins.php'><?php echo esc_attr( __( 'Return to the Plugins page', 'cga-plugin-helper' ) ); ?></a>
            </form>
        </div>
    <?php
}


// This function will recursively install all plugins based on whatever plugin data is in $_SESSION.
function cgaph_plugin_installer() {
    add_action('plugins_loaded','cgaph_session_starter');
    $plugins = get_transient( 'plugin' );
    ?>
        <br />
    <?php
    foreach ( $plugins as $each => $key ) {
        if ( $key['apply'] == '1' ) {
        ?>
            <br />
            <h2><?php echo esc_attr( __( 'Installing plugin:', 'cga-plugin-helper' ) ); ?> "<?php echo esc_attr( $key['plugin_name'] ); ?>".</h2>"
        <?php
            $installer = ( new Plugin_Upgrader ) -> install( $key['plugin_uri'] );
        }
    }
}

// This function will activate all plugins installed by the previous functions.
function cgaph_plugin_activation() {
    add_action('plugins_loaded','cgaph_session_starter');
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
                <h2><?php echo esc_attr( __( 'Activating plugin:', 'cga-plugin-helper' ) ); ?> "<?php echo esc_attr( $plugin_field['plugin_name'] ); ?>".</h2>
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
