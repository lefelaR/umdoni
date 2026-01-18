<?php

namespace Api\v1;

/**
 * Health Check API Controller
 * 
 * Provides API health status and version information
 */
class HealthController extends BaseController
{
    /**
     * Health check endpoint
     * GET /api/v1/health
     */
    public function indexAction()
    {
        $health = [
            'status' => 'ok',
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => '1.0.0',
            'environment' => $_ENV['APP_ENV'] ?? 'development',
            'server' => [
                'php_version' => PHP_VERSION,
                'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'
            ]
        ];
        
        $this->success($health, 'API is healthy');
    }
}
