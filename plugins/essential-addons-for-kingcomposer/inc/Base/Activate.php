<?php
/**
 * @package  RdExtKc
 */

namespace Eak\Base;

class Activate {
	public static function activate() {
		flush_rewrite_rules();


		$option_name = 'rdextkc_kingcomposer';

		if ( get_option( $option_name ) ) {
			return;
		}

		$default = array(
			'icon_animation',
			'before_after',
			'flipbox',
			'separator',
			'info_box',
			'accordion',
			'hover_effects',
			'pricing_table',
			'testimonialslider',
			'servicebox',
			'progressbar',
			'counter',
			'animatedtext',
			'zoommagnifier',
			'testimonial',
		);

		$default_settings = array_fill_keys( $default, true );

		if ( get_option( $option_name ) !== false ) {

			// The option already exists, so update it.
			update_option( $option_name, $default_settings );

		} else {

			// The option hasn't been created yet, so add it with $autoload set to 'no'.
			$deprecated = null;
			$autoload   = 'no';
			add_option( $option_name, $default_settings, $deprecated, $autoload );

		}
	}
}