<?php

namespace App\Livewire\Admin;

use App\Models\Konseling as ModelsKonseling;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Konseling extends Component
{
    use WithPagination;

    #[Url()]
    public $perPage = 10;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $konselingCategory = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDirection = 'desc';

    public $selectedKonseling = null;
    public $descriptionType = '';
    public $psikologAccount = [];
    public $clientAccount = [];

    public $form = [
        'psikolog_id' => '',
        'client_id' => '',
        'phone' => '',
        'gender' => null,
        'address' => '',
        'category' => null,
        'date' => null,
        'time' => null,
        'berlangsung' => 'true',
        'description' => '',
        'note' => '',
    ];

    protected $rules = [
        'form.psikolog_id' => 'required|exists:users,id',
        'form.client_id' => 'required|exists:users,id',
        'form.phone' => 'required|max:15',
        'form.gender' => 'required|max:3',
        'form.address' => 'required|max:255',
        'form.category' => 'required|max:3',
        'form.date' => 'sometimes',
        'form.time' => 'sometimes',
        'form.berlangsung' => 'required|max:5',
        'form.description' => 'required|max:255',
        'form.note' => 'sometimes',
    ];

    public function render()
    {
        
        $konselings = ModelsKonseling::with(['psikolog.dataPsikolog', 'client'])
            ->when($this->konselingCategory, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        
        return view('livewire.admin.konseling', [
            'konselings' => $konselings,
        ])->layout('layouts.app');
    }

    public function deleteKonseling()
    {
        if ($this->selectedKonseling) {
            $konseling = ModelsKonseling::find($this->selectedKonseling);
            $konseling->delete();
        }
    }

    public function setSortBy($column)
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->sortBy = $column;
    }

    public function editKonseling($id = null)
    {
        if($id){
            $this->selectedKonseling = $id;
            $konseling = ModelsKonseling::find($id);
            $this->form = [
                'psikolog_id' => $konseling->psikolog_id,
                'client_id' => $konseling->client_id,
                'phone' => $konseling->phone,
                'gender' => $konseling->gender,
                'address' => $konseling->address,
                'category' => $konseling->category,
                'date' => $konseling->date,
                'time' => $konseling->time,
                'berlangsung' => $konseling->berlangsung,
                'description' => $konseling->description,
                'note' => $konseling->note,
            ];
        }
        else{
            $this->resetForm();

            $this->psikologAccount = User::whereHas('roles', function($query){
                $query->where('name', 'psikolog');
            })->with('dataPsikolog')->get()->toArray();

            $this->clientAccount = User::whereHas('roles', function($query){
                $query->where('name', 'client');
            })->get()->toArray();
        }
    }

    public function updateKonseling()
    {
        $this->validate();
        try {
            $konseling = ModelsKonseling::find($this->selectedKonseling);
            $konseling->update([
                'psikolog_id' => $this->form['psikolog_id'],
                'client_id' => $this->form['client_id'],
                'phone' => $this->form['phone'],
                'gender' => $this->form['gender'],
                'address' => $this->form['address'],
                'category' => $this->form['category'],
                'date' => $this->form['date'],
                'time' => $this->form['time'],
                'berlangsung' => $this->form['berlangsung'] == 'true' ? 1 : 2,
                'description' => $this->form['description'],
                'note' => $this->form['note'],
            ]);

        } catch (\Throwable $th) {
            dd($th);
        }
        $this->resetForm();
        
    }

    public function createKonseling()
    {
        $this->validate();

       try {
        ModelsKonseling::create([
            'psikolog_id' => $this->form['psikolog_id'],
            'client_id' => $this->form['client_id'],
            'phone' => $this->form['phone'],
            'gender' => $this->form['gender'],
            'address' => $this->form['address'],
            'category' => $this->form['category'],
            'date' => $this->form['date'],
            'time' => $this->form['time'],
            'berlangsung' => $this->form['berlangsung'] == 'true' ? 1 : 2,
            'description' => $this->form['description'],
            'note' => $this->form['note'],
        ]);
       } catch (\Throwable $th) {
              dd($th);
       }

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->selectedKonseling = null;
        $this->form = [
            'psikolog_id' => '',
            'client_id' => '',
            'phone' => '',
            'gender' => null,
            'address' => '',
            'category' => null,
            'date' => null,
            'time' => null,
            'berlangsung' => 'true',
            'description' => '',
            'note' => '',
        ];
        
    }

    public function selectKonseling($konseling, $column)
    {
        $konseling = ModelsKonseling::find($konseling);
        $this->descriptionType = $column;
        $this->form[$column] = $konseling->$column;
        // dd($this->selectedKonseling);
    }

    public function changeStatusKonseling(){
        //if form['berlangsung'] == 'true'
        if($this->form['berlangsung'] == 'true'){
            $this->form['berlangsung'] = 'false';
        }else{
            $this->form['berlangsung'] = 'true';
        }
        //change status to false

    }
}
