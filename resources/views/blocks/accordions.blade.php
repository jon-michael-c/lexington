<section class="accordion relative full-width py-8 sm:py-12 my-8">
    <div class="accordion-bg bg-mist-100 absolute top-0 left-0 w-full h-full z-[-3]"></div>
    <div class="accordion-content">
        <InnerBlocks />
        @if (isset($items))
            <div class="accordion-items">
                @foreach ($items as $item)
                    <div class="accordion-item">
                        <div class="accordion-title relative py-20 px-12">
                            <p class="text-white uppercase text-[24px]">{!! $item['title'] !!}</p>
                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-4 opacity-90 z-[-1]"></div>
                            <div class="absolute top-0 left-0 w-full h-full z-[-2]">
                                <img src="{{ $item['image']['url'] }}" alt="background image"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="accordion-text bg-mist-300 text-charcoal">
                            <p class="font-semibold text-[24px] text-azure uppercase pb-2">{!! $item['title'] !!}</p>
                            {!! $item['content'] !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionItems = document.querySelectorAll('.accordion-item');

        accordionItems.forEach((item) => {
            const title = item.querySelector('.accordion-title');

            item.addEventListener('mouseenter', () => {
                item.classList.add('active');

                accordionItems.forEach((otherItem) => {
                    otherItem.querySelector('.accordion-title').classList.add('short');
                });
            });

            item.addEventListener('mouseleave', () => {
                item.classList.remove('active');

                accordionItems.forEach((otherItem) => {
                    otherItem.querySelector('.accordion-title').classList.remove(
                        'short');
                });
            });
        });
    });
</script>
