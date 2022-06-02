<?php
  
namespace App\Http\Controllers;
  
use App\Models\Matier;
use App\Models\Specialite;
use Illuminate\Http\Request;
  
class MatierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Matiers = Matier::latest()->paginate(5);
      
        return view('matiers.index',compact('Matiers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $specialites = Specialite::all();
        return view('matiers.create', compact('specialites'));
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
            'specialite_id '=>'required'
        ]);
      
        Matier::create($request->all());
       
        return redirect()->route('matiers.index')
                        ->with('success','Matier created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matier  $Matier
     * @return \Illuminate\Http\Response
     */
    public function show(Matier $Matier)
    {
        return view('matiers.show',compact('Matier'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matier  $Matier
     * @return \Illuminate\Http\Response
     */
    public function edit(Matier $Matier)
    {
        return view('matiers.edit',compact('Matier'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matier  $Matier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matier $Matier)
    {
        $request->validate([
            'libelle' => 'required',
            'coefficient' => 'required',
        ]);
      
        $Matier->update($request->all());
      
        return redirect()->route('matiers.index')
                        ->with('success','Matier updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matier  $Matier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matier $Matier)
    {
        $Matier->delete();
       
        return redirect()->route('matiers.index')
                        ->with('success','Matier deleted successfully');
    }
}