<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classe\CreateClasseRequest;
use App\Http\Requests\Classe\UpdateClasseRequest;
use App\Models\Classe;
use App\Models\Specialite;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $classes = Classe::with('specialite.department')->get();
            return datatables()->of($classes)
                ->editColumn('level', function ($row) {
                    return "{$row->level} année";
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                // ->editColumn('updated_at', function ($row) {
                //     return $row->updated_at->format("d/m/Y");
                // })
                ->addColumn('name', function ($row) {
                    return "{$row->specialite->prefix}{$row->level}{$row->number}";
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <a class='btn btn-sm btn-success mr-1' href=" . route('classe.edit', $row->id) . ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>";
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('classe.destroy', $row->id) . ">
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
        return view('classses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialites = Specialite::with('department')->get();
        return view('classses.create', ['specialites' => $specialites]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClasseRequest $request)
    {
        Classe::create($request->validated());

        return redirect()->route('classe.index')
            ->with('success', 'Le classe a été crée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        // return $classe->specialite_id;
        $specialites = Specialite::with('department')->get();
        return view('classses.edit', ['classe' => $classe, 'specialites' => $specialites]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        $classe->update($request->validated());

        return redirect()->route('classe.index')
            ->with('success', 'Le classe a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        $classe->delete();

        return redirect()->route('classe.index')
            ->with('success', 'Le classe a été supprimé');
    }
}
