<?php

/**
 * Added by Dave to register the autoload function to load the plugin code
 *
 * I'll actually add this to the functions.php of a custom theme once I've finished this experiment
 */

spl_autoload_register('trovo_tess_autoload');

function trovo_tess_autoload($class) {

    $prefix = 'Trovo\\TESS\\';
    $base_dir = WP_PLUGIN_DIR . '/trovo-enhanced-site-search/src/';

    $len = strlen($prefix);

    if(strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    //echo $file;

    if(file_exists($file)) {
        require_once($file);
    }
}

