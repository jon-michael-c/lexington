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
  const targets = document.querySelectorAll('.timeline ol li');
  const ANIMATED_CLASS = 'active';

  // Function to get the middle of the screen
  function isInMiddle(entry) {
    const viewportHeight = window.innerHeight;
    const elementTop = entry.boundingClientRect.top;
    const elementBottom = entry.boundingClientRect.bottom;

    // Check if the element crosses the middle of the screen
    return (
      elementTop < viewportHeight / 2 && elementBottom > viewportHeight / 2
    );
  }

  function callback(entries, observer) {
    entries.forEach((entry) => {
      const elem = entry.target;

      // Trigger the animation only when the element hits the middle of the screen
      if (isInMiddle(entry)) {
        elem.classList.add(ANIMATED_CLASS);
        observer.unobserve(elem); // Stop observing once the animation is triggered
      } else {
        elem.classList.remove(ANIMATED_CLASS);
      }
    });
  }

  const observer = new IntersectionObserver(callback, {
    threshold: 0, // Use threshold 0 to make sure we get all intersections
  });

  for (const target of targets) {
    observer.observe(target);
  }

  // Re-observe elements on resize
  window.addEventListener('scroll', () => {
    observer.disconnect();
    for (const target of targets) {
      observer.observe(target);
    }
  });
  const timelineItems = document.querySelectorAll(
    '.timeline ol li .timeline-item'
  );
  const timelineLineProgress = document.querySelector(
    '.timeline-line-progress'
  );
  const observedItems = new Set(); // To keep track of the items that have been counted

  // Function to check if the element is in the middle of the viewport
  function isInMiddle(entry) {
    const viewportHeight = window.innerHeight;
    const elementTop = entry.boundingClientRect.top;
    const elementBottom = entry.boundingClientRect.bottom;

    // Check if the element is crossing the middle of the screen
    return (
      elementTop < viewportHeight / 2 && elementBottom > viewportHeight / 2
    );
  }

  function updateProgressLine(entries) {
    let totalItems = timelineItems.length;

    entries.forEach((entry) => {
      const elem = entry.target;

      // If the item is in the middle of the viewport and hasn't been counted yet
      if (isInMiddle(entry) && !observedItems.has(elem)) {
        observedItems.add(elem); // Mark it as counted
      }
    });

    // Calculate the percentage of items in the middle and set the progress height
    const progressPercentage = (observedItems.size / totalItems) * 100;
    timelineLineProgress.style.height = `${progressPercentage}%`;
  }

  const observerOptions = {
    threshold: 0.6, // Use threshold 0 to detect any change in visibility
  };

  const observer2 = new IntersectionObserver(
    updateProgressLine,
    observerOptions
  );

  timelineItems.forEach((item) => {
    observer2.observe(item);
  });

  // Re-observe elements on resize
  window.addEventListener('scroll', () => {
    observer2.disconnect();
    timelineItems.forEach((item) => {
      observer2.observe(item);
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
