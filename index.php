<?php
namespace php_require\php_render_php;

$module->exports = function ($filename, $data=array(), $callback=null) {

    ob_start();
    extract($data);

    $end = 0;
    if (isset($start)) {
        $end = microtime(true) - $start;
    }

    include($filename);
    $buffer = ob_get_contents();
    ob_end_clean();

    if ($callback) {
        $callback(null, $buffer);
    }

    return $buffer;
};
