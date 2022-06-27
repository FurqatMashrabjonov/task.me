<?php

namespace App\Observers;

use App\Models\Table;
use Illuminate\Support\Str;

class TableObserver
{
//    public function creating(Table $table)
//    {
//        $slug = Str::slug($table->name);
//        $tablesWhichHaveSameSlugCount = Table::query()->where('slug', $slug)->count();
//        if ($tablesWhichHaveSameSlugCount != 0) {
//            return false;
//        } else {
//            $table->slug = $slug;
//        }
//    }
}
