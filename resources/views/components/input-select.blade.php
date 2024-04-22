<div>
    <div class="relative mt-2" x-data="{isOpen: false, selected: {
        id: 99,
        name: 'Pilih Kelamin',
    
    }, data: [
        {id: 1, name: 'Laki-laki'},
        {id: 2, name: 'Perampuan'},
    ]}">
        <input type="text" class="hidden" x-bind:name="selected.name">
        <button type="button" @click.prevent="isOpen = !isOpen"
            class="relative w-full cursor-default rounded-xl bg-white py-4 pl-3 pr-10 text-left text-gray-900 border border-primary"
            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
            <span class="flex items-center">
                <span class="ml-3 block truncate" x-text="selected.name"></span>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <ul x-show="isOpen" x-transition:enter="transition ease-in duration-100" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
            <template x-for="(item, i) in data" :key="i">
                <li x-on:click="selected = item"
                    x-bind:class="selected.id === item.id ? 'bg-indigo-600 text-white' : 'text-gray-900'"
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
</div>