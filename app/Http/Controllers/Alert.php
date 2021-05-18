<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Alert extends Controller
{

    public static function storeAlert($message, $type = 'success') {
        Session::put('alert', $message);
        Session::put('alertType', $type);
    }

    public static function getAlert($alert): array {
        return array(
            'message' => Session::get($alert),
            'type' => Session::get('alertType')
        );

    }

    public static function exists($alert) {
        return Session::exists($alert);
    }

    public static function deleteAlert($alert) {
        Session::remove($alert);
        Session::remove('alertType');
    }

}
