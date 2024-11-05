<section class="full-width pb-8 sm:pb-16">
    @if (isset($video) && isset($video['url']))
        <div
            class="video-container aspect-video overflow-hidden inner-full relative w-full h-full md:h-[530px] cursor-pointer">
            <video class="w-full h-full object-cover relative"
                @if (isset($video['sizes']['large'])) poster="{{ $video['sizes']['large'] }}" @endif muted loop playsinline>
                <source src="{{ $video['url'] }}" type="{{ $video['mime_type'] }}">
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
            document.addEventListener('DOMContentLoaded', function() {
                const videoContainer = document.querySelector('.video-container');
                const video = videoContainer.querySelector('video');
                const playButton = videoContainer.querySelector('.play-button');
                let userPaused = false; // Track if the user manually paused the video

                // Function to attempt playing the video
                const playVideo = async () => {
                    if (!userPaused) { // Only play if the user hasn't manually paused
                        try {
                            await video.play();
                            // Hide the play button when video plays
                            playButton.style.opacity = '0';
                        } catch (error) {
                            console.warn('Autoplay failed:', error);
                            // Show the play button if autoplay fails
                            playButton.style.opacity = '1';
                        }
                    }
                };

                // Function to pause the video
                const pauseVideo = () => {
                    video.pause();
                    // Show the play button when video is paused
                    playButton.style.opacity = '1';
                };

                // Initialize Intersection Observer
                const observerOptions = {
                    root: null, // Observe relative to the viewport
                    threshold: 0.5 // 50% of the video should be visible
                };

                const observerCallback = (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            playVideo();
                        } else {
                            pauseVideo();
                        }
                    });
                };

                const observer = new IntersectionObserver(observerCallback, observerOptions);
                observer.observe(videoContainer);

                // Toggle play/pause on container click
                videoContainer.addEventListener('click', function() {
                    if (video.paused) {
                        video.play();
                        userPaused = false; // Reset userPaused when video is played
                    } else {
                        video.pause();
                        userPaused = true; // Set userPaused when video is manually paused
                    }
                });

                // Update play button visibility based on video state
                video.addEventListener('play', function() {
                    playButton.style.opacity = '0';
                });

                video.addEventListener('pause', function() {
                    playButton.style.opacity = '1';
                });

                // Optional: Handle visibility changes to pause/play the video
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        pauseVideo();
                    } else {
                        // Attempt to play again when the tab becomes active
                        playVideo();
                    }
                });
            });
        </script>
    @endif
</section>
