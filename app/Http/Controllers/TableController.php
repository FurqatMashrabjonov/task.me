<?php

namespace App\Http\Controllers;

use App\Models\Background;
use App\Models\Table;
use App\Providers\RouteServiceProvider;
use App\Repositories\TableRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TableController extends Controller
{

    const RedirectAfterStoredTable = '/dashboard';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Table/Create', [
            'backgrounds' => collect(Background::query()->get())->groupBy('type')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, TableRepository $repository)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'settings' => ['required'],
            'settings.background_id' => ['required']
        ]);
        if ($repository->store($validated)) {
            return redirect(self::RedirectAfterStoredTable);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Table $table
     * @return \Inertia\Response
     */
    public function show(Table $table)
    {
        $table->load('settings');
        $background = Background::query()->where('id', $table->settings->background_id)->first();
        $table->settings['background'] = $background;
        return Inertia::render('Table/Show', [
            'table' => $table
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
