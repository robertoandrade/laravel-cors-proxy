<?php
namespace Elfo404\LaravelCORSProxy;

class InvalidRequestException extends \Exception {

    protected $message;
    private $uri;

    public function __construct($uri) {
        $this->uri = $uri;
        $this->message = "Requested URI: \"$this->uri\" is not listed as a valid request.";
    }

    public function __toString() {
        return $this->getMessage();
    }

}