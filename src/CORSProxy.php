<?php

namespace Elfo404\LaravelCORSProxy;

use GuzzleHttp\Exception\ClientException as ClientException;
use GuzzleHttp\Psr7\Uri as Uri;
use Illuminate\Http\Request as Request;
use GuzzleHttp\Client as Client;
use \GuzzleHttp\Psr7\Request as Req;


class CORSProxy {

    public static function index(Request $request) {
        $uri = new Uri($request->header(config('cors-proxy.header_name', 'X-Proxy-To'), false));
        if (in_array($uri->__toString(), config('cors-proxy.valid_requests'))) {
            $client = new Client([
                'base_uri' => $uri->getScheme() . "://" . $uri->getHost(),
                'proxy' => [
                    'http' => config('cors-proxy.http_proxy', false),
                    'https' => config('cors-proxy.https_proxy', false)
                ],
                'timeout' => 2
            ]);
            //todo body parameters for post, put and deletes
            $req = new Req($request->method(), $uri->getPath(), $request->headers->all());
            try {
                $res = $client->send($req, ['query' => $request->getQueryString()]);
            } catch (ClientException $e) {
                $res = $e->getResponse();
            }
            return $res;
        } else {
            throw new InvalidRequestException($uri);
        }
    }
}