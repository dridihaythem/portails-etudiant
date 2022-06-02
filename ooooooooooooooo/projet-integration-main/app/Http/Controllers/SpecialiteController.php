<?php

namespace App\Http\Controllers;

use App\Http\Requests\Specialite\CreateSpecialiteRequest;
use App\Http\Requests\Specialite\UpdateSpecialiteRequest;
use App\Models\Department;
use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $specialites = Specialite::with('department')
                ->when($request->department_id, function ($query) use ($request) {
                    return $query->where('department_id', $request->department_id);
                })->get();
            return datatables()->of($specialites)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at->format("d/m/Y");
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <a class='btn btn-sm btn-success mr-1' href=" . route('specialite.edit', $row->id) . ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>";
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('specialite.destroy', $row->id) . ">
                    <input name='_method' value='DELETE' type='hidden'>
                    " . csrf_field() . "
                    <button class='btn btn-sm btn-danger'>
                        <i class='fa-solid fa-trash'></i> Supprimer
                    </button>
                    </form>";
                    return $actions;
                })
                ->rawColumns(['id', 'name', 'actions'])
                ->toJson();
        }
        return view('specialites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Department::all();
        return view('specialites.create', ['departements' => $departements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSpecialiteRequest $request)
    {
        Specialite::create($request->validated());

        return redirect()->route('specialite.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialite $specialite)
    {
        $departements = Department::all();
        return view('specialites.edit', compact('specialite', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialiteRequest $request, Specialite $specialite)
    {
        $specialite->update($request->validated());

        return redirect()->route('specialite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialite $specialite)
    {
        $specialite->delete();

        return redirect()->route('specialite.index')
            ->with('success', 'La specialité a été supprimé');
    }
}
