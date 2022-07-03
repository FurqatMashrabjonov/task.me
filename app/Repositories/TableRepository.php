<?php

namespace App\Repositories;

use App\Enums\TableOwnerStatus;
use App\Helpers\UserNotification;
use App\Models\Table;
use App\Models\TableSetting;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\TableOwner;

class TableRepository
{

    public function store($data)
    {
        $data['user_id'] = auth()->user()->getAuthIdentifier();
        $slug = Str::slug($data['name']);
        $tablesWhichHaveSameSlugCount = Table::query()->where('slug', $slug)->count();
        if ($tablesWhichHaveSameSlugCount != 0) {
            return false;
        } else {
            $data['slug'] = $slug;
        }
        $table = Table::query()->create($data);
        $data['settings']['table_id'] = $table->id;

        if (count($data['settings']['addedUsers']) != 0) {
            foreach ($data['settings']['addedUsers'] as $user) {
                $owner = TableOwner::query()->create([
                    'table_id' => $table->id,
                    'user_id' => $user['id'],
                    'status' => TableOwnerStatus::NOT_ACCEPTED
                ]);
                if ($owner) {
                    UserNotification::joinToTeam($user['id'], $table->id);
                }
            }
        }

        return $table->settings()->create($data['settings']) && $table;
    }

}
