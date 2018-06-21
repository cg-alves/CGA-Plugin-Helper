<?php

function cgaph_install_done() {
    include ( './includes/class-wp-upgrader.php' );
    include_once ( './includes/class-plugin-upgrader.php' );
    ?>
        <div class='wrap'>
            <h1><?php echo esc_attr( __( 'Installation finished', 'cga-plugin-helper' ) ); ?></h1>
            <br />
            <br />
            <h1 style='text-align:center'><?php echo esc_attr( __( 'The function has ended.', 'cga-plugin-helper' ) ); ?></h1>
            <br />
            <form style='text-align:center'>
                <a class='button' style='text-align:center' href='index.php'><?php echo esc_attr( __( 'Dashboard', 'cga-plugin-helper' ) ); ?></a>
                <a class='button' style='text-align:center' href='plugins.php'><?php echo esc_attr( __( 'Plugins page', 'cga-plugin-helper' ) ); ?></a>
                <a class='button' style='text-align:center' href='admin.php?page=plugin-helper'><?php echo esc_attr( __( 'Main Menu', 'cga-plugin-helper' ) ); ?></a>
            </form>
        </div>
    <?php
}
