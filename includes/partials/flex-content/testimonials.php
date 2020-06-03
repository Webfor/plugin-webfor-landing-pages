<?php 
/**
 * Flexible Content Module: Testimonials Section
 *
 * @package webfor
 */

    // TAB : Layout Settings
    if( have_rows('wflp_fc_testimonials_container_settings') ):
        while( have_rows('wflp_fc_testimonials_container_settings') ): the_row(); 
            $tstm_layout = get_sub_field('wflp_fc_testimonials_container_type');
            $tstm_width = get_sub_field('wflp_fc_testimonials_container_width');
            $tstm_tpad = get_sub_field('wflp_fc_testimonials_container_tpad');
            $tstm_bpad = get_sub_field('wflp_fc_testimonials_container_bpad');
        endwhile;
    endif;
    if( have_rows('wflp_fc_standard_layout_content_advanced') ):
        while( have_rows('wflp_fc_standard_layout_content_advanced') ): the_row();      
            $tstm_classes = get_sub_field('wflp_fc_testimonials_advanced_classes');    
            $tstm_id = get_sub_field('wflp_fc_testimonials_advanced_id');
        endwhile;
    endif;

    // TAB : Design Settings
    $tstm_bgstyle = get_sub_field('wflp_fc_testimonials_design_bg');
    $tstm_bgcol = get_sub_field('wflp_fc_testimonials_design_bg_color');
    if( have_rows('wflp_fc_testimonials_design_bg_img_settings') ):
        while( have_rows('wflp_fc_testimonials_design_bg_img_settings') ): the_row();     
            $tstm_bgimg = get_sub_field('wflp_fc_testimonials_design_bg_img');
            $tstm_parallax = get_sub_field('wflp_fc_testimonials_design_bg_img_parallax');
            $tstm_bgoverlay_toggle = get_sub_field('wflp_fc_testimonials_design_bg_img_overlay');
            $tstm_bgoverlay_color = get_sub_field('wflp_fc_testimonials_design_bg_img_overlay_color');
            $tstm_bgoverlay_opacity = get_sub_field('wflp_fc_testimonials_design_bg_img_overlay_opacity');             
        endwhile;
    endif;
    if( have_rows('wflp_fc_testimonials_design_font_settings') ):
        while( have_rows('wflp_fc_testimonials_design_font_settings') ): the_row();     
            $tstm_font_color_toggle = get_sub_field('wflp_fc_testimonials_design_unify_font');
            $tstm_font_color = get_sub_field('wflp_fc_testimonials_design_unify_font_color');
        endwhile;
    endif;

    // TAB : Carousel Settings
    $tstm_tshown = get_sub_field('wflp_fc_testimonials_carousel_shown');
    $tstm_tautoplay = get_sub_field('wflp_fc_testimonials_carousel_autoplay');
    $tstm_tspeed = get_sub_field('wflp_fc_testimonials_carousel_speed');
    //$tstm_pagcolors = get_sub_field('wflp_fc_testimonials_carousel_pagcolors');
    if( have_rows('wflp_fc_testimonials_testimonial_style') ):
        while( have_rows('wflp_fc_testimonials_testimonial_style') ): the_row(); 
            $tstm_card_type = get_sub_field('wflp_fc_testimonials_testimonial_style_card_type'); 
            $tstm_card_bg = get_sub_field('wflp_fc_testimonials_testimonial_style_card_bg'); 
            $tstm_card_radius = get_sub_field('wflp_fc_testimonials_testimonial_style_card_radius'); 
        endwhile;
    endif;

    // Random ID Generation
    $rand_id = mt_rand();
?>



