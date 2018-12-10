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
        <canvas id="chart"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            var data = {};
            $.get('{{ url('api/chart') }}', function (response) {
                console.log(response);
            });
            
            var ctx = $('#chart');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [1,2,3,4,5],
                    datasets: [{
                        label: 'Metro Calification',
                        data: [
                            
                        ]
                    }]
                },
                options: {

                }
            });
        });
    </script>
</body>

</html>