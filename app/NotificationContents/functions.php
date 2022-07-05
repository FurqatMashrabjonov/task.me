<?php

use App\Helpers\NotificationContent;
use JetBrains\PhpStorm\Pure;


if (!function_exists('notificationContent')){
    #[Pure] function notificationContent(): NotificationContent
    {
        return new NotificationContent(['lang' => 'uz']);
    }
}
