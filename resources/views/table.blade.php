@extends('layouts.app')

@section('content')
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
        
    </table>
</div>

@endsection

@section('script')
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

@endsection