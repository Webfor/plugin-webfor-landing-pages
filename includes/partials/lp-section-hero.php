<?php 
// Grab hero template option 
if( have_rows('wflp_hero_settings') ):
    while( have_rows('wflp_hero_settings') ): the_row(); 
        $hero_template = get_sub_field('wflp_hero_template');
    endwhile;
endif; 

// Include proper hero template file based on selection from heros folder
if ( $hero_template == 'hero-simple' ) {

    include 'heros/hero-simple.php';

} elseif ( $hero_template == 'hero-trustlogos') {

    include 'heros/hero-trustlogos.php'; 

}

?>