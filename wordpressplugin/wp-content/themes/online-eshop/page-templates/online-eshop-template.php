<?php
/**
 * Template Name: Online Eshop Template
 * Displays the front page template.
 *
 * @package Online Eshop
 * @since Online Eshop 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();

get_header(); ?>
<?php $online_eshop_enable_slider = $online_eshop_settings['online_eshop_enable_slider'];

if ($online_eshop_enable_slider=='frontpage'|| $online_eshop_enable_slider=='enitresite') { 

    $online_eshop_slider_no = 3;
    $online_eshop_pages     = array();
    for( $i = 1; $i <= $online_eshop_slider_no; $i++ ) {
        $online_eshop_pages[]  = get_theme_mod( "online_eshop_slider_page_$i", 1 );
        $online_eshop_toptetxt[]  = $online_eshop_settings[ 'online_eshop_slideshow_toptext_'. $i ];
        $online_eshop_slideshow_midtext[]  = $online_eshop_settings[ 'online_eshop_slideshow_midtext_'. $i ];
        $online_eshop_slideshow_bottext[]  = $online_eshop_settings[ 'online_eshop_slideshow_bottext_'. $i ];
        $online_eshop_slideshow_btn_url[]  = $online_eshop_settings[ 'online_eshop_slideshow_btn_url_'. $i ];
        $item_active = '';
     if($i == 1){ $item_active = 'active'; } 

    }

    $slider_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $online_eshop_pages ),
    'posts_per_page' => absint($online_eshop_slider_no ),
    'orderby' => 'post__in' ); 

    $slider_query = new wp_Query( $slider_args );
    if ($slider_query->have_posts() ) { 
?>
<!--Slider area start here-->
    <section class="slider-area">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php $n=0;
                while($slider_query->have_posts()):
                  $slider_query->the_post(); ?>
                <div class="item <?php if($n==1){ echo "active";  } else{ echo " "; } ?>">
                       
                    <?php the_post_thumbnail(); ?>
                    <div class="carousel-captions">
                        <div class="container">
                            <div class="row">
                                <div class="slider-content">
                                    <div class="content">
										<p><?php echo esc_html($online_eshop_toptetxt[$n]); ?></p>
                                        <strong><?php echo esc_html($online_eshop_slideshow_midtext[$n]); ?></strong>
                                        <h2><?php echo esc_html($online_eshop_slideshow_bottext[$n]); ?></h2>
                                        <a href="<?php echo esc_url($online_eshop_slideshow_btn_url[$n]); ?>" class="btn1"><?php echo esc_html__('SEE COLLECTION','online-eshop'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $n=$n+1; endwhile; wp_reset_postdata(); ?>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>

        </div>
    </section>
<!--Slider area end here-->
<?php } }?>
<!--Info area start here-->

    <section class="info-area">
        <div class="container">
            <div class="row">
               <?php do_action ('online_eshop_slider_fatures'); ?>
            </div>
        </div>
    </section><!--Info area end here-->

<?php
$disable_promotion_section = $online_eshop_settings['online_eshop_disable_promotion_section'];
if ( $disable_promotion_section == 0 ) { ?>
<!--Discount section starts-->
<div class="discount-section section2">
	<div class="container">
    	<div class="row">
			<?php do_action ('online_eshop_product_promotions'); ?>
		</div>
	</div>
</div>
<!--Discount section ends-->
<?php } ?>
<!-- Product sections -->
<section class="product-area section3">
    <div class="container">
        <div class="row">
            <?php
            if (is_active_sidebar('online_eshop_template')):
                dynamic_sidebar('online_eshop_template');
            endif;
            ?>
        </div>
    </div>
</section>
<!-- Product sections end -->
<?php
$disable_product_categories = $online_eshop_settings['online_eshop_disable_product_categories'];
if ( $disable_product_categories == 0 ) { ?>
<!--Categories area start here-->
<section class="categories-area">
    <div class="container-fluid">
        <div class="row">
            <?php do_action ('online_eshop_fronpage_template_product_categories'); ?>
        </div>
    </div>
</section>
<!--Categories area end here-->
<?php } ?>

<?php
$deisable_blogpost_sec = $online_eshop_settings['online_eshop_deisable_blogpost_sec'];
$blogpost_title = $online_eshop_settings['online_eshop_blogpost_title'];
$blogpost_subtitle = $online_eshop_settings['online_eshop_blogpost_subtitle'];
if ( $deisable_blogpost_sec == 0 ) { ?>
<!--Blog area start here-->
<section class="blog-area section4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-heading">
                    <?php if (!empty($blogpost_title)): ?>
                    <h2><?php echo esc_html($blogpost_title); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($blogpost_subtitle)): ?>
                    <p><?php echo esc_html($blogpost_subtitle); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php do_action ('online_eshop_blog_posts_template'); ?>
        </div>
    </div>
</section>
<!--Blog area end here-->
<?php } ?>
<?php get_footer();