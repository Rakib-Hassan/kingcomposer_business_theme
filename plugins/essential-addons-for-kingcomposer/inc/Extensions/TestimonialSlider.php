<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class TestimonialSlider extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'testimonialslider' ) ) {
				return;
			}
			add_shortcode( 'testimonialslider', array( $this, 'testimonialslider_func' ) );
			add_action( 'init', array( $this, 'testimonialslider' ) );

		}

		public function testimonialslider() {
			global $kc;
			$kc->add_map( array(
				'testimonialslider' => array(
					'name'        => 'Testimonial Slider',
					'description' => __( 'Awesome Testimonial Item You Can Add in your Wordpress', 'KingComposer' ),
					'icon'        => 'testimonial_slider',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(
						// General Group Start
						'Add Items' => array(
							array(
								'type'        => 'group',
								'label'       => __( 'Add Testimonial Items', 'KingComposer' ),
								'name'        => 'acoptions',
								'description' => __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'KingComposer' ),
								'options'     => array( 'add_text' => __( 'Add new items', 'kingcomposer' ) ),

								'params' => array(
									array(
										'name'  => 'client_image',
										'label' => 'Upload Client Image',
										'type'  => 'attach_image',
									),
									array(
										'name'  => 'cl_name',
										'label' => 'Client Name',
										'type'  => 'text',
										'value' => __( 'Client Name Here', 'KingComposer' ),
									),
									array(
										'name'  => 'cl_label',
										'label' => 'Client Label',
										'type'  => 'text',
										'value' => __( 'Client Label here', 'KingComposer' ),
									),

									array(
										'type'        => 'textarea',
										'label'       => __( 'Testimonial Description', 'kingcomposer' ),
										'name'        => 'testi_descr',
										'description' => __( 'Description of the Testimonial.', 'kingcomposer' ),
										'admin_label' => true,
										'value'       => base64_encode( 'Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo' ),
									),

									array(
										'name' => 'testi_rating',
										'label' => 'Rating',
										'type' => 'select',  // USAGE SELECT TYPE
										'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
											'no_rating' => 'No Rating',
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
										),
										'value' => 5, // remove this if you do not need a default content
										'description' => 'Field Description',
									),


								),
							),
						),

						// General Group End

						'Setting' => array(
							array(
								'name' => 'show_dots',
								'label' => 'Show Dots?',
								'type' => 'toggle',
								'value' => 'yes',
								'description' => 'Check Yes If you want to Show Dots in Testimonial slide'
							),


							array(
								'name' => 'slider_speed',
								'label' => 'Slider Speed',
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 200,
									'max' => 5000,
									'unit' => 'ms',
									'show_input' => true
								),

								'value' => 800, // remove this if you do not need a default content
								'description' => 'Duration of Slide Speed, Default is 800 (in ms)',
							),

							array(
								'name' => 'auto_testi',
								'label' => 'Autoplay?',
								'type' => 'toggle',
								'value' => 'yes',
								'description' => 'Check Yes If you want to autoplay Testimonial'
							),
							array(
								'name' => 'loop_testi',
								'label' => 'Loop Autoplay?',
								'type' => 'toggle',
								'value' => 'yes',
								'relation' => array(
									'parent'    => 'auto_testi',
									'show_when' => 'yes'
								),
								'description' => 'Check Yes If you want to  Loop Items as autoplay Testimonial'
							),
							array(
								'name' => 'hover_auto_pause',
								'label' => 'Pause Autoplay on Hover?',
								'type' => 'toggle',
								'value' => 'yes',
								'relation' => array(
									'parent'    => 'auto_testi',
									'show_when' => 'yes'
								),
								'description' => 'Check Yes If you want to pause autoplay on Hover'
							),

							array(
								'name' => 'autoplay_duration',
								'label' => 'Autoplay Duration',
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 1000,
									'max' => 15000,
									'unit' => 'ms',
									'show_input' => true
								),
								'relation' => array(
									'parent'    => 'auto_testi',
									'show_when' => 'yes'
								),

								'value' => 4000, // remove this if you do not need a default content
								'description' => 'Chose Autoplay Duratoin as MS. Default is 4000MS',
							),

							array(
								'name' => 'testi_ani_in',
								'label' => 'Animation In',
								'type' => 'select',  // USAGE SELECT TYPE
								'options' => $this->animate_css_field(),
								'value' => 'flipInX',
								'description' => 'Field Description',
							),
							array(
								'name' => 'testi_ani_out',
								'label' => 'Animation Out',
								'type' => 'select',  // USAGE SELECT TYPE
								'options' => $this->animate_css_field(),
								'value' => 'slideOutDown', // remove this if you do not need a default content
								'description' => 'Field Description',
							),

						),

						'styling' => array(
							array(
								'name'    => 'css_custom',
								'type'    => 'css',
								'options' => array(
									array(
										"screens"    => "any,1024,999,767,479",
										'Quote'       => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial:before' ),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial:before'),

										),
										'Image' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '.eak-testimonial .pic'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '.eak-testimonial .pic'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.eak-testimonial .pic'),

											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial .pic'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial .pic'),
										),

										'Description' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial .description' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-testimonial .description'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial .description'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-testimonial .description'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial .description'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial .description'),
										),

										'Name' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial .eak-testimonial-title' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-testimonial .eak-testimonial-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial .eak-testimonial-title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-testimonial .eak-testimonial-title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial .eak-testimonial-title'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial .eak-testimonial-title'),
											),
										'Label' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial .post' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-testimonial .post'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial .post'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-testimonial .post'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '. .eak-testimonial .post'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial .post'),
											),

										'Rating' => array(
											array( 'property' => 'color', 'label' => 'Active Color', 'selector' => '.eak-testimonial #testi_star' ),
											array( 'property' => 'color', 'label' => 'Inactive Color', 'selector' => '.eak-testimonial #testi_nonestar' ),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '#testi_star, #testi_nonestar '),
										),
										'Dots' => array(
											array( 'property' => 'background-color', 'label' => 'Color', 'selector' => '.eakowlDot' ),
											array( 'property' => 'background-color', 'label' => 'Hover Color', 'selector' => '.eakowlDot:hover' ),
											array( 'property' => 'background-color', 'label' => 'Active Color', 'selector' => '.eakowlDot.active' ),
										),

										'Background' => array(
											array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => '.eak-testimonial' ),
											array('property' => 'box-shadow', 'label' => 'Bow Shadow', 'selector' => '.eak-testimonial'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.eak-testimonial'),
										),
									),
								),
							),
						),

					),
				),
			) );
		}

		// Register Before After Shortcode
		function testimonialslider_func( $atts, $content = null ) {
			extract( shortcode_atts( array(
				'descr_font_size' => '',
				'name_font_size'  => '',
				'c_descr_color'   => '',
				'c_label_color'   => '',
				'c_name_col'      => '',
				'client_image'    => '',
				'cl_name'         => 'Maxdew',
				'cl_label'        => 'Web Developer',
				'testi_descr'     => '',
				'test_margin'     => '',
				'test_width'      => '',
				'auto_testi'      => '',
				'acoptions'      => '',
				'loop_testi'      => '',
				'hover_auto_pause'      => '',
				'autoplay_duration'      => '',
				'testi_ani_in'      => '',
				'testi_ani_out'      => '',
				'show_dots'      => '',
				'slider_speed'      => '',

			), $atts ) );

			// CSS BOX STYLE
			$css_class   = apply_filters( 'kc-el-class', $atts );
			$css_class[] = 'eak-testi-slider-wrapper';

			$acoptions = $atts['acoptions'];
			$i = uniqid(); // Testimonial Slider Unique ID
			$auto_testi = $auto_testi == 'yes' ? 'true' : 'false';
			$loop_testi = $loop_testi == 'yes' ? 'true' : 'false';
			$hover_auto_pause = $hover_auto_pause == 'yes' ? 'true' : 'false';
			$show_dots = $show_dots == 'yes' ? 'true' : 'false';
			$autoplay_duration = str_replace("ms","",$autoplay_duration);
			$slider_speed = str_replace("ms","",$slider_speed);


			$output   = '<div id="eak-testimonial-slider'.$i.'" class="owl-carousel owl-theme ' . esc_attr( implode( " ", $css_class ) ) . '">';

			if ( isset( $acoptions ) ) {
				foreach ( $acoptions as $option ) {
					$option->client_image = wp_get_attachment_image_src( $option->client_image, 'thumbnail', 'full' );

					$output  .= '<div class="eak-testimonial">
                        <div class="pic">
                            <img src="'.$option->client_image[0].'" alt="">
                        </div>
                        <p class="description">
                            '.$option->testi_descr.'
                        </p>
                        <h3 class="eak-testimonial-title">'.$option->cl_name.' <span class="post">'.$option->cl_label.'</span></h3>';

						if ($option->testi_rating !== "no_rating"){

                        $output .= '<ul class="eak-testimonial-rating">';

								$testi_nonerating = 5 - $option->testi_rating; // None Rating

								for ($x = 1; $x <= $option->testi_rating; $x++) {
									$output .= '  <li class="fa fa-star" id="testi_star"></li>';
								}

								for ($x = 1; $x <= $testi_nonerating; $x++) {
									$output .= ' <li class="fa fa-star" id="testi_nonestar"></li>';
								}

                         $output .= ' </ul>';
						}

                    $output .= '</div>';
				}

			}

			$output .= '</div>';
			$output .= '<script type="text/javascript">

			    jQuery("#eak-testimonial-slider'.$i.'").owlCarousel({
			        items:1,
			        animateIn: "'.$testi_ani_in.'",
			        animateOut: "'.$testi_ani_out.'",
			        autoplay:'.$auto_testi.',
			        loop:'.$loop_testi.',
			     	autoplayTimeout:'.$autoplay_duration.',
			    	autoplayHoverPause:'.$hover_auto_pause .',
			    	dots: '.$show_dots.',
			    	smartSpeed: '.$slider_speed.',
			    	dotClass: "eakowlDot",
			    	dotsClass: "eakowlDots"
			    });
			</script>';

			return $output;
		}
	}

}