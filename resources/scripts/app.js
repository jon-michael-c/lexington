import domReady from '@roots/sage/client/dom-ready';
import VideoCTAs from './videoCTAs';
import Carousel from './carousel';
import Timeline from './timeline';
import Quotes from './quotes';
import HighchartsController from './charts';
import anime from 'animejs';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  new VideoCTAs();
  new Carousel();
  new Timeline();
  new Quotes();
  //new HighchartsController();

  let tagline = document.querySelector('.tagline');

  let tl = anime.timeline({
    easing: 'easeOutExpo',
    duration: 750,
  });

  tl.add({
    targets: '.site-logo',
    opacity: 0,
  });

  tl.add({
    targets: '.site-logo',
    opacity: 1,
  });

  tl.add({
    targets: '.site-logo',
    opacity: 0,
  });
  tl.add({
    targets: '.tagline',
    opacity: 1,
  });
  // Next timeline here
  tl.add(
    {
      targets: tagline,
      translateX: ['-50%', '-50%'],
      translateY: ['-50%', '-50%'],
      scale: 1.5,
    },
    '-=300'
  ); // Adjust the timing overlap as needed

  tl.add(
    {
      targets: ['.vid-1', '.vid-2', '.vid-3', '.red-1', '.red-2', '.green'],
      opacity: 1,
    },
    '-=300'
  ); // Adjust the timing overlap as needed

  tl.play();

  // Same frame
  let tl2 = anime.timeline({
    easing: 'easeOutExpo',
    duration: 750,
  });

  tl.finished.then(() => {
    tl2.add(
      {
        targets: '.tagline',
        color: '#C7D9D4',
      },
      0
    );
    tl2.add(
      {
        targets: '.red-1',
        height: '226px',
        bottom: '80%',
      },
      0
    );
    tl2.add(
      {
        targets: '.vid-2',
        height: '589px',
      },
      0
    );
    tl2.add(
      {
        targets: '.vid-1',
        width: '645px',
        height: '398px',
        left: '50%',
        top: '35%',
      },
      0
    );
    tl2.add(
      {
        targets: '.vid-3',
        width: '342px',
        height: '398px',
      },
      0
    );
    tl2.add(
      {
        targets: '.vid-4',
        width: '342px',
        right: '0%',
        opacity: 1,
      },
      0
    );
    tl2.add(
      {
        targets: '.green',
        width: '50vw',
      },
      0
    );

    tl2.play();

    tl2.finished.then(() => {
      let tl3 = anime.timeline({
        easing: 'easeOutExpo',
        duration: 750,
      });

      tl3.add(
        {
          targets: '.vid-1',
          height: '472px',
          width: '426px',
          left: '0',
        },
        0
      );

      tl3.add(
        {
          targets: '.vid-2',
          left: '-10%',
          height: '258px',
          width: '281px',
        },
        0
      );
      tl3.play();
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
