<?php




// require_once 'libraries/google-auth/src/GetUniverseDomainInterface.php';
// require_once 'libraries/google-api/src/Service.php';
// require_once 'libraries/google-api/src/Service/Resource.php';
// require_once 'libraries/google-api/src/Sheets.php';
// require_once 'libraries/google-api/src/Model.php';
// require_once 'libraries/google-api/src/Collection.php';
// require_once 'libraries/google-api/src/Service/Sheets/Resource/SpreadsheetsDeveloperMetadata.php';
// require_once 'libraries/google-api/src/Service/Sheets/Resource/SpreadsheetsSheets.php';
// require_once 'libraries/google-api/src/Service/Sheets/Resource/SpreadsheetsValues.php';
// require_once 'libraries/google-api/src/Service/Sheets/Resource/Spreadsheets.php';


// require_once 'libraries/Psr/LoggerAwareInterface.php';
// require_once 'libraries/Psr/LoggerInterface.php';
// require_once 'libraries/Psr/LoggerTrait.php';
// require_once 'libraries/Psr/AbstractLogger.php';
// require_once 'libraries/Psr/LoggerAwareTrait.php';
// require_once 'libraries/Psr/InvalidArgumentException.php';
// require_once 'libraries/Psr/LogLevel.php';
// require_once 'libraries/Psr/NullLogger.php';

// require_once 'libraries/Monolog/Handler/Handler.php';
// require_once 'libraries/Monolog/Handler/HandlerInterface.php';
// require_once 'libraries/Monolog/Handler/AbstractHandler.php';
// require_once 'libraries/Monolog/ResettableInterface.php';
// require_once 'libraries/Monolog/Logger.php';
// require_once 'libraries/Monolog/Handler/StreamHandler.php';
// // Include other Monolog files as needed

// require_once 'libraries/google-api/src/Service/Sheets/Spreadsheet.php';
// require_once 'libraries/google-api/src/Client.php';

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/libraries/';
    $namespaces = [
        'Google\\' => 'google-api/src/',
        'Google\\Auth\\' => 'google-auth/src/',
        'Monolog\\' => 'monolog/src/Monolog/',
        'Psr\\Log\\' => 'Psr/Log/',
        'GuzzleHttp\\Psr7\\' => 'guzzlehttp/psr7/src/',
        'Psr\\Http\\Message\\' => 'psr/http-message/src/',
        'Psr\\Http\\Client\\' => 'psr/http-client/src/',
        'Psr\\Cache\\' => 'psr/cache/src/',
        'GuzzleHttp\\' => 'guzzlehttp/guzzle/src/',
        'GuzzleHttp\\Promise\\' => 'guzzlehttp/promises/src/',
        'Firebase\\JWT\\' => 'firebase/jwt/src/' // Added Firebase JWT mapping
    ];

    foreach ($namespaces as $prefix => $path) {
        if (str_starts_with($class, $prefix)) {
            $relativeClass = str_replace($prefix, '', $class);
            $filePath = $baseDir . $path . str_replace('\\', '/', $relativeClass) . '.php';

            if ($class === 'Google\Service\Sheets') {
                $filePath = $baseDir . 'google-api/src/Sheets.php';
            } else if($class === 'Google\Service\Drive'){
                $filePath = $baseDir . 'google-api/src/Drive.php';
            }

            if (file_exists($filePath)) {
                require_once $filePath;
                return;
            } else {
                error_log("Class file not found for $class at $filePath");
            }
        }
    }
});

require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'classes/helpers/CurlRequest.php';
require_once 'classes/helpers/Env.php';
require_once 'classes/index.php';
require_once 'app/config/index.php';
require_once 'functions/index.php';
require_once 'app/config/constants.php';
require 'app/dummy.php';

$app = new AppInit();