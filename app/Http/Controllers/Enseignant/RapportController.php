<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $reports = Report::with('student')->get();
            return datatables()->of($reports)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                ->editColumn('student.name', function ($row) {
                    return  $row->student->first_name . " " . $row->student->last_name;
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <a class='btn btn-sm btn-primary mr-1' href=" . route('rapports.show', $row->id) . ">
                        <i class='fa-solid fa-eye'></i>
                            Affichier
                    </a>";
                    return $actions;
                })
                ->rawColumns(['id', 'name', 'actions'])
                ->toJson();
        }
        return view("rapports");
    }
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return Storage::disk('reports')->download($report->path);
    }
}
