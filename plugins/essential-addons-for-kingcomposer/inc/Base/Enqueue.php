<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Base;

class Enqueue extends BaseController {
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'front_enqueue' ) );
	}

	public function admin_enqueue() {
		//admin enqueue scripts
		wp_enqueue_style( 'rdextks_fontawesome_load_admin', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' );

		wp_enqueue_style( 'rdextkc_admin_css', $this->plugin_url . 'assets/css/adminstyle.css' );

		wp_enqueue_script( 'rdextkc-admin-js', $this->plugin_url . 'assets/js/adminscript.min.js', array( 'jquery' ), '', true );

		wp_enqueue_style( 'epa-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Roboto|Roboto+Condensed' );

	}

	//wp/front enqueue scripts
	public function front_enqueue() {
		wp_enqueue_style( 'rdextkc_bootstrap_load', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
		wp_enqueue_style( 'rdextkc_fontawesome_load', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' );
		wp_enqueue_style( 'rdextkc-extensions-css', $this->plugin_url . 'assets/css/extensions.min.css' );

		wp_enqueue_style( 'eak-owl-carousel', $this->plugin_url . 'assets/css/owl.carousel.min.css' );
		wp_enqueue_style( 'eak-owl-carousel-theme', $this->plugin_url . 'assets/css/owl.theme.min.css' );
		wp_enqueue_style( 'eak-animate-min', $this->plugin_url . 'assets/css/animate.min.css' );

		wp_enqueue_script( 'rdextkc-extensions-js', $this->plugin_url . 'assets/js/extensions.min.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'eak-owl-carousel-js', $this->plugin_url . 'assets/js/owl.carousel.min.js', array( 'jquery' ), '', false );
	}
}