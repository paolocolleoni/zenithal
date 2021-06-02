<?php
$ver = '0.1.0';

// Enqueue styles
function zen_theme_styles() {
    wp_enqueue_style( 'add-css',  get_template_directory_uri() .'/../zenithal/style/add_style.min.css' );
}
add_action( 'wp_enqueue_scripts', 'zen_theme_styles' );


//aree
$args = array(
    'labels'	=>	array(
        'name'                => 	'Aree prodotto',
        'all_items'           => 	'Aree',
		'menu_name'	          =>	'Aree prodotto',
		'singular_name'       =>	'Area',
		'add_new'             =>	'Nuova area',
		'add_new_item'        =>	'Nuova area',
		'edit_item'           =>	'Modifica area',
		'new_item'            =>	'Nuova area',
		'view_item'           =>	'Vedi area',
		'items_archive'       =>	'Archivio aree',
		'search_items'        =>	'Cerca aree',
		'not_found'	          =>	'Nessuna area trovata',
		'not_found_in_trash'  =>	'Nessuna area trovata nel cestino'	
	),
	'menu_icon'			  =>	'dashicons-layout',
	'supports'		=>	array( 'title', 'editor', 'author', 'revisions' ),				
	'menu_position'	=>	5,
	'public'		=>	true
);
register_post_type( 'aree', $args );


//colori
$args = array(
    'labels'	=>	array(
        'name'                => 	'Colori',
        'all_items'           => 	'Colori',
		'menu_name'	          =>	'Colori',
		'singular_name'       =>	'Colore',
		'add_new'             =>	'Nuovo colore',
		'add_new_item'        =>	'Nuovo colore',
		'edit_item'           =>	'Modifica colore',
		'new_item'            =>	'Nuovo colore',
		'view_item'           =>	'Vedi colore',
		'items_archive'       =>	'Archivio colori',
		'search_items'        =>	'Cerca colori',
		'not_found'	          =>	'Nessun colore trovato',
		'not_found_in_trash'  =>	'Nessun colore trovato nel cestino'	
	),
	'menu_icon'			  =>	'dashicons-art',
	'supports'		=>	array( 'title', 'editor', 'author', 'revisions' ),				
	'menu_position'	=>	5,
	'public'		=>	true
);
register_post_type( 'colori', $args );

//fantasie
$args = array(
    'labels'	=>	array(
		'name'                => 	'Fantasie',
		'all_items'           => 	'Fantasie',
		'menu_name'           =>	'Fantasie',
		'singular_name'       =>	'Fantasia',
		'add_new'             =>	'Nuova fantasia',
		'add_new_item'        =>	'Nuova fantasia',
	 	'edit_item'           =>	'Modifica fantasia',
	 	'new_item'            =>	'Nuova fantasia',
	 	'view_item'           =>	'Guarda fantasia',
	 	'items_archive'       =>	'Archivio fantasis',
	 	'search_items'        =>	'Cera fantasia',
	 	'not_found'	          =>	'Nessuna fantasia trovata',
	 	'not_found_in_trash'  =>    'Nessuna fantasia trovata nel cestino'
	),
	'menu_icon'			  =>	'dashicons-art',
	'supports'		=>	array( 'title', 'editor', 'author', 'revisions' ),				
	'menu_position'	=>	5,
	'public'		=>	true
);
register_post_type( 'fantasie', $args );


add_filter('show_admin_bar', '__return_false');