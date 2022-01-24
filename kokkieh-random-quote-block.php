<?php
/**
 * Plugin Name:       Random quote block
 * Plugin URI:        https://github.com/KokkieH/random-quote-block
 * Description:       Gutenberg block that displays a random quote
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      5.6
 * Author:            Herman Kok
 * Author URI:        https://kokkieh.blog/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kokkieh-random-quote-block
 * Domain Path:       /public/lang
 */

function kokkieh_hello_world () {
    echo 'Hello World!';
}

add_filter( 'the_content', 'kokkieh_hello_world');

add_action( 'admin_menu' , 'kokkieh_create_menu' );

function kokkieh_create_menu() {

    add_options_page( 'Random Quote Settings',
        'Random Quote Block',
        'manage_options',
        'kokkieh_quote_settings',
        'kokkieh_quote_settings_page',
     );
}

function kokkieh_quote_settings_page() {
    ?>
    <div class="wrap">
        <h2>Random Quote Block</h2>
        <form action="options.php" method="POST">
        </form>
    </div>
    <?php
}

