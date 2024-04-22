<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psikolog;

class PsikologController extends Controller
{
    public function index(){
        $psikolog = Psikolog::all();

        return view('landing.psikolog', compact('psikolog'));
    }
    public function show($id)
    {
        $psikolog = Psikolog::find($id);
        
        return view('', compact('psikolog'));
    }
}
