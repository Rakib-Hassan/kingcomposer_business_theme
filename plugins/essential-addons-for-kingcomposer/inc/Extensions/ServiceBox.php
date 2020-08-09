<?php
/**
 * @package  EakAddons
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class ServiceBox extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'servicebox' ) ) {
				return;
			}
			add_shortcode( 'rdextkc_servicebox', array( $this, 'rdextkc_servicebox_func' ) );
			add_action( 'init', array( $this, 'serviceBox' ) );

		}

		public function serviceBox() {
			global $kc;
			$kc->add_map( array(
				'rdextkc_servicebox' => array(
					'name'        => 'Service Box',
					'description' => __( 'Service box shortcode', 'rdextkc' ),
					'icon'        => 'rdextkc_servicebox_icon',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(


						'General' => array(
							array(
								"type"        => "select",
								"label"       => __( "Direction", "rdextkc" ),
								"name"        => "direction",
								'options'     => array(
									'up'    => 'Up',
									'down'  => 'Down',
									'left'  => 'Left',
									'right' => 'Right',
								),
								"value"       => "up",
								"description" => __( "Select animation direction", "rdextkc" ),
							),

							array(
								"type"        => "select",
								"label"       => __( "Icon Type", "rdextkc" ),
								"name"        => "icon_type",
								'options'     => array(
									'icon'  => 'Icon (select the icon below)',
									'image' => 'Image (choose the icon image below)',
								),
								"value"       => "icon",
								"description" => __( "", "rdextkc" ),
							),
							array(
								'type'        => 'icon_picker',
								'label'       => __( 'Icon', 'rdextkc' ),
								'name'        => 'icon_fontawesome',
								'value'       => 'fa fa-camera',
								'relation'    => array(
									'parent'    => 'icon_type',
									'show_when' => 'icon',
								),
								'description' => __( 'Select icon from library.', 'rdextkc' ),
							),


							array(
								"type"        => "attach_image",
								"label"       => __( "Icon Image", "rdextkc" ),
								"name"        => "icon_image",
								"value"       => "",
								'relation'    => array(
									'parent'    => 'icon_type',
									'show_when' => 'image',
								),
								"description" => __( "Select image from media library.", "rdextkc" ),
							),
							array(
								"type"        => "number_slider",
								"label"       => __( "Image Icon Size", "rdextkc" ),
								"name"        => "image_icon_size",
								'options'     => array(
									'min'        => 5,
									'max'        => 100,
									'unit'       => 'px',
									'show_input' => true,
								),
								"value"       => 32,
								"description" => __( "Provide icon size", "rdextkc" ),
								'relation'    => array(
									'parent'    => 'icon_type',
									'show_when' => 'image',
								),
							),
							array(
								"type"        => "text",
								"label"       => __( "Front Title", 'rdextkc' ),
								"name"        => "fronttitle",
								"value"       => "Front Title Here",
								"admin_label" => true,
							),
							array(
								"type"        => "text",
								"label"       => __( "Back Title", 'rdextkc' ),
								"name"        => "backtitle",
								"value"       => "Back Title Here",
								"admin_label" => true,
							),
							array(
								"type"        => "textarea",
								"label"       => __( "Description", "rdextkc" ),
								"name"        => "content",
								"value"       => "Description Goes Here",
								"description" => __( "Provide the description for this box.", "rdextkc" ),
							),
							array(
								"type"        => "select",
								"label"       => __( "On Click", "rdextkc" ),
								"name"        => "on_click",
								'options'     => array(
									'none' => 'No Link',
									'box'  => 'Complete Box',
								),
								"description" => __( "Select whether to use color for icon or not.", "rdextkc" ),
							),
							array(
								"type"        => "link",
								"label"       => __( "Add Link", "rdextkc" ),
								"name"        => "link",
								"value"       => "",
								"description" => __( "Add a custom link or select existing page. You can remove existing link as well.", "rdextkc" ),
								'relation'    => array(
									'parent'    => 'on_click',
									'show_when' => 'box',
								),
							),

							array(
								"type"        => "text",
								"label"       => __( "Extra class name", "rdextkc" ),
								"name"        => "eak-icon-wrapper",
								"value"       => "",
								"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "rdextkc" ),
							),

						),

						'styling' => array(
							array(
								'name'    => 'css_custom',
								'type'    => 'css',
								'options'		=> array(
									array(
										"screens" => "any,1024,999,767,479",
										'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => 'i'),
											array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => 'i'),
										),
										'Font Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.title'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.title'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.title'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.title'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.title'),
										),
										'Back Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.title-after'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.title-after'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.title-after'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.title-after'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.title-after'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.title-after'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.title-after'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.title-after'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.title-after'),
										),

										'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.des'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.des'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.des'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.des'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.des'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.des'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.title-after'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.title-after'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.title-after'),
										),

										'Front Background' => array(
											//array('property' => ''),
											array('property' => 'background', 'selector' => '.h-center.ser_front_wrap'),
											array('property' => 'border', 'selector' => '.h-center.ser_front_wrap'),
											array('property' => 'border-radius', 'selector' => '.h-center.ser_front_wrap'),
										),

										'Back Background' => array(
											array('property' => 'background', 'selector' => '.h-center.ser_back_wrap'),
											array('property' => 'border', 'selector' => '.h-center.ser_back_wrap'),
											array('property' => 'border-radius', 'selector' => '.h-center.ser_back_wrap'),
										),

									)
								)
							)
						),
					),
				),
			) );
		}

		// Register Before After Shortcode
		function rdextkc_servicebox_func( $atts, $content = null, $tag ) {
			extract( shortcode_atts( array(
				'direction'        => 'up',
				'icon_type'        => '',
				'icon'             => '',
				'icon_image'       => '',
				'icon_fontawesome' => '',
				'fronttitle'            => '',
				'backtitle'            => '',
				'content'          => '',
				'on_click'         => '',
				'link'             => '',
				'image_icon_size'         => '',
				'eak-icon-wrapper'       => '',

			), $atts ) );


			$icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
			$link       = kc_parse_link( $link );

			// CSS BOX STYLE
			$css_class 		= apply_filters( 'kc-el-class', $atts );
			$css_class[] 	= 'eak-icon-wrapper';

			$output = '';

				$output .= '<div class="rdextkc_service-1-' . $direction . ' effect-' . $direction . ' ' . esc_attr( implode( " ", $css_class ) ). '">';
				$output .= '<ul>
                                <li>
                                <div class="h-center ser_front_wrap">
                                <div class="v-center">';

				if ( $icon_type == 'image' ) {
					$output .= '<img style="width:' . $image_icon_size . ';" alt="" src="' . $icon_image[0] . '">';
				}
				if ( $icon_type == 'icon' ) {
					$output .= '<i class="' . $icon_fontawesome . '"></i>';
				}
				$output .= '<h2 class="title">' . $fronttitle . '</h2>
                                </div>
                                </div>
                                </li>';

				$output .= '<li>';

				if ( $on_click == 'box' ) {
					$output .= '<a class="href" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">';
				}
				$output .= '<div class="h-center ser_back_wrap">
                                        <div class="v-center">
                                            <h3 class="title-after"><span class="txt-h">' . $backtitle . '</span></h3>
                                            <p class="des">' . $content . '</p>
                                    
                                        </div>
                                    </div>';
				if ( $on_click == 'box' ) {
					$output .= '</a>';
				}
				$output .= '</li>
                                </ul>
                        </div>';
			return $output;
		}
	}

}