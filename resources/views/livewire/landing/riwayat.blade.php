<div class="h-full">

    {{-- Title --}}
    <div class="w-fit m-auto text-center flex flex-col gap-4 my-10">
        <h1
            class="font-bold tracking-widest text-primary text-2xl before:content-['Riw'] before:bg-lightprimary before:pl-10 before:py-1">
            ayat Konseling Offline
        </h1>
        <h1 class="text-4xl font-bold text-display">Riwayat Pemesanan Layanan</h1>
    </div>

    @if ($message = Session::get('success'))
    <div class="mx-auto max-w-7xl flex bg-teal-500 text-white text-sm font-bold px-4 py-3 rounded-lg" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
        </svg>
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="w-full" x-data="{ open: false, selected_konseling: '', open_modal: false }">
        <!-- Tabs -->
        <div class="relative right-0" x-data="{tab: 'one'}">
            <ul class="relative flex flex-wrap p-1 m-auto list-none rounded-lg w-[50%]" role="list">
                <li class=" flex-auto text-center" :class="{' border-b-2 border-primary': tab == 'one'}">
                    <button @click="tab = 'one'" wire:click="getKonselingOnline()"
                        class=" flex items-center justify-center w-full px-2 py-3 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer"
                        data-tab-target="" active role="tab" aria-selected="true">
                        <span class="ml-1">Konseling Online</span>
                    </button>
                </li>
                <li class=" flex-auto text-center" :class="{' border-b-2 border-primary': tab == 'two'}">
                    <button @click="tab = 'two'" wire:click="getKonselingOffline()"
                        class=" flex items-center justify-center w-full px-2 py-3 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer"
                        data-tab-target="" role="tab" aria-selected="false">
                        <span class="ml-1">Konseling Offline</span>
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        @if (collect($konseling)->isNotEmpty())
        {{-- Table --}}
        <div class=" overflow-auto">
            <table class="max-w-90 m-auto my-10 rounded-lg ">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center px-16 py-4">
                            @role('client')
                            Nama Dokter
                            @endrole
                            @role('psikolog')
                            Nama Pasien
                            @endrole
                        </th>
                        <th class="text-center px-16 py-4">Jenis Konseling</th>
                        <th class="text-center px-16 py-4">Waktu</th>
                        <th class="text-center px-16 py-4">Status</th>
                        <th class="text-center px-16 py-4">Aksi</th>
    
                    </tr>
                </thead>
                <tbody class="bg-white shadow-lg">
                    @foreach($konseling as $item)
                    <tr>
                        <td class="text-center px-16 py-4">
                            @role('client')
                            {{ $item->psikolog?->dataPsikolog?->name }} {{
                                $item->psikolog?->dataPsikolog?->degree }}, Psikolog
                            @endrole
                            @role('psikolog')
                            {{ $item->client?->name }}
                            @endrole
                        </td>
                        @if($item->category == 1)
                        <td class="text-center px-16 py-4">Online/Daring</td>
                        @else
                        <td class="text-center px-16 py-4">Offline/Luring</td>
                        @endif
    
                        @if($item->date && $item->time)
                        <td class="text-center px-16 py-4">{{ $item->date }} - {{ $item->time }}</td>
                        @else
                        <td class="text-center px-16 py-4">—</td>
                        @endif
    
                        <td class="text-center px-16 py-4">
                            @if($item->berlangsung == 0)
                            <span class="bg-yellow-500 text-white rounded-full px-4 py-1 text-xs">Menunggu</span>
                            @elseif($item->berlangsung == 1)
                            <span class="bg-green-500 text-white rounded-full px-4 py-1 text-xs">Berlangsung</span>
                            @else
                            <span class="bg-red-500 text-white rounded-full px-4 py-1 text-xs">Selesai</span>
                            @endif
                        </td>
                        <td class="text-center px-16 py-4 flex gap-3">
    
                            @role('client')
                            <button wire:click="goToMessage({{ $item->psikolog_id }})"
                                class="text-white bg-primary px-3 py-2 rounded-md flex gap-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M13.5 3a8.5 8.5 0 0 1 0 17H13v.99A1.01 1.01 0 0 1 11.989 22c-2.46-.002-4.952-.823-6.843-2.504C3.238 17.798 2.002 15.275 2 12.009V11.5A8.5 8.5 0 0 1 10.5 3zm-5 7a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m7 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                    </g>
                                </svg>
                                Chat
                            </button>
                            @endrole
                            @role('psikolog')
                            <button wire:click="goToMessage({{ $item->client_id }})"
                                class="text-white bg-primary px-3 py-2 rounded-md flex gap-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M13.5 3a8.5 8.5 0 0 1 0 17H13v.99A1.01 1.01 0 0 1 11.989 22c-2.46-.002-4.952-.823-6.843-2.504C3.238 17.798 2.002 15.275 2 12.009V11.5A8.5 8.5 0 0 1 10.5 3zm-5 7a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m7 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                    </g>
                                </svg>
                                Chat
                            </button>
                            @endrole
    
    
                            @if ($item->berlangsung == 1)
                            @role('psikolog')
                            <button @click="open_modal = true; selected_konseling = {{ $item->id }}"
                                class="bg-icongreen px-3 py-2 rounded-md text-white">
                                Selesai
                            </button>
                            @endrole
                            @else
                            <a href="{{ route('cetak-hasil', $item->id) }}" target="_blank"
                                class="bg-primary px-3 py-2 rounded-md text-white w-fit flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M16 16a1 1 0 0 1 .993.883L17 17v4a1 1 0 0 1-.883.993L16 22H8a1 1 0 0 1-.993-.883L7 21v-4a1 1 0 0 1 .883-.993L8 16zm3-9a3 3 0 0 1 3 3v7a2 2 0 0 1-2 2h-1v-3a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3H4a2 2 0 0 1-2-2v-7a3 3 0 0 1 3-3zm-2 2h-2a1 1 0 0 0-.117 1.993L15 11h2a1 1 0 0 0 .117-1.993zm0-7a1 1 0 0 1 1 1v2H6V3a1 1 0 0 1 1-1z" />
                                    </g>
                                </svg>
                                Hasil
                            </a>
                            @endif
                        </td>
    
                    </tr>
                    @endforeach
    
                </tbody>
            </table>
        </div>
        {{-- MOdal --}}
        <div>
            <!-- Modal container -->
            <div x-cloak x-show="open_modal" class="fixed z-10 inset-0 overflow-y-auto">
                <!-- Modal content -->
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!-- Background overlay -->
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- Modal content -->
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <!-- Your modal content goes here -->
                            <h1 class="text-lg text-primary mb-5">Catatan Hasil Konseling</h1>
                            <form action="">
                                <div
                                    class="border border-primary relative rounded-xl overflow-hidden w-full m-auto py-2 px-2 bg-white">
                                    <textarea wire:model="note" name="note" id=""
                                        class="outline-none border-none w-full h-full focus:outline-none focus:ring-0"
                                        placeholder="Catat" rows="5" cols="50"></textarea>
                                    @error('note')
                                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <!-- Button to close the modal -->
                            <button @click="open_modal = false" type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Close
                            </button>
                            <button @click="$wire.selesaiKonseling(selected_konseling); open_modal = false"
                                type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else
        <div class="w-full flex items-center justify-center my-16">
            <div class="w-fit text-center">
                <img src="{{ asset('assets/images/empty.svg') }}" alt="">
                <h1 class="text-darkprimary mt-4 text-3xl font-black">
                    Tidak ada riwayat
                </h1>
            </div>
        </div>
        @endif
    </div>


</div>