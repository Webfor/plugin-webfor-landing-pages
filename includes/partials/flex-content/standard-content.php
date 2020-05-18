<?php 
/**
 * Flexible Content Module: Standard Content Section
 *
 * @package webfor
 */

    // TAB : Layout Settings
    if( have_rows('wflp_fc_standard_container_settings') ):
        while( have_rows('wflp_fc_standard_container_settings') ): the_row(); 
            $scb_layout = get_sub_field('wflp_fc_standard_container_type');
            $scb_width = get_sub_field('wflp_fc_standard_container_width');
        endwhile;
    endif;
    $scb_columns = get_sub_field('wflp_fc_standard_layout_columns');
    if( have_rows('wflp_fc_standard_layout_content_advanced') ):
        while( have_rows('wflp_fc_standard_layout_content_advanced') ): the_row();      
            $scb_classes = get_sub_field('wflp_fc_standard_layout_content_advanced_classes');
            $scb_id = get_sub_field('wflp_fc_standard_layout_content_advanced_id');
        endwhile;
    endif;

    // TAB : Design Settings
    $scb_bgstyle = get_sub_field('wflp_fc_standard_design_bg');
    $scb_bgcol = get_sub_field('wflp_fc_standard_design_bg_color');
    if( have_rows('wflp_fc_standard_design_bg_img_settings') ):
        while( have_rows('wflp_fc_standard_design_bg_img_settings') ): the_row(); 
            $scb_bgimg = get_sub_field('wflp_fc_standard_design_bg_img');
            $scb_parallax = get_sub_field('wflp_fc_standard_design_bg_img_parallax');
            $scb_bgoverlay_toggle = get_sub_field('wflp_fc_standard_design_bg_img_overlay');
            $scb_bgoverlay_color = get_sub_field('wflp_fc_standard_design_bg_img_overlay_color');
            $scb_bgoverlay_opacity = get_sub_field('wflp_fc_standard_design_bg_img_overlay_opacity');
        endwhile;
    endif;
    if( have_rows('wflp_fc_standard_design_font_settings') ):
        while( have_rows('wflp_fc_standard_design_font_settings') ): the_row(); 
            $scb_font_color_toggle = get_sub_field('wflp_fc_standard_design_unify_font');
            $scb_font_color = get_sub_field('wflp_fc_standard_design_unify_font_color');
        endwhile;
    endif;

    // TAB : Section Content
    if( have_rows('wflp_fc_standard_section_content_columns') ):
        while( have_rows('wflp_fc_standard_section_content_columns') ): the_row(); 
            // Column 1
            if( have_rows('wflp_fc_standard_section_content_col1') ):
                while( have_rows('wflp_fc_standard_section_content_col1') ): the_row(); 
                    $scb_col1_visibility = get_sub_field('wflp_fc_standard_section_content_col1_vis');
                    $scb_col1_content = get_sub_field('wflp_fc_standard_section_content_col1_content');
                endwhile;
            endif;
            // Column 2
            if( have_rows('wflp_fc_standard_section_content_col2') ):
                while( have_rows('wflp_fc_standard_section_content_col2') ): the_row(); 
                    $scb_col2_visibility = get_sub_field('wflp_fc_standard_section_content_col2_vis');
                    $scb_col2_content = get_sub_field('wflp_fc_standard_section_content_col2_content');
                endwhile;
            endif;
            // Column 3
            if( have_rows('wflp_fc_standard_section_content_col3') ):
                while( have_rows('wflp_fc_standard_section_content_col3') ): the_row(); 
                    $scb_col3_visibility = get_sub_field('wflp_fc_standard_section_content_col3_vis');
                    $scb_col3_content = get_sub_field('wflp_fc_standard_section_content_col3_content');
                endwhile;
            endif;
            // Column 4
            if( have_rows('wflp_fc_standard_section_content_col4') ):
                while( have_rows('wflp_fc_standard_section_content_col4') ): the_row(); 
                    $scb_col4_visibility = get_sub_field('wflp_fc_standard_section_content_col4_vis');
                    $scb_col4_content = get_sub_field('wflp_fc_standard_section_content_col4_content');
                endwhile;
            endif;
        endwhile;
    endif; 

    // Random ID Generation
    $rand_id = mt_rand();
?>

<style>
    <?php if( $scb_bgstyle == 'flat-color') : ?>
    .wflp-standard-content.flat-color {background-color: <?php echo $scb_bgcol; ?>;}
    <?php elseif( $scb_bgstyle == 'image-bg') : ?>
    .wflp-standard-content.image-bg {background-image: url(<?php echo $scb_bgimg['url']; ?>);}
    .wflp-standard-content.image-bg.overlay-on:before {
        background-color: <?php echo $scb_bgoverlay_color; ?>;
        opacity: .<?php echo $scb_bgoverlay_opacity; ?>;
    }
    <?php endif; ?>

    <?php if( $scb_font_color_toggle == 'font-color-on' ) : ?>
    .sc-<?php echo $rand_id; ?> h1, .sc-<?php echo $rand_id; ?> h2, .sc-<?php echo $rand_id; ?> h3, .sc-<?php echo $rand_id; ?> h4, 
    .sc-<?php echo $rand_id; ?> h5, .sc-<?php echo $rand_id; ?> ul, .sc-<?php echo $rand_id; ?> ol, .sc-<?php echo $rand_id; ?> p,
    .sc-<?php echo $rand_id; ?> a:not(.btn) {color: <?php echo $scb_font_color; ?> !important;}
    <?php endif; ?>


</style>

<section 
    <?php if( $scb_id ) : ?>
        id="<?php echo $scb_id; ?>"
    <?php else : ?>
        id="wflpStandardContent<?php echo $rand_id; ?>"
    <?php endif; ?>
    class="
        wflp-section 
        wflp-standard-content 
        sc-<?php echo $rand_id; ?> 
        <?php echo $scb_bgstyle; ?> 
        <?php echo $scb_parallax; ?> 
        <?php echo $scb_bgoverlay_toggle; ?> 
        <?php echo $scb_classes; ?>">


    <div class="container-width" 
        <?php if($scb_layout == 'scb-container-width' ) : ?>
        style="max-width: <?php echo $scb_width;?>px;"
        <?php else : ?>
        style="max-width: unset;"
        <?php endif; ?>>

        <div class="wflp-scb-inner">

            <?php if($scb_col1_content) : ?>
            <div class="wflp-scb-col <?php echo $scb_col1_visibility; ?>">
                <?php echo $scb_col1_content; ?>
            </div>
            <?php endif; ?>
            
            <?php if ( $scb_columns == 'two-col' || $scb_columns == 'three-col' || $scb_columns == 'four-col' ) : ?>
            <?php if($scb_col2_content) : ?>
            <div class="wflp-scb-col <?php echo $scb_col2_visibility; ?>">
                <?php echo $scb_col2_content; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php if ( $scb_columns == 'three-col' || $scb_columns == 'four-col' ) : ?>
            <?php if($scb_col3_content) : ?>
            <div class="wflp-scb-col <?php echo $scb_col3_visibility; ?>">
                <?php echo $scb_col3_content; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            
            <?php if ( $scb_columns == 'four-col' ) : ?>
            <?php if($scb_col4_content) : ?>
            <div class="wflp-scb-col <?php echo $scb_col4_visibility; ?>">
                <?php echo $scb_col4_content; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>

        </div>
    
    </div>

</section>
