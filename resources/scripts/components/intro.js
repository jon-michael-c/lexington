import anime, { stagger } from 'animejs';

export default class Intro {
  constructor() {
    if (!document.querySelector('.hero')) return;
    this.finished = false;

    const body = document.querySelector('body');
    body.style.overflowY = 'hidden';

    const siteLogo = document.querySelector('.site-logo');
    const heading = document.querySelector('.hero__heading-h1');
    const red1 = document.querySelector('.hero__line');
    const red2 = document.querySelector('.hero__text-bg');
    const green1 = document.querySelector('.hero__green-1');
    const green2 = document.querySelector('.hero__green-2');
    const stripe = document.querySelector('.hero__stripe');
    const heroVideo = document.querySelector('.hero__video');
    const heroText = document.querySelector('.hero__text');
    const heroTextContent = document.querySelector('.hero__text-content');
    const header = document.querySelector('.banner');
    const video1 = document.querySelector('.intro__video-1');
    const video2 = document.querySelector('.intro__video-2');
    const video3 = document.querySelector('.intro__video-3');
    const sections = document.querySelectorAll('section:not(.hero)');
    // Base timeline settings
    const baseTimelineSettings = {
      easing: 'easeInSine',
      duration: 550,
    };

    anime.set(
      [
        sections,
        header,
        heading,
        red1,
        red2,
        green1,
        green2,
        stripe,
        heroVideo,
        heroText,
        heroTextContent,
      ],
      { opacity: 0 }
    ); // Set initial state for logo
    // Animation steps array
    const anim1 = [
      {
        targets: siteLogo,
        opacity: 0,
      },
    ];

    const anim2 = [
      {
        targets: [heading],
        opacity: 1,
        color: '#8C1D40',
        translateY: ['50%', '50%'],
        translateX: ['65%', '65%'],
        scale: [0.7, 0.7],
      },
      {
        targets: [heading],
        scale: [0.7, 1.2],
      },
      {
        targets: [video1],
        opacity: 1,
        width: ['141px', '141px'],
        height: ['172px', '172px'],
        top: ['0%', '0%'],
        left: ['30%', '30%'],
      },
      {
        targets: [video2],
        opacity: 1,
        width: ['222px', '222px'],
        height: ['258px', '258px'],
        bottom: ['0%', '0%'],
        right: ['10%', '10%'],
      },
      {
        targets: [video3],
        opacity: 1,
        width: ['542px', '542px'],
        height: ['158px', '158px'],
        bottom: ['0%', '0%'],
        left: ['0%', '0%'],
      },

      {
        targets: [heroVideo],
        opacity: 1,
        width: ['100%', '100%'],
        height: ['501px', '501px'],
        left: ['100%', '100%'],
      },
      {
        targets: [green1],
        opacity: 1,
        left: ['90%', '90%'],
        top: ['0%', '0%'],
      },
    ];

    const anim3 = [
      {
        targets: [heading],
        color: '#C7D9D4',
      },
      {
        targets: [video1],
        top: ['0%', '10%'],
        left: ['30%', '28%'],
        width: ['141px', '645px'],
        height: ['172px', '398px'],
      },
      {
        targets: [video2],
        right: ['10%', '15%'],
        width: ['222px', '342px'],
        height: ['258px', '398px'],
      },
      {
        targets: [video3],
        height: ['158px', '589px'],
      },
      {
        targets: [heroVideo],
        left: ['100%', '83%'],
      },
      {
        targets: [green1],
        left: ['90%', '50%'],
        width: ['100%', '120%'],
      },
    ];

    const anim4 = [
      {
        targets: [heading],
        color: '#FFFFFF',
        scale: [1.2, 1],
        translateX: ['65%', '0%'],
        translateY: ['50%', '0%'],
      },
      {
        targets: [video1],
        left: ['28%', '-7%'],
        height: ['398px', '472px'],
      },
      {
        targets: [video2],
        right: ['15%', '45%'],
      },
      {
        targets: [video3],
        height: ['589px', '281px'],
        left: ['0%', '-35%'],
      },
      {
        targets: [heroVideo],
        left: ['83%', '63%'],
        height: ['501px', '611px'],
      },
      {
        targets: [green1],
        left: ['50%', '35%'],
        width: ['120%', '50%'],
        height: ['80%', '100%'],
      },
      {
        targets: [heroText],
        opacity: 1,
      },
      {
        targets: [red1],
        opacity: 1,
        translateY: ['-150%', '-150%'],
      },
      {
        targets: [red2],
        opacity: 0.9,
        width: ['5%', '5%'],
      },
    ];

    const anim5 = [
      {
        targets: [video1, video2, video3],
        opacity: 0,
        delay: anime.stagger(250),
      },
      {
        targets: [heroVideo],
        left: ['63%', '0%'],
      },
      {
        targets: [green1],
        left: ['35%', '0%'],
      },
      {
        targets: [heroTextContent, green2, header, sections, stripe],
        opacity: 1,
      },
      {
        targets: [red1],
        translateY: ['-150%', '0%'],
      },
      {
        targets: [red2],
        width: ['5%', '100%'],
      },
    ];

    async function runTimelines(i) {
      // Create Timeline 1 using anim1
      let tl = anime.timeline(baseTimelineSettings);
      if (i >= 1) {
        anim1.forEach((animation) => {
          tl.add(animation); // Add animations
        });
        await tl.finished; // Wait for Timeline 1 to finish
      }

      // Create Timeline 2 using anim2
      let tl2 = anime.timeline(baseTimelineSettings);
      if (i >= 2) {
        anim2.forEach((animation) => {
          tl2.add(animation, 0); // Add all animations at the same start point
        });
      }
      await tl2.finished; // Wait for Timeline 2 to finish

      // Create Timeline 3 using anim3
      let tl3 = anime.timeline({
        easing: 'easeInSine',
        duration: 1000,
      });

      if (i >= 3) {
        anim3.forEach((animation) => {
          tl3.add(animation, 0); // Add all animations at the same start point
        });
        await tl3.finished; // Wait for Timeline 3 to finish
      }

      // Create Timeline 4 using anim4
      let tl4 = anime.timeline(baseTimelineSettings);

      if (i >= 4) {
        anim4.forEach((animation) => {
          tl4.add(animation, 0); // Add all animations at the same start point
        });
        await tl4.finished; // Wait for Timeline 4 to finish
      }

      // Create Timeline 5 using anim3
      let tl5 = anime.timeline({
        easing: 'easeInSine',
        duration: 900,
      });

      if (i >= 5) {
        anim5.forEach((animation) => {
          tl5.add(animation, 0); // Add all animations at the same start point
        });

        await tl5.finished; // Wait for Timeline 5 to finish
      }

      siteLogo.style.zIndex = -99999;
      body.style.overflowY = 'auto';
    }

    siteLogo.style.opacity = 1;
    siteLogo.style.zIndex = 99999;

    // Select all video elements on the page
    const allVideos = document.querySelectorAll('video');
    let videosLoaded = 0;
    const totalVideos = allVideos.length;

    // Function to check if all videos are loaded
    function checkAllVideosLoaded() {
      if (videosLoaded === totalVideos) {
        runTimelines(5);
      }
    }

    // Iterate over each video element
    allVideos.forEach((video) => {
      // Function to handle successful loading
      const onLoaded = () => {
        videosLoaded++;
        checkAllVideosLoaded();
        // Remove event listeners after they are called to prevent memory leaks
        video.removeEventListener('canplaythrough', onLoaded);
        video.removeEventListener('error', onError);
      };

      // Function to handle loading errors
      const onError = () => {
        console.error(`Error loading video: ${video.src}`);
        videosLoaded++;
        checkAllVideosLoaded();
        // Remove event listeners after they are called to prevent memory leaks
        video.removeEventListener('canplaythrough', onLoaded);
        video.removeEventListener('error', onError);
      };

      // Check if the video is already loaded sufficiently
      if (video.readyState >= 4) {
        // HAVE_ENOUGH_DATA
        videosLoaded++;
        checkAllVideosLoaded();
      } else {
        // Listen for the canplaythrough event
        video.addEventListener('canplaythrough', onLoaded);
        // Optionally, listen for error events
        video.addEventListener('error', onError);
      }
    });

    /*
    const videoBtn = document.querySelector('.hero-video-btn label');
    videoBtn.addEventListener('click', () => {
      const video = document.querySelector('.bg-video > video');
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    });
    */
  }
}
