<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = program::orderByDesc('id')->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        // Closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $newDataRecord = program::create($validated);
        });
        

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dibuat!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, program $program)
    {
        DB::transaction(function () use ($request, $program) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $program->update($validated);
        });
        
        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(program $program)
    {
        DB::transaction(function () use ($program) {
            $program->delete();
        });

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus!');
    }
}
