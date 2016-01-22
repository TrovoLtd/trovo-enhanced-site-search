<?php
/*
    Plugin Name: Trovo Enhanced Site Search
    Plugin URI: http://www.trovo.co.uk
    Description: Enables business agility for the search function of a Wordpress site. One plugin integrates with multiple search providers
    Version: 0.0.0.1
    Author: David Gerrard
    Author URI: https://github.com/ShakeyDave
    License: GPLv2
*/


	spl_autoload_register('trovo_plugin_autoload');

	function trovo_plugin_autoload($class) {

		$prefix = 'Trovo\\TESS\\';
		$base_dir = __DIR__ . '/src/';

		$len = strlen($prefix);

		if(strncmp($prefix, $class, $len) !== 0) {
			return;
		}

		$relative_class = substr($class, $len);
		$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

		if(file_exists($file)) {
			require_once($file);
		}
	}


    $plugin_file_name = basename(dirname(__FILE__)).'/'.basename(__FILE__);

    register_activation_hook($plugin_file_name, 'trovo_search_plugin_install');
    register_deactivation_hook($plugin_file_name, 'trovo_search_plugin_deactivate');

    function trovo_search_plugin_install()
    {

        $trovo_search_options = array(
            'gss_account_id' => 'Add Google Account Id',
            'number_of_results_per_page' => '10'
        );

        update_option('trovo_search_options', $trovo_search_options);

    }

    function trovo_search_plugin_deactivate() {

        delete_option('trovo_search_options');

    }

    new \Trovo\TESS\WordPress\GSS_Plugin_Manager;

?>
