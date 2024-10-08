import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  let videoCTAs = document.querySelectorAll('.video-ctas__item');
  console.log(videoCTAs);
  videoCTAs.forEach((cta) => {
    // On mouseover, play video
    cta.addEventListener('mouseover', () => {
      let video = cta.querySelector('video');
      video.play();
    });

    // On mouseout, pause video
    cta.addEventListener('mouseout', () => {
      let video = cta.querySelector('video');
      video.pause();
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
