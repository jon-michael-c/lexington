import Highcharts from 'highcharts';

export default class HighChartsController {
  constructor() {
    if (!document.querySelector('#sec-chart')) return;

    // Use Intersection Observer to detect when the chart is in view
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            this.createChart(); // Create chart when it comes into view
            observer.unobserve(entry.target); // Stop observing after the chart is created
          }
        });
      },
      {
        threshold: 0.5, // Define threshold to 50% visibility
      }
    );

    // Start observing the chart container
    const chartContainer = document.getElementById('sec-chart');
    observer.observe(chartContainer);
  }
  createChart() {
    Highcharts.chart('sec-chart', {
      chart: {
        type: 'column',
        backgroundColor: 'transparent',
        borderRadius: 0,
        events: {
          load: function () {
            const chart = this;
            // Create a group for the background rectangles
            chart.backgroundGroup = chart.renderer
              .g('background-group')
              .attr({ zIndex: 0 })
              .add();
            // Ensure the background group is behind the series group
            chart.backgroundGroup.element.parentNode.insertBefore(
              chart.backgroundGroup.element,
              chart.seriesGroup.element
            );
          },
          render: function () {
            const chart = this;
            const series = chart.series[0];

            // Remove existing backgrounds to prevent duplicates
            if (chart.customBackgrounds) {
              chart.customBackgrounds.forEach((bg) => bg.destroy());
            }
            chart.customBackgrounds = [];

            // Loop over each point to draw the background rectangle
            series.points.forEach((point) => {
              const shapeArgs = point.shapeArgs;
              if (shapeArgs) {
                const rect = chart.renderer
                  .rect(
                    shapeArgs.x + chart.plotLeft,
                    chart.plotTop,
                    shapeArgs.width,
                    chart.plotHeight
                  )
                  .attr({
                    fill: '#E3ECE9', // Adjust color and opacity as needed
                    zIndex: 0,
                  })
                  .add(chart.backgroundGroup);
                chart.customBackgrounds.push(rect);
              }
            });
          },
        },
      },
      title: {
        text: '',
      },
      xAxis: {
        categories: [
          '2005',
          '2010',
          '2015',
          '2016',
          '2017',
          '2018',
          '2019',
          '2020',
          '2021',
          '2022',
          '2023',
        ],
        lineColor: '#C7D9D4',
        title: {
          text: null,
        },
      },
      yAxis: {
        min: 10,
        max: 130,
        gridLineWidth: 0,
        tickInterval: 10,
        title: {
          text: null,
        },
        labels: {
          enabled: true,
          format: '${value}',
        },
      },
      legend: {
        enabled: false,
      },
      credits: {
        enabled: false,
      },
      plotOptions: {
        column: {
          borderRadius: 0,
          dataLabels: {
            enabled: false,
          },
        },
        series: {
          animation: {
            duration: 1000, // Overall animation duration
            easing: 'easeOutBounce',
          },
        },
      },
      tooltip: {
        enabled: false,
      },
      series: [
        {
          name: '',
          data: [
            { y: 15, color: '#1C1C69', animation: { defer: 0 } },
            { y: 25, color: '#1C1C69', animation: { defer: 100 } },
            { y: 40, color: '#1C1C69', animation: { defer: 200 } },
            { y: 50, color: '#1C1C69', animation: { defer: 300 } },
            { y: 80, color: '#1C1C69', animation: { defer: 400 } },
            { y: 85, color: '#1C1C69', animation: { defer: 500 } },
            { y: 90, color: '#1C1C69', animation: { defer: 600 } },
            { y: 70, color: '#1C1C69', animation: { defer: 700 } },
            { y: 120, color: '#A2224C', animation: { defer: 800 } },
            { y: 105, color: '#A2224C', animation: { defer: 900 } },
            { y: 110, color: '#A2224C', animation: { defer: 1000 } },
          ],
          states: {
            hover: {
              enabled: false,
            },
          },
        },
      ],
    });
  }
}
