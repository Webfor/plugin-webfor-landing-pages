<?php
// Plugin Options Settings Fields
if( have_rows('wflp_brand_colors', 'option') ):
	while( have_rows('wflp_brand_colors', 'option') ): the_row(); 
		$color_primary = get_sub_field('wflp_primary_color');
		$color_secondary = get_sub_field('wflp_secondary_color');
		$color_highlight = get_sub_field('wflp_highlight_color');
    endwhile;
endif; ?>

<style type="text/css">
    .color-primary {color: <?php echo $color_primary; ?>;}
    .color-secondary {color: <?php echo $color_secondary; ?>;}
    .color-highlight {color: <?php echo $color_highlight; ?>;}

    .background-primary {color: <?php echo $color_primary; ?>;}
    .background-secondary {color: <?php echo $color_secondary; ?>;}
    .background-highlight {color: <?php echo $color_highlight; ?>;}

    .wflp-btn-primary {
        background-color: <?php echo $color_primary; ?>;
        border-color: <?php echo $color_primary; ?>;
    }
    .wflp-btn-primary:hover, 
    .wflp-btn-primary:active, 
    .wflp-btn-primary:focus {
        background-color: <?php echo $color_secondary; ?>;
        border-color: <?php echo $color_secondary; ?>;
    }

    .wflp-btn-secondary {
        background-color: <?php echo $color_secondary; ?>;
        border-color: <?php echo $color_secondary; ?>;
    }
    .wflp-btn-secondary:hover, 
    .wflp-btn-secondary:active, 
    .wflp-btn-secondary:focus {
        background-color: <?php echo $color_primary; ?>;
        border-color: <?php echo $color_primary; ?>;
    }

    .wflp-btn-outline.outline-primary, 
    .wflp-btn-outline.outline-primary, 
    .wflp-btn-outline.outline-primary {
        color: <?php echo $color_primary; ?>;
        border-color: <?php echo $color_primary; ?>;
    }

    .wflp-btn-outline.outline-secondary, 
    .wflp-btn-outline.outline-secondary, 
    .wflp-btn-outline.outline-secondary {
        color: <?php echo $color_secondary; ?>;
        border-color: <?php echo $color_secondary; ?>;
    }

    .wflp-btn-outline:hover, 
    .wflp-btn-outline:active, 
    .wflp-btn-outline:focus {
        background-color: <?php echo $color_primary; ?>;
        border-color: <?php echo $color_primary; ?>;
    }

    .wflp-btn-outline.outline-secondary:hover, 
    .wflp-btn-outline.outline-secondary:active, 
    .wflp-btn-outline.outline-secondary:focus {
        background-color: <?php echo $color_secondary; ?>;
    }

    .wflp-header:before {
        background-color: <?php echo $hdr_bgcol; ?>;
        opacity: .<?php echo $hdr_bgopac; ?>;
    }

    .wflp-footer .social-links a i {color: <?php echo $ftr_bgcol; ?>;}
</style>