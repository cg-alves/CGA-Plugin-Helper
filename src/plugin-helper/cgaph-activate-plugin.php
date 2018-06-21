<?php

function cgaph_activate_plugins() {
    ?>
        <div class='wrap'>
        <h1><?php echo esc_attr( __( 'Activating the installed plugins', 'cga-plugin-helper' ) ); ?></h1>
    <?php
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
    echo '<script>window.location.href="admin.php?page=plugin-done"</script>';
    ?>
        </div>
    <?php
}
