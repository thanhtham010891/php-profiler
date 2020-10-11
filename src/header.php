<?php

use Xhgui\Profiler\Profiler;

if (!defined('XHPROF_PROFILER_DIR')) {
    define('XHPROF_PROFILER_DIR', getenv('XHPROF_PROFILER_DIR') ?: '/var/www');
}

require_once XHPROF_PROFILER_DIR . '/vendor/autoload.php';

try {
    $profiler = new Profiler(require_once XHPROF_PROFILER_DIR . '/config.php');
    $profiler->start();
} catch (Exception $e) {
    echo $e->getMessage();
    error_log('xhprof: ' . $e->getMessage());
}
