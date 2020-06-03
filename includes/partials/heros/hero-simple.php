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
    class="wflp-section hero-section hero-simple <?php echo $wflp_hero_bgpara; ?> <?php echo $wflp_hero_bgovrly_tog; ?>" 
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
            
</section>
<!-- END: Hero Section -->