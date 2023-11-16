<form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6 text-xsm">
    <div class="">
        <input wire:model.defer="title" type="text"
            class="border-none text-sm    w-full bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-3"
            placeholder="Your Idea">
        @error('title')
        <p class="text-red-600 text-xxs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="">

        <select wire:model.defer="catagory" name="catagory_add" id="catagory_add"
            class="w-full rounded-xl px-4 py-2 bg-gray-100 text-sm border-none">
            @foreach ($catagories as $catagory)
            <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="">
        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4"
            class="bg-gray-100 rounded-xl placeholder-gray-900 text-sm px-4 py-2 w-full border-none"
            placeholder="Describe your idea"></textarea>

        @error('description')
        <p class="text-red-600 text-xxs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex itmes-center justify-button space-x-3">
        <button type="button"
            class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
            <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
            </svg>

            <span class="ml-1">Attach</span>
        </button>
        <button type="submit"
            class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">

            <span class="ml-1">Submit</span>
        </button>
    </div>

    <div>
        @if (session('success_message'))
            <div
                x-data="{ isVisible: true }"
                x-init="
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                "
                x-show.transition.duration.1000ms="isVisible"
                class="text-green-600 mt-4"
            >
                {{ session('success_message') }}
            </div>
        @endif
    </div>

</form>