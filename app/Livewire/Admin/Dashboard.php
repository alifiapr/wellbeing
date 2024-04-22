<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
        try {
            $active_clients = \App\Models\User::whereHas('roles', function($q){
                $q->where('name', 'client');
            })->count();

            $active_psikologs = \App\Models\User::whereHas('roles', function($q){
                $q->where('name', 'psikolog');
            })->count();

            $online_konseling = \App\Models\Konseling::where('category', 1)->count();

            $offline_konseling = \App\Models\Konseling::where('category', 2)->count();

            $latest_konseling = \App\Models\Konseling::with(['psikolog.dataPsikolog', 'client'])->where('berlangsung', 1)->orderBy('created_at', 'desc')->limit(5)->get();

            $finished_konseling = \App\Models\Konseling::with(['psikolog.dataPsikolog', 'client'])->where('berlangsung', 2)->orderBy('created_at', 'desc')->limit(5)->get();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return view('livewire.admin.dashboard', [
            'active_clients' => $active_clients,
            'active_psikologs' => $active_psikologs,
            'online_konseling' => $online_konseling,
            'offline_konseling' => $offline_konseling,
            'latest_konseling' => $latest_konseling,
            'finished_konseling' => $finished_konseling
        ])->layout('layouts.app');
    }
}
