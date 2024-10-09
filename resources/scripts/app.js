import domReady from '@roots/sage/client/dom-ready';
import VideoCTAs from './videoCTAs';
import Carousel from './carousel';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  new VideoCTAs();
  new Carousel();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
