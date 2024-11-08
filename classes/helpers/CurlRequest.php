<?php
namespace Classes\Helpers;
class CurlRequest {

    /**
     * Execute a cURL request
     *
     * @param string $url
     * @param string $method (GET, POST, PUT, DELETE)
     * @param array $data (optional, data to send with the request)
     * @param array $headers (optional, custom headers)
     * @return mixed
     */
    public static function request($url, $method = 'GET', $data = [], $headers = []) {
        $ch = curl_init();

        // Set default options for cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // disable SSL verification (can be enabled in production)

        // Set custom headers if provided
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        // Set the request method (GET, POST, PUT, DELETE)
        switch (strtoupper($method)) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                if (!empty($data)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // for form data
                }
                break;

            case 'PUT':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                if (!empty($data)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                }
                break;

            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if (!empty($data)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                }
                break;

            case 'GET':
            default:
                if (!empty($data)) {
                    $url .= '?' . http_build_query($data); // append data to URL for GET requests
                    curl_setopt($ch, CURLOPT_URL, $url);
                }
                break;
        }

        // Execute cURL request and get the response
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            curl_close($ch);
            return ['error' => $errorMessage];
        }

        // Get the response status code
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Return response and status code
        return [
            'status_code' => $statusCode,
            'response' => json_decode($response, true) // returns the response as an array (or null if not valid JSON)
        ];
    }

    /**
     * Convenience method for GET requests
     */
    public static function get($url, $data = [], $headers = []) {
        return self::request($url, 'GET', $data, $headers);
    }

    /**
     * Convenience method for POST requests
     */
    public static function post($url, $data = [], $headers = []) {
        return self::request($url, 'POST', $data, $headers);
    }

    /**
     * Convenience method for PUT requests
     */
    public static function put($url, $data = [], $headers = []) {
        return self::request($url, 'PUT', $data, $headers);
    }

    /**
     * Convenience method for DELETE requests
     */
    public static function delete($url, $data = [], $headers = []) {
        return self::request($url, 'DELETE', $data, $headers);
    }
}
