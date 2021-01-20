<?php
/**
 * Displays the top header
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();
?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-sm hidden-xs">
		<?php
        $disable_top_social_icons = $online_eshop_settings['online_eshop_disable_top_social_icons'];
        if($disable_top_social_icons == 0 ): ?>
	    <div class="top-l-social">
	        <ul class="list-inline">
	            <?php do_action('online_eshop_social_links'); ?>
	        </ul>
	    </div>
	    <?php endif; ?>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	    <div class="top-linked text-right">
	        <ul class="list-inline">
	            <?php
	            $disable_login_menu = $online_eshop_settings['online_eshop_disable_login_menu'];
        		if($disable_login_menu == 0 ):
		            if ( has_nav_menu( 'login-menu' ) ) :
		                wp_nav_menu( array(
		                    'container'     => 'ul',
		                    'theme_location' => 'login-menu',
		                    'depth'          => 1,
		                    'items_wrap'      => '%3$s',
		                ) );
		            endif;
		        endif;
	            ?>
	            <?php
		        $disable_mycart = $online_eshop_settings['online_eshop_disable_mycart'];
		        if($disable_mycart == 0 ):
	            do_action ('online_eshop_mycart_button_display');
	            endif;
	            ?>
	        </ul>
	    </div>
	</div>
</div>