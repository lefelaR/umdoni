<?php

namespace Api\v1;

use App\Models\EventModel;
use PDOException;

/**
 * Events API Controller
 * 
 * Handles all event-related API endpoints
 */
class EventsController extends BaseController
{
    /**
     * Get all events
     * GET /api/v1/events
     */
    public function indexAction()
    {
        try {
            $events = EventModel::getAll();
            $this->success($events, 'Events retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve events: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a single event by ID
     * GET /api/v1/events/{id}
     */
    public function showAction()
    {
        try {
            $id = $this->route_params['id'] ?? null;
            
            if (!$id) {
                $this->error('Event ID is required', self::HTTP_BAD_REQUEST);
            }
            
            $events = EventModel::getEvent($id);
            
            if (!$events || empty($events)) {
                $this->error('Event not found', self::HTTP_NOT_FOUND);
            }
            
            // getEvent returns an array, get first item
            $event = is_array($events) && isset($events[0]) ? $events[0] : $events;
            
            $this->success($event, 'Event retrieved successfully');
        } catch (PDOException $e) {
            $this->error('Failed to retrieve event: ' . $e->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
