<?php

namespace App\Http\Controllers;

use App\Enums\BackgroundType;
use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Models\Notification;
use App\Models\Table;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function dashboard(): \Inertia\Response
    {


        $tables = Table::where('user_id', auth()->user()->getAuthIdentifier())
            ->with(['settings' => fn($query) => $query->with('background')])
            ->get();

        $tables = collect($tables)->map(function ($item) {
            if ($item['settings']['background']['type'] == BackgroundType::IMAGE) {
                $readyStyle = ['backgroundImage' => "url(/backgrounds/" . $item['settings']['background']['id'] . "/small.jpg)"];
            } else if ($item['settings']['background']['type'] == BackgroundType::COLOR) {
                $readyStyle = ['backgroundColor' => $item['settings']['background']['color']];
            }
            $item['settings']['background']['readyStyle'] = $readyStyle;
            return $item;
        });

        return Inertia::render('Dashboard', [
            'tables' => $tables
        ]);
    }

    public function getNotificationsCount(): \Illuminate\Http\JsonResponse
    {
        $notes = Notification::query()
            ->where('user_id', auth()->user()->getAuthIdentifier())
            ->where('status', NotificationStatus::NOTVIEWED)->count();
        return response()->json(['notifications' => $notes]);
    }

    public function showNotifications(): \Inertia\Response
    {
        $notes = Notification::query()
            ->where('user_id', auth()->user()->getAuthIdentifier())
            ->where('status', NotificationStatus::NOTVIEWED)
            ->with('settings')
            ->get();


        $notes = collect($notes)->map(function ($item) {
            if ($item->type == NotificationType::JOIN_TO_TYPE) {
                $item['content'] = notificationContent()->joinToTable(Table::query()->where('id', $item->settings->table_id)->with('user')->first());
                return $item;
            }
        });

        return Inertia::render('Notifications/List', [
            'notifications' => $notes
        ]);
    }
}
