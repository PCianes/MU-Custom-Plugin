<?php
/**
 * Custom label Handler for post type and taxonomy
 *
 *
 * @package     PCianes\Module\Custom
 * @since       1.0.0
 * @author      Pablo Cianes
 * @link        https://pablocianes.com
 * @license     GNU-2.0+
 */
namespace PCianes\Module\Custom;

/**
 * Generate the labels for either a taxonomy or post type.
 *
 * @since 1.0.0
 *
 * @param array $config Array of runtime configuration parameters.
 * @param string $custom_type 'taxonomy' or 'post type'
 *
 * @return array
 */
function generate_the_custom_labels( array $config, $custom_type = 'post type' ) {

	$config = array_merge(
		array(
			'custom_type'       => '',
			'singular_label'    => '',
			'plural_label'      => '',
			'in_sentence_label' => '',
			'text_domain'       => '',
			'specific_labels'   => array(),
		),
		$config
	);
	// Shared labels
	$labels = array(
		'name'              => _x(
			$config['plural_label'],
			$custom_type . ' general name',
			$config['text_domain']
		),
		'singular_name'     => _x(
			$config['singular_label'],
			$custom_type . ' singular name',
			$config['text_domain']
		),
		'menu_name'         => _x( $config['plural_label'], 'admin menu', $config['text_domain'] ),
		'add_new_item'      => __( 'Añadir nuevo ' . $config['singular_label'], $config['text_domain'] ),
		'edit_item'         => __( 'Editar ' . $config['singular_label'], $config['text_domain'] ),
		'view_item'         => __( 'Ver ' . $config['singular_label'], $config['text_domain'] ),
		'search_items'      => __( 'Buscar ' . $config['plural_label'], $config['text_domain'] ),
		'parent_item_colon' => __( 'Elemento superior de ' . $config['singular_label'] . ':', $config['text_domain'] ),
		'not_found'         => __( 'No hay ' . $config['in_sentence_label'] . ' aquí.', $config['text_domain'] ),
	);
	$custom_type_generator = __NAMESPACE__;
	$custom_type_generator .= $custom_type == 'taxonomy'
		? '\generate_custom_labels_for_taxonomy'
		: '\generate_custom_labels_for_post_type';
	$labels = array_merge(
		$labels,
		$custom_type_generator( $config )
	);
	if ( $config['specific_labels'] ) {
		$labels = array_merge(
			$labels,
			$config['specific_labels']
		);
	}
	return $labels;
}
/**
 * Generate the specific custom labels for the taxonomy.
 *
 * @since 1.3.0
 *
 * @param array $config Array of configuration parameters.
 *
 * @return array
 */
function generate_custom_labels_for_taxonomy( array $config ) {
	return array(
		'popular_items'              => __( 'Top ' . $config['plural_label'], $config['text_domain'] ),
		'all_items'                  => __( 'Todos los ' . $config['plural_label'], $config['text_domain'] ),
		'parent_item'                => __( 'Padre de ' . $config['singular_label'], $config['text_domain'] ),
		'update_item'                => __( 'Actualizar ' . $config['singular_label'], $config['text_domain'] ),
		'new_item_name'              => __( 'Nuevo ' . $config['singular_label'] . ' Name', $config['text_domain'] ),
		'separate_items_with_commas' => __(
			'Separar ' . $config['in_sentence_label'] . ' con comas',
			$config['text_domain'] ),
		'add_or_remove_items'        => __(
			'Añadir o borrar ' . $config['in_sentence_label'],
			$config['text_domain']
		),
		'choose_from_most_used'      => __(
			'Elige entre los ' . $config['in_sentence_label'] .' más usados',
			$config['text_domain'] ),
	);
}
/**
 * Generate the specific custom labels for the post type.
 *
 * @since 1.3.0
 *
 * @param array $config Array of configuration parameters.
 *
 * @return array
 */
function generate_custom_labels_for_post_type( array $config ) {
	return array(
		'name_admin_bar'        => _x(
			$config['singular_label'], 'add new on admin bar',
			$config['text_domain']
		),
		'add_new'               => _x( 'Añadir nuevo', $config['custom_type'], $config['text_domain'] ),
		'new_item'              => __( 'Nuevo ' . $config['singular_label'], $config['text_domain'] ),
		'view_items'            => __( 'Ver ' . $config['plural_label'], $config['text_domain'] ),
		'all_items'             => __( 'Todos los ' . $config['plural_label'], $config['text_domain'] ),
		'not_found_in_trash'    => __(
			'No hay' . $config['in_sentence_label'] . ' en la papelera.',
			$config['text_domain'] ),
		'archives'              => __( $config['plural_label'] . ' - Archivo', $config['text_domain'] ),
		'attributes'            => __( $config['plural_label'] . ' - Atributos', $config['text_domain'] ),
		'insert_into_new_item'  => __(
			'Insertar en' . $config['in_sentence_label'] . '.',
			$config['text_domain']
		),
		'uploaded_to_this_item' => __(
			'Subir a ' . $config['in_sentence_label'] . '.',
			$config['text_domain'] ),
	);
}