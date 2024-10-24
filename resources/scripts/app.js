import domReady from '@roots/sage/client/dom-ready';
import VideoCTAs from './videoCTAs';
import Carousel from './carousel';
import Timeline from './timeline';
import Quotes from './quotes';
import HighchartsController from './charts';
import Numbers from './components/numbers';
import Intro from './components/intro';
import anime, { stagger } from 'animejs';
import Overlay from './components/overlay';

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
  new Overlay();

  let easing = 'cubicBezier(.5, .05, .1, .3)';
  let duration = 750;
  let columns = document.querySelectorAll('.column'); // Get all columns
  let options = {
    root: null, // Use the viewport as the root
    rootMargin: '0px',
    threshold: 0.1, // Trigger when 10% of the element is in view
  };

  // Opacity 0 for all columns
  columns.forEach((column) => {
    let columnContent = column.querySelectorAll(
      '.column-content .acf-innerblocks-container > .wp-block-group > *'
    );
    columnContent.forEach((content) => {
      content.style.opacity = 0;
    });

    let columnImage = column.querySelector('.column-image .image-overlay');
    columnImage.style.opacity = 0;
  });

  // Define the animation for column content and images
  function animateColumn(column) {
    let columnContent = column.querySelectorAll(
      '.column-content .acf-innerblocks-container > .wp-block-group >  *'
    );
    let columnImage = column.querySelector('.column-image .image-overlay');

    // Set initial states
    columnImage.style.opacity = 0;
    columnContent.forEach((content) => {
      content.style.opacity = 0;
    });

    // Animate the column content
    anime({
      targets: columnContent,
      translateY: [200, 0],
      opacity: 1,
      duration: duration,
      easing: 'easeInOutQuad',
    });

    // Animate the column image
    anime({
      targets: columnImage,
      width: ['0%', '100%'],
      opacity: 1,
      duration: duration,
      easing: 'easeInOutQuad',
    });
  }

  // Create an Intersection Observer to observe each column
  let observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateColumn(entry.target); // Trigger animation when the element enters the viewport
        observer.unobserve(entry.target); // Unobserve once animated
      }
    });
  }, options);

  // Observe each column
  columns.forEach((column) => {
    observer.observe(column);
  });

  const collage = document.querySelector('.collage');
  if (!collage) return;
  const collageItems = document.querySelectorAll('.collage__item');
  const collageBG = document.querySelector('.collage__bg');
  collageItems.forEach((item) => {
    item.addEventListener('mouseover', () => {
      collageItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
        }
      });
      item.classList.add('active');
    });

    item.addEventListener('mouseout', () => {
      item.classList.remove('active');
    });
  });

  collage.addEventListener('mouseover', (e) => {
    collageItems.forEach((item) => {
      if (!item.classList.contains('active')) {
        item.classList.add('inactive');
      }
    });
  });

  collage.addEventListener('mouseout', (e) => {
    collageItems.forEach((item) => {
      item.classList.remove('inactive');
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
