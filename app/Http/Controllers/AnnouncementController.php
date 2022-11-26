<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Announcement;
use App\Services\AnnouncementService;
use Exception;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    public function __construct(
        private AnnouncementService $announcementService
    ) {
    }

    public function index()
    {
        $announcements = Announcement::all();

        return response()->json([
            'data' => $announcements
        ], HttpStatus::OK->value);
    }

    public function show(Announcement $announcement)
    {
        if (!isset($announcement)) {
            return response()->json("Announcement Not Found", HttpStatus::NotFound->value);
        }

        return response()->json([
            'data' => $announcement
        ], HttpStatus::OK->value);
    }

    public function store(StoreAnnouncementRequest $request)
    {
        try {
            $announcement = $this->announcementService->store($request->validated());

            if (isset($announcement)) {
                return response()->json([
                    'data' => $announcement
                ], HttpStatus::Created->value);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return response()->json("Server Error", HttpStatus::InternalServerError->value);
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        if (!isset($announcement)) {
            return response()->json("Announcement Not Found", HttpStatus::NotFound->value);
        }

        try {
            $announcement = $this->announcementService->update($request->validated(), $announcement);

            if (isset($announcement)) {
                return response()->json([
                    'data' => $announcement
                ], HttpStatus::OK->value);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return response()->json("Server Error", HttpStatus::InternalServerError->value);
    }

    public function delete(Announcement $announcement)
    {
        if (!isset($announcement)) {
            return response()->json("Announcement Not Found", HttpStatus::NotFound->value);
        }

        try {
            $announcementDeleted = $this->announcementService->delete($announcement);

            if ($announcementDeleted) {
                return response()->json("Announcement Deleted", HttpStatus::NoContent->value);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return response()->json("Server Error", HttpStatus::InternalServerError->value);
    }
}
