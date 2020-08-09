<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions;

use Eak\Base\ExtensionsController;

class InfoBox extends ExtensionsController {


	public function extensions_register() {
		if ( ! $this->activated( 'info_box' ) ) {
			return;
		}
		add_shortcode( 'kingrd_infobox', array( $this, 'rdextkc_infobox_func' ) );
		add_action( 'init', array( $this, 'infoBox' ) );

	}

	public function infoBox() {
		global $kc;
		$kc->add_map( array(
			'kingrd_infobox' => array(
				'name'        => 'InfoBox',
				'description' => __( 'InfoBox for King Composer', 'KingComposer' ),
				'icon'        => 'rdextkc_infobox_icon',
				//'is_container' => true,
				'category'    => 'EAK ADDONS',
				'css_box'     => true,
				'params'      => array(
					'General' => array(
						array(
							'name'  => 'eak_infobox_icon',
							'label' => 'Select Infobox Icon',
							'type'  => 'icon_picker',
							'icon'  => 'fa fa-globe',
							//'admin_label' => true,
						),
						array(
							'type'        => 'text',
							'label'       => __( 'Title', 'kingcomposer' ),
							'name'        => 'eak_infobox_title',
							'value'       => 'Web Design',
							'description' => __( 'Title of the InfoBox. Leave blank if no title is needed.', 'kingcomposer' ),
							'admin_label' => true,
						),

						array(
							'type'        => 'textarea',
							'label'       => __( 'Description', 'kingcomposer' ),
							'name'        => 'eak_infobox_description',
							'value'       => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet',
							'description' => __( 'Description of the InfoBox. Leave blank if no Description is needed.', 'kingcomposer' ),
							'admin_label' => true,
						),
					),

					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options' => array(
								array(
									"screens"    => "any,1024,999,767,479",
									'Icon'       => array(
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-infobox-icon' ),
										array( 'property' => 'background-color', 'label' => 'Background Color', 'selector' => '.eak-infobox-icon' ),

									),
									'Title' => array(
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-infobox-title' ),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-infobox-title'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-infobox-title'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-infobox-title'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.eak-infobox-title'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-infobox-title'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-infobox-title'),
									),

									'Description' => array(
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-infobox-descr' ),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-infobox-descr'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-infobox-descr'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-infobox-descr'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.eak-infobox-descr'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-infobox-descr'),
									),

									'Background' => array(
										array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => '.eak-infobox' ),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.eak-infobox'),
										array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '.eak-infobox'),

										array('property' => 'border-bottom-color', 'label' => 'Border Bottom Color', 'selector' => '.eak-infobox'),
										array('property' => 'background-color', 'label' => 'Border Shape Color', 'selector' => '.eak-infobox::before, .eak-infobox::after'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.eak-infobox'),
									),

								),
							),
						),
					),

					/*						'Typography' => array(
												array(
													'name'        => 'icon_color',
													'label'       => 'icon Color',
													'type'        => 'color_picker',
													'value'       => '#FAFAFA',
												),
												array(
													'name'        => 'icon_bg_color',
													'label'       => 'icon Background Color',
													'type'        => 'color_picker',
													'value'       => '#4A4A4A',

												),
												array(
													'name'        => 'title_color',
													'label'       => 'Title Color',
													'type'        => 'color_picker',
													'value'       => '#4A4A4A',

												),
												array(
													'name'        => 'descr_color',
													'label'       => 'Description Color',
													'type'        => 'color_picker',
													'value'       => '#4A4A4A',

												),
												array(
													'name'        => 'title_f_size',
													'label'       => 'Title font size',
													'type'        => 'number_slider',
													'options'     => array(
														'min'        => 0,
														'max'        => 40,
														'unit'       => 'px',
														'show_input' => true,
													),
													'value'       => '20',
													'description' => 'Chose Title Font Size here, Default is 14px',
												),
												array(
													'name'        => 'descr_f_size',
													'label'       => 'Description font size',
													'type'        => 'number_slider',
													'options'     => array(
														'min'        => 0,
														'max'        => 40,
														'unit'       => 'px',
														'show_input' => true,
													),
													'value'       => '14',
													'description' => 'Chose Description Font Size here, Default is 14px',
												),
											),*/

				),
			),
		) );
	}


	// Register Hover Shortcode
	function rdextkc_infobox_func( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'eak_infobox_title'       => '',
			'eak_infobox_description' => '',
			'eak_infobox_icon'        => '',
		), $atts ) );

		// CSS BOX STYLE
		$css_class   = apply_filters( 'kc-el-class', $atts );
		$css_class[] = 'eak-infobox-wrapper';
		//$image_icon = wp_get_attachment_image_src( $image_icon,'full' );

		$output = '
			<div class=" ' . esc_attr( implode( " ", $css_class ) ) . '">
			<div class="eak-infobox">
                    <i class="eak-infobox-icon ' . $eak_infobox_icon . '"></i>
                    <h3 class="eak-infobox-title">' . $eak_infobox_title . '</h3>
                    <p class="eak-infobox-descr">' . $eak_infobox_description . '</p>
                </div>
            </div>

        ';

		return $output;
	}
}