<?php

namespace Elfo404\LaravelCORSProxy;

use Illuminate\Http\Request;

class CORSProxy {

    public static function index(Request $request){
        return $request->header('X-Proxy-To','lol');
    }

}