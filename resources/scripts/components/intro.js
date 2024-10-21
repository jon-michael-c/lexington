import anime from 'animejs';

export default class Intro {
  constructor() {
    if (!document.querySelector('.hero')) return;
    // Define targets
    const siteLogo = '.site-logo';
    const tagline = document.querySelector('.tagline');
    const vids = ['.vid-1', '.vid-2', '.vid-3', '.hero > .page-header-content'];
    const reds = ['.red-1', '', '.hero-text-container'];
    const green = '.hero .bg-block';
    const heroText = '.hero-text';
    const header = document.querySelector('header');
    const heroBtn = document.querySelector('.hero-video-btn');
    const stripe = document.querySelector('.stripe');
    const body = document.querySelector('body');
    const green2 = document.querySelector('.green-2');
    const app = document.querySelector('#app');
    const videoControl = document.querySelector('.video-control');
    app.style.overflowX = 'hidden';
    header.style.opacity = '0';
    heroBtn.style.opacity = '0';
    stripe.style.opacity = '0';
    green2.style.opacity = '0';
    body.style.overflow = 'hidden';

    // Base timeline settings
    const baseTimelineSettings = {
      easing: 'easeInOutQuint',
      duration: 600,
    };

    // Animation steps array
    const anim1 = [
      { targets: siteLogo, opacity: [0, 1] }, // Fade in logo
      { targets: siteLogo, opacity: 0 }, // Fade out logo
      { targets: tagline, opacity: 1 }, // Fade in tagline // Tagline animation
    ];

    const anim2 = [
      {
        targets: [...vids, reds[0], reds[1], green],
        opacity: 1,
      },
      {
        targets: tagline,
        scale: 1.5,
        translateX: ['-50%', '-30%'],
        translateY: ['0%', '0%'],
      },
    ];

    const anim3 = [
      { targets: tagline, color: '#C7D9D4' },
      { targets: '.red-1', height: '226px', bottom: '80%' },
      { targets: vids[1], height: '589px' },
      {
        targets: vids[0],
        width: '645px',
        height: '398px',
        left: '50%',
        top: '42%',
      },
      { targets: vids[2], width: '342px', height: '398px' },
      { targets: vids[3], left: ['150%', '85%'], opacity: 1 },
      { targets: green, left: '50%', width: '50vw' },
    ];

    const anim4 = [
      {
        targets: vids[0],
        height: '472px',
        width: '426px',
        left: '0',
        translateY: ['-50%', '-50%'],
        translateX: ['-50%', '0%'],
        top: '50%',
      },
      { targets: vids[1], left: '-10%', height: '258px', width: '281px' },
      { targets: vids[2], left: '25%' },
      { targets: vids[3], left: '70%', top: '0%', height: '610px' },
      {
        targets: tagline,
        color: '#ffffff',
        left: '0%',
        translateX: '0%',
        translateY: '0%',
        scale: [1.5, 1],
        update: function () {
          tagline.style.position = 'relative';
          tagline.style.width = '100%';
          tagline.querySelector('h1').style.fontSize = '60px';
        },
      },
      { targets: reds[2], right: ['0%', '0%'], opacity: 0.9 },
      { targets: green, width: '40%', right: '30%', height: '90vh' },
    ];

    const anim5 = [
      {
        targets: vids[3],
        left: '0%',
      },
      {
        targets: reds[0],
        left: '-16px',
      },

      {
        targets: [vids[0], vids[1], vids[2]],
        opacity: 0,
      },
      {
        targets: '.intro-bg',
        opacity: 0,
      },
      {
        targets: [header, heroText, heroBtn, stripe],
        opacity: 1,
      },
      { targets: reds[1], opacity: 0 },
      { targets: green, left: '0', backgroundColor: '#C7D9D4' },
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
      let tl3 = anime.timeline(baseTimelineSettings);

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

      // Create Timeline 5 using anim5
      let tl5 = anime.timeline(baseTimelineSettings);

      if (i >= 5) {
        anim5.forEach((animation) => {
          tl5.add(animation, 0); // Add all animations at the same start point
          tl5.add(
            {
              targets: reds[2],
              width: '100%',
            },
            '-=100'
          );

          tl5.add(
            {
              targets: reds[0],
              top: '45%',
            },
            '-=100'
          );
          tl5.add(
            {
              targets: green2,
              opacity: 1,
            },
            '-=100'
          );
          tl5.add(
            {
              targets: green,
              height: '100%',
              bottom: '0',
            },
            '-=100'
          );
          tl5.add(
            {
              targets: videoControl,
              opacity: 1,
            },
            '-=100'
          );
        });

        body.style.overflow = 'auto'; // Allow scrolling
        await tl5.finished; // Wait for Timeline 5 to finish

        const introbg = document.querySelector('.intro-bg');
        introbg.style.display = 'none'; // Hide the intro background
        const intro = document.querySelector('.intro');
        intro.style.display = 'none'; // Hide the intro
        header.style.opacity = '1'; // Show the header
      }
    }

    // Run the timelines in sequence
    runTimelines(5);

    videoControl.addEventListener('click', () => {
      const video = document.querySelector('.bg-video > video');
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    });
  }
}
