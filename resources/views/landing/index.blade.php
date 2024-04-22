<x-guest-layout>


    {{-- Hero Section --}}
    <div class="flex lg:flex-row flex-col gap-8 lg:gap-4 px-4 lg:px-32 m-auto py-5 md:py-10 lg:py-24 justify-between">
        <div class="w-full flex flex-col gap-y-5 md:gap-y-10 items-center lg:items-start text-center lg:text-start">
            <h1 class="text-2xl font-axiforma md:text-4xl lg:text-5xl lg:leading-normal text-display font-black">
                Supporting Mental Health, Building Emotional Well-being
            </h1>
            <h4 class="text-base md:text-lg leading-relaxed lg:text-xl lg:max-w-[90%] text-slate-500 font-medium">
                Selamat datang di pusat konseling mahasiswa UNNES! Kami hadir untuk mendukung kesejahteraan anda
                dalam menemukan konselor berpengalaman dan ruang aman untuk berbicara.
            </h4>
            <a href="#"
                class="py-2 px-4 flex gap-x-3 items-center rounded-lg bg-gradient-to-r from-primary to-secondary text-white w-fit font-bold hover:bg-gradient-to-l transition-all">
                Konseling sekarang

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m12.2 13l-.9.9q-.275.275-.275.7t.275.7q.275.275.7.275t.7-.275l2.6-2.6q.3-.3.3-.7t-.3-.7l-2.6-2.6q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7l.9.9H9q-.425 0-.712.288T8 12q0 .425.288.713T9 13zm-.2 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8" />
                </svg>
            </a>
        </div>
        <div class="w-full md:flex hidden items-center justify-center">
            <img src="{{ asset('assets/images/amico.svg') }}" class="lg:w-[80%] w-[60%]" />
        </div>
    </div>

    {{-- Sesi Aktif --}}
    <div class="mb-20 px-10 lg:px-32 flex lg:flex-row flex-col gap-10 items-center lg:items-end ">
        @auth
        @if ($konselings->isNotEmpty())
        @foreach ($konselings as $item)
        <div class="max-w-md shadow-lg rounded-lg overflow-hidden relative min-h-60">
            @if ($item->category == 1)
            <span class="bg-yellow-500 px-2 py-1 rounded absolute left-0 bottom-0 text-white">Daring</span>
            @else
            <span class="bg-purple-500 px-2 py-1 rounded absolute left-0 bottom-0 text-white">Luring</span>
            @endif
            <div class="bg-primary py-3 px-4 text-center">
                <h1 class="text-white font-black text-xl">Konsultasi Berlangsung</h1>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start h-full bg-white px-6 py-6 gap-7">
                <div class="relative min-w-fit">
                    @role('client')
                    <img src="{{ $item->psikolog->dataPsikolog->photo ? asset('assets/images/psikolog/'. $item->psikolog->dataPsikolog->photo) : 'https://ui-avatars.com/api/?background=5271FF&color=fff&name='.$item->psikolog->dataPsikolog->name }}"
                        alt="" srcset="" class="rounded-full w-24 h-24 object-cover">
                    @endrole
                    @role('psikolog')
                    <img src="{{ $item->client->photo ? asset('assets/images/client/'. $item->client->photo) : 'https://ui-avatars.com/api/?background=5271FF&color=fff&name='.$item->client->name }}"
                        alt="" srcset="" class="rounded-full w-24 h-24 object-cover">
                    @endrole
                </div>
                <div class="flex flex-col gap-2">
                    @role('client')
                    <h1 class="text-primary font-bold text-xl">{{ $item->psikolog->dataPsikolog->name.' '.$item->psikolog->dataPsikolog->degree }}</h1>
                    @endrole
                    @role('psikolog')
                    <h1 class="text-primary font-bold text-xl">{{ $item->client->name }}</h1>
                    @endrole

                    @role('client')
                    <div class="flex gap-3">
                        <div class="text-icongreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M1 17.2q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2v.8q0 .825-.587 1.413T15 20H3q-.825 0-1.412-.587T1 18zM18.45 20q.275-.45.413-.962T19 18v-1q0-1.1-.612-2.113T16.65 13.15q1.275.15 2.4.513t2.1.887q.9.5 1.375 1.112T23 17v1q0 .825-.587 1.413T21 20zM9 12q-1.65 0-2.825-1.175T5 8q0-1.65 1.175-2.825T9 4q1.65 0 2.825 1.175T13 8q0 1.65-1.175 2.825T9 12m10-4q0 1.65-1.175 2.825T15 12q-.275 0-.7-.062t-.7-.138q.675-.8 1.038-1.775T15 8q0-1.05-.362-2.025T13.6 4.2q.35-.125.7-.162T15 4q1.65 0 2.825 1.175T19 8" />
                            </svg>
                        </div>
                        <h1 class="font-semibold text-slate-500">{{ $item->psikolog->dataPsikolog->session }} Sesi</h1>
                    </div>
                    <div class="flex gap-3">
                        <div class="text-icongreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4 22q-.825 0-1.412-.587T2 20V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm6-16h4V4h-4zm1 9v2q0 .425.288.713T12 18q.425 0 .713-.288T13 17v-2h2q.425 0 .713-.288T16 14q0-.425-.288-.712T15 13h-2v-2q0-.425-.288-.712T12 10q-.425 0-.712.288T11 11v2H9q-.425 0-.712.288T8 14q0 .425.288.713T9 15z" />
                            </svg>
                        </div>
                        <h1 class="font-semibold text-slate-500">{{ $item->psikolog->dataPsikolog->experience }} Tahun
                            Pengalaman</h1>
                    </div> 
                    @endrole

                    <a href="{{ route('landing-riwayat') }}"
                        class="py-2 mt-2 justify-center w-full flex gap-x-3 items-center rounded-lg bg-gradient-to-r from-primary to-secondary text-white font-bold hover:bg-gradient-to-l transition-all">Kembali</a>
                </div>
            </div>
        </div>
        @endforeach
        @if($konselings->count() >= 2)
        <a href="{{ route('landing-riwayat') }}" class="w-fit flex items-center shadow-lg rounded-md px-3 py-2 font-bold text-white h-10 bg-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M5.94 5.94a1.5 1.5 0 0 1 2.12 0l5 5a1.5 1.5 0 0 1 0 2.12l-5 5a1.5 1.5 0 0 1-2.12-2.12L9.878 12l-3.94-3.94a1.5 1.5 0 0 1 0-2.12Zm6 0a1.5 1.5 0 0 1 2.12 0l5 5a1.5 1.5 0 0 1 0 2.12l-5 5a1.5 1.5 0 0 1-2.12-2.12L15.878 12l-3.94-3.94a1.5 1.5 0 0 1 0-2.12Z"/></g></svg>
            More
        </a>
        @endif
        @endif
        @endauth
    </div>

    {{-- Tentang Kami Section--}}
    <div id="tentang_kami" class="bg-white w-full lg:px-16 pt-20 pb-36 flex flex-col gap-y-20 relative">
        <div class="absolute top-1 left-0">
            <img src="{{ asset('assets/images/dotgrid.svg') }}" alt="" srcset="" class="w-32">
        </div>
        <div class="w-fit font-axiforma m-auto text-center flex flex-col gap-4">
            <h1
                class="font-bold tracking-widest text-primary text-2xl before:content-['Ten'] before:bg-lightprimary before:pl-10 before:py-1">tang Kami</h1>
            <h1 class="text-4xl font-bold text-display">Kemudahan Dalam Layanan Kami</h1>
        </div>
        <div class="flex gap-12 lg:flex-row flex-col items-center">
            <div class="w-full lg:w-1/3 flex gap-5 items-center text-center flex-col">
                <div
                    class="text-icongreen bg-white rounded-full shadow-lg w-fit outline outline-[1px] outline-icongreen/30 px-6 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M3 23q-.425 0-.712-.288T2 22q0-.425.288-.712T3 21h18q.425 0 .713.288T22 22q0 .425-.288.713T21 23zm2-3q-.425 0-.712-.288T4 19v-5q-.825-1.35-1.275-2.863t-.45-3.087q0-1.525.388-3t.912-2.9q.2-.525.65-.837t1-.313Q6 1 6.55 1.525T7 2.775L6.725 5.05q-.15 1.2.213 2.275t1.087 1.887q.725.813 1.75 1.3T12 11q1.5 0 3.013.313t2.637.887q1.125.575 1.738 1.463T20 15.85V19q0 .425-.288.713T19 20h-9v-.925q0-.85.575-1.463T12 17h3q.425 0 .713-.288T16 16q0-.425-.288-.712T15 15h-3q-1.675 0-2.838 1.2T8 19.075V20zm7-10q-1.65 0-2.825-1.175T8 6q0-1.65 1.175-2.825T12 2q1.65 0 2.825 1.175T16 6q0 1.65-1.175 2.825T12 10" />
                    </svg>
                </div>
                <h2 class="text-primary text-2xl font-semibold">Aksesibilitas & Fleksibilitas</h2>
                <p class="text-slate-500 text-lg">Layanan online memberikan akses mahasiswa untuk mendapatkan
                    kesejahteraan tanpa terbatas oleh lokasi dan waktu</p>
            </div>
            <div class="w-full lg:w-1/3 flex gap-5 items-center text-center flex-col">
                <div
                    class="text-icongreen bg-white rounded-full shadow-lg w-fit outline outline-[1px] outline-icongreen/30 px-6 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V3q0-.425.288-.712T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.712T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zm7-6q-.425 0-.712-.288T11 13q0-.425.288-.712T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14m-4 0q-.425 0-.712-.288T7 13q0-.425.288-.712T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14m8 0q-.425 0-.712-.288T15 13q0-.425.288-.712T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14m-4 4q-.425 0-.712-.288T11 17q0-.425.288-.712T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18m-4 0q-.425 0-.712-.288T7 17q0-.425.288-.712T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18m8 0q-.425 0-.712-.288T15 17q0-.425.288-.712T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18" />
                    </svg>
                </div>
                <h2 class="text-primary text-2xl font-semibold">Kemudahan Booking</h2>
                <p class="text-slate-500 text-lg">Layanan ini memungkinkan untuk melakukan booking jadwal dan memilih
                    konselor
                    untuk melakukan konseling secara langsung
                </p>
            </div>
            <div class="w-full md:w-1/3 flex gap-5 items-center text-center flex-col">
                <div
                    class="text-icongreen bg-white rounded-full shadow-lg w-fit outline outline-[1px] outline-icongreen/30 px-6 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1q2.075 0 3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15q0-.825-.587-1.412T12 13q-.825 0-1.412.588T10 15q0 .825.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3q-1.25 0-2.125.875T9 6z" />
                    </svg>
                </div>
                <h2 class="text-primary text-2xl font-semibold">Kenyamanan & Privasi</h2>
                <p class="text-slate-500 text-lg">Layanan ini berkomitmen untuk menjaga kerahasiaan dan privasi
                    identitas mahasiswa
                    yang sedang menjalani sesi konseling
                </p>
            </div>
        </div>
        <div class="absolute -bottom-14 right-0">
            <img src="{{ asset('assets/images/dotgrid.svg') }}" alt="" srcset="" class="w-32">
        </div>
    </div>

    {{-- Layanan Konseling --}}
    <div id="konseling" class="py-20 lg:px-16 flex flex-col gap-y-20">
        <div class="w-fit font-axiforma m-auto text-center flex flex-col gap-4">
            <h1
                class="font-bold tracking-widest text-primary text-2xl before:content-['Laya'] before:bg-lightprimary before:pl-10 before:py-1">nan Konseling
            </h1>
            <h1 class="text-4xl font-bold text-display">Layanan Utama Kami Untuk Anda</h1>
        </div>
        <div class="flex gap-10 justify-center lg:flex-row flex-col items-center lg:items-stretch">
            <div class="md:w-[35%] w-full rounded-lg shadow-lg bg-white px-10 py-10 flex flex-col gap-7 items-center">
                <div>
                    <img src="{{ asset('assets/images/rafiki.svg') }}" alt="" srcset="">
                </div>
                <h1 class="text-primary font-bold text-3xl">Konseling Offline</h1>
                <div class="w-full flex justify-center">
                    <ul class="list-disc list-outside w-[90%] space-y-2">
                        <li>Terapi beragam sesuai kebutuhan anda</li>
                        <li>Lokasi konseling nyaman dan strategis</li>
                        <li>Booking jadwal dan pilih konselor dengan mudah sesuai preferensi anda</li>
                    </ul>
                </div>
                <a href=""
                    class="py-2 px-4 mt-5 flex gap-x-3 items-center rounded-lg bg-gradient-to-r from-primary to-secondary text-white w-fit font-bold hover:bg-gradient-to-l transition-all">Konseling
                    Offline</a>
            </div>
            <div class="md:w-[35%] w-full rounded-lg shadow-lg bg-white px-10 py-10 flex flex-col gap-7 items-center">
                <div>
                    <img src="{{ asset('assets/images/bro.svg') }}" alt="" srcset="">
                </div>
                <h1 class="text-primary font-bold text-3xl">Konseling Online</h1>
                <div class="w-full flex justify-center">
                    <ul class="list-disc list-outside w-[90%] space-y-2">
                        <li>Konseling melalui chat atau call</li>
                        <li>Pilihan terapi yang beragam</li>
                        <li>Waktu konseling lebih fleksibel</li>
                        <li>Cocok bagi yang terkendala jarak dan waktu</li>
                    </ul>
                </div>
                <a href=""
                    class="py-2 px-4 mt-5 flex gap-x-3 items-center rounded-lg bg-gradient-to-r from-primary to-secondary text-white w-fit font-bold hover:bg-gradient-to-l transition-all">Konseling
                    Online</a>
            </div>
        </div>
    </div>

    {{-- Cari Psikolog --}}
    <div class="bg-white w-full lg:px-16 pt-20 flex flex-col">
        <div class="w-fit m-auto text-center flex flex-col gap-4">
            <h1
                class="font-bold tracking-widest text-primary text-2xl before:content-['C'] before:bg-lightprimary before:pl-10 before:py-1">ari Psikolog
            </h1>
            <h1 class="text-4xl font-bold text-display">Rekomendasi Psikolog</h1>
        </div>
        <div class="flex lg:flex-row flex-col items-center lg:items-stretch justify-center gap-7 mt-14">
            @foreach ($psikologs as $psi)
            <div class="lg:w-[30%] rounded-lg shadow-lg bg-white px-10 py-10 flex flex-col gap-7 items-center">
                <div>
                    <img src="{{ $psi->photo ? asset('assets/images/psikolog/'. $psi?->photo) : 'https://ui-avatars.com/api/?background=5271FF&color=fff&name='.$psi?->name }}" alt="" srcset=""
                        class="rounded-full w-44 h-44 object-cover">
                </div>
                <div class="flex flex-col gap-5 w-full text-center px-6">
                    <h1 class="text-primary font-bold text-2xl">{{ $psi->name }} {{ $psi->degree }}, Psikolog</h1>
                    <div class="flex gap-3">
                        <div class="text-icongreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M1 17.2q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2v.8q0 .825-.587 1.413T15 20H3q-.825 0-1.412-.587T1 18zM18.45 20q.275-.45.413-.962T19 18v-1q0-1.1-.612-2.113T16.65 13.15q1.275.15 2.4.513t2.1.887q.9.5 1.375 1.112T23 17v1q0 .825-.587 1.413T21 20zM9 12q-1.65 0-2.825-1.175T5 8q0-1.65 1.175-2.825T9 4q1.65 0 2.825 1.175T13 8q0 1.65-1.175 2.825T9 12m10-4q0 1.65-1.175 2.825T15 12q-.275 0-.7-.062t-.7-.138q.675-.8 1.038-1.775T15 8q0-1.05-.362-2.025T13.6 4.2q.35-.125.7-.162T15 4q1.65 0 2.825 1.175T19 8" />
                            </svg>
                        </div>
                        <h1 class="font-semibold text-slate-500 text-lg">{{ $psi->session }} Sesi</h1>
                    </div>
                    <div class="flex gap-3">
                        <div class="text-icongreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4 22q-.825 0-1.412-.587T2 20V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm6-16h4V4h-4zm1 9v2q0 .425.288.713T12 18q.425 0 .713-.288T13 17v-2h2q.425 0 .713-.288T16 14q0-.425-.288-.712T15 13h-2v-2q0-.425-.288-.712T12 10q-.425 0-.712.288T11 11v2H9q-.425 0-.712.288T8 14q0 .425.288.713T9 15z" />
                            </svg>
                        </div>
                        <h1 class="font-semibold text-slate-500 text-lg text-left">{{ $psi->experience }} Tahun Pengalaman</h1>
                    </div>

                </div>
                <div class="flex gap-4 w-full mt-6">
                    @if($psi->status == 0)
                        <div class="py-2 mt-2 justify-center w-fit px-5 flex gap-x-3 items-center rounded-lg bg-slate-700 text-white font-bold hover:bg-gradient-to-l transition-all">Sibuk</div>
                    @else
                        <div class="py-2 mt-2 justify-center w-fit px-5 flex gap-x-3 items-center rounded-lg bg-primary/90 text-white font-bold hover:bg-gradient-to-l transition-all">Ada</div>
                    @endif
                    <a href="{{ $psi->status == 0 ? 'javascript:void(0)' : route('booking', $psi->id) }}" 
                        class="py-2 mt-2 justify-center w-full flex gap-x-3 items-center 
                        rounded-lg {{ $psi->status == 0 ? 'bg-slate-700' : 'bg-icongreen' }} text-white 
                        font-bold hover:bg-gradient-to-l transition-all">
                        Booking
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="py-14 flex flex-col gap-14">
            <a href="{{ route('landing-psikolog') }}"
                class="py-3 px-4 mt-2 justify-center w-fit m-auto flex gap-x-3 items-center rounded-lg bg-gradient-to-r from-primary to-secondary text-white font-bold hover:bg-gradient-to-l transition-all">Lihat
                Semua Psikolog</a>
            <div class="w-[50%] m-auto h-1 bg-lightprimary"></div>
        </div>
    </div>



</x-guest-layout>