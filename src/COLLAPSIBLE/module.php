<?php
/**
 * Collapsible shortcode Module Handler - bootstrap file for the module.
 *
 * @package     PCianes\Module\Collapsible
 * @since       1.0.0
 * @author      Pablo Cianes
 * @link        https://pablocianes.com
 * @license     GNU-2.0+
 */
namespace PCianes\Module\Collapsible;
use PCianes\Module\Custom as CustomModule;

define( 'COLLAPSIBLE_MODULE_DIR', __DIR__ );

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup_module' );
/**
 * Setup the module.
 *
 * @since 1.3.0
 *
 * @return void
 */
function setup_module() {
	foreach( array( 'teaser' ) as $shortcode ) {
		$pathto_configuration_file = sprintf( '%s/config/%s.php',
			COLLAPSIBLE_MODULE_DIR,
			$shortcode
		);
		CustomModule\register_shortcode( $pathto_configuration_file );
	}
}