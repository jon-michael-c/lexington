import anime, { easing } from 'animejs';

export default class Numbers {
  constructor() {
    const stats = document.querySelectorAll('.stat');
    if (!stats) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const stat = entry.target;
            let number = stat.querySelector('span.number');
            let value = parseInt(number.innerHTML.replace(/,/g, '')); // Remove commas before parsing
            anime({
              targets: number,
              innerHTML: [0, value * 2, value / 2, value],
              round: 1,
              easing: 'easeInOutSine',
              duration: 1000,
              update: function (anim) {
                number.innerHTML = Math.round(
                  anim.animations[0].currentValue
                ).toLocaleString(); // Add commas during animation
              },
            });
            observer.unobserve(stat); // Stop observing once the animation is done
          }
        });
      },
      { threshold: 0.1 }
    );

    stats.forEach((stat) => {
      observer.observe(stat);
    });
  }
}