<style>
    <?php if( $tstm_bgstyle == 'flat-color') : ?>
    .wflp-testimonials.flat-color {background-color: <?php echo $tstm_bgcol; ?>;}
    <?php elseif( $tstm_bgstyle == 'image-bg') : ?>
    .wflp-testimonials.image-bg {background-image: url(<?php echo $tstm_bgimg['url']; ?>);}
    .wflp-testimonials.image-bg.overlay-on:before {
        background-color: <?php echo $tstm_bgoverlay_color; ?>;
        opacity: .<?php echo $tstm_bgoverlay_opacity; ?>;
    }
    <?php endif; ?>
    /*.swiper-pagination-bullet {background: <?php echo $tstm_pagcolors; ?>;}
    .tstm-carousel .swiper-button-prev:before,
    .tstm-carousel .swiper-button-next:before {color: <?php echo $tstm_pagcolors; ?>;}*/
    <?php if( $tstm_font_color_toggle == 'font-color-on') : ?>
    .wflp-tstm-<?php echo $rand_id; ?> h1, .wflp-tstm-<?php echo $rand_id; ?> h2, .wflp-tstm-<?php echo $rand_id; ?> h3, .wflp-tstm-<?php echo $rand_id; ?> h4, 
    .wflp-tstm-<?php echo $rand_id; ?> h5, .wflp-tstm-<?php echo $rand_id; ?> ul, .wflp-tstm-<?php echo $rand_id; ?> ol, .wflp-tstm-<?php echo $rand_id; ?> p,
    .wflp-tstm-<?php echo $rand_id; ?> a:not(.btn) {color: <?php echo $tstm_font_color; ?> !important;}
    <?php endif; ?>
    .wflp-tstm-<?php echo $rand_id; ?> {
        padding-top: <?php echo $tstm_tpad; ?>px;
        padding-bottom: <?php echo $tstm_bpad; ?>px;
    }
    @media screen and (max-width:992px) {
        .wflp-tstm-<?php echo $rand_id; ?>  {
            padding-top: calc(<?php echo $tstm_tpad; ?>px / 2);
            padding-bottom: calc(<?php echo $tstm_bpad; ?>px / 2);
        }
    }
</style>

<section 
    <?php if( $tstm_id ) : ?>
        id="<?php echo $tstm_id; ?>"
    <?php else : ?>
        id="wflpTestimonials<?php echo $rand_id;?>"
    <?php endif; ?>
    class="
        wflp-section 
        wflp-testimonials 
        wflp-tstm-<?php echo $rand_id; ?> 
        <?php echo $tstm_bgstyle; ?> 
        <?php echo $tstm_parallax; ?> 
        <?php echo $tstm_bgoverlay_toggle; ?> 
        <?php echo $tstm_classes; ?>"
        >
    
    <div class="container-width" 
        <?php if($tstm_layout == 'tstm-container-width' ) : ?>
        style="max-width: <?php echo $tstm_width;?>px;"
        <?php else : ?>
        style="max-width: unset;"
        <?php endif; ?>>

        <div class="wflp-tstm-inner">

            <div class="swiper-container tstm-carousel" id="testimonialCarousel<?php echo $rand_id; ?>">

                <!-- If we need pagination 
                <div class="swiper-pagination"></div> -->
                <!-- If we need navigation buttons
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->

                <div class="swiper-wrapper">

                    <?php if( have_rows('wflp_fc_testimonials_repeater') ):
                        while( have_rows('wflp_fc_testimonials_repeater') ): the_row(); 
                            $tquote = get_sub_field('wflp_fc_testimonials_repeater_quote');
                            ?>
                            <div class="swiper-slide testimonial-item">
                                <div class="
                                testimonial-card 
                                <?php echo $tstm_card_type; ?>
                                "
                                <?php if( $tstm_card_type == 'card-styled' ) : ?>
                                style="
                                background-color: <?php echo $tstm_card_bg; ?>; 
                                border-radius: <?php echo $tstm_card_radius; ?>px;
                                "
                                <?php endif; ?>>
                                <?php echo $tquote; ?></div>
                            </div>
                        <?php endwhile;
                    endif; ?>

                </div>

            </div>

            <script>
                jQuery(document).ready(function($) {
                    // Find additional setting params at https://idangero.us/swiper/api/
                    var trustLogos = new Swiper("#testimonialCarousel<?php echo $rand_id; ?>", {
                        autoplay: <?php echo $tstm_tautoplay; ?>,
                        loop: true,
                        centeredSlides: false,
                        slidesPerView: <?php echo $tstm_tshown; ?>,
                        spaceBetween: 0,
                        speed: <?php echo $tstm_tspeed; ?>000,
                        /*
                        == Not sure if we need pagination at this time - can revisit later. ==
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },*/
                        breakpoints: {
                            992: {
                                slidesPerView: 1,
                                autoplay: true,
                            },
                        },
                    });
                })
            </script>

        </div>
    
    </div>

</section>
