@extends('layouts.app')

@section('content')

    <h1>Dashboard</h1>


    <div class="row justify-content-around">
        <div class="concurrentAnalytics col-4">

            <div class="concurrent row">
                <div class="regionName col-5">
                    <p style="color: var(--sunset-color);font-size: 25px;margin-top: 15px;height: 76px"
                       id="displayArea">Marrakech-Safi</p>
                    <p><span id="count">0</span><span> Concurrents</span></p>
                </div>
                <div class="progressChart col-5">
                    <div id="cont" data-pct="100">
                        <svg id="svg" width="100" height="100" viewBox="-15 -15 115 115" version="1.1"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle r="45" cx="45" cy="45" fill="transparent" stroke-dasharray="283.49"
                                    stroke-dashoffset="0"></circle>
                            <circle id="bar" r="45" cx="45" cy="45" fill="transparent" stroke-dasharray="283.49"
                                    stroke-dashoffset="0"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="myMap col-5">
            <div id="morocco"></div>
        </div>
    </div>


    {{--    <h1>nombre de consultation : $element</h1>--}}





    <h1>Visualtion du marche</h1>




    <div class="row chartss justify-content-around p-1 m-1">
        <div class="col-md-6 " style="width: 44%;">
            <canvas id="pieChart" style="z-index: 1;"></canvas>
        </div>
        <div class="col-md-6" style="width: 44%;">
            <canvas id="doughnutChart" style="z-index: 1;"></canvas>
        </div>
    </div>

    <div class="row chartss justify-content-around p-1 m-1">
        <div class="col-md-6 " style="width: 44%;">
            <canvas id="lineChart" style="z-index: 1;"></canvas>
        </div>
        <div class="col-md-6" style="width: 44%;">
            <canvas id="barChart" style="z-index: 1;"></canvas>
        </div>
    </div>


        <div class="mx-auto chartss p-1 m-1" style="width: 90%;">
            <canvas id="barChart2" style="z-index: 1;"></canvas>
        </div>


    <a href="/addGraph" style="margin-top: 100px;">make a graph</a>

    <script src=" {{ asset('js/MA_jvm.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Assuming you have the user array and post count data available
            var roles = {!! json_encode($roles) !!};
            var userscount = {!! json_encode($userscount) !!};

            var statusArray = {!! json_encode($statusArray) !!};
            var marcheCountStatus = {!! json_encode($marcheCountStatus) !!};

            var typemarches = {!! json_encode($typemarches) !!};
            var marcheCountsType = {!! json_encode($marcheCountsType) !!};

            var MarcheArray15 = {!! json_encode($MarcheArray15) !!};
            var montantArray = {!! json_encode($montantArray) !!};

            var marchesCountsEx = {!! json_encode($marchesCountsEx) !!};
            var years = {!! json_encode($years) !!};



            // one
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: typemarches,
                    datasets: [{
                        label: 'Nombre de marches',
                        data: marcheCountsType, // Extract the values from marcheCountsType array
                        backgroundColor: ['rgb(114,16,16)',
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
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Your llkzflkdbdfm,babels',
                        data: marchesCountsEx,
                        backgroundColor: ['rgb(114,16,16)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    indexAxis: 'x',
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Marche Count by Status',
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            display: true,
                            title: {
                                display: true,
                                text: 'Status'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Marche Count'
                            }
                        }
                    }
                }
            });



            //five
            var ctx = document.getElementById('doughnutChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: roles,
                    datasets: [{
                        label: 'your labels',
                        data: userscount,
                        backgroundColor: ['rgb(114,16,16)',
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

            var ctx1 = document.getElementById('barChart').getContext('2d');
            var barChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: statusArray,
                    datasets: [{
                        label: 'Your labels',
                        data: marcheCountStatus,
                        backgroundColor: ['rgb(114,16,16)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    indexAxis: 'x',
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Marche Count by Status',
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            display: true,
                            title: {
                                display: true,
                                text: 'Status'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Marche Count'
                            }
                        }
                    }
                }
            });

            var ctx2 = document.getElementById('barChart2').getContext('2d');
            var barChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: MarcheArray15,
                    datasets: [{
                        label: 'Your labels',
                        data: montantArray,
                        backgroundColor: ['rgb(114,16,16)',
                            'rgb(67,171,67)',
                            'rgb(189,133,133)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    indexAxis: 'x',
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Montant by Marche Number',
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            display: true,
                            title: {
                                display: true,
                                text: 'Marche Number'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Montant'
                            }
                        }
                    }
                }
            });

        });
    </script>

@endsection
