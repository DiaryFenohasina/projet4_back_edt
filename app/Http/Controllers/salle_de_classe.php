<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Emploi_du_temps;
use App\Models\Salle;

class salle_de_classe extends Controller
{

    public function recherche_libre(Request $request){
        $validator = validator::make($request->all(),[
            'heure' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $verifyEdt = Emploi_du_temps::where('date' , $request->heure)->get('idsalle');
   
        $verifyClasse = Salle::get('idsalle');

        $nbsalle = count($verifyClasse);
        $nboccupé = count($verifyEdt);

        for ($i=0; $i < $nbsalle; $i++) { 
            for ($j=0; $j < $nboccupé; $j++) { 
                if($verifyClasse[$i]->idsalle == $verifyEdt[$j]->idsalle){
                    Salle::where('idsalle', $verifyEdt[$j]->idsalle)->update([
                        'occupation' => 'occupé'
                    ]);
                }
            }
        }

        $occupé = Salle::where('occupation', 'libre')->get();
        
        DB::table('salles')->update([
            'occupation' => 'libre'
        ]);

        return view("Acceuil", compact("occupé"));
        // return redirect()->back()->with('occupé', 'ireo daholo');

    }
}
?>
