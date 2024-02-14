<x-casteaching-layout>
    <div class="flex flex-col">
        <iframe
            class="md:p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10 h-4/5"
            src="https://www.youtube.com/embed/d3ecax4PcUE?si=d75CXa1VCXkC1eaC"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        <div class="p-4 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-20">
            <h2>{{ $video->title }}</h2>
        </div>
        <div class="p-4 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-20">
            <h3>{{ $video->description }}</h3>
        </div>
    </div>
</x-casteaching-layout>
