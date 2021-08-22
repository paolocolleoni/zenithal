<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);


// GET ALL AREAS
$aree = array();
while ( have_rows('viste') ) : the_row();

	$areeSection = get_sub_field('aree');
	$prodAree = $areeSection['lista_aree'];

	for($x=0; $x<count($prodAree); $x++){
		$aree[] = $prodAree[$x]['area']->ID;
	}

endwhile;

$aree = array_unique($aree);

?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?> " data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">

<?php while ( have_rows('viste') ) : the_row(); ?>
    <?php
        $dati =  get_sub_field('dati');
        $base = $dati['base'];
        $ombre_luci = $dati['ombre__luci'];
    ?>
    <div class="zen_imageWrapper zen_vista-<?= $dati['nome']; ?>">
        <img alt="zen" class="zen_img zen_base" src="<?= $base['url']; ?>" />

		<?php		
			$areeSection = get_sub_field('aree');
			$prodAree = $areeSection['lista_aree'];
			for($x=0; $x<count($prodAree); $x++){

				$img = $prodAree[$x]['immagine'];
		?>
			<div class="zen_area" style="-webkit-mask-image: url('<?= $img['url']; ?>');  mask-image: url('<?= $img['url']; ?>');">
				<?php
					$colorazione = $prodAree[$x]['colorazione'];
					$col = array();		
					for($n=0; $n<count($colorazione); $n++){
						$col[$colorazione[$n]['parte']] = get_field('colore',$colorazione[$n]['colore_parte']);
					}
					
					$fpN = 1;
					while ( have_rows('parti',$prodAree[$x]['fantasia']->ID) ) : the_row();
					$img = get_sub_field('immagine');
				?>
					<div class="zen_parte_fant <?= sanitize_title($prodAree[$x]['area']->post_title); ?>-<?= sanitize_title(get_sub_field('nome')); ?>" style="-webkit-mask-image: url('<?= $img['url']; ?>');  mask-image: url('<?= $img['url']; ?>'); background-color: <?= $col['0'.$fpN]; ?>"></div>
				<?php
					$fpN++;
					endwhile;
				?>
			</div>
		<?php
			}
		?>

        <img alt="zen" class="zen_img zen_ombre_luci" src="<?= $ombre_luci['url']; ?>" />
    </div>
