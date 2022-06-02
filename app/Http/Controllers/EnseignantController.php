<?php

namespace App\Http\Controllers;

use App\Http\Requests\Enseignant\CreateEnseignantRequest;
use App\Models\Department;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $enseignants = Enseignant::all();
            return datatables()->of($enseignants)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at->format("d/m/Y");
                })
                ->addColumn('department', function ($row) {
                    return $row->department->name;
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('enseignants.destroy', $row->id) . ">
                    <input name='_method' value='DELETE' type='hidden'>
                    " . csrf_field() . "
                    <button class='btn btn-sm btn-danger'>
                        <i class='fa-solid fa-trash'></i> Supprimer
                    </button>
                    </form>";
                    return $actions;
                })
                ->rawColumns(['id', 'first_name', 'last_name', 'department', 'actions'])
                ->toJson();
        }
        return view('enseignants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('enseignants.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEnseignantRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->cin);

        if ($request->hasFile('photo')) {
            $photo = Storage::disk('students')->put('', $request->file('photo'));
            $data['photo'] = $photo;
        }

        Enseignant::create($data);

        return redirect()->route('enseignants.index')
            ->with('success', "L'enseignant a été créé");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();

        return redirect()->route('enseignants.index')
            ->with('success', "L'enseignant a été supprimé");
    }
}
