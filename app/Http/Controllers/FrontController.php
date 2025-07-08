<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\artikel;
use App\Models\hero_section;
use App\Models\material;
use App\Models\program;
use App\Models\report;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $hero_sections = hero_section::take(1)->orderByDesc('id')->get();
        $artikels = artikel::take(3)->orderByDesc('id')->get();
        $programs = program::take(3)->orderByDesc('id')->get();
        $materials = material::take(3)->orderByDesc('id')->get();
        $teams = Team::all()->groupBy('division');
        return view('front.index', compact('artikels', 'programs', 'hero_sections', 'materials', 'teams'));
    }

    public function program()
    {
        $programs = program::orderByDesc('id')->get();
        return view('front.program', compact('programs'));
    }
    public function team()
    {
        $teams = Team::all()->groupBy('division');
        return view('front.team', compact('teams'));
    }

    public function artikel()
    {
        $artikels = artikel::orderByDesc('id')->get();
        return view('front.artikel', compact('artikels'));
    }

    public function material()
    {
        $materials = material::orderByDesc('id')->get();
        return view('front.material', compact('materials'));
    }


    public function report()
    {
        $reports = report::orderByDesc('id')->get();
        return view('front.report', compact('reports'));

    }
    public function artikel_detail(artikel $artikel)
    {
        // $latestArtikels = artikel::take(3)->orderByDesc('id')->get();
        $latestArtikels = Artikel::where('id', '!=', $artikel->id)
                                   ->latest()
                                   ->take(5)
                                   ->get();
        return view('front.artikel_detail', compact('artikel', 'latestArtikels'));
    }

    public function program_detail(program $program)
    {
        return view('front.program_detail', [
            'program' => $program
        ]);
    }

    public function about()
    {
        $abouts = About::orderByDesc('id')->get();
        return view('front.about', compact('abouts'));

    }


}
