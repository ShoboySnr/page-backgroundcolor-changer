<?php


class PBC_Autoloader {

  /**
	 * Registers class loader.
	 */
	public static function register() {
		spl_autoload_register( 'PBC_Autoloader::loader' );
	}

   private static function loader ($class_name) {
    
    //classes

   }
}