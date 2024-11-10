<?php

namespace App\Config;
use Classes\Helpers\Env;

class Config {

    // Store configuration values in an associative array
    private $config = [];

    // The singleton instance
    private static $instance = null;

    /**
     * Private constructor to prevent multiple instances
     */
    private function __construct() {
        // Load the default configuration
        Env::load();

        $this->config = [
            // accu weather api keys
            'baseurl' => Env::get('API_BASEURL').'/',
            'api_v' => Env::get('API_VERSION'),
            'apikey' => Env::get('API_KEY'),
            'apiurl' => Env::get('API_URL'),
            'timezone' => Env::get('TIMEZONE'),

            // smtp details
            'mailDrive'=> Env::get('MAIL_DRIVER'),
            'mailHost'=> Env::get('MAIL_HOST'),
            'mailPort'=> Env::get('MAIL_PORT'),
            'mailUsername'=> Env::get('mail_username'),
            'mailPassword'=> Env::get('MAIL_PASSWORD'),
            'mailEncryption'=> Env::get('MAIL_ENCRYPTION'),
            'mailFromName'=> Env::get('MAIL_FROMNAME'),

        ];
    }

    /**
     * Get the singleton instance of Config
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    /**
     * Get a configuration value
     */
    public function get($key) {
        return $this->config[$key] ?? null; // Return null if the key does not exist
    }

    /**
     * Set a configuration value
     */
    public function set($key, $value) {
        $this->config[$key] = $value;
    }

    /**
     * Magic method to access configuration values using app()->key
     */
    public function __get($key) {
        return $this->get($key);
    }
}
