<div x-data @click="
    const clicked = $event.target
    const target = clicked.tagName.toLowerCase()
    console.log(target)
    const ignores=['svg','path','button','a']
    if(! ignores.includes(target)){
        clicked.closest('.idea-container').querySelector('.idea-link').click()
    }
"
    class="idea-container hover:shadow-card cursor-pointer hover:transition duration-150 ease-in bg-white rounded-xl flex ">
    <div class="hidden md:block border-r border-gray-100 px-8  py-8  ">
        <div class="text-center ">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue-600  @endif">{{ $votesCount }}</div>
            <div  class="text-gray-500">Votes</div>
        </div>
        <div class="mt-8">

            @if ($hasVoted)
            <button wire:click.prevent='vote'
                class="-mx-5 w-20 border  border-blue-200 bg-blue-600 text-white font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-blue-400 hover:bg-blue-400 hover:transition duration-150 ease-in ">Voted
            </button>
            @else
            <button wire:click.prevent='vote'
                class="-mx-5 w-20 border  border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote
            </button>
            @endif

        </div>
    </div>
    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 flex-1 px-2 py-6">
        <div class="flex-none mx-4 md:mx-0"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                    src="{{ $idea->user->getAvatar() }}"></a>
        </div>
        <div class="w-full flex flex-col justify-between mx-4">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('idea.show',$idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 text-xxs line-clamp-3">{{ $idea->description }}</div>
            <div
                class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 justify-between mt-6">
                <div class="flex items-center justify-between text-xs font-semibold space-x-2 text-gray-400">
                    <div class="">{{ $idea->created_at->diffForHumans() }}</div>
                    <div class="">&bull;</div>
                    <div class="">{{$idea->catagory->name}}</div>
                    <div class="">&bull;</div>
                    <div class="">3 Comments</div>

                </div>
                <div x-data="{open:false}" class="flex items-center justify-center space-x-2">
                    <button
                        class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                        {{ $idea->status->name }}</button>
                   
                </div>
                <div class="flex itmes-center md:hidden mt-4 ">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none @if($hasVoted) text-blue-600  @endif">{{ $votesCount
                            }}</div>
                        <div class="text-xxs font-semibold leading-none text-gray-400 uppercase">votes</div>
                    </div>
                    @if($hasVoted)

                    <button wire:click.prevent='vote'
                        class="-mx-5 w-20 border border-blue-200 bg-blue-600 text-white font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-blue-400 hover:bg-blue-400 hover:transition duration-150 ease-in ">Voted

                    </button>

                    @else

                    <button wire:click.prevent='vote'
                        class="-mx-5 w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                    </button>

                    @endif
                </div>
            </div>

        </div>
    </div>

</div>