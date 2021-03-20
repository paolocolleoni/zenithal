<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/style/add_style.min.css">    

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="previewWrapper">
        <?php while( have_rows('parti') ) : the_row(); ?>
            <?php $image = get_sub_field('immagine'); ?>
            <div class="previewParteFantasia" style="-webkit-mask-image: url('<?= $image['url']; ?>'); background-color: <?= get_field('colore',get_sub_field('colore_principale')); ?>;"></div>
        <?php endwhile ?>
        <div class="previewData">
            <?= the_title(); ?>
            <div class="previewInfoBlock">
                <?php while( have_rows('parti') ) : the_row(); ?>
                    <?= get_sub_field('nome').": ".get_the_title(get_sub_field('colore_principale'))." <span style='color: ".get_field('colore',get_sub_field('colore_principale'))."'>[".get_field('colore',get_sub_field('colore_principale'))."]</span>"; ?><br />
                <?php endwhile ?>
            </div>
        </div>
    </div>
	<?php wp_footer(); ?>
</body>
</html>