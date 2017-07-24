<?php
/**
 * Runtime configuration for the Generos taxonomy
 *
 * @package     PCianes\Module\Libro
 * @since       1.0.0
 * @author      Pablo Cianes
 * @link        https://pablocianes.com
 * @license     GNU-2.0+
 */
namespace PCianes\Module\Libro;
return array(
	/**================================================
	* The taxonomy name.
	*====================================================*/
	'taxonomy'	=> 'precio',
	/**================================================
	* These are label configuration.
	*====================================================*/
	'labels'	=> array(
		'custom_type'		 => 'precio',
		'singular_label' 	 => 'Precio',
		'plural_label'	 	 => 'Precios',
		'in_sentence_label'	 => 'precios',
		'text_domain'	 	 => LIBRO_MODULE_TEXT_DOMAIN,
		'specific_labels'	 => array(),
	),
	/**================================================
	* These are the arguments for registering the taxonomy.
	*====================================================*/
	'args'		=> array(
		'label'             => __( 'Precios', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'            => '', // automatically generate the labels.
		'hierarchical'      => true,
		'show_admin_column' => true,
		'public'            => true,
		'show_ui'           => true,
	//	'rewrite'			=> array( 'with_front' => false),
	),
	/**================================================
	* These are the post types to bind the taxonomy to.
	*====================================================*/
	'post_types'			=> array( 'libro' ),
);