<?php
/**
 * Runtime configuration for the LIBRO custom post type.
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
	* The post type name.
	*====================================================*/
	'post_type'	=> 'libro',
	/**================================================
	* These are label configuration.
	*====================================================*/
	'labels'	=> array(
		'custom_type'		 => 'libro',
		'singular_label' 	 => 'Libro',
		'plural_label'	 	 => 'Libros',
		'in_sentence_label'	 => 'libros',
		'text_domain'	 	 => LIBRO_MODULE_TEXT_DOMAIN,
	),
	/**================================================
	* Supported features por this post type.
	*====================================================*/
	'features'	=> array(
		'base_post_type'		=> 'post',
		'exclude'				=> array(
			'excerpt',
			'comments',
			'trackbacks',
			'custom-fields',
	//		'thumbnail',
		),
		'additional'			=> array(
			'page-attributes',
		),
	),
	/**================================================
	* Registration arguments.
	*====================================================*/
	'args'		=> array(
		'label'					=> __( 'Libros', LIBRO_MODULE_TEXT_DOMAIN ),
		'description'           => __( 'CPT de muestra libros', LIBRO_MODULE_TEXT_DOMAIN ),
		'labels'                => '', // automatically generate the labels.
		'supports'              => '', // automatically generate the support features.
	//	'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-book',
		'rewrite'				=> array( 'with_front' => false),	
	),
);