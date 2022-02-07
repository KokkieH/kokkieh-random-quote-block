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

// // testing that plugin works
// function kokkieh_hello_world () {
//     echo 'Hello World!';
// }

// add_filter( 'the_content', 'kokkieh_hello_world');

// Add Settings page
add_action( 'admin_menu' , 'kokkieh_quote_create_menu' );

add_action( 'admin_init' , 'kokkieh_quote_register_settings');

const SETTINGS_SECTION = 'kokkieh_quote_main';
const PAGE_SLUG = 'kokkieh_random_quote_block';

// Create Settings menu item
function kokkieh_quote_create_menu() {

    add_options_page( 'Random Quote Block Settings',
        'Random Quote Block',
        'manage_options',
        PAGE_SLUG,
        'kokkieh_quote_settings_page',
     );
}

// Create Settings page
function kokkieh_quote_settings_page() {
    ?>
    <div class="wrap">
        <h2>Random Quote Block</h2>
        <form action="options.php" method="POST">
            <?php
    
            settings_fields( PAGE_SLUG );
            do_settings_sections( PAGE_SLUG );
            submit_button ( 'Save Changes', 'primary' );

            ?>
        </form>
    </div>
    <?php
}

// Add settings to page
function kokkieh_quote_register_settings() {
    add_settings_section(
        SETTINGS_SECTION,
        'API Credentials',
        'kokkieh_quote_section_text',
        PAGE_SLUG
    );
    add_settings_field(
        'kokkieh_quote_username',
        __( 'Username', 'kokkieh-random-quote-block'),
        'kokkieh_quote_render_username',
        PAGE_SLUG,
        SETTINGS_SECTION
    );
    add_settings_field(
        'kokkieh_quote_api_key',
        __( 'API Key', 'kokkieh-random-quote-block'),
        'kokkieh_quote_render_api_key',
        PAGE_SLUG,
        SETTINGS_SECTION
    );

    register_setting( PAGE_SLUG, 'kokkieh_quote_username');
    register_setting( PAGE_SLUG, 'kokkieh_quote_api_key');
}

function kokkieh_quote_section_text() {
    echo '<p>Abbreviations.com API Credentials</p>';
}

function kokkieh_quote_render_username() {
    $options = get_option( 'kokkieh_quote_username' );
    $name = $options[ 'name' ];
    echo "<input id='name' name='kokkieh_quote_username[name]'
        type='text' value='" . esc_attr( $name ) . "'/>";
}

function kokkieh_quote_render_api_key() {
    $options = get_option( 'kokkieh_quote_api_key' );
    $name = $options[ 'name' ];
    echo "<input id='name' name='kokkieh_quote_api_key[name]'
        type='text' value='" . esc_attr( $name ) . "'/>";
}