<?php
/**
 * Created by PhpStorm.
 * User: gricci
 * Date: 20/03/17
 * Time: 12.40
 */

namespace Elfo404\LaravelCORSProxy\Http;

use Elfo404\LaravelCORSProxy\CORSProxy;
use Illuminate\Http\Request as Request;
use Illuminate\Routing\Controller as BaseController;

class CORSController extends BaseController {

    public function index(Request $request) {

        $response=CORSProxy::index($request);
        return response($response->getBody())
            ->setStatusCode($response->getStatusCode())
            ->withHeaders($response->getHeaders());
    }
}