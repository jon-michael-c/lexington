import anime from 'animejs';

export default class Timeline {
  constructor() {
    let timeline = document.querySelector('.timeline');
    if (!timeline) return;
    this.timeline = timeline;
    this.timelineItems = timeline.querySelectorAll('.timeline-item');
    this.timelineProgress = timeline.querySelector(
      '.timeline-line-progress > .line'
    );
    this.easing = 'cubicBezier(0.5, 0.05, 0.1, 0.3)';
    this.dotEasing = 'easeInOutSine';
    this.lineDuration = 10;
    this.dotDuration = 200;
    this.threshold = 10; // Threshold for intersection checks

    this.initalizeTimeline();
    this.detectDotIntersection();
  }

  initalizeTimeline() {
    window.addEventListener('scroll', () => {
      const targetElement = document.querySelector('.top-line');
      if (targetElement) {
        this.checkIfInViewport(targetElement);
      }
    });
  }

  checkIfInViewport(element) {
    const distanceFromMiddle = this.getElementDistanceFromMiddle(element);
    this.updateTimelineProgress(distanceFromMiddle);
  }

  getElementDistanceFromMiddle(element) {
    const boundingBox = element.getBoundingClientRect();
    const elementMiddle = (boundingBox.top + boundingBox.bottom) / 2;
    const viewportMiddle = window.innerHeight / 2;
    return elementMiddle - viewportMiddle;
  }

  updateTimelineProgress(distanceFromMiddle) {
    const height = distanceFromMiddle < 0 ? Math.abs(distanceFromMiddle) : 0;
    anime({
      targets: this.timelineProgress,
      height: height,
      duration: this.lineDuration,
      easing: this.easing,
    });
  }

  detectDotIntersection() {
    window.addEventListener('scroll', () => {
      const timelineDots = document.querySelectorAll('.timeline-dot');
      timelineDots.forEach((dot) => {
        this.checkDotIntersection(dot);
      });
    });
  }

  checkDotIntersection(dotElement) {
    const actualDistance = this.getElementDistanceFromMiddle(dotElement);
    const distanceFromMiddle = Math.abs(actualDistance);

    if (distanceFromMiddle < this.threshold) {
      // Get index of dot in timeline container
      const index = Array.from(this.timelineItems).indexOf(
        dotElement.parentElement
      );

      // Get corresponding timeline item
      const timelineItem = this.timelineItems[index];
      this.activateTimelineItem(timelineItem);
      this.updateDots(index);
    }
  }

  activateTimelineItem(timelineItem) {
    let year = timelineItem.querySelector('.timeline-year');
    let title = timelineItem.querySelector('.timeline-title');
    let desc = timelineItem.querySelector('.timeline-description');
    let image = timelineItem.querySelector('.timeline-image');
    let bg = timelineItem.querySelector('.timeline-content-bg');
    let dot = timelineItem.querySelector('.timeline-dot');
    this.timelineItems.forEach((item) => {
      anime({
        targets: item.querySelector('.timeline-year'),
        fontSize: '38px',
        color: '#C7D9D4',
        duration: this.dotDuration,
        easing: this.dotEasing,
      });

      anime({
        targets: item.querySelector('.timeline-title'),
        fontSize: '24px',
        duration: this.dotDuration,
        easing: this.dotEasing,
      });

      anime({
        targets: item.querySelector('.timeline-description'),
        opacity: 0,
        maxHeight: 0,
        duration: this.dotDuration,
        easing: this.dotEasing,
      });

      anime({
        targets: item.querySelector('.timeline-image'),
        opacity: 0,
        maxHeight: 0,
        duration: this.dotDuration,
        easing: this.dotEasing,
      });

      anime({
        targets: item.querySelector('.timeline-content-bg'),
        width: 0,
        duration: this.dotDuration,
        easing: this.dotEasing,
      });

      anime({
        targets: item.querySelector('.timeline-dot'),
        width: 12,
        height: 12,
        duration: this.dotDuration,
        backgroundColor: '#c7d9d4',
        easing: this.dotEasing,
      });
    });

    anime({
      targets: year,
      fontSize: '60px',
      color: '#8C1D40',
      duration: this.dotDuration,
      easing: this.dotEasing,
    });

    anime({
      targets: title,
      fontSize: '28px',
      duration: this.dotDuration,
      opacity: 1,
      easing: this.dotEasing,
    });

    anime({
      targets: desc,
      opacity: 1,
      maxHeight: '200px',
      duration: this.dotDuration,
      easing: this.dotEasing,
    });

    anime({
      targets: image,
      opacity: 1,
      maxHeight: '1000px',
      duration: this.dotDuration,
      easing: this.dotEasing,
    });

    anime({
      targets: bg,
      width: '100%',
      duration: this.dotDuration,
      easing: this.dotEasing,
    });

    anime({
      targets: dot,
      width: 20,
      height: 20,
      duration: this.dotDuration,
      backgroundColor: '#8C1D40',
      easing: this.dotEasing,
    });
  }
  animateDot(dotElement, distance) {
    const isNearCenter = distance > this.threshold;
    const size = isNearCenter ? 12 : 20;
    const color = isNearCenter ? '#C7D9D4' : '#8C1D40';

    anime({
      targets: dotElement,
      width: size,
      height: size,
      duration: this.dotDuration,
      backgroundColor: color,
      easing: this.dotEasing,
      delay: isNearCenter ? 0 : 75,
    });
  }

  updateDots(index) {
    // Update all dots before the current index with animejs
    this.timelineItems.forEach((item, i) => {
      let dot = item.querySelector('.timeline-dot');
      if (i < index) {
        console.log('before');
        anime({
          targets: dot,
          width: 12,
          height: 12,
          duration: this.dotDuration,
          backgroundColor: '#8C1D40',
          easing: this.dotEasing,
        });
      }
    });
  }
}
