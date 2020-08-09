<?php
/**
 * @package  EakAddons
 */
namespace Eak\Extensions;

use Eak\Base\ExtensionsController;

class IconAnimation extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'icon_animation' ) ) {
			return;
		}
		add_shortcode( 'rdextkc_iconanimation', array( $this, 'rdextkc_iconanimation_shortcode_function' ) );
		add_action( 'init', array( $this, 'iconAnimation' ) );
		//$this->iconAnimation();
	}

	public function iconAnimation() {
		global $kc;
		$kc->add_map( array(
				'rdextkc_iconanimation' => array(
					"name"         => __( "Icon Animation", 'esaf_kc' ),
					"icon"         => "rdextkc_icon_animation",
					"category"     => 'EAK ADDONS',
					'description'  => 'Icon animation with Text',
					'is_container' => true,
					"params"       => array(

						'General' => array(
							array(
								'type'        => 'icon_picker',
								'heading'     => __( 'Icon', 'esaf_kc' ),
								'name'        => 'icon_fontawesome',
								'admin_label' => true,
								'description' => __( 'Chose Icon For List', 'esaf_kc' ),
							),
							array(
								"type"        => "textarea_html",
								"label"       => __( "Content Here", "esaf_kc" ),
								"name"        => "content",
								"admin_label" => true,
								"value"       => __( "<span style='font-weight:bold;font-size:17px'>Here is the title</span><br />And here is some other text information, you can put <a href='https://codecans.com/plugins'>a link</a> too.", "esaf_kc" ),
								"description" => __( "Content Goes Here", "esaf_kc" ),
							),
							array(
								"type"        => "text",
								"label"     => __( "Extra class name for the icon", "esaf_kc" ),
								"name"  => "icon_class",
								"description" => __( "You can append extra class to the icon, for example <strong>fa-rotate-90</strong> will rotate the icon 90 degree in some animation. <a href='http://fortawesome.github.io/Font-Awesome/examples/' target='_blank'>for more information</a>", "esaf_kc" ),
							),
							array(
								"type"        => "text",
								"label"     => __( "Extra class name for the text", "esaf_kc" ),
								"name"  => "el_class",
								"description" => __( "If you wish to style the text differently, then use this field to add a class name and then refer to it in your css file.", "esaf_kc" ),

							),
						),

						'Settings' => array(
							array(
								"type"        => "select",
								"heading"     => __( "Icon animation", "esaf_kc" ),
								"name"        => "animation",
								"description" => __( 'Select the icon animation.', 'esaf_kc' ),
								"options"     => array(
									__( "wrench", "esaf_kc" )       => 'wrench',
									__( "ring", "esaf_kc" )         => 'ring',
									__( "vertical", "esaf_kc" )     => 'vertical',
									__( "horizontal", "esaf_kc" )   => 'horizontal',
									__( "flash", "esaf_kc" )        => 'flash',
									__( "bounce", "esaf_kc" )       => 'bounce',
									__( "spin fast", "esaf_kc" )    => 'spin',
									__( "spin slow", "esaf_kc" )    => 'spinslow',
									__( "float", "esaf_kc" )        => 'float',
									__( "pulse", "esaf_kc" )        => 'pulse',
									__( "shake", "esaf_kc" )        => 'shake',
									__( "swing", "esaf_kc" )        => 'swing',
									__( "tada", "esaf_kc" )         => 'tada',
									__( "rubberBand", "esaf_kc" )   => 'rubberBand',
									__( "wobble", "esaf_kc" )       => 'wobble',
									__( "flip", "esaf_kc" )         => 'flip',
									__( "no animation", "esaf_kc" ) => '',
								),
							),
							array(
								'name'        => 'size',
								'label'       => __( "Icon size", "esaf_kc" ),
								'type'        => 'number_slider',
								'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
								'options'     => array(
									'min'        => 0,
									'max'        => 200,
									'unit'       => 'px',
									'show_input' => true,
								),
								'value'       => 2,
								'description' => __( "Select the icon size. Default is 14em", "esaf_kc" ),
							),
							array(
								"type"        => "color_picker",
								"label"     => __( "Icon color", "esaf_kc" ),
								"name"  => "ico_color",
								"value"       => "#00BFFF",
								"description" => __( "Select color for the icon", "esaf_kc" ),
							),
							array(
								"type"        => "select",
								"label"     => __( "Icon float:", "esaf_kc" ),
								"name"  => "float",
								"description" => __( '', 'esaf_kc' ),
								"options"       => array(
									__( "left", "esaf_kc" )  => 'pull-left',
									__( "right", "esaf_kc" ) => 'pull-right',
								),
							),


						),
					),
				),
			)

		);
	}

	function rdextkc_iconanimation_shortcode_function( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'float'            => 'left',
			'ico_color'        => '#00BFFF',
			'size'             => '2',
			'icon_fontawesome' => 'fa fa-angellist',
			'el_class'         => '',
			'icon_class'       => '',
			'animation'        => 'wrench',
			'isanimate'        => 'on',
		), $atts ) );
		//$content = wpb_js_remove_wpautop( $content );

		$size = $atts['size'] != '' ? (int) esc_attr( $atts['size'] ) : 3;
		if ( $el_class != "" ) {
			$output = '<i style="color:' . $ico_color . '; font-size:' . $size . 'em;" id="icon_anime" class="anime ' . esc_attr( $icon_fontawesome ) . ' faa-' . $animation . ' ' . $icon_class . '"></i><div class="' . $el_class . '">' . $content . '</div>';
		} else {
			$output = '<i style="color:' . $ico_color . '; font-size:' . $size . 'em;" id="icon_anime" class="anime ' . esc_attr( $icon_fontawesome ) . ' faa-' . $animation . ' ' . $icon_class . '"></i>' . $content . '';
		}

		return $output;
	}
}