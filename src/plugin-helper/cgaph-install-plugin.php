<?php
// This core function will be executed whenever the end user chooses to install plugins.
// It executes several other functions in order to install and activate the plugins.
function cgaph_main() {
    include ( './includes/class-wp-upgrader.php' );
    include_once ( './includes/class-plugin-upgrader.php' );
    ?>
        <div class='wrap'>
            <h1><?php echo esc_attr( __( 'Installing the selected plugins', 'cga-plugin-helper' ) ); ?></h1>
    <?php
        cgaph_plugin_installer();
        echo '<script>window.location.href="admin.php?page=plugin-upgrade"</script>';
    ?>           
        </div>
    <?php
}


// This function will recursively install all plugins based on whatever plugin data is in $_SESSION.
function cgaph_plugin_installer() {
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
