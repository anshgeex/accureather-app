<?php

namespace Classes\Helpers;

class Env {

    // Array to store the parsed environment variables
    private static $variables = [];

    /**
     * Load the environment variables from the .env file
     */
    public static function load($filePath = '.env') {
        if (!file_exists($filePath)) {
            throw new \Exception(".env file not found");
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // First pass: Load the environment variables
        foreach ($lines as $line) {
            // Skip comments and empty lines
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Split the line by the first equal sign
            $parts = explode('=', $line, 2);

            // If both parts are present, store them in the variables array
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);

                // Optionally, handle special data types like booleans, numbers, etc.
                if (strtolower($value) === 'true') {
                    $value = true;
                } elseif (strtolower($value) === 'false') {
                    $value = false;
                } elseif (is_numeric($value)) {
                    $value = (float) $value;
                }

                self::$variables[$key] = $value;
            }
        }

        // Second pass: Handle variable expansion
        foreach (self::$variables as $key => &$value) {
            if (is_string($value)) {
                // Replace placeholders with actual values
                preg_match_all('/\$(\w+)/', $value, $matches); // Match $VAR_NAME patterns

                foreach ($matches[1] as $var) {
                    if (isset(self::$variables[$var])) {
                        $value = str_replace('$' . $var, self::$variables[$var], $value);
                    }
                }
            }
        }
    }

    /**
     * Get an environment variable by key
     */
    public static function get($key, $default = null) {
        return isset(self::$variables[$key]) ? self::$variables[$key] : $default;
    }
}
