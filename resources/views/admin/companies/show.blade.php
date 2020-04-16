@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-info">
                <div class="panel-heading" style="display: flex;justify-content:space-between">
                    <a title="edit" href="{{route('company.edit', $company->id)}}"><b>{{$company->name}}</b></a>
                    @if ($company->logo)
                    <img src="{{asset('storage/'.$company->logo)}}" alt="logo" style="width:100px">
                    @else
                    <div style="padding:10px; border:1px dotted #333">
                        Logo missing
                    </div>
                    @endif
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span>Company name:</span> <span>{{$company->name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span>email:</span> <span>{{$company->email}}</span>
                        </li>
                        <li class="list-group-item">
                            <span>website:</span> <span>{{$company->website ?? 'not set'}}</span>
                        </li>
                    </ul>
                    @if (count($company->employees))
                    <p>Employees</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Avatar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company->employees as $employee)
                            <tr>
                                <th scope="row">{{$employee->id}}</th>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->avatar}}</td>
                                <td>
                                    <a title="employee details" class="btn btn-info btn-xs" href="{{route('employee.show', $employee->id)}}">Details</a>
                                    <a title="employee edit" class="btn btn-link btn-xs" href="{{route('employee.edit', $employee->id)}}">Edit</a>
                                    <form method="POST" action="{{route('employee.destroy', $employee->id)}}" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-xs" title="delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="panel-footer">Total employees: {{count($company->employees)}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
