export default class VideoCTAs {
  constructor() {
    this.videoCTAs = document.querySelectorAll('.video-ctas__item');
    this.videoCTAs.forEach((cta) => {
      cta.addEventListener('mouseover', () => {
        let video = cta.querySelector('video');
        video.play();
      });
      cta.addEventListener('mouseout', () => {
        let video = cta.querySelector('video');
        video.pause();
      });
    });
  }
}
