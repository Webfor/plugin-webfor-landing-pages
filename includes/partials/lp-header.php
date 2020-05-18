<?php 
//  Header Section Setting Fields
if( have_rows('wflp_header_settings') ):
    while( have_rows('wflp_header_settings') ): the_row(); 
    
		$hdr_toggle = get_sub_field('wflp_header_toggle');
		$hdr_style = get_sub_field('wflp_header_style');
		$hdr_bgcol = get_sub_field('wflp_header_bgcolor');
        // Uncomment below if deciding to give ability to change header position
        // $hdr_bgopac = get_sub_field('wflp_header_bgopcaity');

		if( have_rows('wflp_header_cta') ):
			while( have_rows('wflp_header_cta') ): the_row(); 
				$hdr_cta_style = get_sub_field('wflp_header_cta_style');
				$hdr_cta_radius = get_sub_field('wflp_header_cta_radius');
				$hdr_cta_link = get_sub_field('wflp_header_cta_link');
			endwhile;
        endif; 
        
	endwhile;
endif; 
?>

<!-- START: Header Section -->
<header 
    class="wflp-header <?php echo $hdr_style; ?> <?php echo $hdr_toggle; ?>"
    style="background-color: <?php echo $hdr_bgcol; ?>;">

    <div class="container-width">
        <?php if($hdr_style == 'logo-left') : ?>

            <div class="wflp-site-logo"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>" /></div>

            <?php if($hdr_cta_link): ?>

            <div class="wflp-hdr-cta">
                <a 
                    class="wflp-btn <?php echo $hdr_cta_style; ?>" 
                    href="<?php echo $hdr_cta_link['url']; ?>"
                    style="border-radius: <?php echo $hdr_cta_radius; ?>px;">
                        <?php echo $hdr_cta_link['title']; ?>
                    </a>
            </div>

            <?php endif; ?>

        <?php elseif($hdr_style == 'logo-center') : ?>

            <div class="text-center">

                <div class="wflp-site-logo"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>" /></div>
                
            </div>

        <?php endif; ?>
    </div>
        
</header>
<!-- END: Header Section -->