<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 15.12.2020
 * Time: 23:59
 */

if (!function_exists('settings')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function settings()
    {
        $setting = session()->get('setting');

        if (!$setting) {
            $setting = \App\Models\Entities\Setting::first();
            if ($setting) {
                session()->put('setting', $setting);
                redirect()->route('welcome');
            }
        }

        if (!$setting) {
            $setting = new \App\Models\Entities\Setting();
        }
        return $setting;
    }
}