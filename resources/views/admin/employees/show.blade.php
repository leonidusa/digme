@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading" style="display: flex;justify-content:space-between">
                    <a title="edit" href="{{route('employee.edit', $employee->id)}}">{{$employee->first_name.' '.$employee->last_name}}</a>
                    @if ($employee->avatar)
                    <div class="avatar" style="background-image: url('{{asset('storage/'.$employee->avatar)}}');"></div>
                    @endif
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span>first name:</span> <span>{{$employee->first_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span>last name:</span> <span>{{$employee->last_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span>email:</span> <span>{{$employee->email}}</span>
                        </li>
                        <li class="list-group-item">
                            <span>phone:</span> <span>{{$employee->phone ?? 'not set'}}</span>
                        </li>
                        <li class="list-group-item">
                            <span>avatar:</span> <span>{{$employee->avatar ?? 'not set'}}</span>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">Company: <a title="company details" href="{{route('company.show', $employee->company->id)}}">{{$employee->company->name}}</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
