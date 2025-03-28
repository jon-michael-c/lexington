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
        let interactionTimeout;

        // Variables for Autoplay
        let autoplayInterval = null; // Reference to the autoplay interval
        const AUTOPLAY_DELAY = 4000; // Increased delay for slower autoplay
        let currentIndex = 0; // Tracks the currently active item index

        // Function to activate a specific accordion item by index
        function activateItem(index) {
            // Ensure index is within bounds
            if (index < 0 || index >= accordionItems.length) return;

            // Deactivate all other items and make their titles short
            accordionItems.forEach((item, idx) => {
                const title = item.querySelector('.accordion-title');
                if (idx === index) {
                    item.classList.add('active');
                    title.classList.remove('short');
                } else {
                    item.classList.remove('active');
                    title.classList.add('short');
                }
            });

            currentIndex = index; // Update the current index
        }

        // Function to activate the next item in the list
        function activateNextItem() {
            const nextIndex = (currentIndex + 1) % accordionItems.length;
            activateItem(nextIndex);
        }

        // Function to start the autoplay
        function startAutoplay() {
            // Prevent multiple intervals from being set
            if (autoplayInterval === null) {
                autoplayInterval = setInterval(activateNextItem, AUTOPLAY_DELAY);
            }
        }

        // Function to stop the autoplay
        function stopAutoplay() {
            if (autoplayInterval !== null) {
                clearInterval(autoplayInterval);
                autoplayInterval = null;
            }
        }

        // Initialize the first item as active when the page loads
        activateItem(0);

        // Event handlers
        accordionItems.forEach((item, index) => {
            item.addEventListener('mouseenter', () => {
                // Stop autoplay when user interacts
                stopAutoplay();

                // Activate the hovered item
                activateItem(index);
            });

            item.addEventListener('mouseleave', () => {
                // Optionally, restart autoplay when mouse leaves an item after a delay
                interactionTimeout = setTimeout(() => {
                    startAutoplay();
                }, 1000); // Delay before autoplay resumes
            });
        });

        // When mouse leaves the entire accordion, resume autoplay after a delay
        accordion.addEventListener('mouseleave', () => {
            clearTimeout(interactionTimeout);
            interactionTimeout = setTimeout(() => {
                startAutoplay();
            }, 1000); // Adjust the delay as needed
        });

        // IntersectionObserver to start autoplay when the accordion comes into view
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        // Activate the current item
                        activateItem(currentIndex);

                        // Start autoplay
                        startAutoplay();
                    } else {
                        // Stop autoplay when the accordion is out of view
                        stopAutoplay();
                    }
                });
            }, {
                threshold: 0.5,
            }
        );

        observer.observe(accordion);
    });
</script>
