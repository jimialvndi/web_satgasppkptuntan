<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Models\artikel;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = artikel::orderByDesc('id')->paginate(10);
        return view('admin.artikels.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.artikels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtikelRequest $request)
    {
        // Closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
                        $validated['user_id'] = Auth::id(); // atau auth()->id()

            
            $newDataRecord = artikel::create($validated);
        });
        

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel berhasil dibuat!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(artikel $artikel)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artikel $artikel)
    {
 
        return view('admin.artikels.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, artikel $artikel)
    {
        DB::transaction(function () use ($request, $artikel) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
                        $validated['user_id'] = Auth::id(); // atau auth()->id()

            
            $artikel->update($validated);
        });
        
        return redirect()->route('admin.artikels.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artikel $artikel)
    {
        DB::transaction(function () use ($artikel) {
            $artikel->delete();
        });

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
