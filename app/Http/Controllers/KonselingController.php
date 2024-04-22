<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonselingRequest;
use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Psikolog;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function index(){
        // kupindah ke livewire.landing.riwayat
    }
    public function create($id)
    {
        $psikolog = Psikolog::with(['praktik', 'user'])->findOrFail($id);
        
        return view('landing.booking', compact('psikolog'));
    }
    public function store(KonselingRequest $request, $id)
    {
        $validatedData = $request->validated();
        $validatedData['client_id'] = auth()->id();

        $psikolog_user = Psikolog::findOrFail($id)->user;
        $validatedData['psikolog_id'] = $psikolog_user->id;

        $psikolog_user->konselingAsPsikolog()->create($validatedData);

        return redirect()->route('landing-riwayat')->with('success', 'Data berhasil disimpan');
    }

    public function cetakHasil($id){
        $konseling = Konseling::findOrFail($id);
        $konseling->load('client', 'psikolog.dataPsikolog');
       
        $pdf = Pdf::loadView('pdf.hasil', ['konseling' => $konseling]);
        return $pdf->stream('cetak-hasil.pdf');
    }
}
