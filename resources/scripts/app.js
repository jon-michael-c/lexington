import domReady from '@roots/sage/client/dom-ready';
import VideoCTAs from './videoCTAs';
import Carousel from './carousel';
import Timeline from './timeline';
import Quotes from './quotes';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  new VideoCTAs();
  new Carousel();
  new Timeline();
  new Quotes();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
