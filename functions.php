<?php
/**
 * Main functions file
 *
 * @package WordPress
 * @subpackage Shop Isle
 */
$vendor_file = trailingslashit( get_template_directory() ) . 'vendor/autoload.php';
if ( is_readable( $vendor_file ) ) {
	require_once $vendor_file;
}

add_filter( 'themeisle_sdk_products', 'shopisle_load_sdk' );
/**
 * Loads products array.
 *
 * @param array $products All products.
 *
 * @return array Products array.
 */
function shopisle_load_sdk( $products ) {
	$products[] = get_template_directory() . '/style.css';

	return $products;
}
/**
 * Initialize all the things.
 */
require get_template_directory() . '/inc/init.php';

/**
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 */



/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_before_shop_loop', 'klismos_woocommerce_before_main_content', 10 );

function klismos_woocommerce_before_main_content(){
	$term = get_queried_object();
	if($term->slug=='') { // Productos
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
				echo '<div class="container" id="categories"><div class="row"><div class="category-home-list"><br/>';
		    foreach ($product_categories as $key => $category) {
				echo '<div class="col-md-3 col-sm-3 col-xs-4"><div class="link">';
		        echo '<a href="'.get_term_link($category).'">';
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
	}
}

function wp_get_attachment_image_no_srcset($attachment_id, $size = 'thumbnail', $icon = false, $attr = '') {
    // add a filter to return null for srcset
    add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
    // get the srcset-less img html
    $html = wp_get_attachment_image($attachment_id, $size, $icon, $attr);
    // remove the above filter
    remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
    return $html;
}

/**
 * Disable the emoji's
 */

