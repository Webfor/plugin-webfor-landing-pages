<?php 
if( have_rows('wflp_hero_settings') ):
    while( have_rows('wflp_hero_settings') ): the_row(); 

        // TAB: Contact Form Settings
        $wflp_form_width = get_sub_field('wflp_hero_form_width');

        if( have_rows('wflp_hero_form_bg_settings') ):
            while( have_rows('wflp_hero_form_bg_settings') ): the_row(); 
                $wflp_form_bgcolor = get_sub_field('wflp_hero_form_bg_color');
                $wflp_form_bgopacity_tog = get_sub_field('wflp_hero_form_bgopac_toggle');
                $wflp_form_bgopacity = get_sub_field('wflp_hero_form_bgopac');
                $wflp_form_bgradius = get_sub_field('wflp_hero_form_bradius');
            endwhile;
        endif; 

        if( have_rows('wflp_hero_form_input_settings') ):
            while( have_rows('wflp_hero_form_input_settings') ): the_row(); 
                $wflp_form_input_lable_txtcolor = get_sub_field('wflp_hero_form_input_label_color');
                $wflp_form_input_field_txtcolor = get_sub_field('wflp_hero_form_input_field_color');
                $wflp_form_input_field_bgcolor = get_sub_field('wflp_hero_form_input_bg_color');
                $wflp_form_input_field_bgopacity_tog = get_sub_field('wflp_hero_form_input_bg_opac_toggle');
                $wflp_form_input_field_bgopacity = get_sub_field('wflp_hero_form_input_bg_opac');
                $wflp_form_input_field_bradius = get_sub_field('field_border_radius');
            endwhile;
        endif;

        if( have_rows('wflp_hero_form_submit_settings') ):
            while( have_rows('wflp_hero_form_submit_settings') ): the_row(); 
                $wflp_form_submit_txtcolor = get_sub_field('wflp_hero_form_submit_text_color');
                $wflp_form_submit_bgtransparency = get_sub_field('wflp_hero_form_submit_bg_transparency');
                $wflp_form_submit_bgcolor = get_sub_field('wflp_hero_form_submit_bg_color');
                $wflp_form_submit_bradius = get_sub_field('wflp_hero_form_submit_border_radius');
                $wflp_form_submit_bwidth = get_sub_field('wflp_hero_form_submit_border_width');
                $wflp_form_submit_bcolor = get_sub_field('wflp_hero_form_submit_border_color');
            endwhile;
        endif;

    endwhile;
endif;
?>

<style>
    .wflp-form-area:before {
        background-color: <?php echo $wflp_form_bgcolor; ?>; 
        border-radius: <?php echo $wflp_form_bgradius; ?>px; 
        <?php if( $wflp_form_bgopacity_tog ==  'formbgopac-on' ) : ?>
        opacity: .<?php echo $wflp_form_bgopacity; ?>;
        <?php endif; ?>
    }

    .wflp-form-area .gform_body,
    .wflp-form-area .gform_body .gfield_label,
    .wflp-form-area .gform_wrapper .gfield_required {color: <?php echo $wflp_form_input_lable_txtcolor; ?>;}
    .wflp-form-area .gform_body input,
    .wflp-form-area .gform_body textarea,
    .wflp-form-area .gform_body select {
        <?php if( $wflp_form_input_field_bgopacity_tog ==  'fieldbgopac-off' ) : ?>
        background-color: <?php echo $wflp_form_input_field_bgcolor; ?>; 
        <?php elseif( $wflp_form_input_field_bgopacity_tog ==  'fieldbgopac-on' ) : ?>
        background-color: rgba(255,255,255,0.<?php echo $wflp_form_input_field_bgopacity; ?>); 
        <?php endif; ?>
        border-radius: <?php echo $wflp_form_input_field_bradius; ?>px;
        color: <?php echo $wflp_form_input_field_txtcolor; ?>;
    }
    
    .wflp-form-area .gform_footer input[type='submit'] {
        <?php if( $wflp_form_submit_bgtransparency ==  'submit-btn-solid' ) : ?>
        background-color: <?php echo $wflp_form_submit_bgcolor; ?>; 
        <?php elseif( $wflp_form_submit_bgtransparency ==  'submit-btn-transparent' ) : ?>
        background-color: transparent; 
        <?php endif; ?>
        color: <?php echo $wflp_form_submit_txtcolor; ?>;
        border: <?php echo $wflp_form_submit_bwidth; ?>px solid <?php echo $wflp_form_submit_bcolor; ?> !important;
        border-radius: <?php echo $wflp_form_submit_bradius; ?>px;
    }

    

    @media screen and (min-width: 992px) {
        .wflp-form-area {max-width: <?php echo $wflp_form_width; ?>px;}
    }
</style>

<?php if($wflp_hero_form): ?>
<div class="wflp-form-area">
    <?php echo do_shortcode($wflp_hero_form); ?>
</div>
<?php endif; ?>