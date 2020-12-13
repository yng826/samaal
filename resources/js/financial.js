import axios from 'axios'
import Swal from 'sweetalert2';

var SimpleLightbox = require('simple-lightbox');

const financial = () => {
    const init = () => {
        chart();
    };

    const numberWithCommas = x => {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        // return Number(x).toLocaleString();
    };

    const chart = () => {

        // alert("eventListener"+info_year);
        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("sales").getContext('2d');
        var sales = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    datalabels: {
                        clamp: true,
                        anchor:'end',
                        align:'end',
                        color: [
                            'black',
                            'black',
                            'rgba(28, 54, 105, 1)'
                        ],
                    },
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
                plugins: {
                    datalabels: {
                        formatter:function(value){
                            return numberWithCommas(value);
                          }
                    }
                },
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
                            //max: Math.max.apply(this, window.sales)
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                }

            }
        });

         // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("operating_income").getContext('2d');
        var operating_income = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    datalabels: {
                        clamp: true,
                        anchor:'end',
                        align:'end',
                        color: [
                            'black',
                            'black',
                            'rgba(28, 54, 105, 1)'
                        ],
                    },
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
                plugins: {
                    datalabels: {
                        formatter:function(value){
                            return numberWithCommas(value);
                          }
                    }
                },
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
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            // suggestedMax: 10
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                }

            }
        });

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("net_income").getContext('2d');
        var net_income = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    datalabels: {
                        clamp: true,
                        anchor:'end',
                        align:'end',
                        color: [
                            'black',
                            'black',
                            'rgba(28, 54, 105, 1)'
                        ]
                    },
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
                plugins: {
                    datalabels: {
                        formatter:function(value){
                            return numberWithCommas(value);
                          }
                    }
                },
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
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            // suggestedMax: 10
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                }

            }
        });

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("assets").getContext('2d');
        var assets = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    datalabels: {
                        clamp: true,
                        anchor:'end',
                        align:'end',
                        color: [
                            'black',
                            'black',
                            'rgba(28, 54, 105, 1)'
                        ],
                    },
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
                plugins: {
                    datalabels: {
                        formatter:function(value){
                            return numberWithCommas(value);
                          }
                    }
                },
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
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            // suggestedMax: 10
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                }

            }
        });

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("liability").getContext('2d');
        var liability = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    datalabels: {
                        clamp: true,
                        anchor:'end',
                        align:'end',
                        color: [
                            'black',
                            'black',
                            'rgba(28, 54, 105, 1)'
                        ],
                    },
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
                plugins: {
                    datalabels: {
                        formatter:function(value){
                            return numberWithCommas(value);
                          }
                    }
                },
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
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            // suggestedMax: 10
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                }

            }
        });

        // 우선 컨텍스트를 가져옵니다.
        var ctx = document.getElementById("capital").getContext('2d');
        var capital = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: info_year,
                datasets: [{
                    datalabels: {
                        clamp: true,
                        anchor:'end',
                        align:'end',
                        color: [
                            'black',
                            'black',
                            'rgba(28, 54, 105, 1)'
                        ],
                    },
                    data: window.capital,
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
                plugins: {
                    datalabels: {
                        formatter:function(value){
                            return numberWithCommas(value);
                          }
                    }
                },
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
                scales: {
                    yAxes: [{
                        ticks: {
                            userCallback: (value, index, values) => {
                              return numberWithCommas(value);
                            },
                            beginAtZero:true,
                            // suggestedMax: 10
                          }
                    }],
                    xAxes: [{
                        barPercentage: 0.5
                    }]
                }

            }
        });
    };

    init();
}


export default financial();
