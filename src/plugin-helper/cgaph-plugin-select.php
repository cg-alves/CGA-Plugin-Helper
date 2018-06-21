<?php

// A curated plugin list.
// You can provide your clients with a custom .php file containing a modified array in the style of the one included in the "else" bellow. This must then be added to obvious path listed in the "if" statement. Future versions of this plugin will likely include additional categories, so be sure to read the patch notes when updating.
// If you decide to add any categories in the mean time, be sure to adjust for that in "function plugin_form ( $plugins )".
function cgaph_curated_plugin_list() {
    $uploads_dir = wp_upload_dir();
    $cgaph_curated_plugins_dir = ( $uploads_dir['basedir'].'/cga-plugin-helper' );
    
    //Checks if the required upload directory exists, and creates it if it doesn't.
    if ( !file_exists ( $cgaph_curated_plugins_dir ) && !is_dir( $cgaph_curated_plugins_dir ) ) {
        mkdir ( $cgaph_curated_plugins_dir );
    } 
    
    if ( file_exists ( $cgaph_curated_plugins_dir.'/custom-curated-plugin-list.php' ) ) {
        include ( $cgaph_curated_plugins_dir.'/custom-curated-plugin-list.php' );
}
    
else{
    include ( 'cgaph-curated-plugin-list.php' );
}
return ( $curated_plugins );
}

//This function allows the end user to select the plugins they wish to install.
//It takes the form data from $_POST and will store it in a transient if the user ticked the selection box.
function cgaph_plugin_selector() {
$plugins = cgaph_curated_plugin_list();
if ( isset ( $_POST['plugin_select'] ) ) {
    foreach ( $plugins as $each_plugin => $plugin_field ) {
        if ( $_POST[$plugin_field['id']] == '1' ) {
            $plugins[$plugin_field['id']] [ 'apply' ] = '1' ;
            }
        else {
            $plugins[$plugin_field['id']] [ 'apply' ] = '0' ;
        }
    }
    set_transient( 'plugin', $plugins, 30 * MINUTE_IN_SECONDS );
    echo '<script>window.location.href="admin.php?page=plugin-installer-main"</script>'; //Workaround for redirecting within the wp-admin page.
}
?>
<div class='wrap'>
        <h1 class='wp-heading-inline'><?php echo esc_attr( __( 'Curated Plugin List', 'cga-plugin-helper' ) ); ?></h1>
        <a class='page-title-action' href='admin.php?page=plugin-helper'><?php echo esc_attr( __( "Return to the Plugin's Homepage", 'cga-plugin-helper' ) ); ?></a>
        <hr class='wp-header-end'>
<?php
    include_once ('cgaph-plugin-form.php');
    cgaph_plugin_form( $plugins );
?>
    </div>
<?php
}
