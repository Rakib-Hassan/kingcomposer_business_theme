<?php
/**
 * Plugin Name:kingcomposer addons
 * Description: addons is a fields where you add many feature.
 * Plugin URI: http://
 * Author: Author
 * Author URI: http://#
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: addons001
 * Domain Path: domain/path
 */
add_action('init', 'amazing');
 
function amazing() {
 
	if (function_exists('kc_add_map')) { 
	    kc_add_map(
	        array(
	        	// amp image 
	            'kc_icon' => array(
	                'name' => 'rakib',
	                'description' => __('Display single icon', 'KingComposer'),
	                'icon' => 'sl-picture',
	                'category' => 'Amazing',
	                'params' => array(
	                    'Image' => array(
	                    	array(
	                        'name' => 'Amp image',
	                        'label' => 'Select Image',
	                        'type' => 'attach_image_url',
	                        'admin_label' => true,
	                    )
	                    ),
	      
	                    'Style' => array(
		                array(
		                    'name' => 'amp-width',
		                    'label' => 'width',
		                    'type' => 'text',
		                    'description' => 'Inter Image Width',
		                ),
		                array(
		                    'name' => 'amp-height',
		                    'label' => 'height',
		                    'type' => 'text',
		                    'description' => 'Inter Image Height',
		                ),
		                array(
		                	'name'=>'amp-div',
		                	'label'=>'Div Name',
		                	'type'=>'text',
		                	'description'=>'Inter Div name'
		                )
	                ),
	                )
	            ),
	            
	            'image_name' => array(
	                'name' => ' Image',
	                'description' => __('Display single icon', 'KingComposer'),
	                'icon' => 'sl-picture',
	                'category' => 'Amazing',
	                'params' => array(
	                    'Image' => array(
	                    	array(
	                        'name' => 'image',
	                        'label' => 'Select Image',
	                        'type' => 'attach_image_url',
	                        'admin_label' => true,
	                    )
	                    ),
	                )
	            ),  // End of elemnt kc_icon 

	        )

	    ); // End add map
	
	} // End if
}  
?>