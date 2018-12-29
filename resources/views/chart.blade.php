@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div id="btnGroup" class="btn-group " role="group" aria-label="Basic example">
                    <button id="calificationBtn" type="button" class="btn btn-primary active" onclick="changeActive()">Calification</button>
                    <button id="genderBtn" type="button" class="btn btn-primary" onclick="changeActive('gender')">Gender</button>
                    <button id="jobBtn" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="changeActive('job')">Job <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    <button id="cityBtn" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="changeActive('city')">City <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action2</a></li>
                            <li><a href="#">Another action2</a></li>
                            <li><a href="#">Something else here2</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link2</a></li>
                        </ul>
                </div>
                <div style="float:right;">
                    <h5>Data Survey Chart</h5>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="chart"></canvas>
            </div>
            <div class="panel-footer">
                <p class="text-right">total of people surveyed: <strong>{{ $total }}</strong></p>
            </div>
        </div>
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center" style="font-size:25px;">Table of People Surveyed</p>
            </div>
            <div class="panel-body">
                <table id="tableSurvey" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Job</th>
                            <th>E-mail</th>
                            <th>Calification</th>
                            <th>Opinion</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>    
    <script>
        var data = [];
        var labels = [];
        var ctx = $('#chart');
        var total = {{ $total }}
        // $(document).ready(function(){
            // chart();
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {},
                options: {
                    title: {
                        display: true,
                        text: 'Metro Calification'
                    }
                }
            });
            startChart();
        // });
        function changeActive(btn) {
            $('#btnGroup').find('.active').removeClass('active')
            switch (btn) {
                case 'gender':
                    $('#genderBtn').addClass('active')
                    genderChart();
                    break;
                case 'job':
                    $('#jobBtn').addClass('active')
                    genderChart();
                    break;
                case 'city':
                    $('#cityBtn').addClass('active')
                    genderChart();
                    break;
            
                default:
                    $('#calificationBtn').addClass('active')
                    calificationChart();
                    break;
            }
        }
        function startChart() {
            labels = [];
            data = [];
            dataChart = [];
            $.get('{{ url('api/chart') }}').done(function (response) {
                response.forEach(element => {
                    labels.push(element.calification);
                    data.push(element.value);
                    
                })
                dataChart = {
                    labels: labels,
                    datasets: [{
                        label: 'Metro Calification',
                        data: data,
                        backgroundColor: [
                            'rgba(9, 199, 9, 0.50)'
                        ],
                        borderWidth: 2
                    }]
                }

                myChart.data = dataChart;
                myChart.config.type = 'line';
                myChart.update();
            });
        }
        function calificationChart() {
            labels = [];
            data = [];
            dataChart = [];
            $.get('{{ url('api/chart') }}').done(function (response) {
                response.forEach(element => {
                    labels.push(element.calification);
                    data.push(element.value);
                    
                })
                myChart.destroy();

                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Metro Calification',
                            data: data,
                            backgroundColor: [
                                'rgba(9, 199, 9, 0.50)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Metro Calification'
                        }
                    }
                });
            });
        }
        function genderChart() {
            labels = [];
            var dataMale = [];
            var dataFemale = [];
            var gender = [];

            $.get('{{ url('api/gender') }}').done(function (response) {
                
                response.forEach(element => {
                    if (labels.indexOf(element.calification) == -1) {
                        labels.push(element.calification);
                    }
                    if(gender.indexOf(element.gender) == -1){
                        gender.push(element.gender);
                    } 
                    switch (element.gender) {
                        case 'male':
                            dataMale.push(element.value);
                            break;
                    
                        case 'female':
                            dataFemale.push(element.value);
                            break;
                    }
                    
                })

                myChart.destroy();

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: gender[0],
                            data: dataMale,
                            backgroundColor: 'rgba(9, 104, 199, 0.6)',
                            borderWidth: 1,
                            hoverBorderWidth: 4,
                            hoverBorderColor: 'rgba(9, 104, 199, 1)',
                            
                        },{
                            label: gender[1],
                            data: dataFemale,
                            backgroundColor: 'rgba(199, 9, 199, 0.6)',
                            borderWidth: 1,
                            hoverBorderWidth: 4,
                            hoverBorderColor: 'rgba(199, 9, 199, 1)'
                            

                        }],
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Metro Calification by Gender'
                        }
                    //     scales: {
                    //         yAxes: [{
                    //             ticks: {
                    //                 suggestedMin: 0,
                    //                 suggestedMax: total
                    //             }
                    //         }]
                    //     }
                    }
                });
            });

        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //table
        $('#tableSurvey').DataTable({
            'serverSide': true,
            'ajax': '{{ url('api/people') }}',
            'scrollY': 400,
            'columns': [
                {data: 'name', 'searchable': false},
                {data: 'lastname', 'searchable': false},
                {data: 'age', 'searchable': false},
                {data: 'gender', 'searchable': false},
                {data: 'city_name', 'searchable': false},
                {data: 'job_name', 'searchable': false},
                {data: 'email', 'searchable': false},
                {data: 'calification', 'searchable': false},
                {data: 'opinion'},
            ]
        });

    </script>

@endsection