<?php endwhile; ?>
	<!-- <figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $product->get_image_id() ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure> -->
	<div class="zen_menu_viste">
		<?php while ( have_rows('viste') ) : the_row(); ?>
		<?php $datiSection = get_sub_field('dati'); ?>
			<div class="zen_btn_vista zen_btn_vista-<?= $datiSection['nome']; ?>" onclick="zenChangeVita('<?= $datiSection['nome']; ?>')">
				<?= $datiSection['nome']; ?>
			</div>
		<?php endwhile; ?>
	</div>

	<div style="position: fixed; top: 10px; left: 10px; width: 1px; height: 1px; overflow: hidden; background-color: #fff; border: 1px solid rgba(0,0,0,0.2); font-size: .7rem; z-index: 99999; pointer-events: none; opacity: 0;">
	<!-- <div style="position: fixed; top: 10px; left: 10px; width: 500px; height: 600px; overflow: auto; background-color: #fff; border: 1px solid rgba(0,0,0,0.2); font-size: .7rem; z-index: 99999; "> -->

		<?php
			$combination = array();

			while ( have_rows('viste') ) : the_row();	
				$dati =  get_sub_field('dati');
				$areeSection = get_sub_field('aree');
				$prodAree = $areeSection['lista_aree'];

				$aree = array();

				for($x=0; $x<count($prodAree); $x++){
					$areaTitle = $prodAree[$x]['area']->post_name;
					$fantTitle = $prodAree[$x]['fantasia']->post_name;
					
					$colorazione = $prodAree[$x]['colorazione'];
					$col = array();		
					for($n=0; $n<count($colorazione); $n++){
						$col[$colorazione[$n]['parte']] = get_field('colore',$colorazione[$n]['colore_parte']);
					}
					
					$fpN = 1;

					$parti = array();

					while ( have_rows('parti',$prodAree[$x]['fantasia']->ID) ) : the_row();

						$parte = sanitize_title(get_sub_field('nome'));

						$parti[$parte] = $col['0'.$fpN];
						$fpN++;
					endwhile;										
										
					$aree[$areaTitle][$fantTitle] = $parti;

				}

				$vista = array(
					'nome' => $dati['nome'],
					'aree' => $aree,
				);
				$combination[] = $vista;
			endwhile;
			echo "<input type='hidden' id='initValues' value='".json_encode($combination)."' />";			
		?>

		<?php

			$RAaree = array();
			$RAparti = array();
			$RAcolori = array();

			while ( have_rows('viste') ) : the_row();
				$datiSection = get_sub_field('dati');
				$areeSection = get_sub_field('aree');
				$prodAree = $areeSection['lista_aree'];

				for($x=0; $x<count($prodAree); $x++){

					$area = $prodAree[$x]['area']->post_name;					

					$coloriDisponibili = $prodAree[$x]['colori_disponibili'];

					$RAaree[] = $area;

					while ( have_rows('parti',$prodAree[$x]['fantasia']->ID) ) : the_row();
						$parte = sanitize_title(get_sub_field('nome'));
						$RAparte = array(
							'area' => $area,
							'nome' => $parte,
						);
						$RAparti[] = $RAparte;

						for($sx=0; $sx<count($coloriDisponibili); $sx++){					

							$init = 0;
							for($n=0; $n<count($prodAree[$x]['colorazione']); $n++){
								if(sanitize_title($prodAree[$x]['colorazione'][$n]['parte'])==$parte && $prodAree[$x]['colorazione'][$n]['colore_parte']->ID==$coloriDisponibili[$sx]->ID){
									$init = 1;
								}							
							}
							$colore = array(
								'area' => $area,
								'parte' => $parte,
								'ID' => $coloriDisponibili[$sx]->ID,
								'hex' => get_field('colore',$coloriDisponibili[$sx]),
								'init' => $init,
							);
							$RAcolori[] = $colore;
						}

					endwhile;

					


					
				}
			endwhile;

			$RAaree = array_unique($RAaree);
			$RAparti = array_map("unserialize", array_unique(array_map("serialize", $RAparti)));
			$RAcolori = array_map("unserialize", array_unique(array_map("serialize", $RAcolori)));
		?>
	</div>


	
	<div class="zen_tool">

		<div class="zen_tool_section zen_tool_aree">
			<?php for($x=0; $x<count($RAaree); $x++){ ?>
				<div class="zen_tool_tasto <?= $RAaree[$x] ?>" onclick="selectArea('<?= $RAaree[$x] ?>');">
					<?= $RAaree[$x]; ?>
				</div>
			<?php } ?>
			<div style="clear: both;"></div>
		</div>

		<div class="zen_tool_section zen_tool_parti">			
			<?php for($x=0; $x<count($RAparti); $x++){ ?>
				<div class="zen_tool_tasto <?= $RAparti[$x]['area'] ?> <?= $RAparti[$x]['area'] ?>-<?= $RAparti[$x]['nome'] ?>" onclick="selectParte('<?= $RAparti[$x]['area'] ?>-<?= $RAparti[$x]['nome'] ?>');">
					<?= __('Colore','zen'); ?> <?= $RAparti[$x]['nome']; ?>
				</div>
			<?php } ?>
			<div style="clear: both;"></div>
		</div>

		<div class="zen_tool_section zen_tool_colori" id="dts">
			<?php for($x=0; $x<count($RAcolori); $x++){ ?>
				<div class="zen_tool_tasto <?php if($RAcolori[$x]['init']==1){ ?>selected<?php } ?> <?= $RAcolori[$x]['area'] ?>-<?= $RAcolori[$x]['parte'] ?> <?= $RAcolori[$x]['area'] ?>-<?= $RAcolori[$x]['parte'] ?>-<?= $RAcolori[$x]['ID'] ?>" style="background-color: <?= $RAcolori[$x]['hex']; ?>;" onclick="selectColor('<?= $RAcolori[$x]['area'] ?>-<?= $RAcolori[$x]['parte'] ?>','<?= $RAcolori[$x]['ID'] ?>','<?= $RAcolori[$x]['hex'] ?>');">
				</div>
			<?php } ?>
			<div style="clear: both;"></div>
		</div>

	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>


