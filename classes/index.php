<?php
require 'services/EntryPointClass.php';
require 'services/AccuWeatherClass.php';


class AppInit {
    private $baseUri;

    public function __construct() {
        $this->baseUri = str_replace(dirname($_SERVER['SCRIPT_NAME']), '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if ($this->baseUri === '' || $this->baseUri === '/') {
            $this->baseUri = '/';
        }

        $this->RouteRequest();
    }

    public function RouteRequest() {
        switch ($this->baseUri) {
            case '/':
                new EntryPoint();
                break;

            case '/generate-report':
                new AccuWeather();
                break;

            default:
                http_response_code(404);
                echo "404 Not Found";
                break;
        }
    }
}