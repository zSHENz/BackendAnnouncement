<?php

namespace App\Services;

use App\Models\Announcement;
use Illuminate\Support\Facades\DB;

class AnnouncementService
{
    /**
     * Create Announcement
     *
     * @param array $announcementData
     * @return Announcement
     */
    public function store(array $announcementData): Announcement
    {
        return DB::transaction(function () use ($announcementData) {
            return Announcement::create($announcementData);
        });
    }

    /**
     * Update Announcement
     *
     * @param array $announcementData
     * @param Announcement $announcement
     * @return Announcement
     */
    public function update(array $announcementData, Announcement $announcement): Announcement
    {
        return DB::transaction(function () use ($announcementData, $announcement) {
            $announcement->update($announcementData);

            return $announcement;
        });
    }

    /**
     * Deleat Announcement
     *
     * @param Announcement $announcement
     * @return boolean|null
     */
    public function delete(Announcement $announcement): bool|null
    {
        return $announcement->delete();
    }
}
