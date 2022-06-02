<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class DateDepotRapportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function index()
    {
        return view('settings.date-depot-rapports', [
            'date_debut_depot_rapports' => Setting::where('name', 'date_debut_depot_rapports')->first()->value,
            'date_fin_depot_rapports' => Setting::where('name', 'date_fin_depot_rapports')->first()->value,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'date_debut_depot_rapports' => 'required|date',
            'date_fin_depot_rapports' => 'required|date|after:date_debut_depot_rapports',
        ]);

        Setting::where('name', 'date_debut_depot_rapports')->update(['value' => $request->date_debut_depot_rapports]);
        Setting::where('name', 'date_fin_depot_rapports')->update(['value' => $request->date_fin_depot_rapports]);

        return redirect()->back()->with('success', 'les date du depots des rapports ont été modifié avec succès');
    }
}
