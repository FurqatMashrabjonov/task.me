<?php

namespace App\Http\Controllers;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Enums\TableOwnerStatus;
use App\Models\Notification;
use App\Models\Table;
use App\Models\TableOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class NotificationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Notification $notification
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Notification $notification)
    {
        $this->authorize('show', $notification);

        $notification->status = NotificationStatus::VIEWED;

        $notification->save();

        $notification->load('settings');
        $date = new Carbon($notification->created_at);
        $notification['content'] = notificationContent()->joinToTable(Table::query()->where('id', $notification->settings->table_id)->with('user')->first());
        $notification['created_date'] = $date->diffForHumans();
        $notification['html'] = notificationContent()->renderHTML($notification);
        return Inertia::render('Notifications/Show', [
            'notification' => $notification
        ]);
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function accept(Notification $notification)
    {
        $this->authorize('accept', $notification);

        if ($notification->type == NotificationType::JOIN_TO_TYPE) {
            TableOwner::query()->where('user_id', auth()->user()->getAuthIdentifier())->update([
                'status' => TableOwnerStatus::ACCEPTED
            ]);
        }
        return redirect('/dashboard');
    }

}
