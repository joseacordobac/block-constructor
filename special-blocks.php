<?php
/**
 * Plugin Name:       block constructor
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       special-blocks
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'BUILD_PATH', __DIR__ . '/build' );
define( 'BUILD_URL', plugins_url( 'build', __FILE__ ) );

require_once plugin_dir_path(__FILE__) . 'utilities/register.php';
require_once plugin_dir_path(__FILE__) . 'includes/register.php';
require_once plugin_dir_path(__FILE__) . 'admin/index.php';
require_once plugin_dir_path(__FILE__) . 'API/src/config.php';
require_once plugin_dir_path(__FILE__) . 'db/registerdb.php';

