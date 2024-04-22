<?php

namespace App\Livewire\Landing;

use Livewire\Component;

class Psikolog extends Component
{
    public $search = '';
    public $results = [];

    //on mount
    public function mount()
    {
        $this->results = \App\Models\Psikolog::take(6)->get();
    }

    public function render()
    {
        return view('livewire.landing.psikolog');
    }

    public function updatedSearch()
    {
        $this->results = \App\Models\Psikolog::where('name', 'like', '%'.$this->search.'%')->get();
    }
}
