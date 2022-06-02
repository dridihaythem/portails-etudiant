<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Depot\Report\DepotReportRequest;
use App\Models\Report;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepotRapportController extends Controller
{

    private function checkdate()
    {
        $date_debut_depot_rapports = Carbon::createFromFormat("d-m-yy", Setting::where('name', 'date_debut_depot_rapports')->first()->value);
        $date_fin_depot_rapports = Carbon::createFromFormat("d-m-yy", Setting::where('name', 'date_fin_depot_rapports')->first()->value);

        if (now() < $date_debut_depot_rapports || now() >= $date_fin_depot_rapports) {
            return false;
        }

        if (Auth::guard('students')->user()->reports()->count() == 1) {
            return false;
        }
        return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Auth::guard('students')->user()->reports()->OrderBy('id', 'desc')->get();
        return view('depot-rapports.index', [
            'reports' => $reports,
            'can_upload'  => $this->checkdate(),
            'date_debut_depot_rapports' => Setting::where('name', 'date_debut_depot_rapports')->first()->value,
            'date_fin_depot_rapports' => Setting::where('name', 'date_fin_depot_rapports')->first()->value,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->checkdate() == false) {
            return redirect()->route('depot.rapports.index');
        }
        return view('depot-rapports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepotReportRequest $request)
    {
        if ($this->checkdate() == false) {
            return redirect()->route('depot.rapports.index');
        }

        Report::create([
            'student_id' => Auth::guard('students')->user()->id,
            'type' => $request->type,
            'path' => Storage::disk('reports')->put('', $request->file('file'))
        ]);

        return redirect()->route('depot.rapports.index')
            ->with('success', 'le rapport a été déposé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::where('student_id', Auth::guard('students')->user()->id)->firstOrFail();
        return Storage::disk('reports')->download($report->path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        if ($this->checkdate() == false) {
            return redirect()->route('depot.rapports.index');
        }
        //@TODO:
        // check if $rapport->student_id == Auth::user()->id
    }
}
