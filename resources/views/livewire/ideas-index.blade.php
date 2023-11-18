<div class="">
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="
        w-full md:w-1/3">
            <select wire:model="catagory" name="catagory" id="catagory" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="">All Catagories</option>
                @foreach ($catagories as $catagory)
                    <option value="{{ $catagory->name }}">{{ $catagory->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model="filter" name="other_filters" id="other_filters" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
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
        {{-- @livewire('idea-index',['idea' => $idea,'votesCount' => $idea->votes_count,'wire:key' => $key]) --}}
        <livewire:idea-index :idea='$idea' :votesCount="$idea->votes_count" :key="$idea->id" />
        @endforeach


    </div>
    <div class="my-6">
        {{ $ideas->links() }}

        {{-- {{ $ideas->appends(request()->query())->links() }} --}}
    </div>
</div>