function selectArea(area){
	$('.zen_tool_aree .zen_tool_tasto').removeClass('selected');
	$('.zen_tool_aree .zen_tool_tasto.'+area).addClass('selected');

	$('.zen_tool_parti .zen_tool_tasto').hide();
	$('.zen_tool_parti .zen_tool_tasto.'+area).show();

	$('.zen_tool_parti .zen_tool_tasto:visible').first()[0].onclick();
}


function selectParte(parte){
	$('.zen_tool_parti .zen_tool_tasto').removeClass('selected');
	$('.zen_tool_parti .zen_tool_tasto.'+parte).addClass('selected');

	$('.zen_tool_colori .zen_tool_tasto').hide();
	$('.zen_tool_colori .zen_tool_tasto.'+parte).show();
}


function selectColor(classe,idColore,hex){
	$('.zen_tool_colori .zen_tool_tasto.'+classe).removeClass('selected');
	$('.zen_tool_colori .zen_tool_tasto.'+classe+'-'+idColore).addClass('selected');

	$('.zen_parte_fant.'+classe).css('background-color',hex);

	var initValues = JSON.parse($('#initValues').val());

	var spVal = myArr = classe.split("-");
	var area = spVal[0];
	var parte = spVal[1];

	<?php
		$nArea = 0;	
		while ( have_rows('viste') ) : the_row();

			for($x=0; $x<count($prodAree); $x++){

				$areeSection = get_sub_field('aree');
				$prodAree = $areeSection['lista_aree'];
				$fantTitle = $prodAree[$x]['fantasia']->post_name;
				// $area = $prodAree[$x]['area']->post_name;
				?>
					initValues[<?= $nArea; ?>]['aree'][area]['<?= $fantTitle; ?>'][parte] = hex;
				<?php

			}
		$nArea++;
		endwhile;
	?>

	$('#initValues').val(JSON.stringify(initValues));
	$('#personalizzazione').val(JSON.stringify(initValues));

}


zenChangeVita('Fronte');
$('.zen_tool_aree .zen_tool_tasto:visible').first()[0].onclick();


function zenChangeVita(toShow){
	$('.zen_btn_vista').removeClass('active');
	$('.zen_btn_vista-'+toShow).addClass('active');
	$('.zen_imageWrapper').removeClass('active');
	$('.zen_vista-'+toShow).addClass('active');
}


// Drag to scroll
const ele = document.getElementById('dts');

let pos = { top: 0, left: 0, x: 0, y: 0 };

const mouseDownHandler = function(e) {
    ele.style.cursor = 'grabbing';
    ele.style.userSelect = 'none';
    pos = {
        // The current scroll 
        left: ele.scrollLeft,
        top: ele.scrollTop,
        // Get the current mouse position
        x: e.clientX,
        y: e.clientY,
    };

    document.addEventListener('mousemove', mouseMoveHandler);
    document.addEventListener('mouseup', mouseUpHandler);
};
const mouseMoveHandler = function(e) {
    // How far the mouse has been moved
    const dx = e.clientX - pos.x;
    const dy = e.clientY - pos.y;

    // Scroll the element
    ele.scrollTop = pos.top - dy;
    ele.scrollLeft = pos.left - dx;
};
const mouseUpHandler = function() {
    document.removeEventListener('mousemove', mouseMoveHandler);
    document.removeEventListener('mouseup', mouseUpHandler);
    ele.style.cursor = 'grab';
    ele.style.removeProperty('user-select');
};
ele.addEventListener('mousedown', mouseDownHandler);


$( document ).ready(function() {
	var initVal = $('#initValues').val();
	$('#personalizzazione').val(initVal);
});
</script>
