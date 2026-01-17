<?php

namespace Api\v1;

use App\Models\UserModel;
use PDOException;

/**
 * Users API Controller
 * 
 * Handles all user-related API endpoints
 */
class UsersController extends BaseController
{
    /**
     * Get all users
     * GET /api/v1/users
     */
    public function indexAction()
    {
        try {
            // Note: You may want to add pagination and filtering
            $users = UserModel::getAll();
            $this->success($users, 'Users retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve users: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a single user by ID
     * GET /api/v1/users/{id}
     */
    public function showAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('User ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $user = UserModel::getUser($id);
            
            if (!$user) {
                $this->error('User not found', self::HTTP_NOT_FOUND);
            }
            
            // Remove sensitive information
            if (isset($user['password'])) unset($user['password']);
            if (isset($user['access_token'])) unset($user['access_token']);
            if (isset($user['confirmation_token'])) unset($user['confirmation_token']);
            
            $this->success($user, 'User retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve user: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
