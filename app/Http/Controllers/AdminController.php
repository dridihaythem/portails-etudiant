<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Admin::all();
            return datatables()->of($students)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format("d/m/Y");
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at->format("d/m/Y");
                })
                ->addColumn('actions', function ($row) {
                    $actions = '';
                    $actions .= "
                    <a class='btn btn-sm btn-primary mr-1' href=" . route('admins.show', $row->id) . ">
                        <i class='fa-solid fa-eye'></i>
                        Détails
                    </a>";
                    $actions .= "
                    <a class='btn btn-sm btn-success mr-1' href=" . route('admins.edit', $row->id) . ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>";
                    $actions .= "
                    <form id='{$row->id}' class='d-inline-block' onsubmit='event.preventDefault();deleteItem({$row->id})' method='post' action=" . route('admins.destroy', $row->id) . ">
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
        return view('admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->cin);

        if ($request->hasFile('photo')) {
            $photo = Storage::disk('admins')->put('', $request->file('photo'));
            $data['photo'] = $photo;
        }

        Admin::create($data);

        return redirect()->route('admins.index')
            ->with('success', "L'admin a été crée");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admins.show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admins.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $photo = Storage::disk('admins')->put('', $request->file('photo'));
            $data['photo'] = $photo;
        }

        $admin->update($data);

        return redirect()->route('admins.index')
            ->with('success', "L'admin a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')
            ->with('success', "L'admin a été supprimé");
    }
}
