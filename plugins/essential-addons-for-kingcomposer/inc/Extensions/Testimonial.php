<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class testimonial extends ExtensionsController {

		public function extensions_register() {
			if ( ! $this->activated( 'testimonial' ) ) {
				return;
			}
			add_shortcode( 'testimonial', array( $this, 'testimonial_func' ) );
			add_action( 'init', array( $this, 'testimonial' ) );

		}

		public function testimonial() {
			global $kc;
			$kc->add_map( array(
				'testimonial' => array(
					'name'        => 'Testimonial',
					'description' => __( 'Awesome Testimonial Item You Can Add in your Wordpress', 'KingComposer' ),
					'icon'        => 'icon-testimonial',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(
						// General Group Start
						'Add Items' => array(
							array(
								'name'  => 'client_image',
								'label' => 'Upload Client Image',
								'type'  => 'attach_image',
							),
							array(
								'name'  => 'cl_name',
								'label' => 'Client Name',
								'type'  => 'text',
								'admin_label' => true,
								'value' => __( 'Client Name Here', 'KingComposer' ),
							),
							array(
								'name'  => 'cl_label',
								'label' => 'Client Label',
								'admin_label' => true,
								'type'  => 'text',
								'value' => __( 'Client Label here', 'KingComposer' ),
							),

							array(
								'type'        => 'textarea',
								'label'       => __( 'Testimonial Description', 'kingcomposer' ),
								'name'        => 'testi_descr',
								'description' => __( 'Description of the Testimonial.', 'kingcomposer' ),
								'value'       => base64_encode( 'Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo' ),
							),
							array(
								'name'        => 'show_rating',
								'label'       => 'Show Rating?',
								'type'        => 'toggle',
								'value'       => 'yes',
								'description' => 'Check Yes If you want to Show rating for Testimonial Item',
							),
							array(
								'name'        => 'testi_rating',
								'label'       => 'Rating',
								'type'        => 'select',  // USAGE SELECT TYPE
								'options'     => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'no_rating' => 'No Rating',
									'1'         => '1',
									'2'         => '2',
									'3'         => '3',
									'4'         => '4',
									'5'         => '5',
								),
								'value'       => 5, // remove this if you do not need a default content
								'relation' => array(
									'parent'    => 'show_rating',
									'show_when' => 'yes'
								)
							),

						),

						// General Group End

						'styling' => array(
							array(
								'name'    => 'css_custom',
								'type'    => 'css',
								'options' => array(
									array(
										"screens" => "any,1024,999,767,479",
										'Quote'   => array(
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial-2 .bottom-conetent .icon i:before' ),
										array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial-2 .bottom-conetent .icon i:before' ),
									),
										'Image'   => array(
											array( 'property' => 'width', 'label' => 'Width', 'selector' => '.eak-testimonial-2 .eak-upper-conent .thumb img' ),
											array( 'property' => 'height', 'label' => 'Height', 'selector' => '.eak-testimonial-2 .eak-upper-conent .thumb img' ),
											array( 'property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.eak-testimonial-2 .eak-upper-conent .thumb img' ),

											array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial-2 .eak-upper-conent .thumb img' ),
											array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial-2 .eak-upper-conent .thumb img' ),
										),

										'Description' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial-2 .bottom-conetent p' ),
											array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-testimonial-2 .bottom-conetent p' ),
											array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial-2 .bottom-conetent p' ),
											array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-testimonial-2 .bottom-conetent p' ),
											array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial-2 .bottom-conetent p' ),
											array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial-2 .bottom-conetent p' ),
										),

										'Name'  => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .name' ),
											array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .name' ),
											array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .name' ),
											array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .name' ),
											array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .name' ),
											array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .name' ),
										),
										'Label' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .designation' ),
											array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .designation' ),
											array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .designation' ),
											array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .designation' ),
											array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .designation' ),
											array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-testimonial-2 .eak-upper-conent .eak-clients-details .content .designation' ),
										),

										'Rating' => array(
											array( 'property' => 'color', 'label' => 'Active Color', 'selector' => '.eak-testi-rating #testi_star' ),
											array( 'property' => 'color', 'label' => 'Inactive Color', 'selector' => '.eak-testi-rating #testi_star' ),
											array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-testi-rating #testi_star ' ),
										),
										'Background' => array(
											array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => 'eak-testimonial-2' ),
											array( 'property' => 'box-shadow', 'label' => 'Bow Shadow', 'selector' => 'eak-testimonial-2' ),
											array( 'property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'eak-testimonial-2' ),
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
		function testimonial_func( $atts, $content = null ) {
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
				'testi_rating'    => '',
				'show_rating'     => '',

			), $atts ) );

			// CSS BOX STYLE
			$css_class    = apply_filters( 'kc-el-class', $atts );
			$css_class[]  = 'eak-testi-slider-wrapper';
			$i            = uniqid(); // Testimonial Slider Unique ID
			$rating       = '';
			$client_image = wp_get_attachment_image_src( $client_image, 'thumbnail', 'full' );
			/* Rating Store */
			if ( $show_rating == 'yes' ) {
				$rating           .= '<ul class="eak-testi-rating">';
				$testi_nonerating = 5 - $testi_rating; // None Rating
				for ( $x = 1; $x <= $testi_rating; $x ++ ) {
					$rating .= '  <li class="fa fa-star" id="testi_star"></li>';
				}
				for ( $x = 1; $x <= $testi_nonerating; $x ++ ) {
					$rating .= ' <li class="fa fa-star" id="testi_nonestar"></li>';
				}
				$rating .= ' </ul>';
			}


			$output = '<div id="eak-testimonial' . $i . '" class="' . esc_attr( implode( " ", $css_class ) ) . '">';

			$output .= '<div class="eak-testimonial-2">
                        <div class="eak-upper-conent">
                            <div class="thumb">
                                <img src="' . $client_image[0] . '" alt="">
                            </div>
                            <div class="eak-clients-details">
                                <div class="content">
                                    <h4 class="name">' . $cl_name . '</h4>
                                    <span class="designation">' . $cl_label . '</span>';
			if ( $show_rating == 'yes' ) {
				$output .= $rating;
			}
			$output .= '</div>
                            </div>
                        </div>
                        <div class="bottom-conetent">
                            <div class="icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p>' . $testi_descr . '</p>
                        </div>
                    </div>';

			$output .= '</div>';

			return $output;
		}
	}

}