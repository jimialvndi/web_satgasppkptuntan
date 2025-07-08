<?php

namespace App\Http\Controllers;

use App\Enums\TeamDivisionEnum;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderByDesc('id')->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create', [
            'divisions' => TeamDivisionEnum::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photo', 'public');
                $validated['photo'] = $photoPath;
            }

            $newDataRecord = Team::create($validated);
        });


        return redirect()->route('admin.teams.index')->with('success', 'Anggota Tim berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', [
            'team' => $team,
            'divisions' => TeamDivisionEnum::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        DB::transaction(function () use ($request, $team) {
            $validated = $request->validated();

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photo', 'public');
                $validated['photo'] = $photoPath;
            }
      
            $team->update($validated);
        });
        
        return redirect()->route('admin.teams.index')->with('success', 'Team berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        DB::transaction(function () use ($team) {
            $team->delete();
        });

        return redirect()->route('admin.teams.index')->with('success', 'Anggota Tim berhasil dihapus!');
    }
}
