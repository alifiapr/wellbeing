<div x-data="{type:'all', query: '{{ $query }}'}" x-init="
    setTimeout(() => {
        convElement = document.getElementById('conversation-'+query);

        convElement.scrollIntoView({
            behavior: 'smooth',
            block: 'center',
            inline: 'center',
        });
    }, 200)

    Echo.private('users.{{ auth()->id() }}')
        .notification((notification) => {
            if(notification['type'] === 'App\\Notifications\\MessageRead' || notification['type'] === 'App\\Notifications\\MessageSent'){
                $wire.dispatch('refresh');        
            }
        })

 " class="flex flex-col transition-all h-full overflow-hidden">
    <header class="px-3 z-10 bg-white sticky top-0 w-full py-2">
        <div class="border-b justify-between flex items-center pb-2">
            <div class="flex items-center gap-2">
                <h5 class="font-extrabold text-2xl">Chats</h5>
            </div>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10 18v-2h4v2zm-4-5v-2h12v2zM3 8V6h18v2z" />
                </svg>
            </button>
        </div>

        {{-- Filter --}}

        <div class="flex gap-3 items-center overflow-x-scroll p-2 bg-white">
            <button @click.prevent="type = 'all'" :class="{'bg-primary text-white': type == 'all'}"
                class="inline-flex justify-center items-center rounded-full gap-x-3 text-xs font-medium px-3 lg:px-5 py-1 lg:py-2.5 border">
                All
            </button>
            <button @click.prevent="type = 'deleted'" :class="{'bg-primary text-white': type == 'deleted'}"
                class="inline-flex justify-center items-center rounded-full gap-x-3 text-xs font-medium px-3 lg:px-5 py-1 lg:py-2.5 border">
                Deleted
            </button>
        </div>

    </header>
    <main class="overflow-y-scroll overflow-hidden grow h-full relative" style="contain:content">
        {{-- Chatlist --}}

        <ul class="p-2 grid w-full space-y-2">
            @forelse ($conversations as $conv)
            <li id="conversation-{{ $conv->id }}" wire:key="{{ $conv->id }}" class="py-3 hover:bg-gray-50 rounded-2xl dark:hover:bg-gray-700/70 transition-colors duration-150 flex gap-4 relative w-full cursor-pointer px-2
                {{ $conv->id ==  $selected_conversation?->id ? 'bg-gray-100/70 dark:bg-gray-700/70' : '' }}}
            ">
                <a href="#" class="shrink-0">
                    @role('client')
                    <x-avatar
                        src="{{ $conv->getReceiver()->dataPsikolog ? asset('assets/images/psikolog/'. $conv->getReceiver()->dataPsikolog?->photo) : 'https://ui-avatars.com/api/?background=5271FF&color=fff&name='.$conv->getReceiver()->dataPsikolog?->name }}" />
                    @endrole
                    @role('psikolog')
                    <x-avatar
                        src="https://ui-avatars.com/api/?background=5271FF&color=fff&name={{ $conv->getReceiver()?->name }}" />
                    @endrole
                    
                </a>

                <aside class="grid grid-cols-12 w-full">
                    <a href="{{ route('chat', $conv->id) }}"
                        class="col-span-11 border-b pb-2 border-gray-200 relative overflow-hidden truncate leading-5 w-full flex-nowrap p-1">
                        {{-- Name and Date --}}
                        <div class="flex justify-between w-full items-center">
                            <h6 class="truncate font-medium tracking-wider text-gray-900">
                                {{ $conv->getReceiver()->name }}
                            </h6>
                            <small class="text-gray-700">
                                {{ $conv->messages?->last()?->created_at?->shortAbsoluteDiffForHumans() }}
                            </small>
                        </div>
                        {{-- Message --}}
                        <div class="flex gap-x-2 items-center">

                            @if ($conv->messages?->last()?->sender_id == auth()->id())

                            @if ($conv->isLastMessageReadByUser())
                            {{-- Double tick --}}
                            <span class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m6 17.3l-4.25-4.25q-.3-.3-.288-.7t.313-.7q.3-.275.7-.288t.7.288l3.55 3.55l1.4 1.4l-.725.7q-.3.275-.7.288T6 17.3m5.65 0L7.4 13.05q-.275-.275-.275-.687t.275-.713q.3-.3.713-.3t.712.3l3.525 3.525l8.5-8.5q.3-.3.7-.287t.7.312q.275.3.288.7t-.288.7l-9.2 9.2q-.3.3-.7.3t-.7-.3m.7-4.95l-1.425-1.4l4.25-4.25q.275-.275.688-.275t.712.275q.3.3.3.713t-.3.712z" />
                                </svg>

                            </span class="text-gray-500">
                            @else
                            {{-- Single tick --}}
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m9.55 15.15l8.475-8.475q.3-.3.713-.3t.712.3q.3.3.3.713t-.3.712l-9.2 9.2q-.3.3-.7.3t-.7-.3L4.55 13q-.3-.3-.288-.712t.313-.713q.3-.3.713-.3t.712.3z" />
                                </svg>
                            </span>
                            @endif

                            @endif

                            <p class="grow truncate text-sm font-[100]">
                                {{ $conv->messages?->last()?->body ?? '' }}
                            </p>
                            {{-- Unread count --}}
                            @if ($conv->unreadMessagesCount() > 0)
                            @if ($conv->unreadMessagesCount() > 9)
                            <span class="font-bold px-2 text-xs shrin-0 rounded-full bg-primary text-white">
                                9+
                            </span>
                            @else
                            <span class="font-bold px-2 text-xs shrin-0 rounded-full bg-primary text-white">
                                {{ $conv->unreadMessagesCount() }}
                            </span>
                            @endif

                            @endif
                        </div>
                    </a>

                    {{-- Dropdown --}}
                    <div class="col-span-1 flex flex-col text-center my-auto">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-full">
                                    <button
                                        class="items-center gap-3 flex w-full px-4 py-2 text-left text-sm leading-5 text-gray-500  hover:bg-gray-100 transition-all duration-150 ease-in-out focus:outline-none focus:bg-gray-100">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22" />
                                            </svg>
                                        </span>
                                        View Profile
                                    </button>
                                    <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click="deleteByUser('{{ encrypt($conv->id) }}')"
                                        class="items-center gap-3 flex w-full px-4 py-2 text-left text-sm leading-5 text-gray-500  hover:bg-gray-100 transition-all duration-150 ease-in-out focus:outline-none focus:bg-gray-100">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z" />
                                            </svg>
                                        </span>
                                        Delete
                                    </button>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </aside>
            </li>
            @empty

            @endforelse

        </ul>
    </main>
</div>