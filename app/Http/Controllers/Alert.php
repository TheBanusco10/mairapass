<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Alert extends Controller
{

    public static function storeAlert($message) {
        Session::put('alert', $message);
    }

    public static function getAlert($alert) {
        return Session::get($alert);
    }

    public static function exists($alert) {
        return Session::exists($alert);
    }

    public static function deleteAlert($alert) {
        Session::remove($alert);
    }

}
