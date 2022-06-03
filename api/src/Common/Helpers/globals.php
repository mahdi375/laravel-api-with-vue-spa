<?php

if (!function_exists('module_path')) {
    function module_path(string $module, string $path = '') {
        return base_path("src/" . ucfirst($module) . "/". $path);
    }
}