<?php

namespace Api\v1;

use App\Models\NewsModel;
use PDOException;

/**
 * News API Controller
 * 
 * Handles all news-related API endpoints
 */
class NewsController extends BaseController
{
    /**
     * Get all news items
     * GET /api/v1/news
     */
    public function indexAction()
    {
        try {
            $news = NewsModel::Get();
            $this->success($news, 'News retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve news: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a single news item by ID
     * GET /api/v1/news/{id}
     */
    public function showAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('News ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $news = NewsModel::GetById($id);
            
            if (!$news) {
                $this->error('News item not found', self::HTTP_NOT_FOUND);
            }
            
            $this->success($news, 'News retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve news: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create a new news item
     * POST /api/v1/news
     */
    public function createAction()
    {
        try {
            $data = $this->getRequestBody();
            
            // Validate required fields
            $required = ['title', 'subtitle', 'body'];
            $errors = $this->validateRequired($data, $required);
            
            if (!empty($errors)) {
                $this->error('Validation failed', self::HTTP_UNPROCESSABLE_ENTITY, $errors);
            }
            
            // Set default values
            $data['createdAt'] = $data['createdAt'] ?? date('Y-m-d H:i:s');
            $data['isActive'] = $data['isActive'] ?? 1;
            $data['img_file'] = $data['img_file'] ?? null;
            $data['location'] = $data['location'] ?? null;
            
            $result = NewsModel::Save($data);
            
            if ($result) {
                $this->success(['id' => $result], 'News created successfully', self::HTTP_CREATED);
            } else {
                $this->error('Failed to create news', self::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (PDOException $e) {
            $this->error('Failed to create news: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update a news item
     * PUT /api/v1/news/{id}
     */
    public function updateAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('News ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $data = $this->getRequestBody();
            $data['id'] = $id;
            $data['updatedAt'] = $data['updatedAt'] ?? date('Y-m-d H:i:s');
            
            $result = NewsModel::Update($data);
            
            if ($result !== false) {
                $this->success(null, 'News updated successfully');
            } else {
                $this->error('Failed to update news', self::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (PDOException $e) {
            $this->error('Failed to update news: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete a news item (soft delete)
     * DELETE /api/v1/news/{id}
     */
    public function deleteAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('News ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $result = NewsModel::Delete($id);
            
            if ($result !== false) {
                $this->success(null, 'News deleted successfully', self::HTTP_NO_CONTENT);
            } else {
                $this->error('Failed to delete news', self::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (PDOException $e) {
            $this->error('Failed to delete news: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
