<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchUserController extends Controller
{
    public function search(Request $request)
    {
        if (strlen($request->input('username')) == 0)
            return response()->json([]);

        $users = User::query()
            ->select(['id', 'username'])
            ->where('username', 'like', "%{$request->input('username')}%")
            ->take(5)
            ->get();
        return response()->json($users);
    }
}
