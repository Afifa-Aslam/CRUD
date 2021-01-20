<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$online_eshop_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $online_eshop_tabs ) ) : ?>

	<div class="pro-describe">
		<ul class="navtabs" role="tablist">
			<?php foreach ( $online_eshop_tabs as $key => $online_eshop_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $online_eshop_tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="tab-content">
		<?php $i = 1; foreach ( $online_eshop_tabs as $key => $online_eshop_tab ) : ?>
			<?php $active = ($i == 1) ? 'active' : ''; ?>
			<div class="tab-pane <?php echo esc_attr($active); ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php if ( isset( $online_eshop_tab['callback'] ) ) { call_user_func( $online_eshop_tab['callback'], $key, $online_eshop_tab ); } ?>
			</div>
		<?php $i++; endforeach; ?>
		</div>
	</div>

<?php endif; ?>
