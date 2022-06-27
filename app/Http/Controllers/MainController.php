<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function dashboard()
    {
        $tables = Table::front()->where('user_id', auth()->user()->getAuthIdentifier())
            ->get();
        return Inertia::render('Dashboard', [
           'tables' => $tables
        ]);
    }
}
