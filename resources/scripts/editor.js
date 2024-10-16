import HighChartsController from './charts';

/**
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/filters}
 */
roots.register.filters('@scripts/filters');

window.addEventListener('load', () => {
  new HighChartsController();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
