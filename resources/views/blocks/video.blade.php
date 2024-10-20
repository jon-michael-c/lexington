<section class="full-width pb-8 sm:pb-16">
    @if (isset($video) && isset($video['url']))
        <div class="video-container overflow-hidden inner-full relative w-full h-full md:h-[530px] cursor-pointer">
            <video class="w-full h-full object-cover relative">
                <source src="{{ $video['url'] }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div
                class="play-button absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2  w-[120px] h-[120px] transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="122" height="122" viewBox="0 0 122 122" fill="none">
                    <circle opacity="0.5" cx="61" cy="61" r="61" fill="#C7D9D4" />
                    <circle cx="61" cy="61" r="60" stroke="white" stroke-width="2" />
                    <path d="M89 60.5L46.25 85.1817L46.25 35.8183L89 60.5Z" fill="white" />
                    <path d="M47.25 37.5503L87 60.5L47.25 83.4497L47.25 37.5503Z" stroke="white" stroke-width="2" />
                </svg>
            </div>
        </div>
        <script>
            document.querySelector('.video-container').addEventListener('click', function() {
                var video = document.querySelector('video');
                var playButton = document.querySelector('.play-button');

                if (video.paused) {
                    video.play();
                    playButton.style.opacity = '0';
                } else {
                    video.pause();
                    playButton.style.opacity = '1';
                }

            });
        </script>
    @endif
</section>
