<?php

require_once __DIR__ . '/lib/vendor/autoload.php';
spl_autoload_register("gbStandardAutoload");

function gbStandardAutoload($className)
{
    $dirs = [
        'c',
        'm',
        'v'
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';
        if (is_file($fileName)) {

            require_once($fileName);
            $found = true;
        }
    }
    //$obj = new A;

    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}


//$object = new Test;

