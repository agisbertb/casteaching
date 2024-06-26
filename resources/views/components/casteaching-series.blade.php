<div id="casteaching_series">
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Series</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Les series de casteaching</p>
            </div>

            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($series as $serie)
                    <article class="flex flex-col items-start justify-between p-4 transition-transform transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/50 hover:rounded-2xl">
                        <div class="relative w-full">
                            <a href="{{ route('series.show', $serie->id) }}">
                                <img src="{{ asset('storage/' . $serie->image) }}" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                            </a>
                        </div>
                        <div class="max-w-xl">
                            <div class="mt-8 flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16" class="text-gray-500">{{ $serie->formatted_for_humans_created_at }}</time>
                                <a href="{{ route('series.show', $serie->id) }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-red-600 hover:bg-gray-100">Screencasts</a>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ route('series.show', $serie->id) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $serie->title }}
                                    </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $serie->description }}</p>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4">
                                @if(!empty($serie->teacher_photo_url))
                                    <img src="{{ $serie->teacher_photo_url }}" alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                @endif
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="{{ route('series.show', $serie->id) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $serie->teacher_name }}
                                        </a>
                                    </p>
                                    <p class="text-gray-600">Co-Founder / CTO</p>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</div>
