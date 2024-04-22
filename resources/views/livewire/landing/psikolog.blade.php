<div>
     {{-- Banner --}}
     <div class="flex lg:flex-row flex-col justify-between relative  m-auto lg:w-[80%] lg:h-[28rem] bg-gradient-to-r from-secondary/50 to-primary md:rounded-xl lg:my-10">
        <img src="{{ asset('assets/images/plus.svg') }}" alt="" class="absolute top-4 right-4">
        <div class="text-primary lg:flex items-center justify-center bg-white p-5 rounded-full w-fit h-fit
            absolute top-[11rem] left-[35rem] hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M16.125 3q2.5 0 4.188 1.85T22 9.25q0 .45-.05.888t-.175.862h-6.25l-1.7-2.55q-.125-.2-.35-.325T13 8q-.325 0-.587.2t-.363.5l-1.35 4.05l-.875-1.3q-.125-.2-.35-.325T9 11H2.225q-.125-.425-.175-.862T2 9.275Q2 6.7 3.675 4.85T7.85 3q1.2 0 2.263.475T12 4.8q.8-.85 1.863-1.325T16.125 3M12 21q-.45 0-.862-.162t-.738-.488l-6.7-6.725q-.15-.15-.275-.3T3.175 13H8.45l1.7 2.55q.125.2.35.325t.475.125q.325 0 .6-.2t.375-.5l1.35-4.05l.85 1.3q.15.2.375.325T15 13h5.8l-.25.3l-.25.3l-6.725 6.75q-.325.325-.725.488T12 21"/></svg>
        </div>
        <div class="w-full lg:w-1/2 lg:pl-16 lg:px-0 px-5 lg:py-0 md:py-32 py-20 text-center flex flex-col gap-2 justify-center">
            <h1 class="text-2xl lg:text-5xl text-darkprimary font-black lg:leading-snug">
                Cari Psikolog Terbaik Sesuai Pilihanmu!
            </h1>
            <p class="text-darkprimary lg:leading-loose font-medium text-base lg:text-lg">Membantu menemukan psikolog yang sesuai dengan kebutuhanmu</p>
        </div>
        <div class="lg:flex lg:w-1/2 relative justify-center items-end hidden">
            <img src="{{ asset('assets/images/doc-white.png') }}" alt="" class="left-10 object-cover h-[84%] lg:absolute">
            <img src="{{ asset('assets/images/doc-black.png') }}" alt="" class="object-cover h-[84%] z-10 lg:absolute">
            <img src="{{ asset('assets/images/doc-pink.png') }}" alt="" class="right-5 object-cover h-[84%] lg:absolute">
        </div>
        <img src="{{ asset('assets/images/plus.svg') }}" alt="" class="absolute bottom-4 left-4">
    </div>

    {{-- Search bar --}}
    <div class="my-10 lg:my-0">
        <div class="border border-primary relative mb-11 rounded-xl overflow-hidden w-[70%] m-auto py-2 px-4 bg-white">
            <input autocomplete="off" type="text" wire:model.lazy="search" placeholder="Cari psikolog" name="search" id="" class="outline-none border-none w-full h-full focus:outline-none focus:ring-0">
            <button class="absolute top-3 right-5 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path d="M0 0h24v24H0z"/><path fill="currentColor" d="M10.5 2a8.5 8.5 0 0 1 6.676 13.762l3.652 3.652a1 1 0 0 1-1.414 1.414l-3.652-3.652A8.5 8.5 0 1 1 10.5 2m0 2a6.5 6.5 0 1 0 0 13a6.5 6.5 0 0 0 0-13m0 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11"/></g></svg>
            </button>
        </div>
    </div>

    <div class="w-fit font-axiforma m-auto text-center flex flex-col gap-4 my-20">
        <h1 class="font-bold tracking-widest text-primary text-2xl before:content-['C'] before:bg-lightprimary before:pl-10 before:py-1">ari Psikolog
        </h1>
        <h1 class="text-4xl font-bold text-display">Rekomendasi Psikolog</h1>
    </div>

    {{-- Psikolog --}}
    <div class="flex lg:flex-row flex-col flex-wrap items-center lg:items-stretch justify-center gap-7 mt-14">
        @foreach($results as $item)
        <div class="md:w-[30%] rounded-lg shadow-lg bg-white px-10 py-10 flex flex-col gap-7 items-center">
            <div class="relative">
                <img src="{{ asset('assets/images/psikolog') }}/{{ $item->photo }}" alt="" srcset="" class="rounded-full w-44 h-44 object-cover">
                
            </div>
            <div class="flex flex-col gap-3 w-full text-center px-6">
                <h1 class="text-primary font-bold text-2xl">{{ $item->name }} {{ $item->degree }}, Psikolog</h1>
                <div class="flex gap-3">
                    <div class="text-icongreen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M1 17.2q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2v.8q0 .825-.587 1.413T15 20H3q-.825 0-1.412-.587T1 18zM18.45 20q.275-.45.413-.962T19 18v-1q0-1.1-.612-2.113T16.65 13.15q1.275.15 2.4.513t2.1.887q.9.5 1.375 1.112T23 17v1q0 .825-.587 1.413T21 20zM9 12q-1.65 0-2.825-1.175T5 8q0-1.65 1.175-2.825T9 4q1.65 0 2.825 1.175T13 8q0 1.65-1.175 2.825T9 12m10-4q0 1.65-1.175 2.825T15 12q-.275 0-.7-.062t-.7-.138q.675-.8 1.038-1.775T15 8q0-1.05-.362-2.025T13.6 4.2q.35-.125.7-.162T15 4q1.65 0 2.825 1.175T19 8"/></svg>
                    </div>
                    <h1 class="font-semibold text-slate-500 text-lg">{{ $item->session }} sesi</h1>
                </div>
                <div class="flex gap-3">
                    <div class="text-icongreen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M4 22q-.825 0-1.412-.587T2 20V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm6-16h4V4h-4zm1 9v2q0 .425.288.713T12 18q.425 0 .713-.288T13 17v-2h2q.425 0 .713-.288T16 14q0-.425-.288-.712T15 13h-2v-2q0-.425-.288-.712T12 10q-.425 0-.712.288T11 11v2H9q-.425 0-.712.288T8 14q0 .425.288.713T9 15z"/></svg>
                    </div>
                    <h1 class="font-semibold text-slate-500 text-lg">{{ $item->experience }} Tahun Pengalaman</h1>
                </div>
                
               
            </div>
            <div class="flex gap-4 w-full mt-6">
                @if($item->status == 0)
                    <div class="py-2 mt-2 justify-center w-fit px-5 flex gap-x-3 items-center rounded-lg bg-slate-700 text-white font-bold hover:bg-gradient-to-l transition-all">Sibuk</div>
                @else
                    <div class="py-2 mt-2 justify-center w-fit px-5 flex gap-x-3 items-center rounded-lg bg-primary/90 text-white font-bold hover:bg-gradient-to-l transition-all">Ada</div>
                @endif

                <a href="{{ $item->status == 0 ? 'javascript:void(0)' : route('booking', $item->id) }}" 
                    class="py-2 mt-2 justify-center w-full flex gap-x-3 items-center 
                    rounded-lg {{ $item->status == 0 ? 'bg-slate-700' : 'bg-icongreen' }} text-white 
                    font-bold hover:bg-gradient-to-l transition-all">
                    Booking
                </a>
            </div>
        </div>
        @endforeach

    </div>

    <div class="py-20 flex flex-col gap-14">
            
        <div class="w-[50%] m-auto h-1 bg-lightprimary"></div>
    </div>
</div>
