<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Konseling') }}
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
                                <button x-on:click.prevent="$dispatch('open-modal', 'edit')" wire:click="editKonseling()"
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
                            <div class="flex space-x-3">
                                <div class="flex space-x-3 items-center">
                                    <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                                    <select wire:model.live="konselingCategory"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">All</option>
                                        <option value="2">Offline</option>
                                        <option value="1">Online</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700  bg-gray-50">
                                    <tr>
                                        @include('livewire.includes.table-head-sort', ['column' => 'psikolog',
                                        'columnLabel'
                                        => 'Psikolog'])
                                        @include('livewire.includes.table-head-sort', ['column' => 'client',
                                        'columnLabel' => 'Client'])
                                        @include('livewire.includes.table-head-sort', ['column' => 'phone',
                                        'columnLabel' => 'Phone'])
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Gender</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Address</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Category</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Date Time</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Berlangsung</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Description</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class=" uppercase">Note</span>
                                        </th>
                                        @include('livewire.includes.table-head-sort', ['column' => 'created_at',
                                        'columnLabel' => 'Created'])
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only uppercase">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konselings as $kon)
                                    <tr wire:key="{{ $kon->id }}" class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center">
                                            {{ $kon->psikolog?->dataPsikolog?->name }} {{ $kon->psikolog?->dataPsikolog?->degree }}
                                        </th>
                                        <td class="px-4 py-3">{{ $kon->client?->name }}</td>
                                        <td class="px-4 py-3">{{ $kon->phone }}</td>

                                        <td class="px-4 py-3 text-white flex gap-1">
                                            <span @class(['px-2 py-1 rounded', 'bg-blue-500'=>
                                                $kon->gender == 1,
                                                'bg-pink-500' => $kon->gender == 2,
                                                ])>
                                                @if ($kon->gender == 1)
                                                Male
                                                @else
                                                Female
                                                @endif
                                            </span>
                                        </td>

                                        <td class="px-4 py-3 truncate">{{ \Illuminate\Support\Str::limit($kon->address,
                                            10) }}</td>
                                        <td class="px-4 py-3 text-white flex gap-1">
                                            <span @class(['px-2 py-1 rounded', 'bg-icongreen'=>
                                                $kon->category == 1,
                                                'bg-orange-500' => $kon->category == 2,
                                                ])>
                                                @if ($kon->category == 1)
                                                Online
                                                @else
                                                Offline
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $kon->date ? \Carbon\Carbon::parse($kon->date)->format('d-M-Y') : '' }}
                                            {{ $kon->time ? \Carbon\Carbon::parse($kon->time)->format('H:i') : '' }}
                                        </td>
                                        <td class="px-4 py-3 text-white flex gap-1">
                                            <span @class(['px-2 py-1 rounded', 'bg-green-700'=>
                                                $kon->berlangsung == 1,
                                                'bg-red-500' => $kon->berlangsung == 2,
                                                ])>
                                                @if ($kon->berlangsung == 1)
                                                Aktif
                                                @else
                                                Selesai
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <button wire:click="selectKonseling({{ $kon->id }}, 'description')"
                                                x-on:click.prevent="$dispatch('open-modal', 'description')"
                                                class="px-2 py-2 bg-primary text-white rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none">
                                                        <path
                                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="currentColor"
                                                            d="M12 5c3.679 0 8.162 2.417 9.73 5.901c.146.328.27.71.27 1.099c0 .388-.123.771-.27 1.099C20.161 16.583 15.678 19 12 19c-3.679 0-8.162-2.417-9.73-5.901C2.124 12.77 2 12.389 2 12c0-.388.123-.771.27-1.099C3.839 7.417 8.322 5 12 5m0 3a4 4 0 1 0 0 8a4 4 0 0 0 0-8m0 2a2 2 0 1 1 0 4a2 2 0 0 1 0-4" />
                                                    </g>
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="px-4 py-3">
                                            <button wire:click="selectKonseling({{ $kon->id }}, 'note')"
                                                x-on:click.prevent="$dispatch('open-modal', 'description')"
                                                class="px-2 py-2 bg-primary text-white rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none">
                                                        <path
                                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="currentColor"
                                                            d="M12 5c3.679 0 8.162 2.417 9.73 5.901c.146.328.27.71.27 1.099c0 .388-.123.771-.27 1.099C20.161 16.583 15.678 19 12 19c-3.679 0-8.162-2.417-9.73-5.901C2.124 12.77 2 12.389 2 12c0-.388.123-.771.27-1.099C3.839 7.417 8.322 5 12 5m0 3a4 4 0 1 0 0 8a4 4 0 0 0 0-8m0 2a2 2 0 1 1 0 4a2 2 0 0 1 0-4" />
                                                    </g>
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="px-4 py-3 flex items-center gap-2">
                                            <button wire:click="selectedKonseling = {{ $kon->id }}"
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-delete')"
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
                                            <button
                                                x-on:click.prevent="$wire.editKonseling({{ $kon->id }});$dispatch('open-modal', 'edit')"
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
                                            @if (!$kon->berlangsung)
                                            <button
                                                x-on:click.prevent="$wire.editKonseling({{ $kon->id }});$dispatch('open-modal', 'edit')"
                                                class="px-2 py-2 bg-icongreen text-white rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none">
                                                        <path
                                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="currentColor"
                                                            d="M16 16a1 1 0 0 1 .993.883L17 17v4a1 1 0 0 1-.883.993L16 22H8a1 1 0 0 1-.993-.883L7 21v-4a1 1 0 0 1 .883-.993L8 16zm3-9a3 3 0 0 1 3 3v7a2 2 0 0 1-2 2h-1v-3a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3H4a2 2 0 0 1-2-2v-7a3 3 0 0 1 3-3zm-2 2h-2a1 1 0 0 0-.117 1.993L15 11h2a1 1 0 0 0 .117-1.993zm0-7a1 1 0 0 1 1 1v2H6V3a1 1 0 0 1 1-1z" />
                                                    </g>
                                                </svg>
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Modal Delete --}}
                        <x-modal name="confirm-delete" focusable>
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
                                        wire:click="deleteKonseling()">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </div>
                            </div>
                        </x-modal>

                        {{-- Modal Description--}}
                        <x-modal name="description" focusable>
                            <div class="p-6">

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    @if ($descriptionType == 'description')
                                    {{ $form['description'] }}
                                    @else
                                    {{ $form['note'] }}
                                    @endif
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')" wire:click.prevent="resetForm">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
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
                                        @if ($selectedKonseling)
                                        {{ __('Update Konseling') }}
                                        @else
                                        {{ __('Create Konseling') }}
                                        @endif
                                    </h2>

                                    @if ($selectedKonseling == null)
                                    {{-- Psikolog --}}
                                    <div class="mt-4" >
                                        <x-input-label for="" value="{{ __('Select Psikolog Account') }}" class="" />
                                        
                                        <div class="relative mt-2 w-3/4" x-data="{isOpen: false, selected_account: '', data: @entangle('psikologAccount')}">
                                            <input type="text" class="invisible absolute"  name="gender">
                                            <button type="button" @click.prevent="isOpen = !isOpen"
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm p-2 block w-full mt-1"
                                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                <span class="flex items-center">
                                                   <div class="flex gap-x-1 ml-3" x-show="selected_account != ''">
                                                        <span class=" block truncate"
                                                        x-text="selected_account.data_psikolog?.name"></span>
                                                        <span class="block truncate"
                                                        x-text="selected_account.data_psikolog?.degree"></span>
                                                   </div>
                                                    <span x-show="selected_account === ''" class="ml-3 block truncate text-slate-500">
                                                        Pilih Psikolog
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
                                                    <li x-on:click="selected_account = item; isOpen = false"
                                                        wire:click="form.psikolog_id = item.id"
                                                        x-bind:class="selected_account.id == item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                                        class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">
                    
                                                        <div class="flex items-center">
                                                            <span class="font-normal ml-3 truncate flex gap-x-2">
                                                                <span x-text="item.data_psikolog.name"></span>
                                                                <span x-text="item.data_psikolog.degree"></span>
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

                                    {{-- Client --}}
                                    <div class="mt-4" >
                                        <x-input-label for="" value="{{ __('Select Client Account') }}" class="" />
                                        
                                        <div class="relative mt-2 w-3/4" x-data="{isOpen: false, selected_account: '', data: @entangle('clientAccount')}">
                                            <input type="text" class="invisible absolute"  name="gender">
                                            <button type="button" @click.prevent="isOpen = !isOpen"
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm p-2 block w-full mt-1"
                                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                <span class="flex items-center">
                                                   <div class="flex gap-x-1 ml-3" x-show="selected_account != ''">
                                                        <span class=" block truncate"
                                                        x-text="selected_account.name"></span>
                                                   </div>
                                                    <span x-show="selected_account === ''" class="ml-3 block truncate text-slate-500">
                                                        Pilih Client
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
                                                    <li x-on:click="selected_account = item; isOpen = false"
                                                        wire:click="form.client_id = item.id"
                                                        x-bind:class="selected_account.id == item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                                        class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">
                    
                                                        <div class="flex items-center">
                                                            <span class="font-normal ml-3 truncate flex gap-x-2">
                                                                <span x-text="item.name"></span>
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

                                    {{-- Nomor Handphone --}}
                                    <div class="mt-2">
                                        <x-input-label for="phone" value="{{ __('Phone') }}" class="s" />

                                        <x-text-input id="phone" name="phone" type="number" wire:model="form.phone"
                                            class="mt-1 block w-3/4" placeholder="{{ __('Phone') }}" />
                                    </div>
                                    {{-- Kelamin --}}
                                    <div class="mt-2">
                                        <x-input-label for="gender" value="{{ __('Gender') }}" class="s" />
                                        <div class="relative w-3/4" x-data="{isOpen: false, selected_id: @entangle('form.gender'), data: [
                                            {id: 1, name: 'Laki-laki'},
                                            {id: 2, name: 'Perempuan'},
                                        ], getData(id){
                                            return this.data.find(item => item.id === id)
                                        }}">
                                            <input type="text" class="invisible absolute" x-bind:value="selected_id"
                                                name="gender">
                                            <button type="button" @click.prevent="isOpen = !isOpen"
                                                class="mt-1 block w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                aria-haspopup="listbox" aria-expanded="true"
                                                aria-labelledby="listbox-label">
                                                <span class="flex items-center">
                                                    <span x-show="selected_id != null" class="ml-3 block truncate"
                                                        x-text="getData(selected_id)?.name"></span>
                                                    <span x-show="selected_id == null"
                                                        class="ml-3 block truncate text-slate-500">
                                                        Pilih Kelamin
                                                    </span>
                                                </span>
                                                <span
                                                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <ul x-show="isOpen" x-transition:enter="transition ease-in duration-100"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-100"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                                tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                                aria-activedescendant="listbox-option-3">
                                                <template x-for="(item, i) in data" :key="i">
                                                    <li x-on:click="selected_id = item.id, isOpen = false"
                                                        wire:click="form.gender = item.id"
                                                        x-bind:class="selected_id === item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                                        class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">

                                                        <div class="flex items-center">
                                                            <span class="font-normal ml-3 block truncate">
                                                                <span x-text="item.name"></span>
                                                            </span>
                                                        </div>
                                                        <span
                                                            class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
                                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
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
                                    {{-- Alamat --}}
                                    <div class="mt-2">
                                        <x-input-label for="address" value="{{ __('Address') }}" class="s" />

                                        <textarea name="address" id="" wire:model="form.address"
                                            class="block mt-1 w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                            placeholder="Alamat">{{ $form['address'] }}</textarea>

                                        @error('address')
                                        <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- Jenis Konseling --}}
                                    <div class="mt-2">
                                        <x-input-label for="category" value="{{ __('Category') }}" class="s" />
                                        <div x-data="{isOpen: false, selected_id: @entangle('form.category'), data: [
                                                {id: 1, name: 'Online/Daring'},
                                                {id: 2, name: 'Offline/Luring'},
                                            ], getData(id){
                                                return this.data.find(item => item.id === id)
                                            }}" class="flex flex-col gap-y-4">
                                            <div class="relative w-3/4 mt-2">
                                                <input type="text" class="invisible absolute" x-bind:value="selected_id"
                                                    name="category">
                                                <button type="button" @click.prevent="isOpen = !isOpen"
                                                    class="block mt-1 w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                    aria-haspopup="listbox" aria-expanded="true"
                                                    aria-labelledby="listbox-label">
                                                    <span class="flex items-center">
                                                        <span x-show="selected_id != null" class="ml-3 block truncate"
                                                            x-text="getData(selected_id)?.name"></span>
                                                        <span x-show="selected_id == null"
                                                            class="ml-3 block truncate text-slate-500">
                                                            Pilih Kategori
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </button>
                                                <ul x-show="isOpen" x-transition:enter="transition ease-in duration-100"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="transition ease-in duration-100"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                                    tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                                    aria-activedescendant="listbox-option-3">
                                                    <template x-for="(item, i) in data" :key="i">
                                                        <li x-on:click="selected_id = item.id, isOpen = false"
                                                            wire:click="form.category = item.id"
                                                            x-bind:class="selected_id === item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                                            class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">

                                                            <div class="flex items-center">
                                                                <span class="font-normal ml-3 block truncate">
                                                                    <span x-text="item.name"></span>
                                                                </span>
                                                            </div>
                                                            <span
                                                                class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
                                                                <svg class="h-5 w-5" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </span>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>

                                            {{-- Date --}}
                                            <div class="flex gap-x-1 w-full pl-5" x-show="selected_id === 2">
                                                <div class="w-[10%] text-icongreen">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M13.3 20.275q-.3-.3-.3-.7t.3-.7L16.175 16H7q-.825 0-1.412-.587T5 14V5q0-.425.288-.712T6 4q.425 0 .713.288T7 5v9h9.175l-2.9-2.9q-.3-.3-.288-.7t.288-.7q.3-.3.7-.312t.7.287L19.3 14.3q.15.15.212.325t.063.375q0 .2-.063.375t-.212.325l-4.575 4.575q-.3.3-.712.3t-.713-.3" />
                                                    </svg>
                                                </div>
                                                {{-- Tanggal --}}
                                                <div>
                                                    <x-text-input id="date" name="date" type="date" wire:model="form.date"
                                                    class="mt-1 block w-full" />
                                                    @error('date')
                                                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Time --}}
                                            <div class="flex gap-x-1 w-full pl-5" x-show="selected_id === 2">
                                                <div class="w-[10%] text-icongreen">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M13.3 20.275q-.3-.3-.3-.7t.3-.7L16.175 16H7q-.825 0-1.412-.587T5 14V5q0-.425.288-.712T6 4q.425 0 .713.288T7 5v9h9.175l-2.9-2.9q-.3-.3-.288-.7t.288-.7q.3-.3.7-.312t.7.287L19.3 14.3q.15.15.212.325t.063.375q0 .2-.063.375t-.212.325l-4.575 4.575q-.3.3-.712.3t-.713-.3" />
                                                    </svg>
                                                </div>
                                                {{-- Jam --}}
                                                <div>
                                                    <x-text-input id="time" name="time" type="time" wire:model="form.time"
                                                    class="mt-1 block w-full" />
                                                    @error('time')
                                                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        @error('category')
                                        <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- Deskripsi Masalah --}}
                                    <div class="mt-2">
                                        <x-input-label for="description" value="{{ __('Description') }}" class="s" />
                                        <textarea name="description" id="" wire:model="form.description"
                                            class="block mt-1 w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                            placeholder="Deskripsi Masalah">{{ $form['description'] }}</textarea>

                                        @error('description')
                                        <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- Berlangsung --}}
                                    <div class="mt-4">
                                        <div class=" flex gap-4 items-center" x-data="{toggleStatus: {{ $form['berlangsung'] }}}">

                                            <x-input-label for="status" value="Berlangsung" class="" />

                                            <button class="shadow-lg w-16 rounded-full flex items-center p-1"
                                                :class="{{ $form['berlangsung'] }} ? 'bg-primary' : 'bg-white' " 
                                                wire:click.prevent="changeStatusKonseling"
                                                @click.prevent="toggleStatus = !toggleStatus">
                                                <div class="w-6 h-6 rounded-full transition-all"
                                                    :class="{{ $form['berlangsung'] }} ? 'bg-white ml-auto' : 'bg-slate-600'">
                                                </div>
                                            </button>


                                        </div>
                                    </div>
                                    @if ($form['berlangsung'] == 'false')
                                    {{-- Note --}}
                                    <div class="mt-2">
                                        <x-input-label for="note" value="{{ __('Note Hasil') }}" class="s" />
                                        <textarea name="note" id="" wire:model="form.note"
                                            class="block mt-1 w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                            placeholder="Deskripsi Masalah">{{ $form['note'] }}</textarea>

                                        @error('note')
                                        <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif


                                    <div class="mt-4 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')"
                                            wire:click.prevent="resetForm">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        @if ($selectedKonseling)
                                        <x-primary-button class="ms-3" x-on:click="$dispatch('close')"
                                            wire:click.prevent="updateKonseling">
                                            {{ __('Update') }}
                                        </x-primary-button>
                                        @else
                                        <x-primary-button class="ms-3" x-on:click="$dispatch('close')"
                                            wire:click.prevent="createKonseling">
                                            {{ __('Create') }}
                                        </x-primary-button>
                                        @endif
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

                            {{ $konselings->links() }}
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
</div>