<?php
$ver = '0.1.0';


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