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
    class="wflp-section hero-section hero-simple <?php echo $wflp_hero_bgpara; ?> <?php echo $wflp_hero_bgovrly_tog; ?>" 
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
            
            <?php include 'form/hero-form.php'; ?>

        </div>

    </div>
            
</section>
<!-- END: Hero Section -->