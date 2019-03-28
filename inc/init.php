<?php
/**
 * @package customPlugin
 */

namespace Inc;

final class init{
	public static function get_components(){
		return [
            actions\activate::class,
            actions\deactivate::class,
            actions\settings::class,
            actions\scripts::class,
            components\CPT\Review\review::class,
            components\CPT\Review\metabox::class,
            components\html\handler::class,
		];
	}
	public static function register_components(){
		foreach (self::get_components() as $class) {
			$init = self::instantiate($class);
			if (method_exists($init, 'register')) {
				$init->register();
			}
		}
	}
	private static function instantiate($class){
		return new $class();
	}
}