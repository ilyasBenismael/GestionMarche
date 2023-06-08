@extends('layouts.app')

@section('content')

    <h1>Dashboard</h1>


    <div class="row justify-content-around">
        <div class="concurrentAnalytics col-4">

            <div class="concurrent row" >
                <div class="regionName col-5">
                    <p style="color: var(--sunset-color);font-size: 25px;margin-top: 15px;height: 76px" id="displayArea">Marrakech-Safi</p>
                    <p ><span id="count">0</span><span> Concurrents</span></p>
                </div>
                <div class="progressChart col-5">
                    <div id="cont" data-pct="100">
                        <svg id="svg" width="100" height="100" viewBox="-15 -15 115 115" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <circle r="45" cx="45" cy="45" fill="transparent" stroke-dasharray="283.49" stroke-dashoffset="0"></circle>
                            <circle id="bar" r="45" cx="45" cy="45" fill="transparent" stroke-dasharray="283.49" stroke-dashoffset="0"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="myMap col-5">
            <div id="morocco"></div>
        </div>
    </div>




    <a href="/addGraph" style="margin-top: 100px;">make a graph</a>


    <h1>your graph :</h1>
    <div class="row d-flex justify-content-around" style="margin-bottom: 35px">
        <div class="col-3 chartss" style="width: 30%;">
            <canvas id="lineChart" style="z-index: 1;"></canvas>
        </div>
        <div class="col-3 chartss" style="width: 30%; ">
            <canvas id="barChart" style="z-index: 1;"></canvas>
        </div>

        <div class="col-3 chartss" style="width: 30%;">
            <canvas id="pieChart" style="z-index: 1;"></canvas>
        </div>
    </div>
    <div class="row d-flex justify-content-around" style="margin-bottom: 35px">

        <div class="col-3 chartss" style="width: 30%; ">
            <canvas id="radarChart" style="z-index: 1;"></canvas>
        </div>

        <div class="col-3 chartss" style="width: 30%;">
            <canvas id="doughnutChart" style="z-index: 1;"></canvas>
        </div>
        <div class="col-3 chartss" style="width: 30%; ">
            <canvas id="polarAreaChart" style="z-index: 1;"></canvas>
        </div>
    </div>


    <script src=" {{ asset('js/MA_jvm.js') }}" ></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Assuming you have the user array and post count data available
            var labels = {!! json_encode($roles) !!};
            var values = {!! json_encode($userscount) !!};

            // Create the chart
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Labels',
                        data: values,
                        backgroundColor: ['rgb(216,138,71)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'your labels',
                        data: values,
                        backgroundColor: ['rgb(216,138,71)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });






            var ctx = document.getElementById('lineChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'your labels',
                        data: values,
                        backgroundColor: ['rgb(216,138,71)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx = document.getElementById('doughnutChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'your labels',
                        data: values,
                        backgroundColor: ['rgb(216,138,71)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });






            var ctx = document.getElementById('radarChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'your labels',
                        data: values,
                        backgroundColor: ['rgb(216,138,71)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx = document.getElementById('polarAreaChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'your labels',
                        data: values,
                        backgroundColor: ['rgb(216,138,71)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });





        });

    </script>


@endsection
