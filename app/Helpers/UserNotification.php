<?php

namespace App\Helpers;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\User;
use App\Jobs\JoinToTableNotificationJob;
class UserNotification
{

    public static function joinToTeam($user_id, $table_id){
        return JoinToTableNotificationJob::dispatch($user_id, $table_id);
    }

    public static function makeContent(Notification $notification)
    {

    }

}
