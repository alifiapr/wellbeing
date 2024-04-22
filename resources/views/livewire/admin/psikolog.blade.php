<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Psikolog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <section class="">
                <div class="mx-auto max-w-screen-xl">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex items-center justify-between d p-4">
                            <div class="flex gap-2 items-center">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" wire:model.live.debounce="search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                        placeholder="Search" required="">
                                </div>
                                <button x-on:click.prevent="$dispatch('open-modal', 'edit')" wire:click="editUser()"
                                    class="bg-primary px-3 py-2 rounded-lg text-white flex gap-1 items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 5a1 1 0 0 0-.993.883L11 8v3H8a1 1 0 0 0-.117 1.993L8 13h3v3a1 1 0 0 0 1.993.117L13 16v-3h3a1 1 0 0 0 .117-1.993L16 11h-3V8a1 1 0 0 0-1-1" />
                                            </g>
                                        </svg>
                                    </span>
                                    Add
                                </button>
                            </div>
                            {{-- <div class="flex space-x-3">
                                <div class="flex space-x-3 items-center">
                                    <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                                    <select wire:model.live="userRole"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">All</option>
                                        <option value="client">Client</option>
                                        <option value="psikolog">Psikolog</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700  bg-gray-50">
                                    <tr>
                                        @include('livewire.includes.table-head-sort', ['column' => 'name', 'columnLabel'
                                        => 'Name'])
                                        @include('livewire.includes.table-head-sort', ['column' => 'session',
                                        'columnLabel' => 'Session'])
                                        @include('livewire.includes.table-head-sort', ['column' => 'experience',
                                        'columnLabel' => 'Experience'])
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Status</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Location</span>
                                        </th>
                                        @include('livewire.includes.table-head-sort', ['column' => 'created_at',
                                        'columnLabel' => 'Created At'])
                                        @include('livewire.includes.table-head-sort', ['column' => 'updated_at',
                                        'columnLabel' => 'Updated At'])
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only uppercase">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr wire:key="{{ $user->id }}" class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center">
                                            <img class="w-8 h-8 rounded-full object-cover object-center border-2 border-primary"
                                                src="{{ $user->dataPsikolog->photo ? asset('assets/images/psikolog/'. $user->dataPsikolog?->photo) : 'https://ui-avatars.com/api/?background=5271FF&color=fff&name='.$user->dataPsikolog?->name }}"
                                                alt="">
                                            <div>
                                                {{ $user->dataPsikolog?->name }} {{ $user->dataPsikolog?->degree }}
                                            </div>
                                        </th>
                                        <td class="px-4 py-3">{{ $user->dataPsikolog?->session }}x</td>
                                        <td class="px-4 py-3">{{ $user->dataPsikolog?->experience }} Years</td>

                                        <td class="px-4 py-3 text-white flex gap-1">
                                            <span @class(['px-2 py-1 rounded', 'bg-primary'=>
                                                $user->dataPsikolog?->status == 1,
                                                'bg-red-500' => $user->dataPsikolog?->status == 0,
                                                ])>
                                                @if ($user->dataPsikolog?->status == 1)
                                                Ada
                                                @else
                                                Sibuk
                                                @endif
                                            </span>
                                        </td>

                                        <td class="px-4 py-3">{{ $user->dataPsikolog?->location }} Years</td>

                                        <td class="px-4 py-3">{{ $user->created_at->diffForHumans() }}</td>
                                        <td class="px-4 py-3">{{ $user->updated_at->diffForHumans() }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end gap-2">
                                            <button wire:click="selectedUser = {{ $user->id }}" x-on:click.prevent="$dispatch('open-modal', 'confirm-delete')"
                                                
                                                class="px-2 py-2 bg-red-500 text-white rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path
                                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="currentColor"
                                                            d="M14.28 2a2 2 0 0 1 1.897 1.368L16.72 5H20a1 1 0 1 1 0 2l-.003.071l-.867 12.143A3 3 0 0 1 16.138 22H7.862a3 3 0 0 1-2.992-2.786L4.003 7.07A1.01 1.01 0 0 1 4 7a1 1 0 0 1 0-2h3.28l.543-1.632A2 2 0 0 1 9.721 2zM9 10a1 1 0 0 0-.993.883L8 11v6a1 1 0 0 0 1.993.117L10 17v-6a1 1 0 0 0-1-1m6 0a1 1 0 0 0-1 1v6a1 1 0 1 0 2 0v-6a1 1 0 0 0-1-1m-.72-6H9.72l-.333 1h5.226z" />
                                                    </g>
                                                </svg>
                                            </button>
                                            <button x-on:click.prevent="$wire.editUser({{ $user->id }});$dispatch('open-modal', 'edit')"
                                                class="px-2 py-2 bg-yellow-500 text-white rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none">
                                                        <path
                                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="currentColor"
                                                            d="m10.756 6.17l7.07 7.071l-7.173 7.174a2 2 0 0 1-1.238.578L9.239 21H4.006a1.01 1.01 0 0 1-1.004-.9l-.006-.11v-5.233a2 2 0 0 1 .467-1.284l.12-.13l7.173-7.174Zm3.14-3.14a2 2 0 0 1 2.701-.117l.127.117l4.243 4.243a2 2 0 0 1 .117 2.7l-.117.128l-1.726 1.726l-7.07-7.071z" />
                                                    </g>
                                                </svg>
                                            </button>
                                            <button wire:click="editWorkDays({{ $user->id }})" x-on:click.prevent="$dispatch('open-modal', 'work-hours')"
                                                class="px-2 py-2 bg-icongreen text-white rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M17.5 3a3.5 3.5 0 0 1 2.526 5.923A8.962 8.962 0 0 1 21 13a8.977 8.977 0 0 1-2.936 6.65l.643.643a1 1 0 0 1-1.414 1.414l-.868-.868A8.96 8.96 0 0 1 12 22a8.96 8.96 0 0 1-4.425-1.161l-.868.868a1 1 0 0 1-1.414-1.414l.643-.643A8.977 8.977 0 0 1 3 13a8.96 8.96 0 0 1 .974-4.077A3.5 3.5 0 1 1 9.307 4.41A8.996 8.996 0 0 1 12 4c.938 0 1.842.143 2.693.41A3.494 3.494 0 0 1 17.5 3M12 8a1 1 0 0 0-.993.883L11 9v3.986a.998.998 0 0 0 .202.617l.09.104l2.106 2.105a1 1 0 0 0 1.498-1.32l-.084-.094L13 12.586V9a1 1 0 0 0-1-1"/></g></svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Modal Delete --}}
                        <x-modal name="confirm-delete" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <div class="p-6">

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once this account is deleted, all of its resources and data will be
                                    permanently deleted.') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')" wire:click.prevent="resetForm">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3" x-on:click="$dispatch('close')"
                                        wire:click="deleteUser()">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </div>
                            </div>
                        </x-modal>

                        {{-- Modal Edit --}}
                        <x-modal name="edit" focusable>
                            <div class="p-6">
                                <form method="post" class="p-6">
                                    @csrf
                                    @method('post')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        @if ($selectedUser)
                                        {{ __('Update Psikolog') }}
                                        @else
                                        {{ __('Create Psikolog') }}
                                        @endif
                                    </h2>

                                    {{-- Select User --}}
                                    @if (!$selectedUser)
                                    <div class="mt-4" >
                                        <x-input-label for="" value="{{ __('Select User Account') }}" class="" />
                                        
                                        <div class="relative mt-2 w-3/4" x-data="{isOpen: false, selected_account: '', data: @entangle('freeUsersAccount')}">
                                            <input type="text" class="invisible absolute"  name="gender">
                                            <button type="button" @click.prevent="isOpen = !isOpen"
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm p-2 block w-full mt-1"
                                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                <span class="flex items-center">
                                                    <span class="ml-3 block truncate"
                                                        x-text="selected_account.email"></span>
                                                    <span x-show="selected_account === ''" class="ml-3 block truncate text-slate-500">
                                                        Pilih Akun
                                                    </span>
                                                </span>
                                                <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <ul x-show="isOpen" x-transition:enter="transition ease-in duration-100"
                                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                                tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                                aria-activedescendant="listbox-option-3">
                                                <template x-for="(item, i) in data" :key="i">
                                                    <li x-on:click="selected_account = item; $wire.form['account_id'] = item.id; isOpen = false"
                                                        x-bind:class="selected_account.id == item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                                        class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">
                    
                                                        <div class="flex items-center">
                                                            <span class="font-normal ml-3 block truncate">
                                                                <span x-text="item.email"></span>
                                                            </span>
                                                        </div>
                                                        <span class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
                                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                        @error('gender')
                                        <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>  
                                    @endif

                                    {{-- Name --}}
                                    <div class="mt-4">
                                        <x-input-label for="name" value="{{ __('Name') }}" class="s" />

                                        <x-text-input id="name" name="name" type="text" wire:model="form.name"
                                            class="mt-1 block w-3/4" placeholder="{{ __('Name') }}" />

                                    </div>

                                    {{-- Degree --}}
                                    <div class="mt-4">
                                        <x-input-label for="degree" value="{{ __('Degree') }}" class="" />

                                        <x-text-input id="degree" name="degree" type="text" wire:model="form.degree"
                                            class="mt-1 block w-3/4" placeholder="{{ __('Degree') }}" />


                                    </div>

                                    {{-- Session --}}
                                    <div class="mt-4">
                                        <x-input-label for="session" value="{{ __('Session') }}" class="" />

                                        <x-text-input id="session" name="session" type="number"
                                            wire:model="form.session" class="mt-1 block w-3/4"
                                            placeholder="{{ __('Session') }}" />


                                    </div>

                                    {{-- Experience --}}
                                    <div class="mt-4">
                                        <x-input-label for="experience" value="{{ __('Experience') }}" class="" />

                                        <x-text-input id="experience" name="experience" type="text"
                                            wire:model="form.experience" class="mt-1 block w-3/4"
                                            placeholder="{{ __('Experience') }}" />


                                    </div>

                                    {{-- Status --}}
                                    <div class="mt-4 flex gap-2 items-center" x-data="{ toggleStatus: @entangle('form.status'), changeStatus(){
                                        this.toggleStatus = !this.toggleStatus;
                                        $wire.form.status = this.toggleStatus;
                                    } }">
                                        <x-input-label for="status" value="{{ __('Sibuk') }}" class="" />
                                        <button class="shadow-lg w-16 rounded-full flex items-center p-1" :class="toggleStatus ? 'bg-primary' : 'bg-white' "
                                            @click.prevent="changeStatus">
                                            <div class="w-6 h-6 rounded-full transition-all" :class="toggleStatus ? 'bg-white ml-auto' : 'bg-slate-600'">
                                            </div>
                                        </button>
                                        <x-input-label for="status" value="{{ __('Ada') }}" class="" />

                                    </div>

                                    {{-- Location --}}
                                    <div class="mt-4">
                                        <x-input-label for="location" value="{{ __('Location') }}" class="" />

                                        <x-text-input id="location" name="location" type="text"
                                            wire:model="form.location" class="mt-1 block w-3/4"
                                            placeholder="{{ __('Location') }}" />
                                    </div>

                                    <div class="mt-4 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')" 
                                            wire:click.prevent="resetForm">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        @if ($selectedUser)
                                        <x-primary-button class="ms-3" x-on:click="$dispatch('close')"
                                            wire:click.prevent="updateUser">
                                            {{ __('Update') }}
                                        </x-primary-button>
                                        @else
                                        <x-primary-button class="ms-3" x-on:click="$dispatch('close')"
                                            wire:click.prevent="createUser">
                                            {{ __('Create') }}
                                        </x-primary-button>
                                        @endif
                                    </div>
                                </form>

                            </div>
                        </x-modal>

                        {{-- Modal Work Hours --}}
                        <x-modal name="work-hours" focusable>
                            <div class="p-6">
                                <form method="post" class="p-6">
                                    @csrf
                                    @method('post')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Psikolog Work Hours
                                    </h2>

                                    @foreach ($days as $key => $day)
                                    <div class="mt-4">
                                        <div class=" flex gap-10 items-center" x-data="{toggleStatus: {{ $day['active'] }}}">
                                            <div class="flex items-center gap-2">
                                                <x-input-label for="status" value="{{ $day['hari'] }}" class="" />

                                                <button class="shadow-lg w-16 rounded-full flex items-center p-1" :class="{{ $day['active'] }} ? 'bg-primary' : 'bg-white' "
                                                    wire:click.prevent="changeDayStatus('{{ $day['hari'] }}')" @click.prevent="toggleStatus = !toggleStatus">
                                                    <div class="w-6 h-6 rounded-full transition-all" :class="{{ $day['active'] }} ? 'bg-white ml-auto' : 'bg-slate-600'">
                                                    </div>
                                                </button>
                                            </div>
                                            
                                            <div class="flex items-center gap-2">
                                                <x-input-label for="status" value="{{ __('Mulai') }}" class="" />
                                                <input wire:model="days.{{ $key }}.jam_mulai" value="{{ $day['jam_mulai'] }}" type="time" name="start" id="" class="block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <x-input-label for="status" value="{{ __('Selesai') }}" class="" />
                                                <input wire:model="days.{{ $key }}.jam_selesai" value="{{ $day['jam_selesai'] }}" type="time" name="start" id="" class="block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>  
                                    @endforeach
                                   

                                    <div class="mt-4 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')" 
                                            wire:click.prevent="resetForm">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>
                                        <x-primary-button class="ms-3" x-on:click="$dispatch('close')"
                                            wire:click.prevent="updateWorkDays">
                                            {{ __('Update') }}
                                        </x-primary-button>
                                    </div>
                                </form>

                            </div>
                        </x-modal>

                        <div class="py-4 px-3">
                            <div class="flex ">
                                <div class="flex space-x-4 items-center mb-3">
                                    <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                    <select wire:model.live="perPage"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>

                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
</div>