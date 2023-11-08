<x-app-layout>

    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="catagory" id="catagory" class="w-full rounded-xl px-4 py-2">
                <option value="">Catagory One</option>
                <option value="">Catagory Two</option>
                <option value="">Catagory Three</option>
                <option value="">Catagory Four</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl px-4 py-2">
                <option value="">Fitler One</option>
                <option value="">Fitler Two</option>
                <option value="">Fitler Three</option>
                <option value="">Fitler Four</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea"
                class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none">
            <div class="absolute top-0 flex items-center h-full ml-2"><svg class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="ideas-container space-y-6 my-6">
        <div class="idea-container hover:shadow-card cursor-pointer hover:transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border border-gray-500 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    <button class="w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none" ><img alt="avatar" class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1"></a>
                <div class="mx-4 ">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A Random Title Can Go Here</a>
                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="">10 hours ago</div>
                                <div class="">&bull;</div>
                                <div class="">Catogory 1</div>
                                <div class="">&bull;</div>
                                <div class="">3 Comments</div>
                                <div class="">&bull;</div>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                        <ul class="absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark as Spam</a></li>
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete Post</a></li>
                                        </ul>
                                </button>
                            </div>
                        </div>
                    </h4>
                </div>
            </div>

        </div>
        <div class="idea-container hover:shadow-card cursor-pointer hover:transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border border-gray-500 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    <button class="w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none" ><img alt="avatar" class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1"></a>
                <div class="mx-4 ">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A Random Title Can Go Here</a>
                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="">10 hours ago</div>
                                <div class="">&bull;</div>
                                <div class="">Catogory 1</div>
                                <div class="">&bull;</div>
                                <div class="">3 Comments</div>
                                <div class="">&bull;</div>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                        <ul class="absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark as Spam</a></li>
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete Post</a></li>
                                        </ul>
                                </button>
                            </div>
                        </div>
                    </h4>
                </div>
            </div>

        </div>
        <div class="idea-container hover:shadow-card cursor-pointer hover:transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border border-gray-500 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    <button class="w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none" ><img alt="avatar" class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1"></a>
                <div class="mx-4 ">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A Random Title Can Go Here</a>
                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="">10 hours ago</div>
                                <div class="">&bull;</div>
                                <div class="">Catogory 1</div>
                                <div class="">&bull;</div>
                                <div class="">3 Comments</div>
                                <div class="">&bull;</div>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                        <ul class="absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark as Spam</a></li>
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete Post</a></li>
                                        </ul>
                                </button>
                            </div>
                        </div>
                    </h4>
                </div>
            </div>

        </div>
        <div class="idea-container hover:shadow-card cursor-pointer hover:transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border border-gray-500 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    <button class="w-20 border border-gray-200 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 hover:transition duration-150 ease-in ">Vote

                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none" ><img alt="avatar" class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1"></a>
                <div class="mx-4 ">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A Random Title Can Go Here</a>
                        <div class="text-gray-600 mt-3 text-xxs line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci accusantium non numquam laudantium? Quasi quae aut amet, quo doloremque hic quis ipsum consectetur impedit quaerat, debitis, inventore est? Natus rem odio quae ipsa voluptates hic perspiciatis expedita id alias, accusantium aliquam quis sed beatae quos in. Deserunt, consequuntur quo. Recusandae maxime eveniet hic, ratione quia quos explicabo nisi dicta ipsam exercitationem repellendus veniam praesentium error modi doloribus autem commodi fuga fugiat porro voluptas. Nemo quos asperiores ipsum, tenetur itaque soluta molestias dolores harum qui praesentium quisquam, saepe ex ab earum consequuntur vel doloremque pariatur accusamus? Facere nobis quibusdam minus veniam!</div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center justify-between text-sm font-semibold space-x-2 text-gray-400">
                                <div class="">10 hours ago</div>
                                <div class="">&bull;</div>
                                <div class="">Catogory 1</div>
                                <div class="">&bull;</div>
                                <div class="">3 Comments</div>
                                <div class="">&bull;</div>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 hover:transition duration-150 ease-in px-4">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                        <ul class="absolute w-44 font-semibold bg-white ml-8 shadow-dialog rounded-xl py-3 text-left  text-base">
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Mark as Spam</a></li>
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 hover:transition duration-150 ease-in">Delete Post</a></li>
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