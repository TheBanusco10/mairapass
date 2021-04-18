<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{
    public static function encrypt($string) {
        return Crypt::encryptString($string);
    }

    public static function decrypt($string) {
        $decrypt = Crypt::decryptString($string);
        return $decrypt;
    }
}
