<?php
/**
 * Libro CPT Module Handler - bootstrap file for the module.
 *
 * @package     PCianes\Module\Libro
 * @since       1.0.0
 * @author      Pablo Cianes
 * @link        https://pablocianes.com
 * @license     GNU-2.0+
 */
namespace PCianes\Module\Libro;
use PCianes\Module\Custom as CustomModule;

define( 'LIBRO_MODULE_TEXT_DOMAIN', MU_CUSTOM_TEXT_DOMAIN );
define( 'LIBRO_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_runtime_config', __NAMESPACE__ . '\register_libro_custom_configs' );
add_filter( 'add_custom_taxonomy_runtime_config', __NAMESPACE__ . '\register_libro_custom_configs' );
/**
 * Loading in the post type and taxonomy runtime configurations with
 * the Custom Module.
 *
 * @since 1.0.0
 *
 * @param array $configurations Array of all the configurations.
 *
 * @return $configurations
 */
function register_libro_custom_configs( array $configurations ){
	$doing_post_type = current_filter() == 'add_custom_post_type_runtime_config';
	$filename = $doing_post_type
		? 'post-type'
		: 'taxonomy';
	$runtime_config = (array) require( LIBRO_MODULE_DIR . 'config/' . $filename . '.php' );
	if( !$runtime_config ){
		return $configurations;
	}
	$key = $doing_post_type
		? $runtime_config['post_type']
		: $runtime_config['taxonomy'];
	$configurations[ $key] = $runtime_config;
	return $configurations;
}

add_filter( 'add_custom_taxonomy_runtime_config', __NAMESPACE__ . '\register_precio_custom_configs' );

/**
 * Loading in the post type and EXTRA taxonomy runtime configurations with
 * the Custom Module.
 *
 * @since 1.0.0
 *
 * @param array $configurations Array of all the configurations.
 *
 * @return $configurations
 */
function register_precio_custom_configs( array $configurations ){

	$runtime_config = (array) require( LIBRO_MODULE_DIR . 'config/precio.php' );

	$configurations[ $runtime_config['taxonomy']] = $runtime_config;
	
	return $configurations;
}