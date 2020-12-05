import axios from 'axios'
import Swal from 'sweetalert2';
const financial = () => {
    const init = () => {
        chart();
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
                    data: window.sales,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
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
                    data: window.operating_income,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
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
                    data: window.net_income,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
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
                    data: window.assets,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
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
                    data: window.liability,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
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
                    data: window.capital,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend:
                {
                    display: false
                },
                maintainAspectRatio: false, // default value. false일 경우 포함된 div의 크기에 맞춰서 그려짐.
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    };

    console.log('financial');
    init();
}


export default financial();