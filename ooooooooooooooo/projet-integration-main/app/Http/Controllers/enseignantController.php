<?php

namespace App\Http\Controllers;
use App\Models\Enseignant;
use App\Models\Department;
use Illuminate\Http\Request;

class enseignantController extends Controller
{
    //
    public function add() {

        return view('create', [
            'departments' => Department::all()
        ]);
    }

    public function verif() {
        $data = request() -> validate(
            [
                'nom' => 'required|min:5',
                'prenom' => 'required|min:5',
                'cin' => 'required|numeric|min:1000000|max:99999999',
                'email' => 'required|email|unique:Enseignants,email',
                'password' => 'required|min:5',
                'chef' => 'required',
                'dep' => 'required'
            ]
        );
        $val = new Enseignant();
        $val -> first_name = $data['nom'];
        $val -> last_name = $data['prenom'];
        $val -> cin = $data['cin'];
        $val -> password = $data['password'];
        if($data['chef'] == "true") {
            $val -> chef  = 1;
        } else {
            $val -> chef = 0;
        }
        $val -> departments_id = $data['dep'];
        $val -> email = $data['email'];
        $val -> save();
    }
}
