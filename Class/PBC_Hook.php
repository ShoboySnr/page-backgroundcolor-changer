<?php

class PBC_Hook {

	/**
	 * Adds WordPress hooks.
	 *
	 * @param string $plugin_file_path
	 */
	public static function add_hooks( $plugin_file_path ) {
		register_activation_hook( $plugin_file_path, 'PBC_Admin::activate_page_backgroundcolor_changer' );
		register_deactivation_hook( $plugin_file_path, 'PBC_Admin::deactivate_page_backgroundcolor_changer' );
		register_uninstall_hook( $plugin_file_path, 'PBC_Admin::uninstall_page_backgroundcolor_changer' );
	}

}
