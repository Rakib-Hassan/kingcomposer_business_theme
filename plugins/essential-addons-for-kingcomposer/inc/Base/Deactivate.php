<?php
/**
 * @package  RdExtKc
 */
namespace Eak\Base;

class Deactivate {
	public static function deactivate() {
		flush_rewrite_rules();
	}
}