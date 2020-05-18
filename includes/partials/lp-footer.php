<?php
// Footer Section Setting Fields
if( have_rows('wflp_footer_settings') ):
	while( have_rows('wflp_footer_settings') ): the_row(); 
		$wflp_ftr_bgcol = get_sub_field('wflp_footer_bgcolor');
		$wflp_ftr_fontcol = get_sub_field('wflp_footer_fontcolor');
        $wflp_ftr_legal = get_sub_field('wflp_footer_legaltxt');
	endwhile;
endif; 
?>

<!-- START: Footer Section -->
<footer class="wflp-footer" <?php if($wflp_ftr_bgcol): ?>style="background-color: <?php echo $wflp_ftr_bgcol; ?>;"<?php endif; ?>>

    <div class="container-width">

        <div class="wflp-footer-logo"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>" /></div>

        <?php if($wflp_ftr_legal): ?>
            <p class="footer-legal" <?php if($wflp_ftr_fontcol): ?>style="color: <?php echo $wflp_ftr_fontcol; ?>;"<?php endif; ?>><?php echo $wflp_ftr_legal; ?></p>
        <?php endif; ?>
        <?php if( have_rows('wflp_social_links', 'option') ): ?>
        <div class="social-links">
            <?php while( have_rows('wflp_social_links','option') ): the_row();
                $channel = get_sub_field('wflp_social_channel');
                $link = get_sub_field('wflp_social_url');
                ?>
                <a href="<?php echo $link; ?>" target="_blank"><i class="fa fa-<?php echo $channel; ?>" style="color: <?php echo $wflp_ftr_bgcol; ?>;"></i></a>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>


    </div>
        
</footer>
<!-- END: Footer Section -->