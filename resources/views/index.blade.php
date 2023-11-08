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

</x-app-layout>