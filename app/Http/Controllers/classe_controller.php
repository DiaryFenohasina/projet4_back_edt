<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\Models\Classe;
use Validator;

class classe_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe = DB::table('classes')->get();

        return view("Classe", compact("classe"));
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
            'idclasse' => 'required|string|max:255',
            'Niveau' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $classe = new Classe;
        $classe->idclasse = $request->idclasse;
        $classe->Niveau = $request->Niveau;
        $classe->save();

        return back()->with("succes","Ajout Classe Reussit!");  
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
            'Niveau' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $classe = DB::table('classes')->where('idclasse', $request->id)->update([
            'Niveau' => $request->Niveau,
        ]);

        $classes = DB::table('classes')->where('idclasse', $request->id)->get();

        /*$classe = Classe::find($id);
        $classe->Niveau = $request->niveau;
        $classe->save();*/

        return back()->with("succes","Mise à jour Classe reussi!");
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

        $classe = DB::table('classes')->where('idclasse', $request->id)->delete();

        return back()->with("succes","Prof succes");   
    }
}
?>
