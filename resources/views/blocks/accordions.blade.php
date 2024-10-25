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
                            <p class="px-12 font-semibold text-[18px] sm:text-[24px] text-azure uppercase pb-2">
                                {!! $item['title'] !!}
                            </p>
                            <div class="px-12">
                                {!! $item['content'] !!}
                            </div>
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
        const accordion = document.querySelector('.accordion-items');
        let timeout;

        accordionItems.forEach((item) => {
            const title = item.querySelector('.accordion-title');

            item.addEventListener('mouseenter', () => {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    // Deactivate all other items and make their titles short
                    accordionItems.forEach((otherItem) => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                            otherItem.querySelector('.accordion-title')
                                .classList.add('short');
                        }
                    });

                    // Activate the current item
                    item.classList.add('active');
                    title.classList.remove('short');
                }, 200); // Adjust the delay as needed
            });

            item.addEventListener('mouseleave', () => {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    item.classList.remove('active');
                    title.classList.add('short');
                }, 200); // Adjust the delay as needed
            });
        });

        // When mouse leaves the accordion, deactivate all items
        accordion.addEventListener('mouseleave', () => {
            clearTimeout(timeout);
            accordionItems.forEach((item) => {
                item.classList.remove('active');
                item.querySelector('.accordion-title')
                    .classList.remove('short');
            });
        });

        // When scroll into view, activate the first item
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    accordionItems[0].classList.add('active');
                    accordionItems[0].querySelector('.accordion-title')
                        .classList.remove('short');
                    for (let i = 1; i < accordionItems.length; i++) {
                        if (accordionItems[i].classList.contains('active')) {
                            continue;
                        }
                        accordionItems[i].classList.remove('active');
                        accordionItems[i].querySelector('.accordion-title')
                            .classList.add('short');
                    }

                }
            });
        }, {
            threshold: 0.5,
        });

        observer.observe(accordion);
    });
</script>
