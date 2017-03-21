#Laravel Cors Proxy

 A simple CORS Proxy for laravel applications 
 
 
Intallation
=======================

Add the package to composer.json:

	"require": {
		...
		"elfo404/laravel-cors-proxy": "0.1.0"
	},
	
Or from the command line:
`` composer require elfo404/laravel-cors-proxy``
	 	

Add `Elfo404\LaravelCORSProxy\CORSProxyServiceProvider::class` in `config\app.php`, providers section.
	
	
There is no need to add a Facade.

You have now an endpoint for `http[s]://example.com/proxy` to submit your CORS proxied requests.


Config
=======================

Run `php artisan vendor:publish --provider="Elfo404\LaravelCORSProxy\CORSProxyServiceProvider" --tag=config --force` to export the default configuration in `config/cors-proxy.php`:

```$php
<?php
return [
    'header_name'=>'X-Proxy-To',
    'valid_requests'=>[],
    'http_proxy'=>false,
    'https_proxy'=>false,
];
```
- `header_name` is the default header name conaining the uri you want to proxy. Every request must send this header and specify to which uri the request has to be sent.
- `valid_requests` array containing a list od URIs tha can be proxied. this is only for security reason as these endpoints ar publicly accessible.
- `http_proxy` and `https_proxy` are self explanatory, improved doc is coming soon.

Usage
=======================

- jQuery example (domainA.com):
```$javascript
$.ajax({
  type: "POST",
  beforeSend: function(request) {
    request.setRequestHeader("X-Proxy-To", 'http://domainB.com/api');
  },
  url: "http://domainA.com/proxy",
  data: ...
});
```