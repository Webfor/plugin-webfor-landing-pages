<?php
/**
 * Flex content for beneath pages' content.
 *
 * @package understrap
 */

if ( have_rows( 'wflp_modules' ) ) {

	while ( have_rows( 'wflp_modules' ) ) : the_row();

		if ( get_row_layout() == 'wflp_fc_standard' ) {

            include 'flex-content/standard-content.php'; 

		} elseif ( get_row_layout() == 'wflp_fc_halfscreen' ) {
            
            include 'flex-content/halfscreen-content.php'; 
            
		} elseif ( get_row_layout() == 'wflp_fc_testimonials' ) {
            
            include 'flex-content/testimonials.php'; 
            
		} elseif ( get_row_layout() == 'wflp_fc_tlogos' ) {
            
            include 'flex-content/trust-logos.php'; 
            
		}

	endwhile;
};

?>