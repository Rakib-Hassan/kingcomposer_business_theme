<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Extensions {

	use Eak\Base\ExtensionsController;

	class Separator extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'separator' ) ) {
				return;
			}
			add_shortcode( 'rdextkc_separator', array( $this, 'rdextkc_separator_func' ) );
			add_action( 'init', array( $this, 'separator' ) );

		}

		public function separator() {
			global $kc;
			$kc->add_map( array(
				'rdextkc_separator' => array(
					'name'        => 'Separator',
					'description' => __( 'Add Space/Separator', 'rdextkc' ),
					'icon'        => 'rdextkc_separator_icon',
					'css_box'     => true,
					'category'    => 'EAK ADDONS',
					'params'      => array(
						array(
							"type"        => "text",
							"label"       => __( "Height Space", 'rdextkc' ),
							"name"        => "height",
							"admin_label" => true,
							"description" => "Ex: 100, It Will Make 100px Height",
							"value"       => "300",
						)

					),
				),
			) );
		}

		// Register Before After Shortcode
		function rdextkc_separator_func( $atts, $content = null, $tag ) {
			extract(
				shortcode_atts(
					array(
						"height" => '300',
					),
					$atts)
			);

			$output = '<div class="rdextkc-space" style="height:'.$height.'px"></div>';

			return $output;
		}
	}

}