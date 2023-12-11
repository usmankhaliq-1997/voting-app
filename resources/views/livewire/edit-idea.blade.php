<div 
x-cloak
x-data="{isOpen:false}"
x-show="isOpen"
@custom-show-edit-modal.window="isOpen=true"
@keydown.escape.window="isOpen=false"
x-init="window.livewire.on('ideaWasUpdated',()=>{
    isOpen=false}) "
class=" relative z-10" 
aria-labelledby="modal-title" 
role="dialog" 
aria-modal="true">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
         
            <!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4" x-show.transition.origin.bottom.duration.400ms="isOpen">

                    <form wire:submit.prevent="updateIdea" action="#" method="POST" class="space-y-4 px-4 py-6 text-xsm">

                        <div class="flex justify-end" @click="isOpen=false">
                            <div class="" ><svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                              </svg> </div>                             
                        </div>

                        <div class="text-center space-y-2 p-2">
                            <h4 class="text-xl text-gray-500 font-semibold">Edit Idea</h4>
                            <p class="text-sm text-gray-500">ypu have one hour to edit your idea after you created it</p>
                        </div>

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
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>    
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
                    
                                <span class="ml-1">Update</span>
                            </button>
                        </div>
                    
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>