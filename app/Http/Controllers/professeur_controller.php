<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use DB;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent;


class professeur_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = DB::table('professeurs')->get();
        return view("Prof", compact("utilisateur"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'idprof' => 'required|string|max:255',
            'Nom' => 'required|string|max:255',
            'Prénoms' => 'required|string|max:255',
            'Grade' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $prof = new Professeur;
        $prof->idprof = $request->idprof;
        $prof->Nom = $request->Nom;
        $prof->Prénoms = $request->Prénoms;
        $prof->Grade = $request->Grade;
        $prof->save();

        return redirect()->back()->with("succes","Ajout Professeur reussit!");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'id' => 'required|string|max:255',
            'Nom' => 'required|string|max:255',
            'Prénoms' => 'required|string|max:255',
            'Grade' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        
        DB::table('professeurs')->where('idprof', $request->id)->update([
            'Nom' => $request->Nom,
            'Prénoms' => $request->Prénoms,
            'Grade' => $request->Grade, 
        ]);
        
        // $Professeur = Professeur::find($request->id);
        // $Professeur->Nom = $request->nom;
        // $Professeur->Prénoms = $request->prenom;
        // $Professeur->Grade = $request->grade;
        // $Professeur->save();
        
        return back()->with("succes","Mise à jour Professeurs reussi!");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'id' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $utilisateur = DB::table('professeurs')->where('idprof', $request->id)->delete();
        
        return back();    
    }
}
?>
