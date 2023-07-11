<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enseignant;
use App\Models\prestation;
use DB;;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('enseignants')->join('prestations','enseignants.matricule', '=', 'prestations.matricule')
                    ->select('enseignants.*', 'prestations.prestation')->get();

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $data = enseignant::create([
                'matricule' => $request->matricule,
                'nom' => $request->nom,
                'tauxhoraire' => $request->tauxhoraire,
                'nbheure' => $request->nbheure,
            ]);  
            
            prestation::create([
                'matricule' => $request->matricule,
                'prestation' => $request->tauxhoraire * $request->nbheure,
            ]);
                       
        } catch (\Throwable $th) {
            $data = "Document already exists";
            return response()->json($data, 400);            
        }

        return response()->json($data, 200);

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
        try {
            $data = enseignant::find($id);
        } catch (\Throwable $th) {
            $data = "Document undefind";
            return response()->json($data, 200);
        }

        return response()->json($data, 200);
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
    public function update(Request $request, $id)
    {
        $data = enseignant::where('matricule', $id)->get();
        
        $data ? $enseignant = enseignant::where('matricule', $id)
        ->update([
            'nom' => $request->nom,
            'tauxhoraire' => $request->tauxhoraire,
            'nbheure' => $request->nbheure,
        ]) : $enseignant = "No document to update";
        
        $enseignant ? prestation::where('matricule', $id)
        ->update([
            'prestation' => $request->tauxhoraire * $request->nbheure
        ]) : null;

        return response()->json($enseignant, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = enseignant::where('matricule', $id)->get();
        $prestation = prestation::where('matricule', $id)->delete();

        $data ? $enseignant = enseignant::where('matricule', $id)
        ->delete() : $enseignant = "Nothing to delete" ;

        return response()->json($enseignant, 200);

    }
}
