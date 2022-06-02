<?php

namespace App\Http\Controllers;

use App\Models\Matier;
use App\Models\Matiere;
use App\Models\Specialite;
use Illuminate\Http\Request;

class MatierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $matieres = Matiere::all();
            return datatables()->of($matieres)
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <a class='btn btn-sm btn-success mr-1' href=" . route('matieres.edit', $row->id) . ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>";
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('matieres.destroy', $row->id) . ">
                    <input name='_method' value='DELETE' type='hidden'>
                    " . csrf_field() . "
                    <button class='btn btn-sm btn-danger mr-1'>
                        <i class='fa-solid fa-trash'></i> Supprimer
                    </button>
                    </form>";
                    return $actions;
                })
                ->rawColumns(['id', 'name', 'actions'])
                ->toJson();
        }
        return view('matieres.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialites = Specialite::all();
        return view('matieres.create', ['specialites' => $specialites]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'coefficient' => 'required',
            'specialite_id' => 'required'
        ]);

        Matiere::create(['libelle' => $request->libelle, 'coefficient' => $request->coefficient, 'specialite_id' => $request->specialite_id]);

        return redirect()->route('matieres.index')
            ->with('success', 'La matiere a été crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialites = Specialite::all();
        $matiere = Matiere::findOrFail($id);
        return view('matieres.edit', ['specialites' => $specialites, 'matiere' => $matiere]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'coefficient' => 'required',
            'specialite_id' => 'required'
        ]);

        Matiere::where('id', $id)->update(['libelle' => $request->libelle, 'coefficient' => $request->coefficient, 'specialite_id' => $request->specialite_id]);

        return redirect()->route('matieres.index')
            ->with('success', 'La matiere a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matiere::where('id', $id)->delete();
        return redirect()->route('matieres.index')
            ->with('success', 'La matiere a été supprimé');
    }
}
