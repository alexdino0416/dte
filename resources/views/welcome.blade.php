<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <title>Laravel</title>

    </head>
    <body>
            <div class="container">
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
                    
                     {{-- <tbody>
                    @foreach ($peoples as $people)
                            <tr>
                                <td>{{ $people->name }}</td>
                                <td>{{ $people->lastname }}</td>
                                <td>{{ $people->age }}</td>
                                <td>{{ $people->gender }}</td>
                                <td>{{ $people->city->name }}</td>
                                <td>{{ $people->job->name }}</td>
                                <td>{{ $people->email }}</td>
                                <td>{{ $people->calification }}</td>
                                <td>{{ $people->opinion }}</td>
                            </tr>    
                    @endforeach
                    </tbody>  --}}
                    
                </table>
            </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>    
        <script>
            $(document).ready(function(){
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
            });
        </script>
    </body>
</html>
