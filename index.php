<?php
namespace php_require\php_render_php;

$module->exports = function ($filename, $data, $callback) {

    ob_start();
    extract($data);

    $end = 0;
    if (isset($start)) {
        $end = (microtime(true) - $start) / 1000;
    }

    include($filename);
    $buffer = ob_get_contents();
    ob_end_clean();
    $callback(null, $buffer);
};
