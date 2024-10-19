import anime from 'animejs';
export default class Overlay {
  constructor() {
    let overlay = document.querySelector('.overlay-list');
    if (!overlay) return;
    let overlayItems = document.querySelectorAll('.overlay-list li');
    let timing = 200;
    let delay = 200;
    let easing = 'cubicBezier(.5, .05, .1, .3)';

    overlayItems.forEach((item) => {
      item.addEventListener('mouseover', () => {
        let header = item.querySelector('h4');
        let text = item.querySelector('p');
        let dot = item.querySelector('.overlay-dot');
        anime({
          targets: header,
          fontSize: '38px',
          duration: timing,
          easing: easing,
        });

        anime({
          targets: text,
          maxHeight: '1000px',
          opacity: 1,
          visibility: 'visible',
          duration: timing,
          easing: easing,
        });
        anime({
          targets: dot,
          backgroundColor: '#8C1D40',
          duration: timing,
          easing: easing,
        });
      });

      item.addEventListener('mouseleave', () => {
        overlayItems.forEach((item) => {
          let header = item.querySelector('h4');
          let text = item.querySelector('p');
          let dot = item.querySelector('.overlay-dot');
          anime({
            targets: header,
            fontSize: '24px',
            scale: 1,
            duration: timing,
            easing: easing,
          });

          anime({
            targets: text,
            opacity: 0,
            maxHeight: '0',
            duration: timing,
            easing: easing,
          });

          anime({
            targets: dot,
            backgroundColor: '#C7D9D4',
            duration: timing,
            easing: easing,
          });
        });
      });
    });

    overlay.addEventListener('mouseleave', () => {
      overlayItems.forEach((item) => {
        let header = item.querySelector('h4');
        let text = item.querySelector('p');
        let dot = item.querySelector('.overlay-dot');
        anime({
          targets: header,
          scale: 1,
          fontSize: '24px',
          duration: timing,
          easing: easing,
        });

        anime({
          targets: text,
          maxHeight: '0',
          duration: timing,
          easing: easing,
        });

        anime({
          targets: dot,
          backgroundColor: '#C7D9D4',
          duration: timing,
          easing: easing,
        });
      });
    });

    // when obserser sees overlay, activate the first item
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            let firstItem = overlayItems[0];
            let header = firstItem.querySelector('h4');
            let text = firstItem.querySelector('p');
            let dot = firstItem.querySelector('.overlay-dot');
            anime({
              targets: header,
              fontSize: '38px',
              duration: timing,
              easing: easing,
            });

            anime({
              targets: text,
              maxHeight: '1000px',
              opacity: 1,
              visibility: 'visible',
              duration: timing,
              easing: easing,
            });
            anime({
              targets: dot,
              backgroundColor: '#8C1D40',
              duration: timing,
              easing: easing,
            });
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(overlay);
  }
}
