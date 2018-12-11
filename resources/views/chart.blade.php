<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <title>Laravel</title>

</head>

<body>
    <div class="container">
        <div class="btn-group text-center" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary" onclick="genderChart()">Gender</button>
            <button type="button" class="btn btn-secondary">Job</button>
            <button type="button" class="btn btn-secondary">City</button>
        </div>
        <canvas id="chart"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script>
        var data = [];
        var labels = [];
        var ctx = $('#chart');
        var total = {{ $total }}
        $(document).ready(function(){

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
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    suggestedMin: 0,
                                    suggestedMax: total
                                }
                            }]
                        }
                    }
                });

            });
            
        });

        function genderChart() {
            labels = [];
            data = [];
            $.get('{{ url('api/gender') }}').done(function (response) {
                response.forEach(element => {
                    labels.push(element.gender);
                    data.push(element.value);
                    
                })

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Metro Calification by Gender',
                            data: data,
                            backgroundColor: [
                                'rgba(9, 104, 199, 1)',
                                'rgba(199, 9, 199, 1)'
                            ],
                            borderWidth: 5

                        }],
                    },
                    option: {}
                });
            });
        }
    </script>
</body>

</html>