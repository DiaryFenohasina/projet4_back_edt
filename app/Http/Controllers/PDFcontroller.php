<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFcontroller extends Controller
{
    //
    public function index(){
        $data = [
            'andrana' => 'eo be fotsin aloha'
        ];

        $pdf = PDF::loadView('resume', $data);
        return $pdf->stream('resume.pdf'); 
    }
}
