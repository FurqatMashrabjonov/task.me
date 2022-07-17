<?php

namespace App\Http\Controllers;

use App\Enums\BackgroundType;
use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Enums\TableOwnerStatus;
use App\Models\Notification;
use App\Models\Table;
use App\Models\TableOwner;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function dashboard(): \Inertia\Response
    {
        $tableOwner = TableOwner::where('user_id', auth()->user()->getAuthIdentifier())
            ->where('status', TableOwnerStatus::ACCEPTED)
            ->with(['table'])
            ->get();

        $tables = [];

        foreach ($tableOwner as $owner) {
            array_push($tables, $owner->table);
        }

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
//            ->where('status', NotificationStatus::NOTVIEWED)
            ->with('settings')
            ->orderBy('status')
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
