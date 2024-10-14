<div class="collage grid grid-cols-3 aspect-[0.93]">
    @foreach ($images as $image)
        <div class="collage__item">
            <img class="w-full h-full object-cover" src="{{ $image['sizes']['medium'] }}" alt="{{ $image['alt'] }}">
        </div>
    @endforeach
</div>
