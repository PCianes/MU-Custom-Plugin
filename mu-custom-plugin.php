<?php
/**
 * MU Custom plugin
 *
 * @package     	PCianes\MUCustom
 * @author      	Pablo Cianes
 * @license     	GPL-2.0+
 * @link 			https://pablocianes.com
 *
 * @wordpress-plugin
 * Plugin Name: 	MU Custom plugin
 * Plugin URI:  	https://github.com/PCianes/MU-Custom-plugin
 * Description: 	MU Custom plugin is a WordPress Plugin for development.
 * Version:     	1.0.0
 * Author:      	Pablo Cianes
 * Author URI:  	https://pablocianes.com
 * Text Domain: 	mu-custom
 * Requires WP:		4.8
 * Requires PHP:	5.5
 * License:     	GPL-2.0+
 * License URI: 	http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * MU Custom plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * 
 * MU Custom plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Collapsible content plugin. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
 *
 */

namespace PCianes\MUCustom;

use PCianes\Module\Custom as CustomModule;

if ( ! defined( 'ABSPATH' ) ) {
	die( "Oh, silly, there's nothing to see here." );
}

define( 'MU_CUSTOM_PLUGIN', __FILE__ );
define( 'MU_CUSTOM_DIR', trailingslashit(__DIR__) );

$plugin_url = plugin_dir_url( __FILE__ );

if ( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}

define( 'MU_CUSTOM_URL', $plugin_url );
define( 'MU_CUSTOM_TEXT_DOMAIN', 'mu-custom' );


//add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

/**
 * Enqueue the plugin assets (scripts and styles)
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	wp_enqueue_style('dashicons');
	wp_enqueue_script(
		'mu-custom-plugin-script', 
		COLLAPSIBLE_CONTENT_URL . 'assets/js/jquery.project.min.js',
		array('jquery'),
		'1.0.0',
		true
	);

}

/**
 * Autoload plugin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {

	$files = array(
		'custom/module.php',
	//	'faq/module.php',
	);

	foreach( $files as $file ){	
		include( MU_CUSTOM_DIR . 'src/'. $file);
	}

}

autoload();

CustomModule\register_plugin( __FILE__ );
