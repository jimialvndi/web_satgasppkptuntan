<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = report::orderByDesc('id')->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        // Closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('poster_path')) {
                $poster_pathPath = $request->file('poster_path')->store('posters', 'public');
                $validated['poster_path'] = $poster_pathPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $newDataRecord = report::create($validated);
        });
        

        return redirect()->route('admin.reports.index')->with('success', 'Report berhasil dibuat!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, report $report)
    {
        DB::transaction(function () use ($request, $report) {
            $validated = $request->validated();

            if ($request->hasFile('poster_path')) {
                $poster_pathPath = $request->file('poster_path')->store('posters', 'public');
                $validated['poster_path'] = $poster_pathPath;
            }

            $validated['user_id'] = Auth::id(); // atau auth()->id()
            
            $report->update($validated);
        });
        
        return redirect()->route('admin.reports.index')->with('success', 'Report berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(report $report)
    {
        DB::transaction(function () use ($report) {
            $report->delete();
        });

        return redirect()->route('admin.reports.index')->with('success', 'Report berhasil dihapus!');
    }
}
