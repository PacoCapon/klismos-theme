<?php
/**
 * The front-page.php
 *
 * @package ShopIsle
 */

get_header();
/* Wrapper start */

echo '<div class="main">';
$big_title = get_template_directory() . '/inc/sections/shop_isle_big_title_section.php';
load_template( apply_filters( 'shop-isle-subheader', $big_title ) );

/* Wrapper start */
$shop_isle_bg = get_theme_mod( 'background_color' );

if ( isset( $shop_isle_bg ) && $shop_isle_bg != '' ) {
	echo '<div class="main front-page-main" style="background-color: #' . $shop_isle_bg . '">';
} else {

	echo '<div class="main front-page-main" style="background-color: #FFF">';

}

if ( defined( 'WCCM_VERISON' ) ) {

	/* Woocommerce compare list plugin */
	echo '<section class="module-small wccm-frontpage-compare-list">';
	echo '<div class="container">';
	do_action( 'shop_isle_wccm_compare_list' );
	echo '</div>';
	echo '</section>';

}
?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 description">
			<?php echo get_the_content(); ?>
		</div>
	</div>
</div>

<?php
/******* Categories Section */
$orderby = 'date';
$order = 'desc';
$hide_empty = true;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
 
if( !empty($product_categories) ){
		echo '<div class="container" id="categories"><div class="row"><div class="category-home-list">';
		echo '<h2 class="module-title font-alt product-banners-title">Productos</h2>';
    foreach ($product_categories as $key => $category) {
		echo '<div class="col-md-3 col-sm-6 col-xs-6"><div class="link">';
        echo '<a href="'.get_term_link($category).'" >';
		switch ($category->slug) {
			case 'iluminacion':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/005-lampara.png' alt='".$category->name."' title=".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDiluminacion.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			case 'mesas':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/003-mesa.png' alt='".$category->name."' title='".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDmesa.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			case 'sillas':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/001-silla.png' alt='".$category->name."' title='".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDsilla.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			case 'sillones':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/004-sillon.png' alt='".$category->name."' title='".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDsillon.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			case 'sofas':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/006-sofa.png' alt='".$category->name."' title='".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDsofa.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			case 'almacenaje':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/guardarropa.png' alt='".$category->name."' title='".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDguardarropa.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			case 'plantas':
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/planta-en-maceta.png' alt='".$category->name."' title='".$category->name."'/>";
				echo "<img src='".get_template_directory_uri()."/assets/images/icons/REDplantas.png' alt='".$category->name."' title=".$category->name."' class='red-image'/>";
				break;
			default:
				break;
		}
        echo '<p>'.$category->name.'</p>';
        echo '</a>';
        echo '</div></div>';
    }
    echo '</div></div></div>';
}


/******  Banners Section */
?>
<!-- <div class="container banner-section">
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=12&l=ez&f=ifr&linkID=09079a3550d74ecf877c4c730cb902c0&t=klismos-21&tracking_id=klismos-21" width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
		</div>
		<div class="col-md-4 col-sm-6 hidden-xs">
			<iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=12&l=ez&f=ifr&linkID=09079a3550d74ecf877c4c730cb902c0&t=klismos-21&tracking_id=klismos-21" width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
		</div>
		<div class="col-md-4 hidden-sm hidden-xs">
			<iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=12&l=ez&f=ifr&linkID=09079a3550d74ecf877c4c730cb902c0&t=klismos-21&tracking_id=klismos-21" width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
		</div>
	</div>
</div> -->
<?php
// $banners_section = get_template_directory() . '/inc/sections/shop_isle_banners_section.php';
// require_once( $banners_section );



/******* Products Section */
$latest_products = get_template_directory() . '/inc/sections/shop_isle_products_section.php';
require_once( $latest_products );

/******* Video Section */
$video = get_template_directory() . '/inc/sections/shop_isle_video_section.php';
require_once( $video );

/******* Products Slider Section */
$products_slider = get_template_directory() . '/inc/sections/shop_isle_products_slider_section.php';
require_once( $products_slider );

?>
<div class="container banner-amazon-section">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 hidden-sm hidden-xs">
			<iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=48&l=ur1&category=esdiscover&banner=0FF5QYK2QVJB1N12VJR2&f=ifr&linkID=aa82ec22fffc3915afa96659e1ce2a2f&t=klismos-21&tracking_id=klismos-21" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>	
		</div>
		<div class="col-xs-12 hidden-md hidden-lg">
			<iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=12&l=ur1&category=esdiscover&banner=0WAZQVJ6KEQ4SMWVHHR2&f=ifr&linkID=75e9212ceac4b3e866b9c04f5cb03aba&t=klismos-21&tracking_id=klismos-21" width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
		</div>
	</div>
</div>
<?php


get_footer();

