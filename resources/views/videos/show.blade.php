<x-casteaching-layout>
    <div class="flex flex-col space-x-4 space-y-4 lg:space-x-4 lg:space-y-4 xl:space-x10 xl:space-y-5
    2xl:space-x20 2xl:space-y-10 items-center">
        <div class="min-w-full">
            <iframe
                class="md:p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10 h-4/5 w-full"
                style="height: 75vh; width: 100%;"
                src="https://www.youtube.com/embed/B8gyW3N3eGY?si=eYWPI-keCCa5lbAv"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <h2 class="text-gray-900 uppercase font-bold text-2xl tracking-tight">
                {{ $video->title }}
            </h2>
        </div>
        <div class="prose-sm md:prose lg:prose-xl 2xl:prose-2xl">
            {!! Str::markdown($video->description) !!}
        </div>
    </div>
</x-casteaching-layout>
