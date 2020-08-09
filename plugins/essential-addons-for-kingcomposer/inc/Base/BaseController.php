<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Base;

class BaseController {
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $shortcodes = array();

	//For PHP Lower Version - Get Path
	public function prime_dirname( $path, $count = 1 ) {
		if ( $count > 1 ) {
			return dirname( $this->prime_dirname( $path, -- $count ) );
		} else {
			return dirname( $path );
		}
	}


	public function __construct() {
		$this->plugin_path = plugin_dir_path( $this->prime_dirname( __FILE__, 2 ) );
		$this->plugin_url  = plugin_dir_url( $this->prime_dirname( __FILE__, 2 ) );
		$this->plugin      = plugin_basename( $this->prime_dirname( __FILE__, 3 ) ) . '/essential-addons-for-kingcomposer.php';

		/*-----------------------------------------------------------------------------------*/
		/*	Initalising Shortcodes In Content and Widget
		/*-----------------------------------------------------------------------------------*/
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'the_content', 'do_shortcode' );
		add_filter( 'the_excerpt', 'do_shortcode' );


		$this->shortcodes = array(
			'icon_animation' => 'Icon Animation',
			'servicebox'     => 'Service Box',
			'before_after'   => 'Image Comparison',
			'flipbox'        => 'FlipBox',
			'separator'        => 'Separator',
			'info_box'       => 'Info Box',
			'accordion'      => 'Accordion ',
			'hover_effects'  => 'Hover Effects',
			'pricing_table'  => 'Pricing Table',
			'testimonialslider'    => 'Testimonial Slider',
			'progressbar'     => 'Progress Bar',
			'counter'     => 'Counter',
			'animatedtext'     => 'Animated Text',
			'zoommagnifier'     => 'Zoom Magnifier',
			'testimonial'     => 'Testimonial',
		);
	}
}