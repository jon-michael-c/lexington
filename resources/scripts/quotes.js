export default class Quotes {
  constructor() {
    let container = document.querySelector('.quotes');
    if (!container) return;

    this.container = container;
    this.quotes = document.querySelectorAll('.quote');
    this.dots = document.querySelectorAll('.quote__dot');
    console.log(this.dots);
    this.interval = null;
    this.timeout = null;
    this.index = 0;
    this.init();
  }

  init() {
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
      index = this.quotes.length - 1;
    } else if (index >= this.quotes.length) {
      index = 0;
    }
    this.quotes[this.index].classList.remove('active');
    this.dots[this.index].classList.remove('active');
    this.index = index;
    this.quotes[this.index].classList.add('active');
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
