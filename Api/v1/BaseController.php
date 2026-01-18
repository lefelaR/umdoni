<?php

namespace Api\v1;

use Core\Controller;

/**
 * Base API Controller
 * 
 * Provides common functionality for all API controllers
 * Handles JSON responses, CORS, and error handling
 */
abstract class BaseController extends Controller
{
    /**
     * HTTP status codes
     */
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_NO_CONTENT = 204;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    /**
     * Before filter - Set headers for API responses
     */
    protected function before()
    {
        // Set CORS headers
        $this->setCorsHeaders();
        
        // Handle preflight OPTIONS request
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $this->respond([], self::HTTP_OK);
            return false;
        }
        
        // Set JSON content type
        header('Content-Type: application/json; charset=UTF-8');
        
        return true;
    }

    /**
     * Set CORS headers
     */
    protected function setCorsHeaders()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Max-Age: 3600');
    }

    /**
     * Send JSON response
     * 
     * @param mixed $data Response data
     * @param int $statusCode HTTP status code
     * @return void
     */
    protected function respond($data, $statusCode = self::HTTP_OK)
    {
        http_response_code($statusCode);
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * Send success response
     * 
     * @param mixed $data Response data
     * @param string $message Success message
     * @param int $statusCode HTTP status code
     * @return void
     */
    protected function success($data = null, $message = 'Success', $statusCode = self::HTTP_OK)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
        $this->respond($response, $statusCode);
    }

    /**
     * Send error response
     * 
     * @param string $message Error message
     * @param int $statusCode HTTP status code
     * @param array $errors Additional error details
     * @return void
     */
    protected function error($message = 'An error occurred', $statusCode = self::HTTP_BAD_REQUEST, $errors = [])
    {
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ];
        $this->respond($response, $statusCode);
    }

    /**
     * Get request body as JSON
     * 
     * @return array|null
     */
    protected function getRequestBody()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error('Invalid JSON in request body', self::HTTP_BAD_REQUEST);
        }
        
        return $data;
    }

    /**
     * Get request method
     * 
     * @return string
     */
    protected function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Validate required fields
     * 
     * @param array $data Data to validate
     * @param array $required Required field names
     * @return array Array of validation errors (empty if valid)
     */
    protected function validateRequired($data, $required)
    {
        $errors = [];
        
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $errors[$field] = "Field '{$field}' is required";
            }
        }
        
        return $errors;
    }
}
