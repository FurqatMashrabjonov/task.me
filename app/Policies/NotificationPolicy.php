<?php

namespace App\Policies;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Notification $notification)
    {
        return $user->id == $notification->user_id;
    }

    public function accept(User $user, Notification $notification)
    {
        return $user->id == $notification->user_id;
    }
}
