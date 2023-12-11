<nav class="hidden md:flex items-center justify-between text-sm text-gray-400 ">
    <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-2.5 space-x-10">
        <li><a wire:click.prevent="setStatus('All')" href="{{ route('idea.index',['status'=> "All"]) }}" class="pb-3 @if ($status=='All') border-b-4 border-blue-400 text-gray-900 @endif" >All Ideas({{ $statusCount['all_statuses'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="{{ route('idea.index',['status'=> "Considering"]) }}"
                class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='Considering') border-b-4  border-blue-400 text-gray-900 @endif">Considering({{ $statusCount['considering'] }})</a>
        </li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="{{ route('idea.index',['status'=> "In Progress"]) }}"
                class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='In Progress') border-b-4  border-blue-400 text-gray-900 @endif">In Progress({{ $statusCount['in_progress'] }})</a>
        </li>

    </ul>
    <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-2.5 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="{{ route('idea.index',['status'=> "Implemented"]) }}"
             class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='Implemented') border-b-4  border-blue-400 text-gray-900 @endif">Implmented({{ $statusCount['implemented'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="{{ route('idea.index',['status'=> "Closed"]) }}"
                class="pb-3  hover:border-blue-400 hover:transition duration-150 ease-in @if ($status=='Closed') border-b-4  border-blue-400 text-gray-900 @endif">Closed({{ $statusCount['closed'] }})</a>
        </li>

    </ul>
</nav>