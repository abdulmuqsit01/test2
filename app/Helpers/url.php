<?php

if (!function_exists('statics')) {
    function statics($path, $secure = null)
    {
        if (env('USE_CDN')) {
            return env('STATICS_CDN') . trim($path, '/');
        }

        return asset($path, $secure);
    }
}

if (!function_exists('uploads')) {
    function uploads($path, $secure = null)
    {
        if (env('USE_CDN')) {
            return env('UPLOADS_CDN') . trim($path, '/');
        }

        return asset($path, $secure);
    }
}
