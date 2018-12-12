@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div id="btnGroup" class="btn-group " role="group" aria-label="Basic example">
                    <button id="calificationBtn" type="button" class="btn btn-primary active" onclick="changeActive()">Calification</button>
                    <button id="genderBtn" type="button" class="btn btn-primary" onclick="changeActive('gender')">Gender</button>
                    <button id="jobBtn" type="button" class="btn btn-primary" onclick="changeActive('job')">Job</button>
                    <button id="cityBtn" type="button" class="btn btn-primary" onclick="changeActive('city')">City</button>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script>
        var data = [];
        var labels = [];
        var ctx = $('#chart');
        var total = {{ $total }}
        $(document).ready(function(){
            chart();
        });
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
                    chart();
                    break;
            }
        }
        function chart() {
            labels = [];
            data = [];
            $.get('{{ url('api/chart') }}', function (response) {
                response.forEach(element => {
                    labels.push(element.calification);
                    data.push(element.value);
                    
                })
                
                var myChart = new Chart(ctx, {
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
        
    </script>

@endsection