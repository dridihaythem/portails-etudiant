<?php

namespace App\Http\Controllers;

use App\Http\Requests\Specialites\CreateSpecialitesRequest;
use App\Http\Requests\Specialites\UpdateSpecialitesRequest;
use App\Models\Specialites;
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
            $specialites = Specialites::all();
        return view('specialites.index',compact('specialites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specialities = new Specialites();
        $specialities->name = $request->name;
        $specialities->department_id = $request->department;
        $specialities->prefix = $request->prefix;
        $specialities->save();
        return redirect()->route('specialite.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $specialites = Specialites::findOrFail($id);
        return view('specialites.edit',compact('specialites'));
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
       $specialities = Specialites::find($id); 
       $specialities->name = $request->name;
        $specialities->department_id = $request->department;
        $specialities->prefix = $request->prefix;
        $specialities->save();
        return redirect()->route('specialite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Specialites::find($id)->delete();
      return redirect()->route('specialite.index');

    }
}
