<?php

namespace App\Helpers;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\User;

class UserNotification
{

    public static function joinToTeam($user_id, $team_id)
    {
        $notification = Notification::query()->create([
            'user_id' => $user_id,
            'type' => NotificationType::JOIN_TO_TYPE,
            'status' => NotificationStatus::NOTVIEWED
        ]);

        if ($notification) {
            return NotificationSetting::query()->create([
                'notification_id' => $notification->id,
                'team_id' => $team_id
            ]);
            //Keyin notification qowiladi
        } else {
            return false;
        }

    }

}
