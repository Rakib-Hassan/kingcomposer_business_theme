<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class CounTer extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'counter' ) ) {
				return;
			}
			add_shortcode( 'rdextkc_counter', array( $this, 'rdextkc_counter_func' ) );
			add_action( 'init', array( $this, 'counter' ) );

		}

		public function counter() {
			global $kc;
			$kc->add_map( array(
				'rdextkc_counter' => array(
					'name'        => 'Counter',
					'description' => __( 'Counter', 'rdextkc' ),
					'icon'        => 'rdextkc_counter_icon',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(

						'general' => array(
							array(
								'name'  => 'eak_counter_icon',
								'label' => 'Select Infobox Icon',
								'type'  => 'icon_picker',
								'icon'  => 'fa-coffee',
								//'admin_label' => true,
							),
							array(
								'name'        => 'eak_counter_number',
								'label'       => 'Targeted number:',
								'type'        => 'text',  // USAGE TEXT TYPE
								'value'       => '720', // remove this if you do not need a default content
								'description' => 'The targeted number to count up to (From zero).',
							),
							array(
								'name'        => 'eak_counter_title',
								'label'       => 'Label:',
								'type'        => 'text',  // USAGE TEXT TYPE
								'value'       => 'Web Designing', // remove
								'description' => 'The text description of the counter.',
							),
						),

						'Settings' => array(
							array(
								'name' => 'eap_show_hide_icon',
								'label' => 'Show Icon?',
								'type' => 'toggle',
								'value'	=> 'yes',
								/*'relation'	=> array(
									'parent'	=> 'layout',
									'show_when'	=> array( '1', '3' )
								),*/
								'description' => 'Show Icon on Counter'
							),
							array(
								'name'        => 'eak_counter_delay',
								'label'       => 'Counter delay',
								'type'        => 'text',  // USAGE TEXT TYPE
								'value'       => '10', // remove this if you do not need a default
								'description' => 'The delay in milliseconds per number count up.',
							),
							array(
								'name'        => 'eak_counter_time',
								'label'       => 'Counter Time',
								'type'        => 'text',  // USAGE TEXT TYPE
								'value'       => '1000', // remove this if you do not need a default
								'description' => 'The total duration of the count up animation.',
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
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-counter-icon' ),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-counter-icon'),

										),
										'Number' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '#epa-counter' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '#epa-counter'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '#epa-counter'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '#epa-counter'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '#epa-counter'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '#epa-counter'),
										),
										'Label' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.eak-counter h3' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.eak-counter h3'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.eak-counter h3'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.eak-counter h3'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.eak-counter h3'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.eak-counter h3'),
										),

										'Background' => array(
											array( 'property' => 'background', 'label' => 'Background Color or Image', 'selector' => '.eak-counter-content' ),
											array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '.eak-counter-content'),
											array('property' => 'box-shadow', 'label' => 'Bow Shadow', 'selector' => '.eak-counter-content'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.eak-counter-content'),
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
		function rdextkc_counter_func( $atts, $content = null, $tag ) {
			extract( shortcode_atts( array(
					"height"             => '300px',
					"eak_counter_icon"   => 'fa-coffee',
					"eak_counter_number" => '',
					"eak_counter_title"  => '',
					"eak_counter_delay"  => '',
					"eak_counter_time"  => '',
					"eap_show_hide_icon"  => '',
				), $atts ) );

			// CSS BOX STYLE
			$css_class   = apply_filters( 'kc-el-class', $atts );
			$css_class[] = 'eak-counter-wrapper';

/*			$output = '<div class="wrapper"><div class="counter col_fourth">
				      <i class="fa fa-code fa-2x"></i>
				      <h2 class="timer count-title count-number" data-to="300" data-speed="1500"></h2>
				       <p class="count-text ">SomeText GoesHere</p>
				    </div></div>';*/

				$i = uniqid();
			$output = '<div class="' . esc_attr( implode( " ", $css_class ) ) . '">
				<div class="eak-counter">
                <div class="eak-counter-content" id="counter">';
                if ($eap_show_hide_icon == 'yes') {
	                $output .= '<div class="eak-counter-icon">
                        <i class="' . $eak_counter_icon . '"></i>
                    	</div>';
                }
                      $output .= '<span id="epa-counter" class="counter'.$i.'">'.$eak_counter_number.'</span>
                <h3>' . $eak_counter_title . '</h3>
                </div>
            </div></div>';

			$output .= ' <script type="text/javascript">
					jQuery(document).ready(function($) {
					            $(".counter'.$i.'").counterUp({
					                delay: '.$eak_counter_delay.',
					                time: '.$eak_counter_time.'
					            });
					        });
				</script>';

			return $output;
		}
	}

}