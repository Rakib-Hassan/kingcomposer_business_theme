<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions;

use Eak\Base\ExtensionsController;

class PricingTable extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'pricing_table' ) ) {
			return;
		}
		add_shortcode( 'rdextkc_pricingtable', array( $this, 'rdextkc_pricingtable_func' ) );

		add_action( 'init', array( $this, 'pricing_table' ) );
	}

	public function pricing_table() {
		global $kc;
		$kc->add_map( array(
			'rdextkc_pricingtable' => array(
				'name'        => 'Pricing Table',
				'description' => esc_html__( 'flexible image before after shortcode', 'eafkc' ),
				'icon'        => 'rdextkc_pricingtable_icon',
				'css_box'     => true,
				'category'    => 'EAK ADDONS',
				'params'      => array(
					// General Group Start
					'Add Features'    => array(
						array(
							'type'        => 'group',
							'label'       => esc_html__( 'Add pricingtable Items', 'eafkc' ),
							'name'        => 'acoptions',
							'description' => esc_html__( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'eafkc' ),
							'options'     => array( 'add_text' => esc_html__( 'Add new items', 'eafkc' ) ),
							'params'      => array(
								array(
									'name'  => 'pric_feature',
									'label' => esc_html__('Pricing Feature', 'eafkc'),
									'type'  => 'text',
									'value' => esc_html__( 'Pricing Feature Here', 'eafkc' ),
								),
								array(
									'name'     => 'eafkc_feature_icon',
									'label'    => esc_html__( 'Select Feature Icon', 'eafkc' ),
									'type'     => 'select',  // USAGE SELECT TYPE
									'options'  => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
										'check'   => 'Check',
										'uncheck' => 'Uncheck',
										'noicon'  => 'No Icon',
									),
									'value'    => 'noicon', // remove this if you do not need a default content
								),

							),
						),
					),
					// General Group End
					'Pricing Details' => array(
						array(
							'name'        => 'eak_show_plan_icon',
							'label'       => esc_html__('Show Plan Icon?', 'eafkc'),
							'type'        => 'toggle',
							//'value'	=> 'yes',
							'description' => 'Show Icon for Pricing plan',
						),
						array(
							'name'     => 'eak_plan_icon',
							'label'    => esc_html__('Select Icon', 'eafkc'),
							'type'     => 'icon_picker',
							'relation' => array(
								'parent'    => 'eak_show_plan_icon',
								'show_when' => 'yes',
							),
						),
						array(
							'name'  => 'king_planname',
							'label' => esc_html__('Plan Name', 'eafkc'),
							'type'  => 'text',
							'value' => __( 'Add You Plan Name', 'eafkc' ),
						),
						array(
							'name'  => 'king_plan_duration',
							'label' => esc_html__('Plan Duration', 'eafkc'),
							'type'  => 'text',
							'value' => __( '$10 / month', 'eafkc' ),
						),
						array(
							'name'        => 'king_buttonurl',
							'label'       => esc_html__('Button Name & URL', 'eafkc'),
							'type'        => 'link',
							'value'       => 'link|Sing Up|target',
							'description' => 'Set Button Name and Url',
						),
					),


					// General Group End

					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options' => array(
								array(
									"screens"   => "any,1024,999,767,479",
									'Plan Icon' => array(
										array( 'property' => 'color', 'label' => 'Icon color', 'selector' => '.panel-heading span i' ),
										array( 'property' => 'font-size', 'label' => 'Icon Font Size', 'selector' => '.panel-heading span i' ),
										array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.panel-heading span i' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.panel-heading span i' ),
									),

									'Plan Name'     => array(
										array( 'property' => 'background', 'label' => 'Container Background', 'selector' => '.panel-heading' ),
										array( 'property' => 'background-color', 'label' => 'Plan Background Color', 'selector' => '.eafkc_pricing_heading' ),
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.panel-heading .eafkc_pricing_heading' ),
										array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.panel-heading .eafkc_pricing_heading' ),
										array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.panel-heading .eafkc_pricing_heading' ),
										array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.panel-heading .eafkc_pricing_heading' ),
										array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.panel-heading .eafkc_pricing_heading' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.panel-heading .eafkc_pricing_heading' ),
									),
									'Plan Duration' => array(
										array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => '.panel-body' ),
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.panel-body .lead' ),
										array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.panel-body .lead' ),
										array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.panel-body .lead' ),
										array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.panel-body .lead' ),
										array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.panel-body .lead' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.panel-body .lead' ),
									),
									'Features Icon' => array(
										array( 'property' => 'color', 'label' => 'Check Color', 'selector' => '#fea_pricing .fa-check' ),
										array( 'property' => 'color', 'label' => 'Uncheck Color', 'selector' => '#fea_pricing .fa-times' ),
										array( 'property' => 'font-size', 'label' => 'Icon Size', 'selector' => '#fea_pricing i' ),
										array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '#fea_pricing i' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '#fea_pricing i' ),

									),

									'Features'          => array(
										array( 'property' => 'background-color', 'label' => 'Background Color', 'selector' => '#fea_pricing' ),
										array( 'property' => 'color', 'label' => 'Feature Color', 'selector' => '#fea_pricing' ),
										array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '#fea_pricing' ),
										array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '#fea_pricing' ),
										array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '#fea_pricing' ),
										array( 'property' => 'border', 'label' => 'Border', 'selector' => '#fea_pricing' ),
										array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '#fea_pricing' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '#fea_pricing' ),
									),
									'Button Container'  => array(
										array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => '.eak-pricing-footer' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-pricing-footer' ),
									),
									'Button'            => array(
										array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'color', 'label' => 'Hover Color', 'selector' => '.eak-pricing-footer .eak_pricing_button:hover' ),
										array( 'property' => 'background-color', 'label' => 'Background Color', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'background-color', 'label' => 'Hover Background Color', 'selector' => '.eak-pricing-footer .eak_pricing_button:hover' ),

										array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'border', 'label' => 'Border', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-pricing-footer .eak_pricing_button' ),
									),
									'Pricing Container' => array(
										array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => '#eak-pricing-wrapper' ),
										array( 'property' => 'padding', 'label' => 'Padding', 'selector' => '#eak-pricing-wrapper' ),
										array( 'property' => 'border', 'label' => 'Border', 'selector' => '#eak-pricing-wrapper' ),
										array( 'property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '#eak-pricing-wrapper' ),
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
	function rdextkc_pricingtable_func( $atts, $content = null ) {
		$king_buttonurl = $king_planname = $king_plan_duration = $eak_plan_icon = $eak_show_plan_icon = '';
		extract( shortcode_atts( array(
			'pric_feature'       => '',
			'eafkc_feature_icon' => '',
			'king_planname'      => '',
			'king_plan_duration' => '',
			'king_buttonurl'     => '',
			'eak_show_plan_icon' => '',
			'eak_plan_icon'      => '',
		), $atts ) );

		$link = ( '||' === $king_buttonurl ) ? '' : $king_buttonurl;
		$link = kc_parse_link( $link );
		if ( strlen( $link['url'] ) > 0 ) {
			$a_href   = esc_html__($link['url']);
			$a_title  = esc_html__($link['title']);
			$a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
		}

		// CSS BOX STYLE
		$css_class   = apply_filters( 'kc-el-class', $atts );
		$css_class[] = 'king-pricing-items';

		$acoptions = $atts['acoptions'];
		$output    = '<div class="' . esc_attr( implode( " ", $css_class ) ) . '">
            <div class="panel price panel-red" id="eak-pricing-wrapper">
                <div class="panel-heading  text-center">';

		If ( $eak_show_plan_icon == 'yes' ) {
			$output .= '<span><i class="' . esc_html__($eak_plan_icon) . '"></i></span>';
		}

		$output .= '<h3 class="eafkc_pricing_heading">' . strtoupper( esc_html__( $king_planname ) ) . '</h3>
                </div>

                <div class="panel-body text-center">
                    <p class="lead"><strong>' . esc_html__( $king_plan_duration ) . '</strong></p>
                </div>
                
                <ul class="list-group list-group-flush text-center">';
		if ( isset( $acoptions ) ) {
			foreach ( $acoptions as $option ) {

				/* Feature Icon*/
					if ( $option->eafkc_feature_icon == 'check' ) {
						$feature_icon = '<i class="fa fa-check"></i>';
					} else if ( $option->eafkc_feature_icon == 'uncheck' ) {
						$feature_icon = '<i class="fa fa-times"></i>';
					} else {
						$feature_icon = '';
					}

				$output .= '<li class="list-group-item" id="fea_pricing">' . $feature_icon . ' ' . $option->pric_feature . '</li>';
			}
		}
		$output .= ' </ul>
                <div class="eak-pricing-footer">
                    <a class="eak_pricing_button" href="' . $a_href . '" target="' . $a_target . '">' . $a_title . '</a>
                </div>
            </div>
        </div>';

		return $output;
	}
}