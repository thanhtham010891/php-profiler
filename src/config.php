<?php

use Xhgui\Profiler\Profiler;
use Xhgui\Profiler\ProfilingFlags;

return array(
    // If defined, use specific profiler
    // otherwise use any profiler that's found
    'profiler' => Profiler::PROFILER_XHPROF,

    // This allows to configure, what profiling data to capture
    'profiler.flags' => array(
        ProfilingFlags::CPU,
        ProfilingFlags::MEMORY,
        ProfilingFlags::NO_BUILTINS,
        ProfilingFlags::NO_SPANS,
    ),

    // Saver to use.
    // Please note that 'pdo' and 'mongo' savers are deprecated
    // Prefer 'upload' or 'file' saver.
    'save.handler' => Profiler::SAVER_UPLOAD,

    // Environment variables to exclude from profiling data
    'profiler.exclude-env' => array(
        'APP_DATABASE_PASSWORD',
        'PATH',
    ),

    'profiler.options' => array(),

    /**
     * Determine whether the profiler should run.
     * This default implementation profiles every request.
     * Override this with your custom logic in your config.
     *
     * @see https://github.com/perftools/php-profiler#configure-profiling-rate
     * @return bool
     */
    'profiler.enable' => function () {
        return true;
    },

    /**
     * Creates a simplified URL given a standard URL.
     * Does the following transformations:
     *
     * - Remove numeric values after "=" in query string.
     *
     * @param string $url
     * @return string
     */
    'profiler.simple_url' => function ($url) {
        return preg_replace('/=\d+/', '', $url);
    },

    /**
     * Enable this to clean up the url before submitting it to XHGui.
     * This way it is possible to remove sensitive data or discard any other data.
     *
     * The URL argument is the `REQUEST_URI` or `argv` value.
     *
     * @param string $url
     * @return string
     */
    'profiler.replace_url' => function ($url) {
        return str_replace('token', '', $url);
    },
);
