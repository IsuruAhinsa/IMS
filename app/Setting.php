<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'user_id',
        'site_name',
        'logo',
        'favicon',
        'email_logo',
        'navbar_color',
        'sidebar_color',
        'skin',
        'locale',
        'date_format',
        'time_format',
        'footer_text',
    ];

    public static function timeFormats()
    {
        return [
            'g:i A',
            'h:i A',
            'H:i',
        ];
    }

    public static function dateFormats()
    {
        return [
            'Y-m-d',
            'D M d, Y',
            'M j, Y',
            'd M, Y',
            'm/d/Y',
            'n/d/y',
            'd/m/Y',
            'd.m.Y',
            'Y.m.d',
        ];
    }

    public static function navbarColors()
    {
        return array(
            'navbar-white' => 'white',
            'navbar-primary' => 'primary',
            'navbar-secondary' => 'secondary',
            'navbar-info' => 'info',
            'navbar-success' => 'success',
            'navbar-danger' => 'danger',
            'navbar-indigo' => 'indigo',
            'navbar-purple' => 'purple',
            'navbar-pink' => 'pink',
            'navbar-navy' => 'navy',
            'navbar-lightblue' => 'lightblue',
            'navbar-teal' => 'teal',
            'navbar-cyan' => 'cyan',
            'navbar-dark' => 'dark',
            'navbar-gray-dark' => 'gray-dark',
            'navbar-gray' => 'gray',
        );
    }

    public static function sidebarColors()
    {
        return array(
            'sidebar-dark' => 'Dark',
            'sidebar-light' => 'Light',
        );
    }

    public static function skins()
    {
        return array(
            'primary' => 'primary',
            'warning' => 'warning',
            'info' => 'info',
            'danger' => 'danger',
            'success' => 'success',
            'indigo' => 'indigo',
            'lightblue' => 'lightblue',
            'navy' => 'navy',
            'purple' => 'purple',
            'fuchsia' => 'fuchsia',
            'pink' => 'pink',
            'maroon' => 'maroon',
            'orange' => 'orange',
            'lime' => 'lime',
            'teal' => 'teal',
            'olive' => 'olive',
        );
    }

    /**
     * Get the app settings for all views
     * @SettingServiceProvider
     */
    public static function getCommonSettings()
    {
        try {
            return self::first();
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * Get the app settings for all views
     * @SettingController
     */
    public static function getSettings()
    {
        try {
            return self::firstOrNew();
        } catch (\Throwable $throwable) {
            return null;
        }
    }
}
