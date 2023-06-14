@extends('layouts.app')

@section('content')


    <section style="overflow: hidden">
        <h1 style="text-align: center;margin: 10px 0;">Page D'Accueil</h1>
{{--

        <div class="active-time myBorder" style="background-color: var(--color-light)">
            <div id="day"></div>
            <div id="time"></div>
        </div>
--}}


        <div class="row d-flex justify-content-around" style="margin: 0 10px">
            <div class="col-4">
                <div class="activeUsers " style="margin-bottom: 20px;">
                    <div class="active-container d-flex justify-content-around py-2 align-items-center myBorder" style="padding: 10px 0;background-color: var(--color-night);color: var(--color-light)">
                        <i class="fa-solid fa-user-tie" style="font-size: 45px;color: #4c9311;padding: 10px 0"></i>
                        <h6 style="margin: 0">Nombre d'Utilisateurs : </h6>
                        <h6 style="margin: 0;color: #4c9311;font-size: 35px;">{{$userTotalNumber}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="activeUsers " style="margin-bottom: 20px;">
                    <div class="active-container d-flex justify-content-around py-2 align-items-center myBorder" style="padding: 10px 0;background-color: var(--color-night);color: var(--color-light)">
                        <i class="fa-solid fa-shop" style="font-size: 45px;color: #8c0000;padding: 10px 0"></i>
                        <h6 style="margin: 0">Nombre Des Marches Resilier : </h6>
                        <h6 style="margin: 0;color: #8c0000;font-size: 35px;">{{$marchesResilie}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div clals="activeUsers " style="margin-bottom: 20px;">
                    <div class="active-container d-flex justify-content-around py-2 align-items-center myBorder" style="padding: 10px 0;background-color: var(--color-night);color: var(--color-light)">
                        <i class="fa-solid fa-shop" style="font-size: 45px;color: darkgreen;padding: 10px 0"></i>
                        <h6 style="margin: 0">Nombre Des Marches Cloture : </h6>
                        <h6 style="margin: 0;color: darkgreen;font-size: 35px;">{{$marchesCloture}}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class=" chartss" style="margin: 0 10px">
                <div class="chartss-container d-flex row justify-content-between" style="margin: 0 10px">
                    <div class="chart-container myBorder col-6" style="background: var(--color-night);padding-top: 8px;width: 49%">
                        <h6 style="color: var(--color-night);text-align: center">Titre</h6>
                        <canvas id="lineChart" class="chart-a" style="z-index: 1;width: 100%;max-height: 350px"></canvas>
                    </div>
                    <div class="chart-container myBorder col-6"  style="background: var(--color-night);padding-top: 8px;width: 49%">
                        <h6 style="color: var(--color-night);text-align: center">Marche par rapport au statut</h6>
                        <canvas id="barChart" class="chart-a" style="z-index: 1;width: 100%;max-height: 350px"></canvas>
                    </div>
                </div>
            </div>


        <div class="row justify-content-around" style="margin: 0 10px">
            <div class="col-7">
                <div class="chartss">
                    <div class="chartss-container">

                        <div class="chart-container myBorder">
                            <canvas id="doughnutChart" style="z-index: 1;max-height: 600px"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-5">
                <div class="concurrentAnalytics">
                    <div class="concurrent row" style="border-radius: 3px 3px 0 0;border-bottom: 1px solid var(--color-light)">
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
                <div class="myMap">
                    <div id="morocco"></div>
                </div>
            </div>
        </div>


        <div class="chart-container myBorder" style="display: none">
            <canvas id="pieChart" style="z-index: 1;max-height: 250px"></canvas>
        </div>

        <div class=" chartss col-12 " style="width: 100%;margin: 20px 10px 0">
            <canvas id="barChart2" class="myBorder" style="z-index: 1;max-height: 400px;height: 400px;max-width: 85vw;margin: 0 10px"></canvas>
        </div>








        <div class="row chartss justify-content-around">
            <div class=" " style="width: 44%;">
            </div>
            <div class="col-md-6" style="width: 44%;">
            </div>
        </div>






        <h4 style="text-align: center;margin-top: 20px"><a href="/addGraph" style=" text-decoration: none;color: var(--sunset-color);font-weight: 600">Cree Votre Graphe</a></h4>
    </section>
    <script src=" {{ asset('js/MA_jvm.js') }}"></script>
    <script>

        /*-- Simple -Clock- -start- --*/
        /*
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var year = now.getFullYear();
            var month = now.getMonth() + 1; // Months are zero-indexed
            var day = now.getDate();
            var dayOfWeek = now.toLocaleDateString('fr-FR', { weekday: 'short' }).toUpperCase(); // Get the abbreviated day of the week

            // Add leading zeros if necessary
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var date = year + '-' + month + '-' + day;
            var time = hours + ':' + minutes + ':' + seconds;
            var dayInfo = dayOfWeek + ' ' + date;

            document.getElementById('day').textContent = dayInfo ;
            document.getElementById('time').textContent = time ;
        }

        setInterval(updateClock, 1000);

        */
        /*-- Simple -Clock- -end- --*/


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
                        data: marcheCountsType,
                        backgroundColor: ['rgb(216,138,93)',
                            'rgb(95,156,236)',
                            'rgb(74,207,174)',
                            'rgb(23,45,23)',
                            'rgb(39,75,189)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            display: true,
                            color:'red',
                        }
                    },
                    maintainAspectRatio: false,
                    width: 400,
                    height: 250,
                    plugins: {
                        legend: {
                            labels: {
                                color: 'black' // Change the legend text color here
                            }
                        },
                        title: {
                            display: true,
                            text: '',
                            position: 'bottom',
                            color: 'black' // Change the title text color here
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)', // Change the tooltip background color here
                            bodyColor: '#fff' // Change the tooltip text color here
                        },
                        // Change the background color of the chart area here
                        backgroundColor: 'red'
                    }
                }
            });



            var ctx = document.getElementById('lineChart').getContext('2d');
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: years,
                    datasets: [{
                        label: '',
                        data: marchesCountsEx,
                        backgroundColor: ['rgb(216,138,93)',
                            'rgb(95,156,236)',
                            'rgb(74,207,174)',
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
                            text: '',
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            display: true,
                        },
                        y: {
                            display: true,
                        }
                    },
                    maintainAspectRatio: false,
                    width: 300,
                    height: 350
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
                        backgroundColor: ['rgb(216,138,93)',
                            'rgb(95,156,236)',
                            'rgb(74,207,174)',
                            'rgb(23,45,23)',
                            'rgb(237,84,100)'],
                        borderColor: 'rgb(0,0,0)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    maintainAspectRatio: true,
                    width: 400,
                    height: 600
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
                        backgroundColor: ['rgb(216,138,93)',
                            'rgb(95,156,236)',
                            'rgb(74,207,174)',
                            'rgb(23,45,23)',
                            'rgb(255,0,0)'],
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
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            display: true,
                        },
                        y: {
                            display: true,
                        }
                    },
                    maintainAspectRatio: false,
                    width: 300,
                    height: 350
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
                        backgroundColor: ['rgb(216,138,93)',
                            'rgb(95,156,236)',
                            'rgb(74,207,174)',
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
                    },
                    maintainAspectRatio: false,
                    height: 400
                }
            });

        });


    </script>

@endsection
