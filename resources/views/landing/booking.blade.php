<x-guest-layout>

    <div class="w-fit m-auto text-center flex flex-col gap-4 my-10">
        <h1
            class="font-bold tracking-widest text-primary text-2xl before:content-['Boo'] before:bg-lightprimary before:pl-10 before:py-1">
            king Psikolog
        </h1>
        <h1 class="text-4xl font-bold text-display">Lakukan Pemesanan Layanan</h1>
    </div>

    <div class="flex px-4 md:px-20 gap-10 lg:gap-0 my-20 lg:flex-row flex-col">
        <div class="w-full lg:w-1/2 text-center">
            <h1 class="text-2xl font-bold mb-10">Detail Psikolog</h1>
            <div
                class="md:w-[70%] m-auto rounded-xl shadow-lg bg-white px-10 py-10 flex flex-col gap-7 items-center mb-5">
                <div class="relative">
                    <img src="{{ asset('assets/images/psikolog') }}/{{ $psikolog->photo }}" alt="" srcset=""
                        class="rounded-full w-44 h-44 object-cover">

                </div>
                <div class="flex flex-col gap-5 w-full text-center px-6">
                    <h1 class="text-primary font-bold text-2xl">{{ $psikolog->name }} {{ $psikolog->degree }}, Psikolog
                    </h1>
                    <div class="flex gap-3">
                        <div class="text-icongreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M1 17.2q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2v.8q0 .825-.587 1.413T15 20H3q-.825 0-1.412-.587T1 18zM18.45 20q.275-.45.413-.962T19 18v-1q0-1.1-.612-2.113T16.65 13.15q1.275.15 2.4.513t2.1.887q.9.5 1.375 1.112T23 17v1q0 .825-.587 1.413T21 20zM9 12q-1.65 0-2.825-1.175T5 8q0-1.65 1.175-2.825T9 4q1.65 0 2.825 1.175T13 8q0 1.65-1.175 2.825T9 12m10-4q0 1.65-1.175 2.825T15 12q-.275 0-.7-.062t-.7-.138q.675-.8 1.038-1.775T15 8q0-1.05-.362-2.025T13.6 4.2q.35-.125.7-.162T15 4q1.65 0 2.825 1.175T19 8" />
                            </svg>
                        </div>
                        <h1 class="font-semibold text-slate-500 text-lg">{{ $psikolog->session }} Sesi</h1>
                    </div>
                    <div class="flex gap-3">
                        <div class="text-icongreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4 22q-.825 0-1.412-.587T2 20V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm6-16h4V4h-4zm1 9v2q0 .425.288.713T12 18q.425 0 .713-.288T13 17v-2h2q.425 0 .713-.288T16 14q0-.425-.288-.712T15 13h-2v-2q0-.425-.288-.712T12 10q-.425 0-.712.288T11 11v2H9q-.425 0-.712.288T8 14q0 .425.288.713T9 15z" />
                            </svg>
                        </div>
                        <h1 class="font-semibold text-slate-500 text-lg text-start">{{ $psikolog->experience }} Tahun
                            Pengalaman
                        </h1>
                    </div>

                </div>

            </div>
            <h1 class="text-base font-semibold mb-5">Jadwal Praktik Offline</h1>
            <div
                class="md:w-[70%] m-auto rounded-xl shadow-lg bg-white px-8 py-4 flex gap-3 justify-center items-center mt-3">
                <div class="text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <g fill="none">
                            <path
                                d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="currentColor"
                                d="M12 2a9 9 0 0 1 9 9c0 3.074-1.676 5.59-3.442 7.395a20.441 20.441 0 0 1-2.876 2.416l-.426.29l-.2.133l-.377.24l-.336.205l-.416.242a1.874 1.874 0 0 1-1.854 0l-.416-.242l-.52-.32l-.192-.125l-.41-.273a20.638 20.638 0 0 1-3.093-2.566C4.676 16.589 3 14.074 3 11a9 9 0 0 1 9-9m0 6a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                        </g>
                    </svg>
                </div>
                <h1>
                    {{ $psikolog->location }}
                </h1>
            </div>
            @foreach ($psikolog->praktik as $praktik)
            <div
                class="md:w-[70%] m-auto rounded-r-lg border-l-4 shadow-lg border-icongreen bg-white px-8 py-4 flex flex-col gap-2  mt-3">
                <div class="text-start text-slate-400 text-sm">
                    Jadwal Praktik
                </div>
                <div class="flex gap-4">
                    <div class="text-icongreen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M17.5 3a3.5 3.5 0 0 1 2.526 5.923A8.962 8.962 0 0 1 21 13a8.973 8.973 0 0 1-2.714 6.44l-.222.21l.643.643a1 1 0 0 1-1.32 1.497l-.094-.083l-.868-.868A8.96 8.96 0 0 1 12 22a8.962 8.962 0 0 1-4.12-.996l-.305-.165l-.868.868a1 1 0 0 1-1.497-1.32l.083-.094l.643-.643A8.977 8.977 0 0 1 3 13a8.96 8.96 0 0 1 .974-4.077A3.5 3.5 0 1 1 9.307 4.41A8.996 8.996 0 0 1 12 4c.938 0 1.842.143 2.693.41A3.494 3.494 0 0 1 17.5 3M12 6a7 7 0 1 0 0 14a7 7 0 0 0 0-14m0 2a1 1 0 0 1 1 1v3.586l1.813 1.812a1 1 0 0 1-1.415 1.415l-2.105-2.106a.997.997 0 0 1-.293-.72V9a1 1 0 0 1 1-1M6.5 5a1.5 1.5 0 0 0-1.348 2.16a9.044 9.044 0 0 1 2.22-1.88A1.494 1.494 0 0 0 6.5 5m11 0c-.325 0-.626.103-.872.28a9.043 9.043 0 0 1 2.22 1.88A1.5 1.5 0 0 0 17.5 5"/></g></svg>
                    </div>
                    {{ ucfirst($praktik->hari) }}
                   <div>
                    {{ \Carbon\Carbon::parse($praktik->jam_mulai)->format('H:i') }}
                    - {{ \Carbon\Carbon::parse($praktik->jam_selesai)->format('H:i') }}
                   </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="w-full lg:w-1/2 text-center">
            <h1 class="text-2xl font-bold mb-10">Informasi Pemesanan</h1>
            <form action="{{ route('booking-store' , ['id' => $psikolog->id]) }}"
                class="w-full m-auto flex flex-col gap-y-4" method="POST">
                @csrf
                {{-- hidden input to validate id --}}
                <input type="hidden" name="psikolog_id" value="{{ $psikolog->id }}">

                {{-- Nama --}}
                <div>
                    <div
                        class="border border-primary relative rounded-xl overflow-hidden w-full m-auto py-2 px-4 bg-white">
                        <input type="text" placeholder="Nama" name="name" id="" value="{{ Auth::user()->name ?? '' }}"
                            class="outline-none border-none w-full h-full focus:outline-none focus:ring-0">
                    </div>
                    @error('name')
                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Nomor Handphone --}}
                <div>
                    <div
                        class="border border-primary relative rounded-xl overflow-hidden w-full m-auto py-2 px-4 bg-white">
                        <input type="text" placeholder="Nomor handphone" name="phone" id="" value="{{ old('phone') }}"
                            class="outline-none border-none w-full h-full focus:outline-none focus:ring-0">
                    </div>
                    @error('phone')
                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Kelamin --}}
                <div>
                    <div class="relative mt-2" x-data="{isOpen: false, selected_id: {{ old('gender') ?? 'null' }}, data: [
                        {id: 1, name: 'Laki-laki'},
                        {id: 2, name: 'Perempuan'},
                    ], getData(id){
                        return this.data.find(item => item.id === id)
                    }}">
                        <input type="text" class="invisible absolute" x-bind:value="selected_id" name="gender">
                        <button type="button" @click.prevent="isOpen = !isOpen"
                            class="relative w-full cursor-default rounded-xl bg-white py-4 pl-3 pr-10 text-left text-gray-900 border border-primary"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <span class="flex items-center">
                                <span x-show="selected_id != null" class="ml-3 block truncate"
                                    x-text="getData(selected_id).name"></span>
                                <span x-show="selected_id == null" class="ml-3 block truncate text-slate-500">
                                    Pilih Kelamin
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
                                <li x-on:click="selected_id = item.id, isOpen = false"
                                    x-bind:class="selected_id === item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                    class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">

                                    <div class="flex items-center">
                                        <span class="font-normal ml-3 block truncate">
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
                {{-- Alamat --}}
                <div>
                    <div class="border border-primary relative rounded-xl overflow-hidden w-full m-auto py-2 px-4 bg-white">
                        <textarea name="address" id=""
                            class="outline-none border-none w-full h-full focus:outline-none focus:ring-0"
                            placeholder="Alamat"></textarea>
                    </div>
                    @error('address')
                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Jenis Konseling --}}
                <div>
                    <div x-data="{isOpen: false, selected_id: {{ old('category') ?? 'null' }}, data: [
                        {id: 1, name: 'Online/Daring'},
                        {id: 2, name: 'Offline/Luring'},
                    ], getData(id){
                        return this.data.find(item => item.id === id)
                    }}" class="flex flex-col gap-y-4">
                        <div class="relative mt-2">
                            <input type="text" class="invisible absolute" x-bind:value="selected_id" name="category">
                            <button type="button" @click.prevent="isOpen = !isOpen"
                                class="relative w-full cursor-default rounded-xl bg-white py-4 pl-3 pr-10 text-left text-gray-900 border border-primary"
                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                <span class="flex items-center">
                                    <span x-show="selected_id != null" class="ml-3 block truncate"
                                        x-text="getData(selected_id).name"></span>
                                    <span x-show="selected_id == null" class="ml-3 block truncate text-slate-500">
                                        Pilih Kategori
                                    </span>
                                </span>
                                <span
                                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
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
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                aria-activedescendant="listbox-option-3">
                                <template x-for="(item, i) in data" :key="i">
                                    <li x-on:click="selected_id = item.id, isOpen = false"
                                        x-bind:class="selected_id === item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                        class="hover:bg-indigo-600 hover:text-white relative cursor-default select-none py-2 pl-3 pr-9">

                                        <div class="flex items-center">
                                            <span class="font-normal ml-3 block truncate">
                                                <span x-text="item.name"></span>
                                            </span>
                                        </div>
                                        <span class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
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

                        <div class="flex gap-x-3 w-full pl-5" x-show="selected_id === 2">
                            <div class="w-[10%] text-icongreen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13.3 20.275q-.3-.3-.3-.7t.3-.7L16.175 16H7q-.825 0-1.412-.587T5 14V5q0-.425.288-.712T6 4q.425 0 .713.288T7 5v9h9.175l-2.9-2.9q-.3-.3-.288-.7t.288-.7q.3-.3.7-.312t.7.287L19.3 14.3q.15.15.212.325t.063.375q0 .2-.063.375t-.212.325l-4.575 4.575q-.3.3-.712.3t-.713-.3" />
                                </svg>
                            </div>
                            {{-- Tanggal --}}
                            <div>
                                <div
                                    class="border border-primary relative rounded-xl overflow-hidden w-full ml-auto py-2 px-4 bg-white">
                                    <input type="date" placeholder="Tanggal" name="date" id="" value="{{ old('date') }}"
                                        class="outline-none border-none w-full h-full focus:outline-none focus:ring-0">
                                </div>
                                @error('date')
                                <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex gap-x-3 w-full pl-5" x-show="selected_id === 2">
                            <div class="w-[10%] text-icongreen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13.3 20.275q-.3-.3-.3-.7t.3-.7L16.175 16H7q-.825 0-1.412-.587T5 14V5q0-.425.288-.712T6 4q.425 0 .713.288T7 5v9h9.175l-2.9-2.9q-.3-.3-.288-.7t.288-.7q.3-.3.7-.312t.7.287L19.3 14.3q.15.15.212.325t.063.375q0 .2-.063.375t-.212.325l-4.575 4.575q-.3.3-.712.3t-.713-.3" />
                                </svg>
                            </div>
                            {{-- Jam --}}
                            <div>
                                <div
                                    class="border border-primary relative rounded-xl overflow-hidden w-full ml-auto py-2 px-4 bg-white">
                                    <input type="time" placeholder="Jam" name="time" id="" value="{{ old('time') }}"
                                        class="outline-none border-none w-full h-full focus:outline-none focus:ring-0">
                                </div>
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
                <div>
                    <div
                        class="border border-primary relative rounded-xl overflow-hidden w-full m-auto py-2 px-4 bg-white">
                        <textarea name="description" id="" cols="30" rows="10"
                            class="outline-none border-none w-full h-full focus:outline-none focus:ring-0"
                            placeholder="Deskripsi Masalah"></textarea>
                    </div>
                    @error('description')
                    <p class="text-red-500 text-sm text-start mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Button --}}
                <button type="submit"
                    class="py-3 w-[30%] mt-2 justify-center ml-auto flex gap-x-3 items-center rounded-lg bg-icongreen text-white font-bold hover:bg-gradient-to-l transition-all">
                    Save
                </button>
            </form>
        </div>
    </div>

</x-guest-layout>