<?php global $option_setting;
$count = 1;
if (isset($option_setting['slider-enable-on-home'])) :
	if( $option_setting['slider-enable-on-home'] && (is_front_page() || is_home() )) : 
		if ( count($option_setting['slider-main']) > 0 ) : ?>
	
	    <div id="slider-wrapper">
	    <ul class="bxslider">
	    	<?php
			  		foreach ( $option_setting['slider-main'] as $slider ) {
			  				if ($count > 5) { break; }
							echo "<li><a href='".esc_url($slider['url'])."'><img src='".$slider['image']."'>";
							if ($slider['description'] || $slider['title']) :
								echo "<div class='slider-caption'><div class='slider-caption-title'>".$slider['title']."</div><div class='slider-caption-desc'>".$slider['description']."</div></div>";
							endif;
							
							echo "</a></li>";  
							$count++;  
					}
	           ?>
	     </ul>   
		</div>
	    
	<?php endif;
	endif; 
endif; ?>