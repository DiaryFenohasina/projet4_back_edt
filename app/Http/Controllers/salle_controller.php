<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Salle;

class salle_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salle = DB::table('salles')->get();

        return view('Salle', compact('salle'));
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
            'design' => 'required|string|max:255',
            'occupation' => 'string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $salle = new Salle;
        $salle->Design = $request->design;
        if(isset($request->occupation)){
            $salle->Occupation = $request->occupation;
        }
        $salle->save(); 

        return back()->with("succes","Ajout Salle Reussit!");    
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
            'design' => 'required|string|max:255',
            'occupation' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        // $salle = Salle::find($id);
        // $salle->Design = $request->design;
        // $salle->Occupation = $request->occupation;
        // $salle->save();

        $salle = Salle::where('idsalle', $request->id)->update([
            'Design' => $request->design,
            'Occupation' => $request->occupation,
        ]);

        return back()->with("succes","Modification Salle Reussit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $salle = DB::table('salles')->where('idsalle', $request->id)->delete();

        return back()->with("succes","Prof succes");    
        
    }
}
?>
