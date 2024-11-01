import anime from 'animejs';

export default class Map {
  constructor() {
    this.map = document.querySelector('.locations-map');
    if (!this.map) return;
    this.svg = this.map.querySelector('svg');
    this.mDots = this.svg.querySelectorAll('g path');
    this.pins = this.map.querySelectorAll('.pin');

    this.init();
  }

  init() {
    this.mDots.forEach((dot) => {
      dot.style.opacity = 0;
    });
    let i = 0;
    this.mDots.forEach((dot) => {
      anime({
        targets: dot,
        opacity: 1,
        easing: 'easeInOutQuad',
        duration: 150,
        delay: (i * 1) / 3,
      });
      i++;
    });

    let svgs = document.querySelectorAll('.pin svg');
    svgs.forEach((pin) => {
      pin.addEventListener('mouseover', () => {
        // Get the parent element of the pin
        let parent = pin.parentElement;
        parent.classList.add('active');
      });

      pin.addEventListener('mouseout', () => {
        // Get the parent element of the pin
        let parent = pin.parentElement;
        parent.classList.remove('active');
      });
    });

    let offices = document.querySelectorAll('.office');
    if (!offices) return;

    offices.forEach((office) => {
      let officeId = office.getAttribute('data-office');
      let pin = document.getElementById(officeId);
      office.addEventListener('mouseover', () => {
        pin.classList.add('active');
      });

      office.addEventListener('mouseout', () => {
        pin.classList.remove('active');
      });
    });

    // Observer for the map
    let observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            this.moveIn();
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    observer.observe(this.map);
  }

  moveIn() {
    this.pins.forEach((pin, index) => {
      anime({
        targets: pin,
        translateY: ['-1000%', '-50%'],
        translateX: ['-50%', '-50%'],
        opacity: 1,
        duration: 750,
        easing: 'easeInOutQuad',
        delay: index * 100, // Stagger the animation by 100ms for each pin
      });
    });
  }
}
