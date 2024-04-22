<th scope="col" class="px-4 py-3" wire:click="setSortBy('{{ $column }}')">
    <button class="uppercase flex gap-1 items-center">
     {{ $columnLabel }}
     @if ($sortDirection === 'desc' && $sortBy === $column)
     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9.825L8.1 12.7q-.275.275-.688.288T6.7 12.7q-.275-.275-.275-.7t.275-.7l4.6-4.6q.3-.3.7-.3t.7.3l4.6 4.6q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275L13 9.825V17q0 .425-.288.713T12 18q-.425 0-.713-.288T11 17V9.825Z"/></svg>
     @elseif($sortDirection === 'asc' && $sortBy === $column)
     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M11 14.175V7q0-.425.288-.713T12 6q.425 0 .713.288T13 7v7.175l2.9-2.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.3.3-.7.3t-.7-.3l-4.6-4.6q-.275-.275-.288-.687T6.7 11.3q.275-.275.7-.275t.7.275l2.9 2.875Z"/></svg>
     @else
     @endif
    </button>
    
 </th>