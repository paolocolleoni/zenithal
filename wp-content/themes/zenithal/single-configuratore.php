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
$model = '{"elementi":{';
while( have_rows('elementi_modello') ) : the_row();
    $obj = get_sub_field('file_obj');
    $model .= '"'.get_row_index().'":{"id":"'.$obj['ID'].'","nome":"'.get_sub_field('nome').'","obj":"'.$obj['url'].'"}';
    if(get_row_index()==count(get_field('elementi_modello'))){}else{
        $model .= ',';
    }
endwhile;
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
                <?php while( have_rows('elementi_modello') ) : the_row(); ?>
                    <?= get_sub_field('nome'); ?><br />
                <?php endwhile ?>
            </div>
        </div>
    </div>

    <script type="module" src="<?= get_stylesheet_directory_uri(); ?>/app.js?v=<?= $ver; ?>"></script>
	<?php wp_footer(); ?>
</body>
</html>