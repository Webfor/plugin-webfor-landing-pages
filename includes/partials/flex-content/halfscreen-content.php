<?php
/**
 * Flexible Content Module: Half-Screen Content Section
 *
 * @package understrap
 */


    // TAB : Layout Settings
    $hscb_orientation = get_sub_field('wflp_fc_half_layout_type');
    if( have_rows('wflp_fc_half_advanced') ):
        while( have_rows('wflp_fc_half_advanced') ): the_row(); 
            $hscb_classes = get_sub_field('wflp_fc_half_advanced_classes');
            $hscb_id = get_sub_field('wflp_fc_half_advanced_id');
        endwhile;
    endif;

    // TAB : Layout Settings
    if( have_rows('wflp_fc_half_textblock') ):
        while( have_rows('wflp_fc_half_textblock') ): the_row(); 
            $hscb_tb_bgcolor = get_sub_field('wflp_fc_half_textblock_bgcol');
            if( have_rows('wflp_fc_half_textblock_font_settings') ):
                while( have_rows('wflp_fc_half_textblock_font_settings') ): the_row(); 
                    $hscb_tb_fontcolor_toggle = get_sub_field('wflp_fc_half_textblock_unify_font');
                    $hscb_tb_fontcolor = get_sub_field('wflp_fc_half_textblock_unify_font_color');
                    $hscb_tb_tpad = get_sub_field('wflp_fc_half_textblock_tpad');
                    $hscb_tb_bpad = get_sub_field('wflp_fc_half_textblock_bpad');
                endwhile;
            endif;
        endwhile;
    endif;
    if( have_rows('wflp_fc_half_imageblock') ):
        while( have_rows('wflp_fc_half_imageblock') ): the_row(); 
            $hscb_ib_imgbg = get_sub_field('wflp_fc_half_imageblock_img');
            $hscb_ib_ovrl_toggle = get_sub_field('wflp_fc_half_imageblock_overlay');
            $hscb_ib_ovrl_color = get_sub_field('wflp_fc_half_imageblock_overlay_color');
            $hscb_ib_ovrl_opacity = get_sub_field('wflp_fc_half_imageblock_overlay_opacity');
        endwhile;
    endif;

    // TAB : Section Content
    $hscb_text_block = get_sub_field('wflp_fc_half_content');

    // Random ID Generation
    $hscb_unique_id = mt_rand();

?>

<section 
    <?php if( $hscb_id ) : ?>
        id="<?php echo $hscb_id; ?>"
    <?php else : ?>
        id="wflpHalfScreenContent<?php echo $hscb_unique_id; ?>"
    <?php endif; ?>
    class="
        wflp-hscb 
        hscb-<?php echo $hscb_unique_id; ?> 
        <?php echo $hscb_orientation; ?>  
        <?php echo $hscb_classes; ?>">

    <style>
        <?php if( $hscb_tb_fontcolor_toggle == 'font-color-on') : ?>
            .hscb-<?php echo $hscb_unique_id; ?> h1, .hscb-<?php echo $hscb_unique_id; ?> h2, .hscb-<?php echo $hscb_unique_id; ?> h3, 
            .hscb-<?php echo $hscb_unique_id; ?> h4, .hscb-<?php echo $hscb_unique_id; ?> h5, .hscb-<?php echo $hscb_unique_id; ?> ul, 
            .hscb-<?php echo $hscb_unique_id; ?> ol, .hscb-<?php echo $hscb_unique_id; ?> p, .hscb-<?php echo $hscb_unique_id; ?> a:not(.btn) {color: <?php echo $hscb_tb_fontcolor; ?> !important;}
        <?php endif; ?>
        <?php if( $hscb_ib_ovrl_toggle == 'ovrly-on') : ?>
            .hbc-image-wrap.ovrly-on:before {
                background-color: <?php echo $hscb_ib_ovrl_color; ?>;
                opacity: .<?php echo $hscb_ib_ovrl_opacity; ?>;
            }
        <?php endif; ?>
        .hscb-<?php echo $hscb_unique_id; ?> .hcb-text-wrap {
            padding-top: <?php echo $hscb_tb_tpad; ?>px;
            padding-bottom: <?php echo $hscb_tb_bpad; ?>px;
        }
        @media screen and (max-width:992px) {
            .hscb-<?php echo $rand_id; ?>  {
                padding-top: calc(<?php echo $hscb_tb_tpad; ?>px / 2);
                padding-bottom: calc(<?php echo $hscb_tb_bpad; ?>px / 2);
            }
        }
    </style>

    <div class="hbc-image-wrap <?php echo $hscb_ib_ovrl_toggle; ?>" style="background-image: url(<?php echo $hscb_ib_imgbg['url']; ?>);"></div>
    
    <div class="hcb-text-wrap" style="background-color: <?php echo $hscb_tb_bgcolor; ?>;">
        <div class="hcb-text-inner">
            <?php echo $hscb_text_block; ?>
        </div>
    </div>

</section>