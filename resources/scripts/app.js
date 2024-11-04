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
import Navbar from './components/navbar';
import Cookies from './components/cookies';
import Map from './components/map';

if (
  !sessionStorage.getItem('intro') &&
  window.innerWidth >= 786 &&
  document.querySelector('.hero')
) {
  new Intro();
  sessionStorage.setItem('intro', 'true');
} else {
  anime({
    targets: ['.banner'],
    opacity: 1,
    easing: 'easeInOutQuad',
    duration: 500,
  });
}

anime({
  targets: ['.hero'],
  opacity: 1,
  easing: 'easeInOutQuad',
  duration: 500,
});
// Keypress to clear the localStorage on 'i' key
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    sessionStorage.removeItem('intro');
  }
});
/**
 * Application entrypoint
 */
domReady(async () => {
  // ...

  new Map();
  new Cookies();
  new VideoCTAs();
  new Carousel();
  new Timeline();
  new Quotes();
  new HighchartsController();
  new Numbers();
  new Overlay();
  new Navbar('.navbar');

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

document.addEventListener('DOMContentLoaded', function () {
  // Select the reasons section
  const reasonsSection = document.querySelector('.reasons');
  if (!reasonsSection) return;

  // Select all reasons-item elements
  const reasonsItems = reasonsSection.querySelectorAll('.reasons-item');

  // Initialize variables
  let currentIndex = 0;
  const autoplayInterval = 3000; // Time in milliseconds (e.g., 3000ms = 3s)
  let autoplayTimer;
  let isAutoplaying = false; // Track autoplay state

  // Function to activate a specific item
  function activateItem(index) {
    reasonsItems.forEach((item, idx) => {
      if (idx === index) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  }

  // Function to go to the next item
  function nextItem() {
    currentIndex = (currentIndex + 1) % reasonsItems.length;
    activateItem(currentIndex);
  }

  // Function to start autoplay
  function startAutoplay() {
    if (!isAutoplaying && reasonsItems.length > 0) {
      autoplayTimer = setInterval(nextItem, autoplayInterval);
      isAutoplaying = true;
      console.log('Autoplay started');
    }
  }

  // Function to stop autoplay
  function stopAutoplay() {
    if (isAutoplaying) {
      clearInterval(autoplayTimer);
      autoplayTimer = null;
      isAutoplaying = false;
      console.log('Autoplay stopped');
    }
  }

  // Initialize by activating the first item
  if (reasonsItems.length > 0) {
    activateItem(currentIndex);
  }

  // Foreach reasons-item, on mouseover, put active class, remove from others, and mouseout, remove active class
  reasonsItems.forEach((item) => {
    item.addEventListener('mouseover', () => {
      stopAutoplay();
      reasonsItems.forEach((otherItem) => {
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

  // Set up Intersection Observer to start autoplay when in view
  const observerOptions = {
    root: null, // Relative to the viewport
    threshold: 0.5, // 50% of the section must be visible
  };

  const observerCallback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        startAutoplay();
      } else {
        stopAutoplay();
      }
    });
  };

  const observer = new IntersectionObserver(observerCallback, observerOptions);
  observer.observe(reasonsSection);

  let reasonsItemsContainer = reasonsSection.querySelector('.reasons-items');
  // Pause autoplay on mouseenter
  reasonsItemsContainer.addEventListener('mouseenter', stopAutoplay);

  // Resume autoplay on mouseleave, but only if the section is still in view
  reasonsItemsContainer.addEventListener('mouseleave', () => {
    // Correctly use '&&' instead of '&#038;&#038;'
    const isInView =
      reasonsSection.getBoundingClientRect().top < window.innerHeight &&
      reasonsSection.getBoundingClientRect().bottom > 0;
    if (isInView) {
      startAutoplay();
    }
  });

  // Optional: Handle visibility changes to pause/play the autoplay
  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      stopAutoplay();
    } else {
      // If the section is in view, resume autoplay
      const rect = reasonsSection.getBoundingClientRect();
      const isInView = rect.top < window.innerHeight && rect.bottom > 0;
      if (isInView) {
        startAutoplay();
      }
    }
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
