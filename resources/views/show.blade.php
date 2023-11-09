<x-app-layout>
    <div class="">
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All Ideas</span>
        </a>
    </div>
    <div class="idea-container  bg-white rounded-xl flex mt-4">

        <div class="flex flex-1 px-2 py-6">
            <div class="flex-none"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                        src="https://source.unsplash.com/200x200/?face&crop=face&v=1"></a>
            </div>
            <div class="mx-4 ">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A Random Title Can Go Here</a>
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
                        <div class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div class="">&bull;</div>
                            <div class="">10 hours ago</div>
                            <div class="">&bull;</div>
                            <div class="">Catogory 1</div>
                            <div class="">&bull;</div>
                            <div class="">3 Comments</div>
                            <div class="">&bull;</div>
                        </div>
                        <div class="flex items-center justify-center space-x-2">
                            <div
                                class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Open</div>
                            <button
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul
                                    class="absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
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
    <div class="buttons-container flex justify-between mt-6">

        <div class="flex items-center space-x-2 ml-4">
            <div class="relative">
                <button type="submit"
                    class="flex items-center justify-center w-32 h-11 text-sm bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">

                    Reply
                </button>
                <div
                    class=" absolute z-10 w-[26rem] text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2 px-4">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="">
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Go head,dont be shy.Share your thoughts...."></textarea>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-sm bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">

                                Post Comment
                            </button>
                            <button type="button"
                                class="flex items-center justify-center w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
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
            <div class="relative">
                <button type="button"
                    class="flex items-center justify-center w-34 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">


                    <span class="mr-2">Set Status</span>
                    <svg class="w-4 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>

                </button>
                <div
                    class=" absolute z-20 w-[19rem] text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2 px-4">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="space-y-4">
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-none focus:ring-blue-500   focus:ring-2 ">
                                <label for="default-radio-1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                    radio</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-none focus:ring-blue-500   focus:ring-2 ">
                                <label for="default-radio-1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                    radio</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-none focus:ring-blue-500   focus:ring-2 ">
                                <label for="default-radio-1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                    radio</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-green-600 bg-gray-100 border-none focus:ring-green\-500   focus:ring-2 ">
                                <label for="default-radio-1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                    radio</label>
                            </div>
                        </div>
                        <div class=""><textarea name="update_comment" id="update_comment" cols="30" rows="3"
                                class="w-full text-sm rounded-xl placeholder-gray-900 border-none px-4 py-2 bg-gray-100"
                                placeholder="Add an update comment (optional)"></textarea></div>
                        <div class="flex itmes-center justify-button space-x-3">
                            <button type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                                <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">

                                <span class="ml-1">Update</span>
                            </button>
                        </div>
                        <div class="">
                            <label class="font-normal inline-flex items-center">
                                <input type="checkbox" name="notify_voters" class="rounded bg-gray-200" checked>
                                <span class="ml-2">Notify all Voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex itmes-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <button type="button"
                class=" w-32 h-11 uppercase text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                <span class="mr-2">vote</span>

            </button>
        </div>
    </div>

    <div class="comments-container relative  space-y-6 ml-20 my-8">
        <div class="comment-container relative  bg-white rounded-xl flex mt-4">

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none"> <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v=2"></a>
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
        <div class="comment-container is-admin border border-blue-600 relative  bg-white rounded-xl flex mt-4">

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#"><img alt="avatar" class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v=3">
                    </a>
                    <div class="text-blue-600 uppercase text-center mt-2 text-xxs font-bold">ADMIN</div>
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

            <div class="flex flex-1 px-2 py-6">
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