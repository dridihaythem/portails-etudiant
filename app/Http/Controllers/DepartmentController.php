<?php

namespace App\Http\Controllers;

use App\Http\Requests\Departement\CreateDepartementRequest;
use App\Http\Requests\Departement\UpdateDepartementRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::all();
            return datatables()->of($departments)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "<a class='btn btn-sm btn-secondary mr-1' href=" . route('specialite.index') . "?department_id={$row->id}><i class='fas fa-copy'></i> Les Specialités</a>";
                    // $actions .= "<a class='btn btn-sm btn-secondary mr-1' href=" . route('classe.index') . "?department_id={$row->id}><i class='fa-solid fa-users'></i> Les Classes</a>";
                    $actions .= "
                    <a class='btn btn-sm btn-success mr-1' href=" . route('department.edit', $row->id) . ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>";
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('department.destroy', $row->id) . ">
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
        return view('departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDepartementRequest $request)
    {
        Department::create($request->validated());

        return redirect()->route('department.index')
            ->with('success', 'Le département a été crée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartementRequest $request, Department $department)
    {
        $department->update($request->validated());

        return redirect()->route('department.index')
            ->with('success', 'Le département a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')
            ->with('success', 'Le département a été supprimé');
    }
}
