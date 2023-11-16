<nav class="hidden md:flex items-center justify-between text-sm text-gray-400 ">
    <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-2.5 space-x-10">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="pb-3 @if ($status=='All') border-b-4 border-blue-400 text-gray-900 @endif" >All Ideas(187)</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#"
                class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='Considering') border-b-4  border-blue-400 text-gray-900 @endif">Considering(6)</a>
        </li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#"
                class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='In Progress') border-b-4  border-blue-400 text-gray-900 @endif">InProgress(1)</a>
        </li>

    </ul>
    <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-2.5 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#"
             class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='Implemented') border-b-4  border-blue-400 text-gray-900 @endif">Implmented(10)</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#"
                class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='Closed') border-b-4  border-blue-400 text-gray-900 @endif">Closed(55)</a>
        </li>

    </ul>
</nav>