<!-- START: Hero Section -->
<?php if( have_rows('wflp_hero_settings') ):
    while( have_rows('wflp_hero_settings') ): the_row(); 

        // TAB: Design Settings
        if( have_rows('wflp_hero_content_settings') ):
            while( have_rows('wflp_hero_content_settings') ): the_row(); 

                $wflp_hero_content_width = get_sub_field('wflp_hero_content_width');
                $wflp_hero_content_tpad = get_sub_field('wflp_hero_content_tpad');
                $wflp_hero_content_bpad = get_sub_field('wflp_hero_content_bpad');
                
            endwhile;
        endif;

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
    <?php if( $wflp_hero_bgovrly_tog == 'overlay-on' ): ?>
    .hero-section:before {
        background-color: <?php echo $wflp_hero_bgovrly_color; ?>;
        opacity: .<?php echo $wflp_hero_bgovrly_opac; ?>;
    }
    <?php endif; ?>

    .hero-section {
        padding-top: <?php echo $wflp_hero_content_tpad; ?>px; 
        padding-bottom: <?php echo $wflp_hero_content_bpad; ?>px;
    }
    @media screen and (max-width:992px) {
        .hero-section  {
            padding-top: calc(<?php echo $hscb_tb_tpad; ?>px / 2);
            padding-bottom: calc(<?php echo $hscb_tb_bpad; ?>px / 2);
        }
    }
</style>

<section 
    class="wflp-section hero-section hero-tlogos" 
    <?php if($wflp_hero_bgimg): ?>
        style="background-image: url(<?php echo $wflp_hero_bgimg['url']; ?>);"
    <?php endif; ?>>

    <div class="container-width" style="max-width: <?php echo $wflp_hero_content_width; ?>px;">

        <div class="hero-inner <?php echo $wflp_hero_style; ?>">

            <?php if($wflp_hero_content): ?>
            <div class="content-area">
                <?php echo $wflp_hero_content; ?>
            </div>
            <?php endif; ?>
            
            <?php include 'form/hero-form.php'; ?>

        </div>

    </div>

    <?php if( $wflp_hero_tlogos_logos ): ?>
    <div class="hero-tlogos-carousel">
        <div class="swiper-container wflp-trust-logos hide-mobile <?php echo $wflp_hero_tlogos_color; ?>" id="heroTlogosCarouselDesktop">

            <div class="swiper-wrapper">

                <?php foreach( $wflp_hero_tlogos_logos as $wflp_hero_tlogos_logo ): ?>
                <div class="swiper-slide wflp-tlogos-logo">
                    <img src="<?php echo esc_url($wflp_hero_tlogos_logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($wflp_hero_tlogos_logo['alt']); ?>" />
                </div>
                <?php endforeach; ?>

            </div>

        </div>
        <div class="swiper-container wflp-trust-logos hide-desktop <?php echo $wflp_hero_tlogos_color; ?>" id="heroTlogosCarouselMobile">

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
            // NOTE: Swiper 'breakpoint' param not working on Webfor.com site - temporarily setting up like this until site can be remodeled and taken off Divi.
            // Find additional setting params at https://idangero.us/swiper/api/
            var heroTrustLogosDesktop = new Swiper("#heroTlogosCarouselDesktop", {
                autoplay: <?php echo $wflp_hero_tlogos_autoplay; ?>,
                loop: true,
                centeredSlides: false,
                slidesPerView: <?php echo $wflp_hero_tlogos_shown; ?>,
                spaceBetween: 0,
                speed: <?php echo $wflp_hero_tlogos_speed; ?>000,
            });
            var heroTrustLogosMobile = new Swiper("#heroTlogosCarouselMobile", {
                autoplay: true,
                loop: true,
                centeredSlides: true,
                slidesPerView: 2,
                spaceBetween: 0,
                speed: <?php echo $wflp_hero_tlogos_speed; ?>000,
            });
        })
    </script>
    <?php endif; ?>

</section>
<!-- END: Hero Section -->