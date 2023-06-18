<x-filament::page>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('storage/' . $article->author->photo) }}" alt="Author">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $article->author->name }}</a>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400">Universiti Malaysia Pahang</p>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                    <time>{{ \Carbon\Carbon::parse($article->published_at)->format('j F Y') }}</time>
                                </p>
                            </div>
                        </div>
                    </address>

                    <div>
                        <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full">
                            {{ $article->category->name }}
                        </span>

                        @foreach($article->tags as $tag)
                        <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                            {{ $tag->name }}
                        </span>
                        @endforeach

                    </div>

                    @if($article->banner)
                    <figure class="mt-8 mb-4">
                        <div class="border border-gray-300 rounded-lg overflow-hidden">
                            <img class="mx-auto" src="{{ asset('storage/' . $article->banner) }}" alt="Article Banner" style="max-width: 100%; max-height: 400px;">
                        </div>
                    </figure>
                    @endif

                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$article->title}}</h1>
                </header>
                <p class="lead">{{$article->excerpt}}</p>

                {!! $article->content !!}
            </article>
        </div>
    </main>
</x-filament::page>