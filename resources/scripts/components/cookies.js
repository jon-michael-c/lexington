export default class Cookies {
  constructor() {
    this.cookies = document.querySelector('#cookies');
    this.accept = document.querySelector('#accept-cookies');
    this.decline = document.querySelector('#decline-cookies');
    this.policy = document.querySelector('.cookies-policy');
    this.policyBtn = document.querySelector('#cookie-policy');
    this.closePolicy = document.querySelector('#close-policy');

    if (!this.cookies) return;
    this.hasConsent = localStorage.getItem('cookie-consent');
    this.newVisitor = localStorage.getItem('new-visitor');
    if (!document.querySelector('.hero')) {
      this.init();
    }

    this.initListeners();
  }

  init() {
    if (!this.newVisitor) {
      this.cookies.classList.add('show');
    } else {
      this.cookies.classList.remove('show');
    }
  }

  initListeners() {
    if (this.accept) {
      this.accept.addEventListener('click', this.acceptCookies.bind(this));
    }

    if (this.decline) {
      this.decline.addEventListener('click', this.declineCookies.bind(this));
    }

    if (this.policyBtn) {
      this.policyBtn.addEventListener('click', this.togglePolicy.bind(this));
    }

    if (this.closePolicy) {
      this.closePolicy.addEventListener('click', this.togglePolicy.bind(this));
    }
  }

  acceptCookies() {
    localStorage.setItem('cookie-consent', 'true');
    localStorage.setItem('new-visitor', 'false');
    this.cookies.classList.remove('show');
  }

  declineCookies() {
    localStorage.setItem('cookie-consent', 'false');
    localStorage.setItem('new-visitor', 'false');
    this.cookies.classList.remove('show');
  }

  togglePolicy() {
    this.policy.classList.toggle('show');
    document.querySelector('.cookies-text').classList.toggle('hide');
    document.querySelector('.cookies-actions').classList.toggle('hide');
  }
}
