<?php

namespace Api\v1;

use App\Models\CouncillorModel;
use PDOException;

/**
 * Councillors API Controller
 * 
 * Handles all councillor-related API endpoints
 */
class CouncillorsController extends BaseController
{
    /**
     * Get all councillors
     * GET /api/v1/councillors
     */
    public function indexAction()
    {
        try {
            $councillors = CouncillorModel::GET();
            $this->success($councillors, 'Councillors retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve councillors: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to retrieve councillors: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a single councillor by ID
     * GET /api/v1/councillors/{id}
     */
    public function showAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('Councillor ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $councillors = CouncillorModel::getCouncillorById($id);
            
            if (!$councillors || empty($councillors)) {
                $this->error('Councillor not found', self::HTTP_NOT_FOUND);
            }
            
            // getCouncillorById returns an array, get first item
            $councillor = is_array($councillors) && isset($councillors[0]) ? $councillors[0] : $councillors;
            
            $this->success($councillor, 'Councillor retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to retrieve councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get EXCO members
     * GET /api/v1/councillors/exco
     */
    public function excoAction()
    {
        try {
            $exco = CouncillorModel::getExco();
            $this->success($exco, 'EXCO members retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve EXCO members: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to retrieve EXCO members: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get senior managers
     * GET /api/v1/councillors/seniors
     */
    public function seniorsAction()
    {
        try {
            $seniors = CouncillorModel::getSeniors();
            $this->success($seniors, 'Senior managers retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve senior managers: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to retrieve senior managers: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create a new councillor
     * POST /api/v1/councillors/create
     */
    public function createAction()
    {
        try {
            $data = $this->getRequestBody();
            
            // Validate required fields
            $required = ['name', 'surname', 'title', 'category'];
            $errors = $this->validateRequired($data, $required);
            
            if (!empty($errors)) {
                $this->error('Validation failed', self::HTTP_UNPROCESSABLE_ENTITY, $errors);
            }
            
            // Set default values
            $data['middlename'] = $data['middlename'] ?? '';
            $data['email'] = $data['email'] ?? '';
            $data['telephone'] = $data['telephone'] ?? '';
            $data['ward'] = $data['ward'] ?? '';
            $data['img_file'] = $data['img_file'] ?? null;
            $data['location'] = $data['location'] ?? null;
            $data['isActive'] = $data['isActive'] ?? 1;
            
            $result = CouncillorModel::Save($data);
            
            if ($result) {
                $this->success(['id' => $result], 'Councillor created successfully', self::HTTP_CREATED);
            } else {
                $this->error('Failed to create councillor', self::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (PDOException $e) {
            $this->error('Failed to create councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to create councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update a councillor
     * PUT /api/v1/councillors/{id}/update
     */
    public function updateAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('Councillor ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $data = $this->getRequestBody();
            $data['id'] = $id;
            $data['updatedAt'] = $data['updatedAt'] ?? date('Y-m-d H:i:s');
            
            $result = CouncillorModel::Update($data);
            
            if ($result !== false) {
                $this->success(null, 'Councillor updated successfully');
            } else {
                $this->error('Failed to update councillor', self::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (PDOException $e) {
            $this->error('Failed to update councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to update councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete a councillor (soft delete)
     * DELETE /api/v1/councillors/{id}/delete
     */
    public function deleteAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('Councillor ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $result = CouncillorModel::Delete($id);
            
            if ($result !== false) {
                $this->success(null, 'Councillor deleted successfully', self::HTTP_NO_CONTENT);
            } else {
                $this->error('Failed to delete councillor', self::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (PDOException $e) {
            $this->error('Failed to delete councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            $this->error('Failed to delete councillor: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
