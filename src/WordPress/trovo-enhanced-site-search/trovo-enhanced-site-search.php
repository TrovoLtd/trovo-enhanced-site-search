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

	spl_autoload_register('trovo_tess_autoload');

	function trovo_tess_autoload($class) {

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

	$result = new \Trovo\TESS\Core\GoogleSiteSearch\GoogleResult();

	$result->setTitle("Test Results");

	echo $result->getTitle();


?>
