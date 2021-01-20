import axios from 'axios'
import Swal from 'sweetalert2';

var SimpleLightbox = require('simple-lightbox');

const financial = () => {
    const init = () => {
        chart();
    };

    const numberWithCommas = x => {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    const chart = () => {

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("sales").getContext('2d');
        var colorAry = [ 'black', 'black', 'rgba(28, 54, 105, 1)' ];
        var sales = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    data: window.sales,
                    backgroundColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                      label: (tooltipItem, data) => {
                        const value =
                          data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return numberWithCommas(value);
                      }
                    }
                },
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            maxTicksLimit: 6,
                            max: 300000
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                },
                //events: false,
                hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 2000,
                    easing:'easeOutQuart',
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = numberWithCommas(dataset.data[index]);
                                ctx.fillStyle = colorAry[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 0);
                            });
                        });
                    }
                }
            }
        });
        var maxValue = Math.max.apply(null, sales.data.datasets.map(function (dataset) { return Math.max.apply(null, dataset.data); }));
        sales.options.scales.yAxes[0].ticks.suggestedMax = maxValue+50;
        sales.update();

         // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("operating_income").getContext('2d');
        var operating_income = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    data: window.operating_income,
                    backgroundColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                      label: (tooltipItem, data) => {
                        const value =
                          data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return numberWithCommas(value);
                      }
                    }
                },
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            maxTicksLimit: 6
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                },hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 2000,
                    easing:'easeOutQuart',
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = numberWithCommas(dataset.data[index]);
                                ctx.fillStyle = colorAry[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 0);
                            });
                        });
                    }
                }
            }
        });
        var maxValue = Math.max.apply(null, operating_income.data.datasets.map(function (dataset) { return Math.max.apply(null, dataset.data); }));
        operating_income.options.scales.yAxes[0].ticks.suggestedMax = maxValue+50;
        operating_income.update();

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("net_income").getContext('2d');
        var net_income = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    data: window.net_income,
                    backgroundColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                      label: (tooltipItem, data) => {
                        const value =
                          data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return numberWithCommas(value);
                      }
                    }
                },
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            maxTicksLimit: 6
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                },hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 2000,
                    easing:'easeOutQuart',
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = numberWithCommas(dataset.data[index]);
                                ctx.fillStyle = colorAry[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 0);
                            });
                        });
                    }
                }
            }
        });
        var maxValue = Math.max.apply(null, net_income.data.datasets.map(function (dataset) { return Math.max.apply(null, dataset.data); }));
        net_income.options.scales.yAxes[0].ticks.suggestedMax = maxValue+50;
        net_income.update();

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("assets").getContext('2d');
        var assets = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    data: window.assets,
                    backgroundColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                      label: (tooltipItem, data) => {
                        const value =
                          data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return numberWithCommas(value);
                      }
                    }
                },
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            maxTicksLimit: 6
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                },hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 2000,
                    easing:'easeOutQuart',
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = numberWithCommas(dataset.data[index]);
                                ctx.fillStyle = colorAry[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 0);
                            });
                        });
                    }
                }
            }
        });
        var maxValue = Math.max.apply(null, assets.data.datasets.map(function (dataset) { return Math.max.apply(null, dataset.data); }));
        assets.options.scales.yAxes[0].ticks.suggestedMax = maxValue+50;
        assets.update();

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("liability").getContext('2d');
        var liability = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    data: window.liability,
                    backgroundColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                      label: (tooltipItem, data) => {
                        const value =
                          data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return numberWithCommas(value);
                      }
                    }
                },
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                                return numberWithCommas(value);
                              },
                              beginAtZero:true,
                              maxTicksLimit: 6
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                },hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 2000,
                    easing:'easeOutQuart',
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = numberWithCommas(dataset.data[index]);
                                ctx.fillStyle = colorAry[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 0);
                            });
                        });
                    }
                }
            }
        });

        var maxValue = Math.max.apply(null, liability.data.datasets.map(function (dataset) { return Math.max.apply(null, dataset.data); }));
            liability.options.scales.yAxes[0].ticks.suggestedMax = maxValue+50;
            liability.update();

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("total").getContext('2d');
        var total = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    data: window.total,
                    backgroundColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderColor: [
                        'rgba(55, 104, 199, 1)',
                        'rgba(55, 103, 199, 1)',
                        'rgba(28, 54, 105, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                      label: (tooltipItem, data) => {
                        const value =
                          data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return numberWithCommas(value);
                      }
                    }
                },
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            maxTicksLimit: 6
                            // suggestedMax: 10
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                },hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 2000,
                    easing:'easeOutQuart',
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = numberWithCommas(dataset.data[index]);
                                ctx.fillStyle = colorAry[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 0);
                            });
                        });
                    }
                }
            }
        });

        var maxValue = Math.max.apply(null, total.data.datasets.map(function (dataset) { return Math.max.apply(null, dataset.data); }));
        total.options.scales.yAxes[0].ticks.suggestedMax = maxValue+50;
        total.update();
    };

    init();
}


export default financial();
