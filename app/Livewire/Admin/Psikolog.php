<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Psikolog extends Component
{
    use WithPagination;

    #[Url()]
    public $perPage = 10;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $userRole = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDirection = 'desc';

    public $selectedUser = null;

    public $freeUsersAccount = [];

    public $form = [
        'account_id' => '',
        'name' => '',
        'degree' => '',
        'session' => '',
        'experience' => '',
        'status' => false,
        'photo' => '',
        'location' => '',
    ];

    public $days = [
        [
            'hari' => 'senin',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
        [
            'hari' => 'selasa',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
        [
            'hari' => 'rabu',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
        [
            'hari' => 'kamis',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
        [
            'hari' => 'jumat',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
        [
            'hari' => 'sabtu',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
        [
            'hari' => 'minggu',
            'jam_mulai' => '',
            'jam_selesai' => '',
            'active' => 'false',
        ],
    ];

    public function render()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'psikolog');
        })
            ->with('dataPsikolog')
            ->search($this->search)
            ->when($this->userRole, function ($query) {
                return $query->role($this->userRole);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.psikolog', [

            'users' => $users,
        ])->layout('layouts.app');
    }

    public function deleteUser()
    {
        User::find($this->selectedUser)->delete();
    }

    public function setSortBy($column)
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->sortBy = $column;
    }

    public function editUser($id = null)
    {
        if ($id) {
            $user = User::with('dataPsikolog')->find($id);
            $this->form = [
                'name' => $user->dataPsikolog->name,
                'degree' => $user->dataPsikolog->degree,
                'session' => $user->dataPsikolog->session,
                'experience' => $user->dataPsikolog->experience,
                'status' => $user->dataPsikolog->status === 1 ? true : false,
                'photo' => $user->dataPsikolog->photo,
                'location' =>  $user->dataPsikolog->location,
            ];
            $this->selectedUser = $id;
        } else {
            // get free user account that doesn't have role psikolog or client
            $this->freeUsersAccount = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'psikolog')->orWhere('name', 'client');
            })->get()->toArray();

            $this->resetForm();
        }
    }

    public function updateUser()
    {
        $this->validate([
            'form.name' => 'required|min:3|max:100',
            'form.degree' => 'required|min:2|max:100',
            'form.session' => 'required',
            'form.experience' => 'required',
            'form.status' => 'required',
            'form.photo' => 'required',
            'form.location' => 'required',
        ]);

        $user = User::find($this->selectedUser);
        
        $user->dataPsikolog->update($this->form);
        $this->resetForm();
        
    }

    public function createUser()
    {
        $this->validate([
            'form.account_id' => 'required|exists:users,id',
            'form.name' => 'required|min:3|max:100',
            'form.degree' => 'required|min:2|max:100',
            'form.session' => 'required',
            'form.experience' => 'required',
            'form.status' => 'required',
            'form.location' => 'required',
        ]);
        
        $user = User::find($this->form['account_id']);

        $user->assignRole('psikolog');

        //remove account_id from form
        unset($this->form['account_id']);

        $user->dataPsikolog()->create($this->form);

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->form = [
            'account_id' => '',
            'name' => '',
            'degree' => '',
            'session' => '',
            'experience' => '',
            'status' => false,
            'photo' => '',
            'location' => '',
        ];
        $this->selectedUser = null;
        $this->resetDays();
    }

    public function editWorkDays($id){
        $user = User::with('dataPsikolog')->find($id);
        $this->selectedUser = $id;
        
        //foreach praktik
        foreach($user->dataPsikolog->praktik as $key => $day){
           //if day->hari exists in days[hari]
              $index = array_search($day->hari, array_column($this->days, 'hari'));
                if($index !== false){
                    $this->days[$index]['jam_mulai'] = $day->jam_mulai;
                    $this->days[$index]['jam_selesai'] = $day->jam_selesai;
                    $this->days[$index]['active'] = 'true';
                }
        }
    }

    public function resetDays(){
        $this->selectedUser = null;
        foreach($this->days as $key => $day){
            $this->days[$key]['jam_mulai'] = '';
            $this->days[$key]['jam_selesai'] = '';
            $this->days[$key]['active'] = 'false';
        }
    }

    public function changeDayStatus($hari){
        $index = array_search($hari, array_column($this->days, 'hari'));

        if($this->days[$index]['active'] === 'true'){
            $this->days[$index]['active'] = 'false';
        }else{
            $this->days[$index]['active'] = 'true';
        }
    }

    public function updateWorkDays(){
        $user = User::find($this->selectedUser);
        $user->dataPsikolog->praktik()->delete();
        foreach($this->days as $day){
            if($day['active'] === 'true'){
                $user->dataPsikolog->praktik()->create([
                    'hari' => $day['hari'],
                    'jam_mulai' => $day['jam_mulai'],
                    'jam_selesai' => $day['jam_selesai'],
                ]);
            }
        }
        $this->resetDays();
    }
}
