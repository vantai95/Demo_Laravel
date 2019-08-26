<?php

namespace App\Services;

use App;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class CommonService
{
    public static function formatShortDate($date)
    {
        if (empty($date)) {
            return '';
        }
        return date('d-m-Y', strtotime($date));
    }

    public static function formatLongDate($date)
    {
        if (empty($date)) {
            return '';
        }
        return date('d-m-Y H:i:s', strtotime($date));
    }

    public static function formatInteger($number)
    {
        if (empty($number)) {
            return '';
        }

        if (!is_numeric($number)) {
            return '';
        }

        if ($number < 0) {
            return '';
        }
        return number_format($number, 0, ',', '.');
    }

    public static function internationalPhoneNumber($text, $countryCode = '84')
    {
        if (empty($text)) {
            return $text;
        }

        if (starts_with($text, '0')) {
            return $countryCode . substr($text, 1);
        }

        if (starts_with($text, '+')) {
            return substr($text, 1);
        }

        return $text;
    }

    public static function checkPermission($permissionKey, $isValue = false)
    {
        $permissions = Auth::user()->allPermissions();
        if (empty($permissions)) {
            session(['permissions' => $permissions]);
        }
        if ($isValue) {
            $permission = $permissionKey;
        } else {
            $permission = Role::PERMISSIONS[$permissionKey];
        }
        return isset($permissions[$permission]) && $permissions[$permission];
    }

    public static function correctSearchKeyword($keyword)
    {
        $keyword = str_replace(' ', '%', $keyword);
        return "%$keyword%";
    }

    public static function formatFileSize($size)
    {
        return round($size / 1048576, 2);
    }

    public static function containString($str,$substr){
        return strpos($str,$substr) !== false;
    }

    public static function isBase64Encoded($data)
    {
        return (bool)preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $data);
    }


}
