<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return Setting::getValue($key, $default);
    }
}

if (!function_exists('set_setting')) {
    function set_setting($key, $value)
    {
        return Setting::setValue($key, $value);
    }
}
