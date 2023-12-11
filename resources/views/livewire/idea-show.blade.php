<div class="idea-container-and-button-container">
    <div class="idea-container  bg-white rounded-xl flex mt-4">

        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 flex-1 px-2 py-6">
            <div class="flex-none mx-4 md:mx-0"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                        src="{{ $idea->user->getAvatar() }}"></a>
            </div>
            <div class="mx-4 flex flex-col justify-between">
                <h4 class="text-xl font-semibold">
                    <p class="">{{ $idea->title }}</p>
                </h4>
                <div class="text-gray-600 mt-3 text-sm line-clamp-3">{{ $idea->description }}</div>
                <div
                    class="flex flex-col md:flex-row items-start  space-y-4 md:space-y-0 md:items-center space-x-4 mt-6">
                    <div class="flex items-center justify-between text-xxs font-semibold space-x-2 text-gray-400">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div class="">{{ $idea->created_at->diffForHumans() }}</div>
                        <div class="">&bull;</div>
                        <div class="">{{ $idea->catagory->name }}</div>
                        <div class="">&bull;</div>
                        <div class="">3 Comments</div>

                    </div>
                    <div x-data="{open:false}" class="relative flex items-center justify-center space-x-2">
                        <div
                            class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                        <button @click="open=!open"
                            class=" bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                            <svg fill="currentColor" width="24" height="6">
                                <path
                                    d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                    style="color: rgba(163, 163, 163, .5)">
                            </svg>
                        </button>
                        <ul x-cloak x-show.transition.origin.top.left="open" @click.away="open=false"
                            @keydown.escape.window="open=false"
                            class="absolute w-44 z-10 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base top-[1.8rem] md:ml-8 md:top-6 right-0 md:left-24  ">

                            @can('update',$idea)
                            <li @click="open=false
                            $dispatch('custom-show-edit-modal')
                            "><a href="#"
                                    class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Edit
                                    Idea</a></li>
                            @endcan


                            <li><a href="#"
                                    class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark
                                    as Spam</a></li>

                            @can('delete',$idea)
                            <li @click="open=false
                                    $dispatch('custom-show-delete-modal')
                                    "><a href="#"
                                    class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete Idea</a></li>
                            @endcan


                        </ul>
                    </div>
                    <div class="flex items-center md:hidden mt-4 ">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none @if ($hasVoted) text-blue-600 @endif">{{
                                $votesCount }}</div>
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
    <div class="buttons-container flex  justify-between mt-6">

        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 items-center md:space-x-2 md:ml-4">
            <div class="relative" x-data="{open:false}">
                <button @click="open=!open" type="submit"
                    class="flex items-center justify-center w-32 h-11 text-sm bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">

                    Reply
                </button>
                <div x-cloak x-show.transition.origin.top.left="open" @click.away="open=false"
                    @keydown.escape.window="open=false"
                    class=" absolute z-10 w-64 md:w-[26rem] text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2 px-4">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="">
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Go head,dont be shy.Share your thoughts...."></textarea>
                        </div>
                        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 items-center md:space-x-3">
                            <button type="submit"
                                class="flex items-center justify-center w-full md:w-1/2 h-11 text-sm bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">

                                Post Comment
                            </button>
                            <button type="button"
                                class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                                <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @auth
            @if(auth()->user()->isAdmin())

            <livewire:set-status :idea='$idea' />

            @endif

            @endauth


        </div>


        <div class="hidden  md:flex itmes-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if ($hasVoted) text-blue-600 @endif">{{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
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