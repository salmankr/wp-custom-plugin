<?php
/**
 * @package customPlugin
 */

namespace Inc;

final class init{

	/**
	 * Including all functionality of plugin
	 * @return ...
	 */
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

	/**
	 * Looping through all plugin classes
	 * @return ...
	 */
	public static function register_components(){
		foreach (self::get_components() as $class) {
			$init = self::instantiate($class);
			if (method_exists($init, 'register')) {
				$init->register();
			}
		}
	}

	/**
	 * a private function to instantiate every class of plugin
	 * @param  [Object] $class [every plugin class]
	 * @return [Object]        [new instance of each class]
	 */
	private static function instantiate($class){
		return new $class();
	}
}