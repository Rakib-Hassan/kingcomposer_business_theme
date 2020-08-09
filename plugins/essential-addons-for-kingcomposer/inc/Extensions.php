<?php
/**
 * @package  RdExtKc
 */
namespace Eak;

final class Extensions {
	/**
	 * Store all the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public static function get_services() {
		return [

			Extensions\IconAnimation::class,
			Extensions\ServiceBox::class,
			Extensions\BeforeAfter::class,
			Extensions\FlipBox::class,
			Extensions\Separator::class,
			Extensions\InfoBox::class,
			Extensions\Accordion::class,
			Extensions\HoverEffects::class,
			Extensions\PricingTable::class,
			Extensions\ProgressBar::class,
			Extensions\CounTer::class,
			Extensions\TestimonialSlider::class,
			Extensions\AnimatedText::class,
			Extensions\ZoomMagnifier::class,
			Extensions\Testimonial::class,
		];

	}

	/**
	 * Loop through the classes::class, initialize them::class,
	 * and call the register() method if it exists
	 *
	 * @return
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$extensions = self::instantiate( $class );
			if ( method_exists( $extensions, 'extensions_register' ) ) {
				$extensions->extensions_register();
			}
		}
	}

	/**
	 * Initialize the class
	 *
	 * @param  class $class class from the services array
	 *
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class ) {
		$extensions = new $class();

		return $extensions;
	}

}