<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prestation;
use DB;

class PrestationController extends Controller
{
    public function min(){
     $data = prestation::all('prestation');
     
     $min = $data[0];

     for ($i=1; $i < count($data); $i++) { 
        $min > $data[$i] ? $prestation = $data[$i] : $prestation = $min;
     }

     return response()->json($prestation);   
    }
    public function max(){
        $data = prestation::all('prestation');
    
        $max = $data[0];
   
        for ($i=1; $i < count($data); $i++) { 
           $max < $data[$i] ? $prestation = $data[$i] : $prestation = $max;
        }
   
        return response()->json($prestation, 200);
    }
    public function total(){
        $data = prestation::all('prestation');

        $sql = DB::select('SELECT sum(prestation) from prestations');
        return response()->json($sql, 200);
    }

    public function allvalue(){
        $data = prestation::get('prestation');

        return response()->json($data, 200);
    }
}
