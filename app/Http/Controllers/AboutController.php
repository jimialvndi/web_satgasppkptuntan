<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::orderByDesc('id')->paginate(1);
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $newDataRecord = About::create($validated);
        });
        

        return redirect()->route('admin.abouts.index')->with('success', 'About berhasil dibuat!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        DB::transaction(function () use ($request, $about) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $about->update($validated);
        });
        
        return redirect()->route('admin.abouts.index')->with('success', 'About berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        DB::transaction(function () use ($about) {
            $about->delete();
        });

        return redirect()->route('admin.abouts.index')->with('success', 'About berhasil dihapus!');
    }
}
