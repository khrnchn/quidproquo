<x-filament::page>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div wire:id="" wire:initial-data="">
                <div class="w-full mb-6 sm:flex items-center justify-between p-6 bg-white sm:rounded-lg shadow dark:bg-gray-800">
                    <h3 class="text-gray-900 text-lg font-medium flex-shrink-1">
                        <span class="flex items-center">
                            <span class="dark:text-white">
                                You can&#039;t use both contracts and facades in one application.
                            </span>
                        </span>
                    </h3>
                    <!-- <span class="flex-shrink-0">
                        <span class="text-gray-400 truncate">4 Remaining</span>
                    </span> -->
                </div>
                <fieldset>
                    <legend class="sr-only">
                        You can&#039;t use both contracts and facades in one application.
                    </legend>
                    <div class="bg-white sm:rounded-md -space-y-px dark:bg-gray-800">
                        <label class="border-gray-200 hover:bg-indigo-50 hover:border-indigo-200 dark:border-gray-600 dark:hover:bg-gray-700 border-gray-200 sm:rounded-tl-md sm:rounded-tr-md relative border p-4 flex items-center relative border p-4 flex items-center cursor-pointer">
                            {{$this->form}}
                        </label>
                    </div>
                </fieldset>
                <div class="w-full mt-6 text-center text-gray-400 text-sm">
                    <strong>Tip: 4,356 quizzes have already been completed with an average score of 63!</strong>
                </div>
                <div class="w-full mt-6 flex items-center justify-between p-6 bg-white sm:rounded-lg shadow dark:bg-gray-800">
                    <button wire:click="" wire:loading.attr="disabled" wire:loading.class="disabled:opacity-50 disabled:cursor-wait" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span wire:loading.remove wire:target="">
                            Prev
                        </span>
                        <span wire:loading wire:target="">
                            Loading...
                        </span>
                    </button>
                    <button wire:click="" wire:loading.attr="disabled" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600">
                        Clear
                    </button>
                    <button wire:click="" wire:loading.attr="disabled" wire:loading.class="disabled:opacity-50 disabled:cursor-wait" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span wire:loading.remove wire:target="next">
                            Save & Next
                        </span>
                        <span wire:loading wire:target="">
                            Loading...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-filament::page>