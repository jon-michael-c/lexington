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
    };

    // Initialize hover timeout
    this.hoverTimeout = null;

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
      // Activate hovered item and move line to '50%'
      this.animateItem(item, {
        fontSize: '38px',
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
      });

      // Mouse leave event
      item.addEventListener('mouseleave', () => {
        this.handleMouseLeave(item);
      });
    });

    // Reset all items when leaving the entire overlay
    this.overlay.addEventListener('mouseleave', () => {
      if (this.hoverTimeout) clearTimeout(this.hoverTimeout);
      this.overlayItems.forEach((item) => {
        this.handleMouseLeave(item);
      });
    });
  }

  /**
   * Observer to trigger animation on the first item when overlay enters the viewport
   */
  initObserver() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            let firstItem = this.overlayItems[0];
            this.animateItem(firstItem, {
              fontSize: '38px',
              maxHeight: '1000px',
              opacity: 1,
              visibility: 'visible',
              dotColor: '#8C1D40',
              lineTop: '50%', // Initial animation for the line when entering view
            });
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(this.overlay);
  }
}
