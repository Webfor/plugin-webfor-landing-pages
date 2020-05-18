<!-- START: Hero Section -->
<?php if( have_rows('wflp_hero_settings') ):
    while( have_rows('wflp_hero_settings') ): the_row(); 

        // TAB: Design Settings
        $wflp_hero_template = get_sub_field('wflp_hero_template');
        if( have_rows('wflp_hero_bg_settings') ):
            while( have_rows('wflp_hero_bg_settings') ): the_row(); 

                $wflp_hero_bgimg = get_sub_field('wflp_hero_bgimg');
                $wflp_hero_bgpara = get_sub_field('wflp_hero_bg_parallax');
                $wflp_hero_bgovrly_tog = get_sub_field('wflp_hero_bg_overlay');
                $wflp_hero_bgovrly_color = get_sub_field('wflp_hero_bg_overlay_color');
                $wflp_hero_bgovrly_opac = get_sub_field('wflp_hero_bg_overlay_opacity');
                
            endwhile;
        endif;

        // TAB: Trust Logo Settings
        if( have_rows('wflp_hero_tlogos_settings') ):
            while( have_rows('wflp_hero_tlogos_settings') ): the_row(); 

                $wflp_hero_tlogos_shown = get_sub_field('wflp_hero_tlogos_shown');
                $wflp_hero_tlogos_autoplay = get_sub_field('wflp_hero_tlogos_autoplay');
                $wflp_hero_tlogos_speed = get_sub_field('wflp_hero_tlogos_speed');
                
            endwhile;
        endif;
        $wflp_hero_tlogos_color = get_sub_field('wflp_hero_tlogos_carousel_grayscale');
        $wflp_hero_tlogos_logos = get_sub_field('wflp_hero_trust_logos');

        // TAB: Section Content
        $wflp_hero_content = get_sub_field('wflp_hero_content');
        $wflp_hero_form = get_sub_field('wflp_form_shortcode');

    endwhile;
endif; 
?>

<style>
    .hero-section:before {
        background-color: <?php echo $wflp_hero_bgovrly_color; ?>;
        opacity: .<?php echo $wflp_hero_bgovrly_opac; ?>;
    }
</style>

<section 
    class="wflp-section hero-section hero-tlogos" 
    <?php if($wflp_hero_bgimg): ?>
        style="background-image: url(<?php echo $wflp_hero_bgimg['url']; ?>);"
    <?php endif; ?>>

    <div class="container-width">

        <div class="hero-inner <?php echo $wflp_hero_style; ?>">

            <?php if($wflp_hero_content): ?>
            <div class="content-area">
                <?php echo $wflp_hero_content; ?>
            </div>
            <?php endif; ?>
            
            <?php if($wflp_hero_form): ?>
            <div class="form-area">
                <?php echo do_shortcode($wflp_hero_form); ?>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <?php if( $wflp_hero_tlogos_logos ): ?>
    <div class="hero-tlogos-carousel">
        <div class="swiper-container wflp-trust-logos <?php echo $wflp_hero_tlogos_color; ?>" id="heroTlogosCarousel">

            <div class="swiper-wrapper">

                <?php foreach( $wflp_hero_tlogos_logos as $wflp_hero_tlogos_logo ): ?>
                <div class="swiper-slide wflp-tlogos-logo">
                    <img src="<?php echo esc_url($wflp_hero_tlogos_logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($wflp_hero_tlogos_logo['alt']); ?>" />
                </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
            
    <script>
        jQuery(document).ready(function($) {
            // Find additional setting params at https://idangero.us/swiper/api/
            var trustLogos = new Swiper("#heroTlogosCarousel", {
                autoplay: <?php echo $wflp_hero_tlogos_autoplay; ?>,
                loop: true,
                centeredSlides: false,
                slidesPerView: <?php echo $wflp_hero_tlogos_shown; ?>,
                spaceBetween: 0,
                speed: <?php echo $wflp_hero_tlogos_speed; ?>000,
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

</section>
<!-- END: Hero Section -->