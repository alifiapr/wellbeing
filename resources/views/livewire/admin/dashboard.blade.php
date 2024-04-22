<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="grid lg:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div class="p-6 flex flex-col gap-5">
                        <h1 class="text-gray-900 dark:text-gray-100 font-black">Active Client</h1>
                        <h1 class="text-primary text-5xl font-black">{{ $active_clients }}</h1>
                    </div>
                    <span class="absolute text-black/5 dark:text-white/5 top-0 -right-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M12 12c1.873 0 3.57.62 4.815 1.487c1.183.825 2.185 2.051 2.185 3.37c0 .724-.309 1.324-.796 1.77c-.458.421-1.056.694-1.672.88C15.301 19.88 13.68 20 12 20c-1.68 0-3.301-.12-4.532-.493c-.616-.186-1.214-.459-1.673-.88C5.31 18.182 5 17.582 5 16.858c0-1.319 1.002-2.545 2.185-3.37C8.43 12.62 10.127 12 12 12m0 2c-1.44 0-2.743.48-3.67 1.127c-.989.69-1.33 1.392-1.33 1.73c0 .304.352.494.672.614l.205.07l.17.052c.94.284 2.32.407 3.953.407c1.508 0 2.799-.105 3.728-.344l.304-.087l.19-.06c.343-.117.778-.314.778-.652s-.341-1.04-1.33-1.73C14.744 14.481 13.44 14 12 14m7-1c1.044 0 1.992.345 2.693.833c.64.447 1.307 1.19 1.307 2.096c0 1.335-1.297 1.813-2.463 1.98l-.3.037l-.289.025a9.535 9.535 0 0 1-.138.008c.122-.345.19-.72.19-1.122a3.78 3.78 0 0 0-.107-.888c.386-.03.703-.08.939-.151c.104-.032.01-.13-.1-.215l-.107-.078l-.076-.051a2.698 2.698 0 0 0-.995-.418c-.38-.76-.964-1.418-1.586-1.943A4.78 4.78 0 0 1 19 13M5 13c.357 0 .703.04 1.032.113c-.622.525-1.206 1.183-1.586 1.943a2.701 2.701 0 0 0-.995.418l-.128.088c-.127.092-.276.22-.155.256c.236.071.553.122.94.151a3.73 3.73 0 0 0-.108.888c0 .402.068.777.19 1.122l-.28-.02l-.296-.03c-1.202-.147-2.614-.607-2.614-2c0-.905.666-1.649 1.307-2.096A4.756 4.756 0 0 1 5 13m13.5-6a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5m-13 0a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5M12 3a4 4 0 1 1 0 8a4 4 0 0 1 0-8m6.5 6a.5.5 0 1 0 0 1a.5.5 0 0 0 0-1m-13 0a.5.5 0 1 0 0 1a.5.5 0 0 0 0-1M12 5a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                            </g>
                        </svg>
                    </span>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div class="p-6 flex flex-col gap-5">
                        <h1 class="text-gray-900 dark:text-gray-100 font-black">Active Psikolog</h1>
                        <h1 class="text-primary text-5xl font-black">{{ $active_psikologs }}</h1>
                    </div>
                    <span class="absolute text-black/5 dark:text-white/5 top-0 -right-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M8 4a1 1 0 0 0-2 0a3 3 0 0 0-3 3v2a6.002 6.002 0 0 0 5 5.917V15a6 6 0 0 0 12 0v-1.17a3.001 3.001 0 1 0-2 0V15a4 4 0 0 1-8 0v-.083A6.002 6.002 0 0 0 15 9V7a3 3 0 0 0-3-3a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0a1 1 0 0 1 1 1v2a4 4 0 0 1-8 0V7a1 1 0 0 1 1-1a1 1 0 0 0 2 0zm11 8a1 1 0 1 0 0-2a1 1 0 0 0 0 2" />
                            </g>
                        </svg>
                    </span>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div class="p-6 flex flex-col gap-5">
                        <h1 class="text-gray-900 dark:text-gray-100 font-black">Online Konseling</h1>
                        <h1 class="text-primary text-5xl font-black">{{ $online_konseling }}</h1>
                    </div>
                    <span class="absolute text-black/5 dark:text-white/5 top-0 -right-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m1.482 14.94a18.214 18.214 0 0 1-2.964 0c.093.397.197.765.31 1.102c.251.755.53 1.293.79 1.622c.127.162.23.248.3.29l.051.028l.03.008l.032-.008l.051-.027a1.21 1.21 0 0 0 .3-.29c.26-.33.539-.868.79-1.623c.113-.337.217-.705.31-1.102m-8.675-1.435a8.026 8.026 0 0 0 4.441 4.01a10.52 10.52 0 0 1-.318-.84a15.818 15.818 0 0 1-.52-2.033a17.87 17.87 0 0 1-3.603-1.137m14.387 0c-1.145.5-2.351.883-3.605 1.137a15.63 15.63 0 0 1-.52 2.034c-.096.29-.202.572-.318.838a8.027 8.027 0 0 0 4.443-4.01Zm-5.218-4.634a15.119 15.119 0 0 1-3.952 0a26.02 26.02 0 0 0 .141 4.025a16.195 16.195 0 0 0 3.67 0A25.04 25.04 0 0 0 14 12c0-.384-.008-.76-.024-1.13ZM4.568 9.032a7.978 7.978 0 0 0-.52 3.856a15.893 15.893 0 0 0 4.067 1.637a27.889 27.889 0 0 1-.074-4.053a14.915 14.915 0 0 1-3.473-1.44m14.864 0a14.916 14.916 0 0 1-3.473 1.44a27.879 27.879 0 0 1-.074 4.053a15.892 15.892 0 0 0 4.066-1.637a7.978 7.978 0 0 0-.52-3.855Zm-7.416-5.02l-.011-.002l-.02.003l-.038.015a1.233 1.233 0 0 0-.33.307c-.26.33-.538.868-.79 1.622c-.27.808-.488 1.8-.633 2.919a13.123 13.123 0 0 0 3.612 0c-.145-1.12-.364-2.111-.633-2.919c-.252-.754-.53-1.293-.79-1.622a1.233 1.233 0 0 0-.3-.29l-.067-.032Zm-2.768.474a8.022 8.022 0 0 0-3.71 2.797c.843.484 1.746.876 2.695 1.163c.16-1.164.397-2.223.697-3.122c.097-.291.203-.572.318-.838m5.504 0c.115.266.22.547.318.838c.3.9.537 1.958.697 3.122a12.927 12.927 0 0 0 2.695-1.163a8.021 8.021 0 0 0-3.71-2.797" />
                            </g>
                        </svg>
                    </span>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div class="p-6 flex flex-col gap-5">
                        <h1 class="text-gray-900 dark:text-gray-100 font-black">Offline Konseling</h1>
                        <h1 class="text-primary text-5xl font-black">{{ $offline_konseling }}</h1>
                    </div>
                    <span class="absolute text-black/5 dark:text-white/5 top-0 -right-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M10 3a5 5 0 0 0-5 5v1.17A3.001 3.001 0 0 0 3 12v5a2 2 0 0 0 2 2v1a1 1 0 1 0 2 0v-1h10v1a1 1 0 1 0 2 0v-1a2 2 0 0 0 2-2v-5a3.001 3.001 0 0 0-2-2.83V8a5 5 0 0 0-5-5zm7 6.17V8a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3v1.17c1.165.413 2 1.524 2 2.83v1h6v-1c0-1.306.835-2.417 2-2.83M5 12a1 1 0 1 1 2 0v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-2a1 1 0 1 1 2 0v5H5z" />
                            </g>
                        </svg>
                    </span>
                </div>

            </div>

        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="grid lg:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div class="p-6">
                        <h1 class="text-gray-900 dark:text-gray-100 font-black">Latest Konseling</h1>
                        <div class="flex flex-col gap-4 mt-5">
                            @foreach ($latest_konseling as $kon)
                            <div class="flex justify-between items-center">
                                <div>
                                    <h1 class="text-primary font-black">{{ $kon->client?->name }}</h1>
                                    <p class="text-gray-500">{{ $kon->psikolog?->dataPsikolog?->name }} {{ $kon->psikolog?->dataPsikolog?->degree }}</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="px-3 py-1 rounded-md bg-primary text-white text-xs">
                                        @if ($kon->category == 1)
                                            Online
                                        @else
                                            Offline
                                        @endif
                                    </span>
                                    <span class="px-3 py-1 rounded-md bg-orange-500 text-white text-xs">
                                        @if ($kon->berlangsung == 1)
                                            Aktif
                                        @else
                                            Selesai
                                        @endif
                                    </span>
                                    @if($kon->category != 1)
                                    <span class="px-3 py-1 rounded-md bg-icongreen text-white text-xs">
                                        {{ \Carbon\Carbon::parse($kon->date)->format('D-M-Y') }}
                                        {{ \Carbon\Carbon::parse($kon->time)->format('H:i') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div class="p-6">
                        <h1 class="text-gray-900 dark:text-gray-100 font-black">Finished Konseling</h1>
                        <div class="flex flex-col gap-4 mt-5">
                            @foreach ($finished_konseling as $kon)
                            <div class="flex justify-between items-center">
                                <div>
                                    <h1 class="text-primary font-black">{{ $kon->client?->name }}</h1>
                                    <p class="text-gray-500">{{ $kon->psikolog?->dataPsikolog?->name }} {{ $kon->psikolog?->dataPsikolog?->degree }}</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="px-3 py-1 rounded-md bg-primary text-white text-xs">
                                        @if ($kon->category == 1)
                                            Online
                                        @else
                                            Offline
                                        @endif
                                    </span>
                                    <span class="px-3 py-1 rounded-md bg-orange-500 text-white text-xs">
                                        @if ($kon->berlangsung == 1)
                                            Aktif
                                        @else
                                            Selesai
                                        @endif
                                    </span>
                                    @if($kon->category != 1)
                                    <span class="px-3 py-1 rounded-md bg-icongreen text-white text-xs">
                                        {{ \Carbon\Carbon::parse($kon->date)->format('D-M-Y') }}
                                        {{ \Carbon\Carbon::parse($kon->time)->format('H:i') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>