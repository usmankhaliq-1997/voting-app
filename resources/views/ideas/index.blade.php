<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="
        w-full md:w-1/3">
            <select name="catagory" id="catagory" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="">Catagory One</option>
                <option value="">Catagory Two</option>
                <option value="">Catagory Three</option>
                <option value="">Catagory Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="">Fitler One</option>
                <option value="">Fitler Two</option>
                <option value="">Fitler Three</option>
                <option value="">Fitler Four</option>
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input type="search" placeholder="Find an idea"
                class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none">
            <div class="absolute top-0 flex items-center h-full ml-2"><svg class="w-4 text-gray-500" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="ideas-container space-y-6 my-6">
        @foreach ($ideas as $key => $idea)
        <div
            class="idea-container hover:shadow-card cursor-pointer hover:transition duration-150 ease-in bg-white rounded-xl flex ">
            <div class="hidden md:block border-r border-gray-100 px-8  py-8  ">
                <div class="text-center ">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="-mx-5 w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 flex-1 px-2 py-6">
                <div class="flex-none mx-4 md:mx-0"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v={{ $key }}"></a>
                </div>
                <div class="w-full flex flex-col justify-between mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="{{ route('idea.show',$idea) }}" class="hover:underline">{{ $idea->title }}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 text-xxs line-clamp-3">{{ $idea->description }}</div>
                    <div
                        class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 justify-between mt-6">
                        <div class="flex items-center justify-between text-xs font-semibold space-x-2 text-gray-400">
                            <div class="">{{ $idea->created_at->diffForHumans() }}</div>
                            <div class="">&bull;</div>
                            <div class="">Catogory 1</div>
                            <div class="">&bull;</div>
                            <div class="">3 Comments</div>

                        </div>
                        <div x-data="{open:false}" class="flex items-center justify-center space-x-2">
                            <div
                                class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Open</div>
                            <button @click="open=!open"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul x-cloak x-show.transition.origin.top.left="open" @click.away="open=false"
                                    @keydown.escape.window="open=false"
                                    class="absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 top-[1.8rem] md:ml-8 md:top-6 right-0 md:left-0 text-left  text-base ">
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark
                                            as Spam</a></li>
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete
                                            Post</a></li>
                                </ul>
                            </button>
                        </div>
                        <div class="flex itmes-center md:hidden mt-4 ">
                            <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                                <div class="text-sm font-bold leading-none">12</div>
                                <div class="text-xxs font-semibold leading-none text-gray-400 uppercase">votes</div>
                            </div>
                            <button
                                class="-mx-5 w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--end of idea container -->
        @endforeach


    </div>
    <div class="my-6">
        {{ $ideas->links() }}
    </div>

</x-app-layout>