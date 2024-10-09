export default class Carousel {
  constructor() {
    let container = document.querySelector('.office-carousel');
    if (!container) return;
    this.container = container;
    this.images = document.querySelectorAll('.office-image');
    this.titles = document.querySelectorAll('.office-title');
    this.dots = document.querySelectorAll('.office-dot');
    this.interval = null;
    this.timeout = null;
    this.index = 0;
    this.init();
  }

  init() {
    this.container
      .querySelector('.office-prev')
      .addEventListener('click', () => {
        console.log('prev');
        this.prev();
      });
    this.container
      .querySelector('.office-next')
      .addEventListener('click', () => {
        this.next();
      });
    this.dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        this.move(index);
      });
    });
    this.container.addEventListener('mouseenter', () => {
      this.pause();
    });
    this.container.addEventListener('mouseleave', () => {
      if (this.timeout) clearTimeout(this.timeout);
      this.play();
    });
    this.move(0);
    this.play();
  }

  move(index) {
    if (index < 0) {
      index = this.images.length - 1;
    } else if (index >= this.images.length) {
      index = 0;
    }
    this.images[this.index].classList.remove('active');
    this.titles[this.index].classList.remove('active');
    this.dots[this.index].classList.remove('active');
    this.index = index;
    this.images[this.index].classList.add('active');
    this.titles[this.index].classList.add('active');
    this.dots[this.index].classList.add('active');
  }
  next() {
    this.move(this.index + 1);
  }

  prev() {
    this.move(this.index - 1);
  }

  play() {
    if (this.interval) clearInterval(this.interval);
    this.interval = setInterval(() => {
      this.move(this.index + 1);
    }, 4000);
  }

  pause() {
    if (this.interval) clearInterval(this.interval);
  }
}
