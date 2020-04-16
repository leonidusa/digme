@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p><b>Database statistics</b></p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span><a href="{{ route('company.index') }}">Companies</a></span>
                            <span class="badge">{{$stats['companies']}}</span>
                        </li>
                        <li class="list-group-item">
                            <span><a href="{{ route('employee.index') }}">Employees</a></span>
                            <span class="badge">{{$stats['employees']}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
