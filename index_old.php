<?php

// Get the base directory dynamically
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$_BASEURL   = str_replace($scriptName, '', $requestUri);

switch ($_BASEURL) {
    case '/':
    case '':
        die('we got this');
        break;
    
    default:
        # code...
        die('default case');
        break;
}
// $route = new Routes();

// // Define routes like in Laravel
// $route->get('/', function() {
//     echo "Welcome to the weather app!";
// });

// $route->get('/weather', 'WeatherController@getWeather');
// $route->post('/report', 'ReportController@generateReport');

// Dispatch the route
$route->dispatch();
