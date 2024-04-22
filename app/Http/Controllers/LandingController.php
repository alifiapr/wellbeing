<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        //if user is authenticated, get active konseling
        $konselings = collect();
        if (auth()->check()) {
            //if user is psikolog, get active konseling as psikolog
            if (auth()->user()->hasRole('psikolog')) {
                $konselings = auth()->user()->konselingAsPsikolog()->where('berlangsung', true)->with('psikolog', 'client')->latest()->take(2)->get();
            }
            //if user is client, get active konseling as client
            else {
                $konselings = auth()->user()->konselingAsClient()->where('berlangsung', true)->with('psikolog', 'client')->latest()->take(2)->get();
            }
        }

        //get 3 psikologs order by session count
        $psikologs = Psikolog::orderBy('session', 'desc')->take(3)->get();

        return view('landing.index', compact('konselings', 'psikologs'));
    }
}
