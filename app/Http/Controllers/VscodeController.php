<?php

namespace App\Http\Controllers;

use App\Jobs\VscodeJob;
use App\Models\Vscode;
use Illuminate\Http\Request;

class VscodeController extends Controller
{
    public function main($token, Request $request): \Illuminate\Http\JsonResponse
    {
        $vscode = Vscode::query()->where('token', $token)->first();
        if ($vscode) {
            VscodeJob::dispatch($vscode, $request->only(['languageId', 'project', 'file']));
            return response()->json(['success' => true]);
        } else return response()->json(['success' => false], 404);
    }
}
