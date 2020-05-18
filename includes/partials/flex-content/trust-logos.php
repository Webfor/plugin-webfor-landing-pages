<?php 
/**
 * Flexible Content Module: Testimonials Section
 *
 * @package webfor
 */

    // TAB : Layout Settings
    if( have_rows('wflp_fc_tlogos_container_settings') ):
        while( have_rows('wflp_fc_tlogos_container_settings') ): the_row(); 
            $wflp_tlogos_layout = get_sub_field('wflp_fc_tlogos_container_type');
            $wflp_tlogos_width = get_sub_field('wflp_fc_tlogos_container_width');
        endwhile;
    endif;
    if( have_rows('wflp_fc_standard_layout_content_advanced') ):
        while( have_rows('wflp_fc_standard_layout_content_advanced') ): the_row();      
            $wflp_tlogos_classes = get_sub_field('wflp_fc_tlogos_advanced_classes');    
            $wflp_tlogos_id = get_sub_field('wflp_fc_tlogos_advanced_id');
        endwhile;
    endif;

    // TAB : Design Settings
    $wflp_tlogos_bgstyle = get_sub_field('wflp_fc_tlogos_design_bg');
    $wflp_tlogos_bgcol = get_sub_field('wflp_fc_tlogos_design_bg_color');
    if( have_rows('wflp_fc_tlogos_design_bg_img_settings') ):
        while( have_rows('wflp_fc_tlogos_design_bg_img_settings') ): the_row();     
            $wflp_tlogos_bgimg = get_sub_field('wflp_fc_tlogos_design_bg_img');
            $wflp_tlogos_parallax = get_sub_field('wflp_fc_tlogos_design_bg_img_parallax');
            $wflp_tlogos_bgoverlay_toggle = get_sub_field('wflp_fc_tlogos_design_bg_img_overlay');
            $wflp_tlogos_bgoverlay_color = get_sub_field('wflp_fc_tlogos_design_bg_img_overlay_color');
            $wflp_tlogos_bgoverlay_opacity = get_sub_field('wflp_fc_tlogos_design_bg_img_overlay_opacity');             
        endwhile;
    endif;
    if( have_rows('wflp_fc_tlogos_design_font_settings') ):
        while( have_rows('wflp_fc_tlogos_design_font_settings') ): the_row();     
            $wflp_tlogos_font_color_toggle = get_sub_field('wflp_fc_tlogos_design_unify_font');
            $wflp_tlogos_font_color = get_sub_field('wflp_fc_tlogos_design_unify_font_color');
        endwhile;
    endif;

    // TAB : Carousel Settings
    $wflp_tlogos_tshown = get_sub_field('wflp_fc_tlogos_carousel_shown');
    $wflp_tlogos_tautoplay = get_sub_field('wflp_fc_tlogos_carousel_autoplay');
    $wflp_tlogos_tspeed = get_sub_field('wflp_fc_tlogos_carousel_speed');
    //$wflp_tlogos_pagcolors = get_sub_field('wflp_fc_tlogos_carousel_pagcolors');

    // TAB : Section Content
    $wflp_tlogos_color = get_sub_field('wflp_fc_tlogos_carousel_grayscale');
    $wflp_tlogos_logos = get_sub_field('wflp_fc_tlogos_logos');

    // Random ID Generation
    $rand_id = mt_rand();
?>

<style>
    <?php if( $wflp_tlogos_bgstyle == 'flat-color') : ?>
    .wflp-tlogos.flat-color {background-color: <?php echo $wflp_tlogos_bgcol; ?>;}
    <?php elseif( $wflp_tlogos_bgstyle == 'image-bg') : ?>
    .wflp-tlogos.image-bg {background-image: url(<?php echo $wflp_tlogos_bgimg['url']; ?>);}
    .wflp-tlogos.image-bg.overlay-on:before {
        background-color: <?php echo $wflp_tlogos_bgoverlay_color; ?>;
        opacity: .<?php echo $wflp_tlogos_bgoverlay_opacity; ?>;
    }
    <?php endif; ?>
    /*.swiper-pagination-bullet {background: <?php echo $wflp_tlogos_pagcolors; ?>;}
    .tlogos-carousel .swiper-button-prev:before,
    .tlogos-carousel .swiper-button-next:before {color: <?php echo $wflp_tlogos_pagcolors; ?>;}*/
    <?php if( $wflp_tlogos_font_color_toggle == 'font-color-on') : ?>
    .wflp-tlogos-<?php echo $rand_id; ?> h1, .wflp-tlogos-<?php echo $rand_id; ?> h2, .wflp-tlogos-<?php echo $rand_id; ?> h3, .wflp-tlogos-<?php echo $rand_id; ?> h4, 
    .wflp-tlogos-<?php echo $rand_id; ?> h5, .wflp-tlogos-<?php echo $rand_id; ?> ul, .wflp-tlogos-<?php echo $rand_id; ?> ol, .wflp-tlogos-<?php echo $rand_id; ?> p,
    .wflp-tlogos-<?php echo $rand_id; ?> a:not(.btn) {color: <?php echo $wflp_tlogos_font_color; ?> !important;}
    <?php endif; ?>
</style>

<section 
    <?php if( $wflp_tlogos_id ) : ?>
        id="<?php echo $wflp_tlogos_id; ?>"
    <?php else : ?>
        id="wflpTlogos<?php echo $rand_id;?>"
    <?php endif; ?>
    class="
        wflp-section 
        wflp-tlogos 
        wflp-tlogos-<?php echo $rand_id; ?> 
        <?php echo $wflp_tlogos_bgstyle; ?> 
        <?php echo $wflp_tlogos_parallax; ?> 
        <?php echo $wflp_tlogos_bgoverlay_toggle; ?> 
        <?php echo $wflp_tlogos_classes; ?>"
        >
    
    <div class="container-width" 
        <?php if($wflp_tlogos_layout == 'tlogos-container-width' ) : ?>
        style="max-width: <?php echo $wflp_tlogos_width;?>px;"
        <?php else : ?>
        style="max-width: unset; padding: 0;"
        <?php endif; ?>>

        <div class="wflp-tlogos-inner">

            <?php if( $wflp_tlogos_logos ): ?>
            <div class="swiper-container wflp-trust-logos tlogos-carousel <?php echo $wflp_tlogos_color; ?>" id="tlogosCarousel<?php echo $rand_id; ?>">

                <div class="swiper-wrapper">

                    <?php foreach( $wflp_tlogos_logos as $wflp_tlogos_logo ): ?>
                    <div class="swiper-slide wflp-tlogos-logo">
                        <img src="<?php echo esc_url($wflp_tlogos_logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($wflp_tlogos_logo['alt']); ?>" />
                    </div>
                    <?php endforeach; ?>

                </div>

            </div>

            <script>
                jQuery(document).ready(function($) {
                    // Find additional setting params at https://idangero.us/swiper/api/
                    var trustLogos = new Swiper("#tlogosCarousel<?php echo $rand_id; ?>", {
                        autoplay: <?php echo $wflp_tlogos_tautoplay; ?>,
                        loop: true,
                        centeredSlides: false,
                        slidesPerView: <?php echo $wflp_tlogos_tshown; ?>,
                        spaceBetween: 0,
                        speed: <?php echo $wflp_tlogos_tspeed; ?>000,
                        breakpoints: {
                            992: {
                                slidesPerView: 2,
                                autoplay: true,
                                centeredSlides: true,
                            },
                        },
                    });
                })
            </script>
            <?php endif; ?>

        </div>
    
    </div>

</section>
