<div x-data="{open:false}" class="relative">
    <button @click="open=!open" type="button"
        class="flex items-center justify-center w-34 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">


        <span class="mr-2">Set Status</span>
        <svg class="w-4 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>

    </button>
    <div x-cloak x-show.transition.origin.top.left="open" @click.away="open=false" @keydown.escape.window="open=false" x-init="window.livewire.on('statusFireEvent',()=>{
        open=false}) "
        class="absolute z-20 w-64 md:w-[19rem] text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2 px-4">
        <form wire:submit.prevent='setStatus' action="#" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                <div class="flex items-center ">
                    <input wire:model="status" id="open" type="radio" value="1" name="default-radio"
                        class="w-4 h-4 text-gray-600 bg-gray-100 border-none focus:ring-gray-500   focus:ring-2 ">
                    <label for="open"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open</label>
                </div>
                <div class="flex items-center mb-4">
                    <input wire:model="status" id="considering" type="radio" value="2" name="default-radio"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-none focus:ring-purple-500   focus:ring-2 ">
                    <label for="considering"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Considering</label>
                </div>
                <div class="flex items-center mb-4">
                    <input wire:model="status" id="in_progress" type="radio" value="3" name="default-radio"
                        class="w-4 h-4 text-yellow-600 bg-gray-100 border-none focus:ring-yellow-500   focus:ring-2 ">
                    <label for="in_progress"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">In Progress</label>
                </div>
                <div class="flex items-center mb-4">
                    <input wire:model="status" id="implemented" type="radio" value="4" name="default-radio"
                        class="w-4 h-4 text-green-600 bg-gray-100 border-none focus:ring-green-500   focus:ring-2 ">
                    <label for="implemented"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Implemented</label>
                </div>
                <div class="flex items-center mb-4">
                    <input wire:model="status" id="closed" type="radio" value="5" name="default-radio"
                        class="w-4 h-4 text-red-600 bg-gray-100 border-none focus:ring-red-500   focus:ring-2 ">
                    <label for="closed"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Closed</label>
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
                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3 disabled:opacity-50">

                    <span class="ml-1">Update</span>
                </button>
            </div>
            <div class="">
                <label class="font-normal inline-flex items-center">
                    <input wire:model="notifyAllVoters" type="checkbox" name="notify_voters" class="rounded bg-gray-200" >
                    <span class="ml-2">Notify all Voters</span>
                </label>
            </div>
        </form>
    </div>
</div>