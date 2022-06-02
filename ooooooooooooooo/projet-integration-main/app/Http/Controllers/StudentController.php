<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::all();
            return datatables()->of($students)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at->format("d/m/Y");
                })
                ->addColumn('classe', function ($row) {
                    return $row->classe->name;
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <a class='btn btn-sm btn-primary mr-1' href=" . route('students.show', $row->id) . ">
                        <i class='fa-solid fa-eye'></i>
                        Détails
                    </a>";
                    $actions .= "
                    <a class='btn btn-sm btn-success mr-1' href=" . route('students.edit', $row->id) . ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>";
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('students.destroy', $row->id) . ">
                    <input name='_method' value='DELETE' type='hidden'>
                    " . csrf_field() . "
                    <button class='btn btn-sm btn-danger'>
                        <i class='fa-solid fa-trash'></i> Supprimer
                    </button>
                    </form>";
                    return $actions;
                })
                ->rawColumns(['id', 'first_name', 'last_name', 'classe', 'actions'])
                ->toJson();
        }
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('students.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->cin);

        if ($request->hasFile('photo')) {
            $photo = Storage::disk('students')->put('', $request->file('photo'));
            $data['photo'] = $photo;
        }

        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', "L'etudiant a été crée");
    }

    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classes = Classe::all();
        return view('students.edit', ['classes' => $classes, 'student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {

        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $photo = Storage::disk('students')->put('', $request->file('photo'));
            $data['photo'] = $photo;
        }

        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', "L'etudiant a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', "L'etudiant a été supprimé");
    }
}
