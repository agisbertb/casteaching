<x-casteaching-layout>
    <div class="flex flex-col items-center">
            <iframe
                class="md:p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10 h-4/5 w-full md:px-6 xl:px-15"
                style="height: 75vh; width: 100%;"
                src="https://www.youtube.com/embed/B8gyW3N3eGY?si=eYWPI-keCCa5lbAv"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

            <div class="inline-block max-w-7xl w-5/6 bg-white rounded-lg shadow-lg px-4 py-4 md:px-6 xl:px-15 xl:py-5 2xl:px-20 2xl:py-10 m-4 border-t-2 border-red-600 rounded-t-none">
                <h2 class="text-gray-900 uppercase font-bold text-2xl tracking-tight border-b border-gray-300">
                    {{ $video->title }}
                </h2>

                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-2 shadow">
                        <dt class="truncate text-sm font-medium text-gray-500">Data de publicació</dt>
                        <dd class="mt-1 text-1xl font-semibold tracking-tight text-gray-900">{{ $video->formatted_published_at }}</dd>
                    </div>
                </dl>

            </div>

            <div class="prose-sm md:prose lg:prose-xl 2xl:prose-2xl mx-auto px-4 py-4 md:px-6 xl:px-15 xl:py-5 2xl:px-20 2xl:py-10">
            {!! Str::markdown($video->description) !!}
            </div>
    </div>
</x-casteaching-layout>
