<?php
namespace App;

class Autoloader {

	/**
	 * Load autoloader()
	 */
	static function register(): void
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}


	/**
	 * Load class into folder "Class"
	 * 
	 * @param string $className
	 */
	static function autoload(string $className): void
	{
		$className = explode('\\', $className);
		$countClass = count($className) - 1;

		require 'src/class/' . $className[$countClass] . '.php';
	}
}
