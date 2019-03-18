<?php
if( have_rows('flexible_content_fields') ):
     // loop through the rows of data
    while ( have_rows('flexible_content_fields') ) : the_row();
	    switch(get_row_layout()){

		    case 'basic_content' :
				get_template_part( 'content-parts/fcs', 'basic_content');
		    	break;
		    case 'gallery' :
				get_template_part( 'content-parts/fcs', 'gallery');
		    	break;
		    case 'tabbed_section' :
				get_template_part( 'content-parts/fcs', 'tabbed_section');
		    	break;
		    case 'accordion' :
				get_template_part( 'content-parts/fcs', 'accordion');
		    	break;
		    case 'slideshow' :
				get_template_part( 'content-parts/fcs', 'slideshow');
		    	break;
		    case 'divider' :
				get_template_part( 'content-parts/fcs', 'divider');
		    	break;
		    case 'spacer' :
				get_template_part( 'content-parts/fcs', 'spacer');
		    	break;
		    case 'two_column_callouts' :
				get_template_part( 'content-parts/fcs', 'two_column_callouts');
		    	break;
		    case 'client_logo_slider' :
				get_template_part( 'content-parts/fcs', 'client_logo_slider');
				break;
		    case 'three_column_callouts' :
				get_template_part( 'content-parts/fcs', 'three_column_callouts');
		    	break;
		    case 'three_column_callouts_internal' :
				get_template_part( 'content-parts/fcs', 'three_column_callouts_internal');
		    	break;
		    case 'icon_link_section' :
				get_template_part( 'content-parts/fcs', 'icon_link_section');
				break;
		    case 'faq_callout' :
				get_template_part( 'content-parts/fcs', 'faq_callout');
				break;
		    case 'process' :
				get_template_part( 'content-parts/fcs', 'process');
				break;
		    case 'difference' :
				get_template_part( 'content-parts/fcs', 'difference');
				break;
		    case 'product_galleries' :
				get_template_part( 'content-parts/fcs', 'product_galleries');
				break;			
		    case 'product_galleries_not_categorized' :
				get_template_part( 'content-parts/fcs', 'product_galleries_not_categorized');
				break;			
			default:
				break;
	    }
    endwhile;
else :
    // no layouts found
endif;
?>