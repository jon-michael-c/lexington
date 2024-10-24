class Navbar {
  constructor(selector) {
    this.element = document.querySelector(selector);
    if (!this.element) return;
    this.initEvents();
  }

  initEvents() {
    const toggler = this.element.querySelector('#navbar-toggler');
    toggler.addEventListener('click', () => {
      const target = this.element.querySelector('.navbar-collapse');
      target.classList.toggle('open');
      toggler.classList.toggle('open');
    });
  }
}

export default Navbar;
