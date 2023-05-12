<x-filament::page>
    <div class="mt-8">
        <x-filament::card>
            <div class="p-4">
                <h2 class="font-bold text-xl mb-4">Quiz Name</h2>
                <p class="mb-4">Quiz description goes here.</p>
                <p class="mb-4">Your score: 2/3</p>
                <h3 class="font-bold text-lg mb-4">Quiz Questions</h3>
                <div class="mb-6 border-2 border-gray-300 p-4 rounded-lg bg-green-200">
                    <div class="mb-4">
                        <span class="font-medium">Question 1 of 3:</span>
                        <span class="ml-1">What is the capital of France?</span>
                    </div>

                    <div>
                        <div class="flex items-center mb-2">
                            <input type="radio" id="option_1_1" name="question_1" value="1" class="mr-2" checked disabled>
                            <label for="option_1_1">Paris</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="radio" id="option_1_2" name="question_1" value="2" class="mr-2" disabled>
                            <label for="option_1_2">London</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="radio" id="option_1_3" name="question_1" value="3" class="mr-2" disabled>
                            <label for="option_1_3">Madrid</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="radio" id="option_1_4" name="question_1" value="4" class="mr-2" disabled>
                            <label for="option_1_4">Rome</label>
                        </div>
                    </div>
                </div>
            </div>
        </x-filament::card>
    </div>
</x-filament::page>