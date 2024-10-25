import anime from 'animejs';

export default class Overlay {
  constructor() {
    this.overlay = document.querySelector('.overlay-list');
    if (!this.overlay) return;

    this.overlayItems = document.querySelectorAll('.overlay-list li');

    // Default animation settings
    this.config = {
      timing: 300,
      delay: 200,
      easing: 'easeInOutQuint',
      hoverDelay: 100,
      autoplayInterval: 2500, // Interval for autoplay in milliseconds
      loopAutoplay: true, // Whether to loop autoplay
    };

    // Initialize hover timeout
    this.hoverTimeout = null;

    // Autoplay state
    this.autoplayIntervalId = null;
    this.currentAutoplayIndex = 0;

    // Initialize animations
    this.initHoverEffects();
    this.initObserver();
  }

  /**
   * Helper method to animate an overlay item
   */
  animateItem(item, config) {
    let header = item.querySelector('h4');
    let text = item.querySelector('p');
    let dot = item.querySelector('.overlay-dot');

    anime({
      targets: header,
      fontSize: config.fontSize || '24px',
      duration: this.config.timing,
      easing: this.config.easing,
    });

    anime({
      targets: text,
      maxHeight: config.maxHeight || '0',
      opacity: config.opacity || 0,
      visibility: config.visibility || 'hidden',
      duration: this.config.timing,
      easing: this.config.easing,
    });

    anime({
      targets: dot,
      backgroundColor: config.dotColor || '#C7D9D4',
      duration: this.config.timing,
      easing: this.config.easing,
    });

    // Handle overlay-line animation if provided
    if (config.lineTop) {
      anime({
        targets: '.overlay-line',
        top: config.lineTop,
        duration: this.config.timing,
        easing: this.config.easing,
      });
    }
  }

  /**
   * Handle hover animation for a single overlay item
   */
  handleHover(item) {
    this.hoverTimeout = setTimeout(() => {
      let fontSize = window.innerWidth < 768 ? '32px' : '38px';
      // Activate hovered item and move line to '50%'
      this.animateItem(item, {
        fontSize: fontSize,
        maxHeight: '350px',
        opacity: 1,
        visibility: 'visible',
        dotColor: '#8C1D40',
        lineTop: '50%', // Move line to '50%' on hover
      });

      // Deactivate all other items
      this.overlayItems.forEach((otherItem) => {
        if (otherItem !== item) {
          this.animateItem(otherItem, {
            fontSize: '24px',
            maxHeight: '0',
            opacity: 0,
            dotColor: '#C7D9D4',
          });
        }
      });
    }, this.config.hoverDelay);
  }

  /**
   * Handle mouse leave to reset item animations and line
   */
  handleMouseLeave(item) {
    clearTimeout(this.hoverTimeout);

    // Reset item and move line to '48%'
    this.animateItem(item, {
      fontSize: '24px',
      maxHeight: '0',
      opacity: 0,
      dotColor: '#C7D9D4',
      lineTop: '48%', // Move line to '48%' on mouse leave
    });
  }

  /**
   * Initialize hover effects on overlay items
   */
  initHoverEffects() {
    this.overlayItems.forEach((item) => {
      // Mouse over event
      item.addEventListener('mouseover', () => {
        this.handleHover(item);
        // Optionally, pause autoplay on user interaction
        this.pauseAutoplay();
      });

      // Mouse leave event
      item.addEventListener('mouseleave', () => {
        this.handleMouseLeave(item);
        // Optionally, resume autoplay after interaction
        this.startAutoplay();
      });
    });

    // Reset all items when leaving the entire overlay
    this.overlay.addEventListener('mouseleave', () => {
      if (this.hoverTimeout) clearTimeout(this.hoverTimeout);
      this.overlayItems.forEach((item) => {
        this.handleMouseLeave(item);
      });
      // Optionally, resume autoplay
      this.startAutoplay();
    });
  }

  /**
   * Initialize IntersectionObserver to trigger animations
   */
  initObserver() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            // Start autoplay when overlay enters viewport
            this.startAutoplay();

            let firstItem = this.overlayItems[0];
            let fontSize = window.innerWidth < 768 ? '32px' : '38px';
            this.animateItem(firstItem, {
              fontSize: fontSize,
              maxHeight: '1000px',
              opacity: 1,
              visibility: 'visible',
              dotColor: '#8C1D40',
              lineTop: '50%', // Initial animation for the line when entering view
            });
          } else {
            // Stop autoplay when overlay leaves viewport
            this.stopAutoplay();

            // Optionally, reset all items
            this.overlayItems.forEach((item) => {
              this.animateItem(item, {
                fontSize: '24px',
                maxHeight: '0',
                opacity: 0,
                dotColor: '#C7D9D4',
                lineTop: '48%', // Reset line position
              });
            });
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(this.overlay);
  }

  /**
   * Start the autoplay feature
   */
  startAutoplay() {
    if (this.autoplayIntervalId) return; // Prevent multiple intervals

    this.autoplayIntervalId = setInterval(() => {
      const currentItem = this.overlayItems[this.currentAutoplayIndex];
      this.animateItem(currentItem, {
        fontSize: '38px',
        maxHeight: '350px',
        opacity: 1,
        visibility: 'visible',
        dotColor: '#8C1D40',
        lineTop: '50%', // Position line accordingly
      });

      // Deactivate all other items
      this.overlayItems.forEach((item, index) => {
        if (index !== this.currentAutoplayIndex) {
          this.animateItem(item, {
            fontSize: '24px',
            maxHeight: '0',
            opacity: 0,
            dotColor: '#C7D9D4',
          });
        }
      });

      // Move to the next item
      this.currentAutoplayIndex += 1;

      // Loop back to the first item if needed
      if (this.currentAutoplayIndex >= this.overlayItems.length) {
        if (this.config.loopAutoplay) {
          this.currentAutoplayIndex = 0;
        } else {
          // Stop autoplay if looping is disabled
          this.stopAutoplay();
        }
      }
    }, this.config.autoplayInterval);
  }

  /**
   * Pause the autoplay feature
   */
  pauseAutoplay() {
    this.stopAutoplay();
  }

  /**
   * Stop the autoplay feature
   */
  stopAutoplay() {
    if (this.autoplayIntervalId) {
      clearInterval(this.autoplayIntervalId);
      this.autoplayIntervalId = null;
      this.currentAutoplayIndex = 0; // Reset index if desired
    }
  }
}
