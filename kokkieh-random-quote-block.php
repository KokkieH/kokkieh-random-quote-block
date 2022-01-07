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
 * Text Domain:       pdev
 * Domain Path:       /public/lang
 */

function kokkieh_hello_world () {
    echo 'Hello World!';
}

add_filter( 'the_content', 'kokkieh_hello_world');