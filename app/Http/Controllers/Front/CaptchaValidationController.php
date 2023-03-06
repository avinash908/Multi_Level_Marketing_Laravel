<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaptchaValidationController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
