import domReady from '@roots/sage/client/dom-ready';
import VideoCTAs from './videoCTAs';
import Carousel from './carousel';
import Timeline from './timeline';
import Quotes from './quotes';
import HighchartsController from './charts';
import Numbers from './components/numbers';
import Intro from './components/intro';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  new VideoCTAs();
  new Carousel();
  new Timeline();
  new Quotes();
  new HighchartsController();
  new Numbers();
  new Intro();

  let overlay = document.querySelector('.overlay-list');
  let overlayItems = document.querySelectorAll('.overlay-list li');
  if (!overlay) return;

  overlayItems.forEach((item) => {
    item.addEventListener('mouseover', () => {
      overlayItems.forEach((item) => {
        item.classList.remove('active');
        item.classList.add('short');
      });
      item.classList.remove('short');
      item.classList.add('active');
    });

    item.addEventListener('mouseleave', () => {
      overlayItems.forEach((item) => {
        item.classList.remove('active');
        item.classList.remove('short');
      });
    });
  });

  overlay.addEventListener('mouseleave', () => {
    overlayItems.forEach((item) => {
      item.classList.remove('active');
      item.classList.remove('short');
    });
  });

  // when obserser sees overlay, activate the first item
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          overlayItems[0].classList.add('active');
        }
      });
    },
    { threshold: 0.1 }
  );

  observer.observe(overlay);
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
