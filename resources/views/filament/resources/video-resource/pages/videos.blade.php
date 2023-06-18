<x-filament::page>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
        @foreach($videos as $video)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <!-- iframe -->
            <div class="video-container">
                <iframe class="w-full" height="400" src="{{ $video->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $video->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $video->channel }}</p>
            </div>
        </div>
        @endforeach
    </div>
</x-filament::page>
