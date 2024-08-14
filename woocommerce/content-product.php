<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $wp_query;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<?php 		
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
	<div class="product-holder">
		<?php woocommerce_template_loop_product_thumbnail();?>
		<ul class="product__action">
			<?php if(class_exists('YITH_Woocompare')):?>
			<li><?php radios_compayer(); ?></li>
			<?php endif;?>
			<li><?php radios_add_to_cart_icon(true, false);?>	</li>
			<?php if(function_exists('YITH_WCWL')):?>
				<li>
					<?php 
						if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
							echo do_shortcode( '[yith_wcwl_add_to_wishlist already_in_wishslist_text="" link_classes="fbt-wishlist add_to_wishlist single_add_to_wishlist"" browse_wishlist_text="" product_added_text=""]' );
						}
					?>
				</li>
			<?php endif;?>
		</ul>
	</div>	
	<?php do_action( 'woocommerce_before_shop_loop_item_title' );
    
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
	<div class="product-info">
		<div class="product__review ul_li">
			<?php woocommerce_template_loop_rating();?>
		</div>
		<h2 class="product__title"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title();?></a></h2>
		<h4 class="product__price"><?php woocommerce_template_loop_price(); ?>	</h4>
		<?php woocommerce_template_single_excerpt();?>
	</div>
	<?php

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
</li>
