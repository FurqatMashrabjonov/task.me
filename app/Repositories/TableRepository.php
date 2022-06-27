<?php

namespace App\Repositories;

use App\Models\Table;
use App\Models\TableSetting;
use Illuminate\Support\Str;

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

        return TableSetting::query()->insert($data['settings']) && $table;
    }

}
