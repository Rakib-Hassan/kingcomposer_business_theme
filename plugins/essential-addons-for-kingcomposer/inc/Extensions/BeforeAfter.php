<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions;

use Eak\Base\ExtensionsController;

class BeforeAfter extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'before_after' ) ) {
			return;
		}
		add_shortcode( 'rdextkc_beforeafter', array( $this, 'rdextkc_beforeafter_func' ) );


		add_action( 'init', array( $this, 'beforeafter' ) );
	}

	function beforeafter() {

		global $kc;
		$kc->add_map( array(
			'rdextkc_beforeafter' => array(
				'name'        => 'Image Before After',
				'description' => __( 'flexible image before after shortcode', 'eak_kingcomposer' ),
				'icon'        => 'rdextkc_beforeafter_icon',
				'css_box'     => true,
				'category'    => 'EAK ADDONS',
				'params'      => array(
					'General' => array(
						array(
							'name' => 'eak_beforeafter_orientation',
							'label' => 'Before After Orientation',
							'type' => 'select',  // USAGE RADIO TYPE
							'options' => array(    // REQUIRED
								'horizontal' => 'Horizontal',
								'vertical' => 'Vertical',
							),
							'value' => 'horizontal',
							'description' => 'There are two Orientation Design. Choose Which one you like',
						),
					array(
						'name'        => 'before_image',
						'label'       => 'Before Image',
						'type'        => 'attach_image',
						"description" => __( "Select image from media library for before.", "eak_kingcomposer" ),
					),
					array(
						'name'        => 'after_image',
						'label'       => 'After Image',
						'type'        => 'attach_image',
						"description" => __( "Select image from media library for before.", "eak_kingcomposer" ),
					),

					array(
						'name'    => 'on_click',
						'label'   => 'On Click',
						'type'    => 'select',
						'options' => array(
							'none' => 'Do Nothing',
							'box'  => 'Complete Box',
						),
					),

					array(
						'name'     => 'link',
						'label'    => 'Add Link',
						'type'     => 'link',
						'relation' => array(
							'parent'    => 'on_click',
							'show_when' => 'box',
						),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Extra class name', 'eak_kingcomposer' ),
						'name'        => 'extraclass',
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eak_kingcomposer' ),
					),

				),
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Before Label' => array(
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.twentytwenty-before-label::before'),
										array('property' => 'color', 'label' => 'Font Color', 'selector' => '.twentytwenty-before-label::before'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.twentytwenty-before-label::before'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.twentytwenty-before-label::before'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.twentytwenty-before-label::before'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.twentytwenty-before-label::before'),

										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.twentytwenty-before-label::before'),

										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.twentytwenty-before-label::before'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.twentytwenty-before-label::before'),

									),

									'After Label' => array(
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.twentytwenty-after-label::before'),
										array('property' => 'color', 'label' => 'Font Color', 'selector' => '.twentytwenty-after-label::before'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.twentytwenty-after-label::before'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.twentytwenty-after-label::before'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.twentytwenty-after-label::before'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.twentytwenty-after-label::before'),

										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.twentytwenty-after-label::before'),

										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.twentytwenty-after-label::before'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.twentytwenty-after-label::before'),

									),

									'Handle' => array(
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.twentytwenty-handle::before, .twentytwenty-handle::after '),

										array('property' => 'border-color', 'label' => 'Round Color', 'selector' => '.twentytwenty-handle'),
										array('property' => 'border-right-color', 'label' => 'Arrow Left Color', 'selector' => '.twentytwenty-left-arrow'),
										array('property' => 'border-left-color', 'label' => 'Arrow Right Color', 'selector' => '.twentytwenty-right-arrow'),
										array('property' => 'border-bottom-color', 'label' => 'Arrow Up Color', 'selector' => '.twentytwenty-up-arrow'),
										array('property' => 'border-top-color', 'label' => 'Arrow Down Color', 'selector' => '.twentytwenty-down-arrow'),

									),

									'Background' => array(
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.twentytwenty-overlay'),
										array('property' => 'background-color', 'label' => 'Background Hover Color', 'selector' => '.twentytwenty-overlay:hover'),


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
	function rdextkc_beforeafter_func( $atts, $content = null ) {
		extract( shortcode_atts( array(

			'before_image' => '',
			'after_image'  => '',
			'on_click'     => '',
			'link'         => '',
			'extraclass'   => '',
			'eak_beforeafter_orientation'   => '',

		), $atts ) );

		$before_image = wp_get_attachment_image_src( $before_image, 'full' );
		$after_image  = wp_get_attachment_image_src( $after_image, 'full' );
		$link         = kc_parse_link( $link );
		$output       = '';

		// CSS BOX STYLE
		$css_class 		= apply_filters( 'kc-el-class', $atts );
		$css_class[] 	= 'eak-baimage-wrapper';

		$id = rand( 1, 10000000 );

		if ( $on_click == 'box' ) {
			$output = '<a class="href" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">';
		}

		$output .= '<div class="' . $extraclass . ' '. esc_attr( implode( " ", $css_class ) ).'" id="container_' . $id . '" data-orientation="vertical">
                        <img src="' . $before_image[0] . '">
                        <img src="' . $after_image[0] . '">
                    </div>';

		if ( $on_click == 'box' ) {
			$output .= '</a>';
		}

		$output .= '<script>
                        jQuery(window).load(function() {
                            jQuery("#container_' . $id . '").twentytwenty({
                                orientation: "'.$eak_beforeafter_orientation.'", //horizontal   vertical
                            });
                        });
                    </script>';

		//{orientation: "vertical"}

		return $output;
	}
}