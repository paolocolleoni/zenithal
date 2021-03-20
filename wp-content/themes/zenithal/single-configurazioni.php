<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/style/add_style.min.css?v=<?= $ver; ?>">    
</head>

<?php
                
    $colorazioni = array();
    while(have_rows('elementi') ) : the_row();
        if(get_sub_field('configurazione')=='colore'){
            $colore = get_sub_field('colore');
            $idCol = $colore->ID;
            $valCol = get_field('colore',$colore->ID);
        }
        if(get_sub_field('configurazione')=='fantasia'){
            $fantasia = get_sub_field('fantasia');
            $idCol = $fantasia->ID;
            $valCol = array();
            while( have_rows('colori_parti_fantasia') ) : the_row();
                $col = get_sub_field('colore');
                $valCol[get_sub_field('parte')] = get_field('colore',$col->ID);
            endwhile;
        }
        $colorazioni[get_sub_field('nome_elemento')] = array(
            'tipoColorazione' => get_sub_field('configurazione'),
            'idColorazione' => $idCol,
            'valoreColorazione' => $valCol
        );
    endwhile;   
    $elementi = array();
    $modello = get_field('modello');
    while( have_rows('elementi_modello',$modello->ID) ) : the_row();                
        $obj = get_sub_field('file_obj');
        $elementi[get_sub_field('nome')] = array(
            'id' => $obj['ID'],
            'nome' => get_sub_field('nome'),
            'obj' => $obj['url'],
            'tipoColorazione' => $colorazioni[get_sub_field('nome')]['tipoColorazione'],
            'idColorazione' => $colorazioni[get_sub_field('nome')]['idColorazione'],
            'valoreColorazione' => $colorazioni[get_sub_field('nome')]['valoreColorazione'],
        );
    endwhile;

?>

<?php

$x = 1;

$model = '{"elementi":{';
foreach($elementi as $el){    
    $model .= '"'.$x.'":{"id":"'.$el['id'].'","nome":"'.$el['nome'].'","obj":"'.$el['obj'].'"}';
    if($x==count($elementi)){}else{
        $model .= ',';
    }
    $x++;
}
$model .= '}}';

?>

<body <?php body_class(); ?>>
<img id="normalFabric" alt="" src="<?= get_stylesheet_directory_uri(); ?>/media/model/normalFabric.jpg" style="display:none" />
    <div class="previewWrapper">
    <textarea style="display: none;" id="model"><?= $model; ?></textarea>
    <div class="view" id="view"></div>
        <div class="previewData">
            <?= the_title(); ?>
            <div class="previewInfoBlock">
                <?= $model; ?>
            </div>
        </div>
    </div>

    <script type="module" src="<?= get_stylesheet_directory_uri(); ?>/app.js?v=<?= $ver; ?>"></script>
	<?php wp_footer(); ?>
</body>
</html>