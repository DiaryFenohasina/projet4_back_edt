<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emploi_du_temps;
use DB;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Validator;

class emploi_du_temps_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $edt = DB::table('emploi_du_temps')->get();
        // return response()->json($edt, 200);
        return view('Emploi_du_temps', compact("edt"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'idsalle' => 'required|integer',
            'idprof' => 'required|string|max:255',
            'idclasse' => 'required|string|max:255',
            'cours' => 'required|string|max:255',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $edt = new Emploi_du_temps;
        $edt->idsalle = $request->idsalle;
        $edt->idprof = $request->idprof;
        $edt->idclasse = $request->idclasse;
        $edt->cours = $request->cours;
        $edt->date = $request->date;

        $verifySalle = Emploi_du_temps::where('date', $request->date)->get('idsalle');

        $verifyDate = Emploi_du_temps::where('date', $request->date)->get('idprof');

        $verifyClasse = Emploi_du_temps::where('date', $request->date)->get('idclasse');

        $nbprof = count($verifyDate);

        for ($i = 0; $i < $nbprof; $i++) {
            if ($verifyDate[$i]->idprof == $request->idprof) {
                // return response()->json("Professeur non disponible");
                return redirect()->back()->with('succes', 'Professeur non disponible');
            }
            if ($verifySalle[$i]->idsalle == $request->idsalle) {
                // return response()->json("Salle de classe occupé");
                return redirect()->back()->with('succes', 'Salle de classe occupé');
            }
            if ($verifyClasse[$i]->idclasse == $request->idclasse) {
                // return response()->json("cette classe suit déja un cours");
                return redirect()->back()->with('succes', 'cette classe suit déja un cours');
            }
        }
        //return $verifyDate[0]->idprof;

        $edt->save();
        
        // return back()->with("succes","Prof succes");
        return redirect()->back()->with("succes","Ajout EDT reussit");
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
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:255',
            'idsalle' => 'required|integer',
            'idprof' => 'required|string|max:255',
            'cours' => 'required|string|max:255',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $verifySalle = Emploi_du_temps::where('date', $request->date)->get('idsalle');

        $verifyDate = Emploi_du_temps::where('date', $request->date)->get('idprof');

        $verifyClasse = Emploi_du_temps::where('date', $request->date)->get('idclasse');

        $nbprof = count($verifyDate);

        for ($i = 0; $i < $nbprof; $i++) {
            if ($verifyDate[$i]->idprof == $request->idprof) {
                // return response()->json("Professeur non disponible");
                return redirect()->back()->with('succes', 'Professeur non disponible');
            }
            if ($verifySalle[$i]->idsalle == $request->idsalle) {
                // return response()->json("Salle de classe occupé");
                return redirect()->back()->with('succes', 'Salle de classe occupé');
            }
            if ($verifyClasse[$i]->idclasse == $request->idclasse) {
                // return response()->json("cette classe suit déja un cours");
                return redirect()->back()->with('succes', 'cette classe suit déja un cours');
            }
        }

        Emploi_du_temps::where('idclasse', $request->id)->update([
            'idsalle' => $request->idsalle,
            'idprof' => $request->idprof,
            'cours' => $request->cours,
            'date' => $request->date,
        ]);

        // $edt = Emploi_du_temps::where('idclasse', $request->id)->get();
        // return response()->json([
        //     'data' => $edt,
        //     'Status_code' => 200,
        //     'msg' => 'modification reussi'
        // ]);
        return redirect()->back()->with("succes","Ajout EDT reussit");
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

        $salle = DB::table('emploi_du_temps')->where('idclasse', $request->id)->delete();

        return back()->with("succes","Prof succes");    
    }

    public function listedt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idclasse' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $edt = DB::table('emploi_du_temps')->where('idclasse', $request->idclasse)->get();

        return back()->with("succes","Prof succes");

    }
}
?>