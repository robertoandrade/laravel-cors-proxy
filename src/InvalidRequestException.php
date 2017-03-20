<?php
namespace Elfo404\LaravelCORSProxy;

class InvalidRequestException extends \Exception {

    protected $message;
    private $uri;

    public function __construct($uri) {
        $this->uri = $uri;
        $this->message = "Requested URI: \"$this->uri\" is not present in valid requests configuration";
    }

    public function __toString() {
        return $this->getMessage();
    }

}