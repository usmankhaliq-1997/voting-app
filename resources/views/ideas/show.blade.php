<x-app-layout>
    <div class="">


        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All Ideas ( or back to chosen catagory with filters )</span>
        </a>
    </div>

    @livewire('idea-show', ['idea' => $idea,'votesCount' => $votesCount])

    @can('update',$idea)
    @livewire('edit-idea',['idea' => $idea])
    @endcan

    @can('delete',$idea)
    @livewire('delete-idea',['idea' => $idea])
    @endcan




    <div class="comments-container relative  space-y-6 md:ml-20 my-8">
        <div class="comment-container relative  bg-white rounded-xl flex mt-4">

            <div class="flex flex-col md:flex-row  flex-1 px-2 py-6">
                <div class="flex-none"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v=2"></a>
                </div>
                <div class=" md:mx-4 ">
                    <h4 class="text-xl font-semibold">

                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo
                            doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem
                            odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed
                            beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos
                            explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi
                            doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur
                            itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum
                            consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div
                                class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div class="">&bull;</div>
                                <div class="">10 hours ago</div>

                            </div>
                            <div x-data="{open:false}" class="flex items-center justify-center space-x-2">

                                <button @click="open=!open"
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                    <ul x-cloak x-show.transition.origin.top.left="open" @click.away="open=false"
                                        @keydown.escape.window="open=false"
                                        class="z-10 absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base top-[1.8rem] md:ml-8 md:top-6 right-0 md:left-0">
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark
                                                as Spam</a></li>
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete
                                                Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </h4>
                </div>
            </div>

        </div>
        <div class="comment-container is-admin border border-blue-600 relative  bg-white rounded-xl flex mt-4">

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v=3">
                    </a>
                    <div class="hidden md:block text-blue-600 uppercase text-center mt-2 text-xxs font-bold">ADMIN</div>
                </div>
                <div class="mx-4 ">
                    <div class="text-xl font-semibold">
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">Another random title can go here</a>
                        </h4>

                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo
                            doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem
                            odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed
                            beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos
                            explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi
                            doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur
                            itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum
                            consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div
                                class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-blue-600">Andrew</div>
                                <div class="">&bull;</div>
                                <div class="">10 hours ago</div>

                            </div>
                            <div class="flex items-center justify-center space-x-2">

                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                    <ul
                                        class="hidden absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark
                                                as Spam</a></li>
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete
                                                Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="comment-container relative  bg-white rounded-xl flex mt-4">

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 flex-1 px-2 py-6">
                <div class="flex-none"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v=4"></a>
                </div>
                <div class="mx-4 ">
                    <h4 class="text-xl font-semibold">

                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo
                            doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem
                            odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed
                            beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos
                            explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi
                            doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur
                            itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum
                            consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div
                                class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div class="">&bull;</div>
                                <div class="">10 hours ago</div>

                            </div>
                            <div class="flex items-center justify-center space-x-2">

                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                    <ul
                                        class="hidden absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark
                                                as Spam</a></li>
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete
                                                Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </h4>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>