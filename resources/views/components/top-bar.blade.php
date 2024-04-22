<nav class="bg-white dark:bg-gray-800" x-data="{ open: false }"
    x-init="$watch('window.innerWidth', value => { open = value < 600 })">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" @click.prevent="open = !open"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-primary hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" :class="{'hidden': open}" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg class="hidden h-6 w-6" :class="{'hidden': !open}" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-between">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-10 w-auto" src="{{ asset('assets/images/logo.png') }}" alt="Your Company">
                    <span class="uppercase font-bold text-primary font-axiforma">unnes wellbeing</span>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-2 lg:space-x-6 items-center">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('landing') }}" @class(['rounded-md px-3 py-2
                            text-sm', 'text-primary font-bold'=> request()->routeIs('landing'), 'text-slate-800
                            hover:text-primary dark:text-white' => !request()->routeIs('landing')])
                            aria-current="page">Beranda</a>

                        <a href="{{ route('landing') }}#tentang_kami" @class(['rounded-md px-3 py-2
                            text-sm', 'text-primary font-bold'=> request()->routeIs('landing-tentang'), 'text-slate-800
                            hover:text-primary dark:text-white' => !request()->routeIs('landing-tentang')])>Tentang
                            Kami</a>

                        <a href="{{ route('landing') }}#konseling" @class(['rounded-md px-3 py-2
                            text-sm', 'text-primary font-bold'=> request()->routeIs('landing-konseling'),
                            'text-slate-800 hover:text-primary dark:text-white' =>
                            !request()->routeIs('landing-konseling')])>Konseling</a>

                        <a href="{{ route('landing-psikolog') }}" @class(['rounded-md px-3 py-2
                            text-sm', 'text-primary font-bold'=> request()->routeIs('landing-psikolog'), 'text-slate-800
                            hover:text-primary dark:text-white' => !request()->routeIs('landing-psikolog')])>Cari
                            Psikolog</a>
                            
                        <a href="{{ route('landing-riwayat') }}" @class(['rounded-md px-3 py-2
                            text-sm', 'text-primary font-bold'=> request()->routeIs('landing-riwayat'), 'text-slate-800
                            hover:text-primary dark:text-white' => !request()->routeIs('landing-riwayat')])>Riwayat</a>
                
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @auth
                {{-- <button type="button"
                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button> --}}

                <!-- Profile dropdown -->
                <div class="relative ml-3" x-data="{isOpen: false}">
                    <div>
                        <button @click.prevent="isOpen = !isOpen" type="button"
                            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none ring-2 ring-primary ring-offset-2 ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                src="{{ auth()->user()->dataPsikolog?->photo ? asset('assets/images/psikolog/'. auth()->user()->dataPsikolog?->photo) : 'https://ui-avatars.com/api/?background=5271FF&color=fff&name='. auth()->user()->name}}"
                                alt="">
                            @role('psikolog')
                            <span class="px-1 py-0.5 rounded bg-primary text-white text-xs absolute bottom-0 -right-3">Psi</span>
                            @endrole
                        </button>
                    </div>

                    <div x-cloak x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Your Profile</a> --}}
                        @role('admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Dashboard</a>
                        @endrole
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button onclick="event.preventDefault();
                                this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>

                        </form>
                    </div>
                </div>
                @endauth

                @guest
                <a href="/login"
                    class="relative px-6 py-2 bg-gradient-to-r from-primary to-secondary text-white font-medium rounded-md">
                    Login
                </a>
                @endguest

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('landing') }}" @class(['block rounded-md px-3 py-2 text-base
                font-medium', 'text-primary font-bold'=> request()->routeIs('landing'), 'text-slate-800
                hover:text-primary dark:text-white' => !request()->routeIs('landing')])
                aria-current="page">Beranda</a>
            <a href="{{ route('landing') }}#tentang_kami" @class(['block rounded-md px-3 py-2 text-base
                font-medium', 'text-primary font-bold'=> request()->routeIs('landing-tentang'), 'text-slate-800
                hover:text-primary dark:text-white' => !request()->routeIs('landing-tentang')])
                aria-current="page">Tentang Kami</a>
            <a href="{{ route('landing') }}#konseling" @class(['block rounded-md px-3 py-2 text-base
                font-medium', 'text-primary font-bold'=> request()->routeIs('landing-konseling'), 'text-slate-800
                hover:text-primary dark:text-white' => !request()->routeIs('landing-konseling')])
                aria-current="page">Konseling</a>
            <a href="{{ route('landing-psikolog') }}" @class(['block rounded-md px-3 py-2 text-base
                font-medium', 'text-primary font-bold'=> request()->routeIs('landing-psikolog'), 'text-slate-800
                hover:text-primary dark:text-white' => !request()->routeIs('landing-psikolog')])
                aria-current="page">Cari Psikolog</a>
            <a href="{{ route('landing-riwayat') }}" @class(['block rounded-md px-3 py-2 text-base
                font-medium', 'text-primary font-bold'=> request()->routeIs('landing-riwayat'), 'text-slate-800
                hover:text-primary dark:text-white' => !request()->routeIs('landing-riwayat')])
                aria-current="page">Riwayat</a>
            

        </div>
    </div>
</nav>