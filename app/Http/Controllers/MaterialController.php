<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = material::orderByDesc('id')->paginate(10);
        return view('admin.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        // Closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('icon_path')) {
                $icon_pathPath = $request->file('icon_path')->store('icons', 'public');
                $validated['icon_path'] = $icon_pathPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $newDataRecord = material::create($validated);
        });
        

        return redirect()->route('admin.materials.index')->with('success', 'Material berhasil dibuat!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(material $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialRequest $request, material $material)
    {
        DB::transaction(function () use ($request, $material) {
            $validated = $request->validated();

            if ($request->hasFile('icon_path')) {
                $icon_pathPath = $request->file('icon_path')->store('icons', 'public');
                $validated['icon_path'] = $icon_pathPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $material->update($validated);
        });
        
        return redirect()->route('admin.materials.index')->with('success', 'Material berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(material $material)
    {
        DB::transaction(function () use ($material) {
            $material->delete();
        });

        return redirect()->route('admin.materials.index')->with('success', 'Material berhasil dihapus!');
    }
}
