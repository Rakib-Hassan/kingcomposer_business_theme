<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class ZoomMagnifier extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'zoommagnifier' ) ) {
				return;
			}
			add_shortcode( 'eak_zoom_magnifier', array( $this, 'zoom_magnifier_fucn' ) );
			add_action( 'init', array( $this, 'zoommagnifier' ) );
		}

		public function zoommagnifier() {
			global $kc;
			$kc->add_map( array(
				'eak_zoom_magnifier' => array(
					'name'        => 'Zoom Magnifier',
					'description' => __( 'Zoom your Image with Various Design', 'rdextkc' ),
					'icon'        => 'eak_zoom_margnifier',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(
						'General' => array(
							array(
								'name'        => 'zm_small_image',
								'label'       => __( 'Uoload Small Image', 'eak_kingcomposer' ),
								'type'        => 'attach_image',
								"description" => __( "select Small Image For Zoom Magnifier", "eak_kingcomposer" ),
							),

							array(
								'name'        => 'zm_large_image',
								'label'       => __( 'Uoload Large Image', 'eak_kingcomposer' ),
								'type'        => 'attach_image',
								"description" => __( "select Large Image For Zoom Magnifier", "eak_kingcomposer" ),
							),
						),
						'Options' => array(

							/* Zoom Type*/
							array(
								'name'        => 'eak_zoom_type',
								'label'       => __( 'Zoom Type', 'eak_kingcomposer' ),
								'type'        => 'select',  // USAGE SELECT TYPE
								'options'     => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'window' => __( 'Window', 'eak_kingcomposer' ),
									'lens'   => __( 'Lens', 'eak_kingcomposer' ),
									'inner'  => __( 'Inner', 'eak_kingcomposer' ),
								),
								'value'       => 'window', // remove this if you do not need a default content
								'description' => 'Possible Values: Lens, Window, Inner',
								'admin_label' => true,
							),
							/* Zoom Window Width*/
							array(
								'name'        => 'zoomwindow_width',
								'label'       => __( 'Width of the zoomWindow', 'eak_kingcomposer' ),
								'type'        => 'number_slider',
								'value'       => 300,
								'options'     => array(
									'min'        => 100,
									'max'        => 1500,
									'unit'       => '',
									'show_input' => true,
								),
								'description' => 'Width of the zoomWindow (Note: zoomType must be "window")',
								'relation'    => array(
									'parent'    => 'eak_zoom_type',
									'show_when' => 'window',
								),
							),
							/* Zoom Window Height*/
							array(
								'name'        => 'zoomwindow_height',
								'label'       => __( 'Height of the zoomWindow', 'eak_kingcomposer' ),
								'type'        => 'number_slider',
								'value'       => 300,
								'options'     => array(
									'min'        => 100,
									'max'        => 1500,
									'unit'       => '',
									'show_input' => true,
								),
								'description' => 'Height of the zoomWindow (Note: zoomType must be "window"))',
								'relation'    => array(
									'parent'    => 'eak_zoom_type',
									'show_when' => 'window',
								),
							),
							/* Zoom Window Position*/
							array(
								'name'        => 'zoomwindow_position',
								'label'       => __( 'Zoom Window Position', 'eak_kingcomposer' ),
								'type'        => 'number_slider',
								'value'       => 1,
								'options'     => array(
									'min'        => 1,
									'max'        => 16,
									'unit'       => '',
									'show_input' => true,
								),
								"description" => __( "Chose Position Of Zoom Widdow view, See zoom Position Here<a target ='_blank' href='http://www.elevateweb.co.uk/wp-content/themes/radial/window-positions.png'> Check Here</a>", "eak_kingcomposer" ),
								'relation'    => array(
									'parent'    => 'eak_zoom_type',
									'show_when' => 'window',
								),
							),
							/* Lens Size*/
							array(
								'name'        => 'zoomlens_size',
								'label'       => __( 'Zoom Lens Size', 'eak_kingcomposer' ),
								'type'        => 'number_slider',
								'value'       => 200,
								'options'     => array(
									'min'        => 100,
									'max'        => 500,
									'unit'       => '',
									'show_input' => true,
								),
								"description" => __( "used when zoomType set to lens, when zoom type is set to window, then the lens size is auto calculated", "eak_kingcomposer" ),
								'relation'    => array(
									'parent'    => 'eak_zoom_type',
									'show_when' => 'lens',
								),
							),

							/* Lens Shape*/
							array(
								'name'        => 'eak_lens_shape',
								'label'       => __( 'Lens Shape', 'eak_kingcomposer' ),
								'type'        => 'select',  // USAGE SELECT TYPE
								'options'     => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'square' => __( 'Square', 'eak_kingcomposer' ),
									'round'  => __( 'Round', 'eak_kingcomposer' ),
								),
								'value'       => 'square', // remove this if you do not need a default content
								'description' => __( 'can also be round (note that only modern browsers support round, will default to square in older browsers', 'eak_kingcomposer' ),
								'admin_label' => true,
							),
							/* Easing Effects */
							array(
								'name'        => 'eak_easing',
								'label'       => __( 'easing?', 'eak_kingcomposer' ),
								'type'        => 'toggle',
								'value'       => 'no',
								'description' => __( 'Set to true to activate easing. Possible Values: "True", "False"', 'eak_kingcomposer' ),
							),

							/* Cursor*/
							array(
								'name'        => 'eak_cursor',
								'label'       => __( 'Cursor Type', 'eak_kingcomposer' ),
								'type'        => 'select',  // USAGE SELECT TYPE
								'options'     => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'default'   => __( 'Default', 'eak_kingcomposer' ),
									'cursor'    => __( 'Cursor', 'eak_kingcomposer' ),
									'pointer'   => __( 'Pointer', 'eak_kingcomposer' ),
									'crosshair' => __( 'crosshair', 'eak_kingcomposer' ),
								),
								'value'       => 'default', // remove this if you do not need a default content
								'description' => __( 'The default cursor is usually the arrow, if using a lightbox, then set the cursor to pointer so it looks clickable - Options are default, cursor, crosshair', 'eak_kingcomposer' ),
							),
							/* Easing Effects */
							array(
								'name'        => 'eak_scroll_zoom',
								'label'       => __( 'Scroll Zoom?', 'eak_kingcomposer' ),
								'type'        => 'toggle',
								'value'       => 'no',
								'description' => __( 'Set to true to activate zoom on mouse scroll. Possible Values: "True", "False"', 'eak_kingcomposer' ),
							),

						),

					),
				),
			) );
		}

		// Register Before After Shortcode
		function zoom_magnifier_fucn( $atts, $content = null, $tag ) {

			extract( shortcode_atts( array(
				"zm_small_image"        => '',
				"zm_large_image"        => '',
				"eak_zoom_type"         => '',
				"zoomwindow_width"      => '',
				"zoomwindow_height"     => '',
				"zoomwindow_position"   => '',
				"zoomlens_size"         => '',
				"eak_lens_shape"        => '',
				"eak_easing"            => '',
				"eak_cursor"            => '',
				"eak_scroll_zoom"       => '',
			), $atts ) );


			$zm_small_image = wp_get_attachment_image_src( $zm_small_image, 'full' );
			$zm_large_image = wp_get_attachment_image_src( $zm_large_image, 'full' );

			$i = uniqid(); //Generate Unique ID

			$eak_easing            = $eak_easing == 'yes' ? 'true' : 'false';
			$eak_scroll_zoom       = $eak_scroll_zoom == 'yes' ? 'true' : 'false';
			//$output = '<div class="eak-zoom-magnify">';
			$output = '<img class="eak-zoom-magnify" id="zoom_magnify' . $i . '" src="' . $zm_small_image[0] . '" data-zoom-image="' . $zm_large_image[0] . '"/>';
			//$output = '</div>';


			$output .= '<script>
						jQuery(document).ready(function($){
							$("#zoom_magnify' . $i . '").elevateZoom({
							lensSize: ' . $zoomlens_size . ',
							scrollZoom : ' . $eak_scroll_zoom . ',
							zoomWindowWidth: ' . $zoomwindow_width . ',
							zoomWindowHeight 	: ' . $zoomwindow_height . ',
							zoomWindowPosition: ' . $zoomwindow_position . ',
							lensShape: "' . $eak_lens_shape . '",
							zoomType: "' . $eak_zoom_type . '",
							cursor: "' . $eak_cursor . '", 
							easing : ' . $eak_easing . ',	
						});

						   }); 
					</script>';

			return $output;
		}
	}

}