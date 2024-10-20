<div class="collage grid grid-cols-3 aspect-[0.93] relative">
    @foreach ($images as $image)
        <div class="collage__item">
            <img class="w-full h-full object-cover" src="{{ $image['sizes']['large'] }}" alt="{{ $image['alt'] }}">
        </div>
    @endforeach
</div>
