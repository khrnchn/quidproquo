<x-filament::page>
    <x-filament::card>
        <div>
            <div class="flex justify-between items-center mb-6">
                <x-filament::header>
                    <x-slot name="heading">
                        {{ $quiz->name }}
                    </x-slot>
                </x-filament::header>
                <div>
                    <span class="text-sm font-medium text-gray-500">Time Remaining:</span>
                    <span wire:poll.1s="updateTimer" id="timer" class="ml-2 text-sm font-medium text-gray-900">{{ $formattedTime }}</span>
                </div>
            </div>
            <form wire:submit.prevent="submit" method="POST" action="https://herotofu.com/start">
                @foreach($quiz->topics as $topic)
                @foreach($topic->questions as $question)
                <div class="mb-6 border-2 border-gray-300 p-4 rounded-lg">
                    <div class="mb-4">
                        <span class="font-medium">Question {{ $loop->iteration }} of {{ $loop->count }}:</span>
                        <span class="ml-1">{{ $question->name }}</span>
                    </div>
                </div>
                <!-- options -->
                <div class="mb-6">
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center">
                                <input wire:model="selectedAnswer" type="radio" class="
                                                text-sky-600
                                                border-gray-300
                                                rounded-full
                                                shadow-sm
                                                focus:border-sky-300
                                                focus:ring
                                                focus:ring-offset-0
                                                focus:ring-sky-200
                                                focus:ring-opacity-50
                                                " value="" />
                                <span class="ml-2">Test</span>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
                <div class="flex justify-between items-center">
                    <x-filament::button type="button">Previous</x-filament::button>
                    <x-filament::button type="submit">Next</x-filament::button>
                </div>
            </form>
        </div>
    </x-filament::card>
</x-filament::page>