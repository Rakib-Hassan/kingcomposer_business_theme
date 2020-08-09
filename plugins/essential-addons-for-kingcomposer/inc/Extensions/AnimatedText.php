<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class AnimatedText extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'animatedtext' ) ) {
				return;
			}
			add_shortcode( 'animated_text', array( $this, 'animated_text_func' ) );
			add_action( 'init', array( $this, 'animatedtext' ) );
		}

		public function animatedtext() {
			global $kc;
			$kc->add_map( array(
				'animated_text' => array(
					'name'        => 'Animated Text',
					'description' => __( 'Animated Text', 'rdextkc' ),
					'icon'        => 'animatedtext',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(

						'General'    => array(
						array(
							'name'        => 'eak_at_before_text',
							'label'       => 'Before Text',
							'type'        => 'textarea',
							'description' => 'Before Text Here',
							'value' => 'We can bring',
							//'admin_label' => true,
						),
						array(
							'type'        => 'group',
							'label'       => __( 'Animated Text', 'KingComposer' ),
							'name'        => 'animatedtext_options',
							'description' => __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'KingComposer' ),
							'options'     => array( 'add_text' => __( 'Add new Items', 'kingcomposer' ) ),

							'params' => array(
								array(
									'name'  => 'atext',
									'label' => 'Animated Text',
									'type'  => 'text',
									'value' => 'Groth',
								),
							),
						),


						array(
							'name'        => 'eak_at_after_text',
							'label'       => 'After Text',
							'type'        => 'textarea',
							'description' => 'After Text Here',
							'value' => 'to your business',
							//'admin_label' => true,
						),
						),

						'Settings' => array (
							array(
								'name' => 'eak_anitext_type',
								'label' => 'Animated Text Type',
								'type' => 'select',  // USAGE SELECT TYPE
								'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'typing'   => 'Typing',
									'morphext' => 'Morphext',
								),
								'value' => 'typing', // remove this if you do not need a default content
								'description' => 'Select Animated Text Type',
							),
							array(
								'name' => 'delay_to_change',
								'label' => 'Delay to Change',
								'type' => 'number_slider',
								'value' => 2000,
								'options' => array(
									'min' => 500,
									'max' => 10000,
									'unit' => 'ms',
									'show_input' => true
								),
								'description' => 'The delay between the changing of each phrase in milliseconds.'
							),
							array(
								'name' => 'eak_animation',
								'label' => 'Animation',
								'type' => 'select',  // USAGE SELECT TYPE
								'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'fadeIn'      => esc_html__( 'Fade', 'epa_elementor' ),
									'fadeInUp'    => esc_html__( 'Fade Up', 'epa_elementor' ),
									'fadeInDown'  => esc_html__( 'Fade Down', 'epa_elementor' ),
									'fadeInLeft'  => esc_html__( 'Fade Left', 'epa_elementor' ),
									'fadeInRight' => esc_html__( 'Fade Right', 'epa_elementor' ),
									'zoomIn'      => esc_html__( 'Zoom', 'epa_elementor' ),
									'bounceIn'    => esc_html__( 'BounceIn', 'epa_elementor' ),
									'swing'       => esc_html__( 'Swing', 'epa_elementor' ),
									'bounce'       => esc_html__( 'Bounce', 'epa_elementor' ),
									'flash'       => esc_html__( 'Flash', 'epa_elementor' ),
									'pulse'       => esc_html__( 'Pulse', 'epa_elementor' ),
									'rubberBand'       => esc_html__( 'RubberBand', 'epa_elementor' ),
									'shake'       => esc_html__( 'Shake', 'epa_elementor' ),
									'tada'       => esc_html__( 'Tada', 'epa_elementor' ),
									'jello' => esc_html__( 'Jello', 'epa_elementor' ),
									'rollIn' => esc_html__( 'RollIn', 'epa_elementor' ),
								),
								'relation' => array(
									'parent'    => 'eak_anitext_type',
									'show_when' => 'morphext'
								),
								'value' => 'fadeIn', // remove this if you do not need a default content
								'description' => 'The animation Refer to Animate.css for a list of available animations.',
							),
							array(
								'name' => 'typing_speed',
								'label' => 'Typing Speed',
								'type' => 'number_slider',
								'value' => 50,
								'options' => array(
									'min' => 10,
									'max' => 2000,
									'unit' => 'ms',
									'show_input' => true
								),
								'relation' => array(
									'parent'    => 'eak_anitext_type',
									'show_when' => 'typing'
								),
								'description' => 'type speed in milliseconds.'
							),
							array(
								'name' => 'loop_typing',
								'label' => 'Loop The Typing?',
								'type' => 'toggle',
								'value' => 'yes',
								//'description' => 'Loop Typing'
							),
							array(
								'name' => 'show_cursor',
								'label' => 'Show Cursor?',
								'type' => 'toggle',
								'value' => 'yes',
								//'description' => 'Loop Typing'
							),
						),
// STYLE SECTION
						'styling' => array(
							array(
								'name'    => 'css_custom',
								'type'    => 'css',
								'options' => array(
									array(
										"screens"    => "any,1024,999,767,479",

										'Before Text'       => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.epa_animated_before_text span' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.epa_animated_before_text span'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.epa_animated_before_text span'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.epa_animated_before_text span'),

										),

										'Animated Text' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.epa-animated-repeater-field' ),
											array( 'property' => 'background-color', 'label' => 'Background Color', 'selector' => '.epa-animated-repeater-field' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.epa-animated-repeater-field'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.epa-animated-repeater-field, .typed-cursor'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.epa-animated-repeater-field'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.epa-animated-repeater-field'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.epa-animated-repeater-field'),
										),

										'After Text'       => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.epa-animated-after-text' ),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.epa-animated-after-text'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.epa-animated-after-text'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.epa-animated-after-text'),

										),

									),
								),
							),
						),

					)
				),
			) );
		}

		// Register Before After Shortcode
		function animated_text_func( $atts, $content = null, $tag ) {
			extract( shortcode_atts( array(
					"eak_anitext_type" => '',
					"eak_at_before_text" => '',
					"animatedtext_options" => '',
					"eak_at_after_text" => '',
					"delay_to_change" => '',
					"typing_speed" => '',
					"eak_animation" => '',
					"loop_typing" => '',
					"show_cursor" => '',
				), $atts ) );

			// CSS BOX STYLE
			$css_class   = apply_filters( 'kc-el-class', $atts );
			$css_class[] = 'eak-animatedtext-wrapper';

			$loop_typing = $loop_typing == 'yes' ? 'true' : 'false';
			$show_cursor = $show_cursor == 'yes' ? 'true' : 'false';

			$atid = uniqid();

			$output = '<div class="' . esc_attr( implode( " ", $css_class ) ) . '">';
			$output .= '<div class="epa_elementor-animated-typing-container">';

			$output .= '<span class="epa_animated_before_text"><span>'.$eak_at_before_text.' </span></span>';

			if ( $eak_anitext_type == 'typing' ) {
				$output .= '<span id="animated-text'.$atid.'" class="epa-animated-repeater-field"></span>';
			}
			if ( $eak_anitext_type == 'morphext' ) {
				$output .= '<span id="animated-text'.$atid.'" class="epa-animated-repeater-field"><span>';
				foreach ($animatedtext_options as $item) {
					$output .= ''.$item->atext.', ';
				}
				$output .= '</span></span>';
			}

			$output .= '<span class="epa-animated-after-text"> '.$eak_at_after_text.'</span>';
			$output .= '</div></div>';

			if ($eak_anitext_type == 'typing') {
				$output .= '<script type="text/javascript">
			    jQuery(document).ready(function ($) {
			        "use strict";
			        $("#animated-text'.$atid.'").typed({
			        strings: [';
				foreach ($animatedtext_options as $item) {
					$output .= '"'.$item->atext.'", ';
				}
					$output .= '],     
			           typeSpeed: '.$typing_speed.',
			           backSpeed: 0,
			           startDelay: 300,
			           backDelay: '.$delay_to_change.',
			           showCursor: '.$loop_typing.',
			           loop: '.$loop_typing.'
			        })
			    });
			</script>';
			//}
			}

			if ($eak_anitext_type == 'morphext') {
				$output .= '<script type="text/javascript">
			    jQuery(document).ready(function ($) {
			        "use strict";
			        $("#animated-text'.$atid.'").Morphext({
			            animation: "'.$eak_animation.'",
			            separator: ",",
			            speed: '.$delay_to_change.',
			        })
			    });
			</script>';
			}

			return $output;

		}
	}

}